<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function read(DatabaseNotification $notification){
        $this->authorize('read-notifications',$notification);

        $notification->markAsRead();
        return redirect($notification->data['url']);

    }
}
