<?php

include('../../../app/config.php');

$id_administrativo = $_POST['id_administrativo'];
$id_usuario = $_POST['id_usuario'];
$id_persona= $_POST['id_persona'];


$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellido = $_POST['apellido'];
$ci = $_POST['ci'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion'];

$pdo->beginTransaction(); //se está creando la primera transacción a la base de datos

            /*CONSULTAS SQL PARA 3 TABLAS DIFERENTES*/

            /*ACTUALIZAR A LA TABLA USUARIOS*/
    $password =  password_hash($ci, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('UPDATE usuarios
    SET rol_id=:rol_id,
        email=:email,
        password=:password,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_usuario=:id_usuario');

    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_actualizacion',$fecha_hora);
    $sentencia->bindParam('id_usuario',$id_usuario);

    $sentencia->execute();



            /*ACTUALIZAR A LA TABLA PERSONAS*/

$sentencia = $pdo->prepare('UPDATE personas
    SET nombres=:nombres,
        apellidos=:apellidos,
        ci=:ci,
        fecha_nacimiento=:fecha_nacimiento,
        celular=:celular,
        profesion=:profesion,
        direccion=:direccion,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_persona=:id_persona');

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellido);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
$sentencia->bindParam(':id_persona',$id_persona);

$sentencia->execute();


            /*ACTUALIZAR A LA TABLA ADMINISTRATIVOS*/
$sentencia = $pdo->prepare('UPDATE administrativos
    SET fyh_actualizacion=:fyh_actualizacion
    WHERE id_administrativo=:id_administrativo');
        
        $sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
        $sentencia->bindParam(':id_administrativo',$id_administrativo);


if($sentencia->execute()){
$pdo->commit();
session_start();
$_SESSION['mensaje'] = 'Se actualizó el personal administrativo de forma correcta';
$_SESSION['icono'] = 'success';
header('Location:'.APP_URL."/admin/administrativos");

}else{
$pdo->rollBack();
session_start();
    $_SESSION['mensaje'] = 'No se pudo actualizar el personal administrativo';
    $_SESSION['icono'] = 'error';
    ?> <script>windows.history.back()</script>  <?php
}

//Sentencias que me van a permitir hacer varias consultas
//beginTransaction() me va a permitir hacer varias transacciones sql

/* Lógica del código:
   1- Al decir "beginTransaction()" todas las consultas tienen que ejecutarse
   2- Si se insertan datos en la primera y segunda tabla pero en la tercera no, al tener el "commit()"
    me va a pedir que las 3 consultas se inserten si o si.
   3- Si se insertan los datos en la primera y segunda tabla pero en la tercera no, el "rollBack()"
    hace que se elimine los datos registrados anteriormente. 

*/

?>