<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
class PersonalInfoController extends Controller
{
    public function queryUser(Request $request) {
        $userName = session('currentUser');
        $res = DB::select("select * from users where userName = ?",[$userName]);
        if($res) {
            return view('user.userPersonalInfoList',['reasult'=>$res]);
        } else {
            return redirect('/login');
        } 
    }
    public function deleteUser(Request $request) {
        $id = $request->id;
        $user = DB::select('select * from users where id = ?',[$id]);
        if($user) {
            DB::delete('delete from users where id = ?',[$id]);
            $request->session()->forget('currentUser');
            return redirect('/login');
        } else {
            return redirect('/login');
        }  
    }
    public function alterUser(Request $request) {
        $pwd = encrypt($request->pwd);
        $email = $request->email; 
        $userName = session('currentUser');
        DB::update("update users set pwd = ?,email = ? where userName = ?",[$pwd,$email,$userName]);
        return '修改成功！';
    }
    public function queryAdmin(Request $request) {
        $userName = session('currentUser');
        $res = DB::select("select * from admins where userName = ?",[$userName]);
        if($res) {
            return view('admin.adminPersonalInfoList',['reasult'=>$res]);
        } else {
            return redirect('/login');
        } 
    }
    public function deleteAdmin(Request $request) {
        $id = $request->id;
        $user = DB::select('select * from admins where id = ?',[$id]);
        if($user) {
            DB::delete('delete from admins where id = ?',[$id]);
            $request->session()->forget('currentUser');
            return redirect('/login');
        } else {
            return redirect('/login');
        }  
    }
    public function alterAdmin(Request $request) {
        $pwd = encrypt($request->pwd);
        $email = $request->email; 
        $userName = session('currentUser');
        DB::update("update admins set pwd = ?,email = ? where userName = ?",[$pwd,$email,$userName]);
        return '修改成功！';
    }
}
