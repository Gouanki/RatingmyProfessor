@extends('client.layout.app')
{{-- Content Start --}}
@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page"> add Professor</li>
                        </ol>
                    </nav>

                    <h2 class="text-white"> Add Professor</h2>
                </div>

            </div>
        </div>
    </header>
    @if (Session::has('msg'))
        <div class="alert alert-primary container alert-dismissible fade show" role="alert"  style="width: 350px; position: fixed; top: 250px; right: 20px; z-index: 1000;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ Session::get('msg') }}</p>
        </div>
    @endif
    <form action="{{ url('/client_create_professor') }}" method="post">
        {{ csrf_field() }}
        <div class="col-lg-8 col-12 mt-3 mx-auto">
            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                <div class="mb-3">
                    <label for="professor_name" class="form-label">Name of your professor</label>
                    <input type="text" name="professor_name" id="professor_name"
                        class="form-control @error('professor_name')
                        is-invalid
                    @enderror"
                        placeholder="" aria-describedby="helpId">
                    @error('professor_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <select
                        class="form-select form-select-lg @error('department')
                        is-invalid
                    @enderror"
                        name="department" id="department">
                        <option selected value="null">Select a department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                    @error('department')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="university" class="form-label">University</label>
                    <select
                        class="form-select form-select-lg @error('university') is-invalid
                    @enderror"
                        name="university" id="university">
                        <option selected value="null">Select a University</option>
                        @foreach ($universities as $university)
                            <option value="{{ $university->id }}">{{ $university->university_name }}</option>
                        @endforeach
                    </select>
                    @error('university')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-success btn-lg"> Add Professor</button>
            </div>
        </div>
    </form>
@endsection

{{-- Content End  --}}
