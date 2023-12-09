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


Auth::routes();

// LOGIN
Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('pc_points', 'Pc_pointsController');
    Route::resource('groups', 'GroupsController');

});

// ROLE = admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/add_account', 'ProfileController@add_account');
    Route::resource('group_lines', 'Group_linesController');
    Route::resource('news', 'NewsController');

});
