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
            <h1>Creación de un nuevo docente</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/docentes/create.php" method="post">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol </label>
                                            <a href="<?php echo APP_URL;?>/admin/roles/create.php" style = "margin-left:5px" class = "btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i></a>
                                            <div class="form-inline">
                                                
                                                <select name="rol_id" id="" class = "form-control">
                                                <?php
                                                    foreach($roles as $rol){ ?>
                                                    <option value="<?php echo $rol['id_rol'];?>" <?php echo $rol['nombre_rol'] == "DOCENTE"  ? 'selected': '' ?> disabled ><?php echo $rol['nombre_rol'];?></option>
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

                                            <input type="text" name = "nombres" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellido</label>

                                            <input type="text" name = "apellido" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de idéntidad </label>

                                            <input type="number" name = "ci" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento </label>

                                            <input type="date" name = "fecha_nacimiento" class = "form-control"   required>
                                            
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular </label>

                                            <input type="number" name = "celular" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesión </label>

                                            <input type="text" name = "profesion" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo electrónico </label>

                                            <input type="email" name = "email" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Especialidad </label>

                                            <input type="text" name = "especialidad" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Antiguedad </label>

                                            <input type="number" name = "antiguedad" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Dirección </label>

                                            <input type="address" name = "direccion" class = "form-control" required>
                                            
                                        </div>
                                    </div>

                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class = "btn btn-primary">Registrar</button>
                                            <a href="<?php echo APP_URL;?>/admin/docentes" class = "btn btn-secondary">Cancelar</a>
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