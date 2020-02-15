<?php

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
    return view('home.index');
});

/* AuthenticationController */
Route::get('/signup','AuthenticationController@showSignUpForm');
Route::get('/login','AuthenticationController@showLoginForm')->name('login');
Route::post('/login', 'AuthenticationController@login');
Route::post('/signup', 'AuthenticationController@signUp');
Route::get('/logout','AuthenticationController@logout');


Route::group(['prefix' => 'company', 'middleware' => ['auth']], function() {
    Route::get('/profile','CompanyDashboardController@showProfile');
    Route::get('/change-password','CompanyDashboardController@showChangePassword');
    Route::get('/job-alert','CompanyDashboardController@showJobAlert');
    Route::get('/manage-jobs','CompanyDashboardController@showManageJob');
    Route::get('/packages','CompanyDashboardController@showPackage');
    Route::get('/resume','CompanyDashboardController@showResume');
    Route::get('/transaction','CompanyDashboardController@showTransaction');


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

    Route::post('/update-password','JobSeekerDashboardController@updatePassword');
    Route::post('/update-profile','JobSeekerDashboardController@updateProfile');
    Route::post('/update-cover-letter','JobSeekerDashboardController@updateCoverLetter');
});



