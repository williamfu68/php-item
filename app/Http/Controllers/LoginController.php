<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function userCheck(Request $request) {
        $userName = $request->userName;
        $pwd = $request->pwd;
        Log::debug("控制器中的用户是：$userName");
        Log::debug("控制器中的密码是：$pwd");
        $user = DB::select("select * from users where userName = '$userName'");
        Log::debug($user);
        
        if($user) {
            $db_pwd = $user[0]->pwd;
            // Log::info($db_pwd);
            // Log::info(encrypt($pwd));
            if($pwd == decrypt($db_pwd)) {
                $request->session()->forget('currentUser');
                session([
                    'currentUser'=>$userName,
                    'msg'=>'登录成功！',
                    'page'=>'userPage'
                ]);
            } else {
                return '密码错误！';
            }
            return redirect('/userPage');
        } else {
            return '用户不存在！';
        }
    }
    public function adminCheck(Request $request) {
        $userName = $request->userName;
        $pwd = $request->pwd;
        Log::debug("控制器中的用户是：$userName");
        Log::debug("控制器中的密码是：$pwd");
        $user = DB::select("select * from admins where userName = '$userName'");
        // Log::debug($user);
        if($user) {
            $db_pwd = $user[0]->pwd;
            if($pwd == decrypt($db_pwd)) {
                $request->session()->forget('currentUser');
                session([
                    'currentUser'=>$userName,
                    'msg'=>'登录成功！',
                    'page'=>'adminPage'
                ]);
            } else {
                return '密码错误！';
            }
            return redirect('/adminPage');
        } else {
            return '用户不存在！';
        }
    }
}
