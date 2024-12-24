@extends('client.layout.app')

{{-- Content Start --}}
@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center bg-dark text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rate</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Welcome</h2>
                </div>
                <div class="">
                    <p class="h4 text-white">Rate: {{ $professor->professor_name }}</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        @if ($ratings->count() > 0)
            <a href="{{ URL::to('/professor/' . $professor->id) }}"
                class="btn col-12 col-md-4 offset-md-4 w-lg-25 text-center custom-btn mt-3 mt-md-4">Rate this Professor</a>
            <div class="col-lg-8 col-12 mt-3 mx-auto">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5 p-4">


                    {{-- compuatation part --}}
                    @php
                        $gratet = ($professor->ratings->where('status', 1)->avg('grade') / 100) * 5;
                        $Quality =
                            (($professor->ratings->where('status', 1)->avg('used_textbooks') +
                                $professor->ratings->where('status', 1)->avg('listened_to_students') +
                                $professor->ratings->where('status', 1)->avg('take_again')) /
                                3) *
                            5;
                        $qualityt = ($Quality + $gratet) / 2;
                        $hawesomeCount = $professor->ratings
                            ->where('status', 1)
                            ->where('gradeProfessor', 'hawesome')
                            ->count();
                        $greatCount = $professor->ratings
                            ->where('status', 1)
                            ->where('gradeProfessor', 'great')
                            ->count();
                        $goodCount = $professor->ratings->where('status', 1)->where('gradeProfessor', 'good')->count();
                        $okCount = $professor->ratings->where('status', 1)->where('gradeProfessor', 'ok')->count();
                        $awfulCount = $professor->ratings
                            ->where('status', 1)
                            ->where('gradeProfessor', 'awful')
                            ->count();

                        $totalRatings = $professor->ratings->count();

                        $hawesome = ($hawesomeCount / $totalRatings) * 5;
                        $great = ($greatCount / $totalRatings) * 5;
                        $good = ($goodCount / $totalRatings) * 5;
                        $ok = ($okCount / $totalRatings) * 5;
                        $awful = ($awfulCount / $totalRatings) * 5;
                    @endphp

                    <h3 class="text-center mb-lg-3">Overall Quality: {{ number_format($qualityt, 1) }} <sup>/ 5</sup></h3>

                    <div class="container">
                        <div class="row text-justify">
                            <div class="col-lg-6 col-6">
                                <p>
                                    Would you take again:
                                    {{ number_format($professor->ratings->where('status', 1)->avg('take_again') * 100, 1) }}%
                                </p>
                                <p>
                                    Grade: {{ number_format($professor->ratings->where('status', 1)->avg('grade'), 1) }}%
                                </p>
                                <p>
                                    Difficulty:
                                    {{ number_format($professor->ratings->where('status', 1)->avg('difficultyProfessor', 1)) }}
                                </p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p>Hawesome: @for ($i = 0; $i < $hawesome; $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p>Great: @for ($i = 0; $i < $great; $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p>Good: @for ($i = 0; $i < $good; $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p>Ok: @for ($i = 0; $i < $ok; $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                <p>Awful: @for ($i = 0; $i < $awful; $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center text-success">Individual Ratings: {{ $ratings->count() }}</p>
            @foreach ($ratings as $rating)
                <div class="row">
                    <div class="col-lg-8 col-12 mt-3 mx-auto">
                        <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5 p-4">
                            <div class="row">
                                <div class="col-lg-2 ">
                                    @php
                                        $gratet = ($rating->grade / 100) * 5;
                                        $Quality =
                                            (($rating->used_textbooks +
                                                $rating->listened_to_students +
                                                $rating->take_again) /
                                                3) *
                                            5;
                                        $Qualityst = ($Quality + $gratet) / 2;
                                        $takeagain = $rating->take_again ? 'Yes' : 'No';
                                        $textbooks = $rating->used_textbooks ? 'Yes' : 'No';
                                        $attentive = $rating->listened_to_students ? 'Yes' : 'No';
                                    @endphp
                                    <h4 class="text-center mt-3">Quality {{ number_format($Qualityst, 1) }}</h4>
                                </div>
                                <div class="col-lg-10">
                                    <div>
                                        <div class="row text-justify">
                                            @if (isset($rating->course->code))
                                                <p class="fw-bold h5 text-decoration-underline ">{{ $rating->course->code }}
                                                </p>
                                            @else
                                                <p class="fw-bold h5 text-decoration-underline text-center py-3">
                                                    {{ $rating->course_name }}</p>
                                            @endif
                                            <div class="col-lg-6 col-6">
                                                <p>
                                                    <b>Would you take again: </b>{{ $takeagain }}
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-6">
                                                <p>
                                                    <b>Textbooks: </b>{{ $textbooks }}
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-6">
                                                <p>
                                                    <b>Grade: </b>{{ $rating->grade }}%
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-6">
                                                <p>
                                                    <b>Attentive: </b>{{ $attentive }}
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mb-0"><b>Comment:</b> {{ $rating->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="my-5">

                <h3 class="text-warning text-center">No ratings available for this professor.</h3>
                <a href="{{ URL::to('/professor/' . $professor->id) }}"
                    class="btn col-12 col-md-4 offset-md-4 w-lg-25 text-center custom-btn mt-3 mt-md-4">Rate this
                    Professor</a>
            </div>
        @endif
    </div>
@endsection
{{-- Content End --}}
