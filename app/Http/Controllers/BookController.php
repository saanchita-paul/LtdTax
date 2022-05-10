<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGallery;
use App\Models\BookReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_book()
    {
        return view('admin.books.add');
    }

    // Store book
    public function book_store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'gallery_img[]' => 'nullable',
            'author_name' => 'nullable',
            'book_name' => 'required|max:255',
            'no_of_page' => 'nullable|max:255',
            'year_of_issue' => 'nullable|max:255',
            'cover_page' => 'nullable',
            'regular_price' => 'nullable',
            'sale_price' => 'nullable',
            'size' => 'nullable',
            'short_desc' => 'nullable',
            'description' => 'nullable',
            'short_desc' => 'nullable',
            'file_upload' => 'file|mimes:pdf|required',
            'feature_img' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $book = new Book;
        $image = $request->file('feature_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/book', $imagename);
            $book->feature_img = $imagename;
        }
        $up_file = $request->file('file_upload');
        if ($up_file != '') {
            $ext = pathinfo($up_file->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($up_file->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;
            $up_file->move('uploads/book', $filename);
            $book->file_upload = $filename;
        }
        $book->author_name = $request->author_name;
        $book->name = $request->book_name;
        $book->slug = Str::slug($request->book_name);
        $book->no_of_page = $request->no_of_page;
        $book->year_of_issue = $request->year_of_issue;
        $book->cover_page = $request->cover_page;
        $book->regular_price = $request->regular_price;
        $book->sale_price = $request->sale_price;
        $book->size = $request->size;
        $book->short_desc = $request->short_desc;
        $book->description = $request->description;
        if ($book->save()) {
            $book_id = $book->id;

            if ($request->file('gallery_img') != '') {
                $gallery = $request->file('gallery_img');
                foreach ($gallery as $img2) {
                    $ext = pathinfo($img2->getClientOriginalName(), PATHINFO_EXTENSION);
                    $f_n = Str::slug(pathinfo($img2->getClientOriginalName(), PATHINFO_FILENAME),'-');
                    $imagename2 = $f_n.'-'.time() . '.' .$ext;
                    $img2->move('uploads/book', $imagename2);
                    $data['name'] = $imagename2;
                    $data['book_id'] = $book_id;
                    DB::table('book_galleries')->insert($data);
                }
            }
        }
        return redirect('/admin/books')->with('success', 'Book Added successfully.');
    }
    // book list
    public function list_book()
    {
        $book = Book::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.books.index', compact('book'));
    }
    // product edit form
    public function edit_book($id)
    {
        $book = Book::findOrFail($id);
        $gallery = DB::table('book_galleries')->where('book_id', $id)->get();
        return view('admin.books.edit', compact('book', 'gallery'));
    }
    // Delete Gallery Image
    public function delete_gallery($id)
    {
        $gallery = BookGallery::findOrFail($id);
        $gallery->delete();
        return redirect()->back();
    }
    // update product section
    public function update_book(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'gallery_img[]' => 'nullable',
            'author_name' => 'nullable|max:255',
            'book_name' => 'required|max:255',
            'no_of_page' => 'nullable|max:255',
            'year_of_issue' => 'nullable|max:255',
            'cover_page' => 'nullable',
            'regular_price' => 'nullable',
            'sale_price' => 'nullable',
            'size' => 'nullable',
            'short_desc' => 'nullable',
            'description' => 'nullable',
            'short_desc' => 'nullable',
            'file_upload' => 'file|max:5120|mimes:pdf',
            'feature_img' => 'image|mimes:jpeg,jpg,png,gif|nullable',
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
            $image->move('uploads/book', $imagename);
            $book->feature_img = $imagename;
        } else {
            $book->feature_img = $image_name;
        }
        $file_name = $request->hidden_file;
        $up_file = Str::slug($request->file('file_upload'));
        if ($up_file != '') {
            $ext = pathinfo($up_file->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($up_file->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time(). '.' .$ext;
            $up_file->move('uploads/book', $filename);
            $book->file_upload = $filename;
        } else {
            $book->file_upload = $file_name;
        }
        $book->author_name = request('author_name');
        $book->name = request('book_name');
        $book->slug = Str::slug($request->book_name, '-');
        $book->no_of_page = request('no_of_page');
        $book->year_of_issue = request('year_of_issue');
        $book->cover_page = request('cover_page');
        $book->regular_price = request('regular_price');
        $book->sale_price = request('sale_price');
        $book->weight = request('weight');
        $book->size = request('size');
        $book->short_desc = request('short_desc');
        $book->description = request('description');
        $book->update();
        $book_id = $book->id;
        $gallery = $request->file('gallery_img');
        if ($request->hasFile('gallery_img')) {
            foreach ($gallery as $img2) {
                $ext = pathinfo($img2->getClientOriginalName(), PATHINFO_EXTENSION);
                $f_n = Str::slug(pathinfo($img2->getClientOriginalName(), PATHINFO_FILENAME),'-');
                $imagename2 = $f_n.'-'.time() . '.' .$ext;
                $img2->move('uploads/book', $imagename2);
                $data['name'] = $imagename2;
                $data['book_id'] = $book_id;
                DB::table('book_galleries')->insert($data);
            }
        }
        return redirect()->to('/admin/books')->with('success', 'Book Updated successfully.');
    }
    public function delete_book($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        $book = BookGallery::where('book_id', $id);
        $book->delete();
        return redirect()->back()->with('success', 'Book Deleted successfully.');
    }
    public function book_review_get()
    {
        $review = BookReview::latest()->paginate(10);
        $user = User::all();
        $book = Book::all();
        return view('admin.books.review', compact('review', 'user', 'book'))->with('no', 1);
    }
    public function book_review_destroy($id)
    {
        BookReview::where('id', $id)->delete();
        return back()->with('success', 'Successfully Delete review');
    }
    public function book_review_statis($id, $status)
    {
        $data = array('status' => $id);
        BookReview::where('id', $status)->update($data);
        return back()->with('success', 'Successfully Update review');
    }
}
