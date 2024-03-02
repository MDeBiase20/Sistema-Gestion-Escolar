<?php

$id_grado = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/grados/datos_grados.php');
include('../../app/controllers/niveles/listado_niveles.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Actualización del grado: <?php echo $curso;?></h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Actualizar los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/grados/update.php" method="post">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nivel</label>
                                                    <input type="text" name = "id_grado" value = "<?php echo $id_grado;?>" hidden>
                                                    <select name="nivel_id" id="" class="form-control">
                                                        <?php 
                                                            foreach($niveles as $nivele){ 
                                                                if($nivele['estado']=='1'){ ?>
                                                                    <option value="<?php echo $nivele['id_nivel'];?>" <?php echo $nivel_id == $nivele['id_nivel'] ? 'selected' : '' ?>><?php echo $nivele['nivel']." - ". $nivele['turno'] ;?></option>
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
                                                        <option value="INICIAL - 1" <?php echo $curso== 'INICIAL - 1' ? 'selected': '' ?>>INICIAL - 1</option>
                                                        <option value="INICIAL - 2" <?php echo $curso== 'INICIAL - 2' ? 'selected': '' ?>>INICIAL - 2</option>
                                                        <option value="PRIMARIO - 1" <?php echo $curso== 'PRIMARIO - 1' ? 'selected': '' ?>>PRIMARIO - 1</option>
                                                        <option value="PRIMARIO - 2" <?php echo $curso== 'PRIMARIO - 2' ? 'selected': '' ?>>PRIMARIO - 2</option>
                                                        <option value="PRIMARIO - 3" <?php echo $curso== 'PRIMARIO - 3' ? 'selected': '' ?>>PRIMARIO - 3</option>
                                                        <option value="PRIMARIO - 4" <?php echo $curso== 'PRIMARIO - 4' ? 'selected': '' ?>>PRIMARIO - 4</option>
                                                        <option value="PRIMARIO - 5" <?php echo $curso== 'PRIMARIO - 5' ? 'selected': '' ?>>PRIMARIO - 5</option>
                                                        <option value="PRIMARIO - 6" <?php echo $curso== 'PRIMARIO - 6' ? 'selected': '' ?>>PRIMARIO - 6</option>
                                                        <option value="PRIMARIO - 7" <?php echo $curso== 'PRIMARIO - 7' ? 'selected': '' ?>>PRIMARIO - 7</option>
                                                        <option value="SECUNDARIO - 1" <?php echo $curso== 'SECUNDARIO - 1' ? 'selected': '' ?>>SECUNDARIO - 1</option>
                                                        <option value="SECUNDARIO - 2" <?php echo $curso== 'SECUNDARIO - 2' ? 'selected': '' ?>>SECUNDARIO - 2</option>
                                                        <option value="SECUNDARIO - 3" <?php echo $curso== 'SECUNDARIO - 3' ? 'selected': '' ?>>SECUNDARIO - 3</option>
                                                        <option value="SECUNDARIO - 4" <?php echo $curso== 'SECUNDARIO - 4' ? 'selected': '' ?>>SECUNDARIO - 4</option>
                                                        <option value="SECUNDARIO - 5" <?php echo $curso== 'SECUNDARIO - 5' ? 'selected': '' ?>>SECUNDARIO - 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Paralelo</label>
                                                    <select name="paralelo" class="form-control" id="">
                                                        <option value="A" <?php echo $paralelo== 'A' ? 'selected': '' ?>>A</option>
                                                        <option value="B" <?php echo $paralelo== 'B' ? 'selected': '' ?>>B</option>
                                                        <option value="C" <?php echo $paralelo== 'C' ? 'selected': '' ?>>C</option>
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