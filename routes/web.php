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

// Member = สมาชิกทั้งหมด
// Challenger = ผู้เข่าร่วมกิจกรรม
// Admin-HLAB = admin H-LAB
// Admin-Allianz = admin Allianz
// Staff-reg = เจ้าหน้าที่ลงทะเบียน
// Staff-shirt = เจ้าหน้าที่เช็คการรับเสื้อ

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// LOGIN
Route::middleware(['auth',])->group(function () {
    Route::resource('profile', 'ProfileController');
});

// REGISTER TFB 2024
Route::middleware(['auth', 'role:Member'])->group(function () {
    Route::get('/register_tfb2024', 'HomeController@register_tfb2024');
});

// Member
Route::middleware(['auth', 'role:Challenger ,Admin-HLAB, Admin-Allianz'])->group(function () {

    Route::resource('pc_points', 'Pc_pointsController');
    Route::resource('groups', 'GroupsController');

});

// admin
Route::middleware(['auth', 'role:Admin-HLAB, Admin-Allianz'])->group(function () {

    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/add_account', 'ProfileController@add_account');
    Route::get('/account_all', 'ProfileController@account_all');
    Route::get('/add_score', 'Pc_pointsController@add_score');
    Route::get('/add_group', 'GroupsController@add_group');
    Route::resource('group_lines', 'Group_linesController');
    Route::resource('news', 'NewsController');

});

Route::resource('mylog', 'MylogController');