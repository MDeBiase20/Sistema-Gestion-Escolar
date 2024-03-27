<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/docentes/listado_de_docentes.php');
include('../../app/controllers/niveles/listado_niveles.php');
include('../../app/controllers/grados/listado_de_grados.php');
include('../../app/controllers/materias/listado_de_materias.php');
include('../../app/controllers/docentes/listado_asignaciones.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Listado del personal docente asignado a las materias </h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Docentes asignados</h3>

                        <div class="card-tools">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_asignacion">
                                <i class="bi bi-plus-square"></i> Asignar materias
                            </button>
                        </div><!-- /.card-tools -->
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Nombre del docente</th>
                                        <th>Ci</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Materias asignadas</th>
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
                                            <td style="text-align:center">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Modal_materias<?php echo $id_docente;?>">
                                                    <i class="bi bi-postcard"></i> Ver materias
                                                </button>

                                                <!-- Modal ver asignaciones de materias -->
                                                <div class="modal fade" id="Modal_materias<?php echo $id_docente;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #42c9d2 ">
                                                                <h5 class="modal-title" id="exampleModalLabel">Materias asignadas</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                    <b>Docente: <?php echo $docente['nombres']." ".$docente['apellidos'] ;?></b>
                                                                    <hr>
                                                                    <table class="table table-striped table-bordered table-sm table-hover">
                                                                        <tr>
                                                                            <th style="text-align:center">Nro</th>
                                                                            <th style="text-align:center">Nivel</th>
                                                                            <th style="text-align:center">Turno</th>
                                                                            <th style="text-align:center">Grado</th>
                                                                            <th style="text-align:center">Paralelo</th>
                                                                            <th style="text-align:center">Materia</th>
                                                                            <th style="text-align:center">Acciones</th>
                                                                        </tr>
                                                                        <?php
                                                                            $contador_asignacion = 0;
                                                                            foreach($asignaciones as $asignacion){
                                                                                
                                                                                    if($asignacion['docente_id'] == $id_docente) { $contador_asignacion++;
                                                                                        $id_asignacion = $asignacion['id_asignacion'];?>
                                                                                                
                                                                                        <tr>
                                                                                            <td><?php echo $contador_asignacion;?></td>
                                                                                            <td><?php echo $asignacion['nivel'];?></td>
                                                                                            <td><?php echo $asignacion['turno'];?></td>
                                                                                            <td><?php echo $asignacion['curso'];?></td>
                                                                                            <td><?php echo $asignacion['paralelo'];?></td>
                                                                                            <td><?php echo $asignacion['nombre_materia'];?></td>
                                                                                            <td>
                                                                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                                                    <a type="button" data-toggle="modal" data-target="#Modal_edicion<?php echo $id_asignacion;?>"
                                                                                                            class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>

                                                                                                            <form action="<?php echo APP_URL;?>/app/controllers/docentes/delete_asignacion.php" onclick="preguntar<?php echo $id_asignacion;?>(event)" method="post" id="miFormulario<?php echo $id_asignacion;?>">
                                                                                                                <input type="text" name="id_asignacion" value="<?php echo $id_asignacion;?>" hidden>
                                                                                                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                                                                                                            </form>
                                                                                                            
                                                                                                            <!-- MODAL MODIFICAR ASIGNACIONES-->
                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Modal_edicion<?php echo $id_asignacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                              <div class="modal-dialog">
                                                                                                                <div class="modal-content">
                                                                                                                  <div class="modal-header" style="background-color:  #75b760  ">
                                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Registrar materias</h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                      <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                  </div>
                                                                                                                <div class="modal-body">
                                                                                                                    <form action="<?php echo APP_URL;?>/app/controllers/docentes/update_asignaciones.php" method="post">
                                                                                                                        <div class="row">
                                                                                                                                    
                                                                                                                            <div class="col-md-12">
                                                                                                                                <div class="form-group">
                                                                                                                                <input type="text" name= "id_asignacion" value = "<?php echo $id_asignacion;?>" hidden>
                                                                                                                                    <label for="">Niveles</label>
                                                                                                                                        <select name="id_nivel" id="" class="form-control">
                                                                                                                                        <?php foreach($niveles as $nivel){
                                                                                                                                            $id_nivel = $nivel['id_nivel']; ?>
                                                                                                                                            <option value="<?php echo $id_nivel; ?>" <?php echo $nivel['id_nivel']== $asignacion['nivel_id'] ? 'selected' : '' ?> > <?php echo $nivel['nivel'] ." ". $nivel['turno']; ?> </option>
                                                                                                                                        <?php    
                                                                                                                                        } ?>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                                    
                                                                                                                            <div class="col-md-12">
                                                                                                                                <div class="form-group">
                                                                                                                                    <label for="">Grados</label>
                                                                                                                                    <select name="id_grado" id="" class="form-control">
                                                                                                                                        <?php foreach($grados as $grado){
                                                                                                                                            $id_grado = $grado['id_grado']; ?>
                                                                                                                                            <option value="<?php echo $id_grado; ?>"<?php echo $grado['id_grado'] == $asignacion['grado_id'] ? 'selected' : '' ?> > <?php echo $grado['curso'] ." - Paralelo: ". $grado['paralelo']; ?> </option>
                                                                                                                                        <?php    
                                                                                                                                        } ?>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                                    
                                                                                                                            <div class="col-md-12">
                                                                                                                                <div class="form-group">
                                                                                                                                    <label for="">Materias</label>
                                                                                                                                    <select name="id_materia" id="" class="form-control">
                                                                                                                                        <?php foreach($materias as $materia){
                                                                                                                                            $id_materia = $materia['id_materia']; ?>
                                                                                                                                            <option value="<?php echo $id_materia; ?>" <?php echo $materia['id_materia'] == $asignacion['materia_id'] ? 'selected' : '' ?>> <?php echo $materia['nombre_materia']; ?> </option>
                                                                                                                                        <?php    
                                                                                                                                        } ?>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                                    
                                                                                                                        </div>
                                                                                                                                    
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                                                                            <button type="submit" class="btn btn-success">Actualizar asignación</button>
                                                                                                                        </div>
                                                                                                                                    
                                                                                                                    </form> 
                                                                                                                                    
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        <script>
                                                                                                            function preguntar<?php echo $id_asignacion;?>(event){
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
                                                                                                                        var form = $('#miFormulario<?php echo $id_asignacion;?>')
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
                                                                            }
                                                                        ?>
                                                                    </table>

                                                                </div>
                                                    </div>
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Asignaciones",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Asignaciones",
                                        "infoFiltered": "(Filtrado de _MAX_ total Asignaciones)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Asignaciones",
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

<!-- Modal -->
<div class="modal fade" id="Modal_asignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #55a5bf ">
        <h5 class="modal-title" id="exampleModalLabel">Registrar materias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <form action="<?php echo APP_URL;?>/app/controllers/docentes/create_asignaciones.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Docentes</label>
                        <select name="id_docente" id="" class="form-control">
                            <?php foreach($docentes as $docente){
                                $id_docente = $docente['id_docente']; ?>
                                <option value="<?php echo $id_docente; ?>"> <?php echo $docente['nombres'] ." ". $docente['apellidos']; ?> </option>
                            <?php    
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Niveles</label>
                        <select name="id_nivel" id="" class="form-control">
                            <?php foreach($niveles as $nivel){
                                $id_nivel = $nivel['id_nivel']; ?>
                                <option value="<?php echo $id_nivel; ?>"> <?php echo $nivel['nivel'] ." ". $nivel['turno']; ?> </option>
                            <?php    
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Grados</label>
                        <select name="id_grado" id="" class="form-control">
                            <?php foreach($grados as $grado){
                                $id_grado = $grado['id_grado']; ?>
                                <option value="<?php echo $id_grado; ?>"> <?php echo $grado['curso'] ." - Paralelo: ". $grado['paralelo']; ?> </option>
                            <?php    
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Materias</label>
                        <select name="id_materia" id="" class="form-control">
                            <?php foreach($materias as $materia){
                                $id_materia = $materia['id_materia']; ?>
                                <option value="<?php echo $id_materia; ?>"> <?php echo $materia['nombre_materia']; ?> </option>
                            <?php    
                            } ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Registrar asignación</button>
            </div>
            
        </form> 
        
    </div>
</div>