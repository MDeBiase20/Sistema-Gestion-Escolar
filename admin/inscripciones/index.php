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
            <h1>Inscripciones: <?php echo $year_actual;?></h1>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="bi bi-person"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Inscripciones</span>
                            <a href="create.php" class = "btn btn-primary btn-sm">Nuevo estudiante</a>
                        </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="bi bi-person-fill-add"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Importar estudiantes</span>
                            <a href="importar" class = "btn btn-success btn-sm">Importar</a>
                        </div>
                </div>
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
