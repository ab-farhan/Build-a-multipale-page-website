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
<!--  Add new course Modal -->
<div class="addModal">
    <div class="modal fade" id="addNewReviewModal"  aria-labelledby="exampleModal" aria-hidden="true" >
      <div class=" modal-dialog modal-lg  modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-content">
            <div class="modal-header py-lg-2">
              <h4 class="modal-title pt-1 text-info" id="exampleModal">Add Review </h4>
             
              <button type="button" class="btn " data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
            </div>
          <div class="modal-body px-4 pt-2 pb-0">
             <div class="text-center">
              <img id="reviewAddLoader"  class="loading_icon_sm d-none "  src=" {{asset('admin/images/loader.gif')}} " alt="">
            </div>
           {{-- <h3 id="serviceEditWrong" class="text-danger">Somethig went wrong!</h3> --}}
  
            <form id="addNewReviewForm" class="">
              
                <div class="form-outline mb-2">
                    <label class="form-label text-dark" for="reviewAddName"> Name <span class="text-danger">*</span></label>
                    <input type="text" id="reviewAddName" name="name" class="form-control" placeholder="{{old('name')}}">
                    <span class="name d-inline-block mt-1" style="color: red"></span>
                  </div>
                  
                  <div class="form-outline mb-2">
                    <label class="form-label text-dark" for="reviewAddImage"> Image LInk <span class="text-danger">*</span></label>
                    <input type="text" id="reviewAddImage" name="name" class="form-control" placeholder="{{old('name')}}">
                    <span class="img d-inline-block mt-1" style="color: red"></span>
                  </div>
                  
                  <div class="form-outline mb-2">
                    <label class="form-label text-dark" for="reviewAddlongDes">Description <span class="text-danger">*</span></label>
                    <textarea rows="4" id="reviewAddlongDes" class="form-control" name="des" placeholder="{{old('des')}}"></textarea>
                    <span class="des d-inline-block mt-1" style="color: red"></span>
                  </div>

            </form>
            
          </div>
          <div class="modal-footer pr-3 border-none" style="padding:5px 16px; background: #f9f9f9 !important;">
            <button  class="btn btn-md  btn-info " data-dismiss="modal"> Cancel </button>
            <button id="reviewCreateConfirm"  class="btn btn-md btn-success">Save</button>
            
          </div>
        </div>
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
        function getReviewData(){
    axios.get('/dashboard/reviewData')
    .then(function (response){
        //table display none before get data form database
        $('#main_div').removeClass('d-none');
        //loading animation before loading data
        $('#loader').addClass('d-none');
        //destroy data table before loading data and show data properly 
        $('#reviewDataTable').DataTable().destroy();
        // empty table before get data form database
        $('#ReviewTable').empty();
        if(response.status==200){
            // this varaiable for load json data from database
            var jsonData = response.data;
            //jquery loop for shwoing data in table
            $.each(jsonData, function (i) {
              
                $('<tr>').html(
                    "<td> <img class='table-img' src='http://127.0.0.1:8000/admin/" + jsonData[i].img + "'></td>" +
                    "<td>" + jsonData[i].name + "</td>" +
                    "<td width='40%'>" + jsonData[i].des +"</td>" +
                    "<td width='10%'><a data-id='" + jsonData[i].id + "' id='reviewViewDetails'><i class='fas fa-eye text-info'></i></a> <a data-id='" + jsonData[i].id + "' class='reviewEdit px-2'><i class='fas fa-edit'></i></a> <a data-id='" + jsonData[i].id + "' class='reviewDelete'><i class='fas fa-trash text-danger'></i></a></td>"
                ).appendTo('#ReviewTable');
             });

            //couse delete modal shwoing
            $('.reviewDelete').click(function () {
                var id = $(this).data('id');
                $('#reviewDeleteId').html(id);
                $('#reviewDeleteModal').modal('show');
            });

            //update icon click to showin modal and get data from databse for upddate
            $('.reviewEdit').click(function () {
                var id = $(this).data('id');
                $('#reviewUpdataId').html(id)
                $('#updateReviewModal').modal('show')
                reviewSingleData(id)
            });

            // contact  dataTable
            $('#reviewDataTable').DataTable({
                    "order": false,
              });
            $('.dataTables_length').addClass('bs-select');

        }else{
            $('#main_div').addClass('d-none');
            $('#wrong').removeClass('d-none');
        }
    })
    .catch(function(error){
        alert('Custom Error');
    })
}

