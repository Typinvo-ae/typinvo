@extends('common::layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('')}}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل حسابى  الشخصى</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{url('admin/profile')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('common::includes.message')

                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الاسم</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{$user->name}}" name="name"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">الهاتف  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="contact-icon"  required class="form-control" name="phone" value="{{$user->phone}}" />
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
                                        <input type="email" id="contact-icon" value="{{$user->email}}" class="form-control" name="email"  />
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script src="{{asset('')}}admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
@if(session('updated'))
<script>
    Swal.fire({
        title: 'أحسنت!',
        text: 'لقد تم تعديل البيانات بنجاح',
        icon: 'success',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });
</script>
@endif


</script>
@endsection

