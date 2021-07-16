$(document).ready(function () {
$('#VisitorDt').DataTable({
    "order":false,
});
$('.dataTables_length').addClass('bs-select');
});

function getServiceData(){
    
    axios.get('/dashboard/serviceData')
   
    .then(function(responce){

       if(responce.status == 200){

           $('#main_div').removeClass('d-none');
           $('#loader').addClass('d-none');
            //for empty table before get data form database
           $('#serviceTable').empty();

            var jsonData=responce.data;

            // jqury loop for fetch data from database 
            $.each(jsonData,function(i,item){
                $('<tr>').html(
                    "<td> <img class='table-img' src='http://127.0.0.1:8000/admin/"+jsonData[i].service_img+"'></td>" +
                    "<td>"+jsonData[i].service_name+"</td>"+
                    "<td>"+jsonData[i].service_sort_des +" </td>"+
                    "<td><a href=''><i class='fas fa-edit'></i></a></td>"+
                    "<td><a class='serviceDelete'  data-id='"+jsonData[i].id+"'><i class='fas fa-trash-alt text-danger'></i></a></td>"
                    ).appendTo('#serviceTable')
            });
                //click delete icon and get id for delete
            $('.serviceDelete').click(function(){
                var id=$(this).data('id');
                $('#serviceDeleteConfirm').attr('data-id',id);
                $('#deleteModal').modal('show');
            })

            //click for confirm(Yes) to delete
            $('#serviceDeleteConfirm').click(function(){
                var id=$(this).data('id');
                serviceDelete(id);
            })

       }else{
           $('#loader').addClass('d-none')
           $('#wrong').removeClass('d-none')
       }
        
    })
    .catch(function(error){
        $('#loader').addClass('d-none')
        $('#wrong').removeClass('d-none')
    });
}

// for services delete data
function serviceDelete(deleteId){
    axios.post('/dashboard/serviceDelete',{id:deleteId})
    .then(function(response){
        if(response.data==1){
            $('#deleteModal').modal('hide');
            toastr.success('Successfully!! Delete Service Data.');
            getServiceData();
        }else{
            $('#deleteModal').modal('show');
            toastr.error('Opps!! Delet Failed.');
            getServiceData();
        }
    })
    .catch(function(error){

    })
}