@extends('common::layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
@section('content')
    <!-- Basic table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>الاسم</th>
                            <th>الادوات</th>
                        </tr>
                        </thead>
                    
                        <tbody>
                        @foreach($Roles as $key=>$value)
                        <tr>
                            <td>2</td>
                            <td>
                             {{$value}}
                            </td>
                            <td>
                              
                            <a href="{{ route('admin.getEditPermissions',$key) }}"   >
                            <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">تعديل     </span>
                            </a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </section>
    <!--/ Basic table -->
@endsection
