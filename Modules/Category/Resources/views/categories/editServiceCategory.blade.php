@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/css-rtl/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/forms/select/select2.min.css">
@endsection
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل  خدمات فرعية </h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal invoice-repeater"  action="{{ route('admin.updateServiceCategory') }}" method="POST"
                    enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <input type="hidden" name="department_id" value="{{ $departmentId}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> اسم الخدمه</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                     
                                        <input type="text" class="form-control" name="title" required  value="{{$category['title']}}"  placeholder=""
                                             />
                                        @error('title')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الترتيب</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                    
                                        <input type="number" id="fname-icon" class="form-control" required name="order"
                                            placeholder=" " value="{{$category['order']}}" />
                                        @error('order')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        
            
                        <div class="row d-flex align-items-end" >
                            <div   class="col-sm-3 text-center">
                                <label class="col-form-label" for="pass-icon">  اسعار الخدمه</label>
                            </div>
                      

                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="itemquantity">رسوم الحكومي (درهم)</label>
                                    <input type="number" id="governmentPrice" required name="government_price" value="{{$category['government_price']}}" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="itemquantity">رسوم الطباعة  (درهم)</label>
                                    <input type="number"  id="printingPrice" required name="printing_price" value="{{$category['printing_price']}}" class="form-control"  placeholder="" />
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="itemquantity"> الثمن  (درهم)</label>
                                    <input type="number" id="total" required name="total" value="{{$category['total']}}" class="form-control"  placeholder="" />
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary me-1">تاكيد</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
  
    <script src="{{ asset('') }}admin/vendors/js/forms/validation/jquery.validate.min.js"></script>

    <script src="{{ asset('') }}admin/js/scripts/forms/form-validation.js"></script>

    <script src="{{ asset('') }}admin/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{asset('')}}admin/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="{{asset('')}}admin/js/scripts/forms/form-repeater.js"></script>
    <script src="{{asset('')}}admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
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

        document.addEventListener("DOMContentLoaded", function() {
  const governmentPriceInput = document.getElementById('governmentPrice');
  const printingPriceInput = document.getElementById('printingPrice');
  const totalInput = document.getElementById('total');
  
  // Function to calculate total price
  function calculateTotalPrice() {
    const governmentPrice = parseFloat(governmentPriceInput.value);
    const printingPrice = parseInt(printingPriceInput.value);
    const total = isNaN(governmentPrice) || isNaN(printingPrice) ? 0 : governmentPrice + printingPrice;
    totalInput.value = total.toFixed(2); // Display total with 2 decimal places
  }
  
  // Event listener for price input change
  governmentPriceInput.addEventListener('change', calculateTotalPrice);
  
  // Event listener for printingPrice input change
  printingPriceInput.addEventListener('change', calculateTotalPrice);
  
});
    </script>
@endsection
