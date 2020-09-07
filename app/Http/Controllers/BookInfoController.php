<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class BookInfoController extends Controller
{
    public function customerBook(Request $request) {
        $name = $request->name;
        $sex = $request->sex;
        $age = $request->age;
        $tel = $request->tel;
        $IDNumber = $request->IDNumber;
        $roomType = $request->roomType;
        $roomID = $request->roomID;
        $bookTime = $request->bookTime;
        $checkOutTime = $request->checkOutTime;
        $user = DB::select("select * from customerBookInfo where name = '$name'");
        if($user) {
            return '您已成功预订，请勿重复操作！';
        } else {
            DB::insert("insert into customerBookInfo (name,sex,age,tel,IDNumber,roomType,roomID,bookTime,checkOutTime) values (?,?,?,?,?,?,?,?,?)",[$name,$sex,$age,$tel,$IDNumber,$roomType,$roomID,$bookTime,$checkOutTime]);
            return '预订成功！';
        }
    }
    public function memberBook(Request $request) {
        $name = $request->name;
        $sex = $request->sex;
        $age = $request->age;
        $tel = $request->tel;
        $IDNumber = $request->IDNumber;
        $roomType = $request->roomType;
        $roomID = $request->roomID;
        $bookTime = $request->bookTime;
        $checkOutTime = $request->checkOutTime;
        $user = DB::select("select * from memberBookInfo where name = '$name'");
        if($user) {
            return '您已成功预订，请勿重复操作！';
        } else {
            DB::insert("insert into memberBookInfo (name,sex,age,tel,IDNumber,roomType,roomID,bookTime,checkOutTime) values (?,?,?,?,?,?,?,?,?)",[$name,$sex,$age,$tel,$IDNumber,$roomType,$roomID,$bookTime,$checkOutTime]);
            return '预订成功！';
        }
    }
    public function customerQuery(Request $request) {
        $name = $request->name;
        $user = DB::select("select * from customerBookInfo where name = ?",[$name]);
        if($user == []) {
            return '没有该用户的预订信息！';
        } else {
            return view('/customerBookInfoList2',['reasult'=>$user]);
        }  
    }
    public function memberQuery(Request $request) {
        $name = $request->name;
        $user = DB::select("select * from memberBookInfo where name = ?",[$name]);
        if($user == []) {
            return '没有该会员的预订信息！';
        } else {
            return view('/memberBookInfoList2',['reasult'=>$user]);
        }  
    }
    public function cancelCustomerBookInfo(Request $request) {
        $id = $request->id;
        $res = DB::delete('delete from customerBookInfo where id = ?',[$id]);
        if($res) {
            return '删除成功，请返回后刷新！';
        } else {
            return '该条数据已删除，请返回后刷新！';
        }
    } 
    public function cancelMemberBookInfo(Request $request) {
        $id = $request->id;
        // Log::info($id);
        DB::delete('delete from memberBookInfo where id = ?',[$id]);
        return '操作成功！';
    } 
    public function allCustomerBookInfo(Request $request) {
        $res = DB::table('customerBookInfo')->paginate(10);
        return view('customerBookInfoList',['reasult'=>$res]);
    } 
    public function allMemberBookInfo(Request $request) {
        $res = DB::table('memberBookInfo')->paginate(10);
        return view('memberBookInfoList',['reasult'=>$res]);
    } 
}
