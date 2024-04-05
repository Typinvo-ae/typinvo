@extends('common::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
@endsection
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل البيانات   </h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('admin.updateMembership') }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    @include('common::includes.message')
                    <input type="hidden" name="id" value="{{ $membership->id }}">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الاسم</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{$membership['name']}}" name="name"  />
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
    <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>

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
