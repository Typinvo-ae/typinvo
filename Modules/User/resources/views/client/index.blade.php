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

          <div class="row">
          @can('Edit_Permissions')
          <div class="col-xl-4 col-lg-6 col-md-6">
            <a href="{{ route('admin.getEditPermissions',1) }}">
                <div class="card">
                    <div class="card-body">
                    <h4 class="fw-bolder">ادمن</h4>
                        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                            <div class="role-heading">
                                
                                <a href="" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                    <small class="fw-bolder"></small>
                                </a>
                            </div>
                            <small class="fw-bolder"> تعديل الصلاحيات</small>
                        </div>
                    </div>
                </div>
            </a>
          </div>
           <div class="col-xl-4 col-lg-6 col-md-6">
                <a href="{{ route('admin.getEditPermissions',2) }}">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="fw-bolder">موظف</h4>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        
                                        <a href="" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                            <small class="fw-bolder"></small>
                                        </a>
                                    </div>
                                    <small class="fw-bolder"> تعديل الصلاحيات</small>
                                </div>
                            </div>
                        </div>
                    </a>
          </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                    <a href="{{ route('admin.getEditPermissions',3) }}">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="fw-bolder">محاسب</h4>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        
                                        <a href="" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                            <small class="fw-bolder"></small>
                                        </a>
                                    </div>
                                    <small class="fw-bolder"> تعديل الصلاحيات</small>
                                </div>
                            </div>
                        </div>
                        </a>
           </div>
           @endcan 
                <div class="card">
               <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content">
            <div class="modal-header bg-transparent">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
            <div class="text-center mb-4">
                <h3>الموظفين الغير مفعلين</h3>
            </div>

                 <form class="form form-horizontal" action="{{route('unActiveClients')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
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
                                    <input class="form-check-input" type="checkbox" onclick="checkedAll.call(this);" />
                                    <label class="form-check-label"  for="selectAll">اختيار الجميع </label>
                                </div>
                            </td>
                        </tr>
                        
                    
                        <tr>
                            <td class="text-nowrap fw-bolder"></td>
                            <td>

                        <div class="col-12">
                            <div class="mb-1 row">
                                
                                  @foreach($unActiveClients as $key => $user)
                                <div class="col-sm-4">
                                     <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input"   name="unactive[]" value="{{$user['id']}}" type="checkbox" />
                                        <label class="form-check-label" for="userManagementRead"> {{$user['name']}} </label>
                                    </div>
                                </div>
                               @endforeach
                            </div>
                        </div>
                            </td>
                        </tr>
                   
                        </tbody>
                    </table>
                </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
                       
                    </div>
                </form>
                            <!--/ Add role form -->
                        </div>
                    </div>
                </div>
            </div>
    <section id="basic-datatable">

                           
        <div class="row">

            
            <div class="col-12">
                <div class="card">
                    
                    <table class="datatables-basic table">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>id</th>
                            <th>الاسم واللقب</th>
                            <th>البريد الالكترونى </th>
                            <th> رقم الهاتف</th>
                            <th> نوع الحساب</th>
                            <th>الحالة</th>
                            <th>الادوات</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    <!--/ Basic table -->

@endsection


@section('js')

@include('common::includes.datatable')

