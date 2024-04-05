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
   
      <!-- BEGIN: Content-->
      <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            <form method="get" action="">
        <div class="row">
        <div class="col-md-2 mb-1">
            <label class="form-label" for="basic-icon-default-date">   من تاريخ  </label>
            <input type="text" name="from_date" value="{{$fromDate}}"   id="fp-default" class="form-control flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly">

        </div>

        <div class="col-md-2 mb-1">
            <label class="form-label" for="basic-icon-default-date">   الى تاريخ  </label>
            <input type="text" name="to_date"  value="{{$toDate}}" id="fp-default" class="form-control flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly">
        </div> 

        <div class="col-md-2 mb-1">
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

        <div class="col-md-2 mb-1">
            <label class="form-label" for="basic-icon-default-date">    حالة الفاتورة  </label>
            <select name="invoice_status" 
            class="select2 form-select select2-hidden-accessible" id="select2"
            data-select2-id="select2" tabindex="-1"  aria-hidden="true">
            <option value="">اختر </option>
            <option value="1">مدفوعة كلها </option>
            <option value="2">متبقى </option>
            <option value="3">غير مدفوعة </option>
          
        </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label" for="basic-icon-default-date">    المرجع للفاتورة  </label>
            <input type="text"  class="form-control" name="invoice" />
        </div>

        <div class="col-md-1 mt-10" style="margin-top:25px">
        <button type="submit" class="btn btn-primary data-submit me-1">بحث</button>

      
    </form>
   </div>
            <div class="content-body">
                <h3 style="margin-right:15px">  جميع الفواتير  </h3>
                <!-- Role cards -->
        <div class="row">
            <div class="col-12">
                
                <div class="card">
              
                <div class="table-responsive">
                  <table class="table">
                        <thead>
                        <tr>
                        <th> المرجع  </th>
                        <th> الموظف  </th>
                        <th> العميل  </th>
                        @can('Invoice_printing_fees')
                         <th>رسوم طباعة  </th>
                         @endcan
                         @can('Invoice_government_fees')
                         <th> رسوم حكومية </th>
                         @endcan
                         @can('Invoice_taxes')
                         <th> الضريبة   </th>
                         @endcan


                         <th> الثمن الاجمالى     </th>
                         <th> مدفوع   </th>
                         <th> الدين المتبقى   </th>
                         <th> حالة الفاتورة   </th>
                         <th> نوع الفاتورة</th>
                        
                         <th> الشركة</th>
                         <th> تاريخ</th>
                    
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Orders as $Order)
                        <tr>
                        <td>
                          <a
                          @if(@$Order['company_id']!=0)
                          href="{{route('admin.companyInvoice', $Order['id'])}}"
                          @else
                          href="{{route('admin.userInvoice', $Order['id'])}}"
                          @endif
                          
                          >{{$Order['unique_order_id']}}</a>
                          
                        </td>
                        <td>{{$Order['user_name']}}</td>
                        <td>عميل</td>
                        @can('Invoice_government_fees')
                            <td>{{$Order['government_price']}}</td>
                            @endcan
                            @can('Invoice_printing_fees')
                            <td>{{$Order['printing_price']}}</td>
                            @endcan
                            @can('Invoice_taxes')
                            <td> {{$Order['total_tax']}} </td>
                            @endcan
                            <td>{{$Order['subtotal']}}</td>
                            <td>{{$Order['total_paid']}}</td>
                            <td>{{$Order['total_remain']}}</td>
                            <td>
                            @if($Order['all_paid'] ==0 &&  $Order['total_paid']!=0)
                            <span class="badge rounded-pill  badge-light-danger">  مدفوع جزئى </span>

                            @elseif($Order['all_paid'] ==0 &&  $Order['total_paid']==0 )
                            <span class="badge rounded-pill  badge-light-danger">   غير مدفوع كلى </span>

                            @elseif($Order['all_paid'] ==1)
                            <span class="badge rounded-pill  badge-light-success">  مدفوعة كلها</span>
                            @else
                            <span class="badge rounded-pill  badge-light-warning">  حساب نقدى</span>
                          

                            @endif    

                            </td>
                            <td>
                                
                            @if($Order['order_current_main']==0)
                            <span class="badge rounded-pill  badge-light-success">   رئيسية</span>
                            @else

                            <span class="badge rounded-pill  badge-light-primary">  فرعية </span>
                            @endif
                                
                                </td>
                            <td>{{@$Order['Company']['name_ar']}}
                                
                            </td>
                            <td>{{@$Order['created_date']}}
                                
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