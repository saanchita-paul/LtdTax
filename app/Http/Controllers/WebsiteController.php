<?php

namespace App\Http\Controllers;

use App\Models\AppliedJob;
use App\Models\Book;
use App\Models\BookGallery;
use App\Models\BookInPackage;
use App\Models\BookPackage;
use App\Models\BookReview;
use App\Models\CandidateOtherRev;
use App\Models\CompanyDetailInfo;
use App\Models\Consultancy;
use App\Models\CandidateInfo;
use App\Models\MoreJob;
use App\Models\FounderMessageExtra;
use App\Models\ConsultCat;
use App\Models\Contact;
use App\Models\CompanyAltName;
use App\Models\ResumeViewStatus;
use App\Models\ProfessionalDegree;
use App\Models\ContactUsPage;
use App\Models\ComInfoMatchingVisibility;
use App\Models\Education;
use App\Models\CandidateQualification;
use App\Models\EducationInfo;
use App\Models\Skill;
use App\Models\RequiredJobSkill;
use App\Models\Job;
use App\Models\JobCat;
use App\Models\Location;
use App\Models\News;
use App\Models\Page;
use App\Models\Slider;
use App\Models\SliderImage;
use App\Models\SliderGallery;
use App\Models\Team;
use App\Models\Publication;
use App\Models\PublicationCat;
use App\Models\ResumeForJob;
use App\Models\Training;
use App\Models\TrainingCat;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index()
    {
        $title = 'The Taxman';
        $meta_img = '';
        $description = '';
        $job = DB::table('company_detail_infos')
            ->select('company_detail_infos.id', 'company_detail_infos.slug', 'company_detail_infos.name as company_name', 'company_detail_infos.logo as company_logo')
            ->join('jobs', 'company_detail_infos.id', '=', 'jobs.company_id')
            ->where('company_detail_infos.status', 1)
            ->whereNotNull('company_detail_infos.name')
            ->where('jobs.hot_job', 1)
            ->where('jobs.status', 1)
            ->groupBy('company_detail_infos.id', 'company_detail_infos.slug', 'company_detail_infos.name', 'company_detail_infos.logo')
            ->get();
        $slider_images='';
        $job_cat = JobCat::with('job')->get();
        $news = News::where('status', 1)->latest()->take(6)->get();
        $books_in_package = BookInPackage::where('status', 1)->get();
        $books = Book::where('status', 1)->get();
        $consultancy = Consultancy::where('status', 1)->get();
        $training = Training::where('status', 1)->get();
        $location = Location::where('status', 1)->where('district_id', null)->get();
        $slider = Slider::where('status',1)->first();
        $slider_gallery = SliderGallery::where('status',1)->get();
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $professional_degree = ProfessionalDegree::where('status',1)->get();
        if(!empty($slider)){
            $slider_images = SliderImage::where('status', 1)->where('slider_id',$slider->id)->orderBy('id', 'desc')->get();
        }else{
            $slider_images='';
        }
        $team = Team::where('status',1)->orderBy('id', 'desc')->first();
        return view('pages.index', compact('job', 'job_cat', 'news', 'professional_degree','education','books', 'books_in_package', 'consultancy', 'training', 'title', 'meta_img', 'description', 'location','slider_images','team','slider_gallery'));
    }
    public function search(Request $request)
    {  
        $title = 'Search';
        $meta_img = '';
        $description = '';
        $search_result= '';
        $salary_string = $request->salary;
        $age_string = $request->age;
        if (!empty($salary_string)) {
            $ary = explode("-", $salary_string);
            $min = filter_var($ary[0], FILTER_SANITIZE_NUMBER_INT);
            $sal_min = (int) $min;
            $max = filter_var($ary[1], FILTER_SANITIZE_NUMBER_INT);
            $sal_max = (int) $max;
        } 
        if (!empty($age_string)) {
            $ary = explode("-", $age_string);
            $min = filter_var($ary[0], FILTER_SANITIZE_NUMBER_INT);
            $age_min = (int) $min;
            $max = filter_var($ary[1], FILTER_SANITIZE_NUMBER_INT);
            $age_max = (int) $max;
        } 
        $keyword = $request->searchname ? $request->searchname : "";
        $location = $request->location;
        $job_cat = $request->job_cat;
        $experience = $request->exp;
        $qualification = $request->qua;
        $professional_degree = $request->pro_degree;

        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $degree = Education::where('status',1)->whereNotNull('parent_id')->get();
        $categories = JobCat::where('status', 1)->get();
        $locations = Location::whereNull('district_id')->get();

        $search_result = DB::table('jobs')
            ->select('jobs.title','jobs.slug as job_slug','company_detail_infos.district_id','jobs.deadline','jobs.id','company_detail_infos.name as company_name','company_detail_infos.address as company_address','candidate_infos.short_experience','more_jobs.salary','more_jobs.min_salary','more_jobs.max_salary')
            ->join('more_jobs', 'more_jobs.job_id', '=', 'jobs.id')
            ->join('company_detail_infos', 'more_jobs.company_id', '=', 'company_detail_infos.id')
            ->join('candidate_infos','candidate_infos.job_id','jobs.id')
            ->where('jobs.status', 1)
            ->distinct('jobs.id')
            ->orderBy('jobs.id','desc');

        if(!empty($keyword)){
            $search_result = $search_result->where('jobs.title', 'Like', "%{$keyword}%");
        }

        if(!empty($job_cat)){
            $search_result = $search_result->where('jobs.jobcat_id', $job_cat);
        }
        if(!empty($qualification)){
            $search_result = $search_result->join('candidate_qualifications','candidate_qualifications.job_id','jobs.id')
                ->where('candidate_qualifications.qualification_id',$qualification);
        }
        if(!empty($professional_degree)){
            $search_result = $search_result->join('required_professional_degrees','required_professional_degrees.job_id','jobs.id')
                ->where('required_professional_degrees.degree_id',$professional_degree);
        }
        if(!empty($experience)){
            $search_result = $search_result->where('candidate_infos.short_experience',$experience);
        }
        if(!empty($location)){
            $search_result = $search_result->where('company_detail_infos.district_id',$location);
        }
        if(!empty($sal_min)){
            $search_result = $search_result->where('more_jobs.min_salary','>=',$sal_min);
        }
        if(!empty($sal_max)){
            $search_result = $search_result->where('more_jobs.max_salary','<=',$sal_max);
        }
        if(!empty($age_min)){
            $search_result = $search_result->where('candidate_infos.age_min','>=',$age_min);
        }
        if(!empty($age_max)){
            $search_result = $search_result->where('candidate_infos.age_max','<=',$age_max);
        }
        $search_result = $search_result->paginate(8);
        return view('pages.search', compact('search_result', 'education','degree','meta_img', 'description', 'title', 'categories', 'locations'));
    }
    public function joblist()
    {
        $title = 'Job List';
        $meta_img = '';
        $description = '';
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $degree = Education::where('status',1)->whereNotNull('parent_id')->get();
        $professional_degree = ProfessionalDegree::where('status',1)->get();
        $jobs = Job::where('status',1)->orderBy('id','desc')->paginate(8);
        $categories = JobCat::where('status', 1)->get();
        $location = Location::whereNull('district_id')->get();
        return view('pages.joblist', compact('jobs','location', 'education','degree','categories', 'title', 'description', 'meta_img','professional_degree'));
    }
    public function jobfilter(Request $request){
        $cat_filter = $request->cat_filter;
        $qua_filter = $request->qua_filter; 
        $pro_deg_filter=$request->pro_deg_filter;
        $sal_max = $request->sal_max;
        $sal_min = $request->sal_min;
        $age_min = $request->age_min;
        $age_max = $request->age_max;
        $exp_filter= $request->exp_filter;
        $loc_filter = $request->loc_filter;
        $offset = $request->offset ? $request->offset : 0;

        $search_result = DB::table('jobs')
            ->select('jobs.title','locations.name as district_name','company_alt_names.alt_name','jobs.slug as job_slug','company_detail_infos.district_id','jobs.deadline','jobs.id','company_detail_infos.name as company_name','company_detail_infos.address as company_address','candidate_infos.short_experience','more_jobs.salary','more_jobs.min_salary','more_jobs.max_salary', 
            DB::raw("(SELECT GROUP_CONCAT(education.name) FROM education, candidate_qualifications WHERE education.id = candidate_qualifications.degree_id AND candidate_qualifications.job_id=jobs.id) as eduName"))
            ->join('more_jobs', 'more_jobs.job_id', '=', 'jobs.id')
            ->join('company_detail_infos', 'more_jobs.company_id', '=', 'company_detail_infos.id')
            ->join('candidate_infos','candidate_infos.job_id','jobs.id')
            ->join('company_alt_names','company_alt_names.job_id','jobs.id')
            ->join('locations','company_detail_infos.district_id','locations.id')
            ->where('jobs.status', 1)
            ->distinct('jobs.id')
            ->orderBy('jobs.id','desc');

        if(!empty($cat_filter)){
            $search_result = $search_result->where('jobs.jobcat_id', $cat_filter);
        } 
        if(!empty($qua_filter)){
            $search_result = $search_result
            ->join('candidate_qualifications','candidate_qualifications.job_id','jobs.id')
            ->where('candidate_qualifications.qualification_id',$qua_filter);
        } 
        if(!empty($pro_deg_filter)){
            $search_result = $search_result->join('required_professional_degrees','required_professional_degrees.job_id','jobs.id')
            ->where('required_professional_degrees.degree_id',$pro_deg_filter);
        }
        if(!empty($sal_min)){
            $search_result = $search_result->where('more_jobs.min_salary','>=',$sal_min);
        }
        if(!empty($sal_max)){
            $search_result = $search_result->where('more_jobs.max_salary','<=',$sal_max);
        }
        if( !empty($age_min)){
            $search_result = $search_result->where('candidate_infos.age_min','>=',$age_min);
        } 
        if(!empty($age_max)){
            $search_result = $search_result->where('candidate_infos.age_max','<=',$age_max);
        } 
        if(!empty($exp_filter)){
            $search_result = $search_result->where('candidate_infos.short_experience',$exp_filter);
        } 
        if(!empty($loc_filter)){
            $search_result = $search_result->where('company_detail_infos.district_id',$loc_filter);
        }
        $search_result = $search_result->limit(34)->get();
        return  json_encode($search_result);
    }
    
    public function jobdetails($id, $slug)
    {   
        $job_sidebar = DB::table('jobs')
		->join('more_jobs', 'more_jobs.job_id', '=', 'jobs.id')
		->join('candidate_infos', 'candidate_infos.job_id', '=', 'jobs.id')
		->join('company_detail_infos', 'company_detail_infos.id', '=', 'more_jobs.company_id')
		->where('jobs.id', $id)
		->first();
		
		$job_info = Job::where('status',1)->where('id',$id)->first();
        $job_cat = JobCat::where('status',1)->where('id',$job_info->jobcat_id)->first();
        
        $title = 'Job Details ::'.$job_info->title;
        $meta_img = '';
        $description = '';
        $company_alt_name='';
        $all_status = ComInfoMatchingVisibility::where('job_id',$id)->first();
        $candidate = CandidateInfo::where('job_id',$id)->first();
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $degree = Education::where('status',1)->whereNotNull('parent_id')->get();
        $candidate_qualification =CandidateQualification::where('job_id', $id)->where('status',1)->get();
        $more_jobs =MoreJob::where('job_id',$id)->first();
        $company_info =CompanyDetailInfo::where('id',$job_info->company_id)->first();
        $company = CompanyAltName::where('job_id', $id)->first();
        if(!empty($company)){
            $company_alt_name = $company->alt_name;
        } 
        $company_user_id = $company_info->user_id;
        $c_email = User::where('id',$company_user_id)->first();
        $company_email = $c_email->email;
        $deadline=  $job_info->deadline;
        $post_date = $job_info->created_at;
        $skills = Skill::where('status',1)->get();
        $required_job_skills = RequiredJobSkill::where('status',1)->where('job_id',$id)->get();
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

        return view('pages.jobdetails')->with([
            'job_id'=> $id,
            'job_cat'=>$job_cat,
			'job_sidebar'=>$job_sidebar,
            'meta_img'=>$meta_img,
            'title'=>$title,
            'description' => $description,
            'candidate' => $candidate,
            'more_jobs' => $more_jobs,
            'company_info' => $company_info,
            'job_info'=>$job_info,
            'all_status' => $all_status,
            'company_email' => $company_email,
            'deadline'=>$deadline,
            'post_date'=> $post_date,
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
    public function applyJob($job_id, $user_id)
    {
        $us = User::findOrFail($user_id);
        $user_role = $us->user_role;
        if (Auth::user() != '') {
            $app = DB::table('applied_jobs')
                ->where('job_id', $job_id)
                ->where('user_id', $user_id)
                ->first();
            if ($user_role == 2) {
                if ($app) {
                    $error = "You have already applied for the job.";
                    return back()->with('error', $error);
                } else {
                    $data = array();
                    $personal_infos = DB::table('users')
                        ->join('personal_infos', 'personal_infos.user_id', '=', 'users.id')
                        ->where('users.id', $user_id)
                        ->first();
                    $educations = EducationInfo::where('user_id', $user_id)->get();
                    $user_career = DB::table('careers')->where('personal_id', $user_id)->first();
                    $skill = DB::table('candidate_skills')->where('user_id', $user_id)->get();
                    $language = DB::table('candidate_languages')->where('user_id', $user_id)->get();
                    $edu_training = DB::table('education_trainings')->where('user_id', $user_id)->get();
                    $experience = DB::table('candidate_employments')->where('user_id', $user_id)->get(); // employment
                    $certificate = DB::table('professional_certificates')->where('user_id', $user_id)->get();
                    $reference = DB::table('candidate_refers')->where('user_id', $user_id)->get();
                    $candidate_other_info = CandidateOtherRev::where('user_id', $user_id)->first();
                    if ($educations != '' && !empty($personal_infos->name) && $personal_infos->lname != '' && $personal_infos->dob != '' && $personal_infos->fathers_name != '' && $personal_infos->mothers_name != '' && $personal_infos->marital_status != '' && $personal_infos->gender != '' && $personal_infos->phone != '' && $personal_infos->email != '' && $personal_infos->nationality != '' && $personal_infos->photo != '') {
                        $applied = AppliedJob::create(
                            array('job_id' => $job_id,
                                'user_id' => $user_id,
                            )
                        );
                        $j_id = Job::where('status',1)->where('id',$job_id)->first();
                        $company_id = $j_id->company_id;
                        $emp_id= CompanyDetailInfo::where('status',1)->where('id',$company_id)->first();
                        $employer_id =$emp_id->user_id;
                        $view_status = ResumeViewStatus::create(
                            array('application_id' => $applied->id,
                                'employer_id' => $employer_id,
                            )
                        );
                        $data['personal_infos'] = $personal_infos;
                        $data['edu'] = $educations;
                        $data['career'] = $user_career;
                        $data['skill'] = $skill;
                        $data['language'] = $language;
                        $data['edu_training'] = $edu_training;
                        $data['experience'] = $experience;
                        $data['certificate'] = $certificate;
                        $data['reference'] = $reference;
                        $data['candidate_other_info'] = $candidate_other_info;
                        $store['job_id'] = $job_id;
                        $store['user_id'] = $user_id;
                        $store['applicant_resume_details'] = json_encode($data);
                        ResumeForJob::insert($store);
                        $user = User::findOrFail($user_id);
                        $user_name = $user->username;
                        $user_email = $user->email;
                        $user_phone = $user->phone;
                        $company = Job::findOrFail($job_id);
                        //job name
                        $job_title = $company->title;
                        $company_id = $company->company_id;
                        $c = CompanyDetailInfo::findOrFail($company_id);
                        $company_name = $c->name;
                        $company_address = $c->address;
                        $company_url = $c->url;
                        $company_user_id = $c->user_id;
                        $c_user = User::findOrFail($company_user_id);
                        $company_email = $c_user->email;
                        $admin_email = 'haaamiknhr@gmail.com';
                        //Send Admin Email
                        \Mail::send('email/adminEmailTemplate', array(
                            'user_name' => $user_name,
                            'user_email' => $user_email,
                            'user_phone' => $user_phone,
                            'company_name' => $company_name,
                            'company_address' => $company_address,
                            'company_url' => $company_url,
                            'job_title' => $job_title,
                        ), function ($message) use ($admin_email) {
                            $message->from('a7604366@gmail.com', 'Taxman');
                            $message->to($admin_email)->subject('Job Application');
                        });
                        //Send Company Email
                        \Mail::send('email/companyEmailTemplate', array(
                            'user_name' => $user_name,
                            'user_email' => $user_email,
                            'user_phone' => $user_phone,
                            'company_name' => $company_name,
                            'company_address' => $company_address,
                            'company_url' => $company_url,
                            'job_title' => $job_title,
                        ), function ($message) use ($company_email) {
                            $message->from('a7604366@gmail.com', 'Taxman');
                            $message->to($company_email)->subject('Job Application');
                        });
                        //Send Candidate Email
                        \Mail::send('email/candidateEmailTemplate', array(
                            'user_name' => $user_name,
                            'user_email' => $user_email,
                            'user_phone' => $user_phone,
                            'company_name' => $company_name,
                            'company_address' => $company_address,
                            'company_url' => $company_url,
                            'job_title' => $job_title,
                        ), function ($message) use ($user_email) {
                            $message->from('a7604366@gmail.com', 'Taxman');
                            $message->to($user_email)->subject('Job Application');
                        });

                        return back()->with('success', 'You have successfully applied for the job.');
                    } else {
                        return redirect('/user/edit-resume')->with('warning', 'Personal info, education and photo must require to apply the job.');
                    }
                }

            } else {
                echo "You can not apply for the job";
            }

        } else {
            return redirect('/login');
        }
    }
    public function jobcatlist()
    {
        $title = 'Job Category List';
        $meta_img = '';
        $description = '';
        $jobcat = JobCat::where('status', 1)->get();
        return view('pages.jobcatlist', compact('jobcat', 'title', 'description', 'meta_img'));
    }
    public function jobcatdetails($id, $slug)
    {
        $jobcat = JobCat::where('id', $id)->get();
        $title = 'Job Category Details :: '.$jobcat->title;
        $meta_img = '';
        $description = '';
        return view('pages.jobcatdetails', compact('jobcat', 'title', 'description', 'meta_img'));
    }
    public function employer()
    {
        $title = 'Employer List';
        $meta_img = '';
        $description = '';
        $company_info = CompanyDetailInfo::where('status', 1)->get();
        return view('pages.employer', compact('company_info', 'title', 'description', 'meta_img'));
    }
    public function employerdetails($id)
    {
        $company_info = CompanyDetailInfo::Join('jobs', 'jobs.company_id', '=', 'company_detail_infos.id')
            ->where('company_detail_infos.id', $id)->first();
        $employer = DB::table('jobs')
            ->Join('company_detail_infos', 'company_detail_infos.id', '=', 'jobs.company_id')
            ->Join('company_contact_details', 'company_contact_details.company_id', '=', 'company_detail_infos.id')
            ->Join('company_billing_addresses', 'company_billing_addresses.company_id', '=', 'company_detail_infos.id')
            ->get();
        $title = 'Company Details';
        $meta_img = '';
        $description = '';
        return view('pages.employerdetails', compact('company_info', 'title', 'description', 'meta_img', 'employer'));
    }
    public function news()
    {
        $title = 'News';
        $meta_img = '';
        $description = '';
        $news = News::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        return view('pages.news', compact('news', 'title', 'description', 'meta_img'));
    }
    public function newsdetails($id, $slug)
    {
        $news = News::where('id', $id)->first();
        $title = $news->name;
        $meta_img = $news->feature_img;
        $description = $news->short_desc;
        return view('pages.newsdetails', compact('news', 'title', 'description', 'meta_img'));
    }
    public function publication()
    {
        $title = 'Publication';
        $meta_img = '';
        $description = '';
        $publication = Publication::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        return view('pages.publication', compact('publication', 'title', 'description', 'meta_img'));
    }
    public function publicationcat($id, $slug)
    {
        $publication = Publication::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        $pubcat = PublicationCat::where('status', 1)->where('slug', $slug)->orderBy('id', 'desc')->get();
        $public_post = Publication::where('status', 1)->where('pcat_id', $id)->orderBy('id', 'desc')->paginate(6);
        $title = 'Publication Category';
        $meta_img = '';
        $description = '';
        return view('pages.publicationcat', compact('public_post', 'pubcat', 'title', 'description', 'meta_img', 'publication'));
    }
    public function publicationdetails($id, $slug)
    {
        $package_details = '';
        $publication = Book::where('status',1)->where('id', $id)->first();
        $books_in_package_all = BookInPackage::where('status', 1)->where('book_id', '!=', $publication->id)->get();
        $books = Book::inRandomOrder()->where('status', 1)->where('id', '!=', $id)->orderBy('id', 'desc')->take(4)->get();
        $books_in_package = BookInPackage::where('book_id', $id)->where('status',1)->first();
        if (!empty($books_in_package)) {
            $package_id = $books_in_package->package_id;

            $package_details = BookPackage::where('status',1)->where('id', $package_id)->first();
        }
        $title = 'Publication Details :: '.$publication->name;
        $meta_img = $publication->feature_img;
        $description = '';
        return view('pages.publicationdetails', compact('books_in_package_all', 'books', 'publication', 'title', 'description', 'meta_img', 'books_in_package', 'package_details'));
    }
    public function packageDetails($package_id, $package_slug)
    {
        $package = BookPackage::findOrFail($package_id);
        $title = 'Publication Details :: Package - '.$package->package_name;
        $meta_img = $package->package_img;
        $description = '';
        $books = Book::where('status', 1)->get();
        $books_in_package = BookInPackage::where('package_id', $package->id)->where('status',1)->get();
        return view('pages.packageDetails', compact('package', 'books_in_package', 'books', 'title', 'description', 'meta_img'));
    }
    public function training()
    {
        $title = 'Training Category';
        $meta_img = '';
        $description = '';
        $all_training_category =TrainingCat::where('status',1)->get();
        $all_trainer = User::where('status',1)->where('user_role',3)->get();
        $training_cat = TrainingCat::where('status', 1)->paginate(7);
        return view('pages.training', compact('all_training_category','all_trainer','training_cat', 'title', 'description', 'meta_img'));
    }
    public function trainingcat($id, $slug)
    {
        $traincat = TrainingCat::where('status', 1)->where('slug', $slug)->orderBy('id', 'desc')->paginate(6);
        $cat_title =TrainingCat::where('status', 1)->where('slug', $slug)->first();
        $train_post = Training::where('status', 1)->where('tcat_id', $id)->orderBy('id', 'desc')->paginate(6);
        $all_training_category =TrainingCat::where('status',1)->get();
        $all_trainer = User::where('status',1)->where('user_role',3)->get();
        $title = 'Training Category :: '.$cat_title->title;
        $meta_img = '';
        $description = '';
        return view('pages.trainingcat', compact('all_training_category','all_trainer','train_post', 'traincat', 'title', 'description', 'meta_img'));
    }
    public function trainingdetails($id, $slug)
    {
        $training = Training::where('id', $id)->where('status', 1)->first();
        $train_cat =TrainingCat::where('status', 1)->where('id',$training->tcat_id)->first();
        $trainer =User::where('status', 1)->where('id',$training->trainer_id)->first();
        $related_training_all =Training::where('status', 1)->take(4)->inRandomOrder()->get();
        $related_training =Training::where('status', 1)->where('tcat_id',$training->tcat_id)->where('id','!=',$id)->take(4)->orderBy('id','desc')->get();
        $courses_from_trainer = Training::where('status', 1)->where('trainer_id',$trainer->id)->get();
        $all_training_category =TrainingCat::where('status',1)->get();
        $all_trainer = User::where('status',1)->where('user_role',3)->get();
        $title = 'Training Details :: '.$training->title;
        $meta_img = $training->trainer_img;
        $description = '';
        return view('pages.trainingdetails', compact('training','all_training_category','all_trainer','courses_from_trainer','train_cat','related_training', 'related_training_all', 'trainer','title', 'description', 'meta_img'));
    }
    public function trainingSearch(Request $request){
        $search_result ='';
        $training_title= $request->title;
        $training_cat= $request->category;
        $resource_person =$request->resource_person;
        $all_training_category =TrainingCat::where('status',1)->get();
        $all_trainer = User::where('status',1)->where('user_role',3)->get();
        $title = 'Training Search';
        $meta_img = '';
        $description = '';
        
        if(!empty($training_title) && !empty($training_cat) && !empty($resource_person)){
            $search_result = DB::table('trainings')
            ->where('tcat_id',$training_cat)
            ->where('trainer_id',$resource_person)
            ->where('title', 'Like', "%{$training_title}%")
            ->get(); 
        }
        if(!empty($training_title) && !empty($training_cat) && empty($resource_person)){
            $search_result = DB::table('trainings')
            ->where('tcat_id',$training_cat)
            ->where('title', 'Like', "%{$training_title}%")
            ->get();
        }
        if(!empty($training_title) && !empty($resource_person) && empty($training_cat) ){
            $search_result = DB::table('trainings')
            ->where('trainer_id',$resource_person)
            ->where('title', 'Like', "%{$training_title}%")
            ->get();
        }
        if(!empty($training_cat) && !empty($resource_person) && empty($training_title)){
            $search_result = DB::table('trainings')
            ->where('trainer_id',$resource_person)
            ->where('title', 'Like', "%{$training_title}%")
            ->get();
        }
        if(!empty($training_title) && empty($resource_person) && empty($training_cat)){
            $search_result = DB::table('trainings')
            ->where('title', 'Like', "%{$training_title}%")
            ->get();              
        }
        if(!empty($training_cat) && empty($training_title) && empty($resource_person)){
            $search_result = DB::table('trainings')
            ->where('tcat_id',$training_cat)
            ->get(); 
        }
        if(!empty($resource_person) && empty($training_cat) && empty($training_title)){
            $search_result = DB::table('trainings')
            ->where('trainer_id',$resource_person)
            ->get(); 
        }
        return view('pages.trainingSearchResult',compact('search_result','title','meta_img','description','all_training_category','all_trainer'));
    }
    public function contact()
    {
        $title = 'Contact';
        $meta_img = '';
        $description = '';
        $contact = ContactUsPage::where('status',1)->orderBy('id', 'desc')->first();
        return view('pages.contact', compact('title', 'description', 'meta_img','contact'));
    }
    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        \Mail::send('pages.emailtemplate',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_message' => $request->get('message'),
            ), function ($message) use ($request) {
                $message->from($request->email);
            });
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
    public function aboutUS(){
        $title = 'About Us';
        $meta_img = '';
        $description = '';
        return view('pages.about-us',compact('title', 'description', 'meta_img'));
    }
    public function privacyPolicy(){
        $title = 'Privacy & Policies';
        $meta_img = '';
        $description = '';
        return view('pages.privacy-policy',compact('title', 'description', 'meta_img'));
    }
    public function returnRefund(){
        $title = 'Return & Refund';
        $meta_img = '';
        $description = '';
        return view('pages.return-refund',compact('title', 'description', 'meta_img'));
    }
    public function termsConditions(){
        $title = 'Terms & Conditions';
        $meta_img = '';
        $description = '';
        return view('pages.terms-conditions',compact('title', 'description', 'meta_img'));
    }
    public function foundermsg()
    {
        $title = 'Founder Message';
        $meta_img = '';
        $description = '';
        $founder = FounderMessageExtra::where('status',1)->first();
        $page = Page::where('id', 1)->first();
        return view('pages.foundermsg', compact('page', 'title', 'description', 'meta_img','founder'));
    }
    public function history()
    {
        $title = 'History';
        $meta_img = '';
        $description = '';
        $page = Page::where('id', 2)->first();
        return view('pages.history', compact('page', 'title', 'description', 'meta_img'));
    }
    public function mission()
    {
        $title = 'Mission-vision';
        $meta_img = '';
        $description = '';
        $page = Page::where('id', 3)->first();
        return view('pages.mission', compact('page', 'title', 'description', 'meta_img'));
    }
    public function objective()
    {
        $title = 'Objectives';
        $meta_img = '';
        $description = '';
        $page = Page::where('id', 4)->first();
        return view('pages.objective', compact('page', 'title', 'description', 'meta_img'));
    }
    public function award()
    {
        $title = 'Award & Achievements';
        $meta_img = '';
        $description = '';
        $page = Page::where('id', 5)->first();
        return view('pages.award', compact('page', 'title', 'description', 'meta_img'));
    }
    public function recruitmentSpecialist()
    {
        $title = 'Recruitment Specialist';
        $meta_img = '';
        $description = '';
        return view('pages.recruitment-specialist', compact('title', 'description', 'meta_img'));
    }
    public function consultancy()
    {
        $title = 'Consultancy';
        $meta_img = '';
        $description = '';
        $consult = Consultancy::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        $consultcat = ConsultCat::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        return view('pages.consultancy', compact('consult', 'consultcat', 'title', 'description', 'meta_img'));
    }
    public function consultancycat($id, $slug)
    {
        $title = 'Consultancy Category';
        $meta_img = '';
        $description = '';
        $consultcat = ConsultCat::where('status', 1)->where('slug', $slug)->orderBy('id', 'desc')->paginate(6);
        $consult = Consultancy::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        $consult_post = Consultancy::where('status', 1)->where('concat_id', $id)->orderBy('id', 'desc')->paginate(6);
        return view('pages.consultancycat', compact('consult_post', 'consultcat', 'consult', 'title', 'description', 'meta_img'));
    }

    public function consultancydetails($id, $slug)
    {
        $consult = Consultancy::where('id', $id)->where('status',1)->first();
        $title = 'Consultancy Details ::'.$consult->title;
        $meta_img = '';
        $description = '';
        $more_consultancy = Consultancy::where('id','!=', $id)->where('status',1)->latest()->take(8)->get();
        return view('pages.consultancydetails', compact('consult','more_consultancy', 'title', 'description', 'meta_img'));
    }
    public function books()
    {
        $title = 'Books';
        $meta_img = '';
        $description = '';
        $books = Book::where('status', 1)->orderBy('id', 'desc')->get();
        return view('pages.books', compact('books', 'title', 'description', 'meta_img'));
    }
    public function booksdetails($id, $slug)
    {
        $books = Book::where('id', $id)->first();
        $book_gallary = BookGallery::where('book_id', $books->id)->get();
        $title = $books->name;
        $meta_img = $books->feature_img;
        $description = $books->short_desc;
        $reviews = BookReview::where('book_id', $id)->where('status', '1')->latest()->limit(5)->get();
        return view('pages.booksdetails', compact('books', 'reviews', 'book_gallary', 'title', 'description', 'meta_img'));
    }
    public function bookreview(Request $request, $id)
    {
        $auth = Auth::user()->id;
        $request->validate([
            'rating' => 'required',
            'review' => 'required',
        ]);
        BookReview::create(array(
            'user_id' => $auth,
            'book_id' => $id,
            'rating' => $request->rating,
            'review' => $request->review,
            'status' => '0',
        ));
        return back()->with('success', 'Review added Successfully.');
    }
    public function catJob($id, $slug)
    {
        $title = 'Job Category List';
        $meta_img = '';
        $description = '';
        $education = Education::where('status',1)->where('parent_id',NULL)->get();
        $degree = Education::where('status',1)->whereNotNull('parent_id')->get();
        $jobs = Job::where('status',1)->where('jobcat_id',$id)->where('hot_job',0)->orderBy('id','desc')->paginate(8);
        $job_cat = JobCat::where('status', 1)->where('id',$id)->first();
        $categories = JobCat::where('status', 1)->get();
        $location = Location::whereNull('district_id')->get();
        return view('pages.catjob', compact('jobs','job_cat','location', 'categories','title', 'education','degree','description', 'meta_img'));
    }
}
