<?php
include('../../../app/config.php');
$id_usuario = $_POST['id_usuario'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");


$sentencia->bindParam('id_usuario', $id_usuario);


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó el usuario de la base de datos de forma correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/usuarios");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el usuario de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/usuarios");
}

?>