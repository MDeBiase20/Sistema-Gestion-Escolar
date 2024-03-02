<?php
include('../../../app/config.php');

 $nombre_materia = $_POST['nombre_materia'];
 $nombre_materia = mb_strtoupper($nombre_materia, 'UTF-8');
 
 $sentencia = $pdo->prepare('INSERT INTO materias
 (nombre_materia,fyh_creacion,estado)
 VALUES (:nombre_materia,:fyh_creacion,:estado)');
 
 $sentencia->bindParam(':nombre_materia',$nombre_materia);
 $sentencia->bindParam(':fyh_creacion',$fecha_hora);
 $sentencia->bindParam(':estado',$estado_registro);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se registró la materia correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/materias");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al registrar la materia a la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/materias/create.php");
 }
 
?>