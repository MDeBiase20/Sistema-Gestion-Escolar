<?php
$id_gestion = $_GET['id'];

include('../../../app/config.php');
include('../../../admin/layout/header.php');
include('../../../app/controllers/configuraciones/gestion/datos_gestion.php');
;

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Modificiación de: <?php echo $gestion;?></h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/configuraciones/gestion/update.php" method="post">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="id_gestion" value = "<?php echo $id_gestion;?>" hidden>
                                                <div class="form-group">
                                                    <label for="">Getión educativa</label>
                                                    <input type="text" value = "<?php echo $gestion;?>" name ="gestion" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Estado</label>
                                                    <select name="estado" class="form-control" id="">
                                                        <?php if($estado == '1'){ ?>
                                                            <option value="ACTIVO">ACTIVO</option>
                                                            <option value="INACTIVO">INACTIVO</option>
                                                        <?php
                                                        }else { ?>
                                                            <option value="ACTIVO">ACTIVO</option>
                                                            <option value="INACTIVO" selected = "selected">INACTIVO</option>
                                                        <?php
                                                        } ?>

                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class = "btn btn-success">Actualizar</button>
                                            <a href="<?php echo APP_URL;?>/admin/configuraciones/gestion" class = "btn btn-secondary">Cancelar</a>
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
include('../../../admin/layout/footer.php');
include('../../../layout/mensaje.php');
?>