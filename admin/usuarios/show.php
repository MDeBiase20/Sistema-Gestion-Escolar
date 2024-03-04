<?php

$id_usuario = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/usuarios/datos_usuarios.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Usuario: <?php echo $email;?></h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos registrados</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol </label>

                                            <div class="form-inline">
                                                
                                                <p><?php echo $nombre_rol;?></p>
                                            </div>
                                            
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo Electrónico </label>

                                            <p><?php echo $email;?></p>
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de creación </label>

                                            <p><?php echo $fyh_creacion;?></p>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estado </label>
                                            <p> <?php 
                                                        if($estado == '1') echo "ACTIVO";
                                                        else echo "INACTIVO";
                                                    ?>  </p>
                                            
                                        </div>
                                    </div>

                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?php echo APP_URL;?>/admin/usuarios" class = "btn btn-secondary">Volver</a>
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