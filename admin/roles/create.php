<?php
include('../../app/config.php');
include('../../admin/layout/header.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Creación de Roles</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/roles/create.php" method="post">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol</label>
                                            <input type="text" class = "form-control" name="nombre_rol">
                                        </div>
                                    </div>
                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class = "btn btn-primary">Registrar</button>
                                            <a href="<?php echo APP_URL;?>/admin/roles" class = "btn btn-secondary">Cancelar</a>
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