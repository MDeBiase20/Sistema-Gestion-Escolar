<?php

$id_estudiante = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');

include('../../app/controllers/estudiantes/datos_estudiantes.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Datos del estudiante: <?php echo $apellido." ".$nombres;?></h1>
            </div>
            <br>

                        <!-- DATOS PERSONALES-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Datos del estudiante</b></h3>

                                    </div><!-- /.card-header -->
                            
                                        <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Nombre del Rol </label>
                                                        <p><?php echo $nombre_rol; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Nombres</label>
                                                        <p><?php echo $nombres; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Apellido</label>
                                                        <p><?php echo $apellido; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Carnet de idéntidad </label>
                                                        <p><?php echo $ci; ?></p>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Fecha de nacimiento </label>
                                                        <p><?php echo $fecha_nacimiento; ?></p>
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Celular </label>
                                                        <p><?php echo $celular; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Correo electrónico </label>
                                                        <p><?php echo $email; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Dirección </label>
                                                        <p><?php echo $direccion; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Fecha de registro </label>
                                                        <p><?php echo $fyh_creacion; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Estado </label>
                                                        <p><?php if($estado == "1") echo "ACTIVO";
                                                                    else echo "INACTIVO"; ?></p>
                                                </div>
                                            </div>

                                        </div>

                                </div><!-- /.card-body -->
                        
                        </div><!-- /.card -->
                    
                        </div>
                        </div><!-- /.row -->

                    <!-- DATOS DE LOS ESTUDIANTES-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Datos académicos</b></h3>

                                    </div><!-- /.card-header -->
                            
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                        <label for="">Nivel </label>
                                                            <p><?php echo $nivel." - ".$turno; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Grado</label>
                                                        <p><?php echo $grado." - Paralelo: ".$paralelo; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Rude</label>
                                                        <p><?php echo $rude; ?></p>
                                                </div>
                                            </div>


                                        </div>

                                    </div><!-- /.card-body -->
                        
                                </div><!-- /.card -->
                    
                            </div>
                        </div>

                    <!-- DATOS DE LOS PADRES DE FAMILIA-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Datos del padre familia</b></h3>

                                    </div><!-- /.card-header -->
                            
                                    <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Carnet de identidad</label>
                                                    <p><?php echo $ci_ppff; ?></p>
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellido y Nombre</label>
                                                <p><?php echo $nombres_apellidos_ppff; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                                <p><?php echo $celular_ppff; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                                <p><?php echo $ocupacion_ppff; ?></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos y nombres de referencia</label>
                                                <p><?php echo $ref_nombre; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Parentezco</label>
                                                <p><?php echo $ref_parentezco; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Celular de referencia</label>
                                                <p><?php echo $ref_celular; ?></p>
                                        </div>
                                    </div>


                                </div>

                                    </div><!-- /.card-body -->
                        
                                </div><!-- /.card -->
                    
                            </div>
                        </div>

                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?php echo APP_URL;?>/admin/estudiantes" class = "btn btn-secondary btn-lg">Volver</a>
                                        </div>
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