<?php
include('../../../../app/config.php');
$id_configuracion = $_POST['id_configuracion'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM configuracion_instituciones WHERE id_config_institucion=:id_config_institucion");


$sentencia->bindParam('id_config_institucion', $id_configuracion);


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se eliminaron los datos de la institución de manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/configuraciones/institucion");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el registro de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>windows.history.back()</script>  <?php
}

?>