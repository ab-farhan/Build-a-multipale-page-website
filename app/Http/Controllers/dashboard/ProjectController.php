<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\ElementNode;

class ProjectController extends Controller
{
    public function index(){
        return view('dashboard.project');
    }

    public function create(Request $request){

        $project_name=$request->input('project_name');
        $project_sort_des=$request->input('project_srt_des');
        //$project_long_des=$request->input('project_long_des');
        $project_link=$request->input('project_link');
        $project_img=$request->input('project_img');

        $project=Project::insert([
            'project_name'=>$project_name,
            'project_sort_des'=>$project_sort_des,
            //'project_long_des'=>$project_long_des,
            'project_link'=>$project_link,
            'project_img'=>$project_img,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($project){
            return 1;
        }else{
            return 0;
        }
    }

    public function ProjectUpdate(Request $request){
        
        $id=$request->input('id');
        $project_name=$request->input('project_name');
        $project_sort_des=$request->input('project_srt_des');
        //$project_long_des=$request->input('project_long_des');
        $project_link=$request->input('project_link');
        $project_img=$request->input('project_img');

        $project=Project::where('id',$id)->update([
            'project_name'=>$project_name,
            'project_sort_des'=>$project_sort_des,
            //'project_long_des'=>$project_long_des,
            'project_link'=>$project_link,
            'project_img'=>$project_img,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($project){
            return 1;
        }else{
            return 0;
        }
    }

    public function getData(){
        $project=Project::orderBy('id')->get();
        return $project;
    }

    public function getSingleData(Request $request){
        $id=$request->input('id');
        $project=Project::where('id',$id)->get();
        return $project;
    }

    public function deleteData(Request $request){
        $id=$request->input('id');
        $delete=Project::where('id',$id)->delete();

        if($delete){
            return 1;
        }else{
            return 0;
        }
    }

    public function delete(Request $request){
        $id=$request->input('id');
        $result=Project::where('id',$id)->delete();
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
}
