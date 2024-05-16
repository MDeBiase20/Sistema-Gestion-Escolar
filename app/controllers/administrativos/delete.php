<?php
include('../../../app/config.php');
$id_administrativo = $_POST['id_administrativo'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM administrativos WHERE id_administrativo=:id_administrativo");


$sentencia->bindParam('id_administrativo', $id_administrativo);

try {
    
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó al personal administrativo de la base de datos de forma correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/administrativos");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar al personal administrativo de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/administrativos");
}
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = 'Error al eliminar al personal administrativo de la base de datos, porque este personal administrativo ya se encuentra registrado en otra tabla';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/administrativos");
}


?>