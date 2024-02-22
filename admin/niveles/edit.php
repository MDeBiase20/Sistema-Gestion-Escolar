<?php
$id_nivel = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/niveles/datos_nivel.php');
include('../../app/controllers/configuraciones/gestion/listado_de_gestion.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Modificar nivel: <?php echo $nivel;?></h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/niveles/update.php" method="post">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Getión educativa</label>
                                                    <input type="text" name= "id_nivel"  value= "<?php echo $id_nivel;?>" hidden>
                                                    <select name="gestion_id" id="" class="form-control">
                                                        <?php 
                                                            foreach($gestiones as $gestion){ 
                                                                if($gestion['estado']=='1'){ ?>
                                                                    <option value="<?php echo $gestion['id_gestion'];?>"
                                                                        <?php if($gestion_id == $gestion['id_gestion']){ ?> selected = "selected" <?php } ?> >
                                                                        <?php echo $gestion['gestion'];?>
                                                                    </option>
                                                                <?php
                                                                } ?>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Niveles</label>
                                                    <select name="nivel" class="form-control" id="">
                                                        <option value="INICIAL" <?php if($nivel == 'INICIAL'){ ?> selected = "selected" <?php } ?>>INICIAL</option>
                                                        <option value="PRIMARIO" <?php if($nivel == 'PRIMARIO'){ ?> selected = "selected" <?php } ?>>PRIMARIO</option>
                                                        <option value="SECUNDARIO" <?php if($nivel == 'SECUNDARIO'){ ?> selected = "selected" <?php } ?>>SECUNDARIO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Turnos</label>
                                                    <select name="turno" class="form-control" id="">
                                                        <option value="MAÑANA" <?php if($turno == 'MAÑANA'){ ?> selected = "selected" <?php } ?>>MAÑANA</option>
                                                        <option value="TARDE" <?php if($turno == 'TARDE'){ ?> selected = "selected" <?php } ?>>TARDE</option>
                                                        <option value="NOCHE" <?php if($turno == 'NOCHE'){ ?> selected = "selected" <?php } ?>>NOCHE</option>
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
                                            <a href="<?php echo APP_URL;?>/admin/niveles" class = "btn btn-secondary">Cancelar</a>
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