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

    
    <section id="basic-datatable">                 
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-body border-bottom">
                            <h4 class="card-title">الشركات    </h4>
                            <!-- <div class="row">
                                <div class="col-md-4 identifier_key"></div>
                                <div class="col-md-4 name_ar"></div>
                                <div class="col-md-4 email"></div>
                            </div>
                        -->
                         </div>
                    <table class="datatables-basic table">
                        <thead>
                        <tr>
                            <th></th>
                        
                         
                            <th> المعرف الوحيد</th>
                            <th> الشركة </th>
                            <th> البريد الالكترونى</th>
                            <th> رقم الهاتف </th>
                            <th>الحد  الاعلى للدين</th>
                            <th>  حساب نقدى</th>
                 
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
                text: ' تم انشاء الشركة بنجاح',
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
                text: ' تم تعديل الشركة بنجاح',
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
            ajax: 'companies',
            columns: [
                { data: 'id' }, // for responsive show
                { data: 'identifier_key' },
                { data: 'name_ar' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'max_debt' },
                { data: 'cash_account' },
              
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
                    targets: -1,
                    title: "الادوات",
                    orderable: !1,
                    render: function (data, type, full, meta) {
                        var id= full['id'];
                    return  '<a href="companies/'+id+'/edit"><button class="btn btn-warning btn-icon" style="margin-left: 10px"  ">تعديل</button></a><a href="#"><button class="btn btn-danger btn-icon delete-record" style="margin-left: 10px"  > حذف </button></a>';

                     },
            
                },
               
            ],
            order: [[2, 'desc']],
            dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 7,
            lengthMenu: [7, 10, 25, 505, 100],
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle me-2',
                    text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'تصدير البيانات',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                            className: 'dropdown-item',
                            exportOptions:  { columns: [ 6,5,4,3,2,1] }
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                            className: 'dropdown-item',
                            exportOptions:  { columns: [ 6,5,4,3,2,1] }
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [ 6,5,4,3,2,1] }
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions:  { columns: [ 6,5,4,3,2,1] }
                        },
                        {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                            className: 'dropdown-item',
                            exportOptions:  { columns: [ 6,5,4,3,2,1] }
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
                    text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'اضافة شركة ',
                    className: 'create-new btn btn-primary',
                    // attr: {
                    //     'data-bs-toggle': 'modal',
                    //     'data-bs-target': '#modals-slide-in'
                    // },
                    action: function (e, dt, node, config)
                    {
                        //This will send the page to the location specified
                        window.location.href = './companies/create';
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
                    var label = $('<label class="form-label" for="UserRole"> البريد الالكترونى  </label>').appendTo('.name_ar');
                    var select = $(
                        '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value="">  اختر </option></select>'
                    )
                        .appendTo('.name_ar')
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
            this.api()
                .columns(3)
                .every(function () {
                    var column = this;
                    var label = $('<label class="form-label" for="UserRole">المعرف الوجيد  </label>').appendTo('.email');
                    var select = $(
                        '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value="">  اختر </option></select>'
                    )
                        .appendTo('.email')
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

            // Adding status filter once table initialized

            this.api()
                .columns(2)
                .every(function () {
                    var column = this;
                    var label = $('<label class="form-label" for="UserRole">اسم الشركة   </label>').appendTo('.identifier_key');
                    var select = $(
                        '<select id="UserRole" class="form-select   text-capitalize mb-md-0 mb-2"><option value="">  اختر </option></select>'
                    )
                        .appendTo('.identifier_key')
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
        }
        });
        $('div.head-label').html('<h6 class="mb-0">  </h6>');
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
    
         
            $image = $('#formFile')[0].files;
        // $new_salary = $('.add-new-record .dt-salary').val();

        if ($name != '') {
            $('.modal').modal('hide');
            var token = $("meta[name='csrf-token']").attr("content");
            var formData = new FormData();
            console.log(formData);
            $.ajax(
                {
                    url: "company",
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
                text: 'لقد تم انشاء الشركة بنجاح',
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
                    url: window.location.origin+"/admin/companies/"+id,
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
                    text: 'تم حذف العنصر.',
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
