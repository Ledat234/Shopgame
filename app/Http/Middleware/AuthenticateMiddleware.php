<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guest()) {
            // Nếu người dùng chưa đăng nhập, hãy chuyển hướng đến trang đăng nhập
            return redirect('/'); // Thay đổi '/login' thành URL của trang đăng nhập của bạn
        }

        return $next($request);
    }
}
