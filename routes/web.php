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


/* 
//original syntax
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

*/
  
//single line syntax
Route::view('/', 'welcome');
//Route::view('/about', 'pages.about');
//Route::view('contact', 'pages.contact');
//Route::view('users', 'pages.users');
//Route::view('index', 'pages.index');

//Route::get('/users', 'UsersController@list')/* ->defaults('aapje','paginaaapje') */;
Route::get('/users', 'PagesController@Users');

Route::get('/about', 'PagesController@about');
Route::get('/index', 'PagesController@index');
Route::get('/services', 'PagesController@services');

Route::resource('/posts', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
