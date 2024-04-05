
<!-- BEGIN: Header-->

<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl  ">
    
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                            data-feather="menu"></i></a></li>
            </ul>
        </div>

        <ul class="nav navbar-nav align-items-center ms-auto">
         
        <!-- <li class="nav-item d-none d-lg-block">
            
        <a class="nav-link nav-link-style"><i class="ficon"
                data-feather="moon"></i></a></li> -->

                @if(Auth::user()->color ==0)
                <li class="nav-item d-none d-lg-block"><a href="{{ route('admin.change_color',1) }}" class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                @else
                <li class="nav-item d-none d-lg-block"><a href="{{ route('admin.change_color',0) }}" class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                @endif

            <!-- <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up" id="new_notification_count">2</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">

                    <li class="scrollable-container media-list">
                        <div class="list-item d-flex align-items-center">
                            <h6 class="fw-bolder me-auto mb-0">الاشعارات  </h6>
                        </div>
                        <a class="d-flex" href="1">
                            <div class="list-item d-flex align-items-start">
                              
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder"> محمد قام بتسجيل الدخول الساعة ٢ </span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </li> -->

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name fw-bolder"></span><span
                            class="user-status">{{ auth()->user()->name }}
                        </span></div>
                        <span class="avatar">
                            <img class="round"alt="avatar" height="40" width="40"
                            @if(!empty(Auth::user()->image ) )

                            src="{{ asset('uploads/user').'/'. auth()->user()->image }}" 
                          @else
                        src="{{ asset('admin/images/portrait/small/avatar-s-11.jpg') }}">
                       
                        <span class="avatar-status-online" @endif></span></span>
                </a>
            
                @canany(['isSuperAdmin', 'PROFIL'])
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item"
                        href="{{url('admin/profile')}}"><i class="me-50" data-feather="user"></i> حسابى الشخصى </a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href=""
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                            class="me-50" data-feather="power"></i> تسجيل خروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                        @csrf
                    </form>
                </div>
                @endcan
            </li>
        </ul>
    </div>
    
</nav>

<!-- END: Header-->
