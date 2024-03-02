<?php
include('../../../app/config.php');

 $id_grado = $_POST['id_grado'];
 $nivel_id = $_POST['nivel_id'];
 $curso = $_POST['curso'];
 $paralelo = $_POST['paralelo'];
 
 $sentencia = $pdo->prepare('UPDATE grados
SET nivel_id=:nivel_id,
    curso=:curso,
    paralelo=:paralelo,
    fyh_actualizacion=:fyh_actualizacion   
 WHERE id_grado=:id_grado');
 
 $sentencia->bindParam(':nivel_id',$nivel_id);
 $sentencia->bindParam(':curso',$curso);
 $sentencia->bindParam(':paralelo',$paralelo);
 $sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
 $sentencia->bindParam(':id_grado',$id_grado);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se actualizó el grado correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/grados");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al actualizar el grado a la base de datos';
    $_SESSION['icono'] = 'error';
    //header('Location:'.APP_URL."/admin/grados/update.php");
    ?><script>window.history.back()</script><?php
 }
 
?>