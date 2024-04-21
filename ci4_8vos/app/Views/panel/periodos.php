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
                <h3 class="card-title text-center">Lista de periodos</h3><br>
                <a href="<?= route_to('periodo_nuevo') ?>" class="btn btn-primary btn-xs mt-1">Agregar periodo </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="dataTable" class="table table-bordered table-hover">    
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Acronimo</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de finalización</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
$html = '';
$index = 0;
if(sizeof($periodos) > 0){
    foreach ($periodos as $periodo) {
        
        $html.= '
        <tr>
            <td>'.++$index.'</td>
            <td>'.$periodo->nombreperiodo.'</td>
            <td>'.$periodo->acronimo.'</td>
            <td>'.$periodo->fecha_inicio.'</td>
            <td>'.$periodo->fecha_fin.'</td>
            <td>'.$periodo->estatus.'</td>
            <td>';
        // Aquí puedes agregar cualquier acción adicional para cada materia
        $html.='
            <a href="'.route_to("detalles_periodo",$periodo->idperiodo).'" class="btn btn-warning btn-xs mt-1">Detalles</a>
            <a href="'.route_to("eliminar_periodo",$periodo->idperiodo).'" class="btn btn-danger btn-xs mt-1">Eliminar</a>
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
                            <th>Nombre</th>
                            <th>Acronimo</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de finalización</th>
                            <th>Estatus</th>
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
  