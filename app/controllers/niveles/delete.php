<?php

include('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_nivel=:id_nivel");


$sentencia->bindParam('id_nivel', $id_nivel);


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó los datos del nivel de la manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/niveles");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el nivel de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>windows.history.back()</script>  <?php
}

?>