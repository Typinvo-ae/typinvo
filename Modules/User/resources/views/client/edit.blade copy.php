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
                <form class="form form-horizontal" action="{{ route('admin.updateClient') }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    @include('common::includes.message')
                    <input type="hidden" name="id" value="{{ $client->id }}">
                    <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الاسم</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{$client['name']}}" name="name"  />
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
                                        <input type="email" id="contact-icon" value="{{$client['email']}}" class="form-control" name="email"  />
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
                                        <input type="text"  class="form-control" name="phone" value="{{$client['phone']}}" />
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
                                        <input type="password" id="pass-icon" class="form-control" name="password"  />
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
                                    <label class="col-form-label" for="pass-icon">الصوره</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="image"></i></span>
                                        <input type="file" id="pass-icon" class="form-control" name="image" />
                                        @error('image')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="pass-icon"> الصلاحيات</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group-merge">
                                    <select class="select2 form-select select2-hidden-accessible" id="select2-basic"  dir="rtl" multiple="" name="permissions[]">
                                        @foreach($permissions as $permission)
                                            <option 
                                            @if(in_array($permission->id, $UserPermissions)) selected  @endif value="{{$permission['id']}}">  {{$permission['name_ar']}}  </option>
                                        @endforeach
                                </select>
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
                                    <option  @if($client['account_type']==2) selected  @endif  value="2"> موظف </option>
                                    <option   @if($client['account_type']==3) selected  @endif  value="3">  محاسب  </option>
                                </select>
                                    </div>
                                </div>
                            </div>
                         </div>
                        <div class="col-sm-9 offset-sm-3">
                            <div class="mb-1">
                                <div class="form-check">
                                    <input type="checkbox" value="1" @if($client->is_active==1) checked @endif name="is_active" class="form-check-input" id="customCheck2" />
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
