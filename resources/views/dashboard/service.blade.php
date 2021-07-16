@extends('layouts.admin_master')
@section('title','Service Page')
@section('content')
<div class="container-fluid">
    <div class="row d-none" id="main_div">
    <div class="col-md-12">
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead class="bg-danger text-white ">
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Description</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody id="serviceTable">
     

        
      </tbody>
    </table>
    
    </div>
    </div>

    <div class="row" id="loader" style="margin-top:200px;">
        <div class="col-md-12 text-center">
            <img class="loading_icon"  src=" {{asset('admin/images/loader.svg')}} " alt="">
        </div>
    </div>

    <div class="row d-none" id="wrong">
        <div class="col-md-12 text-center">
           <h3 class="text-danger mt-5">Somethig went wrong!</h3>
        </div>
    </div>
</div>

@endsection


@section('script')
    <script type="text/javascript">
        
getServiceData();
    </script>
@endsection