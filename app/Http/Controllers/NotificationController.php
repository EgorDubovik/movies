<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function read(DatabaseNotification $notification){
        $this->authorize('read-notifications',$notification);

        $notification->markAsRead();
        return redirect($notification->data['url']);

    }

    public function index(){

        $notifications = Auth::user()->notifications;
        return view('notification.index',['notifications' => $notifications]);
    }
}
