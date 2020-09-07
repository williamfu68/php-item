<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MemberInfoController extends Controller
{
    public function register (Request $request) { 
        $name = $request->name;
        $sex = $request->sex;
        $age = $request->age;
        $address = $request->address;
        $email = $request->email;
        $tel = $request->tel;
        $IDNumber = $request->IDNumber;
        $registrationTime = $request->registrationTime;
        $deadline = $request->deadline;
        $user = DB::select("select * from memberInfo where name = ?",[$name]);
        if($user) {
            return '该用户已存在！';
        } else {
            DB::insert('insert into memberInfo (name,sex,age,address,email,tel,IDNumber,registrationTime,deadline) values (?,?,?,?,?,?,?,?,?)',
            [$name,$sex,$age,$address,$email,$tel,$IDNumber,$registrationTime,$deadline]);
            return '注册成功！';
        }
    }
    public function query(Request $request) {
        $name = $request->name;
        $user = DB::select("select * from memberInfo where name = ?",[$name]);
        if($user == []) {
            return '数据库中没有该会员信息！';
        } else {
            return view('/memberInfoList2',['reasult'=>$user]);
        } 
    }
    public function delete(Request $request) {
        $id = $request->id;
        $res = DB::delete("delete from memberInfo where id = ?",[$id]);
        if($res) {
            return '删除成功，请返回后刷新！';
        } else {
            return '该条数据已删除，请返回后刷新！';
        }
    }
    public function all(Request $request) {
        $res = DB::table('memberInfo')->paginate(10);
        
        if($res == []) {
            return '数据库中没有数据！';
        } else {
            return view('memberInfoList',['reasult'=>$res]);
        } 
    }
    public function alter(Request $request) {
        $name = $request->name;
        $sex = $request->sex;
        $age = $request->age;
        $address = $request->address;
        $email = $request->email;
        $tel = $request->tel;
        $IDNumber = $request->IDNumber;
        $registrationTime = $request->registrationTime;
        $deadline = $request->deadline;
        $user = DB::select('select * from memberinfo where name = ?',[$name]);
        if($user) {
            DB::update("update memberinfo set sex = ?,age = ?,address = ?,email = ?,tel = ?,IDNumber = ?,registrationTime = ?,deadline = ? where name = ?",[$sex,$age,$address,$email,$tel,$IDNumber,$registrationTime,$deadline,$name]);
            return '修改成功！';
        } else {
            return '该用户不存在！';
        }
       
    }
}
