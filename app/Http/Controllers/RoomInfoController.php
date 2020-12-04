<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class RoomInfoController extends Controller
{
    public function query(Request $request) {
        $roomType = $request->roomType;
        $reasult = DB::select("select * from roomInfo where roomType = '$roomType'");
        if($reasult) {
            return view('roomInfoList2',['reasult'=>$reasult]);
        } else {
            return 'null';
        }
    }
    public function all(Request $request) {
        // $res = DB::select("select * from roomInfo");
        $res = DB::table('roomInfo')->paginate(10);
        if($res == []) {
            return '数据库中没有数据！';
        } else {
            return view(' roomInfoList',['reasult'=>$res]);
        } 
    }
    public function queryEmptyRoomInfo(Request $request) {
        $res = DB::table('roomInfo')->where('status','=','空房')->paginate(10);
        return view('EmptyRoomInfoList',['reasult'=>$res]);
    }
    public function add(Request $request) {
        $roomType = $request->roomType;
        $price = $request->price;
        $roomID = $request->roomID;
        $status = $request->status;
        $description = $request->description;
        $res = DB::select('select * from roomInfo where roomID = ?',[$roomID]);
        if($res) {
            return '房间号重复，请更改后重试！';
        } else {
            DB::insert ('insert into roomInfo (roomType,price,roomID,status,description) values (?,?,?,?,?)',[$roomType,$price,$roomID,$status,$description]);
            return '添加成功！';
        }  
    }
    public function delete(Request $request) {
        $id = $request->id;
        DB::delete('delete from roomInfo where id = ?',[$id]);
        if($res) {
            return '删除成功，请返回后刷新！';
        } else {
            return '该条数据已删除，请返回后刷新！';
        }
    }
    public function deleteAll(Request $request) {
        DB::delete('delete from roomInfo');
        if($res) {
            return '已删除所有数据，请返回后刷新！';
        } else {
            return '所有数据已删除，请返回后刷新！';
        }
    }
    public function alter(Request $request) {
        $roomType = $request->roomType;
        $price = $request->price;
        $roomID = $request->roomID;
        $status = $request->status;
        $description = $request->description;
        $res = DB::select('select * from roomInfo where roomID = ?',[$roomID]);
        if($res == []) {
            return '该房间号不存在！';
        } else {
            DB::update('update roomInfo set roomType = ?,price = ?,status = ?,description = ? where roomID = ?',[$roomType,$price,$status,$description,$roomID]);
            return '修改成功！';
        }

    }
}
