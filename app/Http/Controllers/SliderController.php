<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\SliderImage;
use App\Models\SliderGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $slider = Slider::where('status','!=',2)->get();
        $slider_images = SliderImage::where('status', 1)->orderBy('id', 'desc')->get();
        $slider_gallery = SliderGallery::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.slider.all_slider',compact('slider','slider_images','slider_gallery'))->with('no', 1); 
    }
    public function sliderImages(){
        $images = SliderGallery::where('status',1)->orderBy('id','desc')->get();
        return view('admin.slider.image.all_images',compact('images'))->with('no', 1); 
    }

    public function add() {
        $images = SliderGallery::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.slider.add_slider',compact('images'));
    }
    public function addImage() {
  
        return view('admin.slider.image.add_image');
    }
    
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slider_desc' => 'nullable|string|max:5000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->description = $request->slider_desc;
        if($request->status == 1){
            $s_all = Slider::where('status',1)->get();
            if(!empty($s_all)){
                DB::table('sliders')->update(['status' => 0 ]);
                $slider->status = 1;
            }else{
                $slider->status = $request->status;
            }
        }else{
            $slider->status = $request->status;
        }
        if($slider->save()){
            $slider_id =$slider->id;
            foreach ($request->select_slider_img as $key => $vl) {
                $data = array(
                    'slider_id' => $slider->id,
                    'img_id' => $vl,
                );
                SliderImage::insert($data);
            }
        }
        return redirect('/admin/slider')->with('success','Slider created successfully.');
    }
    public function storeImage(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'url'=>'nullable|url',
            'slider_img' => 'image|mimes:jpeg,jpg,png,gif|required|max:2040',          
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider = new SliderGallery;
        $image = $request->file('slider_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/slider', $filename);
            $slider->slider_img = $filename;
        }
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->save();
        return redirect('/admin/slider/images')->with('success','Slider image created successfully.');
    }
    public function delete_gallery($id)
    {
        $gallery = SliderGallery::findOrFail($id);
        $gallery->delete();
        return redirect()->back();
    }
    public function edit($id) {
        $slider = Slider::findOrFail($id);
        $slider_images = DB::table('slider_images')->orderBy('id', 'desc')->where('slider_id', $id)->where('status', 1)->get();
        $slider_gallery = SliderGallery::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.slider.edit_slider', compact('slider_images','slider','slider_gallery'));
    }
    public function editImage($id) {
        $images = SliderGallery::findOrFail($id);
        return view('admin.slider.image.edit_image', compact('images'));
    }
    public function updateImage(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'url'=>'nullable|url',
            'slider_img' => 'image|mimes:jpeg,jpg,png,gif|max:2040',          
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider = SliderGallery::findOrFail($id);
        $image_name = $request->hidden_image;
        $image = $request->file('slider_img');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/slider', $filename);
            $slider->slider_img = $filename;
        }
        else {
            $slider->slider_img = $image_name;
        }
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->update();
        return redirect('/admin/slider/images')->with('success','Slider image updated successfully.');
    }
    public function update(Request $request, $id) {
    //    dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slider_desc' => 'nullable|string|max:5000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider = Slider::findOrFail($id);
        $slider->title = $request->title;
        $slider->description = $request->slider_desc;
        if($request->status == 1 && $slider->status != 1){
            $s_all = Slider::where('status',1)->get();
            if(!empty($s_all)){
                DB::table('sliders')->update(['status' => 0 ]);
                $slider->status = 1;
            }else{
                $slider->status = $request->status;
            }
        }else{
            $slider->status = $request->status;
        }
        if($slider->update()){
            $slider_id =$slider->id;
            SliderImage::where('slider_id', $slider_id)->delete();
            foreach ($request->select_slider_img as $key => $vl) {
                $data = array(
                    'slider_id' => $slider->id,
                    'img_id' => $vl,
                );
                SliderImage::insert($data);
            }
        }
        return redirect('/admin/slider')->with('success','Slider updated successfully.');
    }
    public function delete($id) {
        $slider = Slider::findOrFail($id);
        $slider->status = 2;
        $slider->update();
        SliderImage::where('slider_id', $id)->update(['status' => 0]);
        return redirect()->to('/admin/slider')->with('success','Slider deleted successfully.');
    }
    public function deleteImage($id){
        $slider = SliderGallery::findOrFail($id);
        $slider->status = 0;
        $slider->update();
        return redirect('/admin/slider/images')->with('success','Slider image deleted successfully.');
    }
}