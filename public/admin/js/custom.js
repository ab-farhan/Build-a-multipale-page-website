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