@php
    $route = Route::current()->getName();
@endphp
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="navbar-header ">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                           
            
            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        
                        
                        </span>
                    <h2 class="brand-text ">TYPINVO</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
  
    <div class="main-menu-content ">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
       
           @can('isSuperAdmin')
           <li class="nav-item {{$route == 'admins.index'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/admins')}}"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Email">اعضاء الادارة</span></a>
           </li>
           <li class="nav-item {{$route == 'admins.index'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/memberships')}}"><i data-feather='slack'></i><span class="menu-title text-truncate" data-i18n="Email"> الاشتراكات</span></a>
           </li>
           @endcan
        
         
       @canany(['Dashboard_User', 'Dashboard_Company'])
        <li class="nav-item  {{$route == 'dashboard.index'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/dashboard')}}"><i data-feather="grid"></i><span class="menu-item text-truncate" data-i18n="eCommerce">انشاء فاتورة </span></a>
         </li>
         @endcan
         @can('View_User')
         <li class="nav-item {{$route == 'admin.clients'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/clients')}}"><i data-feather='user-x'></i><span class="menu-title text-truncate" data-i18n="Email"> المستخدمين </span></a>
           </li>
           @endcan
           @can('View_Company')
           <li class="nav-item {{$route == 'admin.companies'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/companies')}}"><i data-feather='home'></i><span class="menu-title text-truncate" data-i18n="Email"> شركات </span>
           <span style="color:inherit !important" class="badge badge-light-danger rounded-pill ms-auto me-2">{{CompanyPadge()}}</span>
        </a>
           </li>
           @endcan 
           @canany(['Dashboard_User', 'Dashboard_Company'])

           @if(checkUserCartType()=='company')
           <li class="nav-item {{$route == 'admin.currentCompanyInvoice'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/currentCompanyInvoice')}}"><i data-feather='shopping-cart'></i><span class="menu-title text-truncate" data-i18n="Email"> الفاتورة الحالية   </span>
           <span style="color:inherit !important" class="badge badge-light-danger rounded-pill ms-auto me-2">{{CartPadge()}}</span>
          
               </a>
           </li>
           @else
           <li class="nav-item {{$route == 'admin.currentInvoice'?'active' :''}}">
            
           <a class="d-flex align-items-center" href="{{url('admin/currentInvoice')}}"><i data-feather='shopping-cart'></i><span class="menu-title text-truncate" data-i18n="Email"> الفاتورة الحالية   </span>
           <span style="color:inherit !important" class="badge badge-light-danger rounded-pill ms-auto me-2">{{CartPadge()}}</span>
             </a>
           </li>
           @endif
           @endcan 

           @canany(['Invoice_View_All', 'Invoice_View_Mine'])
           <li class="nav-item {{$route == 'admin.allInvoices'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/allInvoices')}}"><i data-feather='file-plus'></i><span class="menu-title text-truncate" data-i18n="Email"> جميع الفواتير   </span></a>
           </li>
           @endcan 

        
           <li class="nav-item {{$route == 'admin.viewReceipts'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/viewReceipts')}}"><i data-feather='dollar-sign'></i><span class="menu-title text-truncate" data-i18n="Email"> المقبوضات    </span></a>
           </li>

           <li class="nav-item {{$route == 'admin.viewExpenses'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/viewExpenses')}}"><i data-feather='dollar-sign'></i><span class="menu-title text-truncate" data-i18n="Email"> المصاريف    </span></a>
           </li>
           
         
       
           @canany(['SETTINGS_General', 'SETTINGS_Payment_Type','SETTINGS','SETTINGS_Department','Edit_Permissions','View_Balance_Company','SETTINGS_Edit_Inoice'])
         
           <li class=" nav-item  "><a class="d-flex align-items-center" href="#"><i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="Invoice">الاعدادات</span></a>
                <ul class="menu-content">
                @can('SETTINGS_General')
                <li class="{{$route == 'generalSetting.index'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/generalSetting')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">   الاعدادات العامه </span></a>
                    </li>
                    @endcan
                    @can('SETTINGS_Payment_Type')
                    <li class="{{$route == 'paymentType.index'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/paymentType')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">تعديل نوع الدفع   </span></a>
                    </li>
                    @endcan
                    @can('SETTINGS_Edit_Inoice')
                    <li class="{{$route == 'manageInvoice.index'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/manageInvoice')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">تعديل  الفاتورة   </span></a>
                    </li>
                    @endcan

                    <li class="nav-item {{$route == 'admin.viewPayments'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/viewPayments')}}"><i data-feather='circle'></i><span class="menu-title text-truncate" data-i18n="Email"> المدفوعات    </span></a>
                      </li>
                    @can('SETTINGS_Department')
                    <li class="{{$route == 'admin.mainCategory'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/mainCategory')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">   اقسام الخدمات</span></a>
                    </li>
                    @endcan
                  
                    @can('View_Balance_Company')
                    <li class="{{$route == 'admin.companies.viewTransaction'?'active' :''}}"><a class="d-flex align-items-center" href="{{url('admin/companies/viewTransaction')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">    اضافة رصيد للشركات</span></a>
                    </li>
                    @endcan


                    
                </ul>
            </li>
            @endcanany
         
             </ul>
            </li>
             </ul>
             </div>
        </div>
    </div>
<!-- END: Main Menu-->
