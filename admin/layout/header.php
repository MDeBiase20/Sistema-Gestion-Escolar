<?php session_start(); 

//Condición para que el usuario primero pase por el login
if (isset($_SESSION['sesion_email'])) {
  
  $email_sesion = $_SESSION['sesion_email'];
  $query = $pdo->prepare("SELECT * FROM usuarios AS usu
                        INNER JOIN roles AS rol ON rol.id_rol = usu.rol_id
                        INNER JOIN personas AS per ON per.usuario_id = usu.id_usuario
                        WHERE usu.email = '$email_sesion' AND usu.estado = '1' ");
  $query->execute();
  $datos_usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($datos_usuarios as $dato_usuario){
    $nombre_sesion_usuario = $dato_usuario['email'];
    $rol_sesion_usuario = $dato_usuario['nombre_rol'];
    $nombres_sesion_usuario = $dato_usuario['nombres'];
    $apellidos_sesion_usuario = $dato_usuario['apellidos'];
    $ci_sesion_usuario = $dato_usuario['ci'];
    // $curso = $dato_usuario['curso'];
    // $paralelo = $dato_usuario['paralelo'];
    // $nivel = $dato_usuario['nivel'];
    // $turno = $dato_usuario['turno'];
  }

}else{
  echo "El usuario no pasó por el login";
  header('Location:'.APP_URL."/login");
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_NAME;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- jQuery -->
  <script src="<?php echo APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
   <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo APP_URL;?>/admin" class="nav-link"><?php echo APP_NAME;?></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>

            <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo APP_URL;?>/admin" class="brand-link">
      <img src="https://cdn-icons-png.freepik.com/512/1080/1080985.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SGE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombre_sesion_usuario;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-gear"></i></i>
                    <p>
                      Configuraciones
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/configuraciones" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Configurar</p>
                </a>
              </li>
            </ul>


            <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-bookshelf"></i></i>
                    <p>
                      Niveles
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/niveles" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de niveles</p>
                </a>
              </li>
            </ul>

            <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-bar-chart-steps"></i></i>
                    <p>
                      Grados
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/grados" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de grados</p>
                </a>
              </li>
            </ul>

            <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-book"></i></i>
                    <p>
                      Materias
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/materias" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de materias</p>
                </a>
              </li>
            </ul>


          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas"><i class="bi bi-bookmarks"></i></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/roles" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Roles</p>
                </a>
              </li>
            </ul>


            <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas"><i class="bi bi-person-fill"></i></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/usuarios" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Usuarios</p>
                </a>
              </li>
            </ul>
            

            <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas"><i class="bi bi-person-lines-fill"></i></i>
              <p>
                Administrativos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/administrativos" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de administrativos</p>
                </a>
              </li>
            </ul>


            <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-person-video3"></i></i>
                    <p>
                      Docentes
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo APP_URL;?>/admin/docentes" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado de docentes</p>
                    </a>
                  </li>
                </ul>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo APP_URL;?>/admin/docentes/asignacion.php" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Asignación de materias</p>
                    </a>
                  </li>
                </ul>

            </li>

            

            <li class="nav-item">
              <a href="<?php echo APP_URL;?>/admin/kardex" class="nav-link active">
                <i class="nav-icon fas"><i class="bi bi-clipboard-check"></i></i>
                <p>
                  Kardex
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo APP_URL;?>/admin/calificaciones" class="nav-link active">
                <i class="nav-icon fas"><i class="bi bi-check2-square"></i></i>
                <p>
                  Calificaciones
                </p>
              </a>
            </li>


            <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-person-video"></i></i>
                    <p>
                      Estudiantes
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo APP_URL;?>/admin/inscripciones" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Inscripción</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo APP_URL;?>/admin/estudiantes" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado de estudiantes</p>
                    </a>
                  </li>

                </ul>
            </li>


            <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-cash-stack"></i></i>
                    <p>
                      Pagos
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo APP_URL;?>/admin/pagos" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Realizar pagos</p>
                    </a>
                  </li>

                </ul>
            </li>


          <li class="nav-item">
            <a href="<?php echo APP_URL;?>/login/logout.php" class="nav-link" style = "background-color:#c52510; color:black">
              <i class="nav-icon fas"><i class="bi bi-door-closed-fill"></i></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>