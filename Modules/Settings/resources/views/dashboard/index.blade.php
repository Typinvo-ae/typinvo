@extends('common::layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('')}}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
@section('content')


<div class="disabled-backdrop-ex">
<div class="modal fade text-start" id="backdrop1" tabindex="-1" aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h2 style="display: block;black:#54ea59">لديك   فاتورة حالية  </h2>
            </div>
            <div class="modal-footer">

            @if(checkUserCartType()=='company')
            <a href="{{ route('admin.trackCompanyInvoice') }}"> <button  class="btn btn-success waves-effect waves-float waves-light">
                        <span>استكمال الفاتورة</span>
                    </button>
                </a>
           @else
           <a href="{{ route('admin.trackInvoice') }}"> <button  class="btn btn-success waves-effect waves-float waves-light">
                        <span>استكمال الفاتورة</span>
                    </button>
                </a>
           @endif

             
                <a href="{{ route('admin.deleteInvoice') }}"> <button class="btn btn-danger waves-effect waves-float waves-light">
                        <span>الغاء الفاتورة </span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

@if(checkUserCart()=='cartTrack' )
<script>

document.addEventListener("DOMContentLoaded", function() {
    var backdrop1Modal = document.getElementById("backdrop1");
    var backdrop1ModalInstance = new bootstrap.Modal(backdrop1Modal);
    backdrop1ModalInstance.show();
});
</script>
@endif

        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="pricing-plan">

                    <!-- pricing plan cards -->
                    <div class="row pricing-card">
                        <div class="col-12 col-sm-10 col-md-12 ">
                            <div class="row">
                            @can('Dashboard_User')
                            <div class="col-md-6">
                                <a href="{{route('admin.invoiceMainCategory',1)}}">
                                    <div class="card standard-pricing popular text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('admin/images/illustration/personalization.svg') }}" class="mb-1" alt="svg img" />
                                            <h3>افراد</h3>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                @endcan 
                                @can('Dashboard_Company')
                                <div class="col-md-6">
                                <a href="{{route('admin.mainCompanies',1)}}">
                                    <div class="card standard-pricing popular text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('admin/images/illustration/marketing.svg') }}" class="mb-1" alt="svg img" />
                                            <h3>شركات</h3>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                @endcan 
                            </div>
                        </div>
                    </div>
                </section>

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

