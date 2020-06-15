<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/add', 'CMSController@add')->name('add');
Route::get('/add', 'CMSController@showAdd');
Route::post('/changeSituation', 'CMSController@changeSituation')->name('changeSituation');
Route::post('/exit', 'CMSController@exit')->name('exit');

Route::get('/manage', 'CMSController@showManage')->name('manage');
Route::get('/archive', 'CMSController@showArchive')->name('archive');
Route::get('/dashboard', 'CMSController@showDashboard')->name('dashboard');
Route::get('/edit/{id}', 'CMSController@showEdit');
Route::post('/edit/{id}', 'CMSController@edit')->name('edit');




