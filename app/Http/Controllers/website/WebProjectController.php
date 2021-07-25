<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class WebProjectController extends Controller
{
    public function index(){
        $project=Project::orderby('id','DESC')->get();
        return view('website.project',compact('project'));
    }
}
