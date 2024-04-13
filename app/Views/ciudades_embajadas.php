<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Embajadas de Ciudad</title>

    <meta name="description" content="YoliWayra">
    <meta name="author" content="anysw">
    <meta name="robots" content="noindex, nofollow">

    <meta property="og:title" content="YoliWayra">
    <meta property="og:site_name" content="YoliWayra">
    <meta property="og:description" content="YoliWayra">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url(); ?>assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/media/favicons/apple-touch-icon-180x180.png">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" id="css-main" href="<?= base_url(); ?>assets/css/oneui.min.css">

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
                      <a class="link-fx" href="<?= base_url('ciudades'); ?>">Ciudades</a>
                    </li>
                    <li class="breadcrumb-item" style="font-size:1.1rem" aria-current="page">
                      Embajadas
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
                          <th>Ciudad</th>
                          <th>Embajada</th>
                          <th>Descripción</th>
                          <th>Notas</th>
                          <th class="text-center" style="width: 100px;"></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                            foreach ($array as $item) {
                              echo '<tr>';
                                echo '<td>' . $item["nombre_ciudad"] . '</td>';
                                echo '<td>' . $item["nombre_embajada"] . '</td>';
                                echo '<td>' . $item["descripcion"] . '</td>';
                                echo '<td>' . $item["notas"] . '</td>';
                                echo '<td class="text-center">';
                                  echo '<div class="btn-group">';
                                    echo '<button type="button" class="btn btn-sm btn-alt-secondary"' . 
                                          ' data-bs-toggle="modal" data-bs-target="#modal-update" title="Editar"' . 
                                          ' onclick="UpdateClick(' . 
                                              $item["id"] . ', ' . 
                                              $item["id_ciudad"] . ', ' . 
                                              $item["id_embajada"] . ', \'' . 
                                              $item["descripcion"] . '\', \'' . 
                                              $item["notas"] . '\')">';
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
              <form action="<?= base_url("/ciudades_embajadas/insert"); ?>" method="POST">
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
                        <label class="form-label" for="ciudad-ins">Ciudad</label>
                        <input type="hidden" id="ciudad-ins" name="ciudad-ins" value="<?= $ciudad["id"] ?>" />
                        <textarea class="form-control" id="ciudad-nombre" name="ciudad-nombre" 
                          rows="3" readonly><?= $ciudad["nombre"] ?></textarea>
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="embajada-ins">Embajada</label>
                        <select class="form-select" id="embajada-ins" name="embajada-ins" size="5">

                          <?php
                            foreach ($embajadas as $embajada) {
                              echo '<option value="' . $embajada["id"] . '">' . $embajada["nombre"] . '</option>';
                            }
                          ?>

                        </select>
                      </div>                      
                      <div class="mb-4">
                        <label class="form-label" for="descripcion-ins">Descripción</label>
                        <textarea class="form-control" id="descripcion-ins" name="descripcion-ins" rows="3"></textarea>
                      </div>                      
                      <div class="mb-4">
                        <label class="form-label" for="notas-ins">Notas</label>
                        <textarea class="form-control" id="notas-ins" name="notas-ins" rows="3"></textarea>
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
              <form action="<?= base_url("/ciudades_embajadas/update"); ?>" method="POST">
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
                        <label class="form-label" for="ciudad-upd">Ciudad</label>
                        <textarea class="form-control" id="ciudad-upd" name="ciudad-upd" rows="3" 
                          data-id="<?= $ciudad["id"] ?>" readonly><?= $ciudad["nombre"] ?></textarea>
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="embajada-upd">Embajada</label>
                        <select class="form-select" id="embajada-upd" name="embajada-upd" size="5">

                          <?php
                            foreach ($embajadas as $embajada) {
                              echo '<option value="' . $embajada["id"] . '">' . $embajada["nombre"] . '</option>';
                            }
                          ?>

                        </select>
                      </div> 
                      <div class="mb-4">
                        <label class="form-label" for="descripcion-upd">Descripción</label>
                        <textarea class="form-control" id="descripcion-upd" name="descripcion-upd" rows="3"></textarea>
                      </div>                      
                      <div class="mb-4">
                        <label class="form-label" for="notas-upd">Notas</label>
                        <textarea class="form-control" id="notas-upd" name="notas-upd" rows="3"></textarea>
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
    <script src="<?= base_url(); ?>assets/js/oneui.app.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js">

    </script><script src="<?= base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/be_tables_datatables.min.js"></script>

    <script>
      $(document).ready(function() {

        setTimeout(function() {
          $('#div-insert-fail').hide();
        }, 4000);

        setTimeout(function() {
          $('#div-update-fail').hide();
        }, 4000);
        
        setTimeout(function() {
          $('#div-upsert-success').hide();
        }, 2000);

        setTimeout(function() {
          $('#div-validation-errors').hide();
        }, 4000);
      });

      function UpdateClick(id, ciudad, embajada, descripcion, notas) {
        $("#hid-id-upd").val(id);
        $("#ciudad-upd").val(ciudad);
        $("#embajada-upd").val(embajada);
        $("#descripcion-upd").val(descripcion);
        $("#notas-upd").val(notas);
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
          url: '<?= base_url('/ciudades_embajadas/delete'); ?>',
          type: 'POST',
          data: { id: id },
          dataType: 'json'
        });
        window.setTimeout(function(){location.reload()},500);
      }

    </script>
  </body>
</html>
