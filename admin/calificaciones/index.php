<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
//include('../../app/controllers/docentes/listado_de_docentes.php');
include('../../app/controllers/docentes/listado_asignaciones.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Grados asignados</h1>
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
                                            $id_grado = $asignacion['id_grado'];
                                            $contador_asignaciones++;?>
                                            <tr>
                                                <td style = "text-align:center"><?php echo $contador_asignaciones;?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['nivel'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['turno'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['curso'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['paralelo'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['nombre_materia'];?></td>
                                                <td style = "text-align:center">
                                                    <a href="create.php?id_grado=<?php echo $id_grado;?>&&id_docente=<?php echo $asignacion['docente_id'];?>&&id_materia=<?php echo $asignacion['materia_id'];?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="bi bi-clipboard-check"></i> Subir notas</a>
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
        
    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
</div>
<!-- /.content-wrapper -->

<?php
include('../../admin/layout/footer.php');
include('../../layout/mensaje.php');
?>

