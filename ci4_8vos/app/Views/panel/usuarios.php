<?= $this->extend('plantillas/panel_base') ?>

<!-- Sección de css -->
<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url(RECURSOS_PANEL_PLUGINS.'datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet"
    href="<?= base_url(RECURSOS_PANEL_PLUGINS.'datatables-responsive/css/responsive.bootstrap4.min.css')?>">
<?= $this->endSection() ?>
<!-- End sección de css -->

<!-- Sección de contenido -->
<?= $this->section('contenido') ?>


<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Lista de usuarios</h3><br>
                <a href="<?= route_to('usuario_nuevo') ?>" class="btn btn-primary btn-xs mt-1">Agregar Nuevo</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                

                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $html = '';
                            $index = 0;
                            if(sizeof($usuarios) > 0){
                                foreach ($usuarios as $usuario) {
                                    $html.= '
                                    <tr>
                                        <td>'.++$index.'</td>
                                        <td>'.$usuario->nombre_usuario.' '.$usuario->ap_usuario.' '.$usuario->am_usuario.'</td>
                                        <td>'.ROLES[$usuario->id_rol].'</td>
                                        <td>';
                                            if ($usuario->estatus_usuario == ESTATUS_HABILITADO) {
                                                $html.='<a href="'.route_to("estatus_usuario",$usuario->id_usuario,ESTATUS_DESHABILITADO).'" class="btn btn-dark btn-xs mt-1">Deshabiitar</a>';
                                            }//end if
                                            else {
                                                $html.='<a href="'.route_to("estatus_usuario",$usuario->id_usuario,ESTATUS_HABILITADO).'" class="btn btn-info btn-xs mt-1">Habilitar</a>';
                                            }//end else

                                        $html.='
                                            <a href="'.route_to("detalles_usuario",$usuario->id_usuario).'" class="btn btn-warning btn-xs mt-1">Detalles</a>
                                            <a href="'.route_to("eliminar_usuario",$usuario->id_usuario).'" class="btn btn-danger btn-xs mt-1">Eliminar</a>
                                        </td>
                                    </tr>
                                    ';
                                }
                            }//end 
                            echo $html;
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>
<?= $this->endSection() ?>
<!-- End sección de contenido -->

<!-- Sección de js -->
<?= $this->section('js') ?>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url(RECURSOS_PANEL_PLUGINS.'datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url(RECURSOS_PANEL_PLUGINS.'datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?= base_url(RECURSOS_PANEL_PLUGINS.'datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= base_url(RECURSOS_PANEL_PLUGINS.'datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable({
                'processing': true,
                "responsive": true,
                "scrollX": false,
                "language": {
                    "lengthMenu": "Mostrar MENU datos",
                    "info": "Página PAGE de PAGES",
                    "infoEmpty": "Datos no disponibles por el momento",
                    "processing":     "Procesando ...",
                    "search":         "Buscar:",
                    "zeroRecords":    "Datos no disponibles por el momento",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Última",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                }//End languagee 
            });
        });
    </script>
<?= $this->endSection() ?>
<!-- End sección de js -->