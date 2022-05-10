<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Training;
use App\Models\TrainingCat;
use App\Models\TrainingContact;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $training = Training::where('status', 1)->get();
        return view('admin.training.all_training', compact('training'))->with('no', 1);
    }
    public function add()
    {
        $categories = TrainingCat::where('status', 1)->get();
        $trainer = User::where('user_role',3)->where('status',1)->get();
        return view('admin.training.add_training', compact('categories','trainer'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'tcat_id' => 'required|integer',
            'train_img' => 'required|image|mimes:jpeg,jpg,png,gif,webp',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'end_of_reg' => 'required|string',
            'venue' => 'required|string',
            'duration' => 'required|string',
            'regular_price' => 'required|integer',
            'price' => 'required|integer',
            'course_outline' => 'nullable|string',
            'participant' => 'nullable|string',
            'outcome' => 'nullable|string',
            'trainer_id' => 'required|integer',
            'trainer_position' => 'required|string',
            'trainer_cv'=>'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $training = new Training;
        $image = $request->file('train_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/training', $imagename);
            $training->train_img = $imagename;
        }
        $training->title = $request->title;
        $training->slug = Str::slug($request->title, '-');
        $training->tcat_id = $request->tcat_id;
        $training->start_date = $request->start_date;
        $training->end_date = $request->end_date;
        $training->end_of_reg = $request->end_of_reg;
        $training->venue = $request->venue;
        $training->duration = $request->duration;
        $training->regular_price = $request->regular_price;
        $training->price = $request->price;
        $training->course_outline = $request->course_outline;
        $training->participant = $request->participant;
        $training->outcome = $request->outcome;
        $training->trainer_id = $request->trainer_id;
        $training->trainer_position = $request->trainer_position;
        $training->trainer_cv = $request->trainer_cv;
        $training->save();
        return redirect('/admin/training')->with('success', 'Training created successfully.');
    }
    public function edit($id)
    {
        $training = Training::findOrFail($id);
        $categories = TrainingCat::where('status', 1)->get();
        $trainer = User::where('user_role',3)->where('status',1)->get();
        return view('admin.training.edit_training', compact('training', 'categories', 'trainer'));
    }
    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'tcat_id' => 'required|integer',
            'train_img' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'end_of_reg' => 'required|string',
            'venue' => 'required|string',
            'duration' => 'required|string',
            'regular_price' => 'required|integer',
            'price' => 'required|integer',
            'course_outline' => 'nullable|string',
            'participant' => 'nullable|string',
            'outcome' => 'nullable|string',
            'trainer_id' => 'required|integer',
            'trainer_position' => 'required|string',
            'trainer_cv'=>'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('train_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/training', $imagename);
            $training->train_img = $imagename;
        } else {
            $training->train_img = $image_name;
        }
        $training->title = $request->title;
        $training->slug = Str::slug($request->title, '-');
        $training->tcat_id = $request->tcat_id;
        $training->start_date = $request->start_date;
        $training->end_date = $request->end_date;
        $training->end_of_reg = $request->end_of_reg;
        $training->venue = $request->venue;
        $training->duration = $request->duration;
        $training->regular_price = $request->regular_price;
        $training->price = $request->price;
        $training->course_outline = $request->course_outline;
        $training->participant = $request->participant;
        $training->outcome = $request->outcome;
        $training->trainer_id = $request->trainer_id;
        $training->trainer_position = $request->trainer_position;
        $training->trainer_cv = $request->trainer_cv;
        $training->update();
        return redirect()->to('/admin/training')->with('success', 'Training updated successfully.');
    }
    public function delete($id)
    {
        $training = Training::findOrFail($id);
        // $image_path = "uploads/training/" . $training->train_img; // Value is not URL but directory file path
        // if (File::exists($image_path)) {
        //     File::delete($image_path);
        // }
        $training->status = 0;
        $training->update();
        return redirect()->to('/admin/training')->with('success', 'Training deleted successfully.');
    }
    public function category()
    {
        $categories = TrainingCat::where('status', 1)->get();
        return view('admin.training.category', compact('categories'))->with('no', 1);
    }
    public function cat_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'description' => 'nullable|string',
            'cat_img' => 'image|mimes:jpeg,jpg,png,gif|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = new TrainingCat;
        $image = $request->file('cat_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/training', $imagename);
            $category->cat_img = $imagename;
        }
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->description = $request->description;
        $category->save();
        return redirect('admin/training/category')->with('success', 'Training category created successfully.');
    }
    public function cat_edit($id)
    {
        $category = TrainingCat::findOrFail($id);
        return view('admin.training.editcategory', compact('category'));
    }
    public function cat_update(Request $request, $id)
    {
        $category = TrainingCat::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'description' => 'nullable|string',
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
            $image->move('uploads/training', $imagename);
            $category->cat_img = $imagename;
        } else {
            $category->cat_img = $image_name;
        }
        $category->title = request('title');
        $category->description = request('description');
        $category->update();
        return redirect('admin/training/category')->with('success', 'Training category updated successfully.');
    }
    public function cat_delete($id)
    {
        $category = TrainingCat::findOrFail($id);
        $category->status = 0;
        $category->update();
        return redirect('admin/training/category')->with('success', 'Training category deleted successfully.');
    }
    public function allTrainer(){
        $trainer = User::where('user_role', 3)->where('status', 1)->get();
        return view('admin.training.trainer.all_trainer',compact('trainer'));
    }
    public function addTrainer(){
        return view('admin.training.trainer.add_trainer');
    }
    public function storeTrainer(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20|unique:users',
            'email' => 'required|max:255|unique:users|email',
            'phone' => 'nullable|string|max:15|unique:users',
            'password' => 'required|string|min:8',
            'photo' => 'image|mimes:jpeg,jpg,png,gif|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $trainer = new User;
        $image = $request->file('photo');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $imagename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/users', $imagename);
            $trainer->photo = $imagename;
        }
        $trainer->name = $request->name;
        $trainer->username = $request->name;
        $trainer->email = $request->email;
        $trainer->phone = $request->phone;
        $trainer->password = Hash::make($request->password);
        $trainer->user_role = 3;
        $trainer->save();
        return redirect('/admin/training/all-trainer')->with('success', 'Trainer Added successfully.');
    }
    public function editTrainer($id)
    {
        $trainer = User::findOrFail($id);
        return view('admin.training.trainer.edit_trainer', compact('trainer'));
    }
    public function updateTrainer(Request $request, $id)
    {
        $trainer = User::findOrFail($id);
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
            $trainer->photo = $imagename;
        } else {
            $trainer->photo = $image_name;
        }
        $trainer->name = request('name');
        $trainer->username = request('name');
        $trainer->email = request('email');
        $trainer->phone = request('phone');
        if ($request->password != null) {
            $trainer->password = Hash::make($request->password);
        }
        $trainer->update();
        return redirect()->to('/admin/training/all-trainer')->with('success', 'Trainer Updated successfully.');
    }
    public function deleteTrainer($id)
    {
        $trainer = User::findOrFail($id);
        $trainer->status = 0;
        $trainer->update();
        return redirect()->back()->with('success', 'Trainer Deleted successfully.');
    }
}
