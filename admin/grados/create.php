<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/niveles/listado_niveles.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Registros de un nuevo grado</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/grados/create.php" method="post">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nivel</label>
                                                    <select name="nivel_id" id="" class="form-control">
                                                        <?php 
                                                            foreach($niveles as $nivele){ 
                                                                if($nivele['estado']=='1'){ ?>
                                                                    <option value="<?php echo $nivele['id_nivel'];?>"><?php echo $nivele['nivel']." - ". $nivele['turno'] ;?></option>
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
                                                    <label for="">Curso</label>
                                                    <select name="curso" class="form-control" id="">
                                                        <option value="INICIAL - 1">INICIAL - 1</option>
                                                        <option value="INICIAL - 2">INICIAL - 2</option>
                                                        <option value="PRIMARIO - 1">PRIMARIO - 1</option>
                                                        <option value="PRIMARIO - 2">PRIMARIO - 2</option>
                                                        <option value="PRIMARIO - 3">PRIMARIO - 3</option>
                                                        <option value="PRIMARIO - 4">PRIMARIO - 4</option>
                                                        <option value="PRIMARIO - 5">PRIMARIO - 5</option>
                                                        <option value="PRIMARIO - 6">PRIMARIO - 6</option>
                                                        <option value="PRIMARIO - 7">PRIMARIO - 7</option>
                                                        <option value="SECUNDARIO - 1">SECUNDARIO - 1</option>
                                                        <option value="SECUNDARIO - 2">SECUNDARIO - 2</option>
                                                        <option value="SECUNDARIO - 3">SECUNDARIO - 3</option>
                                                        <option value="SECUNDARIO - 4">SECUNDARIO - 4</option>
                                                        <option value="SECUNDARIO - 5">SECUNDARIO - 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Paralelo</label>
                                                    <select name="paralelo" class="form-control" id="">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
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
                                            <a href="<?php echo APP_URL;?>/admin/grados" class = "btn btn-secondary">Cancelar</a>
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