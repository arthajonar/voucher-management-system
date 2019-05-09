
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css')}}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/meanmenu/meanmenu.min.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/notika-custom-icon.css')}}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/wave/waves.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/chosen/chosen.css')}}">
    <!-- bootstrap select CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select/bootstrap-select.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- Data Table JS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="{{ asset('img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a  href="{{ url('voucher-lists') }}">Voucher</a>
                                </li>
                                <li><a href="{{ url('voucher-register') }}">
                                        <i class="notika-icon notika-edit"></i> Voucher Register
                                    </a>
                                    <ul id="democrou" class="collapse dropdown-header-top">

                                    </ul>
                                </li>
                                <li><a href="{{ url('customers') }}">
                                        <i class="notika-icon notika-edit"></i> Customer
                                    </a>
                                    <ul id="democrou" class="collapse dropdown-header-top">

                                    </ul>
                                </li>
                                <li><a href="{{ url('vouchernames') }}">
                                        <i class="notika-icon notika-edit"></i> Master Voucher
                                    </a>
                                    <ul id="democrou" class="collapse dropdown-header-top">

                                    </ul>
                                </li>

                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Hi, {{ Auth::user()->name }}</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li>
                            <a href="{{ url('voucher-lists') }}">
                                <i class="notika-icon notika-house"></i> Voucher
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('voucher-register') }}">
                                <i class="notika-icon notika-edit"></i> Voucher Register
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('customers') }}">
                                <i class="notika-icon notika-edit"></i> Customer
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('vouchernames') }}">
                                <i class="notika-icon notika-edit"></i> Master Voucher
                            </a>
                        </li>


                        <li>
                            <a data-toggle="tab" href="#Page">
                                <i class="notika-icon notika-support"></i>Hi, {{ Auth::user()->name }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif
                @if (\Session::has('warning'))
                    <div class="alert alert-danger alert-block">
                        <p>{{ \Session::get('warning') }}</p>
                    </div><br />
                @endif
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->

    <!-- Start Content area -->
        @yield('content')
    <!-- End Content area-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p> {{ config('app.name', 'Laravel') }} is using<a href="https://github.com/puikinsh/notika"> Notika theme</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('js/jquery-price-slider.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('js/jquery.scrollUp.min.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('js/meanmenu/jquery.meanmenu.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('js/counterup/waypoints.min.js')}}"></script>
    <script src="{{ asset('js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="{{ asset('js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('js/jvectormap/jvectormap-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('js/sparkline/sparkline-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('js/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('js/flot/curvedLines.js')}}"></script>
    <script src="{{ asset('js/flot/flot-active.js')}}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{ asset('js/knob/jquery.knob.js')}}"></script>
    <script src="{{ asset('js/knob/jquery.appear.js')}}"></script>
    <script src="{{ asset('js/knob/knob-active.js')}}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{ asset('js/wave/waves.min.js')}}"></script>
    <script src="{{ asset('js/wave/wave-active.js')}}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{ asset('js/todo/jquery.todo.js')}}"></script>
    <!--  chosen JS
    ============================================ -->
    <script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script>
    <!-- bootstrap select JS
    ============================================ -->
    <script src="{{ asset('js/bootstrap-select/bootstrap-select.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('js/plugins.js')}}"></script>
	<!--  Chat JS
		============================================ -->
    <script src="{{ asset('js/chat/moment.min.js')}}"></script>
    <script src="{{ asset('js/chat/jquery.chat.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('js/main.js')}}"></script>
	<!-- tawk chat JS
		============================================ -->
    {{-- <script src="{{ asset('js/tawk-chat.js')}}"></script> --}}
    <!-- Data Table JS
		============================================ -->
        <script src="{{ asset('js/data-table/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('js/data-table/data-table-act.js')}}"></script>
</body>

</html>
