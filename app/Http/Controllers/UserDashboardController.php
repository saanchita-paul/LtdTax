<?php

namespace App\Http\Controllers;

use App\Models\AppliedJob;
use App\Models\CandidateEmployment;
use App\Models\CandidateInfo;
use App\Models\CandidateLanguage;
use App\Models\CompanyAltName;
use App\Models\CandidateOtherRev;
use App\Models\CandidateRefer;
use App\Models\CandidateSkill;
use App\Models\RequiredJobSkill;
use App\Models\CandidateQualification;
use App\Models\Career;
use App\Models\ComInfoMatchingVisibility;
use App\Models\CompanyBillingAddress;
use App\Models\CompanyContactDetail;
use App\Models\CompanyDetailInfo;
use App\Models\Education;
use App\Models\EducationInfo;
use App\Models\EducationTraining;
use App\Models\Job;
use App\Models\JobCat;
use App\Models\Location;
use App\Models\MoreJob;
use App\Models\PersonalInfo;
use App\Models\RequiredProfessionalDegree;
use App\Models\ProfessionalCertificate;
use App\Models\ResumeForJob;
use App\Models\ResumeViewStatus;
use App\Models\Skill;
use App\Models\User;
use App\Models\CandidateProfessionalDegree;
use App\Rules\MatchOldPassword;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use Validator;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user_dashboard()
    {
        $users = Auth::user();
        if ($users != null) {
            if ($users->user_role == 2) {
                $title = 'User Dashboard';
                $meta_img = '';
                $description = '';

                return view('userdashboard.home', compact('title', 'meta_img', 'description'));} else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }

    }

    public function edit_resume()
    {
        $title = 'Edit User Resume';
        $meta_img = '';
        $description = '';
        $users = Auth::user();
        if ($users != null) {

            if ($users->user_role == 2) {
                $user_id = $users->id;
                // $user_data = User::find($user_id);
                $districts = Location::where('district_id', null)->get();
                // dd($districts->id);
                //career_and_application_info
                $job_categories = JobCat::all();

                $user_data = DB::table('users')
                    ->join('personal_infos', 'personal_infos.user_id', '=', 'users.id')
                    ->where('users.id', $user_id)
                    ->first();
                // career_and_application_info
                $user_career = DB::table('careers')->where('personal_id', $user_id)->first();
                $skill = DB::table('candidate_skills')->where('user_id', $users->id)->get();
                // other relevent information
                $language = DB::table('candidate_languages')->where('user_id', $users->id)->get();
                $edu_training = DB::table('education_trainings')->where('user_id', $user_id)->get();
                $experience = DB::table('candidate_employments')->where('user_id', $user_id)->get(); // employment
                $p_certificate = DB::table('professional_certificates')->where('status', 1)->where('user_id', $user_id)->get();
                $reference = DB::table('candidate_refers')->where('user_id', $user_id)->get();
                $candidate_other_info = CandidateOtherRev::where('user_id', $users->id)->first();
                return view('userdashboard.index', compact('user_data', 'districts', 'job_categories', 'user_career', 'candidate_other_info', 'p_certificate', 'edu_training', 'experience', 'skill', 'language', 'reference', 'title', 'meta_img', 'description'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }

    public function employer_dashboard()
    {

        $title = 'Company Dashboard';
        $meta_img = '';
        $description = '';
        $users = Auth::user();
        if ($users->user_role == 0) {
            $empinfo = DB::table('company_detail_infos')->where('user_id', $users->id)->first();
            $districts = Location::whereNull('district_id')->get();
            if ($empinfo != '') {
                $contact = CompanyContactDetail::where('status', 1)->where('company_id', $empinfo->id)->orderBy('id', 'desc')->first();
            }
            if ($empinfo != '') {
                $billing = CompanyBillingAddress::where('status', 1)->where('company_id', $empinfo->id)->orderBy('id', 'desc')->first();
                //dd($billing);
            }
            if ($empinfo != '') {
                return view('empdashboard.index', compact('empinfo', 'districts', 'contact', 'billing', 'title', 'meta_img', 'description'));
            } else {
                return view('empdashboard.index', compact('empinfo', 'districts', 'title', 'meta_img', 'description'));
            }
        } else {
            return redirect('/login');
        }
    }

    public function upPhoto(Request $request)
    {

        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'photo' => 'image|mimes:jpeg,jpg,png,gif|nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $photo = User::findOrFail($user_id);
        $s_photo = $photo->photo;

        $image = $request->file('photo');
        $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
        $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
        $imagename = $f_n.'-'.time() . '.' .$ext;
        $image->move('uploads/users', $imagename);
        $photo->photo = $imagename;
        $photo->save();
        return back()->with('success', 'Photo uploaded successfully.');

    }

//employment / experience
    public function employmentUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'company_business' => 'required',
            'designation' => 'required',
            'department' => 'nullable',
            'area_responsibility' => 'required',
            'company_location' => 'nullable',
            'employment_period_start' => 'required',
            'employment_period_end' => 'required',

        ]);
// dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = Auth::user()->id;

        $d = CandidateEmployment::where('user_id', $id)->delete();

        foreach ($request->company_name as $key => $vl) {
            $data = array(
                'user_id' => $id,
                'company_name' => $vl,
                'company_business' => $request->company_business[$key],
                'designation' => $request->designation[$key],
                'department' => $request->department[$key],
                'area_responsibility' => $request->area_responsibility[$key],
                'company_location' => $request->company_location[$key],
                'employment_period_start' => $request->employment_period_start[$key],
                'employment_period_end' => $request->employment_period_end[$key],
            );
            CandidateEmployment::insert($data);
        }
        return redirect('/user/edit-resume')->with('success', 'Experience created successfully.');
    }

    //skill

    public function skillUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'skills' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = Auth::user()->id;

        $d = CandidateSkill::where('user_id', $id)->delete();

        foreach ($request->skills as $key => $vl) {
            $data = array(
                'skill_id' => $vl,
                'user_id' => $id,
            );
            CandidateSkill::insert($data);
        }
        return redirect('/user/edit-resume')->with('success', 'Skill created successfully.');
    }
    //professional degree candidate
    public function professionalDegreeUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'professional_degree' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = Auth::user()->id;

        $d = CandidateProfessionalDegree::where('user_id', $id)->delete();

        foreach ($request->professional_degree as $key => $vl) {
            $data = array(
                'degree_id' => $vl,
                'user_id' => $id,
            );
            CandidateProfessionalDegree::insert($data);
        }
        return redirect('/user/edit-resume')->with('success', 'Professional degree created successfully.');
    }

    //reference
    public function referenceUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ref_name' => 'required',
            'ref_designation' => 'required|max:255',
            'ref_org' => 'required',
            'ref_email' => 'nullable',
            'ref_relation' => 'nullable',
            'ref_mobile' => 'required',
            'ref_phone_off' => 'nullable',
            'ref_phone_res' => 'nullable',
            'ref_address' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = Auth::user()->id;

        $d = CandidateRefer::where('user_id', $id)->delete();

        foreach ($request->ref_name as $key => $vl) {
            $data = array(
                'user_id' => $id,
                'ref_name' => $vl,
                'ref_designation' => $request->ref_designation[$key],
                'ref_org' => $request->ref_org[$key],
                'ref_email' => $request->ref_email[$key],
                'ref_relation' => $request->ref_relation[$key],
                'ref_mobile' => $request->ref_mobile[$key],
                'ref_phone_off' => $request->ref_phone_off[$key],
                'ref_phone_res' => $request->ref_phone_res[$key],
                'ref_address' => $request->ref_address[$key],
            );
            CandidateRefer::insert($data);
        }
        return redirect('/user/edit-resume')->with('success', 'Reference created successfully.');
    }

