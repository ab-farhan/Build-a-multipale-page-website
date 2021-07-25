<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Project;
use App\Models\Review;
use App\Models\services;
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
        $visitor=visitor::count();
        $course=Course::count();
        $project=Project::count();
        $contact=Contact::count();
        $service=services::count();
        $review=Review::count();
        return view('dashboard.index',compact('visitor','course','project','contact','service','review'));
    }
}
