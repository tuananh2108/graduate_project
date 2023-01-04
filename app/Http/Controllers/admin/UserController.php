<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddAccountRequest, EditAccountRequest};
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data['users'] = User::sortable()->where([['role', User::SUPERADMIN], ['name', 'like', '%'.$request->q.'%']])->orWhere([['role', User::ADMIN], ['name', 'like', '%'.$request->q.'%']])->orderBy('role')->paginate(4);
        return view('admin.user.index', $data);
    }

    public function new()
    {
        return view('admin.user.new');
    }

    public function create(AddAccountRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        return $user->save() ? redirect('admin/user')->with('message', 'Thiết lập tài khoản thành công') : view('admin.user.new')->with('message', 'Thiết lập tài khoản không thành công');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('admin.user.edit', $data);
    }

    public function update(EditAccountRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->role = $request->role;
        if ($request->password != $user->password) $user->password = Hash::make($request->password);
        return $user->save() ? redirect('admin/user')->with('message', 'Thiết lập tài khoản thành công') : view('admin.user.edit')->with('message', 'Thiết lập tài khoản không thành công');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        return $user->delete() ? redirect('admin/user')->with('message', 'Xóa tài khoản thành công!') : view('admin.user.index')->with('message-error', 'Xóa tài khoản không thành công!');
    }

    public function profile($id)
    {
        $data['user'] = User::find($id);
        return view('admin.user.profile.index', $data);
    }

    public function updateProfile(EditAccountRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->save();

        return redirect()->back()->with('message', 'Cập nhật thông tin thành công!');
    }

    public function editPassword($id)
    {
        $data['user'] = User::find($id);
        return view('admin.user.profile.edit-password', $data);
    }

    public function updatePassword(EditAccountRequest $request, $id)
    {
        $user = User::find($id);
        if(Hash::check($request->current_password, $user->password))
        {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('admin/user/profile/'.$user->id)->with('message', 'Thay đổi mật khẩu thành công!');
        }
        else return redirect()->back()->with('current_password', 'Mật khẩu hiện tại không chính xác.');
    }
}
