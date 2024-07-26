<?php

namespace App\Http\Controllers\mobile_app;

use App\Http\Controllers\Controller;
use App\Models\model_notification;
use App\Models\model_signup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class notification_controller extends Controller
{
    public function getnotification(Request $request)
    {
        $u_id = $request->u_id;
        $user = model_signup::find($u_id);

        if (!$user) {
            return response()->json([
                'result' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        $notifications = $user->notifications;

        if ($notifications->isEmpty()) {
            return response()->json([
                'result' => 'error',
                'message' => 'No notifications found'
            ], 404);
        }

        $notificationList = [];

        foreach ($notifications as $notification) {
            if (isset($notification->data['name']) || isset($notification->data['b_id'])) {
                $notificationList[] = [
                    'name' => $notification->data['name'] ?? 1,
                    'doctor' => $notification->data['doctor'] ?? 1,
                    'date' => $notification->created_at,
                    'notification_id' => $notification->id,
                    'read_at' => $notification->read_at ?? "read",
                ];
            }
        }

        return response()->json([
            'result' => 'success',
            'notificationlist' => $notificationList
        ]);
    }


    public function markAsRead(Request $request)
    {
        $n_id = $request->input('n_id');
        $u_id = $request->input('u_id');

        if ($u_id) {
            $user = model_signup::find($u_id);
            if ($user) {
                $notification = $user->notifications()->find($n_id);
                if ($notification) {
                    if (isset($notification->data['name']) || isset($notification->data['b_id'])) {
                        $notification->markAsRead();
                        return response()->json(['result' => 'success']);
                    } else {
                        return response()->json([
                            'result' => 'failure',
                            'message' => 'Notification does not contain valid data'
                        ], 400); // 400 Bad Request
                    }
                } else {
                    return response()->json([
                        'result' => 'failure',
                        'message' => 'Notification not found'
                    ], 404); // 404 Not Found
                }
            } else {
                return response()->json([
                    'result' => 'failure',
                    'message' => 'User not found'
                ], 404); // 404 Not Found
            }
        } else {
            return response()->json([
                'result' => 'failure',
                'message' => 'User ID is required'
            ], 400); // 400 Bad Request
        }
    }

}
