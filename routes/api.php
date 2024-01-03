<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// LINE API
Route::post('/lineapi', 'API\LineApiController@store');

// PROFILE
Route::post('/create_user/excel', 'ProfileController@create_user');
Route::post('/create_qr_code', 'ProfileController@create_qr_code');
Route::get('/qr_profile', 'ProfileController@qr_profile');
Route::get('/change_status/{account}/{Staff_id}', 'ProfileController@change_status');
Route::get('/get_data_account/{type_get_data}', 'ProfileController@get_data_account');
Route::post('/get_account_reg_success', 'ProfileController@get_account_reg_success');
Route::get('/get_users/{account}', 'ProfileController@get_users');
Route::get('/check_pay_slip/{user_id}', 'ProfileController@check_pay_slip');
Route::get('/check_pdpa/{account}', 'ProfileController@check_pdpa');
Route::get('/update_pdpa/{account}', 'ProfileController@update_pdpa');
Route::get('/keep_name_Activity/{name_Activity}/{user_id}', 'ProfileController@keep_name_Activity');
Route::get('/cf_shirt_size/{account}/{Title_value}', 'ProfileController@cf_shirt_size');
Route::get('/get_time_request_join/{user_id}', 'ProfileController@get_time_request_join');
Route::get('/get_data_user/{user_id}', 'ProfileController@get_data_user');
Route::get('/get_data_me/{user_id}', 'ProfileController@get_data_me');
Route::get('/get_data_badges/{user_id}', 'ProfileController@get_data_badges');
Route::get('/get_user_get_shirt/{type}', 'ProfileController@get_user_get_shirt');

// PC POINT
Route::post('/create_score/excel', 'Pc_pointsController@create_score');

// GROUP
Route::get('/create_group/{amount}', 'GroupsController@create_group');
Route::get('/active_group/{amount}', 'GroupsController@active_group');
Route::get('/get_data_groups/{type_get_data}', 'GroupsController@get_data_groups');
Route::get('/user_join_team/{type}/{group_id}/{user_id}', 'GroupsController@user_join_team');
Route::get('/change_group_status/{type}/{group_id}/{user_id}', 'GroupsController@change_group_status');

Route::get('/get_data_my_team/{group_id}', 'GroupsController@get_data_my_team');
Route::get('/CF_answer_request/{answer}/{member_id}/{group_id}', 'GroupsController@CF_answer_request');
Route::get('/get_data_view_group/{Search_input}', 'GroupsController@get_data_view_group');
Route::get('/check_request_join/{group_id}', 'GroupsController@check_request_join');

// Activities
Route::get('/cf_Activities/{user_id}/{name_Activities}', 'ActivitiesController@cf_Activities');
Route::get('/get_detail_activity/{id}', 'ActivitiesController@get_detail_activity');

// LINE
Route::get('/send_Line_Notify', 'Contact_staffController@send_Line_Notify');

