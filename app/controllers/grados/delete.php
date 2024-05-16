<?php

include('../../../app/config.php');

$id_grado = $_POST['id_grado'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_grado=:id_grado");


$sentencia->bindParam('id_grado', $id_grado);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó los datos del grado de la manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/grados");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el grado de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el grado de la base de datos por que existe en otra tabla';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}

?>