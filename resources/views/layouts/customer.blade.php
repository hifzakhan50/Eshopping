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

                   <img class="brand-logo"  src="{{ URL::to('/app-assets/images/logo.png') }}">
                    <h2 class=" brand-text mb-0">Mega Shoppy</h2>
                </a></li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


            <!--Side Bar: options -->

            <li class=" nav-item"><a href="{{ url('/home') }}"><i class="feather icon-home"></i><span class="menu-title"
                                                                                                                 data-i18n="Dashboard">Shop</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2"></span></a>
            <li class=" nav-item"><a href='/customer'><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">My Orders</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2"></span></a>

{{--            <li class=" nav-item"><i class="feather icon-home"></i><span class="menu-title"--}}
{{--                                                                                              data-i18n="Dashboard">My Orders</span>--}}
{{--                    <span class="badge badge badge-warning badge-pill float-right mr-2"></span>--}}
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
