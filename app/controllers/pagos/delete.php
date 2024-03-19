<?php

include('../../../app/config.php');

$id_pago = $_POST['id_pago'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM pagos WHERE id_pago=:id_pago");


$sentencia->bindParam('id_pago', $id_pago);


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó el pago de la manera correcta';
        $_SESSION['icono'] = 'success';
        //header('Location:'.APP_URL."/admin/pagos/create.php");
        ?> <script>window.history.back()</script>  <?php
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el pago de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}

?>