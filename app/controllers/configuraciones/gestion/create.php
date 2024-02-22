<?php
include('../../../../app/config.php');

 $gestion = $_POST['gestion'];
 $estado = $_POST['estado'];

 if ($estado == 'ACTIVO') {
    echo $estado = 1;
 }else{
    echo $estado = 0;
 }

 $sentencia = $pdo->prepare('INSERT INTO gestiones
 (gestion, fyh_creacion, estado)
 VALUES (:gestion,:fyh_creacion,:estado)');
 
 $sentencia->bindParam(':gestion',$gestion);
 $sentencia->bindParam('fyh_creacion',$fecha_hora);
 $sentencia->bindParam(':estado',$estado);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se registró la gestión educativa de forma correcta a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/configuraciones/gestion");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'No se pudo registrar en la base de datos';
    $_SESSION['icono'] = 'error';
    ?> <script>windows.history.back()</script>  <?php
 }
  
?>