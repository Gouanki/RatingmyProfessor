 <!-- Header -->
 <header id="page-header">
     <!-- Header Content -->
     <div class="content-header">
         <!-- Left Section -->
         <div class="space-x-1">
             <!-- Toggle Sidebar -->
             <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
             <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                 <i class="fa fa-fw fa-bars"></i>
             </button>
             <!-- END Toggle Sidebar -->
         </div>
         <!-- END Left Section -->

         <!-- Right Section -->
         <div class="space-x-1">
             <!-- User Dropdown -->
             <div class="dropdown d-inline-block">
                 <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-user d-sm-none"></i>
                     <span class="d-none d-sm-inline-block fw-semibold">{{ session('admin')->student_name }}</span>
                     <i class="fa fa-angle-down opacity-50 ms-1"></i>
                 </button>
                 <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                     aria-labelledby="page-header-user-dropdown">
                     <div class="px-2 py-3 bg-body-light rounded-top">
                         <h5 class="h6 text-center mb-0">
                             {{ session('admin')->student_name }}
                         </h5>
                     </div>
                     <div class="p-2">
                         <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                             href="{{ URL::to('/admin_profile/'.session('admin')->id) }}">
                             <span>Profile</span>
                             <i class="fa fa-fw fa-user opacity-25"></i>
                         </a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                             href="{{ url('/admin_logout') }}">
                             <span>Log out</span>
                             <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                         </a>
                     </div>
                 </div>
             </div>
             <!-- END User Dropdown -->

             <!-- Notifications -->
             <div class="dropdown d-inline-block">
                 <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-flag"></i>
                     <span class="text-primary">&bull;</span>
                 </button>
                 <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-notifications">
                     <div class="px-2 py-3 bg-body-light rounded-top">
                         <h5 class="h6 text-center mb-0">
                             Notifications
                         </h5>
                     </div>
                     <ul class="nav-items my-2 fs-sm">
                         <li>
                             <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                 <div class="flex-shrink-0 me-2 ms-3">
                                     <i class="fa fa-fw fa-check text-success"></i>
                                 </div>
                                 <div class="flex-grow-1 pe-2">
                                     <p class="fw-medium mb-1">Someone just commented
                                     </p>
                                     <div class="text-muted">1 min</div>
                                 </div>
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
             <!-- END Notifications -->
         </div>
         <!-- END Right Section -->
     </div>
     <!-- END Header Content -->

 </header>
 <!-- END Header -->
