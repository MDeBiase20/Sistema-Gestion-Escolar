<?php
include('../../../app/config.php');
 $nombre_rol = $_POST['nombre_rol'];
 $nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

 if ($nombre_rol == "") {
    session_start();
    $_SESSION['mensaje'] = 'Llene el campo Nombre del rol';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/roles/create.php");
 }else{
    //para trabajar con parámetros
$sentencia = $pdo->prepare("INSERT INTO roles (nombre_rol, fyh_creacion, estado)
VALUES (:nombre_rol,:fyh_creacion,:estado)");


$sentencia->bindParam('nombre_rol', $nombre_rol);
$sentencia->bindParam('fyh_creacion', $fecha_hora);
$sentencia->bindParam('estado', $estado_registro);

try {
    if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Los datos se registraron correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/roles");
}else{
    session_start();
    $_SESSION['mensaje'] = 'Error al registrar a la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/roles/create.php");
}
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = 'Este rol ya existe en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/roles/create.php");
}

}
?>