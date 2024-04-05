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
                    </table>
                </div>
            </div>
        </div>
      
    </section>
    <!--/ Basic table -->

@endsection


@section('js')

@include('common::includes.datatable')


 

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

    @if(session('created'))
        <script>
            Swal.fire({
                title: 'أحسنت!',
                text: 'لقد تم تسجيل البيانات  بنجاح',
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
            ajax: 'paymentType',
            columns: [
                { data: 'id' }, // for responsive show
                { data: 'name' },
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
                    // Actions
                    targets: -1,
                    title: 'الادوات',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        var activation = '';
                        if(full['is_active'] ==0) activation ='Activate'; else activation = 'الغاء تفعيل';
                        return (
                            '<div class="d-inline-flex">' +
                           
                          
                            '</div>' +
                            '</div>'
                            +
                            '<a href="paymentType/'+data+'/edit" class="item-edit">' +
                            feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                            '</a>'
                        );
                    }
                }
            ],
            order: [[2, 'desc']],
            dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 100,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            buttons: [
                // {
                //     extend: 'collection',
                //     className: 'btn btn-outline-secondary dropdown-toggle me-2',
                //     text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                //     buttons: [
                //         {
                //             extend: 'print',
                //             text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                //             className: 'dropdown-item',
                //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                //         },
                //         {
                //             extend: 'csv',
                //             text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                //             className: 'dropdown-item',
                //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                //         },
                //         {
                //             extend: 'excel',
                //             text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                //             className: 'dropdown-item',
                //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                //         },
                //         {
                //             extend: 'pdf',
                //             text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                //             className: 'dropdown-item',
                //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                //         },
                //         {
                //             extend: 'copy',
                //             text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                //             className: 'dropdown-item',
                //             exportOptions: { columns: [3, 4, 5, 6, 7] }
                //         }
                //     ],
                //     init: function (api, node, config) {
                //         $(node).removeClass('btn-secondary');
                //         $(node).parent().removeClass('btn-group');
                //         setTimeout(function () {
                //             $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                //         }, 50);
                //     }
                // },
              
                    
                
                {
                    text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'اضافة جديد',
                    className: 'create-new btn btn-primary',
                    // attr: {
                    //     'data-bs-toggle': 'modal',
                    //     'data-bs-target': '#modals-slide-in'
                    // },
                    action: function (e, dt, node, config)
                    {
                        //This will send the page to the location specified
                        window.location.href = './paymentType/create';
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
                            return 'Details of ' + data['title'];
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
            }
        });
        $('div.head-label').html('<h6 class="mb-0">  تعديل نوع الدفع  </h6>');
    }

    // Flat Date picker
    if (dt_date_table.length) {
        dt_date_table.flatpickr({
            monthSelectorType: 'static',
            dateFormat: 'm/d/Y'
        });
    }

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
            if (result.value) {
                dt_basic.row($(that).parents('tr')).remove().draw();
                $.ajax(
                    {
                        url: window.location.origin+"/admin/categories/"+id,
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
                    text: 'تم حذف الفئة.',
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
