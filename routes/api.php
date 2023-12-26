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
Route::get('/change_status/{account}/{Staff_id}', 'ProfileController@change_status');
Route::get('/get_data_account/{type_get_data}', 'ProfileController@get_data_account');
Route::get('/get_users/{account}', 'ProfileController@get_users');
Route::get('/check_pay_slip/{user_id}', 'ProfileController@check_pay_slip');

// PC POINT
Route::post('/create_score/excel', 'Pc_pointsController@create_score');

// GROUP
Route::get('/create_group/{amount}', 'GroupsController@create_group');
Route::get('/active_group/{amount}', 'GroupsController@active_group');
Route::get('/get_data_groups/{type_get_data}', 'GroupsController@get_data_groups');
Route::get('/user_join_team/{type}/{group_id}/{user_id}', 'GroupsController@user_join_team');
Route::get('/change_group_status/{type}/{group_id}/{user_id}', 'GroupsController@change_group_status');

Route::get('/get_data_my_team/{group_id}', 'GroupsController@get_data_my_team');