//delte yes button click to confirm delete
$('#courseDeleteConfirm').click(function(){
    var id = $('#reviewDeleteId').html();
    reviewDelete(id);
});

// delete review
function reviewDelete(id){
    axios.post('/dashboard/reviewDelete',{id:id})
    .then(function(response){
        if(response.data ==1 ){
            $('#reviewDeleteModal').modal('hide');
            toastr.success('Successfully Review Delete');
            getReviewData();
        }else{
            $('#reviewDeleteModal').modal('hide');
            toastr.error('Opps!! Failed To Delete');
            getReviewData();
        }
    })
    .catch(function(error){
        alert('Custom Error')
    })
}

// get reviwe getSingleData
function reviewSingleData(id){
    axios.post('/dashboard/reviewSingleData',{id:id})
    .then(function(response){
        if(response.status==200){
            $('#updateReviewForm').removeClass('d-none')
            $('#ReviewUpdateLoader').addClass('d-none')
            var jsonData = response.data;
            $('#reviewUpdateName').val(jsonData[0].name)
            $('#reviewUpdateImage').val(jsonData[0].img)
            $('#reviewUpdatelongDes').val(jsonData[0].des)
        }else{
            $('#ReviewEditWrong').removeClass('d-none')
            $('#ReviewUpdateLoader').addClass('d-none')
        }
    })
    .catch(function(error){
        alert('Custom Error');
    })
}

// click update button to update data
$('#reviewEditConfirm').click(function(){
    var id=$('#reviewUpdataId').html();
    var Name=$('#reviewUpdateName').val();
    var img=$('#reviewUpdateImage').val();
    var des=$('#reviewUpdatelongDes').val();
    reviewUpdate(id,Name,img,des);
})
//update review
function reviewUpdate(id,Name,img,des){
    if(Name.length==0){
        $('#reviewUpdateName').css('border-color','red');
        $('.name').html('This file is required.')
    }else if(img.length==0){
        $('#reviewUpdateImage').css('border-color','red');
        $('.img').html('This file is required.')
    }else if(des.length==0){
        $('#reviewUpdatelongDes').css('border-color','red');
        $('.des').html('This file is required.')
    }else{
        axios.post('/dashboard/reviewUpdate',{
            id:id,
            name:Name,
            img:img,
            des:des,
        })
        
        .then(function(response){
            $('#ReviewUpdateLoader').removeClass('d-none')
            if(response.data==1){
                $('#ReviewUpdateLoader').addClass('d-none')
                $('#updateReviewModal').modal('hide')
                toastr.success('Successfully Review Updated');
                getReviewData()
            }else{
                toastr.error('Failed to Update Review');
                $('#ReviewUpdateLoader').addClass('d-none')
                $('#ReviewEditWrong').removeClass('d-none')
            }
        })
        .catch(function(error){
            alert('Custom Error')
            
        })
    }
    
}
//click add reivew button to show insert modal
$('#addReview').click(function(){
    $('#addNewReviewModal').modal('show');
})
//save button click to create review
$('#reviewCreateConfirm').click(function(){
    var name = $('#reviewAddName').val();
    var img  = $('#reviewAddImage').val();
    var des  = $('#reviewAddlongDes').val();
    reviewCreate(name,img,des)
})
//create review
function reviewCreate(name,img,des){
    if(name.length==0){
        $('#reviewAddName').css('border-color', 'red');
        $('.name').html('This Field is Required')
    }else if(img.length==0){
        $('#reviewAddImage').css('border-color', 'red');
        $('.img').html('This Field is Required')
    }else if(des.length==0){
        $('#reviewAddlongDes').css('border-color', 'red');
        $('.des').html('This Field is Required')
    }else{
        axios.post('/dashboard/reviewCreate',{
            name:name,
            img:img,
            des:des,
        })
        .then(function(response){
            $('#reviewAddLoader').removeClass('d-none');
            if(response.data == 1){
                $('#reviewAddLoader').addClass('d-none');
                $('#addNewReviewModal').modal('hide');
                toastr.success('Successfully Create Review');
                getReviewData();
            }else{
                toastr.error('Failed To Create Review');
                getReviewData();
            }
        })
        .catch(function(error){
            alert('Custom Error')
        })
    }
    
}
    </script>
@endsection