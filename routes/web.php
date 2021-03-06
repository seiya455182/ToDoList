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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('index','ToDoListController@index')->name('index');
// Route::post('posts','ToDoListController@store')->name('posts');
// Route::post('destroy', 'ToDoListController@destroy')->name('destroy');
Route::group(['middleware' => 'auth'], function() {
  Route::resource('todo','ToDoListController',['only'=>['index','store','destroy']]);
});
