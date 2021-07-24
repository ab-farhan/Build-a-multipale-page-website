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