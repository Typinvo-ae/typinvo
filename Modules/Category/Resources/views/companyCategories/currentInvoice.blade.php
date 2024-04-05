@extends('common::layouts.master')

@section('content')

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

        @if(count($currentCartItems)==0)
           
           <center><h1  style="margin-top:200px">قم باضافة خدمات الى الفاتورة</h1>  </center>
             @else
             <form   action="{{ route('admin.saveCompanyInvoice') }}" method="POST"
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
                                    <h6 > الشركة  :</اh6>
                                    <hr class="invoice-spacing" />
                                    <div class="d-flex align-items-center ">
                                            <span class="title">اسم الشركة  :</span>
                                            <div>{{$CurrentCompany['name_ar']}}</div>
                                        </div>
                                      
                                        <div class="d-flex align-items-center">
                                            <span class="title"> الرقم الضريبي   :</span>
                                            <div>{{$CurrentCompany['tax_number']}}</div>
                                        </div>
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
                                            <th class="py-1"> 	الخدمة</th>
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
                                    @foreach($currentCartItems as $currentCartItem)
                                        <tr>
                                        
                                        <td class="py-1">
                                        <a href="#" onclick="delete_cart({{$currentCartItem['id']}},'هل ترغب فى تاكيد عملية الحذف')"  class="delete-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x font-medium-3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </a>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $currentCartItem['all_title']}}
                                                </span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $currentCartItem['service']['total']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $currentCartItem['qty']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $currentCartItem['service']['government_price']}}</span>
                                            </td>
                                            
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $currentCartItem['service']['printing_price']}}</span>
                                            </td>
                                           
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $currentCartItem['discount']}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{$currentCartItem['discountInvisible'] }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $currentCartItem['service']['mainCategory']['tax']}} %</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="fw-bold">{{ $currentCartItem['subTotalWithoutTax']}}</span>
                                              
                                            </td>
                                            <input type="hidden" value="{{ $currentCartItem['service_id']}}" name="service_id[]">
                                            <input type="hidden" value="{{ $currentCartItem['qty']}}" name="qty[]">
                                            <input type="hidden" value="{{ $currentCartItem['service']['government_price']}}" name="government_price[]">
                                            <input type="hidden" value="{{ $currentCartItem['service']['printing_price']}}" name="printing_price[]">
                                            <input type="hidden" value="{{ $currentCartItem['discount']}}" name="discount[]">
                                            <input type="hidden" value="{{ $currentCartItem['discountInvisible']}}" name="discountInvisible[]">
                                            <input type="hidden" value="{{ $currentCartItem['service']['mainCategory']['tax']}}" name="tax[]">
                                            <input type="hidden" value="{{ $currentCartItem['subTotalWithoutTax']}}" name="total_without_tax[]">
                                        </tr>
                                        @endforeach
                                        @if(count($currentCartItems)!=1)
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
                            <!-- Address and Contact ends -->
                            <input type="hidden" id="subTotal" value="{{ $subTotal}}" name="subTotal">

                            <input type="hidden" value="{{ $totalTaxAmount}}" name="total_tax">
                            <input type="hidden" value="{{ $Totaldiscount}}" name="total_discount">
                            <input type="hidden" value="{{ $totalDiscountInvisible}}" name="total_discount_invisible">

                            <!-- Product Details starts -->
                            <!-- <div class="card-body invoice-padding pt-0">
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
                            </div> -->
                            <!-- Product Details ends -->
                            <div class="card-body invoice-padding invoice-product-details">
                                    <div class="row mt-1">
                                        <div class="col-12 px-0">
                                        <a href="{{ route('admin.companyCategory', $CurrentCompany->id) }}">    
                                        <button type="button" class="btn btn-primary btn-sm btn-add-new" data-repeater-create>
                                                <i data-feather="plus" class="me-25"></i>
                                                <span class="align-middle">اضافة مغاملة جديدة للفاتورة</span>
                                            </button>
                                     </a>
                                     @if($payWithCompanyAccount=='true' && $CartPayWithCompanyAccount!=1)
                                     <a href="#" class="check-record">    
                                        <button type="button" class="btn btn-warning  btn-sm btn-add-new" >
                                               
                                                <span class="align-middle">   التثبت من الحساب النقدى</span>
                                            </button>
                                     </a>
                                     @endif 
                                        </div>
                                    </div>
                            </div>

                            <!-- Invoice Total starts -->
                            <div class="card-body invoice-padding ">
                               
                            @if( $CartPayWithCompanyAccount!=1)
                                 <div class="row">
                                       
                                         <div class="col-12">
                                            <div class="mb-2 form-check form-switch">
                                                <label for="note" class="form-label fw-bold">تم دفع الفاتورة بالكامل : </label>
                                                <input type="checkbox" class="form-check-input all_paid"  name="all_paid" value="1"  onchange="valueChanged()" checked  id="paymentTerms" />
                                            </div>
                                        </div>
                                    </div>  
                                @else
                                <input type="hidden" value="2" name="all_paid">

                                    @endif
                           
                                        
                                    <div class="incomData">
                                    <div class="row w-100 pe-lg-0 pe-1 py-2 ">
                                        
                                      <div class="col-lg-3 col-12 my-lg-0 my-2">
                                            <p class="card-text col-title mb-md-2 mb-0">  <span class="badge rounded-pill  badge-light-success">المبلغ المستلم (درهم)   </span> </p>


                                            <input type="number" name="total_paid"   class="form-control" value="0"  onchange="recievedFunc(this.value)"  step="any"  id="recieved" />
                                        </div>
                                        <div class="col-lg-2 col-12 my-lg-0 my-2">
                                            <p class="card-text col-title mb-md-2 mb-0"><span class="badge rounded-pill  badge-light-success">المبلغ المتبقى (درهم)   </span>     </p>
                                            <input type="number" name="total_remain" class="form-control" disabled value="0"  step="any" id="remain" />
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label for="note" class="form-label fw-bold">ملحوظه:</label>
                                                <textarea class="form-control" name="notes" rows="2" id="note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <script>

                                function recievedFunc(Val ) {
                               //     alert(Val);

                                var totalCount = $("#subTotal");
                                 var totalCounttVal=totalCount.val();

                                 if(totalCounttVal-Val >=0)
                                 {
                                    document.getElementById('remain').value= totalCounttVal-Val;
                                 }else{
                                    document.getElementById('remain').value=0;
                                 }

                        

                                }
                            </script>
                                <!-- Invoice Total ends -->

                            <div class="card-body invoice-padding ">
                                    <div class="row">
                                <div class="col-2">
                                            <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal" data-bs-target="#send-invoice-sidebar">
                                        تاكيد 
                                    </button>
                                </div>
                                </form>
                                <div class="col-2">
                                <a href="{{ route('admin.deleteInvoice') }}">
                                                <div class="btn btn-danger w-100">
                                الغاء 
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
             
           @endif
            </div>
        </div>
    </div>
      
