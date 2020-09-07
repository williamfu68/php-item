<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class UserInfoController extends Controller
{
    public function query(Request $request) {
        $res = DB::table('users')->paginate(10);
        if($res == []) {
            return '数据库中没有数据！';
        } else {
            return view('user.userInfo',['reasult'=>$res]);
        }
    }
    public function delete(Request $request) {
        $id = $request->id;
        $res = DB::delete('delete from users where id = ?',[$id]);
        if($res) {
            return '删除成功，请返回后刷新！';
        } else {
            return '该条数据已删除，请返回后刷新！';
        }
        
    }
}
