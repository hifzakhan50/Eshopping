<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Customer - Mega Shoppy</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/png" href="../../../app-assets/images/ico/msicon2.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/tour/tour.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('../../../assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"><i
                                class="ficon feather icon-bell"></i><span
                                class="badge badge-pill badge-primary badge-up"></span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white"></h3><span
                                        class="notification-title">App Notifications</span>
                                </div>
                            </li>
{{--                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between"--}}
{{--                                                                           href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i--}}
{{--                                                class="feather icon-plus-square font-medium-5 primary"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="primary media-heading">You have new order!</h6><small--}}
{{--                                                class="notification-text"> Are your going to meet me tonight?</small>--}}
{{--                                        </div>--}}
{{--                                        <small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago--}}
{{--                                            </time>--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i--}}
{{--                                                class="feather icon-download-cloud font-medium-5 success"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="success media-heading red darken-1">99% Server load</h6><small--}}
{{--                                                class="notification-text">You got new order of goods.</small>--}}
{{--                                        </div>--}}
{{--                                        <small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago--}}
{{--                                            </time>--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i--}}
{{--                                                class="feather icon-alert-triangle font-medium-5 danger"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6>--}}
{{--                                            <small class="notification-text">Server have 99% CPU usage.</small>--}}
{{--                                        </div>--}}
{{--                                        <small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time>--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i--}}
{{--                                                class="feather icon-check-circle font-medium-5 info"></i></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="info media-heading">Complete the task</h6><small--}}
{{--                                                class="notification-text">Cake sesame snaps cupcake</small>--}}
{{--                                        </div>--}}
{{--                                        <small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week--}}
{{--                                            </time>--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-start">--}}
{{--                                        <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="warning media-heading">Generate monthly report</h6><small--}}
{{--                                                class="notification-text">Chocolate cake oat cake tiramisu--}}
{{--                                                marzipan</small>--}}
{{--                                        </div>--}}
{{--                                        <small>--}}
{{--                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month--}}
{{--                                            </time>--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                </a></li>--}}
{{--                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"--}}
{{--                                                                href="javascript:void(0)">Read all notifications</a>--}}
{{--                            </li>--}}
                        </ul>
                    </li>

                    <!--profile: Dropdown-->
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                    class="user-name text-bold-600">{{ auth()->user()->name}}</span><span
                                    class="user-status">Available</span></div>

                                 @php
                                 $data = auth()->user()->join('customer_profiles', 'users.id', 'customer_profiles.user_id')
                                 ->where('customer_profiles.user_id', Auth::user()->id)
                                 ->first();
                                 $image = $data->getOriginal('image');

                                 @endphp
                            <span><img class="round" src="{{ getImageSrc($image)}}"
                                       alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                          href="{{ url('customer/profile/edit') }}"><i
                                    class="feather icon-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand"
                                            href="{{ url('index') }}">

                    <h2 class="brand-text mb-0">Mega Shoppy</h2>
                </a></li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


            <!--Side Bar: options UMAR-->


            <li class=" nav-item"><i class="feather icon-home"></i><span class="menu-title"
                                                                                              data-i18n="Dashboard">My Orders</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2"></span>
        </ul>


    </div>
</div>
<!-- END: Main Menu-->

<div class="app-content content">

    <div class="content-wrapper">

        <!-- Content from views files will be displayed here -->
        @yield('content')

    </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020
            <a class="text-bold-800 grey darken-2" href="{{ url('/home') }}" target="_blank">Mega Shoppy,</a>All rights Reserved</span>
        <span class="float-md-right d-none d-md-block">Your Shopping Partner<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('/app-assets/vendors/js/vendors.min.js') }} "></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
<script src="{{ asset('/app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('/app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('/app-assets/js/scripts/components.js') }}"></script>
<!-- END: Theme JS-->


<!-- END: Page JS-->
<link href="{{ asset('assets/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
<script src="{{ asset('assets/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.bootstrap4.js') }}"></script>


<script src="{{ asset('assets/js/global.js') }}"></script>

@stack('script')
</body>
<!-- END: Body-->

</html>
