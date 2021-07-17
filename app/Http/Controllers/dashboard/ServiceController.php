<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function index(){
        // $services= services::get();
        return view('dashboard.service');
    }
    public function getData(){
        $services= services::all();
        return $services;
    }

    public function deleteData(Request $request){

        $id=$request->input('id');
        $result=services::where('id','=',$id)->delete();

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
    public function getSingleData(Request $request){
        $id=$request->input('id');
        $result = services::where('id','=',$id)->get();
        return $result;
    }

    public function serviceUpdate(Request $request){

        $id=$request->input('id');
        $name=$request->input('name');
        $des=$request->input('des');
        $img=$request->input('img');

        $result=services::where('id','=',$id)->update([
            'service_name'=>$name,
            'service_sort_des'=>$des,
            'service_img'=>$img,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
