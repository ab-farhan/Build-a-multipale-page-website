<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);
        //get couses
        $services=services::orderBy('id','ASC')->take(4)->get();
        //get services
        $courses=Course::orderBy('id','DESC')->limit(6)->get();
        return view('website.index',compact('services','courses'));
    }
}
