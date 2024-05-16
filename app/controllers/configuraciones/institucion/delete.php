<?php
include('../../../../app/config.php');
$id_gestion = $_POST['id_gestion'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM gestiones WHERE id_gestion=:id_gestion");


$sentencia->bindParam('id_gestion', $id_gestion);

try {
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
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el registro de la base de datos por que existe este registros en otras tablas';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/configuraciones/gestion");
}

    

?>