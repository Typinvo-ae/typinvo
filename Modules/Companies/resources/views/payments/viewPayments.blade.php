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

    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">

       

        
			<link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/charts/apexcharts.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/plugins/forms/pickers/form-pickadate.css')}}">
      
@endsection
@section('content')
 
    <section id="basic-datatable">

    <div style="padding-bottom:60px">

    <div class="content-header row">
    <form method="get" action="">
        <div class="row">
        <div class="col-md-3 mb-1">
            <label class="form-label" for="basic-icon-default-date">   من تاريخ  </label>
            <input type="text" name="from_date" value="{{$fromDate}}"   id="fp-default" class="form-control flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly">

        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label" for="basic-icon-default-date">   الى تاريخ  </label>
            <input type="text" name="to_date"  value="{{$toDate}}" id="fp-default" class="form-control flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly">
        </div> 

        <div class="col-md-3 mb-1">
            <label class="form-label" for="basic-icon-default-date">    الموظف  </label>
            <select name="employee_id" 
            class="select2 form-select select2-hidden-accessible" id="select2"
            data-select2-id="select2" tabindex="-1"  aria-hidden="true">
            <option value="">اختر </option>
            @foreach($users  as $user)
            <option @if($user->id==auth()->user()->id) 
            selected
            @endif
                
            
            value="{{$user->id}}"> {{$user->name}}</option>
            @endforeach
        </select>
        </div>

        <div class="col-md-1 mt-10" style="margin-top:25px">
        <button type="submit" class="btn btn-primary data-submit me-1">بحث</button>
        </div>
    </form>
  
    <div class="col-md-2 mb-1">
    <a href="{{ route('admin.addPayments') }}"  style="float:left;margin-left:10px"  >
        <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">اضافة   دفعة  </span>
    </a>
    </div>

    </div>

      <!-- BEGIN: Content-->
      <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <h3 style="margin-right:15px">    المدفوعات   </h3>
                <!-- Role cards -->
        <div class="row">
            <div class="col-12">
                
                <div class="card">
              
                <div class="table-responsive">
                  <table class="table">
                        <thead>
                        <tr>

                         <th>المرجع  </th>
                         <th> الموظف </th>
                         <th> الجهة   </th>
                         <th> الموظف المسؤول        </th>
                         <th> بامر من    </th>
                         <th> ملاحظات   </th>
                       <th>الحالة</th>
                       <th>التمن</th>
                       <th>الفاتورة</th>
                       <th>تاريخ الاصدار</th>
                       <th>الادوات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paymentsData as $payments)
                        <tr>
                       
                            <td>#{{$payments['reference']}}</td>
                            <td>{{$payments['user_name']}}</td>
                            <td>{{$payments['side_name']}}</td>
                            <td> {{$payments['employee_name']}}  </td>
                            <td>{{$payments['order_from']}} </td>
                            <td>{{$payments['notes']}} </td>
                            <td>
                            @if($payments['status'] ==1)
                            <span class="badge rounded-pill  badge-light-info">قيد  الموافقة</span>
                            @else
                            <span class="badge rounded-pill  badge-light-success">تمت  الموافقة</span>
                            @endif

                            </td>
                            <td>{{$payments['amount']}} </td>
                            <td>--- </td>
                            <td>{{$payments['created_at']}} </td>

                        
                            <td>
                            @if($payments['status'] ==1)
                            @can('Add_Payment_Expenses')
                            <a href="{{ route('admin.confirmPayment',$payments['id']) }}"   >
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


@section('js')

@include('common::includes.datatable')

<script src="{{ asset('admin/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

<script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/pickadate/legacy.js')}}"></script>

<script src="{{ asset('admin/js/scripts/forms/pickers/form-pickers.js')}}"></script>


      

@endsection
