<?php

include('../../../app/config.php');

$id_rol_permiso = $_POST['id_rol_permiso'];

$sentencia = $pdo->prepare("DELETE FROM roles_permisos WHERE id_roles_permiso=:id_roles_permiso");

$sentencia->bindParam(':id_roles_permiso', $id_rol_permiso);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se eliminó el permiso de la base de datos de manera correcta";
    $_SESSION['icono'] = "success";

    header('Location:' .APP_URL."/admin/roles");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el permiso de la base de datos";
    $_SESSION['icono'] = "error";

    ?><script>window.history.back()</script><?php
}

?>