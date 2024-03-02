<?php
include('../../../app/config.php');
$id_materia = $_POST['id_materia'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM materias WHERE id_materia=:id_materia");


$sentencia->bindParam('id_materia', $id_materia);


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó la materia de la base de datos de forma correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/materias");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar la materia de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/materias");
}

?>