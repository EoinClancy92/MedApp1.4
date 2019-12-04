<?php
# @Date:   2019-10-29T11:21:04+00:00
# @Last modified time: 2019-12-03T17:41:46+00:00




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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');

Auth::routes();

//home Controllers
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');
Route::get('/patient/home', 'Patient\HomeController@index')->name('patient.home');

//admin CRUD doctors
Route::get('/admin/doctor/create', 'Admin\DoctorController@create')->name('admin.doctor.create');
Route::get('/admin/doctor/{id}', 'Admin\DoctorController@show')->name('admin.doctor.show');
Route::post('/admin/doctor/store', 'Admin\DoctorController@store')->name('admin.doctor.store');
Route::get('/admin/doctor/{id}/edit', 'Admin\DoctorController@edit')->name('admin.doctor.edit');
Route::put('/admin/doctor/{id}', 'Admin\DoctorController@update')->name('admin.doctor.update');
Route::delete('/admin/doctor/{id}', 'Admin\DoctorController@destroy')->name('admin.doctor.destroy');

//admin CRUD patient
Route::get('/admin/patient/create', 'Admin\PatientController@create')->name('admin.patient.create');
Route::get('/admin/patient/{id}', 'Admin\PatientController@show')->name('admin.patient.show');
Route::post('/admin/patient/store', 'Admin\PatientController@store')->name('admin.patient.store');
Route::get('/admin/patient/{id}/edit', 'Admin\PatientController@edit')->name('admin.patient.edit');
Route::put('/admin/patient/{id}', 'Admin\PatientController@update')->name('admin.patient.update');
Route::delete('/admin/patient/{id}', 'Admin\PatientController@destroy')->name('admin.patient.destroy');

//admin CRUD appointments
Route::get('/admin/appointments/create', 'Admin\AppointmentController@create')->name('admin.appointments.create');
Route::get('/admin/appointments/{id}', 'Admin\AppointmentController@show')->name('admin.appointments.show');
Route::post('/admin/appointments/store', 'Admin\AppointmentController@store')->name('admin.appointments.store');
Route::get('/admin/appointments/{id}/edit', 'Admin\AppointmentController@edit')->name('admin.appointments.edit');
Route::put('/admin/appointments/{id}', 'Admin\AppointmentController@update')->name('admin.appointments.update');
Route::delete('/admin/appointments/{id}', 'Admin\AppointmentController@destroy')->name('admin.appointments.destroy');

//patient CRD appointments
Route::get('/user/appointments/create', 'User\AppointmentController@create')->name('user.appointments.create');
Route::get('/user/appointments/{id}', 'User\AppointmentController@show')->name('user.appointments.show');
Route::post('/user/appointments/store', 'User\AppointmentController@store')->name('user.appointment.store');
Route::delete('/user/appointments/{id}', 'User\AppointmentController@destroy')->name('user.appointments.destroy');
