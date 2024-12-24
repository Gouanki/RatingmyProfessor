@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    create professor
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
                            Add New Professor
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Heading -->

            <!-- Basic -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">professor</h3>
                </div>
                <div class="block-content">
                    <form action="{{url('edited_professor')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="col-lg-8 container">
                                {!! Form::hidden('id', $professor->id) !!}
                                <div class="mb-4">
                                    <label class="form-label" for="professor_name">Professor Name</label>
                                    <input type="text" class="form-control col-8 @error('professor_name')
                                        is-invalid
                                    @enderror" id="professor_name"
                                        name="professor_name" value="{{$professor->professor_name}}">
                                    @error('professor_name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="department">Department</label>
                                    <select class="form-select form-select-lg @error('department')
                                        is-invalid
                                    @enderror" name="department" id="department">
                                        <option selected  value="null">{{$professor->department->department_name}}</option>
                                        @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('department')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="university">University</label>
                                    <select class="form-select form-select-lg @error('university')
                                        is-invalid
                                    @enderror" name="university" id="university">
                                    <option selected value="null">{{$professor->university->university_name}}</option>
                                    @foreach ($universities as $university)
                                    <option value="{{$university->id}}">{{$university->university_name}}</option>
                                    @endforeach
                                    </select>
                                    @error('university')
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

