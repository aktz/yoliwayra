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
                    <a class="nav-main-link" href="#">
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

        <main id="main-container pt-1">
        <!-- Hero -->
            <div class="bg-body-light">
            <div class="content content-full" style="padding-top: .8rem; padding-bottom: .9rem">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                    <div class="flex-grow-1">
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="#">Inicio</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Configuraciones
                        </li>
                        </ol>
                    </nav>
                </div>
            </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">

            <!-- Icon based -->
            <div class="row push">
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-primary" href="<?= base_url('accesos'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Accesos</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-primary" href="<?= base_url('alimentaciones'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Alimentaciones</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-primary" href="<?= base_url('alojamientos'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Alojamientos</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-primary" href="<?= base_url('autoridades'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Autoridades</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-smooth" href="<?= base_url('bancos'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Bancos</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-secondary" href="<?= base_url('categorias'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Categorías</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-secondary" href="<?= base_url('ciudades'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Ciudades</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-secondary" href="<?= base_url('climas'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Climas</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-city" href="<?= base_url('divisas'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Divisas</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-primary" href="<?= base_url('embajadas'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Embajadas</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-primary" href="<?= base_url('estados'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Estados</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-smooth" href="<?= base_url('idiomas'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Idiomas</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-smooth" href="<?= base_url('indumentarias'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Indumentarias</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-secondary" href="<?= base_url('lugares'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Lugares</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-city" href="<?= base_url('paises'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Países</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-city" href="<?= base_url('perfiles'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Perfiles</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-primary" href="<?= base_url('regiones'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Regiones</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-primary" href="<?= base_url('requerimientos'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Requerimientos</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-smooth" href="<?= base_url('terminales'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Terminales</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-smooth" href="<?= base_url('transportes'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                    <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Transportes</div>
                    </div>
                </a>
                </div>
                <div class="col-6 col-md-3 col-xxl-2">
                <a class="block block-rounded text-center bg-secondary" href="<?= base_url('usuarios'); ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="fs-sm fw-semibold my-3 text-uppercase text-white">Usuarios</div>
                    </div>
                </a>
                </div>
            </div>          
            <!-- END Icon based -->
            </div>
            <!-- END Page Content -->
        </main>