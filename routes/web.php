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

// AL = สมาชิก AL เริ่มต้น
// Player = กดตอบรับร่วมกิจกรรม
// Super-admin = admin[อัพเดตคะแนน]
// Admin = [เจ้าหน้าที่หลังบ้าน]
// Staff = เจ้าหน้าาที่หน้าบ้าน /observer]

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


// LOGIN
Route::middleware(['auth',])->group(function () {
    Route::resource('profile', 'ProfileController');
});

// REGISTER TFB 2024
Route::middleware(['auth', 'role:AL'])->group(function () {
    Route::get('/register_tfb2024', 'HomeController@register_tfb2024');
});

// AL
Route::middleware(['auth', 'role:Player ,Super-admin, Admin, Staff'])->group(function () {

    Route::resource('pc_points', 'Pc_pointsController');
    Route::resource('groups', 'GroupsController');
    Route::get('/group_my_team', 'GroupsController@my_team');
});

// Super-admin & Admin
Route::middleware(['auth', 'role:Super-admin, Admin'])->group(function () {

    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/add_account', 'ProfileController@add_account');
    Route::get('/account_all', 'ProfileController@account_all');
    Route::get('/add_score', 'Pc_pointsController@add_score');
    Route::get('/add_group', 'GroupsController@add_group');
    Route::resource('group_lines', 'Group_linesController');
    Route::resource('news', 'NewsController');

    Route::resource('mylog', 'MylogController');

    Route::get('/admin/scanner', 'HomeController@admin_scanner');
});

