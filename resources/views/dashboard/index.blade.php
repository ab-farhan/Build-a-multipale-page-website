@extends('layouts.admin_master')
@section('title','Admin Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{$course}}</div>
                        <div class="card-text">Total Course</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{$project}}</div>
                        <div class="card-text">Total Project</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{$service}}</div>
                        <div class="card-text">Total Service</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{$visitor}}</div>
                        <div class="card-text">Total Visitor</div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row pt-4">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{$contact}}</div>
                        <div class="card-text">Total Contact</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{$review}}</div>
                        <div class="card-text">Total Review</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection