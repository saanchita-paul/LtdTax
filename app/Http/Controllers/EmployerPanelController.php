<?php

namespace App\Http\Controllers;

use App\Models\CompanyBillingAddress;
use App\Models\CompanyContactDetail;
use App\Models\CompanyDetailInfo;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class EmployerPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cominfo = CompanyDetailInfo::where('status', 1)->get();
        return view('admin.employerpanel.comdetails', compact('cominfo'))->with('no', 1);
    }
    public function add()
    {
        $districts = Location::whereNull('district_id')->get();
        $cominfo = CompanyDetailInfo::where('status', 1)->get();
        return view('admin.employerpanel.add_comdetails', compact('cominfo', 'districts'));
    }
    public function get_thana_for_employer($districtID)
    {
        $thana_id = Location::where('district_id', $districtID)->get();
        return json_encode($thana_id);
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'district_id' => 'required|integer',
            'thana_id' => 'required|integer',
            'post_code' => 'required|numeric',
            'name' => 'required|max:255|string',
            'address' => 'required|max:255|string',
            'description' => 'nullable|string',
            'url' => 'nullable|url',
            'logo' => 'image|mimes:jpeg,jpg,png,gif,webp|required',
            'file_upload' => 'file|max:5120|mimes:pdf|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cominfo = new CompanyDetailInfo;
        $image = $request->file('logo');
        if ($image != '') {

            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/cominfo', $imagename);
            $cominfo->logo = $imagename;
        }
        $up_file = $request->file('file_upload');
        if ($up_file != '') {
            $ext = pathinfo($up_file->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($up_file->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;            
            $up_file->move('uploads/cominfo', $filename);
            $cominfo->file_upload = $filename;
        }
        $cominfo->district_id = $request->district_id;
        $cominfo->thana_id = $request->thana_id;
        $cominfo->post_code = $request->post_code;
        $cominfo->name = $request->name;
        $cominfo->slug = Str::slug($request->name, '-');
        $cominfo->address = $request->address;
        $cominfo->description = $request->description;
        $cominfo->url = $request->url;
        $cominfo->save();
        return redirect()->to('/admin/employerpanel/cominfo')->with('success', 'Company Info created successfully.');
    }
    public function edit($id)
    {
        $cominfo = CompanyDetailInfo::findOrFail($id);
        $districts = Location::whereNull('district_id')->get();
        $district_id = Location::where('status', 1)->where('district_id', null)->get();
        $thana_id = Location::where('status', 1)->where('district_id', '!=', null)->get();
        return view('admin.employerpanel.edit_comdetails', compact('cominfo','districts','district_id', 'thana_id'));
    }
    public function update(Request $request, $id)
    {
        $cominfo = CompanyDetailInfo::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'district_id' => 'required|integer',
            'thana_id' => 'required|integer',
            'post_code' => 'required|numeric',
            'name' => 'required|max:255|string',
            'address' => 'required|max:255|string',
            'description' => 'nullable|string',
            'url' => 'nullable|url',
            'logo' => 'image|mimes:jpeg,jpg,png,gif,webp|nullable',
            'file_upload' => 'file|max:5120|mimes:pdf|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('logo');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/cominfo', $imagename);
            $cominfo->logo = $imagename;
        } else {
            $cominfo->logo = $image_name;
        }
        $file_name = $request->hidden_file;
        $up_file = $request->file('file_upload');
        if ($up_file != '') {
            $ext = pathinfo($up_file->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($up_file->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;
            $up_file->move('uploads/cominfo', $filename);
            $cominfo->file_upload = $filename;
        } else {
            $cominfo->file_upload = $file_name;
        }
        $cominfo->district_id = request('district_id');
        $cominfo->thana_id = request('thana_id');
        $cominfo->post_code = request('post_code');
        $cominfo->name = request('name');
        $cominfo->address = request('address');
        $cominfo->description = request('description');
        $cominfo->url = request('url');
        $cominfo->update();
        return redirect()->to('/admin/employerpanel/cominfo')->with('success', 'Company Info updated successfully.');
    }
    public function delete($id)
    {
        $cominfo = CompanyDetailInfo::findOrFail($id);
        $cominfo->status = 0;
        $cominfo->update();
        return redirect()->to('/admin/employerpanel/cominfo')->with('success', 'Company Info deleted successfully.');
    }
    public function contact()
    {
        $contact = CompanyContactDetail::where('status', 1)->get();
        return view('admin.employerpanel.contact', compact('contact'))->with('no', 1);
    }
    public function contact_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'nullable|max:255',
            'name' => 'required|max:255',
            'designation' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $contact = new CompanyContactDetail;
        $contact->company_id = $request->company_id;
        $contact->name = $request->name;
        $contact->designation = $request->designation;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->save();
        return redirect('admin/employerpanel/contact')->with('success', 'Employer contact created successfully.');
    }
    public function contact_edit($id)
    {
        $contact = CompanyContactDetail::findOrFail($id);
        return view('admin.employerpanel.edit_contact', compact('contact'));
    }
    public function contact_update(Request $request, $id)
    {
        $contact = CompanyContactDetail::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'company_id' => 'nullable|max:255',
            'name' => 'required|max:255',
            'designation' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $contact->company_id = request('company_id');
        $contact->name = request('name');
        $contact->designation = request('designation');
        $contact->phone = request('phone');
        $contact->email = request('email');
        $contact->update();
        return redirect('admin/employerpanel/contact')->with('success', 'Employer contact updated successfully.');
    }
    public function contact_delete($id)
    {
        $contact = CompanyContactDetail::findOrFail($id);
        $contact->status = 0;
        $contact->update();
        return redirect('admin/employerpanel/contact')->with('success', 'Employer contact deleted successfully.');
    }
    public function billing()
    {
        $billing = CompanyBillingAddress::where('status', 1)->get();
        return view('admin.employerpanel.billing', compact('billing'))->with('no', 1);
    }
    public function billing_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'nullable|max:255',
            'address' => 'required|max:255',
            'phone' => 'nullable',
            'email' => 'nullable|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $billing = new CompanyBillingAddress;
        $billing->company_id = $request->company_id;
        $billing->address = $request->address;
        $billing->phone = $request->phone;
        $billing->email = $request->email;
        $billing->save();
        return redirect('admin/employerpanel/billing')->with('success', 'Billing address created successfully.');
    }
    public function billing_edit($id)
    {
        $billing = CompanyBillingAddress::findOrFail($id);
        return view('admin.employerpanel.edit_billing', compact('billing'));
    }
    public function billing_update(Request $request, $id)
    {
        $billing = CompanyBillingAddress::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'company_id' => 'nullable|max:255',
            'address' => 'required|max:255',
            'phone' => 'nullable',
            'email' => 'nullable|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $billing->company_id = request('company_id');
        $billing->address = request('address');
        $billing->phone = request('phone');
        $billing->email = request('email');
        $billing->update();
        return redirect('admin/employerpanel/billing')->with('success', 'Billing address updated successfully.');
    }
    public function billing_delete($id)
    {
        $billing = CompanyBillingAddress::findOrFail($id);
        $billing->status = 0;
        $billing->update();
        return redirect('admin/employerpanel/billing')->with('success', 'Billing address deleted successfully.');
    }
}
