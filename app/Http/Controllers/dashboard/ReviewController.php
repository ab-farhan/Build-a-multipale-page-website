<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        return view('dashboard.review');
    }

    public function getData(){
        $review=Review::all();
        return $review;
    }

    public function getSingleData(Request $request){
        $id=$request->input('id');
        $data=Review::where('id',$id)->get();
        return $data;

    }

    public function create(Request $request){
        $name=$request->input('name');
        $img=$request->input('img');
        $des=$request->input('des');
        
        $create=Review::insert([
            'name'=>$name,
            'des'=>$des,
            'img'=>$img,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($create){
            return 1;
        }else{
            return 0;
        }
    }

    public function update(Request $request){
        $id=$request->input('id');
        $name=$request->input('name');
        $img=$request->input('img');
        $des=$request->input('des');
        $update=Review::where('id',$id)->update([
            'name'=>$name,
            'img'=>$img,
            'des'=>$des,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            return 1;
        }else{
            return 0;
        }
    }

    public function delete(Request $request){
        $id=$request->input('id');
        $delete=Review::where('id',$id)->delete();

        if($delete){
            return 1;
        }else{
            return 0;
        }
    }
}
