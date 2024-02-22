<?php
include('../../../app/config.php');
     $id_nivel = $_POST['id_nivel'];
     $gestion_id = $_POST['gestion_id'];
     $nivel = $_POST['nivel'];
     $turno = $_POST['turno'];
     
     $sentencia = $pdo->prepare('UPDATE niveles
     SET gestion_id=:gestion_id,
         nivel=:nivel, turno=:turno,
         fyh_actualizacion=:fyh_actualizacion
     WHERE id_nivel=:id_nivel');
     
     $sentencia->bindParam(':gestion_id',$gestion_id);
     $sentencia->bindParam(':nivel',$nivel);
     $sentencia->bindParam(':turno',$turno);
     $sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
     $sentencia->bindParam(':id_nivel',$id_nivel);
     
     if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se actualizó el nivel correctamente a la base de datos';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/niveles");
     }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al actualizar el nivel a la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/niveles/create.php");
     }
?>