<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\visitor;
use Carbon\Carbon;
use App\Models\services;

class WebsiteController extends Controller
{
    public function index(){
        // for visitor ip address tracking 
        $server_Ip= $_SERVER['REMOTE_ADDR'];
        visitor::insert([
            'ip_address'=>$server_Ip,
            'created_at'=>Carbon::now()->toDateTimeString(),

        ]);
        
        $services=services::orderBy('id','ASC')->take(4)->get();
        return view('website.index',compact('services'));
    }
}
