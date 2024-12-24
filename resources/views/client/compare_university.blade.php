@extends('client.layout.app')

{{-- Content start --}}
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
                    <p class="h4 text-white">Rate: {{ $university->university_name }}</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5 p-4">
                    {!! Form::hidden(
                        '',
                        $overallQuality =
                            ($ratings->avg('reputation') +
                                $ratings->avg('location') +
                                $ratings->avg('opportunity') +
                                $ratings->avg('club') +
                                $ratings->avg('food') +
                                $ratings->avg('happiness') +
                                $ratings->avg('safety') +
                                $ratings->avg('internet')) /
                            8,
                    ) !!}
                    <h3 class="text-center mb-lg-3">Overall Quality: {{ number_format($overallQuality, 1) }}</h3>
                    <h4 class="text-center lead">{{ $university->university_name }}</h4>

                    <div class="container">
                        <div class="row text-justify">
                            <div class="col-lg-6 col-6">
                                <p><i class="fa-solid fa-square-check" style="color: #80d0c7;"></i> Reputation:
                                    @for ($i = 0; $i < $ratings->avg('reputation'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p><i class="fa-solid fa-location-dot" style="color: #80d0c7;"></i> Location:
                                    @for ($i = 0; $i < $ratings->avg('location'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p><i class="fa-solid fa-earth-americas" style="color: #80d0c7;"></i> Opportunity:
                                    @for ($i = 0; $i < $ratings->avg('opportunity'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p><i class="fa-solid fa-bowl-food" style="color: #80d0c7;"></i> Food: @for ($i = 0; $i < $ratings->avg('food'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p><i class="fa-solid fa-people-group" style="color: #80d0c7;"></i> Club:
                                    @for ($i = 0; $i < $ratings->avg('club'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p><i class="fa-solid fa-shield" style="color: #80d0c7;"></i> Safety: @for ($i = 0; $i < $ratings->avg('safety'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p><i class="fa-solid fa-wifi" style="color: #80d0c7;"></i> Internet: @for ($i = 0; $i < $ratings->avg('internet'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p><i class="fa-solid fa-face-grin-tears" style="color: #80d0c7;"></i> Happiness:
                                    @for ($i = 0; $i < $ratings->avg('happiness'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5 p-4">
                    <form action="{{ url('/compare') }}" method="post" id="compareUniversityForm">
                        @csrf
                        {!! Form::hidden('universityID', $university->id) !!}
                        <div class="input-group">
                            <input name="compare" class="form-control" type="search" id="keyword"
                                placeholder="Search university..." aria-label="Search">
                            <button type="submit" class="btn btn-outline-success">Compare</button>
                        </div>
                    </form>
                    @if (isset($ratingsForComparison) && $ratingsForComparison->count() > 0)
                        {!! Form::hidden(
                            '',
                            $overallQuality =
                                ($ratingsForComparison->avg('reputation') +
                                    $ratingsForComparison->avg('location') +
                                    $ratingsForComparison->avg('opportunity') +
                                    $ratingsForComparison->avg('club') +
                                    $ratingsForComparison->avg('food') +
                                    $ratingsForComparison->avg('happiness') +
                                    $ratingsForComparison->avg('safety') +
                                    $ratingsForComparison->avg('internet')) /
                                8,
                        ) !!}
                        <!-- Container for displaying comparison results -->
                        <h3 class="text-center mb-lg-3 mt-2">Overall Quality: {{ number_format($overallQuality, 1) }}</h3>
                        @if (isset($universityToCompare))
                            <h4 class="text-center lead">{{ $universityToCompare->university_name }}</h4>
                        @endif

                        <div class="container">
                            <div class="row text-justify">
                                <div class="col-lg-6 col-6">
                                    <p><i class="fa-solid fa-square-check" style="color: #80d0c7;"></i> Reputation:
                                        @for ($i = 0; $i < $ratingsForComparison->avg('reputation'); $i++)
                                            <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                        @endfor
                                    </p>
                                    <p><i class="fa-solid fa-location-dot" style="color: #80d0c7;"></i> Location:
                                        @for ($i = 0; $i < $ratingsForComparison->avg('location'); $i++)
                                            <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                        @endfor
                                    </p>
                                    <p><i class="fa-solid fa-earth-americas" style="color: #80d0c7;"></i> Opportunity:
                                        @for ($i = 0; $i < $ratingsForComparison->avg('opportunity'); $i++)
                                            <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                        @endfor
                                    </p>
                                    <p><i class="fa-solid fa-bowl-food" style="color: #80d0c7;"></i> Food: @for ($i = 0; $i < $ratingsForComparison->avg('food'); $i++)
                                            <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                        @endfor
                                    </p>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <p><i class="fa-solid fa-people-group" style="color: #80d0c7;"></i> Club:
                                        @for ($i = 0; $i < $ratingsForComparison->avg('club'); $i++)
                                            <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                        @endfor
                                    </p>
                                    <p><i class="fa-solid fa-shield" style="color: #80d0c7;"></i> Safety: @for ($i = 0; $i < $ratingsForComparison->avg('safety'); $i++)
                                            <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                        @endfor
                                    </p>
                                    <p><i class="fa-solid fa-wifi" style="color: #80d0c7;"></i> Internet: @for ($i = 0; $i < $ratingsForComparison->avg('internet'); $i++)
                                            <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                        @endfor
                                    </p>
                                    <p><i class="fa-solid fa-face-grin-tears" style="color: #80d0c7;"></i> Happiness:
                                        @for ($i = 0; $i < $ratingsForComparison->avg('happiness'); $i++)
                                            <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                        @endfor
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>
            @else
                {{-- <h2 class="text-warning text-center mt-4">No ratings available for this university.</h2>
                    <a href="{{ URL::to('/university/' . $university->id) }}"
                        class="btn col-12 col-md-4 offset-md-4 w-lg-25 text-center custom-btn mt-3 mt-md-4">Rate this
                        university</a> --}}
                @endif
            </div>
        </div>

    </div>
@endsection
{{-- Content End --}}
