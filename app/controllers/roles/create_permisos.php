<?php
include('../../../app/config.php');

 $nombre_url = $_POST['nombre_url'];
 $url = $_POST['url'];
 
 $sentencia = $pdo->prepare('INSERT INTO permisos
 (nombre_url,url,fyh_creacion,estado)
 VALUES (:nombre_url,:url,:fyh_creacion,:estado)');
 
 $sentencia->bindParam(':nombre_url',$nombre_url);
 $sentencia->bindParam(':url',$url);
 $sentencia->bindParam(':fyh_creacion',$fecha_hora);
 $sentencia->bindParam(':estado',$estado_registro);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se registró el permiso correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/roles/create_permisos.php");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al registrar el permiso a la base de datos';
    $_SESSION['icono'] = 'error';
    //header('Location:'.APP_URL."/admin/materias/create.php");
    ?> <script>window.history.back()</script> <?php
 }
 
?>