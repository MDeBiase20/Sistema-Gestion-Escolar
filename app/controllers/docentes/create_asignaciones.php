<?php

include('../../../app/config.php');

$id_docente = $_POST['id_docente'];
$id_nivel = $_POST['id_nivel'];
$id_grado = $_POST['id_grado'];
$id_materia = $_POST['id_materia'];

 //$nombre_materia = mb_strtoupper($nombre_materia, 'UTF-8');
 
 $sentencia = $pdo->prepare('INSERT INTO asignacion
 (docente_id, nivel_id, grado_id, materia_id, fyh_creacion, estado)
 VALUES (:docente_id, :nivel_id, :grado_id, :materia_id, :fyh_creacion, :estado)');
 
 $sentencia->bindParam(':docente_id',$id_docente);
 $sentencia->bindParam(':nivel_id',$id_nivel);
 $sentencia->bindParam(':grado_id',$id_grado);
 $sentencia->bindParam(':materia_id',$id_materia);
 $sentencia->bindParam(':fyh_creacion',$fecha_hora);
 $sentencia->bindParam(':estado',$estado_registro);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se registró la asignación de la materia correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    //header('Location:'.APP_URL."/admin/docentes/asignacion.php");
    ?> <script> window.history.back() </script> <?php
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al registrar la asignación de la materia a la base de datos';
    $_SESSION['icono'] = 'error';
    //header('Location:'.APP_URL."/admin/docentes");
    ?> <script> window.history.back() </script> <?php
 }
 
?>