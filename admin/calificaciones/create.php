<?php

$id_grado_get = $_GET['id_grado'];
$id_docente_get = $_GET['id_docente'];
$id_materia_get = $_GET['id_materia'];
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include('../../app/controllers/calificaciones/listado_de_calificaciones.php');

$curso = "";
$paralelo = "";
foreach($estudiantes as $estudiante){
    if($id_grado_get == $estudiante['grado_id']){
       $curso = $estudiante['curso']; 
       $paralelo = $estudiante['paralelo']; 
}
}     
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h2>Listado de estudiantes del grado: <?php echo $curso;?> paralelo: <?php echo $paralelo;?></h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Estudiantes registrados</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Apellidos y nombres</th>
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                        <th>Grado</th>
                                        <th>Paralelo</th>
                                        <th>1er Trimestre</th>
                                        <th>2do Trimestre</th>
                                        <th>3er Trimestre</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $contador_estudiantes = 0;
                                        
                                        foreach($estudiantes as $estudiante){
                                            if($id_grado_get == $estudiante['grado_id']){
                                                $id_estudiantes = $estudiante['id_estudiante'];
                                                            $contador_estudiantes++; ?>
                                                        <tr>
                                                            <td style = "text-align:center"><?php echo $contador_estudiantes;?>
                                                                <input type="text" id="estudiante_<?php echo $contador_estudiantes;?>" value ="<?php echo $id_estudiantes;?>" hidden>
                                                            </td>
                                                            <td style = "text-align:center"><?php echo $estudiante['apellidos']. " ". $estudiante['nombres'];?></td>
                                                            <td style = "text-align:center"><?php echo $estudiante['nivel'];?></td>
                                                            <td style = "text-align:center"><?php echo $estudiante['turno'];?></td>
                                                            <td style = "text-align:center"><?php echo $estudiante['curso'];?></td>
                                                            <td style = "text-align:center"><?php echo $estudiante['paralelo'];?></td>

                                                            <?php
                                                            
                                                            $nota1 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                                                            $nota2 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                                                            $nota3 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD

                                                                foreach($calificaciones as $calificacion){
                                                                    if( ($calificacion['docente_id']==$id_docente_get) && 
                                                                        ($calificacion['estudiante_id']==$id_estudiantes) &&
                                                                        ($calificacion['materia_id']==$id_materia_get) ){

                                                                            $nota1 = $calificacion['nota_1'];
                                                                            $nota2 = $calificacion['nota_2'];
                                                                            $nota3 = $calificacion['nota_3'];
                                                                    }
                                                                }
                                                            ?>

                                                            <td>
                                                                <input style="text-align:center" value = "<?php echo $nota1;?>" id="nota1_<?php echo $contador_estudiantes;?>" type="number" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input style="text-align:center" value = "<?php echo $nota2;?>" id="nota2_<?php echo $contador_estudiantes;?>" type="number" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input style="text-align:center" value = "<?php echo $nota3;?>" id="nota3_<?php echo $contador_estudiantes;?>" type="number" class="form-control">
                                                            </td>
                                                            
                                                        </tr>   
                                    <?php         }
                                        }     
                                    $contador_estudiantes = $contador_estudiantes;
                                    ?>
                                    
                                </tbody>
                                        
                            </table>
                            <button class="btn btn-primary btn-lg" id="btn_guardar">Guardar notas</button>
                            <!--JQuery para leer los datos-->
                            <script>
                                $('#btn_guardar').click(function(){
                                    var n = '<?php echo $contador_estudiantes;?>'
                                    var i = 1
                                    var id_docente = '<?php echo $id_docente_get;?>'
                                    var id_materia = '<?php echo $id_materia_get;?>'
                                    
                                    for(i=1; i<=n ;i++){
                                        var a = '#nota1_' + i
                                        var nota1 = $(a).val()

                                        var b = '#nota2_' + i
                                        var nota2 = $(b).val()

                                        var c = '#nota3_' + i
                                        var nota3 = $(c).val()

                                        var d = '#estudiante_' + i
                                        var id_estudiante = $(d).val()
                                       // alert("id_docente: "+id_docente+"-id_estudiante: "+id_estudiante+"-id_materia: "+id_materia)

                                        //Ajax
                                        var url = '../../app/controllers/calificaciones/create.php'
                                        $.get(url,{id_docente:id_docente, id_estudiante:id_estudiante, id_materia:id_materia, nota1:nota1, nota2:nota2, nota3:nota3},function(datos){
                                            
                                            $('#respuesta').html(datos)
                                            //alert('Los datos se mandaron al controlador')
                                        } )
                                    }

                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: "Se cargaron las notas de manera correcta",
                                        showConfirmButton: false,
                                        timer: 4000
                                    });
                                })
                            </script>
                            <div id="respuesta" hidden></div>
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                                        "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Estudiantes",
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