<script>
   



function delete_cart(val,confirmText) {

if (confirm(confirmText) == true) {

    $.ajax({
    url : '{{ route('admin.delete_cart') }}',
    type:"POST",
    data:{
        "_token": "{{ csrf_token() }}",
        cart_id:val,
    
    },
    success:function (result) {
    location.reload();

    },
    error:function (error) {
        console.log(error);
    }
});

} else {
return false;
}

}
</script>
 <script type="text/javascript">
    function valueChanged()
    {
        if($('.all_paid').is(":checked"))   
        $(".incomData").hide();
        else
        $(".incomData").show();
    }
</script>
<style>
    .incomData{
display:none;
}
</style>
@endsection



@section('js')

@include('common::includes.datatable')

<script>
function checkedAll() {
    // this refers to the clicked checkbox
    // find all checkboxes inside the checkbox' form
    var elements = this.form.getElementsByTagName('input');
    // iterate and change status
    for (var i = elements.length; i--; ) {
        if (elements[i].type == 'checkbox') {
            elements[i].checked = this.checked;
        }
    }
}

        var select = $('.select2');

        select.each(function () {
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

  
    <script>
        $(function () {

   
    $('.invoice-product-details').on('click', '.check-record', function () {
        let that = this;
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: ' يمكن دفع بالحساب النقدى للشركة     ',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'نعم ، تاكيد العملية!',
            cancelButtonText : '  الغاء ',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(function (result) {
         
           
            if(   result.value==true)
            {
             
                $.ajax(
                {
                    
                    url: "{{ route("admin.payWithCompanyAccount") }}",
                    type: 'POST',
                    data: {
                        "_method": "POST",
                        "_token": token,
                    },
                    success: function (result){
                   
                      window.location.href = '{{ URL::asset("admin/currentCompanyInvoice") }}';
                    }
                });
                Swal.fire({
                    icon: 'success',
                    title: 'تم التاكيد!',
                    text: ' ',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            }
           
           
        });
    });
});

    </script>

    
@endsection
