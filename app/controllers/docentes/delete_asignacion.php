<?php
include('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM asignacion WHERE id_asignacion=:id_asignacion");


$sentencia->bindParam('id_asignacion', $id_asignacion);


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó la asignación de la base de datos de forma correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/docentes/asignacion.php");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar la asignación de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/docentes/asignacion.php");
}

?>