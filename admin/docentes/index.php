<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/docentes/listado_de_docentes.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Listado de docentes</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Docentes registrados</h3>

                        <div class="card-tools">
                            <a href="create.php" class = "btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo docente</a>
                        </div><!-- /.card-tools -->
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Nombre del docente</th>
                                        <th>Rol</th>
                                        <th>Ci</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $contador_docente = 0;
                                        foreach($docentes as $docente){
                                            $id_docente = $docente['id_docente'];
                                            $contador_docente++; ?>
                                        <tr>
                                            <td style = "text-align:center"><?php echo $contador_docente;?></td>
                                            <td style = "text-align:center"><?php echo $docente['nombres']. " ". $docente['apellidos'];?></td>
                                            <td style = "text-align:center"><?php echo $docente['nombre_rol'];?></td>
                                            <td style = "text-align:center"><?php echo $docente['ci'];?></td>
                                            <td style = "text-align:center"><?php echo $docente['fecha_nacimiento'];?></td>
                                            <td style = "text-align:center"><?php echo $docente['email'];?></td>
                                            <td style = "text-align:center">
                                                <?php if($docente['estado'] == '1'){ ?>
                                                    <button class = "btn btn-success btn-sm" style = "border-radius: 20px;">ACTIVO</button>
                                                <?php
                                                }else{ ?>
                                                    <button class = "btn btn-danger btn-sm" style = "border-radius: 20px;">INACTIVO</button>
                                                <?php
                                                } ?>
                                            </td>
                                            <td style = "text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="show.php?id=<?php echo $id_docente;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?php echo $id_docente;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                <form action="<?php echo APP_URL;?>/app/controllers/docentes/delete_docentes.php" onclick="preguntar<?php echo $id_docente;?>(event)" method="post" id="miFormulario<?php echo $id_docente;?>">
                                                        <input type="text" name="id_docente" value="<?php echo $id_docente;?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                                    
                                                    <script>
                                                        function preguntar<?php echo $id_docente;?>(event){
                                                            event.preventDefault()
                                                            Swal.fire({
                                                                title: 'Eliminar Registro',
                                                                text:  '¿Desea eliminar este registro?',
                                                                icon:  'question',
                                                                showDenyButton: true,
                                                                confirmButtonText: 'Eliminar',
                                                                confirmButtonColor: '#a5161d',
                                                                denyButtonColor: '#270a0a',
                                                                denyButtonText: 'Cancelar',
                                                            }).then ((result) =>{
                                                                if(result.isConfirmed){
                                                                    var form = $('#miFormulario<?php echo $id_docente;?>')
                                                                    form.submit()
                                                                }
                                                            })
                                                        }
                                                    </script>
                                                            
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Docentes",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Docentes",
                                        "infoFiltered": "(Filtrado de _MAX_ total Docentes)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Docentes",
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