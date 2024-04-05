@extends('common::layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
@endsection
@section('content')
    <!-- Basic table -->
    <h3 style="margin-right:15px"> الاشتراكات </h3>
          <div class="row">
                <div class="card">
              
    <section id="basic-datatable">

                           
        <div class="row">
            <div class="col-12">
                <div class="card">
               
                    <table class="table-responsive table">
                        <thead>
                        <tr>
                            <th>الاسم </th>
                            <!-- <th>الصلاحيات </th> -->
                            <th>الادوات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($memberships as $membership)
                        <tr>
                            <td>{{$membership['name']}}</td>
                            <!-- <td>
                            @foreach($membership['permission'] as $permission)
                            {{$permission['name_ar']}}-
                            
                            @endforeach


                            </td> -->
                            <td>
                              
                                <a href="{{ route('admin.getEditMembership',$membership['id']) }}"   >
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
    </div>
    </div>
    </section>
    <!--/ Basic table -->

@endsection

    

