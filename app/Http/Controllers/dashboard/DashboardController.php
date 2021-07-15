<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // for visitor ip address tracking 
        // $server_Ip= $_SERVER['REMOTE_ADDR'];
        // visitor::insert([
        //     'ip_address'=>$server_Ip,
        //     'created_at'=>Carbon::now()->toDateTimeString(),

        // ]);
        return view('dashboard.index');
    }
}
