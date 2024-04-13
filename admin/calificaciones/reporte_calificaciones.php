<?php

$id_estudiante_get = $_GET['id_estudiante'];


include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include('../../app/controllers/calificaciones/listado_de_calificaciones.php');

$curso = "";
$paralelo = "";
foreach($estudiantes as $estudiante){
    if($id_estudiante_get == $estudiante['id_estudiante']){
       $curso = $estudiante['curso']; 
       $paralelo = $estudiante['paralelo']; 
       $nombres = $estudiante['nombres']; 
       $apellidos = $estudiante['apellidos']; 
}
}     
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h2>Calificaciones del estudiante: <?php echo $nombres." ".$apellidos;?></h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Calificaciones registrados</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Materia</th>
                                        <th>1er Trimestre</th>
                                        <th>2do Trimestre</th>
                                        <th>3er Trimestre</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $contador_calificacion = 0;
                                        $nota1 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                                        $nota2 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                                        $nota3 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                                        foreach($calificaciones as $calificacione){
                                            if($id_estudiante_get == $calificacione['estudiante_id']){
                                                
                                                            $contador_calificacion++; ?>
                                                        <tr>
                                                            <td style = "text-align:center"><?php echo $contador_calificacion;?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nombre_materia'];?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nota_1'];?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nota_2'];?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nota_3'];?></td>

                                                        </tr>   
                                    <?php         }
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Calificaciones",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Calificaciones",
                                        "infoFiltered": "(Filtrado de _MAX_ total Calificaciones)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Calificaciones",
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