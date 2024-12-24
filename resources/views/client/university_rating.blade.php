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
                    <p class="h4 text-white">Rate: {{ $university->university_name }}</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container my-5">
        @if ($ratings->count() > 0)
            <div class="row justify-content-center text-center">
                <div class="col-6 col-md-4 mt-3 mt-md-4">
                    <a href="{{ URL::to('/university/' . $university->id) }}" class="btn btn-block custom-btn">Rate this
                        university</a>
                </div>
                <div class="col-6 col-md-4 mt-3 mt-md-4">
                    <a href="{{ URL::to('/compare/' . $university->id) }}" class="btn btn-block custom-btn active">Compare
                        this university</a>
                </div>
            </div>

            <div class="col-lg-8 col-12 mt-3 mx-auto">
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

                    <div class="container">
                        <div class="row text-justify">
                            <div class="col-lg-6 col-6">
                                <p><i class="fa-solid fa-square-check" style="color: #80d0c7;"></i> Reputation: @for ($i = 0; $i < $ratings->avg('reputation'); $i++)
                                        <i class="fa-solid fa-solid fa-star fa-sm" style="color: #EAC612"></i>
                                    @endfor
                                </p>
                                <p><i class="fa-solid fa-location-dot" style="color: #80d0c7;"></i> Location: @for ($i = 0; $i < $ratings->avg('location'); $i++)
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
                                <p><i class="fa-solid fa-people-group" style="color: #80d0c7;"></i> Club: @for ($i = 0; $i < $ratings->avg('club'); $i++)
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
            <p class="text-center text-success">Individual Ratings: {{ $ratings->count() }}</p>
            @foreach ($ratings as $rating)
                <div class="row">
                    <div class="col-lg-8 col-12 mt-3 mx-auto">
                        <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5 p-4">
                            <div class="row">
                                <div class="col-lg-2 ">
                                    {!! Form::hidden(
                                        '',
                                        $Quality =
                                            ($rating->reputation +
                                                $rating->location +
                                                $rating->opportunity +
                                                $rating->club +
                                                $rating->food +
                                                $rating->happiness +
                                                $rating->safety +
                                                $rating->internet) /
                                            8,
                                    ) !!}
                                    <h4 class="text-center mt-5">Quality {{ number_format($Quality, 1) }}</h4>
                                </div>
                                <div class="col-lg-10">
                                    <div>
                                        <div class="row text-justify">
                                            <div class="col-lg-6 col-6">
                                                <p><i class="fa-solid fa-square-check" style="color: #80d0c7;"></i>
                                                    Reputation:
                                                    @for ($i = 0; $i < $rating->reputation; $i++)
                                                        <i class="fa-solid fa-solid fa-star fa-sm"
                                                            style="color: #EAC612"></i>
                                                    @endfor
                                                </p>
                                                <p><i class="fa-solid fa-location-dot" style="color: #80d0c7;"></i>
                                                    Location:
                                                    @for ($i = 0; $i < $rating->location; $i++)
                                                        <i class="fa-solid fa-solid fa-star fa-sm"
                                                            style="color: #EAC612"></i>
                                                    @endfor
                                                </p>
                                                <p><i class="fa-solid fa-earth-americas" style="color: #80d0c7;"></i>
                                                    Opportunity:
                                                    @for ($i = 0; $i < $rating->opportunity; $i++)
                                                        <i class="fa-solid fa-solid fa-star fa-sm"
                                                            style="color: #EAC612"></i>
                                                    @endfor
                                                </p>
                                                <p><i class="fa-solid fa-bowl-food" style="color: #80d0c7;"></i> Food:
                                                    @for ($i = 0; $i < $rating->food; $i++)
                                                        <i class="fa-solid fa-solid fa-star fa-sm"
                                                            style="color: #EAC612"></i>
                                                    @endfor
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-6">
                                                <p><i class="fa-solid fa-people-group" style="color: #80d0c7;"></i> Club:
                                                    @for ($i = 0; $i < $rating->club; $i++)
                                                        <i class="fa-solid fa-solid fa-star fa-sm"
                                                            style="color: #EAC612"></i>
                                                    @endfor
                                                </p>
                                                <p><i class="fa-solid fa-shield" style="color: #80d0c7;"></i> Safety:
                                                    @for ($i = 0; $i < $rating->safety; $i++)
                                                        <i class="fa-solid fa-solid fa-star fa-sm"
                                                            style="color: #EAC612"></i>
                                                    @endfor
                                                </p>
                                                <p><i class="fa-solid fa-wifi" style="color: #80d0c7;"></i> Internet:
                                                    @for ($i = 0; $i < $rating->internet; $i++)
                                                        <i class="fa-solid fa-solid fa-star fa-sm"
                                                            style="color: #EAC612"></i>
                                                    @endfor
                                                </p>
                                                <p><i class="fa-solid fa-face-grin-tears" style="color: #80d0c7;"></i>
                                                    Happiness:
                                                    @for ($i = 0; $i < $rating->happiness; $i++)
                                                        <i class="fa-solid fa-solid fa-star fa-sm"
                                                            style="color: #EAC612"></i>
                                                    @endfor
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
            <h3 class="text-warning text-center my-4">No ratings available for this university.</h3>
            <a href="{{ URL::to('/university/' . $university->id) }}"
                class="btn col-12 col-md-4 offset-md-4 w-lg-25 text-center custom-btn mt-3 mt-md-4">Rate this
                university</a>
        @endif
    </div>
@endsection
{{-- Content End --}}
