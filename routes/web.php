<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Artisan;
//admin routes
Route::get('dashboard', 'App\Http\Controllers\AdminController@index')->middleware('admin')->name('dashboard');
Route::group(['prefix'=>'admin'], function(){
    Route::group(['middleware'=>'auth','middleware'=>'admin'],function(){
        Route::resource('orders', AdminOrderController::class);
        Route::group(['prefix'=>'orders/type'], function(){
            Route::get('/book', 'App\Http\Controllers\AdminOrderController@bookOrder')->name('book-order');
            Route::get('/training', 'App\Http\Controllers\AdminOrderController@trainingOrder')->name('training-order');
        });
        Route::group(['prefix'=>'payment'], function(){
            Route::get('/cash-on-delivery', 'App\Http\Controllers\PaymentController@cashOnDelivery')->name('cash-on-delivery');
            Route::post('/cash-on-delivery/update', 'App\Http\Controllers\PaymentController@cashUpdate')->name('cash.update');
            Route::get('/ssl-commerce', 'App\Http\Controllers\PaymentController@sslCommerce')->name('ssl-commerce');
            Route::post('/ssl-commerce/update', 'App\Http\Controllers\PaymentController@sslUpdate')->name('ssl.update');
        });
        Route::group(['prefix' => 'slider'], function() {
            Route::get('/', 'App\Http\Controllers\SliderController@index');
            Route::get('/images', 'App\Http\Controllers\SliderController@sliderImages');
            Route::get('/add', 'App\Http\Controllers\SliderController@add')->name('slider.add');
            Route::get('/add/image', 'App\Http\Controllers\SliderController@addImage')->name('slider.add-image');
            Route::post('/image/store', 'App\Http\Controllers\SliderController@storeImage')->name('slider.store-image');
            Route::post('/store', 'App\Http\Controllers\SliderController@store')->name('slider.store');

            Route::post('/store', 'App\Http\Controllers\SliderController@store')->name('slider.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\SliderController@edit')->name('slider.edit');
            Route::get('/{id}/edit/image', 'App\Http\Controllers\SliderController@editImage')->name('slider.edit-image');
            Route::post('/{id}/update', 'App\Http\Controllers\SliderController@update')->name('slider.update');
            Route::post('/{id}/update/image', 'App\Http\Controllers\SliderController@updateImage')->name('slider.updateImage');
            Route::get('/{id}/delete', 'App\Http\Controllers\SliderController@delete')->name('slider.delete');
            Route::get('/{id}/delete/image', 'App\Http\Controllers\SliderController@deleteImage')->name('slider.delete-image'); 
            Route::get('/gallery/{id}/delete', 'App\Http\Controllers\SliderController@delete_gallery')->name('slider.gallery.delete');
        }); 
        Route::group(['prefix' => 'team'], function() {
            Route::get('/', 'App\Http\Controllers\TeamController@index');
            Route::get('/add', 'App\Http\Controllers\TeamController@add')->name('team.add');
            Route::post('/store', 'App\Http\Controllers\TeamController@store')->name('team.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\TeamController@edit')->name('team.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\TeamController@update')->name('team.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\TeamController@delete')->name('team.delete'); 
        });
        Route::group(['prefix' => 'footer'], function() { 
            Route::group(['prefix' => 'letsknowus'], function() {
                Route::get('/', 'App\Http\Controllers\LetUsKnowController@index');
                Route::get('/add', 'App\Http\Controllers\LetUsKnowController@add')->name('footer.lets_know_us.add');
                Route::post('/store', 'App\Http\Controllers\LetUsKnowController@store')->name('footer.lets_know_us.store');
                Route::get('/{id}/edit', 'App\Http\Controllers\LetUsKnowController@edit')->name('footer.lets_know_us.edit');
                Route::post('/{id}/update', 'App\Http\Controllers\LetUsKnowController@update')->name('footer.lets_know_us.update');
                Route::get('/{id}/delete', 'App\Http\Controllers\LetUsKnowController@delete')->name('footer.lets_know_us.delete'); 
            }); 

            Route::group(['prefix' => 'jobseeker'], function() {
                Route::get('/', 'App\Http\Controllers\JobSeekerController@index');
                Route::get('/add', 'App\Http\Controllers\JobSeekerController@add')->name('footer.jobseeker.add');
                Route::post('/store', 'App\Http\Controllers\JobSeekerController@store')->name('footer.jobseeker.store');
                Route::get('/{id}/edit', 'App\Http\Controllers\JobSeekerController@edit')->name('footer.jobseeker.edit');
                Route::post('/{id}/update', 'App\Http\Controllers\JobSeekerController@update')->name('footer.jobseeker.update');
                Route::get('/{id}/delete', 'App\Http\Controllers\JobSeekerController@delete')->name('footer.jobseeker.delete'); 
            }); 
            Route::group(['prefix' => 'employer'], function() {
                Route::get('/', 'App\Http\Controllers\FooterEmployerController@index');
                Route::get('/add', 'App\Http\Controllers\FooterEmployerController@add')->name('footer.employer.add');
                Route::post('/store', 'App\Http\Controllers\FooterEmployerController@store')->name('footer.employer.store');
                Route::get('/{id}/edit', 'App\Http\Controllers\FooterEmployerController@edit')->name('footer.employer.edit');
                Route::post('/{id}/update', 'App\Http\Controllers\FooterEmployerController@update')->name('footer.employer.update');
                Route::get('/{id}/delete', 'App\Http\Controllers\FooterEmployerController@delete')->name('footer.employer.delete'); 
            }); 
            Route::group(['prefix' => 'social-media-icon'], function() {
                Route::get('/', 'App\Http\Controllers\SocialMediaController@index');
                Route::get('/add', 'App\Http\Controllers\SocialMediaController@add')->name('footer.social-media-icon.add');
                Route::post('/store', 'App\Http\Controllers\SocialMediaController@store')->name('footer.social-media-icon.store');
                Route::get('/{id}/edit', 'App\Http\Controllers\SocialMediaController@edit')->name('footer.social-media-icon.edit');
                Route::post('/{id}/update', 'App\Http\Controllers\SocialMediaController@update')->name('footer.social-media-icon.update');
                Route::get('/{id}/delete', 'App\Http\Controllers\SocialMediaController@delete')->name('footer.social-media-icon.delete'); 
                Route::get('/changeStatus', 'App\Http\Controllers\SocialMediaController@changeStatus');
            });
        });

        Route::group(['prefix' => 'contact_us'], function() {
            Route::get('/', 'App\Http\Controllers\ContactUsPageController@index')->name('contact_us.list');
            Route::get('/add', 'App\Http\Controllers\ContactUsPageController@add')->name('contact_us.add');
            Route::post('/store', 'App\Http\Controllers\ContactUsPageController@store')->name('contact_us.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\ContactUsPageController@edit')->name('contact_us.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\ContactUsPageController@update')->name('contact_us.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\ContactUsPageController@delete')->name('contact_us.delete'); 
        }); 
        Route::group(['prefix'=>'contact'], function(){
            Route::get('/', 'App\Http\Controllers\ContactController@index');
            Route::get('/add', 'App\Http\Controllers\ContactController@add');
            Route::post('/store', 'App\Http\Controllers\ContactController@store')->name('webcontact.store');
            Route::get('/{id}/view', 'App\Http\Controllers\ContactController@edit')->name('webcontact.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\ContactController@update')->name('webcontact.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\ContactController@delete')->name('webcontact.delete'); 
        });
        Route::group(['prefix'=>'news'], function(){
            Route::get('/', 'App\Http\Controllers\NewsController@index');
            Route::get('/add', 'App\Http\Controllers\NewsController@add');
            Route::post('/store', 'App\Http\Controllers\NewsController@store')->name('news.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\NewsController@edit')->name('news.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\NewsController@update')->name('news.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\NewsController@delete')->name('news.delete'); 
            Route::get('/category', 'App\Http\Controllers\NewsController@category');
            Route::post('/category/store', 'App\Http\Controllers\NewsController@store_cat')->name('news.cat_store');
            Route::get('/category/{id}/delete', 'App\Http\Controllers\NewsController@delete_cat')->name('news.cat_delete'); 
        });
        Route::group(['prefix'=>'admin-user'], function(){
            Route::get('/all', 'App\Http\Controllers\AdminController@all')->name('admin.all');
            Route::get('/add', 'App\Http\Controllers\AdminController@add')->name('admin.add');
            Route::post('/store', 'App\Http\Controllers\AdminController@store')->name('admin.store');
            Route::get('/edit/{id}', 'App\Http\Controllers\AdminController@edit_admin')->name('admin.edit');
            Route::post('/update/{id}', 'App\Http\Controllers\AdminController@update_admin')->name('admin.update');
            Route::get('/delete/{id}', 'App\Http\Controllers\AdminController@delete_admin')->name('admin.delete');
        });
        Route::group(['prefix'=>'books'], function(){
            Route::get('/', 'App\Http\Controllers\BookController@list_book');
            Route::get('/add', 'App\Http\Controllers\BookController@add_book');
            Route::post('/store', 'App\Http\Controllers\BookController@book_store')->name('books.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\BookController@edit_book')->name('books.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\BookController@update_book')->name('books.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\BookController@delete_book')->name('books.delete'); 
            Route::get('/gallery/{id}/delete', 'App\Http\Controllers\BookController@delete_gallery')->name('books.gallery.delete'); 
            Route::get('/review','App\Http\Controllers\BookController@book_review_get');
            Route::get('/review/status/{id}/{status}','App\Http\Controllers\BookController@book_review_statis');
            Route::get('/reviewdelete/{id}','App\Http\Controllers\BookController@book_review_destroy')->name('review.delete');        
        });
        Route::group(['prefix' => 'page'], function() {
            Route::get('/', 'App\Http\Controllers\PageController@index');
            Route::get('/add', 'App\Http\Controllers\PageController@add');
            Route::post('/store', 'App\Http\Controllers\PageController@store')->name('page.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\PageController@edit')->name('page.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\PageController@update')->name('page.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\PageController@delete')->name('page.delete'); 
        });       
        Route::group(['prefix' => 'publication'], function() {
            Route::get('/', 'App\Http\Controllers\PublicationController@index');
            Route::get('/the-taxman-publication/package/add', 'App\Http\Controllers\PublicationController@addPackage')->name('add-package');
            Route::post('/store', 'App\Http\Controllers\PublicationController@store')->name('package.store');
            Route::get('/the-taxman-publication/package/view', 'App\Http\Controllers\PublicationController@viewPackage')->name('view-package');
            Route::get('/the-taxman-publication/package/edit/{id}', 'App\Http\Controllers\PublicationController@editPackage')->name('edit-package');
            Route::post('/the-taxman-publication/package/update/{id}', 'App\Http\Controllers\PublicationController@updatePackage')->name('update-package');   
            Route::get('/the-taxman-publication/package/delete/{id}', 'App\Http\Controllers\PublicationController@deletePackage')->name('delete-package');
            Route::get('/{id}/edit', 'App\Http\Controllers\PublicationController@edit')->name('pub.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\PublicationController@update')->name('pub.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\PublicationController@delete')->name('pub.delete');
            Route::get('/category','App\Http\Controllers\PublicationController@category');
            Route::post('/category/store', 'App\Http\Controllers\PublicationController@cat_store')->name('pubcat.store');
            Route::get('/category/{id}/edit', 'App\Http\Controllers\PublicationController@cat_edit')->name('pubcat.edit');
            Route::post('/category/{id}/update', 'App\Http\Controllers\PublicationController@cat_update')->name('pubcat.update');
            Route::get('/category/{id}/delete', 'App\Http\Controllers\PublicationController@cat_delete')->name('pubcat.delete');
        });   
        Route::group(['prefix' => 'training'], function() {
            Route::get('/', 'App\Http\Controllers\TrainingController@index');
            Route::get('/add', 'App\Http\Controllers\TrainingController@add');
            Route::post('/store', 'App\Http\Controllers\TrainingController@store')->name('training.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\TrainingController@edit')->name('training.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\TrainingController@update')->name('training.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\TrainingController@delete')->name('training.delete');
            Route::get('/category','App\Http\Controllers\TrainingController@category');
            Route::post('/category/store', 'App\Http\Controllers\TrainingController@cat_store')->name('trcat.store');
            Route::get('/category/{id}/edit', 'App\Http\Controllers\TrainingController@cat_edit')->name('trcat.edit');
            Route::post('/category/{id}/update', 'App\Http\Controllers\TrainingController@cat_update')->name('trcat.update');
            Route::get('/category/{id}/delete', 'App\Http\Controllers\TrainingController@cat_delete')->name('trcat.delete');
            Route::get('/all-trainer', 'App\Http\Controllers\TrainingController@allTrainer')->name('all.trainer'); 
            Route::get('/add-trainer', 'App\Http\Controllers\TrainingController@addTrainer')->name('add.trainer'); 
            Route::post('/store-trainer', 'App\Http\Controllers\TrainingController@storeTrainer')->name('trainer.store'); 
            Route::get('/edit-trainer/{id}', 'App\Http\Controllers\TrainingController@editTrainer')->name('edit.trainer'); 
            Route::post('/update-trainer/{id}', 'App\Http\Controllers\TrainingController@updateTrainer')->name('update.trainer'); 
            Route::get('/delete-trainer/{id}', 'App\Http\Controllers\TrainingController@deleteTrainer')->name('delete.trainer');
        });
        Route::group(['prefix'=>'skills'], function(){
            Route::get('/', 'App\Http\Controllers\AdminController@skillsAll')->name('skills.all');
            Route::post('/store', 'App\Http\Controllers\AdminController@skillsStore')->name('skills.store');
            Route::get('/edit/{id}', 'App\Http\Controllers\AdminController@skillsEdit')->name('skills.edit');
            Route::post('/update/{id}', 'App\Http\Controllers\AdminController@skillsUpdate')->name('skills.update');
            Route::get('/delete/{id}', 'App\Http\Controllers\AdminController@skillsDelete')->name('skills.delete');
        });
        Route::group(['prefix'=>'professional/degree'], function(){
            Route::get('/', 'App\Http\Controllers\AdminController@professionalDegreeAll')->name('professionalDegree.all');
            Route::post('/store', 'App\Http\Controllers\AdminController@professionalDegreeStore')->name('professionalDegree.store');
            Route::get('/edit/{id}', 'App\Http\Controllers\AdminController@professionalDegreeEdit')->name('professionalDegree.edit');
            Route::post('/update/{id}', 'App\Http\Controllers\AdminController@professionalDegreeUpdate')->name('professionalDegree.update');
            Route::get('/delete/{id}', 'App\Http\Controllers\AdminController@professionalDegreeDelete')->name('professionalDegree.delete');
        });
        Route::group(['prefix' => 'consultancy'], function() {
            Route::get('/', 'App\Http\Controllers\ConsultancyController@index');
            Route::get('/add', 'App\Http\Controllers\ConsultancyController@add');
            Route::post('/store', 'App\Http\Controllers\ConsultancyController@store')->name('consult.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\ConsultancyController@edit')->name('consult.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\ConsultancyController@update')->name('consult.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\ConsultancyController@delete')->name('consult.delete');
            Route::get('/category','App\Http\Controllers\ConsultancyController@category');
            Route::post('/category/store', 'App\Http\Controllers\ConsultancyController@cat_store')->name('concat.store');
            Route::get('/category/{id}/edit', 'App\Http\Controllers\ConsultancyController@cat_edit')->name('concat.edit');
            Route::post('/category/{id}/update', 'App\Http\Controllers\ConsultancyController@cat_update')->name('concat.update');
            Route::get('/category/{id}/delete', 'App\Http\Controllers\ConsultancyController@cat_delete')->name('concat.delete');
        });

        Route::group(['prefix' => 'employerpanel'], function() {
            Route::get('/cominfo', 'App\Http\Controllers\EmployerPanelController@index');
            Route::get('/cominfo/add', 'App\Http\Controllers\EmployerPanelController@add');
            Route::get('/get/thana/{districtID}', 'App\Http\Controllers\EmployerPanelController@get_thana_for_employer');
            Route::post('/cominfo/store', 'App\Http\Controllers\EmployerPanelController@store')->name('cominfo.store');
            Route::get('/cominfo/{id}/edit', 'App\Http\Controllers\EmployerPanelController@edit')->name('cominfo.edit');
            Route::post('/cominfo/{id}/update', 'App\Http\Controllers\EmployerPanelController@update')->name('cominfo.update');
            Route::get('/cominfo/{id}/delete', 'App\Http\Controllers\EmployerPanelController@delete')->name('cominfo.delete');  
            Route::get('/contact','App\Http\Controllers\EmployerPanelController@contact');
            Route::post('/contact/store', 'App\Http\Controllers\EmployerPanelController@contact_store')->name('emcontact.store');
            Route::get('/contact/{id}/edit', 'App\Http\Controllers\EmployerPanelController@contact_edit')->name('emcontact.edit');
            Route::post('/contact/{id}/update', 'App\Http\Controllers\EmployerPanelController@contact_update')->name('emcontact.update');
            Route::get('/contact/{id}/delete', 'App\Http\Controllers\EmployerPanelController@contact_delete')->name('emcontact.delete');
            Route::get('/billing','App\Http\Controllers\EmployerPanelController@billing');
            Route::post('/billing/store', 'App\Http\Controllers\EmployerPanelController@billing_store')->name('billing.store');
            Route::get('/billing/{id}/edit', 'App\Http\Controllers\EmployerPanelController@billing_edit')->name('billing.edit');
            Route::post('/billing/{id}/update', 'App\Http\Controllers\EmployerPanelController@billing_update')->name('billing.update');
            Route::get('/billing/{id}/delete', 'App\Http\Controllers\EmployerPanelController@billing_delete')->name('billing.delete');
        });
        Route::group(['prefix' => 'job'], function() {
            Route::get('/', 'App\Http\Controllers\JobController@index');
            Route::get('/add', 'App\Http\Controllers\JobController@add');
            Route::post('/store', 'App\Http\Controllers\JobController@store')->name('job.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\JobController@edit')->name('job.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\JobController@update')->name('job.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\JobController@delete')->name('job.delete');
            Route::get('/post/status/{id}/{status}','App\Http\Controllers\JobController@jobPostStatus')->name('job.post.status');
            Route::get('/{id}/job_applicant_list', 'App\Http\Controllers\JobController@jobApplicantList')->name('list.job-applicants');
            Route::get('/job_id/{job_id}/applicant_resume/{id}', 'App\Http\Controllers\JobController@jobApplicantResume')->name('job-applicant-resume');
            Route::get('/category','App\Http\Controllers\JobController@category');
            Route::post('/category/store', 'App\Http\Controllers\JobController@cat_store')->name('jobcat.store');
            Route::get('/category/{id}/edit', 'App\Http\Controllers\JobController@cat_edit')->name('jobcat.edit');
            Route::post('/category/{id}/update', 'App\Http\Controllers\JobController@cat_update')->name('jobcat.update');
            Route::get('/category/{id}/delete', 'App\Http\Controllers\JobController@cat_delete')->name('jobcat.delete');
            Route::get('/get/education/{eduID}', 'App\Http\Controllers\UserDashboardController@get_edu'); 
        });
        Route::group(['prefix' => 'location'], function() {
            Route::get('/', 'App\Http\Controllers\LocationController@index');
            Route::get('/add', 'App\Http\Controllers\LocationController@add');
            Route::post('/store', 'App\Http\Controllers\LocationController@store')->name('location.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\LocationController@edit')->name('location.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\LocationController@update')->name('location.update');
            Route::get('/district/{id}/delete', 'App\Http\Controllers\LocationController@district_delete')->name('district.delete');
            Route::get('/thana/{id}/delete', 'App\Http\Controllers\LocationController@thana_delete')->name('thana.delete');
        });
        Route::group(['prefix' => 'candidate'], function() {
            Route::get('/all', 'App\Http\Controllers\CandidateResumeController@all')->name('all.candidate');
            Route::get('/', 'App\Http\Controllers\CandidateResumeController@index');
            Route::get('/add', 'App\Http\Controllers\CandidateResumeController@add');
            Route::get('/dropdownlist/thana/{id}', 'App\Http\Controllers\CandidateResumeController@thana');
            Route::post('/store', 'App\Http\Controllers\CandidateResumeController@store')->name('candidate.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\CandidateResumeController@edit')->name('candidate.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\CandidateResumeController@update')->name('candidate.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\CandidateResumeController@delete')->name('candidate.delete');
            Route::get('/{id}/applicant_resume', 'App\Http\Controllers\CandidateResumeController@jobApplicantResume')->name('admin.resume.job-applicant');
        });
        Route::group(['prefix' => 'education'], function() {
            Route::get('/', 'App\Http\Controllers\EducationController@index');
            Route::get('/add', 'App\Http\Controllers\EducationController@add');
            Route::post('/store', 'App\Http\Controllers\EducationController@store')->name('education.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\EducationController@edit')->name('education.edit');
            Route::post('/{id}/update', 'App\Http\Controllers\EducationController@update')->name('education.update');
            Route::get('/parent/{id}/delete', 'App\Http\Controllers\EducationController@parent_delete')->name('parent.delete');
            Route::get('/chlid/{id}/delete', 'App\Http\Controllers\EducationController@child_delete')->name('child.delete');
        });
    });
});

