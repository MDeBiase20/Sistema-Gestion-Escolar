<?php
include('../../../app/config.php');

 $nombre_materia = $_POST['nombre_materia'];
 $id_materia = $_POST['id_materia'];
 $nombre_materia = mb_strtoupper($nombre_materia, 'UTF-8');
 
 $sentencia = $pdo->prepare('UPDATE materias
 SET nombre_materia=:nombre_materia,
     fyh_actualizacion=:fyh_actualizacion
 WHERE id_materia=:id_materia');
 
 $sentencia->bindParam(':nombre_materia',$nombre_materia);
 $sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
 $sentencia->bindParam(':id_materia',$id_materia);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se actualizó la materia correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/materias");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al actualizar la materia a la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/materias/create.php");
 }
 
?>