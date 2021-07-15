<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\visitor;

class VisitorController extends Controller
{
    public function index(){
        $visitorData=visitor::orderBy('id','DESC')->take(100)->get();
        return view('dashboard.visitor',compact('visitorData'));
    }
}
