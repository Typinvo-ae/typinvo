@extends('common::layouts.master')

@section('content')

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

        <form   action="{{ route('admin.updateCompanyInvoice') }}" method="POST"
            enctype="multipart/form-data">
            {{ csrf_field() }}
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
                                            <h6 class="mt-2">اسم الشركة :{{@$orderDetails['Company']['name_ar']}}</h6>
                                     
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
                            <input type="hidden" id="totalTaxHidden" name="totalTaxHidden" value="">
                            <input type="hidden" id="totalPrintingPriceHidden" name="totalPrintingPriceHidden"  value="">
                            <input type="hidden" id="totalGovernmentPriceHidden" name="totalGovernmentPriceHidden"  value="">
                            <input type="hidden" id="totalWithoutTaxHidden" name="totalWithoutTaxHidden" value="">
                            <input type="hidden" id="totalWithTaxHidden" name="totalWithTaxHidden" value="">
                         <input type="hidden" name="order_id" value="{{$order_id}}">
                         <input type="hidden" id="invisibleDiscountHidden" name="invisibleDiscount[]" value="">
                        <tbody>
                        @foreach($orderDetails['SubData'] as $order)
                            <tr>
                           
                            <td class="py-1">
                            
                                </td>
                                <td class="py-1">
                                    <span class="fw-bold">{{ $order['all_title']}}
                                    </span>
                                </td>
                                <td class="py-1">
                                    <span  class="fw-bold">{{ $order['total']}}</span>
                                </td>
                                <td class="py-1">
                                    <span class="fw-bold">
                                    <input type="number" class="form-control"  id="totalCount-{{ $order["id"]; }}"   onchange="totalCountFunc(this.value,{{ $order["id"]; }} ,{{ $order["total"]; }},{{ $order['tax'];}},{{$countData}},{{ $orderDetails['SubData']; }})"  name="totalCount[]"   value="{{ $order['qty']}}">

                                    </span>
                                </td>
                                <td class="py-1">
                                    <span class="fw-bold">{{ $order['government_price']}}</span>
                                </td>
                                
                                <td class="py-1">
                                    <span class="fw-bold">{{ $order['printing_price']}}</span>
                                </td>
                                
                                <td class="py-1">
                        
                                    <input type="number"  class="form-control"  id="discount-{{ $order["id"]; }}" onchange="totalCountFunc(this.value,{{ $order["id"]; }} ,{{ $order["total"]; }},{{ $order['tax'];}},{{$countData}},{{ $orderDetails['SubData']; }})"   name="totalDiscount[]"   value="{{ $order['discount']}}">
                                </td>
                                <td class="py-1">
                                    
                                    <input type="checkbox"   id="invisible_discount-{{ $order["id"]; }}" onchange="totalCountFunc(this.value ,{{ $order["id"]; }} ,{{ $order["total"]; }},{{ $order['tax'];}},{{$countData}},{{ $orderDetails['SubData']; }})"   value="{{ $order['invisible_discount']}}"   class="form-check-input"  />
                                </td>
                                <td class="py-1">
                                    <span class="fw-bold">{{ $order['tax']}}%</span>
                                </td>
                                <td class="py-1">
                                    <span   id="itemTotal-{{ $order["id"]; }}" class="fw-bold">{{ $order['total_without_tax']}}</span>
                                    
                                </td>
                                
                            </tr>
                            @endforeach
                           
                            @if($countServices!=1)
                            <tr>
                            <td class="pe-1"> </td>
                            <td class="pe-1"> </td>
                            <td class="pe-1">{{ $TotalAmount}} </td>
                            <td class="pe-1">{{ $totalQty}} </td>
                            <td class="pe-1" ><span id="totalGovernmentPrice" >{{ $TotalgovernmentPrice}}</span>  </td>
                            <td class="pe-1" ><span id="totalPrintingPrice" >{{ $TotalprintingPrice}}</span> </td>
                            <td class="pe-1">{{ $Totaldiscount}} </td>
                            <td class="pe-1">{{ $totalDiscountInvisible}} </td>
                            <td class="pe-1"> </td>
                            <td class="pe-1"> <span id="totalWithoutTax" >{{ $subTotalWithoutTax}}</span> </td>
                        </tr>
                        @endif
                      
                        <tr>
                            <td class="pe-1"> </td>
                            <td class="pe-1"> </td>
                            <td class="pe-1"></td>
                            <td class="pe-1"> </td>
                            <td class="pe-1"></td>
                            <td class="pe-1"> </td>
                            <td class="pe-1"> </td>
                            <td class="pe-1"> </td>

                            <td  class="pe-1"><span id="totalTax" >{{ $totalTaxAmount}}</span> درهم </td>
                            <td   class="pe-1">  <span id="totalWithTax" >{{ $subTotal}}</span>درهم</td>
                        </tr>
                        </tbody>
                        
                                  
                        </table>
                            </div>
                            <hr class="invoice-spacing mt-0" />
                            <hr class="invoice-spacing mt-0" />
                    
                            <!-- Product Details ends -->
                            <div class="card-body invoice-padding invoice-product-details">
                                    <div class="row mt-1">
                                        <div class="col-12 px-0">
                                         
                                        </div>
                                    </div>
                            </div>
                            

                            <input type="hidden" name="company_id" value="{{$company_id}}">

                            <div class="row w-100 pe-lg-0 pe-1 py-2 ">
                                        
                            <div class="col-lg-3 col-12 my-lg-0 my-2">
                                    <p class="card-text col-title mb-md-2 mb-0">  <span class="badge rounded-pill  badge-light-success">المبلغ المستلم (درهم)   </span> </p>

                                    <input type="number" name="totalPaid"   class="form-control" value="0"  onchange="recievedFunc(this.value)"  step="any"  id="recieved" />
                                </div>
                                <div class="col-lg-2 col-12 my-lg-0 my-2">
                                    <p class="card-text col-title mb-md-2 mb-0"><span class="badge rounded-pill  badge-light-success">المبلغ المتبقى (درهم)   </span>     </p>
                                    <input type="number" name="totalRemain" class="form-control" disabled value="0"  step="any" id="remain" />
                                </div>
                                
                            </div>

                            <div class="card-body invoice-padding ">
                                    <div class="row">
                                <div class="col-3">
                                            <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal" data-bs-target="#send-invoice-sidebar">
                                       تاكيد
                                    </button>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </form>
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
    <script >
                        
        function totalCountFunc(item_val,item_id ,item_price,tax,count,order) {
        
            
            var invisible_discount = $("#invisible_discount-"+item_id).val();
            var discount = $("#discount-"+item_id).val();
            var totalCount = $("#totalCount-"+item_id).val();
        
            
            if(invisible_discount==0)
            {
                document.getElementById('itemTotal-'+item_id).innerText =(item_price* totalCount) -discount;
                document.getElementById('invisible_discount-'+item_id).value=1;


            }else{

                document.getElementById('itemTotal-'+item_id).innerText =(item_price* totalCount) ;
                document.getElementById('invisible_discount-'+item_id).value=0;
            }
        
            var totalTax = 0;
            var totalPrintingPrice = 0;
            var totalGovernmentPrice = 0;
            var totalWithoutTax = 0;
            var totalWithTax=0;
            var invisible_discount=0;
            var  invisibleDiscountHidden=[];
            for(i=0;i<count;i++)
            {
                
                var totalCount = parseFloat($("#totalCount-" + order[i]['id']).val());
                var totalDiscount = parseFloat($("#discount-" + order[i]['id']).val());
                var invisible_discount= parseFloat($("#invisible_discount-" + order[i]['id']).val());

                var invisibleDiscountHidden=  parseFloat(order[i]['id']);
            // Calculate the tax for the current order item and add it to totalTax
            totalTax += (totalCount * item_price * tax) / 100;

            totalPrintingPrice += parseFloat(order[i]['printing_price'])*totalCount;  
            
            totalGovernmentPrice += parseFloat(order[i]['government_price'] )*totalCount;  
            
            if(invisible_discount==0)
            {
                totalWithoutTax +=totalPrintingPrice+totalGovernmentPrice-totalDiscount;

                totalWithTax +=totalPrintingPrice+totalGovernmentPrice-totalDiscount+totalTax ;
                
            }else{
                totalWithoutTax +=totalPrintingPrice+totalGovernmentPrice;

                totalWithTax +=totalPrintingPrice+totalGovernmentPrice +totalTax;
            }

            }
               //console.log(totalGovernmentPrice);
                document.getElementById('totalTax').innerText =totalTax;
                document.getElementById('totalPrintingPrice').innerText =totalPrintingPrice;
                document.getElementById('totalGovernmentPrice').innerText =totalGovernmentPrice;
                document.getElementById('totalWithoutTax').innerText =totalWithoutTax;
                document.getElementById('totalWithTax').innerText =totalWithTax;

                document.getElementById('totalTaxHidden').value = totalTax;
                document.getElementById('totalPrintingPriceHidden').value = totalPrintingPrice;
                document.getElementById('totalGovernmentPriceHidden').value = totalGovernmentPrice;
                document.getElementById('totalWithoutTaxHidden').value = totalWithoutTax;
                document.getElementById('totalWithTaxHidden').value = totalWithTax;
                document.getElementById('invisibleDiscountHidden').value = invisibleDiscountHidden;
                

            }
            
            function recievedFunc(Val ) {

                var totalCount = document.getElementById('totalWithTax').innerText ;

                //console.log(totalCount);
                
                var dataAll=0;

                if(totalCount-Val >=0)
                {
                    document.getElementById('remain').value= totalCount-Val;
                }else{
                    document.getElementById('remain').value=0;

                }
                //document.getElementById('RemainHidden').value = RemainHidden;
            }
            </script>
<style>
    .incomData{
display:none;
}
</style>
@endsection