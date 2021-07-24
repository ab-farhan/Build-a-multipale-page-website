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
       function getContactData(){
    axios.get('/dashboard/contactData')
    .then(function(response){
        $('#main_div').removeClass('d-none');
        $('#loader').addClass('d-none');
        //destroy data table before loading data and show data properly 
        $('#contactDataTable').DataTable().destroy();
        // empty table before get data form database
        $('#ContctTable').empty();
        if(response.status == 200){
            // this varaiable for load json data from database
            var jsonData = response.data;
            //jquery loop for shwoing data in table
            $.each(jsonData, function (i) {
                $('<tr>').html(
                    "<td>" + jsonData[i].contact_name + "</td>" +
                    "<td>" + jsonData[i].contact_email +"</td>" +
                    "<td width='35%'>" + jsonData[i].contact_msg + "</td>" +
                    "<td width='10%'><a data-id='" + jsonData[i].id + "' id='contactViewDetails'><i class='fas fa-eye text-info'></i></a> <a data-id='" + jsonData[i].id + "' class='contactDelete'><i class='fas fa-trash text-danger'></i></a></td>"
                ).appendTo('#ContctTable');
            });

            //contact delete modal shwoing
            $('.contactDelete').click(function () {
                var id = $(this).data('id');
                $('#contactDeleteId').html(id);
                $('#contactdeleteModal').modal('show');
            });

             // service  dataTable
             $('#contactDataTable').DataTable({
                "order": false,
            });
            $('.dataTables_length').addClass('bs-select');
            
        }else{
            toastr.error('Successfully Delete Course');
        }
        
    })
    .catch(function(error){
        $('#loader').addClass('d-none');
        $('#wrong').removeClass('d-none');
       
    })
}

//contact Confirm btn click
$('#contactDeleteConfirm').click(function(){
    var id=$('#contactDeleteId').html();
    contactDelete(id);
})
//contact Delete
function contactDelete(id){
    axios.post('/dashboard/contactDelete',{id:id})
    .then(function (response){
        if(response.data==1){
            $('#contactdeleteModal').modal('hide');
            getContactData();
            toastr.success('Successfully Delete Contact');
        }else{
            $('#contactdeleteModal').modal('hide');
            getContactData();
            toastr.error('Failed To Delete Data');
        }
    })
    .catch(function(error){
        alert('Custom Error');
    })
}
    </script>
@endsection