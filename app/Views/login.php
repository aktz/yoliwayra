<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Login</title>

    <meta name="description" content="yoliwayra">
    <meta name="author" content="anysw">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Yoliwayra">
    <meta property="og:site_name" content="anysw">
    <meta property="og:description" content="Yoliwayra">
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
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
  </head>

  <body>
    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('assets/media/photos/photo28@2x.jpg');">
          <div class="row g-0 bg-primary-dark-op">
            <!-- Meta Info Section -->
            <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
              <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                  <a class="link-fx fw-semibold fs-2 text-white" href="index.html">
                    Yoli<span class="fw-normal">Wayra</span>
                  </a>
                  <p class="text-white-75 me-xl-8 mt-2">
                    Slogan de Yoliwayra
                  </p>
                </div>
              </div>
            </div>
            <!-- END Meta Info Section -->

            <!-- Main Section -->
            <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-extra-light">
              <div class="p-3 w-100 d-lg-none text-center">
                <a class="link-fx fw-semibold fs-3 text-dark" href="index.html">
                  Yoli<span class="fw-normal">Wayra</span>
                </a>
              </div>
              <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                  <!-- Header -->
                  <div class="text-center mb-5">
                    <p class="mb-3">
                      <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                    </p>
                    <h1 class="fw-bold mb-2">
                      Inicio de sesión
                    </h1>
                    <p class="fw-medium text-muted">
                      Inicia sesión o regístrate <a href="op_auth_signup3.html">acá</a>.
                    </p>
                  </div>
                  <!-- END Header -->

                  <!-- Sign In Form -->
                  <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                  <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                  <div class="row g-0 justify-content-center">
                    <div class="col-sm-8 col-xl-4">
                      <form class="js-validation-signin" action="be_pages_auth_all.html" method="POST">
                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-alt py-3" id="nick" name="nick" placeholder="nick">
                        </div>
                        <div class="mb-4">
                          <input type="password" class="form-control form-control-lg form-control-alt py-3" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <div>
                            <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block mb-1" href="op_auth_reminder3.html">
                              Contraseña olvidada?
                            </a>
                          </div>
                          <div>
                            <button type="submit" class="btn btn-lg btn-alt-primary">
                               Ingresar
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- END Sign In Form -->
                </div>
              </div>
              <div class="px-4 py-3 w-100 d-lg-none d-flex flex-column flex-sm-row justify-content-between fs-sm text-center text-sm-start">
                <p class="fw-medium text-black-50 py-2 mb-0">
                  <strong>OneUI 5.5</strong> &copy; <span data-toggle="year-copy"></span>
                </p>
                <ul class="list list-inline py-2 mb-0">
                  <li class="list-inline-item">
                    <a class="text-muted fw-medium" href="javascript:void(0)">Legal</a>
                  </li>
                  <li class="list-inline-item">
                    <a class="text-muted fw-medium" href="javascript:void(0)">Contact</a>
                  </li>
                  <li class="list-inline-item">
                    <a class="text-muted fw-medium" href="javascript:void(0)">Terms</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- END Main Section -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="assets/js/oneui.app.min.js"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/op_auth_signin.min.js"></script>
  </body>
</html>