<script>
function checkedAll() {
    // this refers to the clicked checkbox
    // find all checkboxes inside the checkbox' form
    var elements = this.form.getElementsByTagName('input');
    // iterate and change status
    for (var i = elements.length; i--; ) {
        if (elements[i].type == 'checkbox') {
            elements[i].checked = this.checked;
        }
    }
}

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

    @if(session('created'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد انشاء الموظف بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    @if(session('updated'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم تعديل الموظف بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    <script>
        $(function () {
    'use strict';
    var dt_basic_table = $('.datatables-basic'),
        dt_date_table = $('.dt-date');
    if (dt_basic_table.length) {
        var dt_basic = dt_basic_table.DataTable({
            ajax: 'clients',
            columns: [
                { data: 'id' }, // for responsive show
                { data: 'id' }, // for checkbox
                { data: 'id' },// used for sorting so will hide this column
                { data: 'name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'account_type' },
                { data: 'Status' },
                { data: 'id' },
            ],
            columnDefs: [
                {
                    // For Responsive
                    className: 'control',
                    orderable: false,
                    responsivePriority: 2,
                    targets: 0
                },
                {
                    // For Checkboxes
                    targets: 1,
                    orderable: false,
                    responsivePriority: 3,
                    render: function (data, type, full, meta) {
                      
                        return (
                            '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                            data +
                            '" /><label class="form-check-label" for="checkbox' +
                            data +
                            '"></label></div>'
                        );
                    },
                    checkboxes: {
                        selectAllRender:
                            '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
                    }
                },
                {
                    targets: 2,
                    visible: false
                },
                {
                    // Avatar image/badge, Name and phone
                    targets: 3,
                    responsivePriority: 4,
                    render: function (data, type, full, meta) {
                        var $user_img = full['image'],
                            $name = data,
                            $phone = full['phone'];
                        if ($user_img) {
                            var $user_img = $user_img;
                            // For Avatar image
                            var $output =
                                '<img src="'+$user_img+'" alt="Avatar" width="32" height="32">';
                        } else {
                            // For Avatar badge
                            var stateNum = full['is_active'];
                            var states = ['info','primary'];
                            var $state = states[stateNum],
                                $name = full['name'],
                                $initials = $name.match(/\b\w/g) || [];
                            $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                            $output = '<span class="avatar-content">' + $initials + '</span>';
                        }

                        var colorClass = $user_img === null ? ' bg-light-' + $state + ' ' : '';
                        // Creates full output for row
                        var $row_output =
                            '<div class="d-flex justify-content-left align-items-center">' +
                            '<div class="avatar ' +
                            colorClass +
                            ' me-1">' +
                            $output +
                            '</div>' +
                            '<div class="d-flex flex-column">' +
                            '<span class="emp_name text-truncate fw-bold">' +
                            $name +
                            '</span>' +
                            '<small class="emp_post text-truncate text-muted">' +
                            $phone +
                            '</small>' +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                },
                {
                    // Label
                    targets: -3,
                    render: function (data, type, full, meta) {
                        var $status_number = full['account_type'];
                        var $status = {
                            2: { title: ' موظف', class: 'badge-light-info' },
                            3: { title: 'محاسب', class: ' badge-light-success' },
                        };
                        if (typeof $status[$status_number] === 'undefined') {
                            return data;
                        }
                        return (
                            '<span class="badge rounded-pill ' +
                            $status[$status_number].class +
                            '">' +
                            $status[$status_number].title +
                            '</span>'
                        );
                    }
                },
                {
                    // Label
                    targets: -2,
                    render: function (data, type, full, meta) {
                        var $status_number = full['is_active'];
                        var $status = {
                            0: { title: 'غير مفعل', class: 'badge-light-danger' },
                            1: { title: 'مفعل', class: ' badge-light-success' },
                        };
                        if (typeof $status[$status_number] === 'undefined') {
                            return data;
                        }
                        return (
                            '<span class="badge rounded-pill ' +
                            $status[$status_number].class +
                            '">' +
                            $status[$status_number].title +
                            '</span>'
                        );
                    }
                },
                {
                    // Actions
                    targets: -1,
                    title: 'الادوات',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        var activation = '';
                        if(full['is_active'] ==0) activation ='تفعيل'; else activation = 'الغاء تفعيل';
                        

                          var points = 'النقاط';

                        return (
                            '<div class="d-inline-flex">' +
                            '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                            feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-end">' +
                              
                            '<a href="clients/activate/'+data+'" class="dropdown-item">' +
                            feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
                            activation+'</a>'
                 
                           //   +
                            // '<a href="javascript:;" class="dropdown-item delete-record">' +
                            // feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
                            // 'حذف</a>'
                            
                            +
                            '</div>' +
                            '</div>'
                                 +
                            '<a href="clients/'+data+'/edit" class="item-edit">' +
                            feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                            '</a>'
                           
                        );
                    }
                }
            ],
            order: [[2, 'desc']],
            dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 7,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle me-2',
                    text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                            className: 'dropdown-item',
                            exportOptions: { columns: [3, 4, 5, 6, 7] }
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: [3, 4, 5, 6, 7] }
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [3, 4, 5, 6, 7] }
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: [3, 4, 5, 6, 7] }
                        },
                        {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                            className: 'dropdown-item',
                            exportOptions: { columns: [3, 4, 5, 6, 7] }
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },
            
                    
                
                {
                    text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'اضافة حساب جديد',
                    className: 'create-new btn btn-primary',
                    // attr: {
                    //     'data-bs-toggle': 'modal',
                    //     'data-bs-target': '#modals-slide-in'
                    // },
                    action: function (e, dt, node, config)
                    {
                        //This will send the page to the location specified
                        window.location.href = './clients/create';
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
               
            ],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details of ' + data['name'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                ? '<tr data-dt-row="' +
                                col.rowIdx +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>'
                                : '';
                        }).join('');

                        return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
                    }
                }
            },
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },

        initComplete: function () {
            // Adding role filter once table initialized
            this.api()
                .columns(1)
                .every(function () {
                    var column = this;
                    var label = $('<label class="form-label" for="UserRole">الاسم  </label>').appendTo('.status');
                    var select = $(
                        '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value="">  اختر </option></select>'
                    )
                        .appendTo('.status')
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                        });
                });
            // Adding plan filter once table initialized

            // Adding status filter once table initialized
        }
        });
        $('div.head-label').html('<h6 class="mb-0">  المستخدمين</h6>');
    }

    // Flat Date picker
    if (dt_date_table.length) {
        dt_date_table.flatpickr({
            monthSelectorType: 'static',
            dateFormat: 'm/d/Y'
        });
    }

    // Add New record
    // ? Remove/Update this code as per your requirements ?
    var count = 101;
    $('.data-submit').on('click', function () {
        var $name = $('.add-new-record .dt-full-name').val(),
            $password = $('.add-new-record .password').val(),
            $phone = $('.add-new-record .dt-phone').val(),
            $phone = $('.add-new-record .dt-phone').val(),
            $role = $('.add-new-record .dt-role').val(),
            $image = $('#formFile')[0].files;
        // $new_salary = $('.add-new-record .dt-salary').val();

        if ($name != '') {
            $('.modal').modal('hide');
            var token = $("meta[name='csrf-token']").attr("content");
            var formData = new FormData();
            formData.append('name',$name);
            formData.append('phone',$phone);
            formData.append('phone',$phone);
            formData.append('role',$role);
            formData.append('is_active',1);
            formData.append('password',$password);
            formData.append('image',$image[0]);
            formData.append('_token',token);
            console.log(formData);
            $.ajax(
                {
                    url: "clients",
                    type: 'POST',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function (response){
                        dt_basic.row
                            .add({
                                responsive_id: null,
                                id: response.data.id,
                                name: $name,
                                phone: $phone,
                                phone: $phone,
                                roles:response.data.roles,
                                created_at: new Date().toLocaleString(),
                                is_active: 1
                            })
                            .draw();
                    }
                });
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم انشاء الموظف بنجاح',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        }
    });

    // Delete Record
    $('.datatables-basic tbody').on('click', '.delete-record', function () {
        let that = this;
        var id = dt_basic.row($(this).parents('tr')).data().id
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'هل انت متأكد من الحذف ؟ ',
            text: "لن تتمكن من التراجع عن هذا!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'نعم ، احذفها!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(function (result) {
         
           
            if(   result.value==true)
            {
                dt_basic.row($(that).parents('tr')).remove().draw();
                $.ajax(
                {
                    url: window.location.origin+"/admin/clients/"+id,
                    type: 'POST',
                    data: {
                        "id": id,
                        "_method": "DELETE",
                        "_token": token,
                    },
                    success: function (){
                    }
                });
                Swal.fire({
                    icon: 'success',
                    title: 'تم الحذف!',
                    text: 'تم حذف الموظف.',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            }
           
           
        });
    });
});

    </script>

    
@endsection
