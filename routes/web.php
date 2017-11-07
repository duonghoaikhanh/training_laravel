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
    return view('dashboard');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

// Member
//Route::resource('member', 'MembersController');
Route::get('/member', 'MembersController@index');
Route::get('/member/create', 'MembersController@create');
Route::post('/member/store', 'MembersController@store');
Route::get('/member/edit/{id}', 'MembersController@edit');
Route::put('/member/update/{id}', 'MembersController@update');
