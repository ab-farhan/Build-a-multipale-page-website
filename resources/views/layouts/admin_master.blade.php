<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('admin/css/mdb.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('admin/css/sidenav.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/datatables-select.min.css') }}">
</head>
<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li> 
                     <li class="nav-item mt-3">ADMIN</li>
					</ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item"><a href="" class="btn btn-sm btn-danger">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        @include('dashboard.component.sidenav')
<div class="page-wrapper">

    @yield('content')




</div>
</div>

<script src="{{ asset('admin/js/jquery-3.4.1.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('admin/js/popper.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('admin/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/mdb.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('admin/js/sticky-kit.min.js') }}"></script>
<script src="{{ asset('admin/js/custom.min-2.js') }}"></script>
<script src="{{ asset('admin/js/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/datatables-select.min.js') }}"></script>
<script src="{{ asset('admin/js/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
@yield('script')
</body>
</html>







