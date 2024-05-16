<?php

include('../../../app/config.php');

$id_estudiantes = $_POST['id_estudiantes'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM estudiantes WHERE id_estudiantes=:id_estudiantes");


$sentencia->bindParam('id_estudiantes', $id_estudiantes);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó los datos del estudiante de la manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/id_estudiantes");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el estudiante de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el estudiante de la base de datos porque se encuentra relacionado con otros registros';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}

?>