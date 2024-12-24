<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@yield('title')</title>

    <meta name="description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description"
        content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('admin/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('client/images/rate-high-resolution-logo-black-transparent.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('admin/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Page JS Plugins CSS -->
    @yield('plugins')

    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('admin/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->

    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">

        {{-- Vertical navbar --}}
        @include('Admin.layoutAdmin.nav_vertical')
        {{-- Vertical navbar end --}}

        {{-- Horizontal navbar --}}
        @include('Admin.layoutAdmin.nav_horizontal')
        {{-- Horizontal navbar end --}}

        {{-- Content start --}}
        @yield('content')
        {{-- Content ENd  --}}

        {{-- Footer start --}}
        @include('Admin.layoutAdmin.footer')
        {{-- Footer ENd --}}
    </div>
    <script src="{{ asset('admin/js/codebase.app.min.js') }}"></script>
    {{-- specific srpits --}}
    @yield('script')
    {{-- specific srpits --}}
</body>

</html>
