@extends('common::layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">

   <!-- BEGIN: Vendor CSS-->
   <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/wizard/bs-stepper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/plugins/forms/form-wizard.css')}}">
    <!-- END: Page CSS-->


@endsection
@section('content')
    
<div class="content-body">
            
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="file-text" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">البيانات الشخصية</span>
                                    
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#personal-info-modern" role="tab" id="personal-info-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="user" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">الصلاحيات</span>
                                    
                                </span>
                            </button>
                        </div>
                        
                    </div>
                    <div class="bs-stepper-content">
                        <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
                        <div class="content-header">
                            <h5 class="mb-0">البيانات الشخصية</h5>
                        
                        </div>
                            
               <form class="form form-horizontal" action="{{ route('admin.updateClient') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $client->id }}">
                    <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-3 text-center">
                                <label class="col-form-label" for="fname-icon"> الاسم</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" name="name" value="{{$client['name']}}" required  />
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
                                    <input type="email" id="contact-icon"  required class="form-control" name="email" value="{{$client['email']}}" />
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
                                <input type="checkbox" value="1" name="is_active" class="form-check-input" id="customCheck2" />
                                <label class="form-check-label" for="customCheck2">تفعيل</label>
                            </div>
                        </div>
                    </div>
                </div>
           
            <div class="d-flex justify-content-between">
                <div class="btn btn-outline-secondary btn-prev" disabled>
                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">السابق</span>
                </div>
                <div class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none">التالى</span>
                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                </div>
            </div>
        </div>
        <div id="personal-info-modern" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
            <div class="content-header">
                <h5 class="mb-0">الصلاحيات </h5>
            </div>
             
                    <div class="col-12">
                                <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                <tr>
                                    <td class="text-nowrap fw-bolder">
                                        
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                    @foreach($cat_permissions as $key => $permissions)
                                    <tr  >
                                        <td class="text-nowrap fw-bolder"> {{$key}}</td>
                                        <td>
                                            <div class="d-flex" style="margin-bottom:40px">
                                            @foreach($permissions as $permission)
                                                <div class="form-check col-md-1" style="width: 12.33333%;">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]" @if(in_array($permission['id'], $rolePermissions)) checked  @endif  value="{{$permission['id']}}" />
                                                    <label class="form-check-label" for="userManagementRead"> {{$permission['name_ar']}} </label>
                                                
                                                </div>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
             
               
                
       

        <div class="d-flex justify-content-between">
            <div class="btn btn-primary btn-prev">
                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">السابق</span>
            </div>
            <button type="submit" class="btn btn-primary me-1">تاكيد</button>
        </div>
                 </form> 
        </div>
            
            
        </div>
    </div>
</section>

</div>
@endsection

@section('js')
 

 <!-- BEGIN: Vendor JS-->
 <script src="{{asset('admin/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
    <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/vendors/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin/js/scripts/forms/form-wizard.js')}}"></script>
    <!-- END: Page JS-->
@endsection
