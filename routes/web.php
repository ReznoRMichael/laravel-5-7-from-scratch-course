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

Route::get('/', 'PagesController@home');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');

/* show all projects */
Route::get('/projects', 'ProjectsController@index') -> name('projectIndex');
/* create a project */
Route::get('/projects/create', 'ProjectsController@create') -> name('projectCreate');
/* show 1 project */
Route::get('/projects/{project}', 'ProjectsController@show') -> name('projectShow');
/* edit 1 project */
Route::get('/projects/{project}/edit', 'ProjectsController@edit') -> name('projectEdit');
/* insert a modified project to the database (update) */
Route::patch('/projects/{project}', 'ProjectsController@update') -> name('projectUpdate');
/* store a project into database */
Route::post('/projects', 'ProjectsController@store') -> name('projectStore');
/* delete a project */
Route::delete('/projects/{project}', 'ProjectsController@destroy') -> name('projectDestroy');

/* do the same but in one command - with php artisan make:controller -r PostsController -m Post */
Route::resource('/posts', 'PostsController');

/* update a task (completed/uncompleted) */
//Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');
Route::patch('/tasks/{task}', 'ProjectTasksController@update') -> name('projectTaskUpdate');
/* Add a new task to the choosen project */
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store') -> name('projectTaskStore');

Auth::routes();

Route::get('/home', 'HomeController@index') -> name('home');
