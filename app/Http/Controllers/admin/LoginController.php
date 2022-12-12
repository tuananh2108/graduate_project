<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
  public function GetLogin()
  {
    return view('admin.login.login');
  }

  public function PostLogin(LoginRequest $request)
  {
    $email=$request->email;
    $pass=$request->password;

    if (Auth::attempt(['email' =>  $email, 'password' => $pass]))
      return Auth::user()->role == USER::SUPERADMIN ? redirect('admin/dashboard') : redirect('admin/category');
    else
      return redirect()->back()->withInput()->with('message', 'Tài khoản hoặc mật khẩu không chính xác!');
  }

  public function Logout()
  {
    Auth::logout();
    return redirect('login');
  }
}
