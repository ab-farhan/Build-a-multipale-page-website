@extends('layouts.admin_master')
@section('title','Project Page')
@section('content')
<div class="container-fluid">
  <h3 class="text-center mb-3"> Vailidation not included</h3>
    <div class="row card d-none" id="main_div">
      <div class="col-md-12 card-header">
        <h3 class="d-inline-block mt-2">All Projects Information</h3> <a id="addProject"  type="button" class="btn btn-sm btn-success float-right" style="padding:10px 15px;"><i class="fas fa-plus-circle"> Add Project</i></a>
      </div>
    <div class="col-md-12 card-body">
    <table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead class="bg-danger text-white ">
        <tr>
          
          <th>Project Image</th>
          <th>Project Name</th>
          <th>Sort Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="ProjectTable">
          
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
<div class=""> 
  <div class="modal fade" id="projectEditModal"  aria-labelledby="example" aria-hidden="true" >
    <div class=" modal-dialog modal-lg  modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-content">
          <div class="modal-header py-lg-2">
            <h4 class="modal-title pt-1 text-info" id="example">Update Project Information </h4>
           
            <button type="button" class="btn " data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
          </div>
        <div class="modal-body px-4 pt-2 pb-0">
           <div class="text-center">
            <img id="projectUpdateLoader"  class="loading_icon_sm  "  src=" {{asset('admin/images/loader.gif')}} " alt="">
          </div>
         <h3 id="projectEditWrong" class="text-danger text-center d-none py-5">Somethig went wrong!</h3> 

          <form id="updateProjectForm" class="d-none">
            <p id="projectUpdataId" class="d-none"></p>
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseUpdateName">Course Name <span class="text-danger">*</span></label>
              <input type="text" id="projectUpdateName" name="name" class="form-control">
              <span class="name d-inline-block mt-1" style="color: red"></span>
            </div>
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseUpdateName">Project IUmage <span class="text-danger">*</span></label>
              <input type="text" id="projectUpdateImage" name="image" class="form-control" >
              <span class="image d-inline-block mt-1" style="color: red"></span>
            </div>
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="projectAddLink">Project Link <span class="text-danger">*</span></label>
              <input type="text" id="projectUpdateLink" name="link" class="form-control" >
              <span class="link d-inline-block mt-1" style="color: red"></span>
            </div>
            
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="courseUpdatelongDes">Description</label>
              <textarea rows="4" id="projectUpdateSrtDes" class=" form-control" name="des"></textarea>
              <span class="s_des d-inline-block mt-1" style="color: red"></span>
            </div>
            
          </form>
          
        </div>
        <div class="modal-footer pr-3 border-none" style="padding:5px 16px; background: #f9f9f9 !important;">
          <button  class="btn btn-md  btn-info " data-dismiss="modal"> Cancel </button>
          <button id="projectEditConfirm"  class="btn btn-md btn-success">Save</button>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--  Add new course Modal -->
<div class="addModal">
  <div class="modal fade" id="addNewProjecteModal"  aria-labelledby="exampleModal" aria-hidden="true" >
    <div class=" modal-dialog modal-lg  modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-content">
          <div class="modal-header py-lg-2">
            <h4 class="modal-title pt-1 text-info" id="exampleModal">Add Project Information </h4>
           
            <button type="button" class="btn " data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
          </div>
        <div class="modal-body px-4 pt-2 pb-0">
           <div class="text-center">
            <img id="projectAddLoader"  class="loading_icon_sm d-none "  src=" {{asset('admin/images/loader.gif')}} " alt="">
          </div>
         {{-- <h3 id="serviceEditWrong" class="text-danger">Somethig went wrong!</h3> --}}

         <form id="addProjectForm">
          <div class="form-outline mb-2">
            <label class="form-label text-dark" for="projectAddName">Project Name <span class="text-danger">*</span></label>
            <input type="text" id="projectAddName" name="name" class="form-control">
            <span class="name d-inline-block mt-1" style="color: red"></span>
          </div>
          <div class="form-outline mb-2">
            <label class="form-label text-dark" for="projectAddImage">Project Image <span class="text-danger">*</span></label>
            <input type="text" id="projectAddImage" name="image" class="form-control" >
            <span class="image d-inline-block mt-1" style="color: red"></span>
          </div>
          <div class="form-outline mb-2">
            <label class="form-label text-dark" for="projectAddLink">Project Link <span class="text-danger">*</span></label>
            <input type="text" id="projectAddLink" name="link" class="form-control" >
            <span class="link d-inline-block mt-1" style="color: red"></span>
          </div>
          
          <div class="form-outline mb-2">
            <label class="form-label text-dark" for="projectAddSrtDes">Short Description <span class="text-danger">*</span></label>
            <textarea rows="3" id="projectAddSrtDes" class=" form-control" name="des"></textarea>
            <span class="s_des d-inline-block mt-1" style="color: red"></span>
          </div>
          
        </form>
          
        </div>
        <div class="modal-footer pr-3 border-none" style="padding:5px 16px; background: #f9f9f9 !important;">
          <button  class="btn btn-md  btn-info " data-dismiss="modal"> Cancel </button>
          <button id="projectAddConfirm"  class="btn btn-md btn-success">Save</button>
          
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
              <h3 id="projectDeleteId" class="d-none"></h3>
              <button type="button" class="btn btn-white" data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
            </div>
          <div class="modal-body my-3">
            <h3 class="text-center mb-0">Do you want to delete?</h3>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-md btn-success" data-dismiss="modal">
              No
            </button>
            <button id="projectDeleteConfirm" type="button" class="btn btn-md ml-3 btn-danger">Yes</button>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  getProjectData();

  
