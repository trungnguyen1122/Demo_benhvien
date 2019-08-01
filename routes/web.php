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
Route::get('/changePassword','HomeController@showChangePasswordForm')->name('auth.changepassword');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::get('/', 'FrontEnd\IndexController@getIndex');
Route::get('/home', 'HomeController@index');
Route::post('/update','FrontEnd\UserController@updateUser')->name('user.update');
Route::get('/prescription/{id}', 'FrontEnd\UserController@getPrescription')->name('user.prescription');
Route::get('/medicalrecord/{id}', 'FrontEnd\UserController@getMedicalrecord')->name('user.medicalrecord');
Route::get('/calendar', 'FrontEnd\UserController@getCalendar');
Route::get('/succes','FrontEnd\UserController@getSucces')->name('user.succes');
Route::get('/cancel','FrontEnd\UserController@cancel')->name('user.cancel');
Route::get('/history','FrontEnd\UserController@getHistory')->name('user.history');
Route::get('/user/booking', 'FrontEnd\UserController@confirm')->name('user.confirm');
Route::get('/getQuestion','FrontEnd\UserController@getQuestion')->name('user.getQuestion');
Route::get('/user/ajaxtable', 'FrontEnd\UserController@ajax');

Route::group(['prefix'=>'/doctor','middleware'=>'checkrole'],function(){

    Route::get('/', 'FrontEnd\DoctorController@getUpdate');
    Route::post('update', 'FrontEnd\DoctorController@updateDoctor')->name('doctor.update');
    Route::get('/patientlist', 'FrontEnd\DoctorController@getPatientList')->name('doctor.hello');
    Route::post('/prescription', 'FrontEnd\DoctorController@setPrescription')->name('doctor.prescription');
    Route::get('/examination', 'FrontEnd\DoctorController@popPatient')->name('doctor.popPatient');
//    Route::post('/medicine','FrontEnd\DoctorController@addMedicine')->name('user.addMedicine');
    Route::get('/leave','FrontEnd\DoctorController@getLeave')->name('doctor.leave');
    Route::get('/announcement','FrontEnd\DoctorController@getAnnouncement')->name('doctor.announcement');
    Route::get('/note','FrontEnd\DoctorController@getNote')->name('doctor.note');

});
Route::group(['prefix'=>'/receptionist'],function() {

    Route::get('/', 'FrontEnd\ReceptionistController@getBooking');
    Route::get('/addUser', 'FrontEnd\ReceptionistController@addUser')->name('receptionist.addUser');
    Route::get('/confirm', 'FrontEnd\ReceptionistController@confirm')->name('receptionist.confirm');
    Route::get('/patientlist', 'FrontEnd\ReceptionistController@getPatientList');
    Route::get('/formconfirm', 'FrontEnd\ReceptionistController@getConfirm');
});
Route::group(['prefix'=>'/manage'],function (){
    Route::get('/dashboard','FrontEnd\ManageController@getDashboard')->name('manage.dashboard');
    Route::get('/leave','FrontEnd\ManageController@getLeave')->name('manage.leave');
    Route::get('/announcement','FrontEnd\ManageController@getAnnouncement')->name('manage.announcement');

});



