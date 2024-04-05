@extends('common::layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/forms/select/select2.min.css">
@endsection
@section('content')
   
      

<div class="row">
                <div class="col-md-4 mb-1">
                <a href="{{ route('admin.mainCategory') }}"   >
             <span class="btn btn-info mb-1 waves-effect waves-float waves-light">الرئيسية   </span>
              </a>


                </div>
                 <div class="col-md-4 mt-10" style="margin-top:25px">
            </div>
  </div>


        @if( $categoryTypecheck1=='true' &&  $categoryTypecheck2=='false' )
    <div style="padding-bottom:60px">
               <a href="{{ route('admin.createCardCategory') }}"  style="float:left;margin-bottom:10px" >
                    <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">اضافة  قسم فرعى   </span>
                </a>
     </div>
    @elseif( $categoryTypecheck1=='true' &&  $categoryTypecheck2=='true' )
           <div >

                <a href="{{ route('admin.createCardCategory') }}"  style="float:left;margin-bottom:10px" >
                    <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">اضافة  قسم فرعى   </span>
                </a>
        </div>
        @endif


        @if( $categoryTypecheck2=='true')
        <div style="padding-bottom:60px">
        <a href="{{ route('admin.createServiceCategory') }}"  style="float:left;margin-left:10px"  >
            <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">اضافة   خدمه  </span>
        </a>
        </div>
        @endif
 
    <section id="basic-datatable">
   
      <!-- BEGIN: Content-->
      <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <h3 style="margin-right:15px"> {{@$MainCategory['name']}}  </h3>
                <!-- Role cards -->
                @if( $categoryTypecheck1=='true' )   
                <div class="row">
    @foreach ($mainCategories as $mainCategory)
        <div class="col-xl-4 col-lg-6 col-md-6">
            
        <div class="card" >
        <a href="{{ route('admin.viewSubDataCategory', $mainCategory->id) }}">
                <div class="card-body">
                <div style="margin-bottom:40px" class="d-flex justify-content-between">
                <h4>   {{$mainCategory['title']}}  </h4>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                        @if(!empty($mainCategory->image))
                           <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{asset('uploads/Category')}}/{{$mainCategory->image}}" alt="Avatar" />
                            </li>
                            @endif
                        </ul>
                    </div>

                    <div>
                    <div >
                            <div class="role-heading">
                            
                                <a href="{{ route('admin.getEditCardCategory', $mainCategory->id) }}" class="role-edit-modal">
                                    <small class="fw-bolder">تعديل  </small>
                                </a>
                                <a href="{{ route('admin.DeleteCardCategory', $mainCategory->id) }}" class="role-edit-modal " style="float:left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer font-medium-3" data-repeater-delete=""><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        
                                    </a>
                            </div>
                        </div>
                        </div>  
                   <!-- </a> -->
                </div>
</a>
            </div>
        </div>
        @endforeach
        </div>
        
    </div>
        </div>
    </div>
    <!-- END: Content-->
    
        @else


        <div class="row">
            <div class="col-12">
                
                <div class="card">
              
                <div class="table-responsive">
                  <table class="table">
                        <thead>
                        <tr>
                         <th>الاسم</th>
                         <th>رسوم الحكومي </th>
                         <th>رسوم الطباعة </th>
                         <th>الثمن   </th>
                        <th>الادوات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category['title']}}</td>
                            <td>{{$category['government_price']}}  (درهم)</td>
                            <td>{{$category['printing_price']}}  (درهم)</td>
                            <td>{{$category['total']}}  (درهم)</td>
                        
                            <td>
                              
                                <a href="{{ route('admin.getEditServiceCategory',$category['id']) }}"   >
                                    <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">تعديل     </span>
                                    </a>
                                    <a href="{{ route('admin.deleteServiceCategory',$category['id']) }}"   >
                                    <span class="btn btn-danger mb-1 waves-effect waves-float waves-light">حذف     </span>
                                    </a>
                         

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>

        @endif

    </section>
    <!--/ Basic table -->
@endsection


@section('js')
    @include('common::includes.datatable')

    <script src="{{ asset('') }}admin/vendors/js/forms/select/select2.full.min.js"></script>
    <script>
        var select = $('.select2');

        select.each(function() {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%',
                dropdownParent: $this.parent()
            });
        });
    
        </script> 

    @if (session('updated'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم تعديل  الخدمه بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    @if (session('created'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم انشاء الخدمه بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    
    
@endsection
