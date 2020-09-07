<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class BusinessRecordController extends Controller
{
    public function add(Request $request) {
        $name = $request->name;
        $IDNumber = $request->IDNumber;
        $tel = $request->tel;
        $roomType = $request->roomType;
        $roomID = $request->roomID;
        $price = $request->price;
        $checkInTime = $request->checkInTime;
        $checkOutTime = $request->checkOutTime;
        $totalPrice = $request->totalPrice; 
        $user = DB::select('select * from businessRecord where name = ?',[$name]);
        if($user) {
            return '该用户记录信息已存在！';
        } else {
            DB::insert('insert into businessRecord (name,IDNumber,tel,roomType,roomID,price,checkInTime,checkOutTime,totalPrice) values (?,?,?,?,?,?,?,?,?)',[$name,$IDNumber,$tel,$roomType,$roomID,$price,$checkInTime,$checkOutTime,$totalPrice]);
            return '添加成功！';
        } 
    }
    public function manage(Request $request) {
       $res =  DB::table('businessRecord')->paginate(10);
       if($res == []) {
            return '数据为空，请添加记录后重试！';
       } else {
            return view('businessRecordInfoList',['reasult'=>$res]);
       }
       
    }
    public function delete(Request $request) {
       $id = $request->id;
       $res = DB::delete('delete from businessRecord where id = ?',[$id]);
       if($res) {
            return '删除成功，请返回后刷新！';
        } else {
            return '该条数据已删除，请返回后刷新！';
        }
    }
}
