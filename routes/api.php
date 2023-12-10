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

Route::post('/create_user/excel', 'ProfileController@create_user');
Route::post('/create_score/excel', 'Pc_pointsController@create_score');
Route::get('/get_data_account/{type_get_data}', 'ProfileController@get_data_account');
Route::get('/create_group/{amount}', 'GroupsController@create_group');
