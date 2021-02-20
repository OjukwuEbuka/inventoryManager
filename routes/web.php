<?php
use App\Http\Controllers\GuardianController;

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

Route::view('contact', 'contact');

Route::view('about', 'about');

Route::get('login', 'LoginPageController@index')->name('login');
Route::get('/', 'LoginPageController@index');
Route::post('login/user', 'LoginPageController@mainLogin');


Route::middleware(['auther'])->group(function(){
    Route::get('{school}/student/profile/{student}', 'StudentsController@studentProfile')->name('studentProfile');

    Route::get('{school}/staff/profile/{staff}', 'StaffController@staffProfile')->name('staffProfile');
    Route::post('student/result/{student}', 'ResultsController@fetchStudentResult');

});