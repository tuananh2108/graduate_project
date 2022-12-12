<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderBy("id", "DESC")->paginate(8);
        return view('client.notification.index', ["notifications" => $notifications]);
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        return view('client.notification.show', ["notification" => $notification]);
    }
}
