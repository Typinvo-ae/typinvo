@extends('common::layouts.master')


@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل الصلاحيات  </h4>
            </div>
            <div class="card-body">
               
                    
                    <div class="row">
                    <form class="form form-horizontal" action="{{ route('admin.updatePermission') }}" method="POST" enctype="multipart/form-data">
                        
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="role_id" value="{{$role_id}}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                                    <div style="margin-right:100px" class="col-9">
                                        <label class="form-label" for="modalRoleName">الوظيفة</label>
                                        <input type="text" id="modalRoleName"  disabled  value="{{$role}}" class="form-control"  tabindex="-1"  />
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
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll">  اختيار الكل </label>
                                                            </div>
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
                                        <!-- Permission table -->
                                    </div>
                        </div>
                        <div class="col-sm-9 offset-sm-3" >
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
  
<!-- BEGIN: Page JS-->
<script src="{{asset('')}}admin/js/scripts/pages/modal-add-role.js"></script>
<script src="{{asset('')}}admin/js/scripts/pages/app-access-roles.js"></script>
<!-- END: Page JS-->


@endsection