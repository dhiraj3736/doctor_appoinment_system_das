<?php

use App\Http\Controllers\mlogin;
use App\Http\Controllers\mobile_app\averagingaRating_controller;
use App\Http\Controllers\mobile_app\book_controller;
use App\Http\Controllers\mobile_app\doctor_profile_controller;
use App\Http\Controllers\mobile_app\esewa_controller;
use App\Http\Controllers\mobile_app\khalti_controller;
use App\Http\Controllers\mobile_app\notification_controller;
use App\Http\Controllers\mobile_app\schedule_controller;
use App\Http\Controllers\mobile_app\seacrhController;
use App\Http\Controllers\mobile_app\service_dashboard_controller;
use App\Http\Controllers\mobile_app\userdashboard_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signup_controller;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth',[mlogin::class,'authentication']);
Route::post('register',[mlogin::class,'insert']);


Route::post('user_info',[userdashboard_controller::class,'select_user_info']);
Route::post('service_name',[userdashboard_controller::class,'select_service']);

Route::post('Service_info',[service_dashboard_controller::class,'select_service_info']);
Route::post('doctor_info',[service_dashboard_controller::class,'select_doctor_info']);
Route::post('doctor_info_for_userdashboard',[userdashboard_controller::class,'select_doctor_info_for_userdashboard']);

Route::post('doctor_info_for_doctor_list',[doctor_profile_controller::class,'doctor_info_for_doctor_list']);


Route::post('doctor_info_for_profile',[doctor_profile_controller::class,'select_doctor_info_for_profile']);
Route::post('service_name_for_fragment',[doctor_profile_controller::class,'select_service_name_for_profile']);
Route::post('insert_rating',[doctor_profile_controller::class,'insert_rating']);

Route::post('insert_comment',[doctor_profile_controller::class,'insert_comment']);
Route::post('retrieve_comment',[doctor_profile_controller::class,'retrieve_comment']);
Route::post('get_rating',[doctor_profile_controller::class,'get_rating']);

Route::post('getAvailableTimeSlots', [book_controller::class, 'getAvailableTimeSlots']);


Route::post('retrieveRatingsByDoctorId',[averagingaRating_controller::class,'retrieveRatingsByDoctorId']);
Route::post('saveAverageRating',[averagingaRating_controller::class,'saveAverageRating']);

Route::post('topRated',[averagingaRating_controller::class,'topRated']);

Route::post('saveAppoinment',[book_controller::class,'saveAppoinment']);

Route::post('EditAppoinment',[book_controller::class,'EditAppoinment']);

Route::post('select_doctor_info',[book_controller::class,'select_doctor_info']);



Route::post('get_upcoming_schedule',[schedule_controller::class,'get_upcoming_schedule']);
Route::post('get_completed_schedule',[schedule_controller::class,'get_completed_schedule']);


Route::post('insert_payment',[esewa_controller::class,'insert_payment']);

Route::post('get_booking_info',[khalti_controller::class,'get_booking_info']);



Route::post('getnotification',[notification_controller::class,'getnotification']);
Route::post('markAsRead',[notification_controller::class,'markAsRead']);

Route::post('select_doctor_info_for_search',[seacrhController::class,'select_doctor_info_for_search']);




// cd /path/to/your/android/project
// git init
// git remote add origin https://github.com/username/repository-name.git
// git add .
// git commit -m "Initial commit"
// git push -u origin main



// Weighted Rating Calculation
