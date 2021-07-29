@extends('layouts.admin_master')
@section('title','Gallery Page')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-3">
            <h3 class="d-inline-block">Photo Gallery</h3>
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#ImageModal"> <i class="fas fa-plus-circle"></i> Add Image</button>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body">
            <div class="row photoRow">
              
            </div>

                <button class="btn btn-info d-inline-block" id="loadMore">Load More</button>
                <div class="row d-none" id="loader1" >
                  <div class="col-md-12 text-center">
                      <img class="loading_icon"  src=" {{asset('admin/images/loader.gif')}} " alt="">
                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>
    
</div>  



<!-- Modal -->
<div class="modal fade" id="ImageModal" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image Upload</h5>
        <button type="button" class=" btn btn-close" data-dismiss="modal" aria-label="Close" style="padding:10px 15px;"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <div class="row d-none" id="loader" style="margin-top:10px;">
            <div class="col-md-12 text-center">
                <img class="loading_icon"  src=" {{asset('admin/images/loader.gif')}} " alt="">
            </div>
        </div>
        <div class="form-group" id="ImageBody">
            <input type="file" class="form-control-file" id="imageInput" >
            <span class="image d-block text-danger"></span>
            <img src="{{ asset('admin/images/defaultimg.png')}}" class="my-2" id="prview" style="width:100%; max-height: 300px;">
            {{-- <input type="file" class="form-control-file" id="imageInput2" >
            <img src="" class="my-3" id="prview2" style="width:150px; max-height: 150px;"> --}}
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-success" id="UploadPhoto">Upload</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
    <script>

      loadPhoto();

        $('#imageInput').change(function(){
            var reader= new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload=function(event){
                var ImageSourse=event.target.result;
                $('#prview').attr('src',ImageSourse);
            }
        })
        // $('#imageInput2').change(function(){
        //     var reader= new FileReader();
        //     reader.readAsDataURL(this.files[0]);
        //     reader.onload=function(event){
        //         var ImageSourse=event.target.result;
        //         $('#prview2').attr('src',ImageSourse);
        //     }
        // })

        $('#UploadPhoto').click(function(){
            var spinner='<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <b id="persentage"></b>';
            $('#UploadPhoto').html(spinner);
            
            var photoFile= $('#imageInput').prop('files')[0];
        
            var formData= new FormData();
            formData.append('photo',photoFile);
             $('#loader').removeClass('d-none')
             $('#ImageBody').addClass('d-none')
             
    axios.post('/dashboard/photoUpload',formData)
            .then(function(reponse){
                if(reponse.data==1){
                  $('#imageInput').val('');
                    $('#loader').addClass('d-none')
                    $('#ImageBody').removeClass('d-none')
                    $('#UploadPhoto').html('Upload');
                    var sourse= "{{ asset('admin/images/defaultimg.png')}}";
                    $('#prview').attr('src',sourse);
                    $('#ImageModal').modal('hide')
                    //loadPhoto();
                    toastr.success('Successfully Image Upload');

                }
            })
            .catch(function(error){
                $('#UploadPhoto').html('Upload');
                alert(error)
            })
        })

//for loading photo

   function loadPhoto(){
     axios.get('/dashboard/getPhoto')
     .then(function(response){
       //var jsonData=response.data;
       $.each(response.data,function(i, item){
        $("<div class='col-md-3 imgPosition'>").html(
          "<img data-id='"+item['id']+"' src='"+item['imgLocation']+"' class='img-fluid loadImg'>"
          +"<a title='Delete' class='imgDelete' id='imgDelete' data-id="+item['id']+" data-photo="+item['imgLocation']+"> <i class='fas fa-trash'></i></a>"
        ).appendTo('.photoRow');
       })
                  //delete icon onclick
        $('.imgDelete').on('click',function(event){
          var id=$(this).data('id');
          var photoUrl=$(this).data('photo');
          DeletePhoto(id, photoUrl);
          event.preventDefault();
        });
      //console.log(response.data)
     })
     .catch(function(error){

     })
   }   


   //for clickload more Photo  to get id
   $('#loadMore').on('click',function(){
     let firstImageId=$('#loadMore').closest('div').find('img').data('id');
     //$firstImageId=$('.loadImg').data('id');
     //alert(firstImageId);
     LoadById(firstImageId);
     $('#loader1').removeClass('d-none');
   }) 

var ImgId=0;
   function LoadById(firstImageId){
    
     ImgId= ImgId+6;
     let PhotoId=ImgId+firstImageId;

     let url="/dashboard/getPhotoId/"+PhotoId;
     
     //alert(url);
     axios.get(url).then(function(response){
      $('#loader1').addClass('d-none')
      $.each(response.data,function(i, item){
        $("<div class='col-md-3 imgPosition'>").html(
          "<img data-id='"+item['id']+"' src='"+item['imgLocation']+"' class='img-fluid loadImg'>"
          +"<a title='Delete' class='imgDelete' id='imgDelete' data-id="+item['id']+" data-photo="+item['imgLocation']+"> <i class='fas fa-trash'></i></a>"
        ).appendTo('.photoRow');
   
       })
          //delete icon onclick
          $('.imgDelete').on('click',function(event){
          var id=$(this).data('id');
          var photoUrl=$(this).data('photo');
          DeletePhoto(id, photoUrl);
          event.preventDefault();
        });
     }).catch(function(error){

     })
   }

//delete photo from database and file location
  function DeletePhoto(id, photoUrl){
    axios.post('/dashboard/photoDelete',{
      id:id,
      oldPhotoUrl:photoUrl,
    }).then(function(reponse){
      if(reponse.status==200 ){
        toastr.success("delete Successfull");
        $('.photoRow').empty();
        window.location.href="/dashboard/gallery";
      }else{
        toastr.error("something went wrong");
      }
    }).catch(function(error){
      alert("custom error")
    })
   }


    </script>
@endsection