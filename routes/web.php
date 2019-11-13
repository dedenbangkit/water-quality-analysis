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


Route::get('/end', function () {
    return view('thanks');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard-analysis', 'DashboardController@analysis')->name('dashboard-analysis');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/survey', 'HomeController@survey')->name('survey');
