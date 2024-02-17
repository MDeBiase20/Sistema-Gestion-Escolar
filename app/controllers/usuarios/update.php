<?php
include('../../config.php');

$id_usuario = $_POST['id_usuario'];
$nombres = $_POST['nombre_usuario'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];

$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if($password ==""){
    
        $sentencia = $pdo->prepare('UPDATE usuarios
        SET nombres=:nombres,
            rol_id=:rol_id,
            email=:email,
            fyh_actualizacion=:fyh_actualizacion
        WHERE id_usuario=:id_usuario');
    
        $sentencia->bindParam(':nombres',$nombres);
        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':email',$email);
        //$sentencia->bindParam(':password',$password);
        $sentencia->bindParam('fyh_actualizacion',$fecha_hora);
        $sentencia->bindParam('id_usuario',$id_usuario);
    
        try {
            if($sentencia->execute()){
                session_start();
                $_SESSION['mensaje'] = 'El actualizó se registró correctamente a la base de datos';
                $_SESSION['icono'] = 'success';
                header('Location:'.APP_URL."/admin/usuarios");
                }else{
                    session_start();
                    $_SESSION['mensaje'] = 'No se pudo actualizó el usuario';
                    $_SESSION['icono'] = 'error';
                    header('Location:'.APP_URL."/admin/usuarios/edit.php");
                    ?> <script>windows.history.back()</script>  <?php
                }
            
        } catch (Exception $exception) {
            session_start();
        $_SESSION['mensaje'] = 'El email de este usuario ya existe en la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/usuarios/edit.php");
        ?> <script>windows.history.back()</script>  <?php
        }
    
}else{
    if ($password == $password_repet) {
        //echo "Las contraseñas son iguales";
        $password =  password_hash($password, PASSWORD_DEFAULT);

        $sentencia = $pdo->prepare('UPDATE usuarios
        SET nombres=:nombres,
            rol_id=:rol_id,
            email=:email,
            password=:password,
            fyh_actualizacion=:fyh_actualizacion
        WHERE id_usuario=:id_usuario');
    
        $sentencia->bindParam(':nombres',$nombres);
        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam(':password',$password);
        $sentencia->bindParam('fyh_actualizacion',$fecha_hora);
        $sentencia->bindParam('id_usuario',$id_usuario);

        try {
            if($sentencia->execute()){
                session_start();
                $_SESSION['mensaje'] = 'El actualizó se registró correctamente a la base de datos';
                $_SESSION['icono'] = 'success';
                header('Location:'.APP_URL."/admin/usuarios");
                }else{
                    session_start();
                    $_SESSION['mensaje'] = 'No se pudo actualizó el usuario';
                    $_SESSION['icono'] = 'error';
                    header('Location:'.APP_URL."/admin/usuarios/edit.php");
                    ?> <script>windows.history.back()</script>  <?php
                }
            
        } catch (Exception $exception) {
            session_start();
        $_SESSION['mensaje'] = 'El email de este usuario ya existe en la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/usuarios/edit.php");
        ?> <script>windows.history.back()</script>  <?php
        }

}else{
        session_start();
        $_SESSION['mensaje'] = 'Las contraseñas no son iguales';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/usuarios/edit.php");
        ?> <script>windows.history.back()</script>  <?php
    }
}
?>