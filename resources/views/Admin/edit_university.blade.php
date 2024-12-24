@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    create university
@endsection
{{-- End title --}}

{{-- Content Start --}}
@section('content')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <!-- Heading -->
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <div class="py-3 text-center">
                        <h1 class="h3 fw-extrabold mb-1">
                            Add New University
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Heading -->

            <!-- Basic -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">university</h3>
                </div>
                <div class="block-content">
                    <form action="{{ url('/edited_university') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="col-lg-8 container">
                                {!! Form::hidden('id', $university->id) !!}
                                <div class="mb-4">
                                    <label class="form-label" for="university_name">University Name</label>
                                    <input type="text"
                                        class="form-control col-8 @error('university_name') is-invalid
                                    @enderror"
                                        id="university_name" name="university_name"
                                        value="{{ $university->university_name }}">
                                    @error('university_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="country">Country</label>
                                    <input type="text"
                                        class="form-control col-8 @error('country')
                                        is-invalid
                                    @enderror"
                                        id="example-text-input" name="country" value="{{ $university->country }}">
                                    @error('country')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="city">City</label>
                                    <input type="text"
                                        class="form-control col-8 @error('city')
                                     is-invalid
                                    @enderror"
                                        id="city" name="city"value="{{ $university->city }}">
                                    @error('city')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="website">Website</label>
                                    <input type="text"
                                        class="form-control col-8 @error('website')
                                        is-invalid
                                    @enderror"
                                        id="website" name="website" placeholder="https://example.com"
                                        value="{{ $university->website }}">
                                    @error('website')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text"
                                        class="form-control col-8 @error('email')
                                       is-invalid
                                    @enderror"
                                        id="email" name="email" placeholder="example@gmail.com"
                                        value="{{ $university->email }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email domain</label>
                                    <input type="text"
                                        class="form-control col-8 @error('email_domain')
                                       is-invalid
                                    @enderror"
                                        id="email_domain" name="email_domain" value="{{ $university->email_domain }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Upadate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Basic -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
{{-- Content End --}}
