<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <div>
                <span class="smini-visible fw-bold tracking-wide fs-lg">
                    c<span class="text-primary">b</span>
                </span>
                <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
                    <span class="smini-hidden">
                        <span class="fs-4 text-dual">Rate</span><span class="fs-4 text-primary">mProf</span>
                    </span>
                </a>
            </div>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side User -->
            <div class="content-side content-side-user px-0 py-0">
                <!-- Visible only in normal mode -->
                <div class="smini-hidden text-center mx-auto">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar"
                            src="{{ asset('client/images/rate-high-resolution-logo-black-transparent.png') }}"
                            alt="">
                    </a>
                    <ul class="list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="link-fx text-dual" data-toggle="layout" data-action="dark_mode_toggle"
                                href="javascript:void(0)">
                                <i class="fa fa-moon"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-fx text-dual" href="op_auth_signin.html">
                                <i class="fa fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{request()->is('dashboard')?'active':''}}" href="{{ URL::to('/dashboard') }}">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <hr>
                    <li class="nav-main-item {{ request()->is('create_course') or request()->is('create_department') or request()->is('create_university') or request()->is('create_professor') ? 'active' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-edit"></i>
                            <span class="nav-main-link-name">Add Forms</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('create_course')?'active':''}}" href="{{ URL::to('/create_course') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-book"></i> Course</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('create_department')?'active':''}}" href="{{ URL::to('/create_department') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-building-user"></i>
                                        Department</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('create_university')?'active':''}}" href="{{ URL::to('/create_university') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-building-columns"></i>
                                        University</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('create_professor')?'active':''}}" href="{{ URL::to('/create_professor') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-user-tie"></i>
                                        Professor</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item {{ request()->is('show_course', 'show_department', 'show_university', 'show_professor', 'show_comment', 'show_users') ? 'active' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class=" nav-main-link-icon fa-solid fa-eye"></i>
                            <span class="nav-main-link-name">Views</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('show_course')?'active':''}}" href="{{ URL::to('/show_course') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-book"></i> Course</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('show_department')?'active':''}}" href="{{ URL::to('/show_department') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-building-user"></i>
                                        Department</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('show_university')?'active':''}}" href="{{ URL::to('/show_university') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-building-columns"></i>
                                        University</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('show_professor')?'active':''}}" href="{{ URL::to('/show_professor') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-user-tie"></i>
                                        Professor</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('show_comment_prof')?'active':''}}" href="{{ URL::to('/show_comment_prof') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-comments"></i>
                                      Professor  Comment</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('show_comment_univ')?'active':''}}" href="{{ URL::to('/show_comment_univ') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-comments"></i>
                                      University  Comment</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link {{request()->is('show_users')?'active':''}}" href="{{ URL::to('/show_users') }}">
                                    <span class="nav-main-link-name"><i class="fa-solid fa-users"></i>
                                        Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </div>
        <!-- Sidebar Content -->
    </div>
</nav>
<!-- END Sidebar -->
