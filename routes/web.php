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

Route::get('/cabinet','HomeController@index')->name('cabinet');

Route::any('/statement_form/{id}','FromController@createStatement');

Route::get('/Accept/{id}','HomeController@AcceptDecloration');

Route::get('/Refuse/{id}','HomeController@RefuseDecloration');

Route::get('/Profile/{id}','HomeController@GetUser')->name('user_profile');

Route::any('/Update/{id}','FromUpdateDoctorController@UpdateDoctor')->name('update_user');

Route::any('/Add','FromUpdateDoctorController@AddDoctor')->name('add_doctor');

Route::get('/Del/{id}','HomeController@DeleteDoctor')->name('delete_doctor');

Route::get('/allDoctors','HomeController@GetAllDoctors')->name('all_doctors_page');

Route::post('send-mail','MailSetting@send_form');

Route::get('form_massage',function (){
    return view('hospital.Form_massage');
});

Route::get('phone/{id}','HomeController@sendSMS')->name('send SMS');

