<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\FounderMessageExtra;
use Validator;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $page = Page::where('status', 1)->get();
        return view('admin.page.all_page', compact('page'))->with('no', 1);
    }
    public function add()
    {
        return view('admin.page.add_page');
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'page_img' => 'image|mimes:jpeg,jpg,png,gif|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $page = new Page;
        $image = $request->file('page_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/page', $filename);
            $page->page_img = $filename;
        }
        $page->name = $request->name;
        $page->slug = Str::slug($request->name, '-');
        $page->content = $request->content;
        $page->save();
        return redirect('/admin/page')->with('success', 'Page created successfully.');
    }
    public function edit($id)
    {   $founder_message ='';
        $page = Page::findOrFail($id);
        if($page->id == 1){
            $founder_message = FounderMessageExtra::where('status',1)->first();
        }
        return view('admin.page.edit_page', compact('page','founder_message'));
    }
    public function update(Request $request, $id)
    {   
        $page = Page::findOrFail($id);
        $founder_message = FounderMessageExtra::where('status',1)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'page_img' => 'image|mimes:jpeg,jpg,png,gif|nullable',
            'founder_name' =>  'nullable|string',
            'founder_img' => 'image|mimes:jpeg,jpg,png,gif|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('page_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/page', $filename);
            $page->page_img = $filename;
        } else {
            $page->page_img = $image_name;
        }
        $page->name = request('name');
        $page->content = request('content');
        $page->update();
        if($page->id == 1){
            $image_name = $request->hidden_image_founder;
            $image = $request->file('founder_img');
            if ($image != '') {
                $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
                $filename = $f_n.'-'.time() . '.' .$ext;
                $image->move('uploads/page', $filename);
                $founder_message->founder_img = $filename;
            } else {
                $founder_message->founder_img = $image_name;
            }
            $founder_message->founder_name = request('founder_name');
            $founder_message->update();
            return redirect()->to('/admin/page')->with('success', 'Page updated successfully.');
        }
        return redirect()->to('/admin/page')->with('success', 'Page updated successfully.');
    }
    public function delete($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->to('/admin/page')->with('success', 'Page deleted successfully.');
    }
}
