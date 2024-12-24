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

                    <h2 class="text-white">wellcome</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h3 class="">Result</h3>
                </div>
                    <h2 class="text-warning text-center">No record found.</h2>
            </div>
        </div>
    </section>
@endsection
{{-- Content End --}}
