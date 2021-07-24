@extends('layouts.admin_master')
@section('title','Review Page')
@section('content')
<div class="container-fluid">
    <div class="row card d-none" id="main_div">
        <div class="col-md-12 card-header">
          <h3 class="d-inline-block mt-2">All Review Information</h3> <button id="addReview"  type="button" class="btn btn-sm btn-success float-right" style="padding:10px 15px;"><i class="fas fa-plus-circle"> Add Review</i></button>
        </div>
        <div class="col-md-12 card-body">
        <table id="reviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="bg-danger text-white ">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Descripton</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="ReviewTable">
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
<!--  update course Modal -->
<div class="update"> 
    <div class="modal fade" id="updateReviewModal"  aria-labelledby="example" aria-hidden="true" >
      <div class=" modal-dialog modal-lg  modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-content">
            <div class="modal-header py-lg-2">
              <h4 class="modal-title pt-1 text-info" id="example">Update Review Information </h4>
             
              <button type="button" class="btn " data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
            </div>
          <div class="modal-body px-4 pt-2 pb-0">
             <div class="text-center">
              <img id="ReviewUpdateLoader"  class="loading_icon_sm  "  src=" {{asset('admin/images/loader.gif')}} " alt="">
            </div>
           <h3 id="ReviewEditWrong" class="text-danger text-center d-none py-5">Somethig went wrong!</h3> 
  
            <form id="updateReviewForm" class="d-none">
              <p id="reviewUpdataId" class="d-none"></p>
              <div class="form-outline mb-2">
                <label class="form-label text-dark" for="reviewUpdateName"> Name <span class="text-danger">*</span></label>
                <input type="text" id="reviewUpdateName" name="name" class="form-control" placeholder="{{old('name')}}">
                <span class="name d-inline-block mt-1" style="color: red"></span>
              </div>
              
              <div class="form-outline mb-2">
                <label class="form-label text-dark" for="reviewUpdateImage"> Image LInk <span class="text-danger">*</span></label>
                <input type="text" id="reviewUpdateImage" name="name" class="form-control" placeholder="{{old('name')}}">
                <span class="img d-inline-block mt-1" style="color: red"></span>
              </div>
              
              <div class="form-outline mb-2">
                <label class="form-label text-dark" for="reviewUpdatelongDes">Description <span class="text-danger">*</span></label>
                <textarea rows="4" id="reviewUpdatelongDes" class="form-control" name="des" placeholder="{{old('des')}}"></textarea>
                <span class="des d-inline-block mt-1" style="color: red"></span>
              </div>
              
            </form>
            
          </div>
          <div class="modal-footer pr-3 border-none" style="padding:5px 16px; background: #f9f9f9 !important;">
            <button  class="btn btn-md  btn-info " data-dismiss="modal"> Cancel </button>
            <button id="reviewEditConfirm"  class="btn btn-md btn-success">Save</button>
            
          </div>
        </div>
      </div>
    </div>
  </div>
<!--  Delete Modal -->
<div class="modal fade"  id="reviewDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" >
    <div class="modal-dialog ">
      <div class="modal-content ">
        <div class="modal-content">
          <div class="modal-header ">
            <h4 class="text-white" ></h4>
            <h3 id="reviewDeleteId" class="d-none"></h3>
            <button type="button" class="btn btn-white" data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
          </div>
        <div class="modal-body my-3">
          <h3 class="text-center mb-0">Do you want to delete?</h3>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-md btn-success" data-dismiss="modal">
            No
          </button>
          <button id="courseDeleteConfirm" type="button" class="btn btn-md ml-3 btn-danger">Yes</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        getReviewData();
    </script>
@endsection