//language

    public function updateLanguage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'language_name' => 'required|max:255',
            'reading' => 'required',
            'writing' => 'required',
            'speaking' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = Auth::user()->id;

        $d = CandidateLanguage::where('user_id', $id)->delete();

        foreach ($request->language_name as $key => $vl) {
            $data = array(
                'user_id' => $id,
                'language_name' => $vl,
                'reading' => $request->reading[$key],
                'writing' => $request->writing[$key],
                'speaking' => $request->speaking[$key],
            );
            CandidateLanguage::insert($data);
        }
        return redirect('/user/edit-resume')->with('success', 'Language created successfully.');
    }

    public function update(Request $request, $id = null)
    {
        $user = Auth::user()->id;
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'url' => 'nullable|url|regex:' . $regex,
            'file_upload' => 'file|max:5120|mimes:pdf|nullable',
            'logo' => 'image|mimes:jpeg,jpg,png,gif,webp|nullable',
            'description' => 'nullable',
            'district_id' => 'required',
            'thana_id' => 'required',
            'post_code' => 'required',
            'contact_name' => 'nullable|max:255|string',
            'designation' => 'nullable|string',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'nullable|email|string',
            'billing_address' => 'required|max:255|string',
            'billing_phone' => 'required|string',
            'billing_email' => 'required|email|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (!empty($id)) {
            $cominfo = CompanyDetailInfo::findOrFail($id);
            $contact = CompanyContactDetail::where('status', 1)->where('company_id', $id)->first();
            $billing = CompanyBillingAddress::where('status', 1)->where('company_id', $id)->first();

            $image_name = $request->hidden_image;
            $image = $request->file('logo');
            if ($image != '') {
                $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
                $imagename = $f_n.'-'.time() . '.' .$ext;
                $image->move('uploads/cominfo', $imagename);
                $cominfo->logo = $imagename;
            } else {
                $cominfo->logo = $image_name;
            }
            $file_name = $request->hidden_file;
            $up_file = $request->file('file_upload');
            if ($up_file != '') {
                $ext = pathinfo($up_file->getClientOriginalName(), PATHINFO_EXTENSION);
                $f_n = Str::slug(pathinfo($up_file->getClientOriginalName(), PATHINFO_FILENAME),'-');
                $filename = $f_n.'-'.time() . '.' .$ext;
                $up_file->move('uploads/cominfo', $filename);
                $cominfo->file_upload = $filename;
            } else {
                $cominfo->file_upload = $file_name;
            }
            $cominfo->status = 1;
            $cominfo->name = $request->name;
            $cominfo->slug = Str::of($request->name)->slug('-');
            $cominfo->address = $request->address;
            $cominfo->description = $request->description;
            $cominfo->user_id = $user;
            $cominfo->url = $request->url;
            $cominfo->district_id = $request->district_id;
            $cominfo->thana_id = $request->thana_id;
            $cominfo->post_code = $request->post_code;
            if ($cominfo->update()) {
                $contact->company_id = $id;
                $contact->name = $request->contact_name;
                $contact->designation = $request->designation;
                $contact->phone = $request->contact_phone;
                $contact->email = $request->contact_email;
                $contact->update();

                $billing->company_id = $id;
                $billing->address = $request->billing_address;
                $billing->phone = $request->billing_phone;
                $billing->email = $request->billing_email;
                $billing->update();
            }
        } else {
            $image = $request->file('file_upload');
            if (!empty($image)) {
                $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
                $imagename = $f_n.'-'.time() . '.' .$ext;
                $image->move('uploads/cominfo', $imagename);
            } else {
                $imagename = null;
            }
            $images = $request->file('logo');
            if (!empty($images)) {
                $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),'-');
                $imagename1 = $f_n.'-'.time() . '.' .$ext;
                $images->move('uploads/cominfo', $imagename1);
            } else {
                $imagename1 = null;
            }
            $company = CompanyDetailInfo::create(array(
                'user_id' => $user,
                'name' => $request->name,
                'slug' => Str::of($request->name)->slug('-'),
                'address' => $request->address,
                'description' => $request->description,
                'url' => $request->url,
                'district_id' => $request->district_id,
                'thana_id' => $request->thana_id,
                'post_code' => $request->post_code,
                'logo' => $imagename1,
                'file_upload' => $imagename,
            ));
            CompanyContactDetail::Create(array(
                'company_id' => $company->id,
                'name' => $request->contact_name,
                'designation' => $request->designation,
                'phone' => $request->contact_phone,
                'email' => $request->contact_email,
            ));
            CompanyBillingAddress::Create(array(
                'company_id' => $company->id,
                'address' => $request->billing_address,
                'phone' => $request->billing_phone,
                'email' => $request->billing_email,
            ));
        }
        return redirect()->back()->with('success', 'Company Profile updated successfully.');
    }

    public function personal_info_form(Request $request)
    {
        $users = Auth::user();
        // dd($request->all());
        $candidate = User::findOrFail($users->id);

        $candidate_info = PersonalInfo::where('user_id', $users->id)->first();
        // dd($candidate_info);
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'fathersname' => 'required|string',
            'fathersname' => 'required|string',
            'dob' => 'required|string',
            'religion' => 'required',
            'maritual_status' => 'required',
            'nationality' => 'required|string',
            'nid' => 'nullable|string',
            'passport' => 'nullable|string',
            'passport_issue_date' => 'nullable|string',
            'phone' => 'required|unique:users,phone,' .$users->id,
            'mobil_no2' => 'nullable|string',
            'mobil_no3' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' .$users->id,
            'gender' => 'required',
            'alt_email' => 'nullable|string',
            'present_district_id' => 'nullable|integer',
            'present_thana_id' => 'nullable|integer',
            'present_address_1' => 'nullable|string',
            'present_address_2' => 'nullable|string',
            'present_post_code' => 'nullable|numeric',
            'permanent_district_id' => 'nullable|integer',
            'permanent_thana_id' => 'nullable|integer',
            'permanent_address_1' => 'nullable|string',
            'permanent_address_2' => 'nullable|string',
            'permanent_post_code' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $candidate->name = $request->firstname;
        $candidate->lname = $request->lastname;
        $candidate->phone = $request->phone;
        $candidate->email = $request->email;
        $candidate->update();
        if ($candidate_info == null) {
            $slug = $request->firstname . '_' . $request->lastname;
            $candidate_info_create = new PersonalInfo();
            $candidate_info_create->user_id = $users->id;
            $candidate_info_create->slug = Str::slug($slug, '-');
            $candidate_info_create->fathers_name = $request->fathersname;
            $candidate_info_create->mothers_name = $request->mothersname;
            $candidate_info_create->dob = $request->dob;
            $candidate_info_create->religion = $request->religion;
            $candidate_info_create->marital_status = $request->maritual_status;
            $candidate_info_create->nationality = $request->nationality;
            $candidate_info_create->nid = $request->nid;
            $candidate_info_create->passport = $request->passport;
            $candidate_info_create->passport_issue_date = $request->passport_issue_date;
            $candidate_info_create->mobile2 = $request->mobil_no2;
            $candidate_info_create->mobile3 = $request->mobil_no3;
            $candidate_info_create->gender = $request->gender;
            $candidate_info_create->alt_email = $request->alt_email;
            $candidate_info_create->present_district_id = $request->present_district_id;
            $candidate_info_create->present_thana_id = $request->present_thana_id;
            $candidate_info_create->present_address_1 = $request->present_address_1;
            $candidate_info_create->present_address_2 = $request->present_address_2;
            $candidate_info_create->present_post_code = $request->present_post_code;
            $candidate_info_create->permanent_district_id = $request->permanent_district_id;
            $candidate_info_create->permanent_thana_id = $request->permanent_thana_id;
            $candidate_info_create->permanent_address_1 = $request->permanent_address_1;
            $candidate_info_create->permanent_address_2 = $request->permanent_address_2;
            $candidate_info_create->permanent_post_code = $request->permanent_post_code;
            $candidate_info_create->save();
            return redirect()->back()->with('success', 'Personal information Saved successfully.');
        } else {

            $candidate_info->fathers_name = $request->fathersname;
            $candidate_info->mothers_name = $request->mothersname;
            $candidate_info->dob = $request->dob;
            $candidate_info->religion = $request->religion;
            $candidate_info->marital_status = $request->maritual_status;
            $candidate_info->nationality = $request->nationality;
            $candidate_info->nid = $request->nid;
            $candidate_info->passport = $request->passport;
            $candidate_info->passport_issue_date = $request->passport_issue_date;
            $candidate_info->mobile2 = $request->mobil_no2;
            $candidate_info->mobile3 = $request->mobil_no3;
            $candidate_info->gender = $request->gender;
            $candidate_info->alt_email = $request->alt_email;
            $candidate_info->present_district_id = $request->present_district_id;
            $candidate_info->present_thana_id = $request->present_thana_id;
            $candidate_info->present_address_1 = $request->present_address_1;
            $candidate_info->present_address_2 = $request->present_address_2;
            $candidate_info->present_post_code = $request->present_post_code;
            $candidate_info->permanent_district_id = $request->permanent_district_id;
            $candidate_info->permanent_thana_id = $request->permanent_thana_id;
            $candidate_info->permanent_address_1 = $request->permanent_address_1;
            $candidate_info->permanent_address_2 = $request->permanent_address_2;
            $candidate_info->permanent_post_code = $request->permanent_post_code;

            $candidate_info->update();
            return redirect()->back()->with('success', 'Personal information Updated successfully.');
        }
    }

