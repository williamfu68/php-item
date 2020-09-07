<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ForgetPasswordController extends Controller
{
    public function alterUserPassword(Request $request) {
        $userName = $request->userName;
        $pwd = $request->pwd;
        $pwd = encrypt($pwd);
        $user = DB::select('select * from users where userName = ?',[$userName]);
        if($user) {
            session([
                'currentUser'=> ''
            ]);
            DB::update("update users set pwd = '$pwd' where userName = ?",[$userName]);
            return  redirect('/userAlterPasswordInfo');
        } else {
            return '用户不存在！';
        }
    }
    public function alterAdminPassword(Request $request) {
        $userName = $request->userName;
        $pwd = $request->pwd;
        $pwd = encrypt($pwd);
        $user = DB::select('select * from admins where userName = ?',[$userName]);
        if($user) {
            session([
                'currentUser'=> ''
            ]);
            DB::update("update admins set pwd = '$pwd' where userName = ?",[$userName]);
            return  redirect('/adminAlterPasswordInfo');
        } else {
            return '用户不存在！';
        }
    }
}
