<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Validator;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $news = News::where('status', 1)->latest()->get();
        return view('admin.news.index', compact('news'))->with('no', 1);
    }

    public function add()
    {
        $categories = NewsCategory::with('children')->whereNull('parent_id')->get();
        return view('admin.news.add', compact('categories'));
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'cat_id[]' => 'nullable',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'short_desc' => 'nullable',
            'feature_img' => 'image|mimes:jpeg,jpg,png,gif,webp|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $news = new News;
        $image = $request->file('feature_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/news', $imagename);
            $news->feature_img = $imagename;
        }
        $news->user_id = $user_id;
        $news->name = $request->name;
        $news->slug = Str::slug($request->name, '-');
        $news->description = $request->description;
        $news->short_desc = $request->short_desc;
        if ($news->save()) {
            $id = $news->id;
            foreach ($request->cat_id as $key => $vl) {
                $data = array(
                    'news_id' => $id,
                    'cat_id' => $vl,
                );
                DB::table('news_cat')->insert($data);
            }
        }
        return redirect('/admin/news')->with('success','News Created Successfully.');
    }
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $news_cat = DB::table('news_cat')->where('news_id', '=', $id)->get();
        $categories = NewsCategory::with('children')->whereNull('parent_id')->get();
        return view('admin.news.edit', compact('news', 'categories', 'news_cat'));
    }
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'cat_id[]' => 'nullable',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'short_desc' => 'nullable',
            'feature_img' => 'image|mimes:jpeg,jpg,png,gif,webp|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('feature_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/news', $imagename);
            $news->feature_img = $imagename;
        } else {
            $news->feature_img = $image_name;
        }
        $news->name = request('name');
        $news->description = request('description');
        $news->short_desc = request('short_desc');
        $news->update();
        if ($request->cat_id) {
            DB::table('news_cat')->where('news_id', '=', $id)->delete();
            foreach ($request->cat_id as $key => $vl) {
                $data = array(
                    'news_id' => $id,
                    'cat_id' => $vl,
                );
                DB::table('news_cat')->insert($data);
            }
        }
        return redirect()->to('/admin/news')->with('success', 'News Updated successfully.');
    }
    public function delete($id)
    {
        $news = News::findOrFail($id);
        $image_path = "uploads/news/" . $news->feature_img; // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $news->delete();
        DB::table('news_cat')->where('news_id', '=', $id)->delete();
        return redirect()->back()->with('success', 'News Deleted successfully.');
    }
    public function category()
    {
        $news_cat = NewsCategory::where('status', 1)->get();
        $parent_cat = NewsCategory::where('status', 1)->where('parent_id', null)->get();
        return view('admin.news.category', compact('parent_cat', 'news_cat'))->with('no', 1);
    }
    public function store_cat(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'nullable',
            'description' => 'nullable',
            'cat_img' => 'nullable|mimes:jpg,jpeg,png,gif|max:5024',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $news_cat = new NewsCategory;
        $image = $request->file('cat_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/news', $imagename);
            $news_cat->cat_img = $imagename;
        }
        $news_cat->parent_id = $request->parent_id;
        $news_cat->name = $request->name;
        $news_cat->slug = Str::slug($request->name, '-');
        $news_cat->description = $request->description;
        $news_cat->save();
        return redirect()->back()->with('success', 'Category added successfully.');
    }
    public function delete_cat($id)
    {
        $ncat = NewsCategory::findOrFail($id);
        $image_path = "uploads/news/" . $ncat->cat_img; // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $ncat->delete();
        return redirect()->back()->with('success', 'Category Deleted successfully.');
    }

}
