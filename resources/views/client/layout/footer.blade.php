<footer class="site-footer pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 mb-4 pb-2">
                <a class="navbar-brand mb-2" href="index.html">
                    <img src="{{ asset('client/images/rate-high-resolution-logo-black-transparent.png') }}"
                        class="img-fluid rounded-top" width="70px" alt="">
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-6">
                <h6 class="site-footer-title mb-3">Resources</h6>

                <ul class="site-footer-links">
                    <li class="site-footer-link-item">
                        <a href="{{ URL::to('/') }}" class="site-footer-link">Home</a>
                    </li>

                    <li class="site-footer-link-item">
                        <a href="#section_5" class="site-footer-link">Contact</a>
                    </li>

                    <li class="site-footer-link-item">
                        <a class="site-footer-link" href="{{ URL::to('/rate') }}">Best rate</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                <h6 class="site-footer-title mb-3">Information</h6>

                <p class="text-white d-flex mb-1">
                    <a href="tel:+223 66067469" class="site-footer-link">
                        +223 66067469
                    </a>
                </p>

                <p class="text-white d-flex text-wrap">
                    <a href="mailto:traoremahamad74@gmail.com" class="site-footer-link text-wrap">
                        traor74@gmail.com
                    </a>
                </p>
            </div>

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        English</button>

                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Turc</button></li>
                    </ul>
                </div>

                <p class="copyright-text mt-lg-5 mt-4">Copyright © 2024. All rights reserved.
                    <br><br>Design: <a rel="nofollow" href="" target="_blank">Traore on the beat</a>
                </p>

            </div>

        </div>
    </div>
</footer>
