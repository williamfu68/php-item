<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class ResetPasswordController extends Controller
{
    public function userResetPassword(Request $request) {
        $sex = $request->sex;
        $age = $request->age;
        $email = $request->email;
        $userName = $request->userName;
        $pwd = $request->pwd;
        $user = DB::select("select * from users where sex = ? and age = ? and email = ?",[$sex,$age,$email]);
        if($user) {
            DB::update("update users set userName = ?,pwd = ? where sex = ? and age = ? and email = ?",[$userName,encrypt($pwd),$sex,$age,$email]);
            return redirect('/userResetPasswordInfo');
        } else {
            return '数据库中没有和您提交的信息相匹配的用户！';
        }
    }
    public function adminResetPassword(Request $request) {
        $sex = $request->sex;
        $age = $request->age;
        $email = $request->email;
        $userName = $request->userName;
        $pwd = $request->pwd;
        $user = DB::select("select * from admins where sex = ? and age = ? and email = ?",[$sex,$age,$email]);
        if($user) {
            DB::update("update admins set userName = ?,pwd = ? where sex = ? and age = ? and email = ?",[$userName,encrypt($pwd),$sex,$age,$email]);
            return redirect('/adminResetPasswordInfo');
        } else {
            return '数据库中没有和您提交的信息相匹配的用户！';
        }
    }
}
