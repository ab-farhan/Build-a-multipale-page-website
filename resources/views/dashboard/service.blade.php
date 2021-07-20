@extends('layouts.admin_master')
@section('title','Service Page')
@section('content')
<div class="container-fluid">
  
    <div class="row d-none card " id="main_div">
      <div class="col-md-12 card-header">
        <h3 class="d-inline-block mt-2">All Service Information</h3> <button id="addNewService"  type="button" class="btn btn-sm btn-success float-right" style="padding:10px 15px;"><i class="fas fa-plus-circle"> Add Service</i></button>
      </div>
    <div class="col-md-12 card-body">
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="serviceDataTable">
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

<!--  Add new service Modal -->
<div class="addNewModal">
  <div class="modal fade" id="addNewServiceModal"  aria-labelledby="exampleModalLabel1" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Insert Service Information </h5>
            <p class="id"></p>
            <button type="button" class="btn " data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
          </div>
        <div class="modal-body p-4">
          {{-- <div class="text-center">
            <img id="serviceEditLoader"  class="loading_icon_sm "  src=" {{asset('admin/images/loader.gif')}} " alt="">
          </div>
          <h3 id="serviceEditWrong" class="text-danger">Somethig went wrong!</h3> --}}

          <form id="addNewServiceForm" class="">
            
            <div class="form-outline mb-3">
              <label class="form-label" for="serviceName">Service Name</label>
              <input type="text" id="serviceAddName" class="form-control" placeholder="Service Name">
            </div>
          
            <div class="form-outline mb-3">
              <label class="form-label" for="serviceSrtDes">Service Short Description</label>
              <input type="text" id="serviceAddSrtDes" class="form-control" placeholder="Short Description">
            </div>

            <div class="form-outline mb-3">
              <label class="form-label" for="serviceImage">Image</label>
              <input type="text" id="serviceAddImage" class="form-control" placeholder="Image Link">
            </div>
          </form>
          <div class="">
            <button id="serviceCreateConfirm"  class="btn btn-success float-right">Create</button>
            <button  class="btn  btn-info float-right" data-dismiss="modal"> Cancel </button>
          
          </div>
        </div>
       
      </div>
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
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-content">
        <div class="modal-header bg-danger text-center">
          <h4 class="text-white" ></h4>
          <h3 id="serviceDeleteId" class="d-none"></h3>
          <button type="button" class="btn btn-white" data-dismiss="modal" aria-label="Close" style="padding:5px 10px !important;"><i class="fas fa-times"></i></button>
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

// servie page get data and delete && edit

function getServiceData() {

axios.get('/dashboard/serviceData')

    .then(function (responce) {
        if (responce.status == 200) {
            $('#main_div').removeClass('d-none');
            $('#loader').addClass('d-none');
            //destroy data table before loading data and show properly 
            $('#serviceDataTable').DataTable().destroy();
            //for empty table before get data form database
            $('#serviceTable').empty();
            

            var jsonData = responce.data;

            // jqury loop for fetch data from database 
            $.each(jsonData, function (i, item) {
                $('<tr>').html(
                    "<td> <img class='table-img' src='http://127.0.0.1:8000/admin/" + jsonData[i].service_img + "'></td>" +
                    "<td>" + jsonData[i].service_name + "</td>" +
                    "<td>" + jsonData[i].service_sort_des + " </td>" +
                    "<td><a class='serviceEdit' data-id='" + jsonData[i].id + "'> <i class='fas fa-edit text-info'></i> </a ></td>" +
                    "<td><a class='serviceDelete'  data-id='" + jsonData[i].id + "'><i class='fas fa-trash-alt text-danger'></i></a></td>"
                ).appendTo('#serviceTable')
            });

            //click delete icon for show modal and get id for delete
            $('.serviceDelete').click(function () {
                var id = $(this).data('id');
                $('#serviceDeleteId').html(id);
                $('#deleteModal').modal('show');
            });

            //click edit icon for show modal to edit
            $('.serviceEdit').click(function () {
                var id = $(this).data('id');
                $('#serviceEditID').val(id);
                serviceUpdate(id);
                $('#editModal').modal('show');

            });
            
              // service  dataTable
                $('#serviceDataTable').DataTable({
                    "order": false,
                });
                $('.dataTables_length').addClass('bs-select');
          



        } else {
            $('#loader').addClass('d-none')
            $('#wrong').removeClass('d-none')
        }

    }).catch(function (error) {
        $('#loader').addClass('d-none')
        $('#wrong').removeClass('d-none')
    });
}

//click for confirm(Yes) to delete
$('#serviceDeleteConfirm').click(function () {
var id = $('#serviceDeleteId').html();
serviceDelete(id);
});

