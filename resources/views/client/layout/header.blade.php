<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ URL::to('/') }}">
            <img src="{{ asset('client/images/rate-high-resolution-logo-black-transparent.png') }}"
                class="img-fluid rounded-top" width="55px" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ URL::to('/') }}"><i class="fa-solid fa-house fa-beat"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->is('rate') ? 'active' : '' }}"
                        href="{{ URL::to('/rate') }}"><i class="fa-solid fa-star-half-stroke"></i> Best rate</a>
                </li>
                @if (session()->has('student'))
                    <li class="nav-item">
                        <a class="nav-link click-scroll {{ request()->is('add_university') ? 'active' : '' }}"
                            href="{{ URL::to('/add_university') }}"><i class="fa-solid fa-square-plus"></i>
                            University</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll {{ request()->is('add_professor') ? 'active' : '' }}"
                            href="{{ URL::to('/add_professor') }}"><i class="fa-solid fa-user-plus"></i> Professor</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->is('#section_5') ? 'active' : '' }}"
                        href="{{ URL::to('/#section_5') }}"><i class="fa-solid fa-phone"></i> Contact</a>
                </li>
                <div class="d-lg-none">
                    @if (session()->has('student'))
                            <li class="nav-item"><a class="nav-link click-scroll"
                                    href="{{ URL::to('/student_profile/' . session('student')->id) }}"><i
                                        class="fa-solid fa-user-plus"></i> Profile</a></li>

                            <li class="nav-item"><a class="nav-link click-scroll" href="{{ URL::to('/logout') }}"><i
                                        class="fa-solid fa-right-to-bracket"></i> Log out</a></li>
                        </ul>
                    @else
                            <li class="nav-item"><a class="nav-link click-scroll" href="{{ URL::to('/sign') }}"><i
                                        class="fa-solid fa-user-plus"></i> Sing up</a></li>

                            <li class="nav-item"><a class="nav-link click-scroll" href="{{ URL::to('/login') }}"><i
                                        class="fa-solid fa-right-to-bracket"></i> Log in</a></li>
                        </ul>
                    @endif
                </div>
            </ul>
            <div class="d-none d-lg-block dropdown">
                <a href="#" class="dropdown-toggle" id="navbarLightDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user fa-beat fa-lg"></i>
                </a>
                @if (session()->has('student'))
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item"
                                href="{{ URL::to('/student_profile/' . session('student')->id) }}"><i
                                    class="fa-solid fa-user-plus"></i> Profile</a></li>

                        <li><a class="dropdown-item " href="{{ URL::to('/logout') }}"><i
                                    class="fa-solid fa-right-to-bracket"></i> Log out</a></li>
                    </ul>
                @else
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ URL::to('/sign') }}"><i
                                    class="fa-solid fa-user-plus"></i> Sing up</a></li>

                        <li><a class="dropdown-item " href="{{ URL::to('/login') }}"><i
                                    class="fa-solid fa-right-to-bracket"></i> Log in</a></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</nav>