//user routes
Route::group(['prefix' => 'user'], function() {
    Route::group(['middleware'=>'auth','middleware'=>'user'], function() {
        Route::get('/dashboard', 'App\Http\Controllers\UserDashboardController@user_dashboard')->name('user.dashboard');
        Route::get('/view-resume', 'App\Http\Controllers\UserDashboardController@user_resume')->name('user.resume');
        Route::get('/edit-resume', 'App\Http\Controllers\UserDashboardController@edit_resume')->name('user.edit-resume');
        Route::get('/application-history', 'App\Http\Controllers\UserDashboardController@applicationHistory')->name('user.application-history');
        Route::get('/application-view-history', 'App\Http\Controllers\UserDashboardController@applicationViewHistory')->name('user.application-view-history');
        Route::post('/personal-info', 'App\Http\Controllers\UserDashboardController@personal_info_form')->name('personal.info');
        Route::post('/address-info', 'App\Http\Controllers\UserDashboardController@address_info')->name('personal.address_info');
        Route::post('/up/photo', 'App\Http\Controllers\UserDashboardController@upPhoto')->name('up.photo');
        Route::post('/career-and-application-info', 'App\Http\Controllers\UserDashboardController@career_and_application_info')->name('personal.career_and_personal_info');
        Route::post('/other-relevent-info', 'App\Http\Controllers\UserDashboardController@other_relevent_info')->name('personal.other_relavent_info');
        Route::post('/language', 'App\Http\Controllers\UserDashboardController@updateLanguage')->name('update.language');
        Route::post('/reference', 'App\Http\Controllers\UserDashboardController@referenceUpdate')->name('update.reference');
        Route::post('/employment', 'App\Http\Controllers\UserDashboardController@employmentUpdate')->name('update.employement');
        Route::post('/skill', 'App\Http\Controllers\UserDashboardController@skillUpdate')->name('update.skill');
        Route::post('/professional/dereee', 'App\Http\Controllers\UserDashboardController@professionalDegreeUpdate')->name('update.professional-degree');
        Route::post('/education', 'App\Http\Controllers\UserDashboardController@educationAdd')->name('add.education');
        Route::post('/education/training', 'App\Http\Controllers\UserDashboardController@educationTraining')->name('education.training');
        Route::post('/certificate', 'App\Http\Controllers\UserDashboardController@certificateUpdate')->name('update.certificate');
        Route::get('/get/thana/{districtID}', 'App\Http\Controllers\UserDashboardController@get_thana_for_userdashbord');
        Route::get('/password-settings', 'App\Http\Controllers\UserDashboardController@passwordSettings')->name('password.settings');
        Route::get('/profile-settings', 'App\Http\Controllers\UserDashboardController@profileSettings')->name('profile.settings');
        Route::post('/account-settings-post', 'App\Http\Controllers\UserDashboardController@profileUpdate')->name('profile.update');
        Route::post('/update-password', 'App\Http\Controllers\UserDashboardController@changePassword')->name('update.password');
        Route::get('/get/education/{eduID}', 'App\Http\Controllers\UserDashboardController@get_edu');  
     });
});

