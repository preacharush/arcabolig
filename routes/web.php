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
Route::resource('admin/settings','settingsController');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users/logout','Auth\Logincontroller@userlogout')->name('user.logout');

Route::prefix('admin')->group(function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

});

//create companys
Route::get('/create-company', 'insertCompanyController@index')->name('create-company');
Route::post('/create-company.create', 'insertCompanyController@create')->name('create-company.create');;
// Route::resource('/create-company','insertCompanyController');

// USERS - show - Create - Edit - Delete
Route::resource('admin/users','UsersController');

// Client - show - Create - Edit - Delete
Route::resource('admin/client','ClientController'); 

//property - show - Create - Edit - Delete
Route::resource('admin/properties','PropertyController');

//set active client property in session - When chossen in dropdown
Route::get('set-property-session/{id}', 'Pagescontroller@setActievProperty')->name('set-active-property');

