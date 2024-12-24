@extends('client.layout.app')

{{-- Content statr --}}
@section('content')
@if (Session::has('msg'))
    <div id="alertMsg" class="alert alert-primary container fade show" role="alert"
        style="width: 350px; position: fixed; top: 250px; right: 20px; z-index: 1000;">
        <p>{{ Session::get('msg') }}</p>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('alertMsg').style.display = 'none';
        }, 3000);
    </script>
@endif
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">Discover. Learn. Enjoy</h1>

                    <h6 class="text-center">platform for rating univerisities and professor</h6>

                    <form action="{{ route('search') }}" method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1"></span>
                            <input name="keyword" type="search" class="form-control" id="keyword" placeholder="FUI, GUI, UK ..." aria-label="Search">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="featured-section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    <div class="custom-block bg-white shadow-lg">
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">Our goal</h5>

                                    <p class="mb-0">This platform aims to foster a sense of community among
                                        students and provide them with a medium to express their views freely.</p>
                                </div>

                                <span class="badge bg-design rounded-pill ms-auto">01</span>
                            </div>

                            <img src="{{ asset('client/images/topics/undraw_Remote_design_team_re_urdx.png') }}"
                                class="custom-block-image img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-block custom-block-overlay">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset('client/images/feedback-3083100_640.jpg') }}"
                                class="custom-block-image img-fluid" alt="">

                            <div class="custom-block-overlay-text d-flex">
                                <div>
                                    <h5 class="text-white mb-2">Odjectives</h5>

                                    <p class="text-white">The primary objective of this project is to create a
                                        user-friendly, interactive, and engaging website where students can rate
                                        their professors, engage in discussions, and connect with their peers.</p>
                                </div>

                                <span class="badge bg-finance rounded-pill ms-auto">02</span>
                            </div>
                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="contact-section section-padding section-bg" id="section_5">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-5">Get in touch</h2>
                </div>

                <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d13021.122690329063!2d33.347616060200714!3d35.323851113271765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d35.317350399999995!2d33.357824!4m5!1s0x14de6b45150f5809%3A0xdc324b8f3a16d848!2sgeolocalisation%20de%20final%20international%20university!3m2!1d35.3300769!2d33.3614128!5e0!3m2!1sfr!2s!4v1700427386700!5m2!1sfr!2s"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                    <h4 class="mb-3">Cyprus office</h4>

                    <p>Final international University &amp; Girn, Cyprus</p>

                    <hr>

                    <p class="d-flex align-items-center mb-1">
                        <span class="me-2">Phone</span>

                        <a href="tel: +90 392 650 66 66" class="site-footer-link">
                            +90 5338835539
                        </a>
                    </p>

                    <p class="d-flex align-items-center">
                        <span class="me-2">Email</span>

                        <a href="mailto:info@company.com" class="site-footer-link">
                            traoremahamad74@gamail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mx-auto">
                    <h4 class="mb-3">Mali office</h4>

                    <p>Bamako, Mali</p>

                    <hr>

                    <p class="d-flex align-items-center mb-1">
                        <span class="me-2">Phone</span>

                        <a href="tel: +223 66067469" class="site-footer-link">
                            +223 66067469
                        </a>
                    </p>

                    <p class="d-flex align-items-center">
                        <span class="me-2">Email</span>

                        <a href="mailto:info@company.com" class="site-footer-link">
                            traoremahamad74@gamail.com
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </section>
@endsection
{{-- Content End  --}}

@section('scripts')
    <script>$(document).ready(function() {
        $("#keyword").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('autocomplete') }}",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2 // Minimum characters before triggering autocomplete
        });
    });</script>
@endsection
