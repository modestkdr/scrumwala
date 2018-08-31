<?php

Route::get('/', function () {
	return redirect('auth/login');
});

Route::get('/home', function(){
	return redirect('projects');
});

/* Projects */
Route::get('projects/{projects}/plan', 'ProjectsController@plan');
Route::resource('projects', 'ProjectsController');

/* Issues */
Route::get('issues/search', 'IssuesController@search');
Route::post('issues/statuschange', 'IssuesController@statuschange');
Route::post('issues/sprintchange', 'IssuesController@sprintchange');
Route::post('issues/quickAdd', 'IssuesController@quickAdd');
Route::post('issues/sortorder', 'IssuesController@sortorder');
Route::post('issues/priorityorder', 'IssuesController@sortOrderPriority');
Route::resource('issues', 'IssuesController');
Route::resource('issuestatuses', 'IssueStatusesController');

/* Sprints */
Route::post('sprints/add', 'SprintsController@add');
Route::patch('sprints/activate', 'SprintsController@activate');
Route::post('sprints/complete', 'SprintsController@complete');
Route::resource('sprints', 'SprintsController');

/* Auth */
// disable registration to prevent unwanted access
Route::post('auth/register', function () {
    return 'Registration not possible';
});
// everything else can remain as is
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