//get all Project data from  database
function getProjectData() {
  axios.get('/dashboard/projectData')
    .then(function (response) {
        //table display none before get data form database
        $('#main_div').removeClass('d-none');
        //loading animation before loading data
        $('#loader').addClass('d-none');
        
        //destroy data table before loading data and show data properly 
        $('#projectDataTable').DataTable().destroy();
        // enpty table before get data form database
        $('#ProjectTable').empty();
        if (response.status == 200) {
            // this varaiable for load json data from database
            var jsonData = response.data;
            //jquery loop for shwoing data in table
            $.each(jsonData, function (i) {
                $('<tr>').html(
                    "<td><img class='table-img2' src='http://127.0.0.1:8000/admin/" + jsonData[i].project_img + "'> </td>" +
                    "<td>" + jsonData[i].project_name + "</td>" +
                    "<td width='30%'>" + jsonData[i].project_sort_des + "</td>" +
                    
                    "<td width='10%'><a data-id='" + jsonData[i].id + "' id='projectViewDetails'><i class='fas fa-eye text-info'></i></a> <a data-id='" + jsonData[i].id + "' class='projectEdit px-2'><i class='fas fa-edit'></i></a> <a data-id='" + jsonData[i].id + "' class='projectDelete'><i class='fas fa-trash text-danger'></i></a></td>"
                ).appendTo('#ProjectTable');
            });

            //couse delete modal shwoing
            $('.projectDelete').click(function () {
                var id = $(this).data('id');
                $('#projectDeleteId').html(id);
                $('#deleteModal').modal('show');
            });

            //update icon click to showing modal and get data from databse for upddate
            $('.projectEdit').click(function () {
                var id = $(this).data('id');
                $('#projectUpdataId').html(id)
                $('#projectEditModal').modal('show')
                getSingleData(id)
            });

            // service  dataTable
            $('#projectDataTable').DataTable({
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

//for get single data by id from database, with axios
function getSingleData(id) {
    axios.post('/dashboard/projectSingleData', {
            id: id
        })
        .then(function (response) {
            if (response.status == 200) {
                $('#updateProjectForm').removeClass('d-none')
                $('#projectUpdateLoader').addClass('d-none')
                var jsonData = response.data;
                $('#projectUpdateName').val(jsonData[0].project_name)
                $('#projectUpdateSrtDes').val(jsonData[0].project_sort_des)
                $('#projectUpdateImage').val(jsonData[0].project_img)
                $('#projectUpdateLink').val(jsonData[0].project_link)
               
               
            } else {
                $('#projectEditWrong').removeClass('d-none')
                $('#projectUpdateLoader').addClass('d-none')
            }
        })
        .catch(function (error) {
            alert('custom Error')
        })
    }
    
    // click to update button to send upadate data to database
    $('#projectEditConfirm').click(function(){
      var id = $('#projectUpdataId').html();
      var project_name = $('#projectUpdateName').val();
      var project_srt_des = $('#projectUpdateSrtDes').val();
      var project_img = $('#projectUpdateImage').val();
      var project_link = $('#projectUpdateLink').val();

      updateProject(id, project_name, project_srt_des, project_img, project_link);
      
    })
    
    //for update project 
   function updateProject(id, project_name, project_srt_des, project_img, project_link){
       axios.post('/dashboard/projectUpdate',{
        id:id,
        project_name:project_name,
        project_srt_des:project_srt_des,
        project_img:project_img,
        project_link:project_link,
       })
       //alert(id+ project_name+ project_srt_des+ project_img)
       .then(function(response){
        if(response.data == 1){
            $('#projectEditModal').modal('hide')
            toastr.success('Successfully Update Data');
            getProjectData()
        }else{
            $('#projectEditModal').modal('hide')
            toastr.error('Failed Update Data');
            getProjectData()
        }
       })
       .catch(function(error){
        alert('custom error')
       })
    }

  //project delete confirm button
  $('#projectDeleteConfirm').click(function(){
     var id= $('#projectDeleteId').html();
     projectDelete(id);
  });
  //  project delete 
  function projectDelete(id){
      axios.post('/dashboard/projectDelete',{
          id:id
      })
      .then(function(response){
          if(response.data==1){
            $('#deleteModal').modal('hide');
            toastr.success('Successfully Delete Data')
            getProjectData()
          }else{
            toastr.error('Failed to Delete Data')
            $('#deleteModal').modal('hide');
            getProjectData()
          }
      })
      .catch(function(error){
        alert('custom error') 
      })
  }
  //project addd button click  to show mmodal
  $('#addProject').click(function(){
      $('#addNewProjecteModal').modal('show')
  })
  //project insert save button click for sote data
  $('#projectAddConfirm').click(function(){
      var project_name= $('#projectAddName').val();
      var project_img= $('#projectAddImage').val();
      var project_srt_des= $('#projectAddSrtDes').val();
      var project_link= $('#projectAddLink').val();
      projectCreate(project_name, project_img, project_srt_des, project_link);
  })
//insert/create project
function projectCreate(project_name, project_img, project_srt_des, project_link) {
    axios.post('/dashboard/projectCreate',{
        project_name:project_name,
        project_img:project_img,
        project_srt_des:project_srt_des,
        project_link:project_link,
    })
    .then(function(reponse){
        if(reponse.data == 1){
            $('#addNewProjecteModal').modal('hide')
            toastr.success('Successfully Insert Data')
            getProjectData()
        }else{
            $('#addNewProjecteModal').modal('hide')
            toastr.error('Successfully Insert Data')
            getProjectData()
        }
    })
    .catch(function(error){
        alert('Custom error')
    })
}
</script>
@endsection