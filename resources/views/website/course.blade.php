@extends('layouts.web_master')
@section('title','Course || Page')
@section('content')
<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
                <img class=" page-top-img fadeIn" src="{{asset('website/images/knowledge.svg')}}">
                <h1 class="page-top-title mt-3">- অনলাইন কোর্স সমূহ -</h1>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        @foreach ($course as $data)
        <div class="col-md-4 p-1 text-center">
            <div class="card">
                <div class="text-center">
                    <img class="img-fluid" src="{{asset('/'.$data->course_img)}}" alt="Card image cap">
                    <h5 class="service-card-title mt-4">{{$data->course_name}}</h5>
                    <h6 class="service-card-subTitle px-2">{{$data->course_sort_des}}</h6>
                    <h6 class="service-card-subTitle px-2">{{$data->course_fee}} {{$data->course_total_class}} </h6>
                    <a href="{{url($data->course_link)}}" class="normal-btn-outline mt-2 mb-4 btn">শুরু করুন </a>
                </div>
            </div>
        </div>
        @endforeach
        


    </div>
</div>
@endsection