//personal address_info
    public function address_info(Request $request)
    {
        $users = Auth::user();
        // dd($request->all());
        $candidate = User::findOrFail($users->id);

        $candidate_info = PersonalInfo::where('user_id', $users->id)->first();
        // dd($candidate_info);
        $validator = Validator::make($request->all(), [
            'present_district_id' => 'required',
            'present_thana_id' => 'required',
            'present_address_1' => 'required',
            'present_address_2' => 'nullable',
            'present_post_code' => 'required|digits:4',
            'permanent_district_id' => 'required',
            'permanent_thana_id' => 'required',
            'permanent_address_1' => 'required',
            'permanent_address_2' => 'nullable',
            'permanent_post_code' => 'required|digits:4',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($candidate_info == null) {
            $candidate_info_create = new PersonalInfo;
            $candidate_info_create->present_district_id = $request->present_district_id;
            $candidate_info_create->present_thana_id = $request->present_thana_id;
            $candidate_info_create->present_address_1 = $request->present_address_1;
            $candidate_info_create->present_address_2 = $request->present_address_2;
            $candidate_info_create->present_post_code = $request->present_post_code;
            $candidate_info_create->permanent_district_id = $request->permanent_district_id;
            $candidate_info_create->permanent_thana_id = $request->permanent_thana_id;
            $candidate_info_create->permanent_address_1 = $request->permanent_address_1;
            $candidate_info_create->permanent_address_2 = $request->permanent_address_2;
            $candidate_info_create->permanent_post_code = $request->permanent_post_code;
            $candidate_info_create->save();
            return redirect()->back()->with('success', 'Address Saved successfully.');
        } else {

            $candidate_info->present_district_id = $request->present_district_id;
            $candidate_info->present_thana_id = $request->present_thana_id;
            $candidate_info->present_address_1 = $request->present_address_1;
            $candidate_info->present_address_2 = $request->present_address_2;
            $candidate_info->present_post_code = $request->present_post_code;
            $candidate_info->permanent_district_id = $request->permanent_district_id;
            $candidate_info->permanent_thana_id = $request->permanent_thana_id;
            $candidate_info->permanent_address_1 = $request->permanent_address_1;
            $candidate_info->permanent_address_2 = $request->permanent_address_2;
            $candidate_info->permanent_post_code = $request->permanent_post_code;

            $candidate_info->update();
            return redirect()->back()->with('success', 'Address Updated successfully.');
        }

    }

//professional certificate
    public function certificateUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'certificate_title' => 'required',
            'certificate_institution' => 'required',
            'certificate_location' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required',
            'certificate_period' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = Auth::user()->id;

        $d = ProfessionalCertificate::where('user_id', $id)->delete();

        foreach ($request->certificate_title as $key => $vl) {
            $data = array(
                'user_id' => $id,
                'certificate_title' => $vl,
                'certificate_institution' => $request->certificate_institution[$key],
                'certificate_location' => $request->certificate_location[$key],
                'start_date' => $request->start_date[$key],
                'end_date' => $request->end_date[$key],
                'certificate_period' => $request->certificate_period[$key],
            );
            ProfessionalCertificate::insert($data);
        }
        return redirect('user/edit-resume')->with('success', 'Professional certificate added successfully.');

    }

    // career_and_application_info
    public function career_and_application_info(Request $request)
    {
        $users = Auth::user();
        $career_info = Career::where('personal_id', $users->id)->first();
        $validator = Validator::make($request->all(), [
            'career_obj' => 'required',
            'present_salary' => 'nullable|numeric',
            'expected_salary' => 'nullable|numeric',
            'looking_for_job_category' => 'required',
            'job_nature' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($career_info == null) {
            $career_info_apply = new Career();
            $career_info_apply->personal_id = $users->id;
            $career_info_apply->jobcat_id = $request->looking_for_job_category;
            $career_info_apply->career_obj = $request->career_obj;
            $career_info_apply->pre_salary = $request->present_salary;
            $career_info_apply->exp_salary = $request->expected_salary;
            $career_info_apply->job_nature = $request->job_nature;
            $career_info_apply->save();
            return redirect()->back()->with('success', 'Career & Application information updated successfully.');
        } else {
            $career_info->jobcat_id = $request->looking_for_job_category;
            $career_info->career_obj = $request->career_obj;
            $career_info->pre_salary = $request->present_salary;
            $career_info->exp_salary = $request->expected_salary;
            $career_info->job_nature = $request->job_nature;
            $career_info->update();
            return redirect()->back()->with('success', 'Career & Application information updated successfully.');
        }
    }
    //education training
    public function educationTraining(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'train_title' => 'required',
            'topic_coverd' => 'required',
            'train_institution' => 'required',
            'train_location' => 'nullable',
            'train_duration' => 'required',
            'train_country' => 'nullable',
            'train_period' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = Auth::user()->id;
        $d = EducationTraining::where('user_id', $id)->delete();
        foreach ($request->train_title as $key => $vl) {
            $data = array(
                'user_id' => $id,
                'train_title' => $vl,
                'topic_coverd' => $request->topic_coverd[$key],
                'train_institution' => $request->train_institution[$key],
                'train_location' => $request->train_location[$key],
                'train_duration' => $request->train_duration[$key],
                'train_country' => $request->train_country[$key],
                'train_period' => $request->train_period[$key],
            );
            EducationTraining::insert($data);
        }
        return redirect('/user/edit-resume')->with('success', 'Education training created successfully.');
    }
    // =================================== Other Relevant Information =============

    public function other_relevent_info(Request $request)
    {
        $users = Auth::user();
        $candidate_other_info = CandidateOtherRev::where('user_id', $users->id)->first();

        $validator = Validator::make($request->all(), [
            'career_summery' => 'nullable',
            'special_quealification' => 'nullable',
            'keywords' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($candidate_other_info == null) {
            $candidate_other_info_create = new CandidateOtherRev();
            $candidate_other_info_create->user_id = $users->id;
            $candidate_other_info_create->career_sum = $request->career_summery;
            $candidate_other_info_create->spec_qualification = $request->special_quealification;
            $candidate_other_info_create->keyword = $request->keywords;

            $candidate_other_info_create->save();
            return redirect()->back()->with('success', 'Other relevent information Saved successfully.');
        } else {
            $candidate_other_info->career_sum = $request->career_summery;
            $candidate_other_info->spec_qualification = $request->special_quealification;
            $candidate_other_info->keyword = $request->keywords;
            $candidate_other_info->update();
            return redirect()->back()->with('success', 'Other relevent information updated successfully.');
        }

    }

    public function educationAdd(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'level_of_education.*' => 'required', //parent_id
            'exm_degree' => 'required', //child_id
            'major_group' => 'required',
            'institution' => 'required',
            'result' => 'required',
            'cgpa' => 'required',
            'pass_year' => 'required',
            'duration' => 'required',
            'board' => 'required',
            'achievement' => 'nullable',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id = Auth::user()->id;

        $d = EducationInfo::where('user_id', $id)->delete();

        foreach ($request->level_of_education as $key => $vl) {
            $data = array(
                'user_id' => $id,
                'parent_id' => $vl,
                'child_id' => $request->exm_degree[$key],
                'board' => $request->board[$key],
                'major' => $request->major_group[$key],
                'institution' => $request->institution[$key],
                'result' => $request->result[$key],
                'cgpa' => $request->cgpa[$key],
                'pass_year' => $request->pass_year[$key],
                'duration' => $request->duration[$key],
                'achievement' => $request->achievement[$key],
            );
            EducationInfo::insert($data);
        }
        $edu_user_data = EducationInfo::where('user_id', $id)->get();

        if ($edu_user_data->count() < 0) {
            return redirect('/user/edit-resume')->with('success', 'Education created successfully.');
        } else {
            return redirect('/user/edit-resume')->with('success', 'Education updated successfully.');
        }

    }

    public function get_thana_for_userdashbord($districtID)
    {

        $thana_id = Location::where('district_id', $districtID)->get();
        return json_encode($thana_id);
    }

    public function jobApplicantResume($job_id, $id)
    {
        $data = array();
        $title =
        $meta_img = '';
        $description = '';
        // dd($job_id);
        $users = User::findOrFail($id);
        $user_id = $users->id;
        $districts = Location::where('district_id', null)->get();
        $thana = Location::whereNotNull('district_id')->get();
        $get_resume_data = ResumeForJob::where('user_id', $user_id)->where('job_id', $job_id)->get()->toArray();
        $details = json_decode(array_shift($get_resume_data)['applicant_resume_details']);
        $data['personal_infos'] = $details->personal_infos;
        $data['edu'] = $details->edu;
        $data['title'] = 'Job Applicant Resume';
        $data['meta_img'] = '';
        $data['description'] = '';
        $data['districts'] = $districts;
        $data['thana'] = $thana;
        $data['user_career'] = $details->career;
        $data['all_skills'] = Skill::where('status', 1)->get();
        $data['candidate_skill'] = $details->skill;
        $data['educations'] = $details->edu;
        $data['education'] = Education::where('status', 1)->get();
        $data['language'] = $details->language;
        $data['edu_training'] = $details->edu_training;
        $data['experience'] = $details->experience;
        $data['p_certificate'] = $details->certificate;
        $data['reference'] = $details->reference;
        $data['candidate_other_info'] = $details->candidate_other_info;
        $data['job_categories'] = JobCat::where('status', 1)->get();

        $app = AppliedJob::where('job_id', $job_id)->where('user_id', $user_id)->first();
        $application_id = $app->id;

        $find_resume = ResumeViewStatus::where('application_id', $application_id)->where('employer_id', Auth::user()->id)->first();

        if ($find_resume) {
            if ($find_resume->view_status == 0) {
                $find_resume->view_status = 1;
                $find_resume->update();
            }
        } else {
            abort(404);
        }

        return view('empdashboard.resume', $data);

    }

    public function user_resume()
    {
        $title = 'View Resume';
        $meta_img = '';
        $description = '';
        $users = Auth::user();
        $user_id = $users->id;
        $districts = Location::where('district_id', null)->get();
        $thana = Location::whereNotNull('district_id')->get();
        //career_and_application_info
        $job_categories = JobCat::all();
        $user_data = DB::table('users')
            ->join('personal_infos', 'personal_infos.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->first();
        $user_career = DB::table('careers')->where('personal_id', $user_id)->first();
        $all_skills = DB::table('skills')->where('status', 1)->get();
        $candidate_skill = DB::table('candidate_skills')->where('status', 1)->where('user_id', $users->id)->get();

        // other relevent information
        $educations = EducationInfo::where('user_id', $users->id)->get();
        $education = Education::where('status',1)->get();
        $language = DB::table('candidate_languages')->where('user_id', $users->id)->get();
        $edu_training = DB::table('education_trainings')->where('user_id', $user_id)->get();
        $experience = DB::table('candidate_employments')->where('user_id', $user_id)->get(); // employment
        $p_certificate = ProfessionalCertificate::where('status', 1)->where('user_id', $user_id)->get();
        $reference = DB::table('candidate_refers')->where('user_id', $user_id)->get();
        $candidate_other_info = CandidateOtherRev::where('user_id', $users->id)->first();
        return view('userdashboard.resume', compact('thana', 'user_data', 'districts', 'job_categories', 'user_career', 'candidate_other_info', 'p_certificate', 'edu_training', 'experience', 'all_skills', 'candidate_skill', 'language', 'reference', 'title', 'meta_img', 'description', 'educations', 'education'));
    }

    public function job_post($cat)
    {
        $title = 'Job Post';
        $meta_img = '';
        $description = '';
        $job_cat = '';
        $users = Auth::user();
        if ($cat == 'cat-job' || $cat == 'hot-job') {
            if ($cat == 'cat-job') {
                $job_cat = 0;
            }
            if ($cat == 'hot-job') {
                $job_cat = 1;
            }
        } else {
            return redirect('/company/job/select-cat')->with('warn', 'Provided category not found.');
        }

        if ($users && $users->user_role == 0) {
            $education = Education::where('status',1)->where('parent_id',NULL)->get();
            $empinfo = DB::table('company_detail_infos')->where('user_id', $users->id)->first();
            $categories = JobCat::where('status', 1)->get();
            return view('empdashboard.job_post', compact('empinfo', 'education', 'categories', 'title', 'meta_img', 'description', 'job_cat'));
        } else {
            return redirect('/login');
        }
    }
    public function index()
    {
        $title = 'Company Joblist';
        $meta_img = '';
        $description = '';
        $users = Auth::user();
        $empinfo = DB::table('company_detail_infos')->where('user_id', $users->id)->first();
        if ($empinfo != '') {
            $job = Job::where('company_id', $empinfo->id)->orderBy('id', 'desc')->get();
        } else {
            $job = null;
        }

        return view('empdashboard.job_list', compact('job', 'empinfo', 'title', 'meta_img', 'description'))
            ->with([
                'no' => 1,
            ]);
    }
    public function jobstore(Request $request, $cat)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'jobcat_id' => 'required',
            'title' => 'required|string',
            'vacancy' => 'nullable|integer',
            'resume_option' => 'nullable|integer',
            'emp_status' => 'nullable|integer',
            'deadline' => 'nullable|string',
            'instruction' => 'nullable|string|max:10000',
            'job_level' => 'nullable|string',
            'job_cover_img' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'context' => 'nullable|string|max:70000',
            'responsibility' => 'nullable|string|max:70000',
            'wrok_place' => 'nullable|integer',
            'location' => 'nullable|string',
            'salary' => 'required|string',
            'max_salary' => 'nullable|integer',
            'min_salary' => 'nullable|integer',
            'add_salary' => 'nullable|string|max:10000',
            'compensation' => 'nullable|string|max:10000',
            'institute' => 'nullable|string|max:200',
            'other_qualification' => 'nullable|string|max:10000',
            'training_course' => 'nullable|string|max:10000',
            'experience' => 'nullable|string|max:10000',
            'short_experience'=>'nullable|numeric',
            'skill' => 'nullable',
            'professional_degree'=>'nullable',
            'add_req' => 'nullable|string|max:10000',
            'gender' => 'required|string',
            'age_min' => 'required|numeric',
            'age_max' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $check_company_details = CompanyDetailInfo::where('status', 1)->where('user_id', Auth::user()->id)->first();
        //company name must be required and others field must be filled out to store company name
        if (!empty($check_company_details->name)) {
            $job_cat = '';
            if ($cat == 0 || $cat == 1) {
                if ($cat == 0) {
                    $job_cat = 0;
                }
                if ($cat == 1) {
                    $job_cat = 1;
                }
            } else {
                return redirect('/company/job/select-cat')->with('warn', 'Provided category not found.');
            }
            $job = new Job;
            $job->hot_job = $job_cat;
            $job->company_id = $request->company_id;
            $job->jobcat_id = $request->jobcat_id;
            $job->title = $request->title;
            $job->status = 2;
            $job->slug = Str::slug($request->title, '-');
            $job->vacancy = $request->vacancy;
            if (!empty($request->emp_status)) {
                $job->emp_status = $request->emp_status;
            }
            $job->deadline = $request->deadline;
            if ($request->resume_option != '') {
                $job->resume_option = $request->resume_option;
            }
            $job->instruction = $request->instruction;
            if ($job->save()) {
                $job_id = $job->id;
                $m_job = new MoreJob;
                $m_job->job_id = $job_id;
                $m_job->company_id = $request->company_id;
                if ($request->job_level != '') {
                    $m_job->job_level = $request->job_level;
                }
                $up_cover_img = $request->job_cover_img;
                if ($up_cover_img != '') {
                    $ext = pathinfo($up_cover_img->getClientOriginalName(), PATHINFO_EXTENSION);
                    $f_n = Str::slug(pathinfo($up_cover_img->getClientOriginalName(), PATHINFO_FILENAME),'-');
                    $filename = $f_n.'-'.time() . '.' .$ext;
                    $up_cover_img->move('uploads/job', $filename);
                    $m_job->job_cover_img = $filename;
                }
                $m_job->context = $request->context;
                $m_job->responsibility = $request->responsibility;
                if ($request->wrok_place) {
                    $m_job->wrok_place = $request->wrok_place;
                }
                $m_job->location = $request->location;
                if ($request->salary != '') {
                    $m_job->salary = $request->salary;
                }
                if ($request->salary == 4) {
                    $m_job->max_salary = 0;
                    $m_job->min_salary = 0;
                } else {
                    $m_job->max_salary = $request->max_salary;
                    $m_job->min_salary = $request->min_salary;
                }
                $m_job->add_salary = $request->add_salary;
                $m_job->compensation = $request->compensation;
                $m_job->save();
                $candidate = new CandidateInfo;
                $candidate->job_id = $job_id;
                $candidate->institute = $request->institute;
                $candidate->other_qualification = $request->other_qualification;
                $candidate->training_course = $request->training_course;
                if(!empty($request->short_experience)){
                    $candidate->short_experience = $request->short_experience;
                }
                $candidate->experience = $request->experience;
                $candidate->add_req = $request->add_req;
                $candidate->gender = $request->gender;
                $candidate->company_id = $request->company_id;
                $candidate->age_min = $request->age_min;
                $candidate->age_max = $request->age_max;
                $candidate->save();
                if(!empty($request->skill )){
                  foreach ($request->skill as $key => $vl) {
                    $data = array(
                        'skill_id' => $vl,
                        'job_id' => $job_id,
                    );
                    RequiredJobSkill::insert($data);
                  }
                }
                if(!empty($request->professional_degree)){
                    foreach ($request->professional_degree as $key => $vl) {
                        $data = array(
                            'degree_id' => $vl,
                            'job_id' => $job_id,
                        );
                        RequiredProfessionalDegree::insert($data);
                    }
                }
                if(!empty($request->qualification)){
                    foreach ($request->qualification as $key => $vl) {
                        $data = array(
                            'qualification_id' => $vl,
                            'job_id' => $job_id,
                            'degree_id'=> $request->degree[$key],
                        );
                        CandidateQualification::insert($data);
                    }
                }
            }
            return redirect()->route('company-info-visibility', $job_id)->with('success', 'Job Drafted successfully.')->with('job_id', $job_id)->with('user_id', $user_id);
        } else {
            return redirect()->to('/company/dashboard')->with('warning', 'You must  fill up required company  details to  post a job');
        }
    }
    public function jobedit($id)
    {
        $title = 'Job Edit';
        $meta_img = '';
        $description = '';
        $empinfo = Job::findOrFail($id);
        $company = CompanyDetailInfo::where('id', $empinfo->company_id)->first();
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $categories = JobCat::where('status', 1)->get();
        $m_job = MoreJob::where('job_id', $id)->first();
        $candidate = CandidateInfo::where('status', 1)->where('job_id', $id)->first();
        $candidate_qualification = CandidateQualification::where('status', 1)->where('job_id', $id)->get();
        return view('empdashboard.job_edit', compact('empinfo', 'candidate_qualification','education', 'categories', 'company', 'm_job', 'candidate', 'title', 'meta_img', 'description'));
    }
    public function jobupdate(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $m_job = Morejob::where('job_id', $id)->first();
        $candidate = CandidateInfo::where('job_id', $id)->first();
        $validator = Validator::make($request->all(), [
            'jobcat_id' => 'required',
            'title' => 'required|string',
            'vacancy' => 'nullable|integer',
            'resume_option' => 'nullable|integer',
            'emp_status' => 'nullable|integer',
            'deadline' => 'nullable|string',
            'instruction' => 'nullable|string|max:10000',
            'job_level' => 'nullable|string',
            'job_cover_img' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'context' => 'nullable|string|max:70000',
            'responsibility' => 'nullable|string|max:70000',
            'wrok_place' => 'nullable|integer',
            'location' => 'nullable|string',
            'salary' => 'required|string',
            'max_salary' => 'nullable|integer',
            'min_salary' => 'nullable|integer',
            'add_salary' => 'nullable|string|max:10000',
            'compensation' => 'nullable|string|max:10000',
            'institute' => 'nullable|string|max:200',
            'other_qualification' => 'nullable|string|max:10000',
            'training_course' => 'nullable|string|max:10000',
            'short_experience'=>'nullable|numeric',
            'experience' => 'nullable|string|max:10000',
            'skill' => 'nullable',
            'professional_degree'=>'nullable',
            'add_req' => 'nullable|string|max:10000',
            'gender' => 'required|string',
            'age_min' => 'required|numeric',
            'age_max' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $job->company_id = $request->company_id;
        $job->jobcat_id = $request->jobcat_id;
        $job->title = $request->title;
        $job->vacancy = $request->vacancy;
        if (!empty($request->emp_status)) {
            $job->emp_status = $request->emp_status;
        }
        $job->deadline = $request->deadline;
        if ($request->resume_option != '') {
            $job->resume_option = $request->resume_option;
        }
        $job->instruction = $request->instruction;
        if ($job->update()) {
            $job_id = $job->id;
            $m_job->job_id = $job_id;
            $m_job->company_id = $request->company_id;
            if ($request->job_level != '') {
                $m_job->job_level = $request->job_level;
            }
            $file_name = $request->hidden_image;
            $job_cover_img = $request->file('job_cover_img');
            if ($job_cover_img != '') {
                $ext = pathinfo($job_cover_img->getClientOriginalName(), PATHINFO_EXTENSION);
                $f_n = Str::slug(pathinfo($job_cover_img->getClientOriginalName(), PATHINFO_FILENAME),'-');
                $filename = $f_n.'-'.time(). '.' .$ext;
                $job_cover_img->move('uploads/job', $filename);
                $m_job->job_cover_img = $filename;
            } else {
                $m_job->job_cover_img = $file_name;
            }
            $m_job->context = $request->context;
            $m_job->responsibility = $request->responsibility;
            if ($request->wrok_place != '') {
                $m_job->wrok_place = $request->wrok_place;
            }
            $m_job->location = $request->location;
            if ($request->salary != '') {
                $m_job->salary = $request->salary;
            }
            if ($request->salary == 4) {
                $m_job->max_salary = 0;
                $m_job->min_salary = 0;
            } else {
                $m_job->max_salary = $request->max_salary;
                $m_job->min_salary = $request->min_salary;
            }
            $m_job->add_salary = $request->add_salary;
            $m_job->compensation = $request->compensation;
            $m_job->update();
            $candidate->job_id = $job_id;
            $candidate->company_id = $request->company_id;
            $candidate->institute = $request->institute;
            $candidate->other_qualification = $request->other_qualification;
            $candidate->training_course = $request->training_course;
            if(!empty($request->short_experience)){
                $candidate->short_experience = $request->short_experience;
            }
            else{
                $candidate->short_experience = 0;
            }
            $candidate->experience = $request->experience;
            $candidate->add_req = $request->add_req;
            $candidate->gender = $request->gender;
            $candidate->age_min = $request->age_min;
            $candidate->age_max = $request->age_max;
            $candidate->update();
            if(!empty($request->skill )){
            RequiredJobSkill::where('job_id', $job_id)->delete();
              foreach ($request->skill as $key => $vl) {
                $data = array(
                    'skill_id' => $vl,
                    'job_id' => $job_id,
                );
                RequiredJobSkill::insert($data);
              }
            }
           
            if(!empty($request->professional_degree)){
                RequiredProfessionalDegree::where('job_id', $job_id)->delete();
                foreach ($request->professional_degree as $key => $vl) {
                    $data = array(
                        'degree_id' => $vl,
                        'job_id' => $job_id,
                    );
                    RequiredProfessionalDegree::insert($data);
                }
            }
            if(!empty($request->qualification)){
                CandidateQualification::where('job_id', $job_id)->delete();
                foreach ($request->qualification as $key => $vl) {
                    $data = array(
                        'qualification_id' => $vl,
                        'job_id' => $job_id,
                        'degree_id'=> $request->degree[$key],
                    );
                    CandidateQualification::insert($data);
                }
            }
            
              
        }
        // if ($job->status == 2) {
            return redirect()->route('company-info-visibility', $job_id)->with('success', 'Job updated successfully.');
        // } else {
        //     return redirect()->route('company.joblist')->with('success', 'Job updated successfully.');
        // }
    }

    public function jobdelete($id)
    {
        $job = Job::findOrFail($id);
        $job_id = $job->id;
        Session::put('job_id', $job_id);
        $job_d = Job::where('id', $id)->first();
        $job_d->delete();
        $m_job = Morejob::where('job_id', $id)->first();
        $m_job->delete();
        $candidate = CandidateInfo::where('job_id', Session::get('job_id'))->first();
        $candidate->delete();
        Session::pull('job_id');
        return redirect()->to('/company/joblist')->with('success', 'Job deleted successfully.');
    }

    public function jobApplicantDetails($id)
    {
        $title = 'Job Applicant Details';
        $meta_img = '';
        $description = '';
        $company_alt_name='';
        $job_sidebar = DB::table('jobs')
            ->join('more_jobs', 'more_jobs.job_id', '=', 'jobs.id')
            ->join('candidate_infos', 'candidate_infos.job_id', '=', 'jobs.id')
            ->join('company_detail_infos', 'company_detail_infos.id', '=', 'more_jobs.company_id')
            ->where('jobs.id', $id)
            ->first();

        $viewed_resume = DB::table('resume_view_statuses')
            ->select('users.*')
            ->leftJoin('applied_jobs', 'resume_view_statuses.application_id', '=', 'applied_jobs.id')
            ->leftJoin('users', 'applied_jobs.user_id', '=', 'users.id')
            ->where('resume_view_statuses.view_status', 1)
            ->where('resume_view_statuses.employer_id', Auth::user()->id)
            ->get();

        $not_viewed_resume = DB::table('resume_view_statuses')
            ->select('users.*')
            ->leftJoin('applied_jobs', 'resume_view_statuses.application_id', '=', 'applied_jobs.id')
            ->leftJoin('users', 'applied_jobs.user_id', '=', 'users.id')
            ->where('resume_view_statuses.view_status', 0)
            ->where('resume_view_statuses.employer_id', Auth::user()->id)
            ->get();

        $empinfo = Job::findOrFail($id);
        $applied = AppliedJob::where('job_id', $empinfo->id)->get();
        $job_info = Job::where('status', 1)->where('id', $id)->first();
        $job_cat = JobCat::where('status', 1)->where('id', $job_info->jobcat_id)->first();
        $all_status = ComInfoMatchingVisibility::where('job_id', $id)->first();
        $candidate = CandidateInfo::where('job_id', $id)->first();
        $more_jobs = MoreJob::where('job_id', $id)->first();
        $company_info = CompanyDetailInfo::where('id', $job_info->company_id)->first();
        $company = CompanyAltName::where('job_id', $id)->first();
        if(!empty($company)){
            $company_alt_name = $company->alt_name;
        } 
        $company_user_id = $company_info->user_id;
        $c_email = User::where('id', $company_user_id)->first();
        $company_email = $c_email->email;
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $degree = Education::where('status',1)->whereNotNull('parent_id')->get();
        $candidate_qualification =CandidateQualification::where('job_id', $id)->where('status',1)->get();
        $deadline = $job_info->deadline;
        $post_date = $job_info->created_at;
        $skills = Skill::where('status',1)->get();
        $required_job_skills = RequiredjobSkill::where('status',1)->where('job_id',$id)->get();

        $experience = '';
        $o_qualification='';
        $train_course='';
        $add_req='';
        $job_context='';
        $job_responsibility='';
        $compensation='';
        $additional_sal='';
        //job context
        $contx = $more_jobs->context;
        if(!empty($contx)){
            $job_context =  explode("\r\n",$contx);
        }
        //job responsibility
        $res = $more_jobs->responsibility;
        if(!empty($res)){
            $job_responsibility =  explode("\r\n",$res);
        }
        //other qualification
        $oth = $job_sidebar->other_qualification;
        if(!empty($oth)){
            $o_qualification =  explode("\r\n",$oth);
        }
        //training course
        $t_course =$job_sidebar->training_course;
        if(!empty($t_course)){
            $train_course =  explode("\r\n",$t_course);
        }
        //experience
        $exp = $job_sidebar->experience;
        if(!empty($exp)){
            $experience =  explode("\r\n",$exp);
        }
        //additional requirement
        $additional_req = $job_sidebar->add_req;
        if(!empty($additional_req)){
        $add_req =  explode("\r\n",$additional_req);
        }
        //compension and other benefits
        $more_com = $more_jobs->compensation;
        if(!empty($more_com)){
        $compensation =  explode("\r\n",$more_com);
        }
        $add_sal = $more_jobs->add_salary;
        if(!empty($add_sal)){
        $additional_sal =  explode("\r\n",$add_sal);
        }
        return view('empdashboard.job_applicant_details')->with([
            'job_id' => $id,
            'job_cat' => $job_cat,
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description,
            'candidate' => $candidate,
            'more_jobs' => $more_jobs,
            'company_info' => $company_info,
            'job_info' => $job_info,
            'all_status' => $all_status,
            'company_email' => $company_email,
            'deadline' => $deadline,
            'post_date' => $post_date,
            'empinfo' => $empinfo,
            'applied' => $applied,
            'job_sidebar' => $job_sidebar,
            'viewed_resume' => $viewed_resume,
            'not_viewed_resume' => $not_viewed_resume,
            'education'=>$education,
            'degree'=>$degree,
            'candidate_qualification'=>$candidate_qualification,
            'o_qualification'=>$o_qualification,
            'train_course'=>$train_course,
            'skills'=>$skills,
            'required_job_skills'=>$required_job_skills,
            'job_context'=>$job_context,
            'job_responsibility'=>$job_responsibility,
            'experience'=>$experience,
            'add_req'=>$add_req,
            'compensation'=>$compensation,
            'additional_sal'=>$additional_sal,
            'company_alt_name'=>$company_alt_name,
        ]);
    }
    public function job_post_cat()
    {
        $title = 'Job Post Category';
        $meta_img = '';
        $description = '';
        return view('empdashboard.job-cat-select', compact('title', 'meta_img', 'description'));
    }
    public function company_info_visibility($job_id)
    {
        $title = 'Company Info Visibility';
        $meta_img = '';
        $description = '';
        $company_alt_name='';
        $match_job = Job::where('id', $job_id)->first();
        if (!empty($match_job)) {
            $match_company = $match_job->company_id;

            $user = CompanyDetailInfo::where('id', $match_company)->first();
            $company = CompanyAltName::where('job_id', $job_id)->first();
            if(!empty($company)){
                $company_alt_name = $company->alt_name;
            } 
            $user_id = $user->user_id;
            $match_user = Auth::user()->id;

            if ($user_id == $match_user && $match_job) {
                return view('empdashboard.company-info-visibility')->
                    with([
                    'title' => $title,
                    'meta_img' => $meta_img,
                    'description' => $description,
                    'job_id' => $job_id,
                    'company_alt_name'=>$company_alt_name,
                    ]

                );
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function info_post(Request $request)
    {
        $title = 'Company Job post';
        $meta_img = '';
        $description = '';
        $job_id = $request->job_id;
        $company_name = $request->company_name;
        $company_addr = $request->company_addr;
        $company_bus = $request->company_bus;
        $age = $request->age;
        $total_year_xp = $request->total_year_xp;
        $salary = $request->salary;
        $area_exp = $request->area_exp;
        $gender = $request->gender;
        $exist = ComInfoMatchingVisibility::where('job_id', $job_id)->first();

        if ($exist == null) {
            $info_status_save = new ComInfoMatchingVisibility;
            if ($company_name == 'on') {
                $info_status_save->company_name = 1;
            }
            if ($company_addr == 'on') {
                $info_status_save->company_addr = 1;
            }
            if ($company_bus == 'on') {
                $info_status_save->company_bus = 1;
            }

            if ($age == 'on') {
                $info_status_save->age = 1;
            }
            if ($total_year_xp == 'on') {
                $info_status_save->total_year_xp = 1;
            }
            if ($salary == 'on') {
                $info_status_save->salary = 1;
            }
            if ($salary == 'on') {
                $info_status_save->salary = 1;
            }
            if ($area_exp == 'on') {
                $info_status_save->area_exp = 1;
            }
            if ($gender == 'on') {
                $info_status_save->gender = 1;
            }
            $info_status_save->job_id = $job_id;
            $info_status_save->save();
            $job =Job::where('id',$job_id)->first();
            $company = new CompanyAltName; 
            $company->alt_name = $request->alt_name;
            $company->job_id = $job_id;
            $company->save();
            return redirect()->route('preview-job', ['job_id' => $job_id])->
                with(
                [
                    'meta_img' => $meta_img,
                    'title' => $title,
                    'description' => $description,
                ]
            );
        } else {
            $info_status_update = ComInfoMatchingVisibility::where('job_id', $job_id)->first();

            if ($request->company_name != null) {
                $info_status_update->company_name = 1;
            } else {
                $info_status_update->company_name = 0;
            }
            if ($request->company_addr != null) {
                $info_status_update->company_addr = 1;
            } else {
                $info_status_update->company_addr = 0;
            }

            if ($request->company_bus != null) {
                $info_status_update->company_bus = 1;
            } else {
                $info_status_update->company_bus = 0;
            }
            if ($request->age != null) {
                $info_status_update->age = 1;
            } else {
                $info_status_update->age = 0;
            }
            if ($request->total_year_xp != null) {
                $info_status_update->total_year_xp = 1;
            } else {
                $info_status_update->total_year_xp = 0;
            }
            if ($request->salary != null) {
                $info_status_update->salary = 1;
            } else {
                $info_status_update->salary = 0;
            }
            if ($request->area_exp != null) {
                $info_status_update->area_exp = 1;
            } else {
                $info_status_update->area_exp = 0;
            }
            if ($request->gender != null) {
                $info_status_update->gender = 1;
            } else {
                $info_status_update->gender = 0;
            }
            $info_status_update->update();

            $job =Job::where('status',2)->where('id',$job_id)->first();
            $company = CompanyAltName::where('job_id',$job_id)->first();
            $company->alt_name = $request->alt_name;
            $company->update();
            return redirect()->route('preview-job', ['job_id' => $job_id])->
                with(
                [
                    'meta_img' => $meta_img,
                    'title' => $title,
                    'description' => $description,
                ]
            );
        }
    }

    public function previewJob($job_id)
    {
        $title = 'Company Job Preview';
        $meta_img = '';
        $description = '';
        $match_job = Job::where('id', $job_id)->first();
        if (!empty($match_job)) {
            $match_company = $match_job->company_id;
            $user = CompanyDetailInfo::where('id', $match_company)->first();
            $user_id = $user->user_id;
            $match_user = Auth::user()->id;

            if ($user_id == $match_user && $match_job) {
                $job_sidebar = DB::table('jobs')
                    ->join('more_jobs', 'more_jobs.job_id', '=', 'jobs.id')
                    ->join('candidate_infos', 'candidate_infos.job_id', '=', 'jobs.id')
                    ->join('company_detail_infos', 'company_detail_infos.id', '=', 'more_jobs.company_id')
                    ->where('jobs.id', $job_id)
                    ->first();
               
                $all_status = ComInfoMatchingVisibility::where('job_id', $job_id)->first();
                $job_info = Job::where('id', $job_id)->first();
                $job_cat = JobCat::where('status', 1)->where('id', $job_info->jobcat_id)->first();
                $candidate = CandidateInfo::where('job_id', $job_id)->first();
                $education = Education::where('status',1)->where('parent_id',NULL)->get();
                $degree = Education::where('status',1)->whereNotNull('parent_id')->get();
                $candidate_qualification =CandidateQualification::where('job_id', $job_id)->where('status',1)->get();
                $more_jobs = MoreJob::where('job_id', $job_id)->first();
                $company_info = CompanyDetailInfo::where('id', $job_info->company_id)->first();
                $company = CompanyAltName::where('job_id', $job_id)->first();
                $company_alt_name = $company->alt_name;
                $company_user_id = $company_info->user_id;
                $c_email = User::where('id', $company_user_id)->first();
                $company_email = $c_email->email;
                $deadline = $job_info->deadline;
                $post_date = $job_info->created_at;
                $skills = Skill::where('status',1)->get();
                $required_job_skills = RequiredjobSkill::where('status',1)->where('job_id',$job_id)->get();

                $experience = '';
                $o_qualification='';
                $train_course='';
                $add_req='';
                $job_context='';
                $job_responsibility='';
                $compensation='';
                $additional_sal='';
                //job context
                $contx = $more_jobs->context;
                if(!empty($contx)){
                    $job_context =  explode("\r\n",$contx);
                }
                //job responsibility
                $res = $more_jobs->responsibility;
                if(!empty($res)){
                    $job_responsibility =  explode("\r\n",$res);
                }
                //other qualification
                $oth = $job_sidebar->other_qualification;
                if(!empty($oth)){
                    $o_qualification =  explode("\r\n",$oth);
                }
                //training course
                $t_course =$job_sidebar->training_course;
                if(!empty($t_course)){
                    $train_course =  explode("\r\n",$t_course);
                }
                //experience
                $exp = $job_sidebar->experience;
                if(!empty($exp)){
                    $experience =  explode("\r\n",$exp);
                }
                //additional requirement
                $additional_req = $job_sidebar->add_req;
                if(!empty($additional_req)){
                $add_req =  explode("\r\n",$additional_req);
                }
                //compension and other benefits
                $more_com = $more_jobs->compensation;
                if(!empty($more_com)){
                $compensation =  explode("\r\n",$more_com);
                }
                $add_sal = $more_jobs->add_salary;
                if(!empty($add_sal)){
                $additional_sal =  explode("\r\n",$add_sal);
                }
               
                return view('empdashboard.preview-job')->with([
                    'job_id' => $job_id,
                    'job_cat' => $job_cat,
                    'meta_img' => $meta_img,
                    'title' => $title,
                    'description' => $description,
                    'candidate' => $candidate,
                    'more_jobs' => $more_jobs,
                    'company_info' => $company_info,
                    'job_info' => $job_info,
                    'all_status' => $all_status,
                    'company_email' => $company_email,
                    'deadline' => $deadline,
                    'post_date' => $post_date,
                    'job_sidebar' => $job_sidebar,
                    'required_job_skills'=>$required_job_skills,
                    'skills'=>$skills,
                    'candidate_qualification'=>$candidate_qualification,
                    'education'=>$education,
                    'o_qualification'=>$o_qualification,
                    'degree'=>$degree,
                    'train_course'=>$train_course,
                    'experience'=>$experience,
                    'add_req'=>$add_req,
                    'compensation'=>$compensation,
                    'additional_sal'=>$additional_sal,
                    'job_context'=>$job_context,
                    'job_responsibility'=>$job_responsibility,
                    'company_alt_name'=>$company_alt_name,
                ]);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
    public function publishJob($job_id)
    {
        $title = 'Job Publish Success';
        $meta_img = '';
        $description = '';
        $job = Job::findOrFail($job_id);
        if($job->status == 2){
            $job->status = 0;
            $job->update();
            return redirect()->route('job-publish-success')->
            with([
            'success' => 'Job has been posted successfully yet waiting for approval.',
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description]);
        }else {
            $job->update();
            return redirect()->route('company.joblist')->with('success', 'Job updated successfully.');
        }
        
    }
    public function publishJobSuccess()
    {
        $title = 'Job Publish Success';
        $meta_img = '';
        $description = '';
        return view('empdashboard.job-publish-success')
            ->
        with([
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description]);
    }
    public function applicationHistory()
    {
        $user_id = Auth::user()->id;
        $job = DB::table('jobs')
            ->select('*')
            ->join('applied_jobs', 'applied_jobs.job_id', 'jobs.id')
            ->where('applied_jobs.user_id', $user_id)
            ->get();

        $title = 'Job Application History';
        $meta_img = '';
        $description = '';
        return view('userdashboard.application-history')
            ->
        with([
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description,
            'job' => $job,
        ]);
    }

    public function applicationViewHistory()
    {
        $user_id = Auth::user()->id;
        $job = DB::table('jobs')
            ->select('*')
            ->join('applied_jobs', 'applied_jobs.job_id', 'jobs.id')
            ->join('resume_view_statuses', 'resume_view_statuses.application_id', 'applied_jobs.id')
            ->where('applied_jobs.user_id', $user_id)
            ->get();

        $title = 'Employer Activities';
        $meta_img = '';
        $description = '';
        return view('userdashboard.application-view-history')
            ->
        with([
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description,
            'job' => $job,
        ]);
    }

    public function passwordSettings()
    {
        $user = User::findOrFail(Auth::user()->id);
        $title = 'User Password Setting';
        $meta_img = '';
        $description = '';

        return view('userdashboard.password-settings')
            ->
        with([
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description,
            'user' => $user,
        ]);
    }

    public function profileSettings()
    {

        $user_data = User::findOrFail(Auth::user()->id);
        $title = 'User Profile Setting';
        $meta_img = '';
        $description = '';

        return view('userdashboard.profile-settings')
            ->
        with([
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description,
            'user_data' => $user_data,
        ]);
    }

    public function profileUpdate(Request $request)
    {

        $users = Auth::user();
        // dd($request->all());
        $candidate = User::findOrFail($users->id);

        $candidate_info = PersonalInfo::where('user_id', $users->id)->first();
        // dd($candidate_info);
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:users,phone,' . $users->id,
            'email' => 'required|email|unique:users,email,' . $users->id,

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $candidate->name = $request->firstname;
        $candidate->username = $request->firstname;
        $candidate->lname = $request->lastname;
        $candidate->username = $request->firstname;
        $candidate->phone = $request->phone;
        $candidate->email = $request->email;
        $candidate->update();

        return redirect()->back()->with('success', 'User Profile Updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password changed successfully.');

    }

    /*company account settings */

    public function compasswordSettings()
    {
        $user = User::findOrFail(Auth::user()->id);
        $title = 'Comapnay Password Setting';
        $meta_img = '';
        $description = '';

        return view('empdashboard.password-settings')
            ->
        with([
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description,
            'user' => $user,
        ]);
    }

    public function comprofileSettings()
    {

        $user_data = User::findOrFail(Auth::user()->id);
        $title = 'Company Profile Setting';
        $meta_img = '';
        $description = '';

        return view('empdashboard.profile-settings')
            ->
        with([
            'meta_img' => $meta_img,
            'title' => $title,
            'description' => $description,
            'user_data' => $user_data,
        ]);
    }

    public function comprofileUpdate(Request $request)
    {
        $users = Auth::user();
        $company = User::findOrFail($users->id);
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'phone' => 'required|unique:users,phone,' . $users->id,
            'email' => 'required|email|unique:users,email,' . $users->id,

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $company->name = $request->firstname;
        $company->username = $request->firstname;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->update();

        return redirect()->back()->with('success', 'Profile Updated successfully.');
    }

    public function comchangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password changed successfully.');

    }
    public function get_edu($eduID){
      $degree_id = Education::where('status',1)->where('parent_id', $eduID)->get();
      return json_encode($degree_id);
    }
}
