<?php
# @Date:   2019-10-29T11:21:04+00:00
# @Last modified time: 2019-12-09T16:30:25+00:00




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
Route::get('/admin/doctors', 'Admin\DoctorController@index')->name('admin.doctors.index');
Route::get('/admin/doctors/create', 'Admin\DoctorController@create')->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', 'Admin\DoctorController@show')->name('admin.doctors.show');
Route::post('/admin/doctors/store', 'Admin\DoctorController@store')->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', 'Admin\DoctorController@edit')->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', 'Admin\DoctorController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', 'Admin\DoctorController@destroy')->name('admin.doctors.destroy');

//admin CRUD patient
Route::get('/admin/patients', 'Admin\PatientController@index')->name('admin.patients.index');
Route::get('/admin/patients/create', 'Admin\PatientController@create')->name('admin.patients.create');
Route::get('/admin/patients/{id}', 'Admin\PatientController@show')->name('admin.patients.show');
Route::post('/admin/patients/store', 'Admin\PatientController@store')->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', 'Admin\PatientController@edit')->name('admin.patients.edit');
Route::put('/admin/patients/{id}', 'Admin\PatientController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}', 'Admin\PatientController@destroy')->name('admin.patients.destroy');

//admin CRUD appointments
Route::get('/admin/appointments', 'Admin\AppointmentController@index')->name('admin.appointments.index');
Route::get('/admin/appointments/create', 'Admin\AppointmentController@create')->name('admin.appointments.create');
Route::get('/admin/appointments/{id}', 'Admin\AppointmentController@show')->name('admin.appointments.show');
Route::post('/admin/appointments/store', 'Admin\AppointmentController@store')->name('admin.appointments.store');
Route::get('/admin/appointments/{id}/edit', 'Admin\AppointmentController@edit')->name('admin.appointments.edit');
Route::put('/admin/appointments/{id}', 'Admin\AppointmentController@update')->name('admin.appointments.update');
Route::delete('/admin/appointments/{id}', 'Admin\AppointmentController@destroy')->name('admin.appointments.destroy');
