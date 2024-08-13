<?php

use App\Http\Controllers\admin_controller;
use App\Http\Controllers\book_controller;
use App\Http\Controllers\doctor_controller;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\mobile_app\khalti_controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\payment_controller;
use App\Http\Controllers\register_controller;
use App\Http\Controllers\report_controller;
use App\Http\Controllers\signup_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\service_controller;
use App\Http\Controllers\vendor_controller;

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

Route::get('/signup', [signup_controller::class, 'run_signup']);
Route::post('/signup', [signup_controller::class, 'insert']);

Route::get('verify/{token}', [signup_controller::class, 'verify']);


Route::get('/login', [signup_controller::class, 'run_login']);
Route::post('/login', [signup_controller::class, 'login'])->name('login');

Route::get('/logout', function () {
    session()->flush(); // Destroy the entire session
    return redirect('login');
});
Route::middleware(['web'])->group(function () {

    Route::get('/userdashboard', [signup_controller::class, 'main'])->name('userdashboard');

    Route::get('/userdashboard', [signup_controller::class, 'get_notification']);


    Route::post('/book/{d_id}', [book_controller::class, 'insert']);



    Route::get('bookAppoinment/{d_id}', [book_controller::class, 'run']);
    Route::get('available-slots', [book_controller::class, 'getAvailableTimeSlots']);
    Route::get('available-slots', [book_controller::class, 'getAvailableSlots']);



    Route::get('/book/{d_id}', [book_controller::class, 'retrive_service']);

    // route::get('view_appoinment',function(){
    //     return view('view_appoinment');
    // });
    route::get('view_appoinment', [book_controller::class, 'select'])->name('view_appoinment');
    route::get('successpayment', [payment_controller::class, 'successpayment'])->name('successpayment');

    route::get('payment/{b_id}', [payment_controller::class, 'run_payment'])->name('payment');

    route::get('payment/{b_id}', [payment_controller::class, 'payment']);
    Route::post('payment_form', [Payment_controller::class, 'processPayment'])->name('payment_process');




    route::get('/delete/{id}', [book_controller::class, 'delete']);
    route::get('/edit/{id}', [book_controller::class, 'edit']);
    route::post('/edit/{id}', [book_controller::class, 'update']);


    // Route for displaying the user profile
    Route::get('/user_profile', [Signup_Controller::class, 'run_profile'])->name('user_profile');

    // Route for uploading profile picture
    Route::post('/user_profile', [Signup_Controller::class, 'add_profile_picture'])->name('upload_profile_picture');

    // Route for editing user profile information

    Route::post('/user_profile/edit_profile', [Signup_Controller::class, 'edit_profile'])->name('edit_profile');

    route::post('/user_profile/change_password',[signup_controller::class,'change_password']);

    Route::match(['get', 'post'], '/notifications/mark-as-read/{notification}',[NotificationController::class,'markAsRead'])->name('notifications.markAsRead');

    Route::get('/view_report',[report_controller::class,'run_report']);

    Route::get('/view_report',[report_controller::class,'send_report_to_user']);
    route::get('/view_service', [book_controller::class, 'run_service']);

    route::get('/view_service', [book_controller::class, 'view_service']);




    // forget password

    route::get('/Forget-password',[ForgetPasswordController::class,'forgetpassword'])->name('Forget-password');
    route::post('/Forget-password',[ForgetPasswordController::class,'forgetpasswordpost'])->name('Forget-password-post');
    route::get('/reset-password/{token}',[ForgetPasswordController::class,'resetPassword'])->name('reset-password');
    route::post('/reset-password',[ForgetPasswordController::class,'resetPasswordPost'])->name('reset-password-post');
    // end user part





    // admin part

    route::get('/admin_login', [admin_controller::class, 'admin_login_page']);
    route::post('/admin_login', [admin_controller::class, 'admin_login']);

    route::get('/admin_dashboard', [admin_controller::class, 'run_admin_dashboard']);
    route::get('/view_user', [admin_controller::class, 'run_view_user']);

    route::get('/view_user', [admin_controller::class, 'select_for_user']);

    route::get('/admin_dashboard', [admin_controller::class, 'select_for_dashboard']);




    route::get('/admin_view_appoinment', [admin_controller::class, 'run_appoinment']);

    route::get('/admin_view_appoinment', [admin_controller::class, 'select_appoinment']);
    route::get('status/{b_id}', [admin_controller::class, 'status']);
    route::get('remove/{u_id}', [admin_controller::class, 'remove_user']);




    route::get('/add_service', [service_controller::class, 'run_add_service']);

    route::post('/add_service', [service_controller::class, 'insert_service']);


    route::get('/add_service', [service_controller::class, 'select_service']);

    route::get('/delete_service/{s_id}', [service_controller::class, 'delete_service']);

    route::get('/edit_service/{s_id}', [service_controller::class, 'edit_service']);

    route::post('/edit_service/{s_id}', [service_controller::class, 'update_service']);

    route::get('/services_for_doctor', [doctor_controller::class, 'select_service']);






    route::get('/add_doctor', [doctor_controller::class, 'run_doctor']);
    route::post('/add_doctor', [doctor_controller::class, 'insert_doctor_info']);
    route::get('/add_doctor', [doctor_controller::class, 'retrive_doctor_info']);


    route::get('/delete_doctor/{d_id}', [doctor_controller::class, 'delete_doctor']);

    route::get('/edit_doctor/{d_id}', [doctor_controller::class, 'edit_doctor']);
    route::post('/edit_doctor/{d_id}', [doctor_controller::class, 'update_doctor']);



    route::get('/view_doctor', [book_controller::class, 'run_doctor']);


    route::get('/view_doctor', [book_controller::class, 'retrive_doctor_info']);
    route::get('/doctorProfile/{d_id}', [book_controller::class, 'run_doctorProfile']);

    Route::get('/doctorProfile/{d_id}', [book_controller::class, 'getDoctorInfo'])->name('doctor.profile');

// Insert Comment
Route::post('/doctorProfile/{d_id}/comment', [book_controller::class, 'insert_comment'])->name('comments.store');

// Insert Rating
Route::post('/doctorProfile/{d_id}/rating', [book_controller::class, 'insert_rating'])->name('rating.store');

// Retrieve Doctor Ratings
Route::get('/doctor/{id}/ratings', [book_controller::class, 'retrieveRatingsByDoctorId'])->name('doctor.ratings');

// Save or Update Average Rating
Route::post('/doctor/{id}/save-average-rating', [book_controller::class, 'saveAverageRating'])->name('doctor.saveAverageRating');


    Route::get('/logout_admin', function () {
        session()->flush(); // Destroy the entire session
        return redirect('admin_login');
    });



    // vendor   doctor




    route::get('/main_dashboard', [register_controller::class, 'run_main_dashboard']);
    route::get('/register', [register_controller::class, 'run_register']);

    route::post('/register', [register_controller::class, 'insert_register_info']);

    route::post('/doctor_login', [register_controller::class, 'doctor_login']);

    route::get('/doctor_dashboard', [vendor_controller::class, 'doctor_dashboard']);

    Route::get('/logout_doctor', function () {
        session()->flush(); // Destroy the entire session
        return redirect('register');
    });

    route::get('/register', [doctor_controller::class, 'retrive_doctor_info_for_doctor_dashboard']);


    route::get('/view_d_appoinment', [vendor_controller::class, 'view_d_appoinment']);
    route::get('/view_d_appoinment', [vendor_controller::class, 'select_appoinment']);
    route::get('/view_my_appoinment', [vendor_controller::class, 'view_my_appoinment']);
    route::get('/view_my_appoinment', [vendor_controller::class, 'select_my_appoinment']);


    route::get('/view_d_user', [vendor_controller::class, 'view_user']);
    route::get('/view_d_user', [vendor_controller::class, 'select_user']);
    route::get('/doctor_dashboard', [vendor_controller::class, 'get_notification']);

    route::post('/send_report', [vendor_controller::class, 'send_report']);






    Route::get('/get_doctor_time/{doctorname}', [doctor_controller::class, 'getDoctorTime'])->name('getdoctortime');


    route::get('/doctorprofile',[vendor_controller::class,'run_doctor_profile']);
    route::get('/doctorprofile',[vendor_controller::class,'send_doctor_info']);
    route::post('/doctorprofile/photo',[vendor_controller::class,'add_profile_picture']);

    route::post('/doctorprofile/edit',[vendor_controller::class,'edit_doctor_info']);
    route::post('/doctorprofile/change_password',[vendor_controller::class,'change_password']);

    Route::post('/payment-detail', [khalti_controller::class, 'paymentDetail']);

});
