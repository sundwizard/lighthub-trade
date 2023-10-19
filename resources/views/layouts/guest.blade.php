<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
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
    <title>{{ $title ?? 'NCC Risk Management' }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.3')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.3') }}">
    @livewireStyles()
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            {{ $slot }}
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @livewireScripts()
    <script src="{{ asset('assets/js/bundle.js?ver=3.1.3') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.1.3') }}"></script>
</html>
