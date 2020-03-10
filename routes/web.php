<?php
use App\Models\Job;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $jobs = Job::all();
    return view('Home.home',[
        'jobs' => $jobs
    ]);
});

/* AuthenticationController */
Route::get('/signup','AuthenticationController@showSignUpForm');
Route::get('/login','AuthenticationController@showLoginForm')->name('login');
Route::post('/login', 'AuthenticationController@login');
Route::post('/signup', 'AuthenticationController@signUp');
Route::get('/logout','AuthenticationController@logout');
Route::get('/profile','AuthenticationController@showProfile');
Route::get('/signup_without_profile','AuthenticationController@signupWithoutProfile');
Route::post('/signup_with_profile','AuthenticationController@signupWithProfile');

/* JobController */
Route::get('/job/{uuid}','JobController@showSingleJob');
Route::get('/apply-job','JobController@applyJob');

/* Candidate Route*/
Route::get('/candidate/profile/{uuid}','JobSeekerController@showJobseekerInfo');

/*  InterviewRoom  */
Route::get('/interview_room/{room_name}','InterviewRoomController@joinRoom')->middleware('auth');

Route::group(['prefix' => 'company', 'middleware' => ['auth']], function() {
    Route::get('/profile','CompanyDashboardController@showProfile');
    Route::get('/change-password','CompanyDashboardController@showChangePassword');
    Route::get('/job-alert','CompanyDashboardController@showJobAlert');
    Route::get('/manage-jobs','CompanyDashboardController@showManageJob');
    Route::get('/packages','CompanyDashboardController@showPackage');
    Route::get('/resume','CompanyDashboardController@showResume');
    Route::get('/transaction','CompanyDashboardController@showTransaction');
    Route::get('/applicants','CompanyDashboardController@showApplicant');
    Route::get('/interview-room','CompanyDashboardController@showInterviewRoom');
    Route::get('/get-cover-letter','CompanyDashboardController@getCoverLetter');
    Route::get('/get-video-cv','CompanyDashboardController@getVideoCV');
    Route::get('/get-resume','CompanyDashboardController@getResume');
    Route::get('/accept-applicant','CompanyDashboardController@acceptApplicant');
    Route::get('/reject-applicant','CompanyDashboardController@rejectApplicant');
    Route::get('/set-interview-date','CompanyDashboardController@setInterviewDate');

    Route::post('/update-password','CompanyDashboardController@updatePassword');
    Route::post('/update-profile','CompanyDashboardController@updateProfile');

    Route::get('/new-job','JobController@showCreateJobForm');
    Route::post('/create-job','JobController@createJob');
    Route::get('/edit-job/{uuid}','JobController@showEditJobForm');
    Route::post('/update-job','JobController@updateJob');
    

    Route::get('/delete-job','JobController@deleteJob');
    Route::get('/preview-job/{uuid}','JobController@showJobPreview');

    
});
/*   CompanyDashboad   */

/*   JobSeekerDashboad   */
Route::group(['prefix' => 'jobseeker', 'middleware' => ['auth']], function() {
    Route::get('/profile','JobSeekerDashboardController@showProfile');
    Route::get('/applied-job','JobSeekerDashboardController@showAppliedJob');
    Route::get('/password','JobSeekerDashboardController@showChangePassoword');
    Route::get('/cover-letter','JobSeekerDashboardController@showCoverLetter');
    Route::get('/job-alert','JobSeekerDashboardController@showJobNotify');
    Route::get('/resume','JobSeekerDashboardController@showResume');
    Route::get('/shortlist','JobSeekerDashboardController@showShortlist');
    Route::get('/add-resume','JobSeekerDashboardController@showAddResumeForm');

    Route::post('/update-password','JobSeekerDashboardController@updatePassword');
    Route::post('/update-profile','JobSeekerDashboardController@updateProfile');
    Route::post('/update-cover-letter','JobSeekerDashboardController@updateCoverLetter');

    Route::get('/add-education','JobSeekerDashboardController@addEducation');
    Route::get('/add-work-experience','JobSeekerDashboardController@addWorkExperience');
    Route::get('/add-skillset','JobSeekerDashboardController@addSkillset');
    Route::get('/add-achievement','JobSeekerDashboardController@addAchievement');
    Route::get('/delete-education','JobSeekerDashboardController@deleteEducation');
    Route::get('/delete-work-experiece','JobSeekerDashboardController@deleteWorkExperience');
    Route::get('/delete-skillset','JobSeekerDashboardController@deleteSkillset');
    Route::get('/delete-achievement','JobSeekerDashboardController@deleteAchievement');
    Route::get('/update-education','JobSeekerDashboardController@updateEducation');
    Route::get('/update-work-experience','JobSeekerDashboardController@updateWorkExperience');
    Route::get('/update-skillset','JobSeekerDashboardController@updateSkillset');
    Route::get('/update-achievement','JobSeekerDashboardController@updateAchievement');
    Route::get('/delete-apply-job','JobSeekerDashboardController@deleteApplyJob');

    Route::post('/upload-videocv','JobSeekerDashboardController@uploadVideoCV');
});



