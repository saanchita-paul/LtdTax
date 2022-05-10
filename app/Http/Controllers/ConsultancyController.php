<?php

namespace App\Http\Controllers;

use App\Models\Consultancy;
use App\Models\ConsultCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class ConsultancyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $consult = Consultancy::where('status', 1)->get();
        return view('admin.consultancy.index', compact('consult'))->with('no', 1);
    }
    public function add()
    {
        $categories = ConsultCat::where('status', 1)->get();
        return view('admin.consultancy.add', compact('categories'));
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'concat_id' => 'required|integer',
            'short_description'=>'required|string|max:1000',
            'content' => 'required||string|max:7000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $consult = new Consultancy;
        $consult->title = $request->title;
        $consult->slug = Str::slug($request->title, '-');
        $consult->concat_id = $request->concat_id;
        $consult->short_description = $request->short_description;
        $consult->content = $request->content;
        $consult->save();
        return redirect('/admin/consultancy')->with('success', 'Consultancy created successfully.');
    }
    public function edit($id)
    {
        $consult = Consultancy::findOrFail($id);
        $categories = ConsultCat::where('status', 1)->get();
        return view('admin.consultancy.edit', compact('consult', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $consult = Consultancy::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'concat_id' => 'required|integer',
            'short_description'=>'required|string|max:1000',
            'content' => 'required||string|max:7000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $consult->title = request('title');
        $consult->concat_id = request('concat_id');
        $consult->short_description = request('short_description');
        $consult->content = request('content');
        $consult->update();
        return redirect()->to('/admin/consultancy')->with('success', 'Consultancy updated successfully.');
    }
    public function delete($id)
    {
        $consult = Consultancy::findOrFail($id);
        $consult->delete();
        return redirect()->to('/admin/consultancy')->with('success', 'Consultancy deleted successfully.');
    }
    public function category()
    {
        $categories = ConsultCat::where('status', 1)->get();
        return view('admin.consultancy.category', compact('categories'))->with('no', 1);
    }
    public function cat_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = new ConsultCat;
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->description = $request->description;
        $category->save();
        return redirect('admin/consultancy/category')->with('success', 'consultancy category created successfully.');
    }
    public function cat_edit($id)
    {
        $category = ConsultCat::findOrFail($id);
        return view('admin.consultancy.edit_category', compact('category'));
    }
    public function cat_update(Request $request, $id)
    {
        $category = ConsultCat::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category->title = request('title');
        $category->description = request('description');
        $category->update();
        return redirect('admin/consultancy/category')->with('success', 'consultancy category updated successfully.');
    }
    public function cat_delete($id)
    {
        $consult = Consultancy::where('concat_id', $id);
        $consult->delete();
        $category = ConsultCat::findOrFail($id);
        $category->delete();
        return redirect('admin/consultancy/category')->with('success', 'consultancy category deleted successfully.');
    }
}
