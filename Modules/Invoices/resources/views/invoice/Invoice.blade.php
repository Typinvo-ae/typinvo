@extends('common::layouts.master')

@section('content')

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <section class="invoice-edit-wrapper">
                <div class="row invoice-edit">
                    <!-- Invoice Edit Left starts -->
                    <div class="col-xl-10 col-md-9 col-12">
                        <div class="card invoice-preview-card">
                            <!-- Header starts -->
                            <div class="card-body invoice-padding pb-0">
                                <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    
                                    <div class="invoice-number-date mt-md-0 mt-2">
                                    <h4 class="invoice-title">
                                    الفاتورة:
                                                <span class="invoice-number">{{$orderDetails['unique_order_id']}}</span>
                                            </h4>
                                            <h6 class="mt-2">الرقم الضريبي :{{$orderDetails['tax_number']}} </h6>
                                            <h6 class="mt-2">اسم العميل :{{$orderDetails['user_name']}}</h6>
                                     
                                    </div>
                                </div>
                            </div>
                            <!-- Header ends -->
                            <hr class="invoice-spacing" />
                            <!-- Address and Contact starts -->
                            <div class="table-responsive">
                                        <table class="table">
                                    <thead>
                                        <tr>
                                        <th class="py-1"> 	#</th>
                                            <th class="py-1"> الخدمة</th>
                                            <th class="py-1">سعر الوحدة</th>
                                            <th class="py-1">العدد</th>
                                            <th class="py-1">رسوم حكومية</th>
                                            <th class="py-1">رسوم  طباعة</th>
                                            <th class="py-1">خصم  </th>
                                            <th class="py-1">خصم مخفى  </th>
                                            <th class="py-1">الضريبة  </th>
                                            <th class="py-1"> الاجمالى  </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($orderDetails['services'] as $order)
                                        <tr>
                                        <td class="py-1">
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['all_title']}}
                                                </span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['total']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['qty']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['government_price']}}</span>
                                            </td>
                                            
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['printing_price']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['discount']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['discount_invisible']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['tax']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $order['total_without_tax']}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @if($countServices!=1)
                                        <tr>
                                        <td class="pe-1"> </td>
                                        <td class="pe-1"> </td>
                                        <td class="pe-1">{{ $TotalAmount}} </td>
                                        <td class="pe-1">{{ $totalQty}} </td>
                                        <td class="pe-1">{{ $TotalgovernmentPrice}} </td>
                                        <td class="pe-1">{{ $TotalprintingPrice}} </td>
                                        <td class="pe-1">{{ $Totaldiscount}} </td>
                                        <td class="pe-1">{{ $totalDiscountInvisible}} </td>
                                        <td class="pe-1"> </td>
                                        <td class="pe-1">{{ $subTotalWithoutTax}} </td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                                    </div>
                                    <hr class="invoice-spacing mt-0" />
                                    <hr class="invoice-spacing mt-0" />
                            <!-- Address and Contact ends -->
                            <!-- Product Details starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row invoice-spacing">
                                    <div class="col-xl-8 p-0">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-1"> الضريبة:</td>
                                                    <td><strong>{{ $totalTaxAmount}} درهم</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">  الاجمالى :</td>
                                                    <td><div >{{ $subTotal}} درهم</div></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                  
                                </div>
                            </div>
                            <!-- Product Details ends -->
                            <div class="card-body invoice-padding invoice-product-details">
                                    <div class="row mt-1">
                                        <div class="col-12 px-0">
                                         
                                        </div>
                                    </div>
                            </div>
                            <!-- Invoice Total starts -->
                            <div class="card-body invoice-padding ">
                                    <div class="row">
                                        <div class="col-12">
                                        <div class="mb-2">
                                                <label for="note" class="form-label fw-bold">المبلغ المستلم (درهم) :</label>
                                                <span> {{$orderDetails['total_paid']}}  </span>
                                            </div>
                                            <div class="mb-2">
                                                <label for="note" class="form-label fw-bold">المبلغ المتبقى (درهم) :</label>
                                                <span>   {{$orderDetails['total_remain']}}  </span>
                                            </div>
                                            <div class="mb-2">
                                                <label for="note" class="form-label fw-bold">ملحوظه:</label>
                                                <span>   {{$orderDetails['notes']}}  </span>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-body invoice-padding ">
                                    <div class="row">
                                <div class="col-3">
                                            <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal" data-bs-target="#send-invoice-sidebar">
                                       طباعة العميل
                                    </button>
                                </div>
                                
                                <div class="col-3">
                                <a href="#">
                                                <div class="btn btn-success w-100" >
                                طباعة الموظف 
                                </div>
                                </a>
                            </div>
                            </div>
                            
                        </div>
                        </div>
                        </div>
                        
                        <div class="col-xl-2 col-md-3 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" class="btn btn-outline-primary w-100 mb-75">  طباعة A4 </button>
                                    <button type="button" class="btn btn-outline-success w-100 mb-75">  طباعة A5 </button>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Edit Right ends -->
                    </div>
                </section>
              
        
            </div>
        </div>
    </div>
  
<style>
    .incomData{
display:none;
}
</style>
@endsection