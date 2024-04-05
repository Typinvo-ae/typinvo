
<!DOCTYPE html>

<!-- BEGIN: Head-->


@if(Auth::user()->color ==0)
	<html class="loading" lang="en" data-textdirection="rtl">
@else
<html class="loading dark-layout" data-layout="dark-layout"  lang="en" data-textdirection="rtl">
@endif



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Erp.">
    <meta name="keywords" content="Erp">
    <meta name="author" content="PIXINVENT">
    <title >TYPINVO</title>
    @include('common::includes.css')
    
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('common::includes.navbar')
@include('common::includes.sidebar')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

            @yield('content')

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('common::includes.footer')


</body>
<!-- END: Body-->
@include('common::includes.js')

</html>
