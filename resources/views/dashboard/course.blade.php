@extends('layouts.admin_master')
@section('title','Course Page')
@section('content')
<div class="container-fluid">
  
    <div class="row card d-none" id="main_div">
      <div class="col-md-12 card-header">
        <h3 class="d-inline-block mt-2">All Courses Information</h3> <button id="addCourse"  type="button" class="btn btn-sm btn-success float-right" style="padding:10px 15px;"><i class="fas fa-plus-circle"> Add Course</i></button>
      </div>
    <div class="col-md-12 card-body">
    <table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead class="bg-danger text-white ">
        <tr>
          
          <th>Course Name</th>
          <th>Sort Description</th>
          <th>Fee</th>
          <th> Class</th>
          <th>Enroll</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="CourseTable">
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
  <div class="modal fade" id="updateCourseModal"  aria-labelledby="example" aria-hidden="true" >
    <div class=" modal-dialog modal-lg  modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-content">
          <div class="modal-header py-lg-2">
            <h4 class="modal-title pt-1 text-info" id="example">Update Course Information </h4>
           
            <button type="button" class="btn " data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
          </div>
        <div class="modal-body px-4 pt-2 pb-0">
           <div class="text-center">
            <img id="courseUpdateLoader"  class="loading_icon_sm  "  src=" {{asset('admin/images/loader.gif')}} " alt="">
          </div>
         <h3 id="CourseEditWrong" class="text-danger text-center d-none py-5">Somethig went wrong!</h3> 

          <form id="updateCourseForm" class="d-none">
            <p id="courseUpdataId" class="d-none"></p>
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseUpdateName">Course Name <span class="text-danger">*</span></label>
              <input type="text" id="courseUpdateName" name="name" class="form-control" placeholder="{{old('name')}}">
              <span class="name d-inline-block mt-1" style="color: red"></span>
            </div>
            
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseUpdateSrtDes">Short Description <span class="text-danger">*</span></label>
              <textarea type="text" id="courseUpdateSrtDes" class="form-control" name="srtDes" placeholder="{{old('srtDes')}}"></textarea>
              <span class="sort_des d-inline-block mt-1" style="color: red"></span>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-outline mb-2">
                  <label class="form-label text-dark" for="courseUpdateFee">Course Fee <span class="text-danger">*</span></label>
                  <input type="text" id="courseUpdateFee" class="form-control" name="fee" placeholder="{{old('fee')}}">
                  <span class="fee d-inline-block mt-1" style="color: red"></span>
                </div>
              </div>
              <div class="col-md-4 px-md-0">
                <div class="form-outline mb-2">
                  <label class="form-label text-dark" for="courseUpdateClass">Total Class <span class="text-danger">*</span></label>
                  <input type="text" id="courseUpdateClass" class="form-control" name="class" placeholder="{{old('class')}}">
                  <span class="class d-inline-block mt-1" style="color: red"></span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-outline mb-2">
                  <label class="form-label text-dark" for="courseUpdateEnroll">Total Enroll <span class="text-danger">*</span></label>
                  <input type="text" id="courseUpdateEnroll" class="form-control" name="enroll" placeholder="{{old('enroll')}}">
                  <span class="enroll d-inline-block mt-1" style="color: red"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-outline mb-1">
                  <label class="form-label text-dark" for="courseUpdateImage">Image Link <span class="text-danger">*</span></label>
                  <input type="text" id="courseUpdateImage" class="form-control" name="img" placeholder="{{old('img')}}">
                  <span class="image d-inline-block mt-1" style="color: red"></span>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label text-dark" for="courseUpdateLink">Course Link <span class="text-danger">*</span></label>
                <input type="text" id="courseUpdateLink" class="form-control" name="link" placeholder="{{old('link')}}">
                <span class="c_link d-inline-block mt-1" style="color: red"></span>
                </div>
            </div>
            
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseUpdatelongDes">Description</label>
              <textarea rows="4" id="courseUpdatelongDes" class="form-control" name="des" placeholder="{{old('des')}}"></textarea>
              
            </div>
            
          </form>
          
        </div>
        <div class="modal-footer pr-3 border-none" style="padding:5px 16px; background: #f9f9f9 !important;">
          <button  class="btn btn-md  btn-info " data-dismiss="modal"> Cancel </button>
          <button id="courseEditConfirm"  class="btn btn-md btn-success">Save</button>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--  Add new course Modal -->
