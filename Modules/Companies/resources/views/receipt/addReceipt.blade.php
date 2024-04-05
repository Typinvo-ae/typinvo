@extends('common::layouts.master')


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
@endsection

@section('content')

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">اضافة جديد</h4>
                                </div>
                                <div class="card-body">
                 
                                    <form class="form " action="{{ route('admin.createReceipt') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @include('common::includes.message')
                                      
                                    <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"> موضوع  </label>
                                                    <input type="text"  class="form-control" required name="title" />
                                                </div>
                                            </div>

                                       <div class="col-md-6 col-6 mb-1">
                                            <label class="form-label" for="select2-basic">الفاتورة </label>

                                            <select name="order_id"   required  class="select2 form-select" id="select2-nested">

                                            <option selected disabled value="{{ null }}">اختر</option>
                                            @foreach ($Orders as $Order)
                                                <option value="{{ $Order['id'] }}">{{ $Order['unique_order_id'] }}</option>
                                            @endforeach

                                            </select>
                                        </div>

                                          
                                         
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >السعر </label>
                                                    <input type="number" step="any" class="form-control" required name="price"  />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" >ملاحظات     </label>
                                                    <textarea class="form-control" name="notes" rows="3" required=""></textarea>
                                                </div>
                                            </div>



                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" > المبلغ المستلم   </label>
                                                    <input type="number" step="any"  class="form-control" required name="amount_received" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >المبلغ المتبقى  </label>
                                                    <input type="number" step="any" class="form-control" required name="amount_remain" />
                                                </div>
                                            </div>
                                          

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">تاكيد</button>
                                                <button type="reset" class="btn btn-outline-secondary">الغاء</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('')}}admin/js/scripts/pages/modal-add-role.js"></script>
<script src="{{asset('')}}admin/js/scripts/pages/app-access-roles.js"></script>
    <script>
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
@endsection
