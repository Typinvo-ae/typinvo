@extends('common::layouts.master')


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">انشاء حساب  جديد</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('admin.post.saveNewClient') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('common::includes.message')
                    <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الاسم</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required value="{{old('name')}}" />
                                        @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">البريد الالكترونى </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="email" id="contact-icon"  required class="form-control" name="email" value="{{old('email')}}" />
                                        @error('email')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">رقم الهاتف  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"  class="form-control" name="phone" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="pass-icon">كلمة المرور</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="pass-icon" class="form-control" required name="password"  />
                                        @error('password')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="pass-icon">تاكيد كلمه المرور</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="pass-icon" class="form-control" required name="password_confirmation" />
                                        @error('password')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3 text-center">
                                        <label class="col-form-label" for="pass-icon"> نوع الحساب</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group-merge">
                                        <select class=" form-select " required   name="account_type">
                                        <option value="2"> موظف </option>
                                        <option value="3">  محاسب  </option>
                                    </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <div class="col-sm-9 offset-sm-3">
                            <div class="mb-1">
                                <div class="form-check">
                                    <input type="checkbox" value="1" name="is_active" class="form-check-input" id="customCheck2" />
                                    <label class="form-check-label" for="customCheck2">تفعيل</label>
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
