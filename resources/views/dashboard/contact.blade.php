@extends('layouts.admin_master')
@section('title','Contact Page')
@section('content')
<div class="container-fluid">
    <div class="row card d-none" id="main_div">
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
              {{-- <tr>
                <td class="name"></td>
                <td class="email"></td>
                <td class="msg"></td>
                <td class="action"></td>
              </tr> --}}
            </tbody>
        </table>
        </div>
      </div>
      <div class="row" id="loader" style="margin-top:200px;">
        <div class="col-md-12 text-center">
            <img class="loading_icon"  src=" {{asset('admin/images/loader.gif')}} " alt="">
        </div>
    </div>
    <div class="row d-none" id="wrong">
      <div class="col-md-12 text-center">
         <h3 class="text-danger mt-5">Somethig went wrong!</h3>
      </div>
  </div>
</div>
<!--  Delete Modal -->
<div class="modal fade"  id="contactdeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" >
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-content">
        <div class="modal-header ">
          <h4 class="text-white" ></h4>
          <h3 id="contactDeleteId" class="d-none"></h3>
          <button type="button" class="btn btn-white" data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
        </div>
      <div class="modal-body my-3">
        <h3 class="text-center mb-0">Do you want to delete?</h3>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-md btn-success" data-dismiss="modal">
          No
        </button>
        <button id="contactDeleteConfirm" type="button" class="btn btn-md ml-3 btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script>
       getContactData();
    </script>
@endsection