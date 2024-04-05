@extends('common::layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('')}}admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
@section('content')

<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
    <form class="form form-horizontal" action="{{url('admin/manageInvoice')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('common::includes.message')

        <input type="hidden" name="user_id" value="{{ $userId }}">
        <h3 style="margin-right:15px"> تعديل الفاتورة </h3>
        <section id="input-group-basic">
            <div class="row">
        
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تفاصيل الشركة والعميل</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">اسم الشركة</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_title }}" name="company_title"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الشركة</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_name }}" name="company_name"  />
                                    </div>
                                </div>
                            </div>
                           
                         

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الهاتف (للشركة) </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_phone }}" name="company_phone"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">البريد الالكتروني (للشركة) </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_email }}" name="company_email"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">    الرقم الضريبي (للشركة)</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_tax_number }}" name="company_tax_number"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">العميل </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->client_title }}" name="client_title"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">اسم الشركة (للعميل)</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->client_company_name }}" name="client_company_name"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">المعرف </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_identifier }}" name="company_identifier"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الهاتف  (للعميل)</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->client_phone }}" name="client_phone"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">هاتف المندوب </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->delegate_phone }}" name="delegate_phone"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">البريد الالكتروني للمندوب</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->delegate_email }}" name="delegate_email"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الرقم الضريبي  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->delegate_tax_number }}" name="delegate_tax_number"  />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

               
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تفاصيل  الخدمات والاسعار</h4>
                        </div>
                        <div class="card-body">
                        <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الخدمات</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->services_title }}" name="services_title"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الخدمة</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->service_unit }}" name="service_unit"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">سعر الوحدة </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->unit_price }}" name="unit_price"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> العدد</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->service_count }}" name="service_count"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">رسوم طباعة  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->printing_fees }}" name="printing_fees"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">رسوم حكومية  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->government_fees }}" name="government_fees"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">خصم </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->discount }}" name="discount"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الثمن الاجمالى </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_price }}" name="total_price"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">اجمالي الخصم </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_discount }}" name="total_discount"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> المبلغ المدفوع نقداً</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_paid }}" name="total_paid"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">ملحوظة  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->notice }}" name="notice"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> اجمالي رسوم الطباعة </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_printing_fees }}" name="total_printing_fees"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">مبلغ الدين المتبقي  </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->remaining_debt_amount }}" name="remaining_debt_amount"  />
                                    </div>
                                </div>
                            </div>


                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">اجمالي الرسوم الحكومية    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_government_fees }}" name="total_government_fees"  />
                                    </div>
                                </div>
                            </div>


                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">درهم    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->dirham }}" name="dirham"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الضريبية    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->tax }}" name="tax"  />
                                    </div>
                                </div>
                            </div>


                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">المبلغ الاجمالي    </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->all_total_price }}" name="all_total_price"  />
                                    </div>
                                </div>
                            </div>
                         


                            

                        </div>
                    </div>
                </div>
                <hr class="invoice-spacing">


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تفاصيل الشركة والعميل EN</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> اسم الشركة</label>  <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_title_en }}" name="company_title_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الشركة</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_name_en }}" name="company_name_en"  />
                                    </div>
                                </div>
                            </div>
                           
                         

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الهاتف (للشركة) </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_phone_en }}" name="company_phone_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">البريد الالكتروني (للشركة) </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_email_en }}" name="company_email_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">    الرقم الضريبي (للشركة)</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_tax_number_en }}" name="company_tax_number_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">العميل </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->client_title_en }}" name="client_title_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">اسم الشركة (للعميل)</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->client_company_name_en }}" name="client_company_name_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">المعرف </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->company_identifier_en }}" name="company_identifier_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الهاتف  (للعميل)</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->client_phone_en }}" name="client_phone_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">هاتف المندوب </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->delegate_phone_en }}" name="delegate_phone_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">البريد الالكتروني للمندوب</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->delegate_email_en }}" name="delegate_email_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الرقم الضريبي  </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->delegate_tax_number_en }}" name="delegate_tax_number_en"  />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

               
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تفاصيل  الخدمات والاسعار EN</h4>
                        </div>
                        <div class="card-body">
                        <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الخدمات</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->services_title_en }}" name="services_title_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> الخدمة</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->service_unit_en }}" name="service_unit_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">سعر الوحدة </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->unit_price_en }}" name="unit_price_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> العدد</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->service_count_en }}" name="service_count_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">رسوم طباعة  </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->printing_fees_en }}" name="printing_fees_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">رسوم حكومية  </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->government_fees_en }}" name="government_fees_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">خصم </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->discount_en }}" name="discount_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الثمن الاجمالى </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_price_en }}" name="total_price_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">اجمالي الخصم </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_discount_en }}" name="total_discount_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                 <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> المبلغ المدفوع نقداً</label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_paid_en }}" name="total_paid_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">ملحوظة  </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->notice_en }}" name="notice_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon"> اجمالي رسوم الطباعة </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_printing_fees_en }}" name="total_printing_fees_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">مبلغ الدين المتبقي  </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->remaining_debt_amount_en }}" name="remaining_debt_amount_en"  />
                                    </div>
                                </div>
                            </div>


                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">اجمالي الرسوم الحكومية    </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->total_government_fees_en }}" name="total_government_fees_en"  />
                                    </div>
                                </div>
                            </div>


                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">درهم    </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->dirham_en }}" name="dirham_en"  />
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">الضريبية    </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->tax_en }}" name="tax_en"  />
                                    </div>
                                </div>
                            </div>


                            <div class="input-group mb-2">
                               <div class="col-sm-3 text-center">
                                    <label class="col-form-label" for="fname-icon">المبلغ الاجمالي    </label> <label class="col-form-label" for="fname-icon">  EN</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="fname-icon" class="form-control" value="{{ @$InvoiceDetails->all_total_price_en }}" name="all_total_price_en"  />
                                    </div>
                                </div>
                            </div>
                         


                            

                        </div>
                    </div>
                </div>

                <div class="col-sm-12 offset-sm-12">
                <button type="submit" class="btn btn-primary me-1 ">ارسال</button>
            </div>
            </div>
          
            </form>
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

