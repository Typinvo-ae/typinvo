@extends('common::layouts.master')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39+Extended+Text&display=swap" rel="stylesheet">
<style>

    .barcode{
    border: 1px solid;
    padding: 10px;
    font-family: 'Libre Barcode 39 Extended Text'; 
    font-size: 55px;
    
    }
    .textLeft{
        text-align:left
    }
    .underline {
    text-decoration: underline;
}
</style>

    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

    
          
                   
            <section class="invoice-edit-wrapper" >

            
                <div class="row invoice-edit " >

                
                    <!-- Invoice Edit Left starts -->
                    
                    <div class="col-xl-10 col-md-10 col-12">

                    
                        <div class="card invoice-preview-card">

                              <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">
                                             
                                            <span  class="barcode">358853</span>
                                            </div>
                                          
                                        </div>
                                       
                                    </div>

                                    <div class="d-flex justify-content-center flex-md-row flex-column invoice-spacing mt-0">
                                       
                                        <div class="mt-md-0 mt-2 text-center">
                                            <h4 style="margin-top:15px ;font-size: 16px;"  class="invoice-title">
                                                
                                                <span class="invoice-number">اكسجين لخدمات الطباعة-oxygen type services</span>
                                            </h4>
                                         
                                        </div>
                                    </div>
                                    <div  class="card-body invoice-padding pt-0">
                                        <div class="row invoice-spacing">
                                            <div class="col-xl-8 ">
                                                <h5 style="margin-right:40px" class="mb-2 mt-5">Abu Dubai UAE</h5>
                                            </div>
                                            <div style="direction:ltr" class="col-xl-4 ">
                                        
                                                <span   class="title ">Name/Address</span>
                                                <div class="d-flex align-items-center mb-1">
                                                    <input  style="width:320px !important; height: 22px;"  type="text" class="form-control invoice-edit-input date-picker flatpickr-input" readonly="readonly" fdprocessedid="5g1ytw">
                                                </div>

                                                <span class="title">Customer TRN </span>
                                                <div class="d-flex align-items-center mb-1">
                                                    <input  style="width:320px !important;height: 22px;" type="text" class="form-control invoice-edit-input date-picker flatpickr-input" readonly="readonly" fdprocessedid="5g1ytw">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="d-flex justify-content-center flex-md-row flex-column invoice-spacing mt-0">
                                            
                                            <div class="mt-md-0 mt-2 text-center">
                                                <h4 style="margin-top:15px ;font-size: 16px;"  class="invoice-title">       
                                                    <span class="invoice-number">  فاتورة ضريبية/TAX INVOICE</span>
                                                </h4>
                                            </div>
                                        </div>

                                        <div  class="card-body invoice-padding pt-0">
                                                <div class="row invoice-spacing">
                                                    <div class="col-xl-8 ">
                                                    <div class="invoice-number">  Date :1-1-2022</div>
                                                    <div class="invoice-number">  Ref NO:#1233212</div>
                                                    <div class="invoice-number">  Contact :000992233</div>
                                                    </div>
                                                    <div style="direction:ltr" class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                
                                                        <span   class="title ">TRN/الضريبى التسجيل رقم</span>
                                                        <div class="d-flex align-items-center mb-1">
                                                            <input  style="width:320px !important;    height: 22px;"  type="text" class="form-control invoice-edit-input date-picker flatpickr-input" readonly="readonly" fdprocessedid="5g1ytw">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <!-- Header ends -->
                                </div>
                            <!-- Header starts -->
                                    <div class="card-body invoice-padding pb-0">
                                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                            @if(count($SubInvoices)!=0)
                                            <div class="mt-md-0 mt-2">
                                                    <h4 class="invoice-title">
                                                        الفواتير 
                                                    </h4>
                                                    <div class="invoice-date-wrapper">
                                                        @foreach($SubInvoices as $key=>$value)
                                                        <p class="invoice-date-title">  <a href="{{route('admin.userInvoice', $value['id'])}}"> {{$value['unique_order_id']}}  </a>
                                                        
                                                        @if( $value['order_current_main']==0)
                                                        (رئيسية)
                                                        @else
                                                        (فرعية)
                                                        @endif
                                                    </p>
                                                        @endforeach
                                                    </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                            <!-- Header ends -->
                            <span   style="direction:ltr;margin-left:20px">AdMIN-صادق</span> 

                            <!-- Address and Contact starts -->
                            <div style="margin:13px" class="table-responsive">
                            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th class="py-1">Total</th>
                                        <th class="py-1">Price</th>
                                        <th class="py-1"> Units</th>
                                        <th class="py-1"> Appication</th>
                                        <th class="py-1"> 	No</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($orderDetails['SubData'] as $order)
                                        <tr>
                                        <td class="py-1">
                                                <span class="fw-bold">1</span>
                                            </td>
                                        <td class="py-1">
                                                <span class="fw-bold">1</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['total']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['qty']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['total_without_tax']}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                           </div>
                           
                           <div  class="card-body invoice-padding pt-0">
                                        <div class="row invoice-spacing">
                                            <div class="col-xl-8 ">
                                            <div style="margin-right:120px" class="invoice-number text-right underline">   388</div>
                                            <div class="invoice-number text-center underline">  1.50</div>
                                       
                                            </div>
                                            <div style="direction:ltr" class="col-xl-4 p-0 mt-xl-0 mt-2">
                                        
                                            <div class="invoice-number text-center">   Total</div>
                                            <div class="invoice-number text-center">  Total Vat/ضريبة القيمه المضافة</div>
                                            
                                        </div>
                               </div>
                                    <!-- Header ends -->
                            </div>
                      

                          
                            <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                         
                            <div style="margin:13px" class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>    22 AED</th>
                                            <th class="textLeft" >Amount Total Due</th>
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                          22 AED
                                            </td>
                                            <td  class="textLeft" >Amount Paid</td>
                                        </tr>
                                      
                                     
                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td>
                                            22 AED
                                            </td>
                                            <td  class="textLeft"  > Amount UnPaid</td>
                                        </tr>
                                      
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                        
                    <div class="col-xl-2 col-md-3 col-12 d-print-none">
                        <div class="card">
                            <div class="card-body">
                                <!-- <button type="button" class="btn btn-outline-primary w-100 mb-75">  طباعة  </button> -->
                                <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                            </div>
                        </div>
                    </div>
                        <!-- Invoice Edit Right ends -->
                    </div>
                </section>
              
        
            </div>
        </div>
    </div>
  

@endsection