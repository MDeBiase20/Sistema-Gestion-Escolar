<?php
include('../../config.php');

$nombres = $_POST['nombre_usuario'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if ($password == $password_repet) {
    //echo "Las contraseñas son iguales";
    $password =  password_hash($password, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('INSERT INTO usuarios
    (nombres, rol_id, email,password, fyh_creacion, estado)
    VALUES ( :nombres,:rol_id,:email,:password,:fyh_creacion,:estado)');

    $sentencia->bindParam(':nombres',$nombres);
    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_creacion',$fecha_hora);
    $sentencia->bindParam('estado',$estado_registro);

    try {
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = 'El usuario se registró correctamente a la base de datos';
            $_SESSION['icono'] = 'success';
            header('Location:'.APP_URL."/admin/usuarios");
            }else{
                session_start();
                $_SESSION['mensaje'] = 'No se pudo registrar el usuario';
                $_SESSION['icono'] = 'error';
                header('Location:'.APP_URL."/admin/usuarios/create.php");
                ?> <script>windows.history.back()</script>  <?php
            }
        
    } catch (Exception $exception) {
        session_start();
    $_SESSION['mensaje'] = 'El email de este usuario ya existe en la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/usuarios/create.php");
    ?> <script>windows.history.back()</script>  <?php
    }

}else{
    session_start();
    $_SESSION['mensaje'] = 'Las contraseñas no son iguales';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/usuarios/create.php");
    ?> <script>windows.history.back()</script>  <?php
}




?>