<div class="addModal">
  <div class="modal fade" id="addNewCourseModal"  aria-labelledby="exampleModal" aria-hidden="true" >
    <div class=" modal-dialog modal-lg  modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-content">
          <div class="modal-header py-lg-2">
            <h4 class="modal-title pt-1 text-info" id="exampleModal">Add Couse Information </h4>
           
            <button type="button" class="btn " data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
          </div>
        <div class="modal-body px-4 pt-2 pb-0">
           <div class="text-center">
            <img id="courseAddLoader"  class="loading_icon_sm d-none "  src=" {{asset('admin/images/loader.gif')}} " alt="">
          </div>
         {{-- <h3 id="serviceEditWrong" class="text-danger">Somethig went wrong!</h3> --}}

          <form id="addNewCourseForm" class="">
            
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseAddName">Course Name <span class="text-danger">*</span></label>
              <input type="text" id="courseAddName" name="name" class="form-control" placeholder="{{old('name')}}">
            </div>
            
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseAddSrtDes">Short Description <span class="text-danger">*</span></label>
              <textarea type="text" id="courseAddSrtDes" class="form-control" name="srtDes" placeholder="{{old('srtDes')}}"></textarea>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-outline mb-2">
                  <label class="form-label text-dark" for="courseAddFee">Course Fee <span class="text-danger">*</span></label>
                  <input type="text" id="courseAddFee" class="form-control" name="fee" placeholder="{{old('fee')}}">
                </div>
              </div>
              <div class="col-md-4 px-md-0">
                <div class="form-outline mb-2">
                  <label class="form-label text-dark" for="courseAddClass">Total Class <span class="text-danger">*</span></label>
                  <input type="text" id="courseAddClass" class="form-control" name="class" placeholder="{{old('class')}}">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-outline mb-2">
                  <label class="form-label text-dark" for="courseAddEnroll">Total Enroll <span class="text-danger">*</span></label>
                  <input type="text" id="courseAddEnroll" class="form-control" name="enroll" placeholder="{{old('enroll')}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-outline mb-1">
                  <label class="form-label text-dark" for="courseAddImage">Image Link <span class="text-danger">*</span></label>
                  <input type="text" id="courseAddImage" class="form-control" name="img" placeholder="{{old('img')}}">
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label text-dark" for="courseAddLink">Course Link <span class="text-danger">*</span></label>
                  <input type="text" id="courseAddLink" class="form-control" name="link" placeholder="{{old('link')}}">
              </div>
            </div>
            
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseAddlongDes">Description</label>
              <textarea rows="4" id="courseAddlongDes" class="form-control" name="des" placeholder="{{old('des')}}"></textarea>
              
            </div>
            
          </form>
          
        </div>
        <div class="modal-footer pr-3 border-none" style="padding:5px 16px; background: #f9f9f9 !important;">
          <button  class="btn btn-md  btn-info " data-dismiss="modal"> Cancel </button>
          <button id="courseCreateConfirm"  class="btn btn-md btn-success">Save</button>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--  Delete Modal -->
