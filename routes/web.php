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

// Task Routes
//
// Ressource method index will be mapped to root and show won't be used for tasks.
Route::get('/', 'TaskController@index')->name('tasks.index');
Route::resource('/tasks', 'TaskController', ['except' => 'index', 'show']);

Route::get('/imprint', function() {
	return view('imprint');
})->name('imprint');
