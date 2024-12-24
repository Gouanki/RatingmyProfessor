@extends('client.layout.app')
{{-- Custom css --}}
@section('csss')
    <link rel="stylesheet" id="css-main" href="{{ asset('admin/css/codebase.css') }}">
@endsection
{{-- End Custom css --}}
{{-- Content Start --}}
@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Log in</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Log in</h2>
                </div>

            </div>
        </div>
    </header>

    @if (Session::has('msg'))
        <div class="alert alert-danger container alert-dismissible fade show" role="alert"
            style="width: 350px; position: fixed; top: 250px; right: 20px; z-index: 1000;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ Session::get('msg') }}</p>
        </div>
    @endif
    @if (Session::has('msg_account'))
        <div class="alert alert-primary container alert-dismissible fade show" role="alert"
            style="width: 350px; position: fixed; top: 250px; right: 20px; z-index: 1000;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ Session::get('msg_account') }}</p>
        </div>
    @endif
    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="mb-5">
            <div class="hero-static content content-full px-1">
                <div class="row mx-0 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <!-- Header -->
                        <div class="py-4 text-center">
                            <h1 class="h3 fw-bold mt-4 mb-1">
                                Welcome to Your login Dashboard
                            </h1>
                            <h2 class="fs-5 lh-base fw-normal text-muted mb-0">
                                It’s a great day today!
                            </h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <form action="{{ url('/student_logged') }}" class="js-validation-signin" method="POST">
                            {{ csrf_field() }}
                            <div class="block block-themed block-rounded block-fx-shadow">
                                <div class="block-header bg-gd-dusk">
                                    <h3 class="block-title">Please Sign In</h3>
                                </div>
                                <div class="block-content">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter your username"
                                            class="form-control  @error('email')
                                            is-invalid
                                        @enderror">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password"
                                            class="form-control  @error('password')
                                        is-invalid
                                    @enderror"
                                            id="login-password" name="password" placeholder="Enter your password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <label class="form-label" for="login-password">Password</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8 d-sm-flex align-items-center push">
                                            <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                                href={{ url('/sign') }}>
                                                <i class="fa fa-plus opacity-50 me-1"></i> Create Account
                                            </a> <a class="fs-sm fw-medium link-fx text-muted ml-2 mb-1 d-inline-block"
                                                href={{ url('/forgotpassword') }}>
                                                <i class="fa-solid fa-triangle-exclamation"></i> Forget password
                                            </a>

                                        </div>
                                        <div class="col-sm-4 text-sm-end push">
                                            <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                                Sign In
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
@endsection

{{-- Content End  --}}
