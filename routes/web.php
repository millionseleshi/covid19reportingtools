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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

//get send daily report view
Route::get('/sendreport', 'DailyReportController@childDailyReport')->name('SendReportForm');
Route::get('/sentreport', 'DailyReportController@DailyReportSentByMe')->name('SentReport');
Route::post('/sendreport', 'DailyReportController@sendDailyReport')->name('SendReport');
Route::post('/editreport','DailyReportController@editDailyReport')->name('EditReport');
Route::get('/newcasemonth','DailyReportController@newCaseCountByMonth')->name('NewCaseReportMonthGraph');
Route::get('/fatalitymonth','DailyReportController@fatalityCountByMonth')->name('FatalityReportMonthGraph');
Route::get('/newcaseday','DailyReportController@newCaseCountByDay')->name('NewCaseReportDayGraph');
Route::get('/fatalityday','DailyReportController@fatalityCountByDay')->name('FatalityReportDayGraph');

//get sent daily report view
Route::get('/showreport', 'DailyReportController@centralDailyReport')->name('ViewReportForm');
Route::get('/showreport/{id}', 'DailyReportController@showDailyReportDetail')->name('ReportDetail');
Route::get('/dashboard', 'ControlNodeController@showCentralNodeDashboard')->name('CentralDashboard');
//Control Node
Route::get('/nodes', 'ControlNodeController@create')->name('ManageNode');
Route::post('/nodes', 'ControlNodeController@store')->name('AddNode');
Route::get('/users','ControlNodeController@addUserView')->name('AddUserForm');
Route::post('/users','ControlNodeController@addUser')->name('AddUser');
Route::get('/viewuser','ControlNodeController@viewUserList')->name('UserList');


