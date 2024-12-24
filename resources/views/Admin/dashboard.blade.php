@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    dahboard
@endsection
{{-- End title --}}
{{-- Content start --}}
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="row">
                <!-- Row #1 -->
                <div class="col-6 col-xl-3">
                    @if (Session::has('msg'))
                        <div id="alertMsg" class="alert alert-primary container fade show" role="alert"
                            style="width: 350px; position: fixed; top: 250px; right: 20px; z-index: 1000;">
                            <p>{{ Session::get('msg') }}</p>
                        </div>

                        <script>
                            setTimeout(function() {
                                document.getElementById('alertMsg').style.display = 'none';
                            }, 3000);
                        </script>
                    @endif
                    <a class="block block-rounded block-link-shadow text-end" href="{{ URL::to('/show_users') }}">
                        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa-solid fa-users fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">{{ $student }}</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Student</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="{{ URL::to('/show_university') }}">
                        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa-solid fa-building-columns fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">{{ $university }}</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Univeristies</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="{{ URL::to('/show_comment_univ') }}">
                        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa-solid fa-comments fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">{{ $univ_ratings }}</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">University Comment</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="{{ URL::to('/show_comment_prof') }}">
                        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa-solid fa-comments fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">{{ $prof_ratings }}</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Professor Comment</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="{{ URL::to('/show_professor') }}">
                        <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa-solid fa-user-tie fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">{{ $professor }}</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Professor</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END Row #1 -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
{{-- Content end --}}

@section('script')
    <!-- Page JS Plugins -->

    <script src="{{ asset('admin/js/plugins/chart.js/chart.umd.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin/js/pages/be_pages_dashboard.min.js') }}"></script>
@endsection
