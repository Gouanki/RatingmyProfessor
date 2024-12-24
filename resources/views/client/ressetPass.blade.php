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

                            <li class="breadcrumb-item active" aria-current="page">Reset password</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Reset</h2>
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
    <div class="row mx-0 my-4 justify-content-center">
        <div class="col-lg-8 col-xl-6">
            <!-- Header -->
            <div class="py-4 text-center">
                <h1 class="h3 fw-bold mb-1">
                    Reset my password
                </h1>
            </div>
            <!-- END Header -->

            <!-- Sign In Form -->
            <form action="{{ url('/confirm_reset') }}" class="js-validation-signin" method="POST">
                {{ csrf_field() }}
                <div class="block block-themed block-rounded block-fx-shadow">
                    <div class="block-header bg-gd-dusk">
                        <h3 class="block-title">Reset</h3>
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
                            <input type="hidden" name="token" value="{{ $token }}">
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
                        <div class="form-floating mb-4">
                            <input type="password"
                                class="form-control  @error('confirm_password')
                                        is-invalid
                                    @enderror"
                                id="confirm_password" name="confirm_password" placeholder="Enter your password">
                            @error('confirm_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label class="form-label" for="confirm_password">Confirm Password</label>
                        </div>

                        <div class="text-sm-end push">
                            <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        <!-- END Sign In Form -->

    </div>
    </div>


    <!-- END Page Content -->
@endsection

{{-- Content End  --}}
