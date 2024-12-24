@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    create course
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
                            Add Course
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Heading -->

            <!-- Basic -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">course</h3>
                </div>
                <div class="block-content">
                    <form action="{{ url('/edited_course') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $course->id }}">
                        <div class="col-lg-8 container">
                            <div class="mb-4">
                                <label class="form-label" for="val-coursename">Course Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class=" form-control col-8 @error('course_name') is-invalid @enderror"
                                    id="val-coursename" id="course_name" name="course_name"
                                    value="{{ $course->course_name }}">
                                @error('course_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="course_code">Course Code <span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control col-8 col-8 @error('course_code') is-invalid @enderror"
                                    id="course_code" name="course_code"value="{{ $course->code }}">
                                @error('course_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update</button>
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


