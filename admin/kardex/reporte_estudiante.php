<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
//include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include('../../app/controllers/kardex/listado_de_kardex.php');

$id_estudiante = $_GET['id_estudiante'];

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Listado de reportes de Kardex</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Reportes registradas</h3>
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Materia</th>
                                        <th>Fecha de reporte</th>
                                        <th>Observación</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php 
                                    $contador_kardex = 0;
                                    foreach($kardexs as $kardex){

                                        //este if pregunta si el email con el que se inicio sesión es igual el email
                                        if($id_estudiante == $kardex['estudiante_id']){
                                            $id_kardex = $kardex['id_kardex'];
                                            $materia = $kardex['nombre_materia'];
                                            $fecha = $kardex['fecha'];
                                            $observacion = $kardex['observacion'];
                                            $nota = $kardex['nota'];
                                            $contador_kardex++;?>
                                            <tr>
                                                <td style = "text-align:center"><?php echo $contador_kardex;?></td>
                                                <td style = "text-align:center"><?php echo $materia;?></td>
                                                <td style = "text-align:center"><?php echo $fecha;?></td>
                                                <td style = "text-align:center"><?php echo $observacion;?></td>
                                                <td style = "text-align:center"><?php echo $nota;?></td>

                                            </tr>
                                        <?php    
                                        }
                                    }
                                ?>

                                </tbody>

                            </table>
                        </div><!-- /.card-body -->
                
                </div><!-- /.card -->
            
            </div>
        </div><!-- /.row -->
        
    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
</div>
<!-- /.content-wrapper -->

<?php
include('../../admin/layout/footer.php');
include('../../layout/mensaje.php');
?>
<script>
$("#example1").DataTable({
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Reportes",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Reportes",
                                        "infoFiltered": "(Filtrado de _MAX_ total Reportes)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Reportes",
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    "responsive": true, "lengthChange": true, "autoWidth": false,
                                    buttons: [{
                                        extend: 'collection',
                                        text: 'Reportes',
                                        orientation: 'landscape',
                                        buttons: [{
                                            text: 'Copiar',
                                            extend: 'copy',
                                        }, {
                                            extend: 'pdf'
                                        },{
                                            extend: 'csv'
                                        },{
                                            extend: 'excel'
                                        },{
                                            text: 'Imprimir',
                                            extend: 'print'
                                        }
                                        ]
                                    },
                                        {
                                            extend: 'colvis',
                                            text: 'Visor de columnas',
                                            collectionLayout: 'fixed three-column'
                                        }
                                    ],
                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            
</script>