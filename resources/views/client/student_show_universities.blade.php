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

    <section class="mt-2 mb-5">
        <div class="container p-4">
            <div class="text-center mb-2">
                <h3 class="fw-semibold text-dark">University Ratings</h3>
            </div>

            <div class="d-flex justify-content-center align-items-center flex-wrap">
                @forelse ($universities as $university)
                    @php
                        $quality = 0;
                        $quality =
                            ($university->ratings->where('status', 1)->avg('reputation') +
                                $university->ratings->where('status', 1)->avg('location') +
                                $university->ratings->where('status', 1)->avg('opportunity') +
                                $university->ratings->where('status', 1)->avg('club') +
                                $university->ratings->where('status', 1)->avg('food') +
                                $university->ratings->where('status', 1)->avg('happiness') +
                                $university->ratings->where('status', 1)->avg('safety') +
                                $university->ratings->where('status', 1)->avg('internet')) /
                            8;
                    @endphp

                    <a href="{{ URL::to('/university_rating/' . $university->id) }}" class="text-decoration-none">
                        <div class="card shadow-lg mb-4 mx-2" style="max-width: 600px; transition: box-shadow 0.3s;">
                            <div class="card-body p-5 d-flex align-items-center">
                                <div class="d-flex justify-content-center align-items-center bg-light rounded-circle"
                                    style="width: 4rem; height: 4rem;">
                                    <span class="fs-4 fw-bold text-dark">{{ number_format($quality, 1) }}</span>
                                </div>
                                <div class="ms-4">
                                    <h5 class="card-title fw-semibold text-dark mb-2 mt-1">
                                        {{ $university->university_name }}
                                    </h5>
                                    <p class="text-muted mb-1">City: {{ $university->city }}</p>
                                    <p class="text-muted mb-1">Country: {{ $university->country }}</p>
                                    <p class="text-muted fw-semibold mb-0">Ratings:
                                        {{ $university->ratings->where('status', 1)->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center text-muted">No universities found.</p>
                @endforelse
            </div>
        </div>
    </section>


@endsection
{{-- Content End --}}
