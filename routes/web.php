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
    return view('home_page');
});

Route::resource('groups', 'GroupsController');
Route::resource('news', 'NewsController');
Route::resource('group_lines', 'Group_linesController');
Route::resource('pc_points', 'Pc_pointsController');