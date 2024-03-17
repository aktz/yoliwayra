<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Lugares</title>

    <meta name="description" content="YoliWayra">
    <meta name="author" content="anysw">
    <meta name="robots" content="noindex, nofollow">

    <meta property="og:title" content="YoliWayra">
    <meta property="og:site_name" content="YoliWayra">
    <meta property="og:description" content="YoliWayra">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">

    <link rel="stylesheet" href="assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
  </head>

  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
      <!-- Side Overlay-->
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

      <!-- Main Container -->
      <main id="main-container pt-1">
        <!-- Hero -->
        <div class="bg-body-light">
          <div class="content content-full" style="padding-top: .3rem; padding-bottom: .3rem">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
              <div class="flex-grow-1">
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item" style="font-size:1.1rem">
                      <a class="link-fx" href="<?= base_url('config'); ?>">Configuraciones</a>
                    </li>
                    <li class="breadcrumb-item" style="font-size:1.1rem" aria-current="page">
                      Lugares
                    </li>
                  </ol>
                </nav>
              </div>
              <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-insert">Nuevo</button>
              </div>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">

          <?php         
            if (isset($insert_fail)) {
              echo '<div class="alert alert-warning alert-dismissible" id="div-insert-fail" role="alert">';
                echo '<p class="mb-0">No se realizó la inserción. Verifique los campos.</p>';                
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
              echo '</div>';
            }

            if (isset($update_fail)) {
              echo '<div class="alert alert-warning alert-dismissible" id="div-update-fail" role="alert">';
                echo '<p class="mb-0">No se realizó la actualización. Verifique los campos.</p>';                
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
              echo '</div>';
            }
            
            if (isset($delete_fail)) {
              echo '<div class="alert alert-warning alert-dismissible" id="div-update-fail" role="alert">';
                echo '<p class="mb-0">No se realizó la eliminación.</p>';                
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
              echo '</div>';
            }
            
            if (isset($upsert_success)) {
              echo '<div class="alert alert-success alert-dismissible" id="div-upsert-success" role="alert">';
                echo '<p class="mb-0">Operación confirmada.</p>';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
              echo '</div>';
            }
            
            if (isset($validation_error)) {
              echo '<div class="alert alert-warning alert-dismissible" id="div-validation-errors" role="alert">';
                foreach ($validation_error as $error) {
                  echo '<p class="mb-0">' . $error . '</p>';
                }
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
              echo '</div>';
            }
            

          ?> 
          
          <div class="row">
            <div class="col-12">
              <!-- Hover Table -->
              <div class="block block-rounded">
                <div class="block-content pb-3">
                  <div class="block-content block-content-full p-0">                  
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Ciudad</th>
                          <th>Región</th>
                          <th>Clima</th>
                          <th>C. Postal</th>
                          <th>Título</th>
                          <th>Subtítulo</th>
                          <th>Descripción</th>
                          <th>Notas</th>
                          <th>Valor</th>
                          <th class="text-center" style="width: 12%;">Ancestral</th>
                          <th class="text-center" style="width: 12%;">Extremo</th>
                          <th class="text-center" style="width: 12%;">Avistamiento</th>
                          <th class="text-center" style="width: 12%;">Deportivo</th>
                          <th class="text-center" style="width: 12%;">Activo</th>
                          <th class="text-center" style="width: 100px;"></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                            foreach ($array as $item) {
                              $ancestral = $item["ancestral"] == 1 ? "SI" : "NO";
                              $extremo = $item["extremo"] == 1 ? "SI" : "NO";
                              $avistamiento = $item["avistamiento"] == 1 ? "SI" : "NO";
                              $deportivo = $item["deportivo"] == 1 ? "SI" : "NO";
                              $active = $item["activo"] == 1 ? "SI" : "NO";
                              echo '<tr>';
                                echo '<td>' . $item["nombre"] . '</td>';
                                echo '<td>' . $item["ciudad"] . '</td>';
                                echo '<td>' . $item["region"] . '</td>';
                                echo '<td>' . $item["clima"] . '</td>';
                                echo '<td>' . $item["postal"] . '</td>';
                                echo '<td>' . $item["titulo"] . '</td>';
                                echo '<td>' . $item["subtitulo"] . '</td>';
                                echo '<td>' . $item["descripcion"] . '</td>';
                                echo '<td>' . $item["notas"] . '</td>';
                                echo '<td>' . $item["valor"] . '</td>';
                                echo '<td class="text-center">' . $ancestral . '</td>';
                                echo '<td class="text-center">' . $extremo . '</td>';
                                echo '<td class="text-center">' . $avistamiento . '</td>';
                                echo '<td class="text-center">' . $deportivo . '</td>';
                                echo '<td class="text-center">' . $active . '</td>';
                                echo '<td class="text-center">';
                                  echo '<div class="btn-group">';
                                    echo '<button type="button" class="btn btn-sm btn-alt-secondary"' . 
                                          ' data-bs-toggle="modal" data-bs-target="#modal-update" title="Editar"' . 
                                          ' onclick="UpdateClick(' . 
                                              $item["id"] . ', \'' . 
                                              $item["nombre"] . '\', ' . 
                                              $item["ciudad"] . ', ' . 
                                              $item["region"] . ', ' . 
                                              $item["clima"] . ', \'' . 
                                              $item["postal"] . '\', \'' . 
                                              $item["titulo"] . '\', \'' . 
                                              $item["subtitulo"] . '\', \'' . 
                                              $item["descripcion"] . '\', \'' . 
                                              $item["notas"] . '\', ' . 
                                              $item["valor"] . ', ' . 
                                              $item["ancestral"] . ', ' . 
                                              $item["extremo"] . ', ' . 
                                              $item["avistamiento"] . ', ' . 
                                              $item["deportivo"] . ', ' . 
                                              $item['activo'] . ')">';
                                      echo '<i class="fa fa-fw fa-pencil-alt"></i>';
                                    echo '</button>';
                                    echo '<button type="button" id="delete" onclick="DeleteClick(' . $item["id"] . ')" class="btn btn-sm btn-alt-secondary" title="Eliminar">';
                                      echo '<i class="fa fa-fw fa-times"></i>';
                                    echo '</button>';
                                  echo '</div>';
                                echo '</td>';
                              echo '</tr>';
                            }
                        ?> 

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- END Hover Table -->
            </div>
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- modal-insert -->
      <div class="modal" id="modal-insert" tabindex="-1" role="dialog" aria-labelledby="modal-insert" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
              <form action="lugares/insert" method="POST">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Nuevo</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                      <i class="fa fa-fw fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="block-content fs-sm">
                  <div class="block-content block-content-full">
                    <div class="row">
                      <div class="mb-4">
                        <label class="form-label" for="nombre-ins">Nombre</label>
                        <textarea class="form-control" id="nombre-ins" name="nombre-ins" rows="3"></textarea>
                      </div>

                      <div class="mb-4">
                        <label class="form-label" for="ciudad-ins">Ciudad</label>
                        <select class="form-select" id="ciudad-ins" name="ciudad-ins" size="5">
                          <?php
                            foreach ($ciudades as $ciudad) {
                              echo '<option value="' . $ciudad["id_ciudad"] . '">' . $ciudad["nombre_ciudad"] . '</option>';
                            }
                          ?>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="form-label" for="region-ins">Región</label>
                        <select class="form-select" id="region-ins" name="region-ins" size="5">
                          <?php
                            foreach ($ciudades as $ciudad) {
                              echo '<option value="' . $ciudad["id_region"] . '">' . $ciudad["nombre_region"] . '</option>';
                            }
                          ?>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="form-label" for="clima-ins">Clima</label>
                        <select class="form-select" id="clima-ins" name="clima-ins" size="5">
                          <?php
                            foreach ($ciudades as $ciudad) {
                              echo '<option value="' . $ciudad["id_clima"] . '">' . $ciudad["nombre_clima"] . '</option>';
                            }
                          ?>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="form-label" for="postal-ins">Código Postal</label>
                        <input type="text" class="form-control" id="postal-ins" name="postal-ins" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="postal-ins">Título</label>
                        <input type="text" class="form-control" id="postal-ins" name="postal-ins" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="postal-ins">Subtítulo</label>
                        <input type="text" class="form-control" id="postal-ins" name="postal-ins" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="postal-ins">Descripción</label>
                        <input type="text" class="form-control" id="postal-ins" name="postal-ins" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="postal-ins">Notas</label>
                        <input type="text" class="form-control" id="postal-ins" name="postal-ins" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="valor-ins">Valor</label>
                        <input type="text" class="form-control" id="valor-ins" name="valor-ins" />
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="ancestral-ins" name="ancestral-ins" checked />
                        <label class="form-check-label" for="ancestral-ins">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-ancestral-ins" name="hid-ancestral-ins" value="1" />
                              <span id="ancestralTitulo">Ancestral</span>
                            </span>
                          </span>
                        </label>
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="extremo-ins" name="extremo-ins" checked />
                        <label class="form-check-label" for="extremo-ins">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-extremo-ins" name="hid-extremo-ins" value="1" />
                              <span id="extremoTitulo">Extremo</span>
                            </span>
                          </span>
                        </label>
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="avistamiento-ins" name="avistamiento-ins" checked />
                        <label class="form-check-label" for="avistamiento-ins">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-avistamiento-ins" name="hid-avistamiento-ins" value="1" />
                              <span id="avistamientoTitulo">Avistamiento</span>
                            </span>
                          </span>
                        </label>
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="deportivo-ins" name="deportivo-ins" checked />
                        <label class="form-check-label" for="deportivo-ins">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-deportivo-ins" name="hid-deportivo-ins" value="1" />
                              <span id="deportivoTitulo">Activo</span>
                            </span>
                          </span>
                        </label>
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="activo-ins" name="activo-ins" checked />
                        <label class="form-check-label" for="activo-ins">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-activo-ins" name="hid-activo-ins" value="1" />
                              <span id="activoTitulo">Activo</span>
                            </span>
                          </span>
                        </label>
                      </div>

                    </div>
                  </div>                      
                </div>
                <div class="block-content block-content-full text-end bg-body">
                  <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- modal-update -->
      <div class="modal" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="modal-update" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
              <form action="lugares/update" method="POST">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Modificación</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                      <i class="fa fa-fw fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="block-content fs-sm">
                  <div class="block-content block-content-full">
                    <div class="row">
                      <input type="hidden" id="hid-id-upd" name="hid-id-upd" />
                      <div class="mb-4">
                        <label class="form-label" for="nombre-upd">Nombre</label>
                        <textarea class="form-control" id="nombre-upd" name="nombre-upd" rows="3"></textarea>
                      </div>

                      <div class="mb-4">
                        <label class="form-label" for="ciudad-upd">Ciudad</label>
                        <select class="form-select" id="ciudad-upd" name="ciudad-upd" size="5">
                          <?php
                            foreach ($ciudades as $ciudad) {
                              echo '<option value="' . $ciudad["id_ciudad"] . '">' . $ciudad["nombre_ciudad"] . '</option>';
                            }
                          ?>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="form-label" for="region-upd">Región</label>
                        <select class="form-select" id="region-upd" name="region-upd" size="5">
                          <?php
                            foreach ($ciudades as $ciudad) {
                              echo '<option value="' . $ciudad["id_region"] . '">' . $ciudad["nombre_region"] . '</option>';
                            }
                          ?>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="form-label" for="clima-upd">Clima</label>
                        <select class="form-select" id="clima-upd" name="clima-upd" size="5">
                          <?php
                            foreach ($ciudades as $ciudad) {
                              echo '<option value="' . $ciudad["id_clima"] . '">' . $ciudad["nombre_clima"] . '</option>';
                            }
                          ?>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="form-label" for="postal-upd">Código Postal</label>
                        <input type="text" class="form-control" id="postal-upd" name="postal-upd" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="postal-upd">Título</label>
                        <input type="text" class="form-control" id="postal-upd" name="postal-upd" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="postal-upd">Subtítulo</label>
                        <input type="text" class="form-control" id="postal-upd" name="postal-upd" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="postal-upd">Descripción</label>
                        <input type="text" class="form-control" id="postal-upd" name="postal-upd" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="postal-upd">Notas</label>
                        <input type="text" class="form-control" id="postal-upd" name="postal-upd" />
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="valor-upd">Valor</label>
                        <input type="text" class="form-control" id="valor-upd" name="valor-upd" />
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="ancestral-upd" name="ancestral-upd" checked />
                        <label class="form-check-label" for="ancestral-upd">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-ancestral-upd" name="hid-ancestral-upd" value="1" />
                              <span id="ancestralTitulo">Ancestral</span>
                            </span>
                          </span>
                        </label>
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="extremo-upd" name="extremo-upd" checked />
                        <label class="form-check-label" for="extremo-upd">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-extremo-upd" name="hid-extremo-upd" value="1" />
                              <span id="extremoTitulo">Extremo</span>
                            </span>
                          </span>
                        </label>
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="avistamiento-upd" name="avistamiento-upd" checked />
                        <label class="form-check-label" for="avistamiento-upd">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-avistamiento-upd" name="hid-avistamiento-upd" value="1" />
                              <span id="avistamientoTitulo">Avistamiento</span>
                            </span>
                          </span>
                        </label>
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="deportivo-upd" name="deportivo-upd" checked />
                        <label class="form-check-label" for="deportivo-upd">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-deportivo-upd" name="hid-deportivo-upd" value="1" />
                              <span id="deportivoTitulo">Activo</span>
                            </span>
                          </span>
                        </label>
                      </div>

                      <div class="form-check form-block mb-4" style="padding: 0px 13px">
                        <input class="form-check-input" type="checkbox" value="" id="activo-upd" name="activo-upd" checked />
                        <label class="form-check-label" for="activo-upd">
                          <span class="d-flex align-items-center">
                            <span class="ms-2">
                              <input type="hidden" id="hid-activo-upd" name="hid-activo-upd" value="1" />
                              <span id="activoTitulo">Activo</span>
                            </span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>                      
                </div>
                <div class="block-content block-content-full text-end bg-body">
                  <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- END Page Container -->
    <script src="assets/js/oneui.app.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js">

    </script><script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="assets/js/pages/be_tables_datatables.min.js"></script>

    <script>
      $(document).ready(function() {

        setTimeout(function() {
          $('#div-insert-fail').hide();
        }, 5000);

        setTimeout(function() {
          $('#div-update-fail').hide();
        }, 5000);
        
        setTimeout(function() {
          $('#div-upsert-success').hide();
        }, 2000);
        
        setTimeout(function() {
          $('#div-validation-errors').hide();
        }, 5000);

        $('#ancestral-ins').on('click', function() {
          if( $(this).is(':checked') ){
            $("#ancestralTitulo").text("Activo");
            $("#hid-ancestral-ins").val("1");
          } else {
            $("#ancestralTitulo").text("Inactivo");
            $("#hid-ancestral-ins").val("0");
          }
        });
        
        $('#ancestral-upd').on('click', function() {
          if( $(this).is(':checked') ){
            $("#ancestralTitulo").text("Activo");
            $("#hid-ancestral-upd").val("1");
          } else {
            $("#ancestralTitulo").text("Inactivo");
            $("#hid-ancestral-upd").val("0");
          }
        });

        $('#extremo-ins').on('click', function() {
          if( $(this).is(':checked') ){
            $("#extremoTitulo").text("Activo");
            $("#hid-extremo-ins").val("1");
          } else {
            $("#extremoTitulo").text("Inactivo");
            $("#hid-extremo-ins").val("0");
          }
        });
        
        $('#extremo-upd').on('click', function() {
          if( $(this).is(':checked') ){
            $("#extremoTitulo").text("Activo");
            $("#hid-extremo-upd").val("1");
          } else {
            $("#extremoTitulo").text("Inactivo");
            $("#hid-extremo-upd").val("0");
          }
        });

        $('#avistamiento-ins').on('click', function() {
          if( $(this).is(':checked') ){
            $("#avistamientoTitulo").text("Activo");
            $("#hid-avistamiento-ins").val("1");
          } else {
            $("#avistamientoTitulo").text("Inactivo");
            $("#hid-avistamiento-ins").val("0");
          }
        });
        
        $('#avistamiento-upd').on('click', function() {
          if( $(this).is(':checked') ){
            $("#avistamientoTitulo").text("Activo");
            $("#hid-avistamiento-upd").val("1");
          } else {
            $("#avistamientoTitulo").text("Inactivo");
            $("#hid-avistamiento-upd").val("0");
          }
        });

        $('#deportivo-ins').on('click', function() {
          if( $(this).is(':checked') ){
            $("#deportivoTitulo").text("Activo");
            $("#hid-deportivo-ins").val("1");
          } else {
            $("#deportivoTitulo").text("Inactivo");
            $("#hid-deportivo-ins").val("0");
          }
        });
        
        $('#deportivo-upd').on('click', function() {
          if( $(this).is(':checked') ){
            $("#deportivoTitulo").text("Activo");
            $("#hid-deportivo-upd").val("1");
          } else {
            $("#deportivoTitulo").text("Inactivo");
            $("#hid-deportivo-upd").val("0");
          }
        });

        $('#activo-ins').on('click', function() {
          if( $(this).is(':checked') ){
            $("#activoTitulo").text("Activo");
            $("#hid-activo-ins").val("1");
            console.log("hid-activo: "  + $("#hid-activo-ins").val());
          } else {
            $("#activoTitulo").text("Inactivo");
            $("#hid-activo-ins").val("0");
            console.log("hid-activo: "  + $("#hid-activo-ins").val());
          }
        });
        
        $('#activo-upd').on('click', function() {
          if( $(this).is(':checked') ){
            $("#activoTitulo").text("Activo");
            $("#hid-activo-upd").val("1");
            console.log("hid-activo: "  + $("#hid-activo-upd").val());
          } else {
            $("#activoTitulo").text("Inactivo");
            $("#hid-activo-upd").val("0");
            console.log("hid-activo: "  + $("#hid-activo-upd").val());
          }
        });
      });

      function UpdateClick(id, nombre, activo) {
        $("#hid-id-upd").val(id);
        $("#nombre-upd").val(nombre);
        $("#ciudad-upd").val(ciudad);
        $("#region-upd").val(region);
        $("#clima-upd").val(clima);
        $("#postal-upd").val(postal);
        $("#titulo-upd").val(titulo);
        $("#subtitulo-upd").val(subtitulo);
        $("#descripcion-upd").val(descripcion);
        $("#notas-upd").val(notas);
        $("#valor-upd").val(valor);
        $("#ancestral-upd").prop("checked", ancestral == 1 ? true : false);
        $("#extremo-upd").prop("checked", extremo == 1 ? true : false);
        $("#avistamiento-upd").prop("checked", avistamiento == 1 ? true : false);
        $("#deportivo-upd").prop("checked", deportivo == 1 ? true : false);
        $("#activo-upd").prop("checked", activo == 1 ? true : false);
        $("#hid-activo-upd").val(activo);
      }

      function DeleteClick(id) {
        Swal.fire({
          title: '¿Eliminar el item?',
          text: "",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Eliminar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            DeleteItem(id);
          }
        })
      }

      function DeleteItem(id) {
        $.ajax({
          url: '<?= base_url('/lugares/delete'); ?>',
          type: 'POST',
          data: { id: id },
          dataType: 'json'
        });
        window.setTimeout(function(){location.reload()},500);
      }

    </script>
  </body>
</html>
