<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Validator;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $parent_id = Education::where('status', 1)->where('parent_id', null)->get();
        $child_id = Education::where('status', 1)->where('parent_id', '!=', null)->get();
        return view('admin.education.all_education', compact('parent_id', 'child_id'))->with('no', 1);
    }
    public function add()
    {
        $parent_id = Education::where('status', 1)->where('parent_id', null)->get();
        $child_id = Education::where('status', 1)->where('parent_id', '!=', null)->get();
        return view('admin.education.add_education', compact('parent_id', 'child_id'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $education = new Education;
        $education->name = $request->name;
        $education->parent_id = $request->parent_id;
        $education->save();
        return redirect('/admin/education')->with('success','Education Created Successfully');
    }
    public function edit($id)
    {
        $education = Education::findOrFail($id);
        $parent_id = Education::where('status', 1)->where('parent_id', null)->get();
        $child_id = Education::where('status', 1)->where('parent_id', '!=', null)->get();
        return view('admin.education.edit_education', compact('education', 'parent_id', 'child_id'));
    }
    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $education->name = request('name');
        $education->update();
        return redirect()->to('/admin/education')->with('success','Education Updated Successfully');
    }
    public function parent_delete($id)
    {
        $education = Education::findOrFail($id);
        $education->status=0;
        $education->update();
        return redirect()->to('/admin/education')->with('success','Education Level Deleted Successfully');
    }
    public function child_delete($id)
    {
        $education = Education::findOrFail($id);
        $education->status=0;
        $education->update();
        return redirect()->to('/admin/education')->with('success','Education Degree Deleted Successfully');;
    }
}
