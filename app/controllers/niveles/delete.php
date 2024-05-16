<?php

include('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_nivel=:id_nivel");


$sentencia->bindParam('id_nivel', $id_nivel);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó los datos del nivel de la manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/niveles");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el nivel de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el nivel de la base de datos por que existe en otra tabla';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}

?>