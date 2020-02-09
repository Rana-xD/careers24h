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
Route::get('/login','AuthenticationController@showLoginForm');
Route::post('/login', 'AuthenticationController@login');
Route::post('/signup', 'AuthenticationController@signUp');
Route::get('/logout','AuthenticationController@logout');


Route::group(['prefix' => 'company', 'middleware' => ['auth']], function() {
    Route::get('/profile','CompanyDashboardController@showProfile');
    Route::get('/change-password','CompanyDashboardController@showChangePassword');
    Route::get('/job-alert','CompanyDashboardController@showJobAlert');
    Route::get('/manage-jobs','CompanyDashboardController@showManageJob');
    Route::get('/packages','CompanyDashboardController@showPackage');
    Route::get('/job','CompanyDashboardController@showJobForm');
    Route::get('/resume','CompanyDashboardController@showResume');
    Route::get('/transaction','CompanyDashboardController@showTransaction');
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
});



