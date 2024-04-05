@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/css-rtl/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/vendors/css/forms/select/select2.min.css">
@endsection
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل  قسم فرعى   </h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal invoice-repeater"  action="{{ route('admin.updateCardCategory') }}" method="POST"
                    enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <input type="hidden" name="department_id" value="{{ $departmentId}}">
                    <input type="hidden" name="category_type" value="1">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الاسم</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                     
                                        <input type="text" class="form-control" name="title" required placeholder=""
                                        value="{{$category['title']}}" />
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
                                            placeholder=" "   value="{{$category['order']}}"  />
                                        @error('order')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="pass-icon">الصوره</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="image"></i></span>
                                        <input type="file" id="pass-icon" class="form-control" name="image" placeholder="image" />
                                    </div>
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
    </script>
@endsection
