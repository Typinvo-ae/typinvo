@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/css-rtl/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/forms/select/select2.min.css">
@endsection
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">انشاء  قسم فرعى </h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal invoice-repeater"  action="{{ route('admin.saveSubServiceCategory') }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> اسم الخدمه</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                     
                                        <input type="text" class="form-control" required name="title" placeholder=""
                                            value="{{ old('title') }}" />
                                        @error('title')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="department_id" value="{{ $departmentId }}">
                        <input type="hidden" name="category_id" value="{{ $categoryChilds }}">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الترتيب</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                    
                                        <input type="number" id="fname-icon" class="form-control" name="order"
                                            placeholder=" " value="{{$LastCategory}}" />
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
                                    <label class="form-label" >رسوم الحكومي (درهم)</label>
                                    <input type="number"  step="any" id="governmentPrice" required name="government_price" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" >رسوم الطباعة  (درهم)</label>
                                    <input type="number" step="any" id="printingPrice" required name="printing_price" class="form-control"  placeholder="" />
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" > الثمن  (درهم)</label>
                                    <input type="number"  step="any" id="total" required  name="total" class="form-control"  placeholder="" />
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
