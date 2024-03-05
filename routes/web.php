<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/home', function(){ return redirect('/login'); });


Route::get('/', function(){ return redirect('/login'); });

Route::match(['post', 'get'],'/login', 'LoginController@index');
Route::match(['post', 'get'],'/agent/register', 'LoginController@register');


Route::get('wizard', function () {return view('welcome');});

// Common
Route::get('getCommnets/{id}', 'CommonController@getCommnets');
Route::post('comment', 'CommonController@comment');
Route::post('schedule/interview', 'CommonController@schedule_interview');
Route::post('schedule/interview/update/{id}', 'CommonController@schedule_interview_udpate');

Route::post('shortlist', 'CommonController@shortlist');

Route::get('getState/{id}', 'CommonController@getState');
Route::get('getCity', 'CommonController@getCity');
Route::get('export-excel', 'CommonController@export');
Route::get('export-student', 'CommonController@export_student');

Route::match(['post', 'get'],'/admin/setting', 'CommonController@setting');



Route::get('report', 'ReportController@index');
Route::get('student/report/search', 'ReportController@student_search');
Route::get('application/report/search', 'ReportController@application_search');

Route::get('inbox', 'MailController@inbox');
Route::get('send', 'MailController@send');
Route::get('mail/read/{id}', 'MailController@read');
Route::get('mail/delete/{id}', 'MailController@delete');
Route::get('compose', 'MailController@compose');
Route::post('mail', 'MailController@mail');



Route::group(['prefix' => 'common', 'namespace' => 'Common', 'middleware' => ['auth']],function(){

	/*Student CRUD*/
	Route::get('student', 'StudentController@index');
	Route::get('student/type', 'StudentController@type');
	Route::get('student/create', 'StudentController@create');
	Route::get('student/edit/{id}', 'StudentController@edit');
	Route::post('student/update/{id}', 'StudentController@update');
	Route::post('student/update/status/{id}', 'StudentController@update_status');
	Route::post('student/update/document/validation/{id}', 'StudentController@update_document_validation');
	Route::post('student/update/student/validation/{id}', 'StudentController@update_student_validation');
	Route::post('student/update/other/info/{id}', 'StudentController@update_other_info');
	Route::post('student/update/visa/detail/{id}', 'StudentController@update_visa_detail');
	Route::post('student/update/settlement/detail/{id}', 'StudentController@update_settlement_detail');
	Route::post('student/update/sfe/detail/{id}', 'StudentController@update_sfe_detail');
	Route::post('student/update/internal/traning/{id}', 'StudentController@update_internal_traning');
	Route::post('student/update/fee/{id}', 'StudentController@update_fee');
	Route::post('student/store', 'StudentController@store');
	Route::get('student/view/{id}', 'StudentController@view');

});



Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth' => 'Admin']],function(){

	Route::get('/dashboard/', 'AdminController@dashboard');
	Route::get('/logout/', 'AdminController@logout');

	Route::get('/profile/', 'AdminController@profile');
	Route::post('/profile/', 'AdminController@profile');
	
	Route::get('/password', 'PasswordController@password');
	Route::get('/check-pwd', 'PasswordController@check');
	Route::post('/update_password', 'PasswordController@update_password');


	/*Agent CRUD*/
	Route::get('agents', 'AgentController@index');
	Route::post('agent/store', 'AgentController@store');
	Route::get('agent/view/{id}', 'AgentController@view');
	Route::post('agent/update/{id}', 'AgentController@update');
	Route::post('agent/status/update/{id}', 'AgentController@update_status');
	Route::post('agent/universities/{id}', 'AgentController@universities');
	Route::get('agent/delete/{id}', 'AgentController@delete');



	/*Staff CRUD*/
	Route::get('staff', 'StaffController@index');
	Route::get('staff/create', 'StaffController@create');
	Route::post('staff/store', 'StaffController@store');
	Route::get('staff/view/{id}', 'StaffController@view');
	Route::get('staff/edit/{id}', 'StaffController@edit');
	Route::post('staff/update/{id}', 'StaffController@update');
	Route::get('staff/delete/{id}', 'StaffController@delete');



	/*University CRUD*/
	Route::get('university', 'UniversityController@index');
	Route::get('university/create', 'UniversityController@create');
	Route::post('university/store', 'UniversityController@store');
	Route::get('university/view/{id}', 'UniversityController@view');
	Route::get('university/edit/{id}', 'UniversityController@edit');
	Route::post('university/update/{id}', 'UniversityController@update');
	Route::get('university/delete/{id}', 'UniversityController@delete');


	/*Campus CRUD*/
	Route::get('campus', 'CampusController@index');
	Route::get('campus/create', 'CampusController@create');
	Route::post('campus/store', 'CampusController@store');
	Route::get('campus/view/{id}', 'CampusController@view');
	Route::get('campus/edit/{id}', 'CampusController@edit');
	Route::post('campus/update/{id}', 'CampusController@update');
	Route::get('campus/delete/{id}', 'CampusController@delete');


	/*Intake CRUD*/
	Route::get('intake', 'IntakeController@index');
	Route::post('intake/store', 'IntakeController@store');
	Route::post('intake/update/{id}', 'IntakeController@update');
	Route::get('intake/delete/{id}', 'IntakeController@delete');

	


	/*Course CRUD*/
	Route::get('course', 'CourseController@index');
	Route::get('course/create', 'CourseController@create');
	Route::post('course/store', 'CourseController@store');
	Route::get('course/view/{id}', 'CourseController@view');
	Route::get('course/edit/{id}', 'CourseController@edit');
	Route::post('course/update/{id}', 'CourseController@update');
	Route::get('course/delete/{id}', 'CourseController@delete');


	/*Student CRUD*/
	Route::get('student', 'StudentController@index');
	Route::get('student/type', 'StudentController@type');
	Route::get('student/create', 'StudentController@create');
	Route::get('student/edit/{id}', 'StudentController@edit');
	Route::post('student/update/{id}', 'StudentController@update');
	Route::post('student/store', 'StudentController@store');
	Route::get('student/view/{id}', 'StudentController@view');
	Route::get('student/delete/{id}', 'StudentController@delete');

	
	/*Application CRUD*/
	Route::get('application', 'ApplicationController@index');
	Route::post('application/update/{id}', 'ApplicationController@update');
	Route::get('application/view/{id}', 'ApplicationController@view');
	Route::get('application/delete/{id}', 'ApplicationController@delete');


	/*Offer CRUD*/
	Route::get('offer', 'OfferController@index');
	Route::post('offer/store', 'OfferController@store');
	Route::post('offer/update/{id}', 'OfferController@update');
	Route::get('offer/delete/{id}', 'OfferController@delete');


	/*Commission CRUD*/
	Route::get('commission', 'CommissionController@index');
	Route::post('commission/store', 'CommissionController@store');
	Route::post('commission/update/{id}', 'CommissionController@update');
	Route::get('commission/delete/{id}', 'CommissionController@delete');
	
	
	Route::get('state-and-city', 'StateAndCityController@index');

	// State
	Route::post('state/store', 'StateAndCityController@state_store');
	// City
	Route::post('city/store', 'StateAndCityController@city_store');



	// Notices
	Route::get('notice', 'NoticeController@index');
	Route::post('notice/store', 'NoticeController@store');
	Route::post('notice/update/{id}', 'NoticeController@update');
	Route::get('notice/delete/{id}', 'NoticeController@delete');


});


