<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/themes/semi-dark-layout.css')}}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/pages/app-invoice-print.css')}}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style-rtl.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body   class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39+Extended+Text&display=swap" rel="stylesheet">
<style>
html, body {
    direction: rtl !important;
}
    .barcode{
    border: 1px solid;
    padding: 10px;
    font-family: 'Libre Barcode 39 Extended Text'; 
    font-size: 55px;
    
    }
    .fontCustom{
        font-size:20px !important;
    }
    .fontCustom2{
        font-size:25px !important;
    }
 .fontCustom3{
    font-size:18px !important;
 }

    .underline {
    text-decoration: underline;
}

</style>

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="justify-content-between ">
                        <div>
                            <div class="d-flex mb-1">
                            <span  class="barcode">358853</span>
                               
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom:20px;margin-top:-20px" class="d-flex justify-content-center flex-md-row flex-column mt-0 text-center">
                        <h3  style="margin-left:100px" class="invoice-title">
                            {{$UserDetails['company_name']}}
                        </h3>
                    </div>
                    <div class="row pb-2">
                        <div class="col-sm-6">
                            <h4 style="margin-top:50px" class="mb-1 fontCustom2">{{$UserDetails['company_title']}}  </h4>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-2">
                            <table>
                                <tbody>
                                <tr>
                                   <td> <span class="fontCustom" style="margin-left:50px"  >  {{@$ManageInvoice['company_title']}} :</span> <input  style="margin-left:50px"  type="text" class="form-control  " value="{{$Company['name_ar']}}"></td>
                                    </tr>
                                    <tr>
                                    <td> <span  class="fontCustom" style="margin-left:50px">    {{@$ManageInvoice['delegate_tax_number']}}:</span> <input   style="margin-left:50px"  type="text" class="form-control " value="{{$Company['tax_number']}}" ></td>
                               </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div style="margin-bottom:20px;margin-top:-20px" class="d-flex justify-content-center flex-md-row flex-column mt-0 text-center">
                        <h3   class="invoice-title">
                            <span  style="margin-left:100px" class="invoice-number fontCustom2">  فاتورة ضريبة  </span>
                        </h3>
                    </div>
                    <div class="row pb-2">
                        <div  class="col-sm-6">
                            <h4  class="mb-1 fontCustom"> التاريخ :{{$created_at}}</h4>
                            <p  class="mb-1 fontCustom"> {{@$ManageInvoice['company_identifier']}}  {{$orderDetails['unique_order_id']}} </p>
                            <p  class="mb-1 fontCustom">{{@$ManageInvoice['company_phone']}}    :{{$UserDetails['company_phone']}}   </p>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-2">
                            <table>
                                <tbody>
                                <tr>
                                   <td> <span style="margin-left:50px" class="fontCustom">{{@$ManageInvoice['company_tax_number']}}  :</span> <input  style="margin-left:50px"  type="text" class="form-control "  value="{{$UserDetails['company_tax_number']}}"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                  
                 <div class="table-responsive mt-2">
                 <span class="invoice-number fontCustom">       {{$UserDetails['name']}} </span>
                    <table style="width:90%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="py-1 ps-4 fontCustom"> الرقم </th>
                                    <th class="py-1 fontCustom"> {{@$ManageInvoice['service_unit']}}  </th>
                                    <th class="py-1 fontCustom">  {{@$ManageInvoice['service_count']}} </th>
                                    <th class="py-1 fontCustom">  {{@$ManageInvoice['unit_price']}} </th>
                                    <th class="py-1 fontCustom">  {{@$ManageInvoice['total_price']}} </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetails['SubData'] as $key=>$order)
                                <tr>
                                    <td class="py-1 ps-4">
                                        <p class="fw-semibold mb-25">{{$key+1}}  </p>
                                    </td>
                                    <td class="py-1">
                                        <strong>{{ $order['all_title']}}</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>{{ $order['qty']}}</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>{{ $order['total']}}</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>{{ $order['total_without_tax']}}</strong>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row pb-2">
                        <div  class="col-sm-6">
                          
                            <h2  class="mb-1">  {{@$ManageInvoice['total_price']}}</h2>
                            <h2  class="mb-1">{{@$ManageInvoice['tax']}} </h2>
                        </div>
                        <div class="col-sm-4 mt-sm-0 mt-2">
                        <div  class="col-sm-8">
                           
                            <h3 style="margin-right:30px"  class="mb-1 underline"> {{ $subTotal}}<h3>
                            <h3  class="mb-1 underline"> {{ $totalTaxAmount}}</h3>
                        </div>
                        </div>
                    </div>

                    <div class="table-responsive ">
                    <table style="width:90%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="py-1 ps-4 fontCustom">   {{@$ManageInvoice['all_total_price']}}</td>
                                    <td class="py-1 fontCustom">{{ $subTotal}} {{@$ManageInvoice['dirham']}}  </td>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1 ps-4 fontCustom">
                                            {{@$ManageInvoice['total_paid']}}
                                    </td>
                                    <td class="py-1 fontCustom">{{ $orderDetails['total_paid']}} {{@$ManageInvoice['dirham']}}  </td>
                                </tr>
                                <tr>
                                    <td class="py-1 ps-4 fontCustom">
                                             {{@$ManageInvoice['remaining_debt_amount']}}
                                    </td>
                                    <td class="py-1 fontCustom">{{ $orderDetails['total_remain']}}   {{@$ManageInvoice['dirham']}} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                    <div class="row pb-2">
                        <div  class="col-sm-6">
                        <h4  class="mb-1 fontCustom">   تفاصيل الحساب البنكى : </h4>
                            <p  class="mb-1 fontCustom"> {{$UserDetails['bank_name']}}  </p>
                            <p  class="mb-1 fontCustom">  رقم الحساب:{{$UserDetails['bank_number']}}   </p>
                            <p  class="mb-1 fontCustom">   {{$UserDetails['send_to_details']}}  </p>
                        
                        </div>
                        <div class="col-sm-3 mt-sm-0 mt-2 green-border justify-content-center flex-md-row flex-column mt-0 text-center">
                         
                        
                        <h4  class="mb-1  fontCustom3">    {{$UserDetails['company_name']}}      </h4>
                            <p  class="mb-1 fontCustom3">  {{ $mainOrderDetails['payType']}}</p>
                            <p  class="mb-1 fontCustom3">   {{$created_at}}  </p>
                  
                       
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-xl-11 col-md-11 col-11">
                            <button  style="color:inherit"  class="btn  w-100  fontCustom" >
                                شكرا لك على استخدام الخدمه الخاصة بنا 
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
    .green-border {
    border: 4px solid #81d181 !important;
    padding: 10px;
    }
        </style>
    <!-- END: Content-->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin/js/scripts/pages/app-invoice-print.js')}}"></script>
    <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>