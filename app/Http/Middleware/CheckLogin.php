<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Models\User;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if (Auth::user()->role == User::SUPERADMIN)
                return redirect('admin/dashboard');
            elseif (Auth::user()->role == User::ADMIN)
                return redirect('admin/category');
            else
                return redirect()->back();
        }
        return $next($request);
    }
}
