<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/roles/listado_roles.php');
include('../../app/controllers/roles/listado_de_permisos.php');
include('../../app/controllers/roles/listado_roles_permisos.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Listado de Roles</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Roles registrados</h3>

                        <div class="card-tools">
                            <a href="create.php" class = "btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo rol</a>
                        </div><!-- /.card-tools -->
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Nombre del Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $contador_rol = 0;
                                        foreach($roles as $rol){
                                            $id_rol = $rol['id_rol'];
                                            $contador_rol++; ?>
                                        <tr>
                                            <td style = "text-align:center"><?php echo $contador_rol;?></td>
                                            <td><?php echo $rol['nombre_rol'];?></td>
                                            <td style = "text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal_asignacion<?php echo $id_rol;?>">
                                                        <i class="bi bi-check2-circle"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="Modal_asignacion<?php echo $id_rol;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style = "background-color:  #f7dc6f ">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Asignación de roles</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <input type="text" name="rol_id" id="rol_id<?php echo $id_rol;?>" value="<?php echo $id_rol;?>" hidden>
                                                                                <label>ROL: <?php echo $rol['nombre_rol'];?></label>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <select name="permiso_id" id="permiso_id<?php echo $id_rol;?>" class="form-control">
                                                                                            <?php
                                                                                                foreach($permisos as $permiso){
                                                                                                $id_permiso = $permiso['id_permiso']; ?>
                                                                                                <option value="<?php echo $id_permiso;?>"><?php echo $permiso['nombre_url'];?></option>
                                                                                            <?php    
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                            </div>
                                                                                <div class="col-md-3">
                                                                                    <button type="submit" class="btn btn-primary mb-2" id="btn_reg<?php echo $id_rol;?>">Asignar</button>
                                                                                </div>
                                                                                <!---Script para registrar desde AJAX--->
                                                                                    <script>
                                                                                        $('#btn_reg<?php echo $id_rol;?>').click(function(){
                                                                                            var rol = $('#rol_id<?php echo $id_rol;?>').val()
                                                                                            var permiso = $('#permiso_id<?php echo $id_rol;?>').val()
                                                                                            //alert(rol+" - "+permiso)
                                                                                            var url = "../../app/controllers/roles/create_roles_permisos.php"
                                                                                            $.get(url,{rol_id:rol, permiso_id:permiso},function(datos){
                                                                                                $('#respuesta<?php echo $id_rol;?>').html(datos)
                                                                                                $('#tabla<?php echo $id_rol;?>').css('display', 'none')

                                                                                                Swal.fire({
                                                                                                    position:"top-end",
                                                                                                    icon:"success",
                                                                                                    title:"Se asignó el permiso de forma correcta en la base de datos",
                                                                                                    showConfirmButton:false,
                                                                                                    timer:5000
                                                                                                })
                                                                                            })
                                                                                        })
                                                                                    </script>        
                                                                                <!---Script para registrar desde AJAX--->
                                                                                
                                                                        </div>
                                                                            <hr>   
                                                                            <div id="respuesta<?php echo $id_rol;?>"></div>         
                                                                        <div class="row" id="tabla<?php echo $id_rol;?>">
                                                                        <table class="table table-bordered table-sm table-striped table-hover">
<tr>
                                                                                    <th style = "text-align: center">Nro</th>
                                                                                    <th style = "text-align: center">Rol</th>
                                                                                    <th style = "text-align: center">Permiso</th>
                                                                                    <th style = "text-align: center">Acción</th>
                                                                                </tr>
                                                                                <?php
                                                                                    $contador_rol_permiso = 0;
                                                                                    foreach($roles_permisos as $role_permiso){
                                                                                        if($id_rol == $role_permiso['rol_id']){
                                                                                            $contador_rol_permiso++;
                                                                                            $id_rol_permiso = $role_permiso['id_roles_permiso'];?>

                                                                                <tr>
                                                                                    <td><?php echo $contador_rol_permiso; ?></td>
                                                                                    <td><?php echo $role_permiso['nombre_rol']; ?></td>
                                                                                    <td><?php echo $role_permiso['nombre_url']; ?></td>
                                                                                    <td>
                                                                                    <form action="<?php echo APP_URL;?>/app/controllers/roles/delete_rol_permiso.php" onclick="preguntar<?php echo $id_rol_permiso;?>(event)" method="post" id="miFormulario<?php echo $id_rol_permiso;?>">
                                                                                        <input type="text" name="id_rol_permiso" value="<?php echo $id_rol_permiso;?>" hidden>
                                                                                        <button type="submit" class="btn btn-danger btn-sm" ><i class="bi bi-trash3"></i></button>
                                                                                    </form>
                                                                                    
                                                                                    <script>
                                                                                        function preguntar<?php echo $id_rol_permiso;?>(event){
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
                                                                                                    var form = $('#miFormulario<?php echo $id_rol_permiso;?>')
                                                                                                    form.submit()
                                                                                                }
                                                                                            })
                                                                                        }
                                                                                    </script>
                                                                                    </td>
                                                                                </tr>
                                                                                    <?php
                                                                                    }
                                                                                                    
                                                                                    } ?>
                                                                                </table>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <a href="show.php?id=<?php echo $id_rol;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?php echo $id_rol;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?php echo APP_URL;?>/app/controllers/roles/delete.php" onclick="preguntar<?php echo $id_rol;?>(event)" method="post" id="miFormulario<?php echo $id_rol;?>">
                                                        <input type="text" name="id_rol" value="<?php echo $id_rol;?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                                    
                                                    <script>
                                                        function preguntar<?php echo $id_rol;?>(event){
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
                                                                    var form = $('#miFormulario<?php echo $id_rol;?>')
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                                        "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Roles",
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