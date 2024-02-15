<?php
include('../../../app/config.php');
$nombre_rol = $_POST['nombre_rol'];
$id_rol = $_POST['id_rol'];

$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

 if ($nombre_rol == "") {
    session_start();
    $_SESSION['mensaje'] = 'Llene el campo Nombre del rol';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol);
 }else{
    //para trabajar con parámetros
$sentencia = $pdo->prepare("UPDATE roles 
SET nombre_rol=:nombre_rol, 
fyh_actualizacion=:fyh_actualizacion
WHERE id_rol=:id_rol");


$sentencia->bindParam('nombre_rol', $nombre_rol);
$sentencia->bindParam('fyh_actualizacion', $fecha_hora);
$sentencia->bindParam('id_rol', $id_rol);

try {
    if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Se actualizó el Rol de forma correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/roles");
}else{
    session_start();
    $_SESSION['mensaje'] = 'Error, no se pudo actualizar el rol de forma correcta';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol);
}
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = 'Este rol ya existe en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol);
}

}
?>