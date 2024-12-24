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

                            <li class="breadcrumb-item active" aria-current="page">profile</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Profile</h2>
                </div>

            </div>
        </div>
    </header>

    <form action="{{ url('/edited') }}" method="post">
        {{ csrf_field() }}
        <div class="col-lg-8 col-12 mt-3 mx-auto">
            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Name : {{$student->student_name}}</p>
                        <p>Email: {{$student->email}}</p>
                        <p>University: {{$student->university->university_name}}</p>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{url('/student_edit_profile/'.$student->id)}}" class="btn btn-outline-success btn-lg-lg  mt-lg-5">Edit</a>
                        <a href="{{url('/student_delete_profile/'.$student->id)}}" class="btn btn-outline-danger btn-lg-lg  mt-lg-5">Delete account</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

{{-- Content End  --}}
