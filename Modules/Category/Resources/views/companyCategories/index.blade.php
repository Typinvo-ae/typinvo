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
           <div class="col-md-12 mb-1">
           <a href="{{ route('admin.invoiceMainCategory',1) }}"   >
             <span class="btn btn-info mb-1 waves-effect waves-float waves-light">الرئيسية   </span>
              </a>
      
            @foreach ($objectCatgoryChildsNames as $key=>$value)
          
              <a href="{{ route('admin.viewControlSubCategory',[ $value['department_id'],$companyId]) }}"   >
             <span class="btn btn-info mb-1 waves-effect waves-float waves-light">{{$value['title']}}    </span>
              </a>
    
              @endforeach

                </div>
                 <div class="col-md-4 mt-10" >
            </div>
  </div>

<h3>{{@$MainCategory->name}}</h3>
<hr class="invoice-spacing" />
 
@if(checkUserCart()!='noCart')
    <a href="{{ route('admin.deleteInvoice') }}"   >
    <span  class="btn btn-danger  waves-effect waves-float waves-light ">انهاء فاتورة      </span>
    </a>
    @endif
    </div>
    </div>
    <!-- Basic table -->
    <div style="margin-bottom:20px">
    </div>
    <section >

    <div class="row">
            <div class="col-12">
                
                <div class="card">
              
                <div class="table-responsive">
                  <table class="table">
                        <thead>
                        <tr>
                        <th> الخدمه  </th>
                     
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        
                        <tr>
                        <form method="post" >
                        {{ csrf_field() }}
                 
                        <td>{{$category['title']}}/({{ $category["total"]; }} درهم)

                        <input type="hidden" name="service_id" value="{{ $category->id }}">

                        <div class="row d-flex align-items-end" >

                        <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" > تحديد العدد </label>
                                    <input type="number" class="form-control" id="totalCount-{{ $category["id"]; }}"  name="totalCount"  onchange="totalCountFunc(this.value ,{{ $category["id"]; }} ,{{ $category["total"]; }})"  value="1">
                                </div>
                            </div>

                         
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" >
                                  تحديد  الخصم (درهم)
                                    </label>
                                    
                                    <input type="number" class="form-control" id="discount-{{ $category["id"]; }}" @can('Invoice_discount') @else disabled  @endcan name="discount" onchange="discountFunc(this.value ,{{ $category["id"]; }} ,{{ $category["total"]; }})"   value="0" >
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                            <label class="form-check-label" style="margin-bottom:10px" for="customCheck2">خصم مخفي</label>
                                <div class="mb-1">
                                    
                                        <input type="checkbox" id="invisible_discount-{{ $category["id"]; }}"   @can('Invoice_discount') @else disabled  @endcan  onclick="invisibleDiscount(this.value ,{{ $category["id"]; }})"   name="invisible_discount" value="0"   class="form-check-input"  />
                                       
                                </div>
                               </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" > المبلغ (درهم) </label>
                                    <input type="text" class="form-control" disabled  id="price_total-{{ $category["id"]; }}" name="total" value="{{ $category["total"]; }}"  step=".01">
                                </div>
                            </div>

                           
                            <div class="col-md-4 col-12">
                                
                              <div   onclick="add_to_cart({{$category['id']}},{{ $category["total"]; }},{{$companyId}})"  class="btn btn-warning mb-1 waves-effect waves-float waves-light"  >اضافة للفاتورة   </div>  

                              
                            </div>
                        </div>
                        </tr>
                        @endforeach
                       
                       
                        </tbody>
                    </table>
                </div>
            </div>
</form>
        </div>

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
  
<script >
 
  function totalCountFunc(totalCount,item_id,Total ) {
      var discountVal = $("#discount-"+item_id);
      var oldDiscountVal=discountVal.val();
   
      document.getElementById('price_total-'+item_id).value= (Total * totalCount) - oldDiscountVal;
     
     }

     function discountFunc(DiscountVal,item_id,Total ) {

      var totalCountVal = $("#totalCount-"+item_id);
      var oldtotalCounttVal=totalCountVal.val();
   
      document.getElementById('price_total-'+item_id).value= (Total * oldtotalCounttVal) - DiscountVal;
     
     }

     function invisibleDiscount(val,item_id ) {

        if(val==1)
        {
            document.getElementById('invisible_discount-'+item_id).value=0;
        }else{
            document.getElementById('invisible_discount-'+item_id).value=1;
        }
     
     }


     function add_to_cart(item_id,Total,company_id) {

      var discountVal = $("#discount-"+item_id);
      var discount=discountVal.val();

      var totalCountVal = $("#totalCount-"+item_id);
      var totalCount=totalCountVal.val();

      var invisibleDiscountVal = $("#invisible_discount-"+item_id);
      var invisibleDiscount=invisibleDiscountVal.val();

      var priceTotalVal = (Total * totalCount) - discount;;


    // console.log(totalCount);
    // console.log(discount);
    // console.log(invisibleDiscount);
    // console.log(priceTotalVal);
    // console.log(item_id);

     $.ajax({
        url : '{{ route('admin.addServiceToCompanyCart') }}',
        type:"POST",
        data:{
            "_token": "{{ csrf_token() }}",
            totalCount:totalCount,
            discount:discount,
            invisibleDiscount:invisibleDiscount,
            priceTotalVal:priceTotalVal,
            item_id:item_id,
            company_id:company_id
        },
        success:function (result) {
         
       window.location.href = '{{ URL::asset("admin/currentCompanyInvoice") }}';
        },
        error:function (error) {
            console.log(error);
        }
    });
    }
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