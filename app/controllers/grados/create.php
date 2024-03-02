<?php
include('../../../app/config.php');

 $nivel_id = $_POST['nivel_id'];
 $curso = $_POST['curso'];
 $paralelo = $_POST['paralelo'];
 
 $sentencia = $pdo->prepare('INSERT INTO grados
 (nivel_id,curso,paralelo,fyh_creacion,estado)
 VALUES (:nivel_id,:curso,:paralelo,:fyh_creacion,:estado)');
 
 $sentencia->bindParam(':nivel_id',$nivel_id);
 $sentencia->bindParam(':curso',$curso);
 $sentencia->bindParam(':paralelo',$paralelo);
 $sentencia->bindParam(':fyh_creacion',$fecha_hora);
 $sentencia->bindParam(':estado',$estado_registro);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se registró el grado correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/grados");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al registrar el grado a la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/grados/create.php");
 }
 
?>