@extends('layouts.admin_master')
@section('title','Contact Page')
@section('content')
<div class="container-fluid">
    <div class="row card " id="main_div">
        <div class="col-md-12 card-header">
          <h3 class="d-inline-block mt-2">All Contact Information</h3> 
        </div>
        <div class="col-md-12 card-body">
        <table id="contactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="bg-danger text-white ">
            <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="ContctTable">
            </tbody>
        </table>
        </div>
      </div>
</div>
@endsection