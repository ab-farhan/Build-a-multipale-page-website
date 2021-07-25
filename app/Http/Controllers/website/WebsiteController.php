<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Project;
use App\Models\Review;
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
        $courses=Course::orderBy('id')->limit(6)->get();
        // get projects
        $projects=Project::orderBy('id')->limit(4)->get();
        $review=Review::orderBy('id',)->limit(4)->get();
        return view('website.index',compact('services','courses','projects','review'));
    }
    
    public function contact(Request $request){
        $name=$request->input('name');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $msg=$request->input('msg');

        $contact=Contact::insert([
            'contact_name'=>$name,
            'contact_phone'=>$phone,
            'contact_email'=>$email,
            'contact_msg'=>$msg,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        if($contact){
            return 1;
        }else{
            return 0;
        }
    }
}
