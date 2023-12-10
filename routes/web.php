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

// member = สมาชิกทั้งหมด
// challenger = ผู้เข่าร่วมกิจกรรม
// admin-H-LAB = admin H-LAB
// admin-Allianz = admin Allianz
// staff-reg = เจ้าหน้าที่ลงทะเบียน
// staff-shirt = เจ้าหน้าที่เช็คการรับเสื้อ

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// REGISTER TFB 2024
Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/register_tfb2024', 'HomeController@register_tfb2024');
});

// member
Route::middleware(['auth', 'role:challenger'])->group(function () {

    Route::resource('pc_points', 'Pc_pointsController');
    Route::resource('groups', 'GroupsController');

});

// admin
Route::middleware(['auth', 'role:admin-H-LAB, admin-Allianz'])->group(function () {

    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/add_account', 'ProfileController@add_account');
    Route::get('/account_all', 'ProfileController@account_all');
    Route::resource('group_lines', 'Group_linesController');
    Route::resource('news', 'NewsController');

});
