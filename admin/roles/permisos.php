<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/roles/listado_de_permisos.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Listado de Permisos</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Permisos registrados</h3>

                        <div class="card-tools">
                            <a href="create_permisos.php" class = "btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo permiso</a>
                        </div><!-- /.card-tools -->
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Nombre del Rol</th>
                                        <th>Nombre de la url</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $contador_permisos = 0;
                                        foreach($permisos as $permiso){
                                            $id_permiso = $permiso['id_permiso'];
                                            $contador_permisos++; ?>
                                        <tr>
                                            <td style = "text-align:center"><?php echo $contador_permisos;?></td>
                                            <td><?php echo $permiso['nombre_url'];?></td>
                                            <td><?php echo $permiso['url'];?></td>
                                            <td style = "text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="edit_permiso.php?id=<?php echo $id_permiso;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?php echo APP_URL;?>/app/controllers/roles/delete_permiso.php" onclick="preguntar<?php echo $id_permiso;?>(event)" method="post" id="miFormulario<?php echo $id_permiso;?>">
                                                        <input type="text" name="id_permiso" value="<?php echo $id_permiso;?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                                    
                                                    <script>
                                                        function preguntar<?php echo $id_permiso;?>(event){
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
                                                                    var form = $('#miFormulario<?php echo $id_permiso;?>')
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
                                    "pageLength": 5,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Permisos",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Permisos",
                                        "infoFiltered": "(Filtrado de _MAX_ total Permisos)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Permisos",
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