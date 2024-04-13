<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include('../../app/controllers/docentes/listado_asignaciones.php');
include('../../app/controllers/kardex/listado_de_kardex.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Grados asignados para reportes de kardex</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Asignaciones registradas</h3>
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                        <th>Grado</th>
                                        <th>Paralelo</th>
                                        <th>Materia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php 
                                    $contador_asignaciones = 0;
                                    foreach($asignaciones as $asignacion){

                                        //este if pregunta si el email con el que se inicio sesión es igual el email
                                        if($email_sesion == $asignacion['email']){
                                            $id_asignacion = $asignacion['id_asignacion'];
                                            $id_grado = $asignacion['id_grado'];
                                            $docente_id = $asignacion['docente_id'];
                                            $contador_asignaciones++;?>
                                            <tr>
                                                <td style = "text-align:center"><?php echo $contador_asignaciones;?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['nivel'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['turno'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['curso'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['paralelo'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['nombre_materia'];?></td>
                                                <td>
                                                    <center>
                                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $id_asignacion;?>">
                                                            <i class="bi bi-clipboard-check"></i> Reportar
                                                        </a>
                                                    </center>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?php echo $id_asignacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header" style="background-color:  #f5304b ">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="color:  #faf8f8 ">
                                                                    Reporte del curso: <?php echo $asignacion['curso']; ?>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo APP_URL;?>/app/controllers/kardex/create.php" method="post">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Fecha de reporte</label>
                                                                                    <input type="text" name="docente_id" value="<?php echo $docente_id;?>" hidden>
                                                                                    <input type="date" name="fecha" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Estudiante</label>
                                                                                    <select name="estudiante_id" id="" class="form-control">
                                                                                        <?php
                                                                                            foreach($estudiantes as $estudiante){
                                                                                                if($estudiante['id_grado'] == $asignacion['grado_id']){
                                                                                                                $id_estudiante = $estudiante['id_estudiante'];
                                                                                                ?>
                                                                                                <option value="<?php echo $id_estudiante;?>"><?php echo $estudiante['apellidos']. " " .$estudiante['nombres'] ;?></option>
                                                                                        <?php
                                                                                                }
                                                                                        
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Materia</label>
                                                                                    <input type="text" class="form-control" value = "<?php echo $asignacion['nombre_materia'];?>" disabled>
                                                                                    <input type="text" name ="materia_id" class="form-control" value = "<?php echo $asignacion['id_materia'];?>" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Observación</label>
                                                                                    <select name="observacion" id="" class="form-control">
                                                                                        <option value="DISCIPLINA">DISCIPLINA</option>
                                                                                        <option value="ASISTENCIA">ASISTENCIA</option>
                                                                                        <option value="RENDIMIENTO ACADÉMICO">RENDIMIENTO ACADÉMICO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Nota</label>
                                                                                    <textarea name="nota" id="" cols="30" rows="3" class="form-control"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>                    

                                                            </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btn-danger">Registrar</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
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
        
        <br>

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
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                        <th>Grado</th>
                                        <th>Paralelo</th>
                                        <th>Materia</th>
                                        <th>Estudiante</th>
                                        <th>Fecha de reporte</th>
                                        <th>Observación</th>
                                        <th>Nota</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php 
                                    $contador_kardex = 0;
                                    foreach($kardexs as $kardex){

                                        //este if pregunta si el email con el que se inicio sesión es igual el email
                                        if($email_sesion == $kardex['email']){
                                            $id_kardex = $kardex['id_kardex'];
                                            $estudiante_id = $kardex['estudiante_id'];
                                            $grado_id = $kardex['grado_id'];
                                            $contador_kardex++;?>
                                            <tr>
                                                <td style = "text-align:center"><?php echo $contador_kardex;?></td>

                                                <?php
                                                    foreach($estudiantes as $estudiante){
                                                        if($estudiante['id_estudiante'] == $kardex['estudiante_id']){ ?>
                                                            <td style = "text-align:center"><?php echo $estudiante['nivel'];?></td>
                                                            <td style = "text-align:center"><?php echo $estudiante['turno'];?></td>
                                                            <td style = "text-align:center"><?php echo $estudiante['curso'];?></td>
                                                            <td style = "text-align:center"><?php echo $estudiante['paralelo'];?></td>
                                                            <td style = "text-align:center"><?php echo $kardex['nombre_materia'];?></td>
                                                            <td style = "text-align:center"><?php echo $estudiante['nombres']." ".$estudiante['apellidos'];?></td>
                                                            <td style = "text-align:center"><?php echo $kardex['fecha'];?></td>
                                                            <td style = "text-align:center"><?php echo $kardex['observacion'];?></td>
                                                            <td style = "text-align:center"><?php echo $kardex['nota'];?></td>
                                                    <?php
                                                        }
                                                    }
                                                ?>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalEditar<?php echo $id_kardex;?>">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <form action="<?php echo APP_URL;?>/app/controllers/kardex/delete.php" onclick="preguntar<?php echo $id_kardex;?>(event)" method="post" id="miFormulario<?php echo $id_kardex;?>">
                                                            <input type="text" name="id_kardex" value="<?php echo $id_kardex;?>" hidden>
                                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                                                        </form>
                                                    
                                                        <script>
                                                            function preguntar<?php echo $id_kardex;?>(event){
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
                                                                        var form = $('#miFormulario<?php echo $id_kardex;?>')
                                                                        form.submit()
                                                                    }
                                                                })
                                                            }
                                                        </script>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="ModalEditar<?php echo $id_kardex;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header" style="background-color:  #078e2e ">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="color:  #faf8f8 ">
                                                                    Editar reporte
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo APP_URL;?>/app/controllers/kardex/update.php" method="post">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Fecha de reporte</label>
                                                                                    <input type="text" value="<?php echo $id_kardex; ?>" name ="id_kardex" hidden>
                                                                                    <input type="text" name="docente_id" value="<?php echo $docente_id;?>" hidden>
                                                                                    <input type="date" name="fecha" class="form-control" value = "<?php echo $kardex['fecha'];?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Estudiante</label>
                                                                                    <select name="estudiante_id" id="" class="form-control">
                                                                                        <?php
                                                                                            foreach($estudiantes as $estudiante){
                                                                                                if($estudiante['id_grado'] == $grado_id){
                                                                                                        $id_estudiante = $estudiante['id_estudiante'];
                                                                                                ?>
                                                                                                <option value="<?php echo $id_estudiante;?>" <?php echo $id_estudiante==$estudiante_id ? 'selected' : '' ?> ><?php echo $estudiante['apellidos']. " " .$estudiante['nombres'] ;?></option>
                                                                                        <?php
                                                                                                }
                                                                                        
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Materia</label>
                                                                                    <input type="text" value ="<?php echo $kardex['nombre_materia'];?>" class="form-control" disabled>
                                                                                    <input type="text" name ="materia_id" class="form-control" value = "<?php echo $kardex['id_materia'];?>" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Observación</label>
                                                                                    <select name="observacion" id="" class="form-control">
                                                                                        <option value="DISCIPLINA" <?php echo $kardex['observacion']== "DISCIPLINA" ? 'selected' : '' ?>>DISCIPLINA</option>
                                                                                        <option value="ASISTENCIA" <?php echo $kardex['observacion']== "ASISTENCIA" ? 'selected' : '' ?>>ASISTENCIA</option>
                                                                                        <option value="RENDIMIENTO ACADÉMICO" <?php echo $kardex['observacion']== "RENDIMIENTO ACADÉMICO" ? 'selected' : '' ?>>RENDIMIENTO ACADÉMICO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Nota</label>
                                                                                    <textarea name="nota" id="" cols="30" rows="3" class="form-control"><?php echo $kardex['nota'];?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>                    

                                                            </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
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
        </div>

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
