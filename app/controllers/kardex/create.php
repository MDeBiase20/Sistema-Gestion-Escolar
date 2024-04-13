<?php

include('../../../app/config.php');

$docente_id = $_POST['docente_id'];    
$fecha = $_POST['fecha'];    
$estudiante_id = $_POST['estudiante_id'];    
$materia_id = $_POST['materia_id'];    
$observacion = $_POST['observacion'];    
$nota = $_POST['nota'];

$sentencia = $pdo->prepare('INSERT INTO kardexs
        (docente_id, estudiante_id, materia_id, fecha, observacion, nota, fyh_creacion, estado)
 VALUES (:docente_id, :estudiante_id, :materia_id, :fecha, :observacion, :nota, :fyh_creacion, :estado)');
 
 $sentencia->bindParam(':docente_id',$docente_id);
 $sentencia->bindParam(':estudiante_id',$estudiante_id);
 $sentencia->bindParam(':materia_id',$materia_id);
 $sentencia->bindParam(':fecha',$fecha);
 $sentencia->bindParam(':observacion',$observacion);
 $sentencia->bindParam(':nota',$nota);
 $sentencia->bindParam(':fyh_creacion',$fecha_hora);
 $sentencia->bindParam(':estado',$estado_registro);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se registró el kardex correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/kardex");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al registrar el kardex a la base de datos';
    $_SESSION['icono'] = 'error';
    //header('Location:'.APP_URL."/admin/kardex");
    ?><script>window.history.back()</script> <?php
 }

?>