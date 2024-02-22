<?php
include('../../../../app/config.php');

 $id_gestion = $_POST['id_gestion'];
 $gestion = $_POST['gestion'];
 $estado = $_POST['estado'];

 if ($estado == 'ACTIVO') {
    echo $estado = 1;
 }else{
    echo $estado = 0;
 }

 $sentencia = $pdo->prepare('UPDATE gestiones
 SET gestion=:gestion,
    fyh_actualizacion=:fyh_actualizacion,
    estado=:estado
 WHERE id_gestion=:id_gestion');
 
 $sentencia->bindParam(':gestion',$gestion);
 $sentencia->bindParam('fyh_actualizacion',$fecha_hora);
 $sentencia->bindParam(':estado',$estado);
 $sentencia->bindParam(':id_gestion',$id_gestion);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se actualizó la gestión educativa de forma correcta a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/configuraciones/gestion");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'No se pudo actualizar en la base de datos';
    $_SESSION['icono'] = 'error';
    ?> <script>windows.history.back()</script>  <?php
 }
  
?>