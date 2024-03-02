<?php
include('../app/config.php');
include('../admin/layout/header.php');
include('../app/controllers/roles/listado_roles.php');
include('../app/controllers/usuarios/listado_usuarios.php');
include('../app/controllers/niveles/listado_niveles.php');
include('../app/controllers/grados/listado_de_grados.php');
include('../app/controllers/materias/listado_de_materias.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <br>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <h1><?php echo APP_NAME;?></h1>
        </div>

        <div class="row">

          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                  $contador_roles = 0;
                  foreach($roles as $rol){
                    $contador_roles++;
                  }
                ?>
                <h3><?php echo $contador_roles;?></h3>
                <p>Roles registrados</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-bookmarks"></i></i>
                </div>
                  <a href="<?php echo APP_URL;?>/admin/roles" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-warning">
                <div class="inner">
                <?php 
                  $contador_usuarios = 0;
                  foreach($usuarios as $usuario){
                    $contador_usuarios++;
                  }
                ?>
                  <h3><?php echo $contador_usuarios;?></h3>
                  <p>Usuarios registrados</p>
                </div>
                  <div class="icon">
                    <i class="fas"><i class="bi bi-person-fill"></i></i>
                  </div>
                    <a href="<?php echo APP_URL;?>/admin/usuarios" class="small-box-footer">
                      Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                <div class="inner">
                <?php 
                  $contador_niveles = 0;
                  foreach($niveles as $nivel){
                    $contador_niveles++;
                  }
                ?>
                  <h3><?php echo $contador_niveles;?></h3>
                  <p>Niveles registrados</p>
                </div>
                  <div class="icon">
                    <i class="fas"><i class="bi bi-bookshelf"></i></i>
                  </div>
                    <a href="<?php echo APP_URL;?>/admin/niveles" class="small-box-footer">
                      Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-primary">
                <div class="inner">
                <?php 
                  $contador_grados = 0;
                  foreach($grados as $grado){
                    $contador_grados++;
                  }
                ?>
                  <h3><?php echo $contador_grados;?></h3>
                  <p>Grados registrados</p>
                </div>
                  <div class="icon">
                    <i class="fas"><i class="bi bi-bar-chart-steps"></i></i>
                  </div>
                    <a href="<?php echo APP_URL;?>/admin/grados" class="small-box-footer">
                      Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-danger">
                <div class="inner">
                <?php 
                  $contador_materias = 0;
                  foreach($materias as $materia){
                    $contador_materias++;
                  }
                ?>
                  <h3><?php echo $contador_materias;?></h3>
                  <p>Materias registradas</p>
                </div>
                  <div class="icon">
                    <i class="fas"><i class="bi bi-book"></i></i>
                  </div>
                    <a href="<?php echo APP_URL;?>/admin/materias" class="small-box-footer">
                      Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
              </div>
            </div>

        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include('../admin/layout/footer.php');
include('../layout/mensaje.php');
?>