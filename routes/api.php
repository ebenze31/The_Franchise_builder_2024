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

// PC POINT
Route::post('/create_score/excel', 'Pc_pointsController@create_score');

// GROUP
Route::get('/create_group/{amount}', 'GroupsController@create_group');
