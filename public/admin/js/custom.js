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

           $('#main_div').removeClass('d-none')
           $('#loader').addClass('d-none')
            var jsonData=responce.data;
            $.each(jsonData,function(i,item){
                $('<tr>').html(
                    "<td> <img class='table-img' src='http://127.0.0.1:8000/admin/"+jsonData[i].service_img+"'></td>" +
                    "<td>"+jsonData[i].service_name+"</td>"+
                    "<td>"+jsonData[i].service_sort_des +" </td>"+
                    "<td><a href=''><i class='fas fa-edit'></i></a></td>"+
                    "<td><a href=''><i class='fas fa-trash-alt text-danger'></i></a></td>"
                    
                    ).appendTo('#serviceTable')
            });

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