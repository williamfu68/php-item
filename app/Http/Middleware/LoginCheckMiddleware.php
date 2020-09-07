<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Log;

class LoginCheckMiddleware
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
        $path = $request->path();
        Log::debug("当前用户访问了$path");

        $currentUser = session('currentUser');
        Log::debug("中间件中的当前用户是:$currentUser");

        $token = session('token');
        if($currentUser == '') {
            if($path == 'login' || $path == 'register' || 
            $path == 'userCheck' || $path == 'adminCheck' || 
            $path == 'register/users' || $path == 'register/admins' ||
            $path == 'userRegisterInfo' || $path == 'adminRegisterInfo' ||
            $path == 'userAlreadyExist' || $path == 'adminAlreadyExist' ||
            $path == 'userForgetPassword' || $path == 'adminForgetPassword' ||
            $path == 'userAlterPasswordInfo' || $path == 'adminAlterPasswordInfo' ||
            $path == 'alterUserPassword' || $path == 'alterAdminPassword' ||
            $path == 'userResetPassword' || $path == 'adminResetPassword' ||
            $path == 'userResetPasswordInfo' || $path == 'adminResetPasswordInfo'
            ) {
            
            } else {
                return redirect('/login');
            }      
        } else if($currentUser != '') {
            $page = session('page');
            // Log::info($page);
            if($page == 'userPage') {
                if($path == 'adminPage') {
                    return \redirect('/userPage');
                }
            }  else if($page == 'adminPage') {
                if($path == 'userPage') {
                    return \redirect('/adminPage');
                }
            } else {

            }
        }
        else {

        }
        return $next($request);
    }
}
