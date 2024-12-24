@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    edit profile
@endsection
{{-- End title --}}
{{-- Section start --}}
@section('content')
    <main id="main-container">

        <!-- Page Content -->
        <!-- User Info -->
        <div class="bg-image bg-image-bottom"
            style="background-image: url('{{ asset('admin//media/photos/photo13@2x.jpg') }}');">
            <div class="bg-primary-dark-op py-4">
                <div class="content content-full text-center">
                    <!-- Avatar -->
                    <div class="mb-3">
                        <a class="img-link" href="be_pages_generic_profile.html">
                            <img class="img-avatar img-avatar96 img-avatar-thumb"
                                src="{{ asset('admin//media/avatars/avatar15.jpg') }}" alt="">
                        </a>
                    </div>
                    <!-- END Avatar -->

                    <!-- Personal -->
                    <h1 class="h3 text-white fw-bold mb-2">
                        {{ $admin->student_name }}
                    </h1>
                    <h2 class="h5 fw-medium text-white-75">
                        {{ $admin->type }}
                    </h2>
                    <!-- END Personal -->
                </div>
            </div>
        </div>
        <!-- END User Info -->
        <!-- Basic -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">User profile</h3>
            </div>
            <div class="block-content">
                <form action="{{ url('/admin_updated') }}" method="POST">
                  {{ csrf_field() }}
                        <div class="col-lg-8 container">
                            {!! Form::hidden('id', $admin->id) !!}
                            <div class="mb-4">
                                <label class="form-label" for="name">User Name</label>
                                <input type="text"
                                    class="form-control col-8 @error('name')
                                    is-invalid
                                @enderror"
                                    id="example-text-input" name="name" value="{{ $admin->student_name }}">
                                     @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="text"
                                    class="form-control col-8 @error('email')
                                    is-invalid
                                @enderror"
                                    id="example-text-input" name="email" value="{{ $admin->email }}">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password"
                                    class="form-control col-8 @error('password')
                                    is-invalid
                                @enderror"
                                    id="password" name="password">
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Basic -->
    </main>
@endsection
{{-- Section End  --}}
