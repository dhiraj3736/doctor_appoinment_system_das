<?php

use App\Http\Controllers\admin_controller;
use App\Http\Controllers\book_controller;
use App\Http\Controllers\doctor_controller;
use App\Http\Controllers\signup_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\service_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// user part
Route::get('images/{filename}', function ($filename) {
    $path = resource_path('views/images/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
   

    return view('dashboard');
});

Route::get('/signup',[signup_controller::class,'run_signup']);
Route::post('/signup',[signup_controller::class,'insert']);

Route::get('/login',[signup_controller::class,'run_login']);
Route::post('/login',[signup_controller::class,'login'])->name('login');

Route::get('/logout', function () {
    session()->flush(); // Destroy the entire session
    return redirect('login');
});


Route::get('/userdashboard',[signup_controller::class,'main']);


Route::get('/book',[book_controller::class,'run']);
Route::post('/book',[book_controller::class,'insert']);

Route::get('/book',[book_controller::class,'retrive_service']);

// route::get('view_appoinment',function(){
//     return view('view_appoinment');
// });
route::get('view_appoinment',[book_controller::class,'select']);
route::get('/delete/{id}',[book_controller::class,'delete']);
route::get('/edit/{id}',[book_controller::class,'edit']);
route::post('/edit/{id}',[book_controller::class,'update']);



// end user part





// admin part
route::get('/admin_dashboard',[admin_controller::class,'run_admin_dashboard']);
route::get('/view_user',[admin_controller::class,'run_view_user']);

route::get('/view_user',[admin_controller::class,'select_for_user']);

route::get('/admin_dashboard',[admin_controller::class,'select_for_dashboard']);



route::get('/admin_view_appoinment',[admin_controller::class,'run_appoinment']);

route::get('/admin_view_appoinment',[admin_controller::class,'select_appoinment']);
route::get('status/{b_id}',[admin_controller::class,'status']);
route::get('remove/{u_id}',[admin_controller::class,'remove_user']);




route::get('/add_service',[service_controller::class,'run_add_service']);

route::post('/add_service',[service_controller::class,'insert_service']);


route::get('/add_service',[service_controller::class,'select_service']);

route::get('/delete_service/{s_id}',[service_controller::class,'delete_service']);

route::get('/edit_service/{s_id}',[service_controller::class,'edit_service']);

route::post('/edit_service/{s_id}',[service_controller::class,'update_service']);




route::get('/view_service',[book_controller::class,'run_service']);

route::get('/view_service',[book_controller::class,'view_service']);



route::get('/add_doctor',[doctor_controller::class,'run_doctor']);
route::post('/add_doctor',[doctor_controller::class,'insert_doctor_info']);
route::get('/add_doctor',[doctor_controller::class,'retrive_doctor_info']);

route::get('/delete_doctor/{d_id}',[doctor_controller::class,'delete_doctor']);

route::get('/edit_doctor/{d_id}',[doctor_controller::class,'edit_doctor']);
route::post('/edit_doctor/{d_id}',[doctor_controller::class,'update_doctor']);



route::get('/view_doctor',[book_controller::class,'run_doctor']);

route::get('/view_doctor',[book_controller::class,'retrive_doctor_info']);














