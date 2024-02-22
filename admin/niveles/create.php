<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/configuraciones/gestion/listado_de_gestion.php')

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Registros de un nuevo nivel</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/niveles/create.php" method="post">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Getión educativa</label>
                                                    <select name="gestion_id" id="" class="form-control">
                                                        <?php 
                                                            foreach($gestiones as $gestion){ 
                                                                if($gestion['estado']=='1'){ ?>
                                                                    <option value="<?php echo $gestion['id_gestion'];?>"><?php echo $gestion['gestion'];?></option>
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
                                                        <option value="INICIAL">INICIAL</option>
                                                        <option value="PRIMARIO">PRIMARIO</option>
                                                        <option value="SECUNDARIO">SECUNDARIO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Turnos</label>
                                                    <select name="turno" class="form-control" id="">
                                                        <option value="MAÑANA">MAÑANA</option>
                                                        <option value="TARDE">TARDE</option>
                                                        <option value="NOCHE">NOCHE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class = "btn btn-primary">Registrar</button>
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
