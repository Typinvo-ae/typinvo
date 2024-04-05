@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/css-rtl/plugins/forms/form-validation.css">
@endsection
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">انشاء  جديد</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{url('admin/paymentType/')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ $userId }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الاسم  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" name="name" placeholder="الاسم" value="{{old('name')}}" />
                                        @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
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
    <script src="{{asset('')}}admin/vendors/js/forms/validation/jquery.validate.min.js"></script>

    <script src="{{asset('')}}admin/js/scripts/forms/form-validation.js"></script>
@endsection
