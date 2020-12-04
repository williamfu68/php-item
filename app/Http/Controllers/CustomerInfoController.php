<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class CustomerInfoController extends Controller
{
    public function add(Request $request) {
        $name = $request->name;
        $sex = $request->sex;
        $age = $request->age;
        $address = $request->address;
        $tel = $request->tel;
        $IDNumber = $request->IDNumber;
        $checkInTime = $request->checkInTime;
        $checkOutTime = $request->checkOutTime;
       
        $user = DB::select("select * from customerInfo where name = '$name'");
        // Log::info($user);
        if($user) {
            return '用户已存在！';
        } else {
            DB::insert("insert into customerInfo (name,sex,age,address,tel,IDNumber,checkInTime,checkOutTime) values (?,?,?,?,?,?,?,?)",[$name,$sex,$age,$address,$tel,$IDNumber,$checkInTime,$checkOutTime]);
            return '添加成功！';
        }
    }
    public function query(Request $request) {
        $name = $request->name;
        $user = DB::select('select * from customerInfo where name = ?',[$name]);
        if($user == []) {
            return '数据库中没有该用户信息！';
        } else {
            return view('/customerInfoList2',['reasult'=>$user]);
        }   
    }
    public function update(Request $request) {
        $name = $request->name;
        $checkOutTime = $request->checkOutTime;
        // Log::info($checkOutTime);
        $user = DB::select('select * from customerInfo where name = ?',[$name]);
        if($user) {
            DB::update("update customerInfo set checkOutTime = '$checkOutTime' where name = '$name'");
            return '更新成功！';
        } else {
            return '用户不存在！';
        }
    }
    public function all(Request $request) {
        $res = DB::table('customerInfo')->paginate(10);
        if($res == []) {
            return '数据库中没有数据！';
        } else {
            return view('customerInfoList',['reasult'=>$res]);
        } 
    }
    public function delete(Request $request) {
        $id = $request->id;
        $res = DB::delete("delete from customerInfo where id = ?",[$id]);
        if($res) {
            return '删除成功，请返回后刷新！';
        } else {
            return '该条数据已删除，请返回后刷新！';
        }
    }
    public function deleteAll(Request $request) {
        $res = DB::delete("delete * from customerInfo");
        if($res) {
            return '已删除所有数据，请返回后刷新！';
        } else {
            return '所有数据已删除，请返回后刷新！';
        }
    }
    public function queryHousingRoomInfo(Request $request) {
       $res =  DB::table('customerinfo')->paginate(10);
       return view('HousingRoomInfoList',['reasult' => $res]);
    } 
}
