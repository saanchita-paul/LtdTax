<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookInPackage;
use App\Models\BookPackage;
use App\Models\Publication;
use App\Models\PublicationCat;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Validator;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $publication = Publication::where('status', 1)->get();
        return view('admin.publication.all_publication', compact('publication'))->with('no', 1);
    }
    public function addPackage()
    {
        $books = Book::where('status', 1)->get();
        $package = BookInPackage::where('status', 1)->get();
        return view('admin.publication.the-taxman-publication.add_package', compact('package', 'books'));
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'package_name' => 'required|string',
            'package_desc' => 'nullable|string',
            'package_img' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'regular_price' => 'required|integer',
            'price' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $book_package = new BookPackage();
        $image = $request->file('package_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/publication', $imagename);
            $book_package->package_img = $imagename;
        }
        $book_package->package_name = $request->package_name;
        $book_package->package_desc = $request->package_desc;
        $book_package->regular_price = $request->regular_price;
        $book_package->price = $request->price;
        $book_package->slug = Str::slug($request->package_name, '-');
        if ($book_package->save()) {
            $package_id = $book_package->id;

            if ($request->select_books != '') {
                foreach ($request->select_books as $vl) {
                    $data = array(
                        'book_id' => $vl,
                        'package_id' => $package_id,
                    );
                    DB::table('book_in_packages')->insert($data);
                }
                return redirect('/admin/publication/the-taxman-publication/package/view')->with('success', 'Package created successfully.');
            }
        }
    }
    public function viewPackage()
    {
        $package = BookPackage::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.publication.the-taxman-publication.view_package', compact('package'));
    }
    public function editPackage($id)
    {
        $pac = BookPackage::findOrFail($id);
        $books = Book::where('status', 1)->get();
        $package = BookInPackage::where('status', 1)->where('package_id', $id)->get();
        $all_book_packages = BookInPackage::where('status', 1)->where('package_id', '!=', $id)->get();
        return view('admin.publication.the-taxman-publication.edit_package', compact('package','all_book_packages','books', 'pac'));
    }
    public function updatePackage(Request $request, $id)
    {
        $book_package = BookPackage::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_desc' => 'nullable',
            'package_img' => 'nullable|max:2048',
            'regular_price' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('package_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/publication', $imagename);
            $book_package->package_img = $imagename;
        } else {
            $book_package->package_img = $image_name;
        }
        $book_package->package_name = $request->package_name;
        $book_package->package_desc = $request->package_desc;
        $book_package->regular_price = $request->regular_price;
        $book_package->price = $request->price;
        $book_package->slug = Str::slug($request->package_name, '-');
        $book_package->update();
        if ($book_package->update()) {
            $package_id = $book_package->id;
            DB::table('book_in_packages')->where('package_id', $id)->delete();
            if ($request->select_books != '') {
                foreach ($request->select_books as $vl) {
                    $data = array(
                        'book_id' => $vl,
                        'package_id' => $package_id,
                    );
                    DB::table('book_in_packages')->insert($data);
                }
            }
            return redirect()->to('/admin/publication/the-taxman-publication/package/view')->with('success', 'Package updated successfully.');
        }
    }
    public function deletePackage($id)
    {
        $package = BookPackage::findOrFail($id);
        $package->status = 0;
        $package->update();
        BookInPackage::where('package_id', $id)->update(['status' => 0]);
        return redirect()->to('/admin/publication/the-taxman-publication/package/view')->with('success', 'Package deleted successfully.');
    }
    public function category()
    {
        $categories = PublicationCat::where('status', 1)->get();
        return view('admin.publication.category', compact('categories'))->with('no', 1);
    }
    public function cat_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'nullable',
            'cat_img' => 'image|mimes:jpeg,jpg,png,gif|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = new PublicationCat;
        $image = $request->file('cat_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/publication', $imagename);
            $category->cat_img = $imagename;
        }
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->description = $request->description;
        $category->save();
        return redirect('admin/publication/category')->with('success', 'Publication category created successfully.');
    }
    public function cat_edit($id)
    {
        $category = PublicationCat::findOrFail($id);
        return view('admin.publication.editcategory', compact('category'));
    }
    public function cat_update(Request $request, $id)
    {
        $category = PublicationCat::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|max:255',
            'description' => 'nullable',
            'cat_img' => 'image|mimes:jpeg,jpg,png,gif|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('cat_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads\publication', $imagename);
            $category->cat_img = $imagename;
        } else {
            $category->cat_img = $image_name;
        }
        $category->title = request('title');
        $category->description = request('description');
        $category->update();
        return redirect('admin/publication/category')->with('success', 'Publication category updated successfully.');
    }
    public function cat_delete($id)
    {
        $publication = Publication::where('pcat_id', $id);
        $publication->delete();
        $category = PublicationCat::findOrFail($id);
        $image_path = "uploads/publication/" . $category->cat_img; // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $category->delete();
        return redirect('admin/publication/category')->with('success', 'Publication category deleted successfully.');
    }
}
