<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth('agent')->user()->notifications;
        return view('agent.notification.notification', compact('notifications'));
    }

    public function mark_as_read($id, $routeName, $productId)
    {
        auth('agent')->user()->notifications()->where('id', $id)->first()->markAsRead();
        return redirect()->route($routeName, $productId);
    }

    public function deleteNotification(Request $request)
    {
        if ($request->id) {
            $allId = array_keys($request->id);
            foreach ($allId as $id) {
                auth('agent')->user()->notifications()->where('id', $id)->first()->delete();
            }
            Toastr::success("Notification Deleted Successfully");
        }
        return back();
    }

}
