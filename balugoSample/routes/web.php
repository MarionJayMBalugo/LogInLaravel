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
Auth::routes();


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/writer', 'Auth\LoginController@writerLogin');
Route::post('/login/regularUser', 'Auth\LoginController@regularUserLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/writer', 'Auth\RegisterController@createWriter');
Route::post('/register/regularUser', 'Auth\RegisterController@createRegularUser');

//  with middlewares
Route::view('/admin', 'admin.dashboard')->middleware('auth:admin')->name('adminDashboard');
Route::view('/writer', 'writer.dashboard')->middleware('auth:writer')->name('writerDashboard');
Route::view('/regularUser', 'regularUser.dashboard')->middleware('auth:regular_user')->name('regularUserDashboard');
Route::view('/home', 'home')->middleware('guest')->name('guestDashboard');
Route::Redirect('/','/home');