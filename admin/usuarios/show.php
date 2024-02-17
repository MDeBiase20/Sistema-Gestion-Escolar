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
            <h1>Usuario: <?php echo $nombres;?></h1>
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
                                            <label for="">Nombre del Usuario </label>

                                            <input type="text" name = "nombre_usuario" class = "form-control" value = "<?php echo $nombres;?>" disabled  required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo Electrónico </label>

                                            <input type="email" name = "email" class = "form-control" value = "<?php echo $email;?>" disabled required>
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de creación </label>

                                            <input type="text" name = "fyh_creacion" value = "<?php echo $fyh_creacion;?>" disabled class = "form-control" required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estado </label>

                                            <input type="text" name = "fyh_creacion" value = "<?php if($estado == 1){ echo 'ACTIVO'; } else { echo 'INCATIVO';}?>" disabled class = "form-control" required>
                                            
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