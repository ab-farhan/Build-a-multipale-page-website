<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // course page showiing
    public function index(){
        return view('dashboard.course');
    }

    //create new course
    public function create(Request $request){
        $course_name=$request->input('course_name');
        $course_srt_des=$request->input('course_srt_des');
        $course_long_des=$request->input('course_long_des');
        $course_fee=$request->input('course_fee');
        $course_enroll=$request->input('course_enroll');
        $course_class=$request->input('course_class');
        $course_link=$request->input('course_link');
        $course_img=$request->input('course_img');
        
        $create=Course::insert([
            'course_name'=>$course_name,
            'course_sort_des'=>$course_srt_des,
            'course_long_des'=>$course_long_des,
            'course_fee'=>$course_fee,
            'course_total_enroll'=>$course_enroll,
            'course_total_class'=>$course_class,
            'course_link'=>$course_link,
            'course_img'=>$course_img,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        
        if($create){
            return 1;
        }else{
            return 0;
        }
    }

    //get all data from database to showing course page, with axios
    public function getData(){
        $course=Course::all();
        return $course;
    }

    // get single data by id from database, with axios
    public function getSingleData(Request $request){
        $id= $request->input('id');
        $singleCourse=Course::where('id',$id)->get();

        return $singleCourse;
    }

    //updata data to database by id, with axios
    public function CourseUpdate(Request $request){

        $id=$request->input('id');
        $course_name=$request->input('course_name');
        $course_srt_des=$request->input('course_srt_des');
        $course_long_des=$request->input('course_long_des');
        $course_fee=$request->input('course_fee');
        $course_enroll=$request->input('course_enroll');
        $course_class=$request->input('course_class');
        $course_link=$request->input('course_link');
        $course_img=$request->input('course_img');
        
        $update=Course::where('id',$id)->update([
            'course_name'=>$course_name,
            'course_sort_des'=>$course_srt_des,
            'course_long_des'=>$course_long_des,
            'course_fee'=>$course_fee,
            'course_total_enroll'=>$course_enroll,
            'course_total_class'=>$course_class,
            'course_link'=>$course_link,
            'course_img'=>$course_img,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        if($update){
            return 1;
        }else{
            return 0;
        }
    }

    // delete data from database by id, with axios 
    public function deleteData(Request $request){
        $id=$request->input('id');
        $delete=Course::where('id',$id)->delete();

        if($delete){
            return 1;
        }else{
            return 0;
        }
    }
}
