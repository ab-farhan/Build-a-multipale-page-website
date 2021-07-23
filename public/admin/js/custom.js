
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