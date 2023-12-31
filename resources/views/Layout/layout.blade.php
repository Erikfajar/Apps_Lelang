<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Apps Barang Lelang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Choices.js-->
    <link rel="stylesheet" href="{{ asset('Template') }}/vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('Template') }}/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('Template') }}/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('Template') }}/img/favicon.ico">
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div
                        class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer">
                        <span>Close </span>
                        <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
                            <use xlink:href="#close-1"> </use>
                        </svg>
                    </div>
                    <div class="row w-100">
                        <div class="col-lg-8 mx-auto">
                            <form class="px-4" id="searchForm" action="#">
                                <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                                    <input class="form-control shadow-0 bg-none px-0 w-100" type="search"
                                        name="search" placeholder="What are you searching for...">
                                    <button
                                        class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center"
                                        type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between py-1">
                <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset"
                        href="index.html">
                        <div class="brand-text brand-big"><strong
                                class="text-primary">Apps</strong><strong>Lelang</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">A</strong><strong>L</strong></div>
                    </a>
                    <button class="sidebar-toggle">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                            <use xlink:href="#arrow-left-1"> </use>
                        </svg>
                    </button>
                </div>

            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center p-4">
                
                <div class="ms-3 title">
                    <h1 class="h5 mb-1">
                        @if (Auth::guard('petugas')->check())
                            {{ Auth::guard('petugas')->user()->nama_petugas }}
                        @elseif (Auth::guard('masyarakat')->check())
                            {{ Auth::guard('masyarakat')->user()->nama_lengkap }}
                        @endif
                    </h1>
                    <p class="text-sm text-gray-700 mb-0 lh-1">

                        @if (Auth::guard('petugas')->check())
                            {{ Auth::guard('petugas')->user()->level->level }}
                        @elseif (Auth::guard('masyarakat')->check())
                            User/Masyarakat
                        @endif
                        </h1>
                    </p>
                </div>
            </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Menu</span>
            <ul class="list-unstyled">
                <li class="sidebar-item {{ request()->is('lelang') ? 'active' : '' }}"><a class="sidebar-link"
                        href="{{ route('home') }}">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#real-estate-1"> </use>
                        </svg><span>Home </span></a></li>
                @if (auth()->guard('petugas')->check() &&
                        auth()->guard('petugas')->user()->id_level == '1')
                    <li class="sidebar-item {{ request()->is('lelang/data_barang') ? 'active' : '' }}"><a
                            class="sidebar-link" href="{{ route('data_barang.index') }}">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                <use xlink:href="#portfolio-grid-1"> </use>
                            </svg><span>Data Barang </span></a></li>
                    <li class="sidebar-item {{ request()->is('lelang/barang_lelang') ? 'active' : '' }}"><a
                            class="sidebar-link" href="{{ route('barang_lelang.index') }}">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                <use xlink:href="#portfolio-grid-1"> </use>
                            </svg><span>Lelang </span></a></li>
                @elseif (auth()->guard('petugas')->check() &&
                        auth()->guard('petugas')->user()->id_level == '2')
                    <li class="sidebar-item {{ request()->is('lelang/data_barang') ? 'active' : '' }}"><a
                            class="sidebar-link" href="{{ route('data_barang.index') }}">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                <use xlink:href="#portfolio-grid-1"> </use>
                            </svg><span>Data Barang </span></a></li>
                    <li class="sidebar-item {{ request()->is('lelang/barang_lelang') ? 'active' : '' }}"><a
                            class="sidebar-link" href="{{ route('barang_lelang.index') }}">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                <use xlink:href="#portfolio-grid-1"> </use>
                            </svg><span>Lelang </span></a></li>
                @endif
           
                <li class="sidebar-item {{ request()->is('lelang/penawaran') ? 'active' : '' }}"><a
                        class="sidebar-link" href="{{ route('penawaran.index') }}">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#portfolio-grid-1"> </use>
                        </svg><span>Penawaran </span></a></li>
                <li class="sidebar-item {{ request()->is('lelang/registrasi') ? 'active' : '' }}"><a
                        class="sidebar-link" href="{{ route('registrasi') }}">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#portfolio-grid-1"> </use>
                        </svg><span>Registrasi </span></a></li>
                <li class="sidebar-item {{ request()->is('lelang/data_user') ? 'active' : '' }}"><a
                        class="sidebar-link" href="{{ route('data_user') }}">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#portfolio-grid-1"> </use>
                        </svg><span>Data User </span></a></li>

                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('logout') }}">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#portfolio-grid-1"> </use>
                        </svg><span>Logout </span></a></li>


            </ul>

        </nav>
        <div class="page-content">


            @yield('content')

            <!-- Page Footer-->
            <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs"
                id="footer">
                <div class="container-fluid text-center">
                    <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    <p class="mb-0 text-dash-gray">2021 &copy; Your company. Design by <a
                            href="https://bootstrapious.com">Bootstrapious</a>.</p>
                </div>
            </footer>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('Template') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Template') }}/vendor/just-validate/js/just-validate.min.js"></script>
    <script src="{{ asset('Template') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('Template') }}/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="{{ asset('Template') }}/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="{{ asset('Template') }}/js/front.js"></script>
    <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>


    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
