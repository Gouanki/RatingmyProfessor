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

                            <li class="breadcrumb-item active" aria-current="page">add university</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Add university</h2>
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

    <form action="{{ url('/client_create_university') }}" method="POST">
        {{ csrf_field() }}
        <div class="col-lg-8 col-12 mt-3 mx-auto">
            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                <div class="mb-3">
                    <label for="university_name" class="form-label">Name of university</label>
                    <input type="text" name="university_name" id="university_name"
                        class="form-control @error('university_name')
                        is-invalid
                    @enderror"
                        aria-describedby="helpId">
                    @error('university_name')
                        <small class="text-danger">{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" name="country" id="country"
                        class="form-control @error('country')
                        is-invalid
                    @enderror"
                        aria-describedby="helpId">
                    @error('country')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" id="city"
                        class="form-control @error('city')
                        is-invalid
                    @enderror"
                        aria-describedby="helpId">
                    @error('city')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" name="website" id="website"
                        class="form-control @error('website')
                        is-invalid
                    @enderror"
                        aria-describedby="helpId">
                    @error('website')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="university_email" class="form-label">University Email</label>
                    <input type="text" name="university_email" id="university_email"
                        class="form-control @error('university_email')
                        is-invalid
                    @enderror"
                        aria-describedby="helpId">
                    @error('university_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-success btn-lg">Add Uiversity</button>
            </div>
        </div>
    </form>
@endsection

{{-- Content End  --}}
