<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactUsPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Validator;
use Illuminate\Support\Str;



class ContactUsPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contact = ContactUsPage::where('status',1)->get();
        return view('admin.contact_us.all_contact_us',compact('contact'))->with('no',1); 
    }

    public function add() {
        return view('admin.contact_us.add_contact_us');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'phone1' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'email' => 'required|email|max:255',
            'web_url' => 'url|string|required',
            'address' => 'string|required',
            'map_url' => 'url|string|required', 
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $contact = new ContactUsPage;
        $contact->title = $request->title;
        $contact->phone1 = $request->phone1;
        $contact->phone2 = $request->phone2;
        $contact->email = $request->email;
        $contact->web_url = $request->web_url;
        $contact->address = $request->address;
        $contact->map_url = $request->map_url;
        $contact->save();
        return redirect('/admin/contact_us')->with('success','Contact us page created successfully.');
    }

    public function edit($id) {
        $contact = ContactUsPage::findOrFail($id);    
        return view('admin.contact_us.edit_contact_us', compact('contact'));
    }

    public function update(Request $request, $id) {
        $contact = ContactUsPage::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'phone1' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'email' => 'required|email|max:255',
            'web_url' => 'url|string|required',
            'address' => 'string|required',
            'map_url' => 'url|string|required', 
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $contact->title = request('title');
        $contact->phone1 = request('phone1');
        $contact->phone2 = request('phone2');
        $contact->email = request('email');
        $contact->web_url = request('web_url');
        $contact->address = request('address');
        $contact->map_url = request('map_url');
        $contact->update();
        return redirect()->to('/admin/contact_us')->with('success','Contact us page updated successfully.');
    }

    public function delete($id) {
        $contact = ContactUsPage::findOrFail($id);
        $contact->status=0;
        $contact->update();
        return redirect()->to('/admin/contact_us')->with('success','Contact us page deleted successfully.');
    }
}