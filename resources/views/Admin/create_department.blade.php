@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    create department
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
                            Add Department
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Heading -->

            <!-- Basic -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">department</h3>
                </div>
                <div class="block-content">
                    <form action="{{ url('/created_department') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="col-lg-8 container">
                            <div class="mb-4">
                                <label class="form-label" for="department_name">Department Name</label>
                                <input type="text"
                                    class="form-control col-8 @error('department_name') is-invalid @enderror"
                                    id="department_name" name="department_name">
                                @error('department_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Create</button>
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
