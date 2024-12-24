@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    update role
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
                            Update user Role
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Heading -->

            <!-- Basic -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Role Management</h3>
                </div>
                <div class="block-content">
                    <form action="{{url('edited_role')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="col-lg-8 container">
                                {!! Form::hidden('id', $user->id) !!}
                                <div class="mb-4">
                                    <label class="form-label" for="professor_name">Student Name</label>
                                    <input type="text" class="form-control col-8" value="{{$user->student_name}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select form-select-lg @error('role')
                                        is-invalid
                                    @enderror" name="role" id="role">
                                        <option selected  value="null">{{$user->type}}</option>
                                        <option value="admin">Admin</option>
                                        <option value="student">Student</option>
                                    </select>
                                    @error('role')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Update</button>
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

