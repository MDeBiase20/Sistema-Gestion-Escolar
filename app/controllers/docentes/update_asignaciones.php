<?php

include('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];
$id_nivel = $_POST['id_nivel'];
$id_grado = $_POST['id_grado'];
$id_materia = $_POST['id_materia'];

 //$nombre_materia = mb_strtoupper($nombre_materia, 'UTF-8');
 
 $sentencia = $pdo->prepare('UPDATE asignacion
 SET    nivel_id=:nivel_id,
        grado_id=:grado_id,
        materia_id=:materia_id,
        fyh_actualizacion=:fyh_actualizacion

 WHERE id_asignacion=:id_asignacion');
  
 $sentencia->bindParam(':nivel_id',$id_nivel);
 $sentencia->bindParam(':grado_id',$id_grado);
 $sentencia->bindParam(':materia_id',$id_materia);
 $sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
 $sentencia->bindParam(':id_asignacion',$id_asignacion);
 
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se actualizó la asignación de la materia correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
   //header('Location:'.APP_URL."/admin/docentes/asignacion.php");
    ?> <script> window.history.back() </script> <?php
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al actualizar la asignación de la materia a la base de datos';
    $_SESSION['icono'] = 'error';
    //header('Location:'.APP_URL."/admin/docentes");
    ?> <script> window.history.back() </script> <?php
 }

?>