<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function userAdd(Request $request) {
        $userName = $request->input('userName');
        $pwd = $request->input('pwd');
        $sex = $request->input('sex');
        $age = $request->input('age');
        $email = $request->input('email');
        Log::debug("用户注册的用户名是：$userName");
        Log::debug("用户注册的密码是：$pwd");
        $sameUser = DB::select("select * from users where userName = ?",[$userName]);
        $sameEmail = DB::select("select * from users where email = ?",[$email]);
        // Log::debug($user);
        if($sameUser) {
            return redirect('/userAlreadyExist');
        } else if($sameEmail){
            return '该邮箱已被注册，请更改后重试！';
        } else {
            DB::insert('insert into users (userName,pwd,sex,age,email) values (?,?,?,?,?)',[$userName,encrypt($pwd),$sex,$age,$email]);
            session([
                'user'=>$userName,
                'pwd'=>$pwd
            ]);
            return redirect('/userRegisterInfo');
        }
       
    }
    public function adminAdd(Request $request) {
        $userName = $request->input('userName');
        $pwd = $request->input('pwd');
        $sex = $request->input('sex');
        $age = $request->input('age');
        $email = $request->input('email');
        Log::debug("管理员注册的用户名是：$userName");
        Log::debug("管理员注册的密码是：$pwd");
        $sameUser = DB::select("select * from admins where userName = ?",[$userName]);
        $sameEmail = DB::select("select * from admins where email = ?",[$email]);
        if($sameUser) {
            return redirect('/adminAlreadyExist');
        } else if($sameEmail){
            return '该邮箱已被注册，请更改后重试！';
        } else {
            DB::insert('insert into admins (userName,pwd,sex,age,email) values (?,?,?,?,?)',[$userName,encrypt($pwd),$sex,$age,$email]);
            session([
                'user'=>$userName,
                'pwd'=>$pwd
            ]);
            return redirect('/adminRegisterInfo');
        }
    }
}
