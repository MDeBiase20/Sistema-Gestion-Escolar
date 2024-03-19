<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Listado de estudiantes</h1>
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
                                        <th>Ci</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                        <th>Grado</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $contador_estudiantes = 0;
                                        foreach($estudiantes as $estudiante){
                                            $id_estudiantes = $estudiante['id_estudiante'];
                                            $contador_estudiantes++; ?>
                                        <tr>
                                            <td style = "text-align:center"><?php echo $contador_estudiantes;?></td>
                                            <td style = "text-align:center"><?php echo $estudiante['apellidos']. " ". $estudiante['nombres'];?></td>
                                            <td style = "text-align:center"><?php echo $estudiante['ci'];?></td>
                                            <td style = "text-align:center"><?php echo $estudiante['fecha_nacimiento'];?></td>
                                            <td style = "text-align:center"><?php echo $estudiante['email'];?></td>
                                            <td style = "text-align:center"><?php echo $estudiante['celular'];?></td>
                                            <td style = "text-align:center"><?php echo $estudiante['nivel'];?></td>
                                            <td style = "text-align:center"><?php echo $estudiante['turno'];?></td>
                                            <td style = "text-align:center"><?php echo $estudiante['curso']." | ".$estudiante['paralelo'];?></td>
                                            <td style = "text-align:center">
                                                <?php if($estudiante['estado'] == '1'){ ?>
                                                    <button class = "btn btn-success btn-sm" style = "border-radius: 20px;">ACTIVO</button>
                                                <?php
                                                }else{ ?>
                                                    <button class = "btn btn-danger btn-sm" style = "border-radius: 20px;">INACTIVO</button>
                                                <?php
                                                } ?>
                                            </td>
                                            <td style = "text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="create.php?id=<?php echo $id_estudiantes;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-cash-stack"></i></a> 
                                                    <a href="contrato.php?id=<?php echo $id_estudiantes;?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a> 
                                                </div>
                                            </td>
                                        </tr>    
                                    <?php        
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