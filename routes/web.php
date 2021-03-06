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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group( ['middleware' => ['auth']], function() {
    Route::get('/home', 'DashboardController@index')->name('dashboard');
    Route::get('/profile', 'DashboardController@profile')->name('dashboard.profile_index');
    Route::post('/profile/set', 'DashboardController@profile')->name('dashboard.profile');
    Route::resource('tokens', 'TokenController');
});
