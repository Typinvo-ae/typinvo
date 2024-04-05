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
                                  
                                    <form class="form " action="{{ route('admin.post.saveNewCompany') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        @include('common::includes.message')
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">   
                                    <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"> المعرف الوحيد</label>
                                                    <input type="text" disabled class="form-control" value="{{$randomString}}"   />
                                                </div>
                                            </div>
                                            <input type="hidden" name="identifier_key" value="{{ $randomString}}">   
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >البريد الالكتروني</label>
                                                    <input type="email"  class="form-control" required name="email" />
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" > اسم الشركة بالعربية</label>
                                                    <input type="text"  class="form-control" required name="name_ar" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >اسم الشركة بالانجليزية</label>
                                                    <input type="text"  class="form-control" required name="name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >رقم الهاتف </label>
                                                    <input type="number" step="any" class="form-control"   name="phone" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >رقم هاتف المندوب </label>
                                                    <input  type="number" step="any"  class="form-control"  name="delegate_phone"  />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >اسم  المندوب </label>
                                                    <input type="text"  class="form-control"  name="delegate_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >الرقم الضريبي</label>
                                                    <input type="text" class="form-control"  name="tax_number"  />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >رسوم طباعة (درهم)</label>
                                                    <input type="number" step="any" class="form-control"  name="printing_fees" />
                                                </div>
                                            </div>

                                           
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >الحد الاعلى لدين الشركة (درهم) </label>
                                                    <input type="number" step="any"  class="form-control"  name="max_debt" />
                                                </div>
                                            </div>
                                         
                                            
                                            <div class="col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" >ملاحظات     </label>
                                                    <textarea class="form-control" name="notes" rows="3" ></textarea>
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
