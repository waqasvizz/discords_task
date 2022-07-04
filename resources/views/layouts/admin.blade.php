<!DOCTYPE html>
<html class="loading {{  isset(Auth::user()->theme_mode) && Auth::user()->theme_mode  == 'Light' ? 'dark-layout':'light-layout' }}" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="{{ config('app.name') }} admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, {{ config('app.name') }} admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Select2 CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <!-- BEGIN: Select2 CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice-list.css') }}">
    <!-- END: Page CSS-->


    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-number-input.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <style>
        .alert {
            padding: 15px;
        }

        .alert-success2 {
            background: rgba(40, 199, 111, 0.12) !important;
            color: #28c76f !important;
        }

        .alert-danger2 {
            background: rgba(234, 84, 85, 0.12) !important;
            color: #ea5455 !important;
        }

        .alert-info2 {
            background: rgba(0, 207, 232, 0.12) !important;
            color: #00cfe8 !important;
        }

        .icon_image {
            margin-left: 4%;
        }

        .preview {
            /* background: lightgray; */
            display: none;
            border-radius: 10px;
            margin: 10px 0px;
            padding: 15px;
            border: 1px solid lightgray;
            box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.25);
        }

        .preview img {
            border-radius: 50%;
            height: 60px;
            width: 60px;
            margin: 5px;
            border: 2px solid #7367f0c4;
        }

        .display_images img {
            border-radius: 50%;
            height: 25px;
            width: 25px;
            margin: 5px;
            border: 2px solid #7367f0c4;
        }

        .display_images_list img {
            border-radius: 50%;
            height: 65px;
            width: 65px;
            margin: 5px;
            border: 2px solid #7367f0c4;
        }

        #basic-addon1 {
            padding: 0 !important;
            margin: 0 !important;
        }

        .show_role_name_td {
            padding: 10px;
            background: #f3f2f7;
            border: 1px solid lightgray;
            border-radius: 10px;
        }

        .tp_loader {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 70px;
            color: white;
            transform: translate(-50%, -50%);
        }

        .loaderOverlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            cursor: pointer;
        }

        .avatar-color {
            white-space : nowrap;
            border-radius : 50%;
            position : relative;
            cursor : pointer;
            color : #FFFFFF;
            display : inline-flex;
            font-size : 1rem;
            text-align : center;
            vertical-align : middle;
            font-weight : 600;
        }
        .avatar-color [class*='avatar-status-'] {
            border-radius : 50%;
            width : 11px;
            height : 11px;
            position : absolute;
            right: 12px;
            bottom: 8px;
            border : 1px solid #FFFFFF;
        }
        .avatar-color .avatar-status-online {
                background-color : #28C76F;
        }
        .avatar-color .avatar-status-offline {
                background-color : #ea5455;
        }
        html .pace .pace-progress {
            /* background: #f5f5f5; */
            background: transparent;
        }
        .dark-layout .table-responsive{
            background: transparent;
        }
        .dark-layout .main-menu.menu-light .navigation > li.open:not(.menu-item-closing) > a, .dark-layout .main-menu.menu-light .navigation > li.sidebar-group-active > a{
            background-color: #161d31 !important;
        }

    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
    <!-- <div class="loading" data-v-3bcd05f2 aria-hidden="true"></div> -->
    <!-- BEGIN: Header-->
    <div class="loaderOverlay">
        <div class="tp_loader"><i class="fa fa-spinner fa-pulse"></i></div>
    </div>
    <!-- <span data-v-3bcd05f2="" aria-hidden="true" class="spinner-grow text-primary">Loading</span> -->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style" id="theme_layout">
                        <i class="ficon" data-feather="{{  isset(Auth::user()->theme_mode) && Auth::user()->theme_mode  == 'Light' ? 'moon':'sun' }}"></i>
                    </a>
                </li>

                @include('layouts.notifications')

                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">
                                {{ Auth::user()->name }}
                            </span>
                            <span class="user-status">
                                @php
                                if(Auth::user()->role_id == 1){
                                echo 'Admin';

                                }else if(Auth::user()->role_id == 2){
                                echo 'User';

                                }
                                @endphp
                            </span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ asset('app-assets/images/avatars/6.png') }}" alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                       
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('logout') }}"><i class="mr-50" data-feather="power"></i> Logout</a>
                
                    </div>
                       
                </div>
                   
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ url('/')}}">
                        <span class="brand-logo">
                            <img src="{{ asset('app-assets/images/ico/apple-icon-120.png') }}" class="congratulations-img-left" alt="card-img-left" />
                        </span>
                        <h2 class="brand-text" style="padding-left: 5px; font-size: 17px !important;">{{ config('app.name') }}</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                
                <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{ url('dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>

                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i data-feather="more-horizontal"></i>
                </li>

                <li class="{{ Request::path() == 'exchange_rates_api' ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{ url('exchange_rates_api') }}"><i data-feather="list"></i><span class="menu-title text-truncate" data-i18n="Exchange Rates Api">Exchange Rates Api</span></a>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021
                {{-- <a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a> --}}
                <span class="d-none d-sm-inline-block">, All rights Reserved</span></span>
            {{-- <span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span> --}}
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->



    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->


    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>


    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{ asset('app-assets/js/tinyScript/tinymyc.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-checkout.js')}}"></script>

    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script> --}}
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-list.js') }}"></script>
    <script src="{{ asset('app-assets/js/script.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/sweetalert/sweetalert.min.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });



        $(document).ready(function () {
            $("#exchange_rate_api_form").submit(function (event) {
                event.preventDefault();
                $('.success_div').hide();
                $('.error_div').hide();
                $('.exchange_rate_res').html('');
                var searchBtnVal = $('#searchBtn').text();
                var btn_loader = ' <i class="fa fa-spinner fa-pulse"></i>';
                $('#searchBtn').html(btn_loader+" "+searchBtnVal);

                var form = $('#exchange_rate_api_form')[0];
                var formData = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ URL::to('call_exchange_rates_api') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    context: this,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        $('#searchBtn').html(searchBtnVal);
                        if(!data.success){
                            $('.error_div').show();
                            if(data.error){
                                $('.error_message').html(data.error.message);
                            }else{
                                $('.error_message').html(data.message);
                            }
                        }else{
                            $('.success_div').show();
                            $('.success_message').html('Result found successfully!');
                            $('.exchange_rate_res').html('<b>Date:</b> '+data.date+'<br><b>Result:</b> '+data.result);
                        }

                    },
                    error: function(e) {
                        // console.log(e);
                    }
                });
            });
        });
    </script>
</body>

</html>