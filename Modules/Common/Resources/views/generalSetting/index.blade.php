@extends('common::layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('')}}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الاعدادات العامه   </h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{url('admin/generalSetting')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('common::includes.message')

                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">اسم الشركة</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"  class="form-control" value="{{$user->company_name}}" name="company_name"  />
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
                                        <input type="number"   required class="form-control" name="company_phone" value="{{$user->company_phone}}" />
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
                                        <input type="email"  required value="{{$user->company_email}}" class="form-control" name="company_email"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">الرقم الضريبى  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"   required class="form-control" name="company_tax_number" value="{{$user->company_tax_number}}" />
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">العنوان   </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"  required class="form-control" name="company_title" value="{{$user->company_title}}" />
                                     
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">اسم   البنك    AR </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"   required class="form-control" name="bank_name" value="{{$user->bank_name}}" />
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">اسم   البنك    EN   </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"   required class="form-control" name="bank_name_en" value="{{$user->bank_name_en}}" />
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">رقم حساب   البنك   </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"   required class="form-control" name="bank_number" value="{{$user->bank_number}}" />
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">    تفاصيل التحويل الى فى الفاتورة  AR </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"   required class="form-control" name="send_to_details" value="{{$user->send_to_details}}" />
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="contact-icon">    تفاصيل التحويل الى فى الفاتورة  EN  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text"   required class="form-control" name="send_to_details_en" value="{{$user->send_to_details_en}}" />
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="pass-icon">شعار</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="image"></i></span>
                                        <input type="file" id="pass-icon" class="form-control" name="company_image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                      
                        
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary me-1">ارسال</button>
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

