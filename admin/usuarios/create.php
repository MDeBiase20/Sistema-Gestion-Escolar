<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/roles/listado_roles.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Creación de Usuarios</h1>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/usuarios/create.php" method="post">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol </label>

                                            <div class="form-inline">
                                                
                                                <select name="rol_id" id="" class = "form-control">
                                                <?php
                                                    foreach($roles as $rol){ ?>
                                                    <option value="<?php echo $rol['id_rol'];?>"><?php echo $rol['nombre_rol'];?></option>
                                                <?php    
                                                }
                                                ?>
                                                </select>
                                                <a href="<?php echo APP_URL;?>/admin/roles/create.php" style = "margin-left:5px" class = "btn btn-primary"><i class="bi bi-plus-circle"></i></a>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo Electrónico </label>

                                            <input type="email" name = "email" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Password </label>

                                            <input type="password" name = "password" class = "form-control" required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Repetir Password </label>

                                            <input type="password" name = "password_repet" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class = "btn btn-primary">Registrar</button>
                                            <a href="<?php echo APP_URL;?>/admin/usuarios" class = "btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>

                            </form>

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