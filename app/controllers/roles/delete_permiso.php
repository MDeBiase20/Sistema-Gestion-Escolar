<?php

include('../../../app/config.php');

$id_permiso = $_POST['id_permiso'];

$sentencia = $pdo->prepare("DELETE FROM permisos WHERE id_permiso=:id_permiso");

$sentencia->bindParam(':id_permiso', $id_permiso);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se eliminó el permiso de la base de datos de manera correcta";
        $_SESSION['icono'] = "success";
    
        header('Location:' .APP_URL."/admin/roles/permisos.php");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error al eliminar el permiso de la base de datos";
        $_SESSION['icono'] = "error";
    
        ?><script>window.history.back()</script><?php
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el permiso de la base de datos porque ya se encuentra asignado";
    $_SESSION['icono'] = "error";

    ?><script>window.history.back()</script><?php
}

?>