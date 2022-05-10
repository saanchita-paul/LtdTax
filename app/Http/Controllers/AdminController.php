<?php

namespace App\Http\Controllers;

use App\Models\BookGallery;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\ProfessionalDegree;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }
    // Admin functions 
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function all()
    {
        $admin = User::where('user_role', 1)->where('status', 1)->get();
        return view('admin.admin.index', compact('admin'));
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20|unique:users,name',
            'email' => 'required|max:255|unique:users|email',
            'phone' => 'nullable|string|max:15|unique:users',
            'password' => 'required|string|min:8',
            'photo' => 'image|mimes:jpeg,jpg,png,gif|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $admin = new User;
        $image = $request->file('photo');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/users', $imagename);
            $admin->photo = $imagename;
        }
        $admin->name = $request->name;
        $admin->username = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->user_role = 1;
        $admin->save();
        return redirect('/admin/admin-user/all')->with('success', 'Admin Created Successfully.');
    }
    // Delete Gallery Image
    public function delete_gallery($id)
    {
        $gallery = BookGallery::findOrFail($id);
        $gallery->status = 0;
        $gallery->update();
        return redirect()->back()->with('success', 'Gallery Image Deleted Successfully.');
    }
    public function edit_admin($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }
    // update admin
    public function update_admin(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20|unique:users,name,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:11|unique:users,phone,' . $id,
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'password' => 'nullable|string|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('photo');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/users', $imagename);
            $admin->photo = $imagename;
        } else {
            $admin->photo = $image_name;
        }
        $admin->name = request('name');
        $admin->username = request('name');
        $admin->email = request('email');
        $admin->phone = request('phone');
        if ($request->password != null) {
            $admin->password = Hash::make($request->password);
        }
        $admin->update();
        return redirect()->to('/admin/admin-user/all')->with('success', 'Admin Updated Successfully.');
    }
    public function delete_admin($id)
    {
        $admin = User::findOrFail($id);
        $admin->status = 0;
        $admin->update();
        return redirect()->back()->with('success', 'Admin Deleted Successfully.');
    }
    //skills
    public function skillsAll(){
        $no=1;
        $skills = Skill::where('status',1)->get();
        return view('admin.skills.index',compact('skills','no'));
    }

    public function skillsStore(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $skill= new Skill;
        $skill->skill_title = $request->title;
        $skill->save();
        return redirect()->back()->with('success', 'Skill Added Successfully.');
    }

    public function skillsEdit($id){
        $skill =  Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }
    public function skillsUpdate(Request $request, $id)
    {   
        $skill =  Skill::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $skill->skill_title = $request->title;
        $skill->update();
        return redirect()->route('skills.all')->with('success', 'Skill Updated Successfully.');
    }
    public function skillsDelete($id){
        $skill =  Skill::findOrFail($id);
        $skill->status = 0;
        $skill->update();
        return redirect()->back()->with('success', 'Skill Deleted Successfully.');
    }

    //professional degree
    public function professionalDegreeAll(){
        $no=1;
        $professional_degree = ProfessionalDegree::where('status',1)->get();
        return view('admin.professional_degree.index',compact('professional_degree','no'));
    }
    public function professionalDegreeStore(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $professional_degree =  new ProfessionalDegree;
        $professional_degree->degree_title = $request->title;
        $professional_degree->save();
        return redirect()->back()->with('success', 'Professional Degree Added Successfully.');
    }
    public function professionalDegreeEdit($id){
        $professional_degree =  ProfessionalDegree::findOrFail($id);
        return view('admin.professional_degree.edit',compact('professional_degree'));
    }
    public function professionalDegreeUpdate(Request $request,$id){
        $professional_degree =  ProfessionalDegree::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $professional_degree->degree_title = $request->title;
        $professional_degree->update();
        return redirect()->route('professionalDegree.all')->with('success', 'Professional Degree Updated Successfully.');
    }
    public function professionalDegreeDelete($id){
        $professional_degree =  ProfessionalDegree::findOrFail($id);
        $professional_degree->status = 0;
        $professional_degree->update();
        return redirect()->back()->with('success', 'Professional Degree Deleted Successfully.');
    }

}
