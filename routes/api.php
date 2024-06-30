<?php

use App\Http\Controllers\mlogin;
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


