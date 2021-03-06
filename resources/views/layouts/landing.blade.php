<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content='SIMDALIDA SANGGAU'>
    <meta name="description" content="@yield('description')" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Tag  -->
    <title>{{ $title_page }} - SIMDALIDA SANGGAU</title>

    <!-- Favicon -->
    <link rel="icon" type="image/favicon.png" href="{{ url('front/img/logo-sgu.png') }}">

    @include('includes.frontend.style')
    

</head>

<body id="bg">

    <!-- Boxed Layout -->
    <div id="page" class="site boxed-layout">

        <!-- Preloader -->
        <div class="preeloader">
            <div class="preloader-spinner"></div>
        </div>
        <!--/ End Preloader -->

        @include('includes.frontend.header')

        @yield('content')

        @include('includes.frontend.footer', ['$coba' => '$test'])

    </div>

    @stack('prepend-script')
    @include('includes.frontend.script')
    @stack('addon-script')

</body>

</html>