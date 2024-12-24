@extends('client.layout.app')
{{-- Content Start --}}
@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">
                zz
                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">rate</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">wellcome</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="my-4 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h3 class="">Result</h3>
                </div>
                @forelse ($professors as $professor)
                    @php
                        $qualityt = 0;

                        $gratet = ($professor->ratings->where('status', 1)->avg('grade') / 100) * 5;
                        $quality =
                            (($professor->ratings->where('status', 1)->avg('used_textbooks') +
                                $professor->ratings->where('status', 1)->avg('listened_to_students') +
                                $professor->ratings->where('status', 1)->avg('take_again')) /
                                3) *
                            5;
                        $qualityt = ($quality + $gratet) / 2;
                        $levelOfDufficulty = $professor->ratings->where('status', 1)->avg('difficultyProfessor');
                    @endphp
                    <a href="{{ URL::to('/professor_rating/' . $professor->id) }}">
                        <div class="col-lg-8 col-12 mt-3 mx-auto">
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                <div class="row">
                                    <div class="col-lg-4 col-4">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Quality</h5>
                                            <p class="card-text h1 pt-3">{{ number_format($qualityt, 1) }}</p>
                                            <hr>
                                            <small>{{ $professor->ratings->where('status', 1)->count() }} ratings</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-8">
                                        <div>
                                            <h5>Name: {{ $professor->professor_name }}</h5>
                                            <p class="mb-2">
                                            <p class="d d-inline"> University:</p>
                                            {{ $professor->university->university_name }}</p>
                                            <p class="mb-2">
                                            <p class="d d-inline">Department:</p>
                                            {{ $professor->department->department_name }}</p>
                                            <p><b>{{ number_format($professor->ratings->where('status', 1)->avg('take_again') * 100, 1) }}%</b>
                                                would you take again | level of difficulty
                                                {{ number_format($levelOfDufficulty, 1) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <h2 class="text-warning text-center">No university found.</h2>
                @endforelse

            </div>
        </div>

    </section>
@endsection
{{-- Content End --}}
