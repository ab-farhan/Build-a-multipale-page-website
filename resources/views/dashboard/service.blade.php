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
            <img class="loading_icon"  src=" {{asset('admin/images/loader.gif')}} " alt="">
        </div>
    </div>

    <div class="row d-none" id="wrong">
        <div class="col-md-12 text-center">
           <h3 class="text-danger mt-5">Somethig went wrong!</h3>
        </div>
    </div>
</div>

<!--  Edit Modal -->
<div class="editmodalHere">
  <div class="modal fade" id="editModal"  aria-labelledby="exampleModalLabel1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Update Service Information </h5>
            <p class="id"></p>
            <button type="button" class="btn " data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
          </div>
        <div class="modal-body p-4">
          <div class="text-center">
            <img id="serviceEditLoader"  class="loading_icon_sm "  src=" {{asset('admin/images/loader.gif')}} " alt="">
          </div>
          <h3 id="serviceEditWrong" class="text-danger d-none">Somethig went wrong!</h3>

          <form id="serviceEditForm" class="d-none">

            <input type="hidden" id="serviceEditID">
            <!-- Email input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="serviceImage">Image</label>
              <input type="text" id="serviceImage" class="form-control" placeholder="Image Link">
            </div>
          
            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="serviceName">Service Name</label>
              <input type="text" id="serviceName" class="form-control" placeholder="Service Name">
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="serviceSrtDes">Service Short Description</label>
              <input type="text" id="serviceSrtDes" class="form-control" placeholder="Short Description">
            </div>
          </form>
          <div class="">
            <button id="serviceEditConfirm"  class="btn btn-success float-right">Update</button>
            <button  class="btn  btn-info float-right" data-dismiss="modal"> Cancel </button>
          
          </div>
        </div>
       
      </div>
    </div>
  </div>
</div>

<!--  Delete Modal -->
<div class="modal fade"  id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2"> </h5>
          <button type="button" class="btn-close " data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
      <div class="modal-body">
        <h4 class="text-center">Do you want to delete?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">
          No
        </button>
        <button data-id="" id="serviceDeleteConfirm" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')
    <script type="text/javascript">
        
getServiceData();
    </script>
@endsection