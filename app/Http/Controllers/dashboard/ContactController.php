<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('dashboard.contact');
    }

    public function getData(){
        $contact=Contact::orderBy('id','DESC')->get();
        return $contact;
    }

    public function delete(Request $request){
        $id= $request->input('id');
        $delete=Contact::where('id',$id)->delete();
        if($delete){
            return 1;
        }else{
            return 0;
        }
    }
}
