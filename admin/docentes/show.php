<?php

$id_docente = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/docentes/datos_docentes.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Docente: <?php echo $nombres." ".$apellido;?></h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos registrados</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol </label>
                                            <div class="form-inline">
                                                <p><?php echo $nombre_rol;?></p>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                                <p><?php echo $nombres;?></p>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellido</label>
                                            <p><?php echo $apellido;?></p>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de idéntidad </label>
                                            <p><?php echo $ci;?></p>
                                            
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento </label>
                                            <p><?php echo $fecha_nacimiento;?></p>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular </label>
                                            <p><?php echo $celular;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesión </label>
                                            <p><?php echo $profesion;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo electrónico </label>
                                            <p><?php echo $correo;?></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Especialidad </label>
                                            <p><?php echo $especialidad;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Antiguedad </label>
                                            <p><?php echo $antiguedad;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Dirección </label>
                                            <p><?php echo $direccion;?></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de creación </label>
                                                <p><?php echo $fyh_creacion;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado </label>
                                                <p> <?php
                                                        if($estado == "1") echo "ACTIVO";
                                                        else echo "INACTIVO";
                                                    ?>
                                                </p>
                                        </div>
                                    </div>

                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?php echo APP_URL;?>/admin/docentes" class = "btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>

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