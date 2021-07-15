@extends('layouts.web_master')
@section('title','Home Page')
@section('content')
    @include('website.component.banner')
    @include('website.component.service')
    @include('website.component.course')
    @include('website.component.project')
    @include('website.component.contact')
    @include('website.component.recentBlog')
    @include('website.component.review')

@endsection