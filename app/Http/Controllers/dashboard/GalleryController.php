<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(){
        return view('dashboard.gallery');
    }

    public function upload(Request $request){
        $photoPath=$request->file('photo')->store('public');
        $host=$_SERVER['HTTP_HOST'];
        $photoName=(explode('/',$photoPath))[1];
        $location="http://".$host."/storage/".$photoName;

        $upload=Gallery::insert([
            'imgLocation'=>$location,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($upload){
            return 1;
        }else{
            return 0;
        }
    }

    public function getPhoto(){
        return Gallery::take(4)->get();
         
    }

    public function getPhotoId(Request $request){
        $FirstId=$request->id;
        $LastId=$FirstId+5;
        return Gallery::where('id','>=',$FirstId)->where('id','<',$LastId)->get();
    }

    public function DeletePhoto(Request $request){
        $oldPhotoUrl=$request->input('oldPhotoUrl');
        $id=$request->input('id');
        $oldPhotoArray=explode('/',$oldPhotoUrl);
        $oldPhotoFile=end($oldPhotoArray);
        $deletePhotoFile=Storage::delete("public/".$oldPhotoFile);
        $deletePhotoData=Gallery::where('id',$id)->delete();

        return $deletePhotoData;

    }

}