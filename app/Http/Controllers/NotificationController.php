<?php

namespace App\Http\Controllers;

use App\Models\doctor_v_model;
use App\Models\model_admin;
use App\Models\model_doctor;
use App\Models\model_signup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead($notificationId)
    {
        $u_id = session('u_id');
        $v_id = session('v_id');
        $a_id=session('a_id');
    
        if ($u_id) {
            $user = model_signup::find($u_id);
            if ($user) {
                $notification = $user->notifications()->find($notificationId);
                if ($notification && isset($notification->data['name'])) {
                    $notification->markAsRead();
                    return redirect('view_appoinment');
                } elseif($notification && isset($notification->data['b_id'])) {
                    $notification->markAsRead();
                    return redirect('view_report');                }
            } else {
                // Handle case where user is not found
            }
        } elseif ($v_id) {
            $doctor = doctor_v_model::find($v_id);
            if ($doctor) {
                $notification = $doctor->notifications()->find($notificationId);
                if ($notification) {
                    $notification->markAsRead();
                    return redirect('/view_my_appoinment');
                } else {
                    // Handle case where notification is not found
                }
            } else {
                // Handle case where doctor is not found
            }
        }elseif ($a_id) {
            $admin = model_admin::find($a_id);
            if ($admin) {
                $notification = $admin->notifications()->find($notificationId);
                if ($notification && isset($notification->data['doctor']) && isset($notification->data['name'])) {
                    $notification->markAsRead();
                    return redirect('/admin_view_appoinment');
                } elseif ($notification && isset($notification->data['name'])) {
                    $notification->markAsRead();
                    return redirect('/view_user');
                }
            } else {
                // Handle case where admin is not found
            }
        }

        // Redirect back to the previous page if none of the conditions are met or an error occurs
        return redirect()->back();
    }
    
}
