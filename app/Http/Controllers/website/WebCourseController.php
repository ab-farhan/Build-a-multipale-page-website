<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class WebCourseController extends Controller
{
    public function index(){
        $course=Course::orderBy('id', 'DESC')->get();
        return view('website.course',compact('course'));
    }
}