// for services delete data
function serviceDelete(deleteId) {
axios.post('/dashboard/serviceDelete', {
        id: deleteId,
    })
    .then(function (response) {
        if (response.data == 1) {
            $('#deleteModal').modal('hide');
            toastr.success('Successfully!! Delete Service Data.');
            getServiceData();
        } else {
            $('#deleteModal').modal('hide');
            toastr.error('Opps!! Delet Failed.');
            getServiceData();
        }
    })
    .catch(function (error) {
        $('#deleteModal').modal('hide');
        toastr.error('Something went wrong!!');
    })
}
// for singla data fetch from data base and edit this
function serviceUpdate(detailsId) {
axios.post('/dashboard/serviceSingleData', {
        id: detailsId
    })

    .then(function (response) {
        if (response.status == 200) {
            $('#serviceEditForm').removeClass('d-none');
            $('#serviceEditLoader').addClass('d-none');

            var jsonData = response.data;
            $('#serviceImage').val(jsonData[0].service_img);
            $('#serviceName').val(jsonData[0].service_name);
            $('#serviceSrtDes').val(jsonData[0].service_sort_des);
        } else {
            $('#serviceEditLoader').addClass('d-none');
            $('#serviceEditWrong').removeClass('d-none');
        }

    }).catch(function (error) {
        $('#serviceEditLoader').addClass('d-none');
        $('#serviceEditWrong').removeClass('d-none');
    })
}

//update button click for sercice update and send data to database
$('#serviceEditConfirm').click(function () {
var serviceId = $('#serviceEditID').val();
var service_name = $('#serviceName').val();
var service_des = $('#serviceSrtDes').val();
var service_img = $('#serviceImage').val();

serviceUpdataData(serviceId, service_name, service_des, service_img)
});

//for update data
function serviceUpdataData(serviceId, service_name, service_des, service_img) {

if (serviceId.length == 0) {

} else if (service_name.length == 0) {
    $('#serviceName').css('border-color', 'red')
    toastr.error('Opps!! This Service Name Filed is require.');
} else if (service_des.length == 0) {
    $('#serviceSrtDes').css('border-color', 'red')
    toastr.error('Opps!! This Service Description Filed is require');
} else if (service_img.length == 0) {
    $('#serviceImage').css('border-color', 'red')
    toastr.error('Opps!! This Service Image Filed is require.');
} else {
    axios.post('/dashboard/serviceUpdate', {
            id: serviceId,
            name: service_name,
            des: service_des,
            img: service_img
        })
        .then(function (response) {
            if (response.data == 1) {
                $('#serviceEditLoader').removeClass('d-none');
                $('#editModal').modal('hide');
                toastr.success('Successfully!! Update Service Data.');
                getServiceData();
            } else {
                $('#editModal').modal('hide');
                toastr.error('Opps!! Failed Delete Service Data.');
                getServiceData();
            }

        }).catch(function (error) {
            alert('custom Error')
        })
}

}

//for show service create modal
$('#addNewService').click(function () {
$('#addNewServiceModal').modal('show');
});

//for create button click to insert data to database
$('#serviceCreateConfirm').click(function () {
var service_name = $('#serviceAddName').val();
var service_des = $('#serviceAddSrtDes').val();
var service_img = $('#serviceAddImage').val();
//alert(service_name+ service_des+ service_img)
serviceCreate(service_name, service_des, service_img)
});

//service create method
function serviceCreate(service_name, service_des, service_img) {
  
if (service_name.length == 0) {
    $('#serviceAddName').css('border-color', 'red')
    toastr.error('Opps!! Service Description Filed is require');
} else if (service_des.length == 0) {
    $('#serviceAddSrtDes').css('border-color', 'red');
    toastr.error('Opps!!  Service Name Filed is require.');
} else if (service_img.length == 0) {
    $('#serviceAddImage').css('border-color', 'red');
    toastr.error('Opps!!  Service Image Filed is require.');
} else {
    axios.post('/dashboard/serviceCreate', {
            name: service_name,
            des: service_des,
            img: service_img,
        })
        .then(function(response) {
            if (response.data == 1) {
                //$('#serviceAddLoader').removeClass('d-none');
                $('#addNewServiceModal').modal('hide');
                toastr.success('Successfully!! Create Service Data.');
                getServiceData();
            } else {
                $('#addNewServiceModal').modal('hide');
                toastr.error('Opps!! Failed to Create Service Data.');
                getServiceData();
            }

        }).catch(function (error) {
            //toastr.error('Opps!! Something went wrong.');
            alert('Custom Error')
        })
}

}





    </script>
@endsection