<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Notification::paginate(4);

        return view('admin.notification.index', ["notifications" => $notifications]);
    }

    public function new()
    {
        return view('admin.notification.new', ["notifications" => Notification::all()]);
    }

    public function create(Request $request)
    {
        $notification = new Notification;
        $notification->title = $request->title;
        $notification->content = json_encode([$request->content, $request->content2]);

        if($request->hasFile('notification_img'))
        {
            $file = $request->notification_img;
            $filename = $notification->title.'-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('common/img/notification', $filename);
            $notification_img = $filename;
        }
        else
        {
            $notification_img = 'no-img.jpg';
        }

        if($request->hasFile('notification_img2'))
        {
            $file = $request->notification_img2;
            $filename = $notification->title.'-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('common/img/notification', $filename);
            $notification_img2 = $filename;
        }
        else
        {
            $notification_img2 = 'no-img.jpg';
        }
        $notification->img = json_encode([$notification_img, $notification_img2]);
        $notification->save();

        return redirect('admin/notification')->with(["message" => "Tạo tin tức thành công!"]);
    }

    public function edit($id)
    {
        $notification = Notification::find($id);

        return view('admin.notification.edit', ['notification' => $notification]);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::find($id);
        $notification->title = $request->title;
        $notification->content = json_encode([$request->content, $request->content2]);

        if($request->hasFile('notification_img'))
        {
            $file = $request->notification_img;
            $filename = $notification->title.'-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('common/img/notification', $filename);
            $notification_img = $filename;
        }
        else
        {
            $notification_img = json_decode($notification->img)[0];
        }

        if($request->hasFile('notification_img2'))
        {
            $file = $request->notification_img2;
            $filename = $notification->title.'-'.Str::random(3).'.'.$file->getClientOriginalExtension();
            $file->move('common/img/notification', $filename);
            $notification_img2 = $filename;
        }
        else
        {
            $notification_img2 = json_decode($notification->img)[1];
        }
        $notification->img = json_encode([$notification_img, $notification_img2]);
        $notification->save();

        return redirect('admin/notification')->with('message', 'Đã sửa tin tức thành công!');
    }

    public function destroy($id)
    {
        $notification = Notification::find($id);
        if ($notification)
        {
            $notification->delete();
            return redirect('admin/notification')->with('msg_success', 'Xóa tin tức thành công!');
        }
        else
        {
            return redirect('admin/notification')->withErrors(["Bản ghi không tồn tại!"]);
        }
    }
}
