<?php

namespace App\Http\Controllers;

use App\Models\AppliedJob;
use App\Models\CandidateInfo;
use App\Models\CompanyDetailInfo;
use App\Models\Education;
use App\Models\Job;
use App\Models\JobCat;
use App\Models\Location;
use App\Models\ComInfoMatchingVisibility;
use App\Models\MoreJob;
use App\Models\ResumeForJob;
use App\Models\Skill;
use App\Models\User;
use App\Models\RequiredJobSkill;
use App\Models\CandidateQualification;
use Illuminate\Http\Request;
use App\Models\CompanyAltName;
use App\Models\RequiredProfessionalDegree;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Validator;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $job = Job::orderBy('id', 'desc')->where('status', '!=', 2)->get();
        return view('admin.job.all_job', compact('job'))->with('no', 1);
    }
    public function add()
    {
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $company = CompanyDetailInfo::where('status', 1)->get();
        $categories = JobCat::where('status', 1)->get();
        return view('admin.job.add_job', compact('categories', 'company','education'));
    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'hot_job' => 'nullable',
            'jobcat_id' => 'required',
            'company_id' => 'required',
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
            'gender' => 'required|numeric',
            'age_min' => 'required|numeric',
            'professional_degree'=>'nullable',
            'age_max' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $job = new Job;
        $job->company_id = $request->company_id;
        $job->jobcat_id = $request->jobcat_id;
        $job->title = $request->title;
        $job->slug = Str::slug($request->title, '-');
        $job->vacancy = $request->vacancy;
        if (!empty($request->emp_status)) {
        $job->emp_status = $request->emp_status;
        }
        $job->status =1;
        $job->deadline = $request->deadline;
        if (!empty($request->hot_job)) {
        $job->hot_job =$request->hot_job;
        }
        if (!empty($request->resume_option)) {
            $job->resume_option = $request->resume_option;
        }
        $job->instruction = $request->instruction;
        if ($job->save()) {
            $job_id = $job->id;
            $m_job = new MoreJob;
            $m_job->job_id = $job_id;
            $m_job->company_id = $request->company_id;
            if (!empty($request->job_level)) {
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
            if (!empty($request->wrok_place)) {
                $m_job->wrok_place = $request->wrok_place;
            }
            $m_job->location = $request->location;
            if (!empty($request->salary)) {
                $m_job->salary = $request->salary;
            }
            if($request->salary == 4){
                $m_job->max_salary = 0;
                $m_job->min_salary=0;
            }
            else{
                $m_job->max_salary = $request->max_salary;
                $m_job->min_salary = $request->min_salary;
            }
            $m_job->salary = $request->salary;
            $m_job->add_salary = $request->add_salary;
            $m_job->compensation = $request->compensation;
            $m_job->save();
            $candidate = new CandidateInfo;
            $candidate->job_id = $job_id;
            $candidate->company_id = $request->company_id;
            $candidate->institute = $request->institute;
            $candidate->other_qualification = $request->other_qualification;
            $candidate->training_course = $request->training_course;
            if(!empty($request->short_experience)){
                $candidate->short_experience = $request->short_experience;
            }
            $candidate->experience = $request->experience;
            $candidate->add_req = $request->add_req;
            $candidate->gender = $request->gender;
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
            $company = new CompanyAltName;
            $company->job_id = $job_id;
            $company->save();
            $info_status_save = new ComInfoMatchingVisibility;
            $info_status_save->company_name=1;
            $info_status_save->company_addr=1;
            $info_status_save->company_bus=1;
            $info_status_save->age=1;
            $info_status_save->gender=1;
            $info_status_save->total_year_xp=1;
            $info_status_save->salary=1;
            $info_status_save->salary=1;
            $info_status_save->area_exp=1;
            $info_status_save->job_id= $job_id;
            $info_status_save->save();
        }
        return redirect('/admin/job')->with('success', 'Job created successfully.');
    }
    public function edit($id)
    {
        $job = job::findOrFail($id);
        $company = CompanyDetailInfo::where('status', 1)->get();
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $candidate_qualification = CandidateQualification::where('status', 1)->where('job_id', $id)->get();
        $categories = JobCat::where('status', 1)->get();
        $m_job = DB::table('more_jobs')->where('job_id', $job->id)->first();
        $candidate = DB::table('candidate_infos')->where('job_id', $job->id)->first();
        return view('admin.job.edit_job', compact('job', 'categories', 'company', 'm_job', 'candidate','education','candidate_qualification'));
    }
    public function update(Request $request, $id)
    {   
        $job = job::findOrFail($id);
        $m_job = Morejob::where('job_id', $id)->first();
        $candidate = CandidateInfo::where('job_id', $id)->first();
        $validator = Validator::make($request->all(), [
            'hot_job' => 'nullable',
            'jobcat_id' => 'required',
            'company_id' => 'required',
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
            'gender' => 'required|numeric',
            'age_min' => 'required|numeric',
            'age_max' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $job->company_id = request('company_id');
        $job->jobcat_id = request('jobcat_id');
        $job->title = request('title');
        $job->vacancy = request('vacancy');
        if (!empty(request('emp_status'))){
            $job->emp_status = request('emp_status');
        }
        $job->hot_job = request('hot_job');
        $job->deadline = request('deadline');
        if (!empty(request('resume_option'))) {
            $job->resume_option = request('resume_option');
        }
        $job->instruction = request('instruction');
        if ($job->update()) {
            $job_id = $job->id;
            $m_job->job_id = $job_id;
            $m_job->company_id = request('company_id');
            if (!empty(request('job_level'))) {
                $m_job->job_level = request('job_level');
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
            $m_job->context = request('context');
            $m_job->responsibility = request('responsibility');
            if (!empty(request('wrok_place'))) {
                $m_job->wrok_place = request('wrok_place');
            }
            if (!empty(request('salary'))) {
                $m_job->salary = request('salary');
            }
            $m_job->location = request('location');
            if($request->salary == 4){
                $m_job->max_salary = 0;
                $m_job->min_salary=0;
            }
            else{
                $m_job->max_salary = $request->max_salary;
                $m_job->min_salary = $request->min_salary;
            }
            $m_job->add_salary = request('add_salary');
            $m_job->compensation = request('compensation');
            $m_job->update();
            $candidate->job_id = $job_id;
            $candidate->company_id = request('company_id');
            $candidate->institute = request('institute');
            $candidate->other_qualification = request('other_qualification');
            $candidate->training_course = request('training_course');
            if(!empty($request->short_experience)){
                $candidate->short_experience = $request->short_experience;
            }
            $candidate->experience = request('experience');
            $candidate->add_req = request('add_req');
            $candidate->gender = request('gender');
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
        return redirect()->to('/admin/job')->with('success', 'job updated successfully.');
    }
    public function jobPostStatus($id, $status)
    {
        $data = array('status' => $status);
        Job::where('id', $id)->update($data);
        $job = Job::findOrFail($id);
        $job_id = $job->id;
        $job_title = $job->title;
        $company_id = $job->company_id;
        $c = CompanyDetailInfo::findOrFail($company_id);
        $company_name = $c->name;
        $company_address = $c->address;
        $company_url = $c->url;
        $company_user_id = $c->user_id;
        $c_user = User::findOrFail($company_user_id);
        $company_email = $c_user->email;
        $admin_email = 'haaamiknhr@gmail.com';
        if ($status == 1) {
            Mail::send('email/adminEmailTemplate2', array(
                'company_name' => $company_name,
                'company_address' => $company_address,
                'company_url' => $company_url,
                'job_title' => $job_title,
                'job_id' => $job_id,
            ), function ($message) use ($admin_email) {
                $message->from('a7604366@gmail.com', 'Taxman');
                $message->to($admin_email)->subject('Job Post Approval');
            });
        }
        return $id;
    }
    public function delete($id)
    {
        $job = job::findOrFail($id);
        $job->delete();
        $m_job = Morejob::where('job_id', $job->id)->first();
        $m_job->delete();
        $candidate = CandidateInfo::where('job_id', $job->id)->first();
        $candidate->delete();
        return redirect()->to('/admin/job')->with('success', 'job deleted successfully.');
    }
    public function category()
    {
        $categories = JobCat::where('status', 1)->get();
        return view('admin.job.category', compact('categories'))->with('no', 1);
    }
    public function cat_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = new JobCat;
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->description = $request->description;
        $category->save();
        return redirect('admin/job/category')->with('success', 'job category created successfully.');
    }
    public function cat_edit($id)
    {
        $category = JobCat::findOrFail($id);
        return view('admin.job.editcategory', compact('category'));
    }
    public function cat_update(Request $request, $id)
    {
        $category = JobCat::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|max:255',
            'description' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category->title = request('title');
        $category->description = request('description');
        $category->update();
        return redirect('admin/job/category')->with('success', 'job category updated successfully.');
    }
    public function cat_delete($id)
    {
        $job = job::where('jobcat_id', $id);
        $job->delete();
        $category = JobCat::findOrFail($id);
        $category->delete();
        return redirect('admin/job/category')->with('success', 'job category deleted successfully.');
    }
    public function jobApplicantList($id)
    {
        $title = 'Job Applicant Details';
        $meta_img = '';
        $description = '';
        $company_alt_name='';
        $job = Job::findOrFail($id);
        $job_sidebar = DB::table('jobs')
            ->join('more_jobs', 'more_jobs.job_id', '=', 'jobs.id')
            ->join('candidate_infos', 'candidate_infos.job_id', '=', 'jobs.id')
            ->join('company_detail_infos', 'company_detail_infos.id', '=', 'more_jobs.company_id')
            ->where('jobs.id', $id)
            ->first();
        $job_info = Job::where('status', 1)->where('id', $id)->first();
        $company_info = CompanyDetailInfo::where('id', $job_info->company_id)->first();
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $more_jobs = MoreJob::where('job_id', $id)->first();
        $job_cat = JobCat::where('status', 1)->where('id', $job_info->jobcat_id)->first();
        $all_status = ComInfoMatchingVisibility::where('job_id', $id)->first();
        $candidate = CandidateInfo::where('job_id', $id)->first();
        $applied = AppliedJob::where('job_id', $job->id)->get();
        $degree = Education::where('status',1)->whereNotNull('parent_id')->get();
        $candidate_qualification =CandidateQualification::where('job_id', $id)->where('status',1)->get();
        $deadline = $job_info->deadline;
        $post_date = $job_info->created_at;
        $company_user_id = $company_info->user_id;
        $c_email = User::where('id', $company_user_id)->first();
        $company_email = $c_email->email;
        $skills = Skill::where('status',1)->get();
        $required_job_skills = RequiredjobSkill::where('status',1)->where('job_id',$id)->get();
        $company = CompanyAltName::where('job_id', $id)->first();
        if(!empty($company)){
            $company_alt_name = $company->alt_name;
        } 

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
        return view('admin.job.job_applicant_list', compact('job','deadline','company_email','required_job_skills','more_jobs','candidate_qualification','degree','company_alt_name','all_status','candidate','company_info','company','job_context','post_date','skills','additional_sal','compensation','add_req','experience','train_course','o_qualification','job_responsibility','job_info','applied', 'education','title', 'meta_img', 'description','job_sidebar','job_cat'));
    }
    public function jobApplicantResume($job_id, $id)
    {
        $data = array();
        $title =
        $meta_img = '';
        $description = '';
        $users = User::findOrFail($id);
        $user_id = $users->id;
        $districts = Location::where('district_id', null)->get();
        $thana = Location::whereNotNull('district_id')->get();
        $get_resume_data = ResumeForJob::where('user_id', $user_id)->where('job_id', $job_id)->get()->toArray();
        $details = json_decode(array_shift($get_resume_data)['applicant_resume_details']);
        $data['personal_infos'] = $details->personal_infos;
        $data['edu'] = $details->edu;
        $data['title'] = 'The Taxman';
        $data['meta_img'] = '';
        $data['description'] = '';
        $data['districts'] = $districts;
        $data['thana'] = $thana;
        $data['user_career'] = $details->career;
        $data['all_skills']=Skill::where('status',1)->get();
        $data['candidate_skill']=$details->skill;
        $data['educations'] = $details->edu;
        $data['education'] = Education::all();
        $data['language'] = $details->language;
        $data['edu_training'] = $details->edu_training;
        $data['experience'] = $details->experience;
        $data['p_certificate'] =$details->certificate;
        $data['reference'] = $details->reference;
        $data['candidate_other_info'] = $details->candidate_other_info;
        $data['job_categories'] = JobCat::all();
        return view('admin.job.job-resume', $data);
    }
}
