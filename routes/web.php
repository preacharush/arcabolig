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

Route::get('/dashboard','Pagescontroller@userdashboard')->name('user.dashboard');
Route::get('/overview','overviewController@index')->name('user.overview');


//Settings cotrollers
Route::get('/settings','settingsController@index')->name('company.settings');
Route::resource('/settings','settingsController');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users/logout','Auth\Logincontroller@userlogout')->name('user.logout');

Route::prefix('admin')->group(function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

});

