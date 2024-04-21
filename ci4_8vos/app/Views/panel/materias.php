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
                <h3 class="card-title text-center">Lista de materias</h3><br>
                <a href="<?= route_to('materia_nueva') ?>" class="btn btn-primary btn-xs mt-1">Agregar Nueva</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="dataTable" class="table table-bordered table-hover">    
                    <thead>
                        <tr>
                            <th>#</th>
                        
                            <th>Asignatura</th>
                            <th>Acronimo</th>
                            <th>Creditos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
$html = '';
$index = 0;
if(sizeof($materias) > 0){
    foreach ($materias as $materia) {
        
        $html.= '
        <tr>
            <td>'.++$index.'</td>
            <td>'.$materia->asignatura.'</td>
            <td>'.$materia->acronimo.'</td>
            <td>'.$materia->creditos.'</td>
            <td>';
        // Aquí puedes agregar cualquier acción adicional para cada materia
        $html.='
            <a href="'.route_to("detalles_materia",$materia->idAsignatura).'" class="btn btn-warning btn-xs mt-1">Detalles</a>
            <a href="'.route_to("eliminar_materia",$materia->idAsignatura).'" class="btn btn-danger btn-xs mt-1">Eliminar</a>
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
                            <th>Asignatura</th>
                            <th>Acronimo</th>
                            <th>Creditos</th>
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