<div class="modal fade"  id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" >
    <div class="modal-dialog ">
      <div class="modal-content ">
        <div class="modal-content">
          <div class="modal-header ">
            <h4 class="text-white" ></h4>
            <h3 id="courseDeleteId" class="d-none"></h3>
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
<script type="text/javascript">
getCourseData();
//get all course data from  database
function getCourseData() {
  axios.get('/dashboard/courseData')
    .then(function (response) {
        //table display none before get data form database
        $('#main_div').removeClass('d-none');
        //loading animation before loading data
        $('#loader').addClass('d-none');
        
        //destroy data table before loading data and show data properly 
        $('#courseDataTable').DataTable().destroy();
        // empty table before get data form database
        $('#CourseTable').empty();
        if (response.status == 200) {
            // this varaiable for load json data from database
            var jsonData = response.data;
            //jquery loop for shwoing data in table
            $.each(jsonData, function (i) {
              
                $('<tr>').html(
                    "<td>" + jsonData[i].course_name + "</td>" +
                    "<td width='30%'>" + jsonData[i].course_sort_des +"</td>" +
                    "<td>" + jsonData[i].course_fee + "</td>" +
                    "<td>" + jsonData[i].course_total_enroll + "</td>" +
                    "<td>" + jsonData[i].course_total_class + "</td>" +
                    "<td width='10%'><a data-id='" + jsonData[i].id + "' id='courseViewDetails'><i class='fas fa-eye text-info'></i></a> <a data-id='" + jsonData[i].id + "' class='courseEdit px-2'><i class='fas fa-edit'></i></a> <a data-id='" + jsonData[i].id + "' class='courseDelete'><i class='fas fa-trash text-danger'></i></a></td>"
                ).appendTo('#CourseTable');
            });

            //couse delete modal shwoing
            $('.courseDelete').click(function () {
                var id = $(this).data('id');
                $('#courseDeleteId').html(id);
                $('#deleteModal').modal('show');
            });

            //update icon click to showin modal and get data from databse for upddate
            $('.courseEdit').click(function () {
                var id = $(this).data('id');
                $('#courseUpdataId').html(id)
                $('#updateCourseModal').modal('show')
                getSingleData(id)
            });

            // contact  dataTable
            $('#courseDataTable').DataTable({
                    "order": false,
              });
                $('.dataTables_length').addClass('bs-select');


        }else {
            $('#main_div').addClass('d-none');
            $('#wrong').removeClass('d-none');
        }
    })
    .catch(function (error) {
        toastr.error('something went worng to get data.');
        $('#loader').addClass('d-none');
        $('#wrong').removeClass('d-none');
    })
}

//Click Yes button for confirm delete
$('#courseDeleteConfirm').click(function () {
  var id = $('#courseDeleteId').html();
  courseDelete(id);
});

//course delete function
function courseDelete(deleteId) {
  axios.post('/dashboard/courseDelete', {
          id: deleteId
      })
      .then(function (response) {
          if (response.data == 1) {
              $('#deleteModal').modal('hide');
              toastr.success('Successfully Delete Course');
              getCourseData();
          }
      })
      .catch(function (error) {
          alert('error')
      })
}
//add new courseadd
$('#addCourse').click(function(){
  $('#addNewCourseModal').modal('show')
})

//click to save buttton to insert data in database
$('#courseCreateConfirm').click(function () {
  var course_name = $('#courseAddName').val();
  var course_srt_des = $('#courseAddSrtDes').val();
  var course_long_des = $('#courseAddlongDes').val();
  var course_fee = $('#courseAddFee').val();
  var course_enroll = $('#courseAddEnroll').val();
  var course_class = $('#courseAddClass').val();
  var course_link = $('#courseAddLink').val();
  var course_img = $('#courseAddImage').val();
  //alert(course_name + course_srt_des + course_long_des + course_fee +course_enroll + course_class +course_link + course_img);
  courseCreate(course_name, course_srt_des, course_long_des, course_fee, course_enroll, course_class, course_link, course_img);
});

// course create function 
function courseCreate(course_name, course_srt_des, course_long_des, course_fee, course_enroll, course_class, course_link, course_img) {
  if (course_name.length == 0) {
      $('#courseAddName').css('border-color', 'red')
  } else if (course_srt_des.length == 0) {
      $('#courseAddSrtDes').css('border-color', 'red')
  } else if (course_fee.length == 0) {
      $('#courseAddFee').css('border-color', 'red')
  } else if (course_class.length == 0) {
      $('#courseAddClass').css('border-color', 'red')
  } else if (course_enroll.length == 0) {
      $('#courseAddEnroll').css('border-color', 'red')
  } else if (course_img.length == 0) {
      $('#courseAddImage').css('border-color', 'red')
  } else if (course_link.length == 0) {
      $('#courseAddLink').css('border-color', 'red')
  } else {
      axios.post('/dashboard/courseCreate', {
            course_name: course_name,
            course_srt_des: course_srt_des,
            course_long_des: course_long_des,
            course_fee: course_fee,
            course_enroll: course_enroll,
            course_class: course_class,
            course_link: course_link,
            course_img: course_img
        }).then(function (response) {
            $('#courseAddLoader').removeClass('d-none')
            if (response.data == 1) {
                $('#courseAddLoader').addClass('d-none')
                $('#addNewCourseModal').modal('hide');
                toastr.success('Successfully Insert Data');
                getCourseData();
            } else {
                $('#courseAddLoader').addClass('d-none')
                $('#addNewCourseModal').modal('hide');
                toastr.success('Opps!! Failed');
            }
        })
        .catch(function (error) {
            toastr.error('something went worng to insert data.');
            $('#loader').addClass('d-none');
            $('#wrong').removeClass('d-none');
        })
  }

}