//company/employer routes
Route::group(['prefix' => 'company'], function() {
    Route::group(['middleware'=>'employer'], function() { 
        Route::get('/dashboard', 'App\Http\Controllers\UserDashboardController@employer_dashboard')->name('employer.dashboard');
        Route::get('/dashboard/{id}/edit', 'App\Http\Controllers\UserDashboardController@empedit')->name('employer.edit');
        Route::post('/dashboard/update', 'App\Http\Controllers\UserDashboardController@update')->name('employer.store');
        Route::patch('/dashboard/{id}/update', 'App\Http\Controllers\UserDashboardController@update')->name('employer.update');
        Route::get('/joblist', 'App\Http\Controllers\UserDashboardController@index')->name('company.joblist');
        Route::get('/jobpost/{cat}', 'App\Http\Controllers\UserDashboardController@job_post')->name('employer.jobpost');
        Route::get('/job/select-cat', 'App\Http\Controllers\UserDashboardController@job_post_cat')->name('employer.jobpost_cat');
        Route::post('/jobstore/{cat}', 'App\Http\Controllers\UserDashboardController@jobstore')->name('employer.jobstore');
        Route::get('/info/visibility/{job_id}', 'App\Http\Controllers\UserDashboardController@company_info_visibility')->name('company-info-visibility');
        Route::post('/info-post', 'App\Http\Controllers\UserDashboardController@info_post')->name('info.post');
        Route::get('/preview_job/{job_id}', 'App\Http\Controllers\UserDashboardController@previewJob')->name('preview-job');
        Route::post('/job_publish/{job_id}', 'App\Http\Controllers\UserDashboardController@publishJob')->name('job-publish');
        Route::get('/publish/success', 'App\Http\Controllers\UserDashboardController@publishJobSuccess')->name('job-publish-success');
        Route::get('/{id}/jobedit', 'App\Http\Controllers\UserDashboardController@jobedit')->name('employer.jobedit');
        Route::post('/{id}/jobupdate', 'App\Http\Controllers\UserDashboardController@jobupdate')->name('employer.jobupdate');
        Route::get('/{id}/jobdelete', 'App\Http\Controllers\UserDashboardController@jobdelete')->name('employer.jobdelete');
        Route::get('/{id}/job_applicant_details', 'App\Http\Controllers\UserDashboardController@jobApplicantDetails')->name('employer.job-applicant-details');
        Route::get('/job_id/{job_id}/applicant_resume/{id}', 'App\Http\Controllers\UserDashboardController@jobApplicantResume')->name('resume.job-applicant');
        Route::get('/get/thana/{districtID}', 'App\Http\Controllers\UserDashboardController@get_thana_for_userdashbord');   
        Route::get('/get/education/{eduID}', 'App\Http\Controllers\UserDashboardController@get_edu');   
        Route::get('/company-password-settings', 'App\Http\Controllers\UserDashboardController@compasswordSettings')->name('compassword.settings');
        Route::get('/company-profile-settings', 'App\Http\Controllers\UserDashboardController@comprofileSettings')->name('comprofile.settings');
        Route::post('/company-account-settings-post', 'App\Http\Controllers\UserDashboardController@comprofileUpdate')->name('comprofile.update');
        Route::post('/company-update-password', 'App\Http\Controllers\UserDashboardController@comchangePassword')->name('comupdate.password');
    });
});
    //home
    Route::get('/', 'App\Http\Controllers\WebsiteController@index')->name('index');
    //order and ssl
    Route::get('/order/complete', [OrderController::class, 'ordercomplete']);
    Route::get('/order/complete2', [OrderController::class, 'ordercomplete2']);
    Route::post('/order/store', [OrderController::class,'oredergenerate']);
    Route::post('/train/order/store', [OrderController::class,'trainOrederGenerate']);
    Route::get('/orderstatus/{id}/{i}', [OrderController::class,'orderstatus']);
    Route::post('/success', [OrderController::class, 'success']);
    Route::post('/fail', [OrderController::class, 'fail']);
    Route::post('/cancel', [OrderController::class, 'cancel']);
    Route::post('/ipn', [OrderController::class, 'ipn']);
    //dependent division district 
    Route::get('/getdistrict/{id}', 'App\Http\Controllers\CartController@getdistrict');
    Route::get('/sgetdistrict/{id}', 'App\Http\Controllers\CartController@sgetdistrict');
    //Cart
    //book cart
    Route::get('/cart', [CartController::class, 'addtocart']);
    Route::post('/cartadd/{id}', [CartController::class, 'index']);
    Route::get('/cart/{id}',[CartController::class,'index'] );
    Route::get('/remove/cart/{id}', [CartController::class, 'removecart']);
    Route::post('/books/cart/update', [CartController::class, 'updatecart']);
    Route::get('/cartallremove', [CartController::class, 'cartallremove']);
    Route::get('/checkout', [CartController::class, 'checkout'])->middleware('auth');
    //training cart
    Route::get('/training-cart', [CartController::class, 'addtoTrainingCart']);
    Route::post('/training-cartadd/{id}', [CartController::class, 'trainingCart']);
    Route::get('/training-cart/{id}',[CartController::class,'trainingCart'] );
    Route::get('/train_checkout', [CartController::class, 'train_checkout'])->middleware('auth');
    //job filter
    Route::get('/catfilter/{id}', 'App\Http\Controllers\WebsiteController@catfilter');
    Route::get('/locationfilter/{id}', 'App\Http\Controllers\WebsiteController@locationfilter');
    Route::get('/companyfilter/{id}', 'App\Http\Controllers\WebsiteController@companyfilter');
    Route::get('/salaryfilter/{min}/{max}', 'App\Http\Controllers\WebsiteController@salaryfilter');
    //job
    Route::get('/joblist', 'App\Http\Controllers\WebsiteController@joblist')->name('joblist');
    
    Route::post('/jobfilter', 'App\Http\Controllers\WebsiteController@jobfilter')->name('jobfilter');
    Route::get('/jobdetails/{id}/{slug}', 'App\Http\Controllers\WebsiteController@jobdetails')->name('job.details');
    Route::post('/apply_job/{job_id}/{user_id}', 'App\Http\Controllers\WebsiteController@applyJob')->middleware('user')->name('job.apply');
    Route::get('/search/job','App\Http\Controllers\WebsiteController@search')->name('search.name');
    Route::get('/cat/job/{id}/{slug}', 'App\Http\Controllers\WebsiteController@catJob')->name('cat-job');
    //book
    Route::post('/book/review/{id}', 'App\Http\Controllers\WebsiteController@bookreview');
    //employer
    Route::get('/employer', 'App\Http\Controllers\WebsiteController@employer')->name('employer');
    Route::get('/employer/{id}/details', 'App\Http\Controllers\WebsiteController@employerdetails')->name('employer.details');
    //news
    Route::get('/news', 'App\Http\Controllers\WebsiteController@news')->name('news');
    Route::get('/news/{id}/{slug}', 'App\Http\Controllers\WebsiteController@newsdetails')->name('news.details');
    //publication
    Route::get('/publication/{id}/{slug}', 'App\Http\Controllers\WebsiteController@publicationdetails')->name('publication.details');
    Route::get('/publication/package/{package_id}/{package_slug}', 'App\Http\Controllers\WebsiteController@packageDetails')->name('package.details');
    //training
    Route::get('/training', 'App\Http\Controllers\WebsiteController@training')->name('training');
    Route::get('/trainingcat/{id}/{slug}', 'App\Http\Controllers\WebsiteController@trainingcat')->name('trainingcat');
    Route::get('/training/{id}/{slug}', 'App\Http\Controllers\WebsiteController@trainingdetails')->name('training.details');
    Route::get('/training/search', 'App\Http\Controllers\WebsiteController@trainingSearch')->name('search.training');
    //contact
    Route::get('/contact', 'App\Http\Controllers\WebsiteController@contact')->name('contact');
    Route::post('/contactsend', 'App\Http\Controllers\WebsiteController@contactSubmit')->name('contactsubmit');
    //pages
    Route::get('/recruitment-specialist', 'App\Http\Controllers\WebsiteController@recruitmentSpecialist')->name('recruitment-specialist');
    Route::get('/about-us', 'App\Http\Controllers\WebsiteController@aboutUS')->name('about-us');
    Route::get('/privacy-policy', 'App\Http\Controllers\WebsiteController@privacyPolicy')->name('privacy-policy');
    Route::get('/return-refund', 'App\Http\Controllers\WebsiteController@returnRefund')->name('return-refund');
    Route::get('/terms-condition', 'App\Http\Controllers\WebsiteController@termsConditions')->name('terms-conditions');
    Route::get('/founder_message', 'App\Http\Controllers\WebsiteController@foundermsg')->name('foundermsg');
    Route::get('/history', 'App\Http\Controllers\WebsiteController@history')->name('history');
    Route::get('/mission_vision', 'App\Http\Controllers\WebsiteController@mission')->name('mission');
    Route::get('/objectives', 'App\Http\Controllers\WebsiteController@objective')->name('objective');
    Route::get('/award_achievements', 'App\Http\Controllers\WebsiteController@award')->name('award');
    //consultancy
    Route::get('/consultancy', 'App\Http\Controllers\WebsiteController@consultancy')->name('consultancy');
    Route::get('/consultancycat/{id}/{slug}', 'App\Http\Controllers\WebsiteController@consultancycat')->name('consultancycat');
    Route::get('/consultancy/{id}/{slug}', 'App\Http\Controllers\WebsiteController@consultancydetails')->name('consultancy.details');
    //admin login
    Route::get('taxmanadmin/login', 'App\Http\Controllers\AdminLoginController@showAdminLoginForm')->name('admin.loginpage'); 
    Route::post('taxmanadmin/login', 'App\Http\Controllers\AdminLoginController@adminLogin')->name('admin.login'); 
    //employer login-register
    Route::get('/employer/register', 'App\Http\Controllers\EmployerRegisterController@getEmployerRegister')->name('employer.register');
    Route::post('/employer/register/submit', 'App\Http\Controllers\EmployerRegisterController@submitEmployerRegister')->name('submit.employer-register');
    //user login-register
    Auth::routes();
    //cache remove
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });


    
       
            
    
       

