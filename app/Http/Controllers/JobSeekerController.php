<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\FooterJobSeeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Validator;
use Illuminate\Support\Str;


class JobSeekerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $jobseeker = FooterJobSeeker::where('status',1)->get();
        return view('admin.footer.jobseeker.all_jobseeker',compact('jobseeker'))->with('no', 1); 
    }
    public function add() {
        return view('admin.footer.jobseeker.add_jobseeker');
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'url' => 'url|string|nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $jobseeker = new FooterJobSeeker;
        $jobseeker->title = $request->title;
        $jobseeker->url = $request->url;
        $jobseeker->save();
        return redirect('/admin/footer/jobseeker')->with('success','Jobseeker option created successfully.');
    }
    public function edit($id) {  
        $jobseeker = FooterJobSeeker::findOrFail($id);
        return view('admin.footer.jobseeker.edit_jobseeker', compact('jobseeker'));
    }
    public function update(Request $request, $id) {
        $jobseeker = FooterJobSeeker::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'url' => 'url|string|nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $jobseeker->title = request('title');
        $jobseeker->url = request('url');
        $jobseeker->update();
        return redirect()->to('/admin/footer/jobseeker')->with('success','Jobseeker option updated successfully.');
    }
    public function delete($id) {
        $jobseeker = FooterJobSeeker::findOrFail($id);
        $jobseeker->status=0;
        $jobseeker->update();
        return redirect()->to('/admin/footer/jobseeker')->with('success','Jobseeker option deleted successfully.');
    }
}