//for get single data by id from database, with axios
function getSingleData(id) {
axios.post('/dashboard/singleData', {
        id: id
    })
    .then(function (response) {
        if (response.status == 200) {
            $('#updateCourseForm').removeClass('d-none')
            $('#courseUpdateLoader').addClass('d-none')
            var jsonData = response.data;
            $('#courseUpdateName').val(jsonData[0].course_name)
            $('#courseUpdateSrtDes').val(jsonData[0].course_sort_des)
            $('#courseUpdateFee').val(jsonData[0].course_fee)
            $('#courseUpdateClass').val(jsonData[0].course_total_class)
            $('#courseUpdateEnroll').val(jsonData[0].course_total_enroll)
            $('#courseUpdateImage').val(jsonData[0].course_img)
            $('#courseUpdateLink').val(jsonData[0].course_link)
            $('#courseUpdatelongDes').val(jsonData[0].course_long_des)
        } else {
            $('#CourseEditWrong').removeClass('d-none')
            $('#courseUpdateLoader').addClass('d-none')
        }
    })
    .catch(function (error) {
        alert('custom Error')
    })
}

// click to uypdate button to send upadate data to database
$('#courseEditConfirm').click(function(){
  var id = $('#courseUpdataId').html();
  var course_name = $('#courseUpdateName').val();
  var course_srt_des = $('#courseUpdateSrtDes').val();
  var course_long_des = $('#courseUpdatelongDes').val();
  var course_fee = $('#courseUpdateFee').val();
  var course_enroll = $('#courseUpdateEnroll').val();
  var course_class = $('#courseUpdateClass').val();
  var course_link = $('#courseUpdateLink').val();
  var course_img = $('#courseUpdateImage').val();

  updateCourse(id, course_name, course_srt_des, course_long_des, course_fee, course_enroll, course_class, course_link, course_img);
  //alert(id+ course_name + course_srt_des + course_long_des + course_fee +course_enroll + course_class +course_link + course_img);
})

//for update course 
function updateCourse(id, course_name, course_srt_des, course_long_des, course_fee, course_enroll, course_class, course_link, course_img){
  if (course_name.length == 0) {
      $('#courseUpdateName').css('border-color', 'red')
      $('.name').html('This filed is required')
  } else if (course_srt_des.length == 0) {
      $('#courseUpdateSrtDes').css('border-color', 'red')
      $('.sort_des').html('This filed is required')
  } else if (course_fee.length == 0) {
      $('#courseUpdateFee').css('border-color', 'red')
      $('.fee').html('This filed is required')
  } else if (course_class.length == 0) {
      $('#courseUpdateClass').css('border-color', 'red')
      $('.class').html('This filed is required')
  } else if (course_enroll.length == 0) {
      $('#courseUpdateEnroll').css('border-color', 'red')
      $('.enroll').html('This filed is required')
  } else if (course_img.length == 0) {
      $('#courseUpdateImage').css('border-color', 'red')
      $('.image').html('This filed is required')
  } else if (course_link.length == 0) {
      $('#courseUpdateLink').css('border-color', 'red')
      $('.c_link').html('This filed is required')
  } else {
      $('#courseUpdateLoader').removeClass('d-none')
      axios.post('/dashboard/courseUpdate',{
          id: id,
          course_name: course_name,
          course_srt_des: course_srt_des,
          course_long_des: course_long_des,
          course_fee: course_fee,
          course_enroll: course_enroll,
          course_class: course_class,
          course_link: course_link,
          course_img: course_img
      })
      .then(function(response){
          if(response.data == 1){
              $('#courseUpdateLoader').addClass('d-none')
              $('#updateCourseModal').modal('hide');
              toastr.success('Successfully Update Data');
              getCourseData();
          }else{
              $('#courseUpdateLoader').addClass('d-none')
              toastr.error('Opps!! Failde to Update Data');
          }
      })
      .catch(function(error){
          alert('Custom Error');
      })
  }
}

</script>
@endsection