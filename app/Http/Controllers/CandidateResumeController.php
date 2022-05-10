<?php

namespace App\Http\Controllers;

use App\Models\CandidateInfo;
use App\Models\CandidateOtherRev;
use App\Models\Education;
use App\Models\EducationInfo;
use App\Models\JobCat;
use App\Models\Location;
use App\Models\PrefOrg;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class CandidateResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function all()
    {
        $users = User::where('status', 1)->where('user_role', 2)->orderBy('id', 'desc')->get();
        return view('admin.candidate.all_candidate', compact('users'))->with('no', 1);
    }
    public function index()
    {

        $candidate = CandidateInfo::where('status', 1)->get();
        return view('admin.candidate.all_candidate', compact('candidate'))->with('no', 1);
    }
    //candidate resume
    public function jobApplicantResume($id)
    {
        $title = 'The Taxman';
        $meta_img = '';
        $description = '';
        $users = User::findOrFail($id);
        $user_id = $users->id;
        $districts = Location::where('district_id', null)->get();
        $thana = Location::whereNotNull('district_id')->get();
        //career_and_application_info
        $job_categories = JobCat::all();
        $user_data = DB::table('users')
            ->join('personal_infos', 'personal_infos.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->first();
        // career_and_application_info
        $user_career = DB::table('careers')->where('personal_id', $user_id)->first();
        $all_skills = DB::table('skills')->where('status',1)->get();
        $candidate_skill = DB::table('candidate_skills')->where('status',1)->where('user_id', $user_id)->get();

        // other relevent information
        $educations = EducationInfo::where('user_id', $users->id)->get();
        $education = Education::all();
        $language = DB::table('candidate_languages')->where('user_id', $users->id)->get();
        $edu_training = DB::table('education_trainings')->where('user_id', $user_id)->get();
        // employment
        $experience = DB::table('candidate_employments')->where('user_id', $user_id)->get();
        $p_certificate = DB::table('professional_certificates')->where('status',1)->where('user_id', $user_id)->get();
        $reference = DB::table('candidate_refers')->where('user_id', $user_id)->get();
        $candidate_other_info = CandidateOtherRev::where('user_id', $users->id)->first();
        return view('admin.candidate.resume', compact('thana', 'user_data', 'districts', 'job_categories', 'user_career', 'candidate_other_info', 'p_certificate', 'edu_training', 'experience','candidate_skill','all_skills', 'language', 'reference', 'title', 'meta_img', 'description', 'educations', 'education'));
    }
    public function add()
    {
        $district_id = Location::where('status', 1)->where('district_id', null)->get();
        $thana_id = Location::where('status', 1)->where('district_id', '!=', null)->get();

        $candidate = CandidateInfo::where('status', 1)->get();
        $location = Location::where('status', 1)->get();
        return view('admin.candidate.add_candidate', compact('candidate', 'location', 'district_id', 'thana_id'));
    }
    public function thana($id)
    {
        $thana = Location::where('status', 1)->where("district_id", $id)->pluck("name", "id");
        return json_encode($thana);
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'location_id' => 'nullable|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255',
            'fathers_name' => 'nullable',
            'mothers_name' => 'nullable',
            'dob' => 'nullable',
            'religion' => 'nullable',
            'marital_status' => 'nullable|max:255',
            'nationality' => 'nullable',
            'nid' => 'nullable',
            'passport' => 'nullable',
            'passport_issue_date' => 'nullable',
            'mobile1' => 'required|max:255',
            'mobile2' => 'nullable',
            'mobile3' => 'nullable',
            'email' => 'nullable',
            'alt_email' => 'required|max:255',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'post_code' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $candidate = new CandidateInfo;
        $candidate->location_id = $request->location_id;
        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->username = $request->username;
        $candidate->slug = Str::slug($request->username, '-');
        $candidate->fathers_name = $request->fathers_name;
        $candidate->mothers_name = $request->mothers_name;
        $candidate->dob = $request->dob;
        $candidate->resume_option = $request->resume_option;
        $candidate->religion = $request->religion;
        $candidate->marital_status = $request->marital_status;
        $candidate->nationality = $request->nationality;
        $candidate->nid = $request->nid;
        $candidate->passport = $request->passport;
        $candidate->passport_issue_date = $request->passport_issue_date;
        $candidate->mobile1 = $request->mobile1;
        $candidate->mobile2 = $request->mobile2;
        $candidate->mobile3 = $request->mobile3;
        $candidate->email = $request->email;
        $candidate->alt_email = $request->alt_email;
        $candidate->address1 = $request->address1;
        $candidate->address2 = $request->address2;
        $candidate->post_code = $request->post_code;
        $candidate->save();
        return redirect('/admin/candidate')->with('success', 'Candidate Information created successfully.');
    }
    public function edit($id)
    {
        $candidate = CandidateInfo::findOrFail($id);
        $location = Location::where('status', 1)->get();
        return view('admin.candidate.edit_candidate', compact('candidate', 'location'));
    }
    public function update(Request $request, $id)
    {
        $candidate = CandidateInfo::findOrFail($id);
        $location = Location::where('status', 1)->get();
        $validator = Validator::make($request->all(), [
            'location_id' => 'nullable|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255',
            'fathers_name' => 'nullable',
            'mothers_name' => 'nullable',
            'dob' => 'nullable',
            'religion' => 'nullable',
            'marital_status' => 'nullable|max:255',
            'nationality' => 'nullable',
            'nid' => 'nullable',
            'passport' => 'nullable',
            'passport_issue_date' => 'nullable',
            'mobile1' => 'required|max:255',
            'mobile2' => 'nullable',
            'mobile3' => 'nullable',
            'email' => 'nullable',
            'alt_email' => 'required|max:255',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'post_code' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $candidate->location_id = request('location_id');
        $candidate->first_name = request('first_name');
        $candidate->last_name = request('last_name');
        $candidate->username = request('username');
        $candidate->fathers_name = request('fathers_name');
        $candidate->mothers_name = request('mothers_name');
        $candidate->dob = request('dob');
        $candidate->religion = request('religion');
        $candidate->marital_status = request('marital_status');
        $candidate->nationality = request('nationality');
        $candidate->nid = request('nid');
        $candidate->passport = request('passport');
        $candidate->passport_issue_date = request('passport_issue_date');
        $candidate->mobile1 = request('mobile1');
        $candidate->mobile2 = request('mobile2');
        $candidate->mobile3 = request('mobile3');
        $candidate->email = request('email');
        $candidate->alt_email = request('alt_email');
        $candidate->address1 = request('address1');
        $candidate->address2 = request('address2');
        $candidate->post_code = request('post_code');
        $candidate->update();
        return redirect()->to('/admin/candidate')->with('success', 'Candidate Information updated successfully.');
    }
    public function delete($id)
    {
        $candidate = User::findOrFail($id);
        $candidate->status = 0;
        $candidate->update();
        return back()->with('success', 'Candidate deleted successfully.');
    }
    public function preforg()
    {
        $preforg = PrefOrg::where('status', 1)->get();
        return view('admin.candidate.preforg', compact('preforg'))->with('no', 1);
    }
    public function preforg_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $preforg = new PrefOrg;
        $preforg->title = $request->title;
        $preforg->slug = Str::slug($request->title, '-');
        $preforg->description = $request->description;
        $preforg->save();
        return redirect('admin/candidate/preforg')->with('success', 'Preferred organization created successfully.');
    }
    public function preforg_edit($id)
    {
        $preforg = PrefOrg::findOrFail($id);
        return view('admin.candidate.editpreforg', compact('preforg'));
    }
    public function preforg_update(Request $request, $id)
    {
        $preforg = PrefOrg::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|max:255',
            'description' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $preforg->title = request('title');
        $preforg->description = request('description');
        $preforg->update();
        return redirect('admin/candidate/preforg')->with('success', 'Preferred organization updated successfully.');
    }
    public function preforg_delete($id)
    {
        $preforg = PrefOrg::findOrFail($id);
        $preforg->delete();
        return redirect('admin/candidate/preforg')->with('success', 'Preferred organization deleted successfully.');
    }
}
