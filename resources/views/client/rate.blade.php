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

                            <li class="breadcrumb-item active" aria-current="page">rate</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Wellcome</h2>
                </div>

            </div>
        </div>
    </header>


    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">

                @foreach ($professors as $professor)
                <div class="col-lg-12 col-12 text-center">
                    <h3 class="mb-4">Best rated profossor</h3>
                </div>
                <div class="row">
                    <a href="{{ URL::to('/professor_rating/' . $professor->professor->id) }}">
                        <div class="col-lg-8 col-sm-12 mt-3 mx-auto">
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg ">
                                <div class="row">
                                    <div class="col-lg-4 col-4">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Quality</h5>
                                            <p class="badge text-bg-success border border-dark rounded-circle " style="font-size: 20px">{{ number_format($professor->quality, 1) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <h5 class="mb-2">{{ $professor->professor->professor_name }}</h5>
                                        <p class="mb-0">
                                            Department : {{ $professor->professor->department->department_name}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-lg-12 col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $professors->appends(request()->query())->links() }}
                    </ul>
                </nav>
            </div>

            @foreach ($universities as $university)
            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Best rated universities</h3>
            </div>
                <div class="row">
                    <a href="{{ URL::to('/university_rating/' . $university->university->id) }}">
                        <div class="col-lg-8 col-sm-12 mt-3 mx-auto">
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg ">
                                <div class="row">
                                    <div class="col-lg-4 col-4">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Quality</h5>
                                            <p class="card-text h1">{{ number_format($university->quality, 1) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <h5 class="mb-2">{{ $university->university->university_name }}</h5>
                                        <p class="mb-0">
                                            City : {{ $university->university->city }}
                                        </p>
                                        <p class="mb-0">
                                            Country : {{ $university->university->country }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-lg-12 col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $universities->appends(request()->query())->links() }}
                    </ul>
                </nav>
            </div>
    </section>
@endsection
{{-- Content End --}}
