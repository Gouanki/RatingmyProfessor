<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Codebase - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <link rel="stylesheet" id="css-main" href="{{asset('admin/css/codebase.min.css')}}">

  </head>

  <body>
    <div id="page-container" class="main-content-boxed">

      <!-- Main Container -->
      <main id="main-container">

        <!-- Page Content -->
        <div class="bg-gd-dusk">
          <div class="hero-static content content-full bg-body-extra-light">
            <!-- Header -->
            <div class="py-4 px-1 text-center mb-4">
              <a class="link-fx fw-bold" href="{{asset('/')}}">
                <span class="fs-4 text-body-color">Rate</span><span class="fs-4">mProf</span>
              </a>
              <h1 class="h3 fw-bold mt-5 mb-2">Welcome to Your Dashboard</h1>
              <h2 class="h5 fw-medium text-muted mb-0">Please sign in</h2>
            </div>
            <!-- END Header -->

            <!-- Sign In Form -->
            <div class="row justify-content-center px-1">
              <div class="col-sm-8 col-md-6 col-xl-4">
                <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signin" action="be_pages_auth_all.html" method="POST">
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="login-username" name="login-username" placeholder="Enter your username">
                    <label class="form-label" for="login-username">Username</label>
                  </div>
                  <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="login-password" name="login-password" placeholder="Enter your password">
                    <label class="form-label" for="login-password">Password</label>
                  </div>
                  <div class="row g-sm mb-4">
                    <div class="col-12 mb-2">
                      <button type="submit" class="btn btn-lg btn-alt-primary w-100 py-3 fw-semibold">
                        Sign In
                      </button>
                    </div>
                    <div class="col-sm-6 mb-1">
                      <a class="btn btn-alt-secondary w-100" href="op_auth_reminder.html">
                        Forgot password
                      </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- END Sign In Form -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
        Codebase JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="assets/js/codebase.app.min.js"></script>

    <!-- jQuery (required for jQuery Validation plugins) -->
    <script src="assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/op_auth_signin.min.js"></script>
  </body>
</html>
