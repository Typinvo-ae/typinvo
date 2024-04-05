@extends('common::layouts.master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
<!-- END: Head-->

<!-- BEGIN: Body-->
@section('content')

    <!-- BEGIN: Content-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <h3 style="margin-right:15px">اقسام الخدمات </h3>
                <!-- Role cards -->
              <div style="margin-bottom:40px">
               
                </div>
                <div class="row">
     @if(count($mainCategories)==0)
     <div class="col-12 col-md-2 col-lg-3"></div>
     <div class="col-12 col-md-6 col-lg-7">
        <div class="card card-congratulations">
            <div class="card-body text-center">
                <img src="{{asset('admin/images/elements/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left">
                <img src="{{asset('admin/images/elements/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right">
                <div class="avatar avatar-xl bg-primary shadow">
                    <div class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="mb-1 text-white">مرحبا بك قم باضافة اقسام للخدمات</h1>
                 
                </div>
            </div>
        </div>
    </div>
     @endif
              
    @foreach ($mainCategories as $mainCategory)
    
        <div class="col-xl-4 col-lg-6 col-md-6">

    @if($mainCategory['checkSubCat']!=0)

       @if($mainCategory['hasNoBranch']>=1)
       <a href="{{ route('admin.invoiceCategories',[ $mainCategory->id]) }}" >
       @else
       <a href="{{ route('admin.viewControlSubCategory',[ $mainCategory->id,0]) }}" >
       @endif
         
          <div class="card">
                <div   @if(empty($mainCategory->image)) style="height:152px"  @endif class="card-body">
                   
                <div class="d-flex justify-content-between">
                <span style="color:inherit">  عدد العناصر ({{$mainCategory->count}}) </span>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                        @if(!empty($mainCategory->image))
                           <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" style="width:70px;height:66px" src="{{asset('uploads/MainCategory')}}/{{$mainCategory->image}}" alt="Avatar" />
                            </li>
                            @endif
                        </ul>
                    </div>
                 

                    <div   class="d-flex justify-content-between align-items-end mt-1 pt-25" >
                            <div class="role-heading">
                                <h4  @if(empty($mainCategory->image)) style="margin-top:50px" @endif  class="fw-bolder">{{$mainCategory['name']}}</h4>
                              
                            </div>
                    </div>
                </div>
            </div>
            </a>
@endif
        </div>
        @endforeach
        </div>
        
    </div>
        </div>
    </div>
    <!-- END: Content-->

    @endsection