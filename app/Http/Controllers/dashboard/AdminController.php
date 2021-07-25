<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    public function index(){
        return view('dashboard.login');
    }

    public function onLogin(Request $request){
        $username=$request->input('user');
        $pass=$request->input('pass');
        $login=Admin::where('username','=',$username)->where('password','=',$pass)->count();
       
        if($login == 1){
           $request->session()->put('admin',$username);
           return 1;
        }else{
            return 0;
        }
    }

    public function onLogOut(Request $request){
        $request->session()->flush();
        return redirect('/adminlogin');
    }
}
