@extends('client.layout.app')
{{-- custom css --}}
@section('csss')
<link rel="stylesheet" id="css-main" href={{asset('admin/css/codebase.min.css')}}>
@endsection
{{-- End custom css --}}
{{-- Content Start --}}
@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Sign up</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Sign up</h2>
                </div>

            </div>
        </div>
    </header>
    @if (Session::has('msg'))
        <div class="alert alert-primary container alert-dismissible fade show" role="alert"
            style="width: 350px; position: fixed; top: 250px; right: 20px; z-index: 1000;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ Session::get('msg') }}</p>
        </div>
    @endif
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-body-dark">
            <div class="hero-static content content-full px-1">
                <div class="row mx-0 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <!-- Header -->
                        <div class="py-4 text-center">
                            <h1 class="h3 fw-bold mt-4 mb-1">
                                Upadate my account
                            </h1>
                            <h2 class="fs-5 lh-base fw-normal text-muted mb-0">
                                We’re excited to have you on board!
                            </h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign Up Form -->
                        <form action="{{ url('/student_edited_profile') }}" class="js-validation-signup" method="POST">
                            {{ csrf_field() }}
                            <div class="block block-themed block-rounded block-fx-shadow">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Please add your details</h3>
                                </div>
                                <div class="block-content">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="name" id="name" value={{$student->student_name}}
                                            class="form-control @error('name')
                              is-invalid
                           @enderror"
                                            placeholder="Enter your user name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <label class="form-label" for="name">Username</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control" name="email" id="email" value={{$student->email}}
                                            class="form-control @error('email')
                             is-invalid
                       @enderror"
                                            placeholder="Enter your email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" name="password" id="password"
                                            class="form-control @error('password')
                       is-invalid
                   @enderror"
                                            placeholder="enter your password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 d-sm-flex align-items-center push">
                                        </div>
                                        <div class="col-sm-6 text-sm-end push">
                                            <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                                Update account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content block-content-full bg-body-light d-flex justify-content-between">
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                        href={{ url('/login') }}>
                                        <i class="fa fa-arrow-left opacity-50 me-1"></i> Sign In
                                    </a>
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="#"
                                        data-bs-toggle="modal" data-bs-target="#modal-terms">
                                        <i class="fa fa-book opacity-50 me-1"></i> Read Terms
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign Up Form -->
                    </div>
                </div>
            </div>

            <!-- Terms Modal -->
            <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Terms &amp; Conditions</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content fs-sm">
                                <h5 class="mb-2">1. General</h5>
                                <p class="text-justify">
                                    We don't display any of your personal information anywhere on the
                                    site. Though you have the option of creating an account, an account is not required to
                                    post a rating
                                    and comment. Whether you choose to create a registered account or not, all ratings
                                    submitted will
                                    remain anonymous.
                                </p>
                                <h5 class="mb-2">2. Respect</h5>
                                <p>
                                    Please when rating a university don't use any swearing or abusive words
                                </p>
                                <div class="block-content block-content-full block-content-sm text-end border-top">
                                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                        Done
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Terms Modal -->
            </div>
            <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
@endsection

{{-- Content End  --}}
