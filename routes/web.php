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

/* DepartmentController */

Route::get('/adddepartment', 'DepartmentController@index');
Route::post('/savedepartment', 'DepartmentController@StoreDepartment');
Route::get('/listdepartment', 'DepartmentController@departmentList');
Route::get('/edit/department/{id}', 'DepartmentController@departmenEdit');
Route::post('/updatedepartment', 'DepartmentController@UpdatedDepartment');
Route::get('/delete/department/{id}', 'DepartmentController@departmentDelete');

/* DepartmentController */

/* DoctorController */

Route::get('/adddoctor', 'DoctorController@index');
Route::post('/savedoctor', 'DoctorController@StoreDoctor');
Route::get('/doctorlist', 'DoctorController@DoctorList');
Route::get('/view/doctor/{id}', 'DoctorController@DoctorView');
Route::get('/edit/doctor/{id}', 'DoctorController@DoctorEdit');
Route::post('/Updateddoctor', 'DoctorController@DoctorUpdated');
Route::get('/delete/doctor/{id}', 'DoctorController@DoctorDeleted');

 /* DoctorController */

 /* Representative */

Route::get('/addrepresentative', 'RepresentativeController@index');
Route::post('/saverepresentative', 'RepresentativeController@StoreRepresentative');
Route::get('/listrepresentative', 'RepresentativeController@listrepresentative');
Route::get('/edit/representative/{id}', 'RepresentativeController@EditRepresentative');
Route::post('/updaterepresentative', 'RepresentativeController@UpdateRepresentative');
Route::get('/delete/representative/{id}', 'RepresentativeController@DeleteRepresentative');
Route::get('/search', 'RepresentativeController@tablesearch');

  /* Representative */


   /* Patient */
Route::get('/addpatient', 'PatientController@addpatient');
Route::post('/savepatient', 'PatientController@StorePatient');
Route::get('/listpatient', 'PatientController@listPatient');
Route::get('/edit/patient/{id}', 'PatientController@editPatient');
Route::post('/update', 'PatientController@UpdatePatient');
Route::get('/deletePatient/{id}', 'PatientController@DeletePatient');
  /* Patient */