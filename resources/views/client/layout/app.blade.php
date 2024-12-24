<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd87c154b4.js" crossorigin="anonymous"></script>

    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('client/css/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('client/css/templatemo-topic-listing.css') }}" rel="stylesheet">
    {{-- custom css --}}
    @yield('csss')
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Include jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body id="top">
    {{-- Navigation --}}
    @include('client.layout.header')
    <main>

        {{-- Content Start --}}
        @yield('content')
        {{-- Content ENd --}}

        {{-- Footer --}}
        @include('client.layout.footer')

        <!-- JAVASCRIPT FILES -->
        {{-- <script src="{{ asset('client/js/jquery.min.js') }}"></script> --}}
        <script src="{{ asset('client/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('client/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('client/js/custom.js') }}"></script>
        @yield('scripts')
    </main>
</body>

</html>
