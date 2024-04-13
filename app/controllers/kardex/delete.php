<?php
include('../../../app/config.php');
$id_kardex = $_POST['id_kardex'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM kardexs WHERE id_kardex=:id_kardex");


$sentencia->bindParam('id_kardex', $id_kardex);


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó el kardex de la base de datos de forma correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/kardex");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el kardex de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/kardex");
}

?>