<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
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
// Staff = [เจ้าหน้าาที่หน้าบ้าน /observer]
// QR = สำหรับสแกน QR อย่างเดียว

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test_qr', 'HomeController@test_qr');
Route::get('/404', 'HomeController@index');


// LOGIN
Route::middleware(['auth',])->group(function () {
    Route::get('first_profile', 'ProfileController@index');
    Route::get('profile', 'ProfileController@show');
    Route::post('/edit_profile/{id}', 'ProfileController@edit_profile')->name('edit_profile');
    Route::get('/for_scan', 'HomeController@for_scan');

    Route::get('/ranking_by_individual', function () {
        return view('pc_points/ranking_by_individual');
    });
    Route::get('/ranking_by_team', function () {
        return view('pc_points/ranking_by_team');
    });

});

// REGISTER AL TFB 2024
Route::middleware(['auth', 'role:AL'])->group(function () {
    Route::get('/register_tfb2024', 'HomeController@register_tfb2024');
});

// Staff
Route::middleware(['auth', 'role:Staff,QR'])->group(function () {
    Route::get('/admin_scanner', 'HomeController@admin_scanner');
});

// Player
Route::middleware(['auth', 'role:Player,Super-admin,Admin'])->group(function () {
    // Route::resource('news', 'NewsController')->except(['edit','view']);
    Route::get('news/index', 'NewsController@index');
    Route::get('news/{id}', 'NewsController@show');

    Route::resource('pc_points', 'Pc_pointsController');
    Route::resource('groups', 'GroupsController');
    Route::get('/preview_team/{group_id}', 'GroupsController@preview_team');
    Route::get('/group_my_team/{group_id}', 'GroupsController@my_team');
    Route::get('/scanner', 'HomeController@scanner');
});

// Super-admin & Admin
Route::middleware(['auth', 'role:Super-admin,Admin'])->group(function () {

    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/add_account', 'ProfileController@add_account');
    Route::get('/account_all', 'ProfileController@account_all');
    Route::get('/account_reg_success', 'ProfileController@account_reg_success');
    Route::get('/account_admin', 'ProfileController@account_admin');
    Route::get('/add_score', 'Pc_pointsController@add_score');
    Route::get('/add_group', 'GroupsController@add_group');
    Route::get('/view_group', 'GroupsController@view_group');
    Route::resource('group_lines', 'Group_linesController');
    Route::resource('news', 'NewsController');
    Route::get('add_news', 'NewsController@add_news');

    Route::resource('mylog', 'MylogController');
    Route::resource('activities', 'ActivitiesController');
    Route::get('/admin/scanner', 'HomeController@admin_scanner');
    Route::get('/user_get_shirt', 'HomeController@user_get_shirt');
    Route::resource('contact_staff', 'Contact_staffController');

});


Route::resource('activities_log', 'Activities_logController');