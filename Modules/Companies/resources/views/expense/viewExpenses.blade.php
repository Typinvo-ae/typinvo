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
    <a href="{{ route('admin.addExpenses') }}"  style="float:left;margin-left:10px"  >
        <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">اضافة   مصاريف  </span>
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
                <h3 style="margin-right:15px">    المصاريف   </h3>
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
                         <th> موضوع   </th>
                         <th> المبلغ بدون ضريبة     </th>
                         <th> الضريبة    </th>
                         <th> الثمن   </th>
                       <!-- <th>الادوات</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ExpensesData as $Expenses)
                        <tr>
                       
                            <td>#{{$Expenses['reference']}}</td>
                            <td>{{$Expenses['user_name']}}</td>
                            <td>{{$Expenses['title']}}</td>
                            <td> {{$Expenses['amount_without_tax']}} درهم </td>
                            <td>{{$Expenses['tax']}} درهم</td>
                            <td>{{$Expenses['total_amount']}} درهم</td>
                            <!-- <td>

                            
                            </td> -->
                            
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
