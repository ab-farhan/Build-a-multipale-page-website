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
}