Route::group(['prefix' => 'agent', 'namespace' => 'Agent', 'middleware' => ['auth' => 'Agent']],function(){

	Route::get('/dashboard/', 'AgentController@dashboard');
	Route::get('/logout/', 'AgentController@logout');

	Route::get('/profile/', 'AgentController@profile');
	Route::post('/profile/', 'AgentController@profile');
	Route::post('/bank-info/', 'AgentController@bank_info');
	Route::post('/services/', 'AgentController@services');
	Route::post('/universities/request/', 'AgentController@universities_request');
	
	Route::get('/password', 'PasswordController@password');
	Route::get('/check-pwd', 'PasswordController@check');
	Route::post('/update_password', 'PasswordController@update_password');


	/*Sub Agent CRUD*/
	Route::get('agent', 'AgentsController@index');
	Route::get('agent/create', 'AgentsController@create');
	Route::post('agent/store', 'AgentsController@store');
	Route::get('agent/edit/{id}', 'AgentsController@edit');
	Route::post('agent/update/{id}', 'AgentsController@update');
	Route::get('agent/profile/{id}', 'AgentsController@profile');
	Route::get('agent/delete/{id}', 'AgentsController@delete');



	/*Agancy CRUD*/
	Route::get('agancy', 'AgancyController@index');
	Route::post('agancy/store', 'AgancyController@store');
	Route::post('agancy/update/{id}', 'AgancyController@update');
	Route::get('agancy/profile/{id}', 'AgancyController@profile');
	Route::get('agancy/delete/{id}', 'AgancyController@delete');


	/*Student CRUD*/
	Route::get('student', 'StudentController@index');
	Route::get('student/type', 'StudentController@type');
	Route::get('student/create', 'StudentController@create');
	Route::get('student/edit/{id}', 'StudentController@edit');
	Route::post('student/update/{id}', 'StudentController@update');
	Route::post('student/store', 'StudentController@store');
	Route::get('student/view/{id}', 'StudentController@view');

	/*Application*/
	Route::get('application', 'ApplicationController@index');
	Route::get('application/create', 'ApplicationController@create');
	Route::get('application/redirect', 'ApplicationController@redirect');
	Route::get('application/getCourses/{id}', 'ApplicationController@getCourses');
	Route::get('application/getCourseDetail/{id}', 'ApplicationController@getCourseDetail');
	Route::post('application/store', 'ApplicationController@store');
	Route::get('application/view/{id}', 'ApplicationController@view');
	Route::get('course/view/{id}', 'ApplicationController@view_course');
	Route::get('campus/view/{id}', 'ApplicationController@view_campus');

	Route::get('application/edit/{id}', 'ApplicationController@edit');
	Route::post('application/update/{id}', 'ApplicationController@update');

	/*Search Program*/
	Route::get('search/program', 'SearchProgramController@index');



	/*University CRUD*/
	Route::get('university', 'UniversityController@index');
	Route::get('university/view/{id}', 'UniversityController@view');



	/*Commission*/
	Route::get('commission', 'CommissionController@index');


});




Route::get('cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    die("Cash Cleard");
});