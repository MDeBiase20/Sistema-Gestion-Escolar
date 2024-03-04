<?php
$id_administrativo = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/administrativos/datos_administrativos.php');
include('../../app/controllers/roles/listado_roles.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Personal administrativo: <?php echo $nombres." ".$apellido;?></h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/administrativos/update.php" method="post">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name = "id_administrativo" value = "<?php echo $id_administrativo;?>" hidden>
                                            <input type="text" name = "id_usuario" value = "<?php echo $id_usuario;?>" hidden>
                                            <input type="text" name = "id_persona" value = "<?php echo $id_persona;?>" hidden>
                                            <label for="">Nombre del Rol </label>
                                            <a href="<?php echo APP_URL;?>/admin/roles/create.php" style = "margin-left:5px" class = "btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i></a>
                                            <div class="form-inline">
                                                
                                                <select name="rol_id" id="" class = "form-control">
                                                <?php
                                                    foreach($roles as $rol){ ?>
                                                    <option value="<?php echo $rol['id_rol'];?>"  <?php echo $nombre_rol== $rol['nombre_rol']  ? 'selected': '' ?> ><?php echo $rol['nombre_rol'];?></option>
                                                <?php    
                                                }
                                                ?>
                                                </select>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>

                                            <input type="text" value = "<?php echo $nombres;?>" name = "nombres" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellido</label>

                                            <input type="text" value = "<?php echo $apellido;?>" name = "apellido" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de idéntidad </label>

                                            <input type="number" value = "<?php echo $ci;?>" name = "ci" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento </label>

                                            <input type="date" value = "<?php echo $fecha_nacimiento;?>" name = "fecha_nacimiento" class = "form-control"   required>
                                            
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular </label>

                                            <input type="number" value = "<?php echo $celular;?>" name = "celular" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesión </label>

                                            <input type="text" value = "<?php echo $profesion;?>" name = "profesion" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo electrónico </label>

                                            <input type="email" value = "<?php echo $email;?>" name = "email" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Dirección </label>

                                            <input type="address" value = "<?php echo $direccion;?>" name = "direccion" class = "form-control" required>
                                            
                                        </div>
                                    </div>

                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class = "btn btn-success">Actualizar</button>
                                            <a href="<?php echo APP_URL;?>/admin/administrativos" class = "btn btn-secondary">Cancelar</a>
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