<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BETBET">
    <meta name="keywords" content="BETBET">
    <!-- Фавикон -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/png">
    <!-- meta социальные сети -->
    <meta name="twitter:title" content="BETBET">
    <meta name="twitter:description" content="BETBET">
    <meta name="twitter:image:src" content="http://acpool.ru/img/socials.jpg">
    <meta name="twitter:site" content="BETBET">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:url" content="http://acpool.ru//">
    <meta property="og:site_name" content="BETBET">
    <meta property="og:description" content="BETBET">
    <meta property="og:title" content="BETBET">
    <meta property="og:image" content="http://www.acpool.ru/img/socials.jpg">
    <meta property="og:image:width" content="604">
    <meta property="og:image:height" content="322">
    <title>BETBET</title>
    <!-- Поддержка старыми IE6,7,8 элементров от HTML5 -->
    <script src="{{asset('js/html5shiv.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/vendor.css')}}">

    <!-- Основной файл стилей -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#714996">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#714996">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#714996">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- HEADER -->
    @yield('header')
    <!-- HEADER -->

    <!-- CONTENT -->
    @yield('content')
    <!-- CONTENT -->

    <!-- FOOTER -->
    @yield('footer')
    <!-- FOOTER -->

    <!-- MODALS -->
    @yield('modals')
    <!-- MODALS -->

    <!-- SCRIPTS -->
    @yield('scripts')
    <!-- SCRIPTS -->
</body>
</html>