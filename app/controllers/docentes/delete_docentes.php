<?php

include('../../../app/config.php');

$id_docente = $_POST['id_docente'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM docentes WHERE id_docente=:id_docente");


$sentencia->bindParam('id_docente', $id_docente);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó los datos del docente de la manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/docentes");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el docente de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el docente de la base de datos porque se encuentra asignado a las respectivas materias';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}

?>