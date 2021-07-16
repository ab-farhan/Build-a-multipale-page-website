<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services;

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
}
