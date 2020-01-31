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
Route::post('/login', 'AuthenticationController@validateLogin');
Route::post('/signup', 'AuthenticationController@signUp');

/* HomePageController */
Route::get('/homepage1', "HomePageController@homePage1");
Route::get('/homepage2', "HomePageController@homePage2");
Route::get('/homepage3', "HomePageController@homePage3");
Route::get('/homepage4', "HomePageController@homePage4");
Route::get('/homepage5', "HomePageController@homePage5");
Route::get('/homepage6', "HomePageController@homePage6");
Route::get('/homepage7', "HomePageController@homePage7");
Route::get('/homepage8', "HomePageController@homePage8");


/* EmployeeController */
Route::get('/employee1', 'EmployeeController@listAllEmployee1');
Route::get('/employee2', 'EmployeeController@listAllEmployee2');
Route::get('/employee3', 'EmployeeController@listAllEmployee3');
Route::get('/employee4', 'EmployeeController@listAllEmployee4');
Route::get('/single1', 'EmployeeController@single1');
Route::get('/single2', 'EmployeeController@single2');

    /* Employer Sub Dashboard */
    Route::get('/job_manage', 'EmployeeController@jobManage');
    Route::get('/employer_package', 'EmployeeController@employerPackage');
    Route::get('/post_new', 'EmployeeController@employerPostNew');
    Route::get('/employer_profile', 'EmployeeController@employerProfile');
    Route::get('/resume', 'EmployeeController@employerResume');
    Route::get('/transaction', 'EmployeeController@employerTransaction');
    Route::get('/job_alert', 'EmployeeController@jobAlert');
    Route::get('/change_password', 'EmployeeController@employerChangePassword');


/* CandidateController */
Route::get('/candidate1', 'CandidateController@candidate1');
Route::get('/candidate2', 'CandidateController@candidate2');
Route::get('/candidate3', 'CandidateController@candidate3');
Route::get('/candidate_single1', 'CandidateController@candidateSingle1');
Route::get('/candidate_single2', 'CandidateController@candidateSingle2');

    /* Candidate Sub dashboard */
    Route::get('/applied', 'CandidateController@appliedJob');
    Route::get('/add', 'CandidateController@addNewResume');
    Route::get('/change-Password', 'CandidateController@changePassword');
    Route::get('/coverLetter', 'CandidateController@coverLetter');
    Route::get('/dashboard', 'CandidateController@dashboard');
    Route::get('/jobAlert', 'CandidateController@jobAlert');
    Route::get('/profile', 'CandidateController@profile');
    Route::get('/shortList', 'CandidateController@shortList');
    Route::get('/myResume', 'CandidateController@myResume');

/* JobController */
Route::get('/list_classic', 'JobController@jobListClassic');
Route::get('/list_grid', 'JobController@jobListGrid');
Route::get('/list_modern', 'JobController@jobListModern');
Route::get('/single1', 'JobController@jobListSingle1');
Route::get('/single2', 'JobController@jobListSingle2');
Route::get('/single3', 'JobController@jobListSingele3');

/* PageController */
Route::get('/404', 'PageController@notFound');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');
Route::get('/contact2', 'PageController@contact2');
Route::get('/faq', 'PageController@faq');
Route::get('/how_it_work', 'PageController@howItWork');
Route::get('/pricing', 'PageController@pricing');
Route::get('/term_and_condition', 'PageController@termAndCondition');
Route::get('/register', 'PageController@register');
