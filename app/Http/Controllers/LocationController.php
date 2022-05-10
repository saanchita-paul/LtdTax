<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $district_id = Location::where('district_id', null)->orderBy('name')->get();
        $thana_id = Location::where('status', 1)->where('district_id', '!=', null)->get();
        return view('admin.location.all_location', compact('district_id', 'thana_id'))->with('no', 1);
    }
    public function add()
    {
        $district_id = Location::where('status', 1)->where('district_id', null)->orderBy('name')->get();
        $thana_id = Location::where('status', 1)->where('district_id', '!=', null)->orderBy('name')->get();
        return view('admin.location.add_location', compact('district_id', 'thana_id'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|max:255',
            'description' => 'nullable',
            'district_id' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $location = new Location;
        $location->name = $request->name;
        $location->slug = Str::slug($request->name, '-');
        $location->description = $request->description;
        $location->district_id = $request->district_id;
        $location->save();
        return redirect('/admin/location')->with('success', 'Thana added successfully');
    }
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        $thana_id = Location::where('status', 1)->where('district_id', $id)->orderBy('name')->get();
        return view('admin.location.edit_location', compact('location', 'thana_id'));
    }
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|max:255',
            'description' => 'nullable',
            'district_id' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $location->name = request('name');
        $location->description = request('description');
        $location->status = $request->status;
        $location->update();
        return redirect()->to('/admin/location')->with('success', 'District updated successfully');
    }
    public function district_delete($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->to('/admin/location')->with('success', 'District deleted successfully');
    }
    public function thana_delete($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->to('/admin/location')->with('success', 'Thana deleted successfully');
    }
}
