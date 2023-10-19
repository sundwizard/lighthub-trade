<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_NG">
    <meta property="og:url" content="https:://www.lighthubtech.com">
    <meta property="og:title" content="Lighthub">
    <meta property="og:description"
        content="Lighthub Technologies.">
    <meta property="og:image" content="{{ asset('assets/images/bg-logo.png') }}">
    <meta name="google:card" content="summary_large_image">
    <meta name="google:description"
        content="Lighthub Technologies">
    <meta name="google:title" content="Lighthub">
    <meta name="google:image" content="{{ asset('assets/images/bg-logo.png') }}">
    <meta name="description"
        content="Lighthub Technologies." />
    <meta name="author" content="Lighthub" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="Cypto, P2P, " />

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>{{ $title ?? Auth::user()->user_type.' Dashbard' }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.3') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mystyles.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.3') }}">
    @livewireStyles
    @stack('styles')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="{{ route('dashboard')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" width="90%" src="{{ asset('assets/images/d-logo.png') }}" srcset="{{ asset('assets/images/d-logo.png') }}" alt="logo">
                            <img class="logo-dark logo-img" width="90%" src="{{ asset('assets/images/d-logo.png') }}" srcset="{{ asset('assets/images/d-logo.png') }}" alt="logo-dark">
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    @include('includes.navbar')
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('includes.header')
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    {{ $slot }}
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2023 Lighthub Technology
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- JavaScript -->
    @include('includes.alerts')

    @livewireScripts
    <script src="{{ asset('assets/js/bundle.js?ver=3.1.3') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.1.3') }}"></script>
    <script src="{{ asset('assets/js/charts/gd-default.js?ver=3.1.3') }}"></script>
    <script src="{{ asset('assets/js/example-toastr.js?ver=3.1.3') }}"></script>
    <script src="{{ asset('assets/js/example-sweetalert.js?ver=3.1.3') }}"></script>
    @stack('script')

</body>

</html>
