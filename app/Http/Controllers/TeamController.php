<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Validator;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $team = Team::where('status',1)->get();
        return view('admin.team.all_team',compact('team'))->with('no', 1); 
    }
    public function add() {
        return view('admin.team.add_team');
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'team_img' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $team = new Team;
        $image = $request->file('team_img');
        if($image != '')
        {   
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/team', $filename);
            $team->team_img  = $filename;
        }
        $team->title = $request->title;
        $team->description = $request->description;
        $team->save();
        return redirect('/admin/team')->with('success','Team created successfully.');
    }
    public function edit($id) {
        $team = Team::findOrFail($id);
        return view('admin.team.edit_team', compact('team'));
    }
    public function update(Request $request, $id) {
        $team = Team::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'team_img' => 'image|mimes:jpeg,jpg,png,gif',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image_name = $request->hidden_image;
        $image = $request->file('team_img');
        if($image != '')
        {   
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
            $filename = $f_n.'-'.time() . '.' .$ext;
            $image->move('uploads/team', $filename);
            $team->team_img = $filename;
        }
        else
        {
            $team->team_img = $image_name;
        }
        $team->title = request('title');
        $team->description = request('description');
        $team->update();
        return redirect()->to('/admin/team')->with('success','Team updated successfully.');
    }
    public function delete($id) {
        $team = Team::findOrFail($id);
        $team->status = 0;
        $team->update();  
        return redirect()->to('/admin/team')->with('success','Team deleted successfully.');
    }
}