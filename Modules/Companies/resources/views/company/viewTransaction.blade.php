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
      
@endsection
@section('content')
 
    <section id="basic-datatable">
    <div style="padding-bottom:60px">
    @can('Add_Balance_Company')
        <a href="{{ route('admin.addTransaction') }}"  style="float:left;margin-left:10px"  >
            <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">اضافة   رصيد  </span>
        </a>
        @endcan
        </div>
      <!-- BEGIN: Content-->
      <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <h3 style="margin-right:15px">  اضافة رصيد للشركات   </h3>
                <!-- Role cards -->
        <div class="row">
            <div class="col-12">
                
                <div class="card">
              
                <div class="table-responsive">
                  <table class="table">
                        <thead>
                        <tr>

                         <th>المبلغ  </th>
                         <th> الجهة </th>
                         <th>اسم الشخص   </th>
                         <th>بامر من     </th>
                         <th> ملاحظات   </th>
                         <th> تاريخ   </th>
                         <th> الحالة   </th>
                       <th>الادوات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($CompanyTransactions as $CompanyTransaction)
                        <tr>
                            <td>{{$CompanyTransaction['amount']}}</td>
                            <td>{{$CompanyTransaction['side_name']}}</td>
                            <td> {{$CompanyTransaction['user_name']}} </td>
                            <td>{{$CompanyTransaction['order_from']}}</td>
                            <td>{{$CompanyTransaction['notes']}}</td>
                            <td>{{$CompanyTransaction['created_at']}}</td>
                            <td>
                            @if($CompanyTransaction['status'] ==1)
                            <span class="badge rounded-pill  badge-light-info">قيد  الموافقة</span>
                            @else
                            <span class="badge rounded-pill  badge-light-success">تمت  الموافقة</span>
                            @endif
                            </td>
                          
                            <td>
                            @if($CompanyTransaction['status'] ==1)
                            @can('Accept_Balance_Company')
                            <a href="{{ route('admin.confirmTransaction',$CompanyTransaction['id']) }}"   >
                            <span class="btn btn-primary  waves-effect waves-float waves-light">تاكيد     </span>
                            </a>
                            @endcan
                            @endif
                            </td> 
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>

       

    </section>
    <!--/ Basic table -->
@endsection


