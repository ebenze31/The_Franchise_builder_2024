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
Route::post('/delete_user/excel', 'ProfileController@delete_user');
Route::post('/Registration_user', 'ProfileController@Registration_user');
Route::post('/create_qr_code', 'ProfileController@create_qr_code');
Route::get('/qr_profile', 'ProfileController@qr_profile');
Route::get('/change_status/{account}/{Staff_id}', 'ProfileController@change_status');
Route::get('/get_data_account/{type_get_data}', 'ProfileController@get_data_account');
Route::post('/get_account_reg_success', 'ProfileController@get_account_reg_success');
Route::post('/check_Team_and_Shirt_Size', 'ProfileController@check_Team_and_Shirt_Size');
Route::get('/get_users/{account}', 'ProfileController@get_users');
Route::get('/check_pay_slip/{user_id}', 'ProfileController@check_pay_slip');
Route::get('/check_pdpa/{account}', 'ProfileController@check_pdpa');
Route::get('/update_pdpa/{account}', 'ProfileController@update_pdpa');
Route::get('/keep_name_Activity/{name_Activity}/{user_id}', 'ProfileController@keep_name_Activity');
Route::get('/cf_shirt_size/{account}/{Title_value}', 'ProfileController@cf_shirt_size');
Route::get('/get_time_request_join/{user_id}', 'ProfileController@get_time_request_join');
Route::get('/get_data_user/{user_id}', 'ProfileController@get_data_user');
Route::get('/get_data_user_for_view_group/{user_id}', 'ProfileController@get_data_user_for_view_group');
Route::get('/get_data_me/{user_id}', 'ProfileController@get_data_me');
Route::get('/get_data_badges/{user_id}', 'ProfileController@get_data_badges');
Route::get('/get_user_get_shirt/{type}', 'ProfileController@get_user_get_shirt');
Route::get('/CF_cancel_join/{user_id}', 'ProfileController@CF_cancel_join');
Route::get('/check_account_Cancel_join/{account}', 'ProfileController@check_account_Cancel_join');
Route::get('/CF_cancel_player/{user_id}', 'ProfileController@CF_cancel_player');
Route::get('/get_data_cancel_join', 'ProfileController@get_data_cancel_join');
Route::get('/change_return_shirt/{type}/{id}', 'ProfileController@change_return_shirt');
Route::get('/get_data_host', 'ProfileController@get_data_host');


// PC POINT
Route::post('/create_score/excel', 'Pc_pointsController@create_score');
Route::get('/get_data_rank/{type}', 'Pc_pointsController@get_data_rank');
Route::get('/get_member_in_team/{group_id}/{week}', 'Pc_pointsController@get_member_in_team');
Route::get('/get_users_by_id/{user_id}', 'Pc_pointsController@get_users_by_id');
Route::get('/check_last_update_pc_point', 'Pc_pointsController@check_last_update_pc_point');
Route::get('/get_pc_point_of_me/{user_id}', 'Pc_pointsController@get_pc_point_of_me');

// NEWS
Route::get('/check_alert_news/{user_id}', 'NewsController@check_alert_news');
Route::get('/null_alert_news/{user_id}', 'NewsController@null_alert_news');
Route::get('/get_data_news/{news_id}', 'NewsController@get_data_news');
Route::get('/remove_read_not_read/{user_id}/{news_id}', 'NewsController@remove_read_not_read');


// GROUP
Route::get('/create_group/{amount}', 'GroupsController@create_group');
Route::get('/active_group/{amount}', 'GroupsController@active_group');
Route::get('/get_data_groups/{type_get_data}', 'GroupsController@get_data_groups');
Route::get('/user_join_team/{type}/{group_id}/{user_id}', 'GroupsController@user_join_team');
Route::get('/change_group_status/{type}/{group_id}/{user_id}', 'GroupsController@change_group_status');
Route::get('/get_data_group_show_score/{group_id}', 'GroupsController@get_data_group_show_score');
Route::get('/check_alert_700k/{group_id}/{score_of_team}/{amount_member_50k}', 'GroupsController@check_alert_700k');
Route::get('/check_alert_50k/{user_id}', 'GroupsController@check_alert_50k');


Route::get('/get_data_my_team/{group_id}', 'GroupsController@get_data_my_team');
Route::get('/CF_answer_request/{answer}/{member_id}/{group_id}', 'GroupsController@CF_answer_request');
Route::get('/get_data_view_group/{Search_input}', 'GroupsController@get_data_view_group');
Route::get('/check_request_join/{group_id}', 'GroupsController@check_request_join');
Route::get('/CF_delete_team/{group_id}', 'ProfileController@CF_delete_team');

// Activities
Route::get('/cf_Activities/{user_id}/{name_Activities}', 'ActivitiesController@cf_Activities');
Route::get('/get_detail_activity/{id}', 'ActivitiesController@get_detail_activity');
Route::get('/get_activity/{name}', 'ActivitiesController@get_activity');
Route::get('/check_user_join_activity/{account}/{name_Activity}', 'ActivitiesController@check_user_join_activity');
Route::get('/change_show_staff/{id}/{status}', 'ActivitiesController@change_show_staff');
Route::get('/change_active/{id}/{status}', 'ActivitiesController@change_active');

// Export activities
Route::get('/create_tabel_for_export', 'ActivitiesController@create_tabel_for_export');
Route::get('/insert_data_activities', 'ActivitiesController@insert_data_activities');
Route::get('/export_to_excelc', 'ActivitiesController@export_to_excelc');

// contact staffs
Route::get('/get_contact_staffs', 'Contact_staffController@get_contact_staffs');
Route::get('/change_approve/{id}/{check_Approve}', 'Contact_staffController@change_approve');
Route::get('/change_finish/{id}/{check_Finish}', 'Contact_staffController@change_finish');


// LINE
Route::post('/send_Line_Notify', 'Contact_staffController@send_Line_Notify');

// END MISSION 1
Route::post('/mission_1_Team_no10', 'Pc_pointsController@mission_1_Team_no10');
Route::post('/mission_1_Team_out', 'Pc_pointsController@mission_1_Team_out');
Route::post('/mission_1_People_noTeam', 'Pc_pointsController@mission_1_People_noTeam');
Route::post('/mission_1_People_out', 'Pc_pointsController@mission_1_People_out');
Route::get('/check_role_end_mission_1/{id}', 'Pc_pointsController@check_role_end_mission_1');
Route::get('/change_remark_user/{id}', 'Pc_pointsController@change_remark_user');

Route::get('/create_logs', 'LogsController@create_logs');

// Mission 2
Route::get('/get_data_user_mission_2/{group_id}', 'ProfileController@get_data_user_mission_2');
Route::get('/get_data_all_team_m2', 'ProfileController@get_data_all_team_m2');

// grand_mission
Route::get('/get_data_user_grand_mission/{data_sort}', 'ProfileController@get_data_user_grand_mission');
Route::get('/get_member_in_team_for_grand_mission/{group_id}/{week}/{type}', 'Pc_pointsController@get_member_in_team_for_grand_mission');
