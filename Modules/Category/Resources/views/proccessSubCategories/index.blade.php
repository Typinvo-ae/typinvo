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
<div class="row">
           <div class="col-md-12 mb-1">
                <a href="{{ route('admin.invoiceMainCategory',1) }}"   >
             <span class="btn btn-info mb-1 waves-effect waves-float waves-light">الرئيسية   </span>
              </a>
      
            @foreach ($objectCatgoryChildsNames as $key=>$value)
          
              <a href="{{ route('admin.viewControlSubCategory',[ $value['department_id'],$companyId]) }}"   >
             <span class="btn btn-info mb-1 waves-effect waves-float waves-light">{{$value['title']}}    </span>
              </a>
    
              @endforeach

                </div>
                 <div class="col-md-4 mt-10" >
            </div>
  </div>

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
    
              
    @foreach ($AllCategory as $mainCategory)
    
        <div class="col-xl-4 col-lg-6 col-md-6">
        @if($mainCategory['subCount']!=0)

            @if($mainCategory['checkCategory']=='card')
          <a href="{{ route('admin.viewControlSubCategory',[ $mainCategory->id,$companyId]) }}" >
            @elseif($mainCategory['checkCategory']=='service' && $companyId==0)
            <a href="{{ route('admin.invoiceCategories', $mainCategory->id) }}" >
            @else
            <a href="{{ route('admin.invoiceCompanyCategories',[ $mainCategory->id,$companyId]) }}" >
            @endif
          <div class="card">
          <div   @if(empty($mainCategory->image)) style="height:152px"  @endif class="card-body">
                   
                <div class="d-flex justify-content-between">
               
                   <span style="color:inherit">  عدد العناصر ({{$mainCategory['subCount']}}) </span>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                        @if(!empty($mainCategory->image))
                           <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" style="width:70px;height:66px" src="{{asset('uploads/Category')}}/{{$mainCategory->image}}" alt="Avatar" />
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div   class="d-flex justify-content-between align-items-end mt-1 pt-25" >
                            <div class="role-heading">
                                <h4  @if(empty($mainCategory->image)) style="margin-top:50px" @endif  class="fw-bolder">{{$mainCategory['title']}}</h4>
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