<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>wayra</title>

    <meta name="description" content="Yoliwayra">
    <meta name="author" content="anysw">
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:title" content="wayra travel">
    <meta property="og:site_name" content="wayra">
    <meta property="og:description" content="wayra travel">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">
  </head>

  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

      <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header">
          <!-- Logo -->
          <a class="fw-semibold text-dual" href="index.html">
            <span class="smini-visible">
              <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">Yoli<span class="fw-normal">Wayra</span></span>
          </a>
          <!-- END Logo -->

          <!-- Extra -->
          <div>
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle">
              <i class="far fa-moon"></i>
            </button>
            <!-- END Dark Mode -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
              <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
          </div>
          <!-- END Extra -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side Navigation -->
          <div class="content-side">
            <ul class="nav-main">
              <li class="nav-main-item">
                <a class="nav-main-link" href="#">
                  <i class="nav-main-link-icon si si-energy"></i>
                  <span class="nav-main-link-name" style="color:#e9ecef;">Recientes</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="#">
                  <i class="nav-main-link-icon fa fa-location-dot"></i>
                  <span class="nav-main-link-name" style="color:#e9ecef;">Por Localización</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="#">
                  <i class="nav-main-link-icon far fa-rectangle-list"></i>
                  <span class="nav-main-link-name" style="color:#e9ecef;">Por Categoría</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="<?= base_url('config'); ?>">
                  <i class="nav-main-link-icon fa fa-gear"></i>
                  <span class="nav-main-link-name" style="color:#e9ecef;">Configuración</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
      </nav>
      <!-- END Sidebar -->

      <!-- Header -->
      <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
              <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Toggle Mini Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
              <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Toggle Mini Sidebar -->

            <!-- Open Search Section (visible on smaller screens) -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout" data-action="header_search_on">
              <i class="fa fa-fw fa-search"></i>
            </button>
            <!-- END Open Search Section -->

            <!-- Search Form (visible on larger screens) -->
            <form class="d-none d-md-inline-block" action="be_pages_generic_search.html" method="POST">
              <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2">
                <span class="input-group-text border-0">
                  <i class="fa fa-fw fa-search"></i>
                </span>
              </div>
            </form>
            <!-- END Search Form -->
          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ms-2">
              <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle" src="assets/media/avatars/avatar10.jpg" alt="Header Avatar" style="width: 21px;">
                <span class="d-none d-sm-inline-block ms-2">Usuario</span>
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
                  <p class="mt-2 mb-0 fw-medium">Nombre</p>
                  <p class="mb-0 text-muted fs-sm fw-medium">Apellido</p>
                </div>
                <div class="p-2">
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                    <span class="fs-sm fw-medium">Inbox</span>
                    <span class="badge rounded-pill bg-primary ms-2">3</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                    <span class="fs-sm fw-medium">Perfil</span>
                    <span class="badge rounded-pill bg-primary ms-2">1</span>
                  </a>
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_signin.html">
                    <span class="fs-sm fw-medium">Salir</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- END User Dropdown -->
          </div>
          <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-body-extra-light">
          <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
              <div class="input-group">
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-fw fa-times-circle"></i>
                </button>
                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
              </div>
            </form>
          </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-body-extra-light">
          <div class="content-header">
            <div class="w-100 text-center">
              <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
          </div>
        </div>
        <!-- END Header Loader -->
      </header>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">

        <!-- Page Content -->
        <div class="content content-boxed">
          <div class="row">
            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo8@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    Top 10 Destinations
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">Albert Ray</span> on July 16, 2021 · <span class="text-muted">10 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->

            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo12@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    Follow Your Dreams
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">Brian Stevens</span> on July 13, 2021 · <span class="text-muted">15 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->

            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo23@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    Travel &amp; Work
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">David Fuller</span> on July 6, 2021 · <span class="text-muted">12 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->

            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo24@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    Sleep Better
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">Andrea Gardner</span> on July 21, 2021 · <span class="text-muted">9 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->

            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo4@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    Black &amp; White
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">Andrea Gardner</span> on July 16, 2021 · <span class="text-muted">5 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->

            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo6@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    Exploring the clouds
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">Brian Cruz</span> on July 1, 2021 · <span class="text-muted">3 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->

            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo7@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    Explore the World
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">Alice Moore</span> on May 19, 2021 · <span class="text-muted">9 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->

            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo8@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    Best choices of this year
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">Carol Ray</span> on May 10, 2021 · <span class="text-muted">14 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->

            <!-- Story -->
            <div class="col-lg-4">
              <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                <img class="img-fluid" src="assets/media/photos/photo9@2x.jpg" alt="">
                <div class="block-content">
                  <h4 class="mb-1">
                    The Secret Treasure
                  </h4>
                  <p class="fs-sm fw-medium mb-2">
                    <span class="text-primary">Brian Stevens</span> on May 2, 2021 · <span class="text-muted">20 min</span>
                  </p>
                  <p class="fs-sm text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida...
                  </p>
                </div>
              </a>
            </div>
            <!-- END Story -->
          </div>

          <!-- Pagination -->
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center push">
              <li class="page-item active">
                <a class="page-link" href="javascript:void(0)">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0)">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0)">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0)">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0)">5</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                  <span aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                  </span>
                  <span class="visually-hidden">Next</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- END Pagination -->
        </div>
        <!-- END Page Content -->

        <!-- Get Started -->
        <div class="bg-body-dark">
          <div class="content content-full">
            <div class="my-5 text-center">
              <h3 class="fw-bold mb-2">
                Do you like our stories?
              </h3>
              <h4 class="h5 fw-medium opacity-75">
                Sign up today and get access to over <strong>10,000</strong> inspiring stories!
              </h4>
              <a class="btn btn-primary px-4 py-2" href="javascript:void(0)">Get Started Today</a>
            </div>
          </div>
        </div>
        <!-- END Get Started -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <footer id="page-footer" class="bg-body-light">
        <div class="content py-3">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
              Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
              <a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank">OneUI 5.5</a> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>
        </div>
      </footer>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="assets/js/oneui.app.min.js"></script>
  </body>
</html>
