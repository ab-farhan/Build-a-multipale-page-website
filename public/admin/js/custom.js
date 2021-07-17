// visitor page dataTable
$(document).ready(function () {
    $('#VisitorDt').DataTable({
        "order": false,
    });
    $('.dataTables_length').addClass('bs-select');
});

// servie page get data and delete && edit

function getServiceData() {

    axios.get('/dashboard/serviceData')

        .then(function (responce) {

            if (responce.status == 200) {

                $('#main_div').removeClass('d-none');
                $('#loader').addClass('d-none');
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
                    $('#serviceDeleteConfirm').attr('data-id', id);
                    $('#deleteModal').modal('show');
                });

                //click for confirm(Yes) to delete
                $('#serviceDeleteConfirm').click(function () {
                    var id = $(this).data('id');
                    serviceDelete(id);
                });

                //click edit icon for show modal to edit
                $('.serviceEdit').click(function () {
                    var id = $(this).data('id');
                    $('#serviceEditID').val(id);
                    serviceUpdate(id);
                    $('#editModal').modal('show');

                });
                //update button click for sercice update and send data to database
                $('#serviceEditConfirm').click(function () {
                    var serviceId = $('#serviceEditID').val();
                    var service_name = $('#serviceName').val();
                    var service_des = $('#serviceSrtDes').val();
                    var service_img = $('#serviceImage').val();

                    serviceUpdataData(serviceId, service_name, service_des, service_img)
                });

            } else {
                $('#loader').addClass('d-none')
                $('#wrong').removeClass('d-none')
            }

        }).catch(function (error) {
            $('#loader').addClass('d-none')
            $('#wrong').removeClass('d-none')
        });
}

// for services delete data
function serviceDelete(deleteId) {
    axios.post('/dashboard/serviceDelete', {
            id: deleteId
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
