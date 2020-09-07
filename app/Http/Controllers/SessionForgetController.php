<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class SessionForgetController extends Controller
{
    public function forget(Request $request) {
        $currentUser = $request->session()->forget('currentUser');
        Log::info("forget控制器中拿到的会话用户是：$currentUser");
        return redirect('/login');
    }
}
