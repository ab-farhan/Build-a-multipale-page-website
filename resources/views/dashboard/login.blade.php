<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Login Page</title>
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" >
	<link href="{{asset('admin/css/mdb.min.css')}}" rel="stylesheet" >
	<link href="{{asset('admin/css/sidenav.css')}}" rel="stylesheet" >
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" >
	<link href="{{asset('admin/css/responsive.css')}}" rel="stylesheet" >
	<link href="{{asset('admin/css/datatables.min.css')}}" rel="stylesheet" >
	<link href="{{asset('admin/css/datatables-select.min.css')}}" rel="stylesheet" >
</head>
<body>
<div class="container ">
    <div class="row justify-content-center d-flex mt-5 mb-5">
    
    <div class="col-md-10 card">
      <div class="row">
        <div style="height: 450px" class="col-md-6 p-3">
          <form  action=" " class="m-5 loginForm">
              @csrf
                <div class="form-group">
                    <label for="UserName">User Name</label>
                    <input required="" name="userName"  type="text" class="form-control" id="UserName" aria-describedby="emailHelp" placeholder="Enter User Name">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input  required="" name="userPassword"   type="password" class="form-control" id="Password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-block btn-danger">Login</button>
                </div>
                <a class="" href="{{url('/login')}}">User Login</a>
          </form>
          
        </div>
    
        <div style="height: 450px" class="col-md-6 bg-light">
            <img class="w-75 m-5" src="{{asset('website/images/bannerImg.png')}}">
        </div>

      </div>
    </div>
    </div>
</div>

    
<script type="text/javascript" src="{{asset('admin/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/sidebarmenu.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/sticky-kit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/custom.min-2.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/datatables-select.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/axios.min.js')}}"></script>


<script>
    $('.loginForm').on('submit',function(event){
        event.preventDefault();
        // let formData=$(this).serializeArray();
        // let userName=formData[0]['value'];
        // let password=formData[1]['value'];
        //alert(userName + password)

        let userName=$('#UserName').val();
        let password=$('#Password').val();
        let url='/adminLoginA';
        
        axios.post(url,{
            user:userName,
            pass:password,
        }).then(function(response){
            if(response.status == 200 && response.data == 1){
                //alert(response.data);
               window.location.href="/dashboard";  
               toastr.success('welcome To admin page')
            }else{
                toastr.error('Login Failed')
                //response.status == 200 &&
            }
        }).catch(function(error){
            alert('Custom Error')
        })
    })
</script>

</body>
</html>