<?php

include('../../../app/config.php');

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

            /*INSERTAR A LA TABLA USUARIOS*/
    $password =  password_hash($ci, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('INSERT INTO usuarios
        (rol_id, email, password, fyh_creacion, estado)
    VALUES (:rol_id, :email,:password, :fyh_creacion, :estado)');

    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_creacion',$fecha_hora);
    $sentencia->bindParam('estado',$estado_registro);

    $sentencia->execute();

    //esto nos va a retornar el último id insertado
    $id_usuario = $pdo->lastInsertId();



            /*INSERTAR A LA TABLA PERSONAS*/

$sentencia = $pdo->prepare('INSERT INTO personas
    (usuario_id,nombres,apellidos,ci,fecha_nacimiento,celular,profesion,direccion, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellido,:ci,:fecha_nacimiento,:celular,:profesion,:direccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id',$id_usuario);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellido',$apellido);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':fyh_creacion',$fecha_hora);
$sentencia->bindParam(':estado',$estado_registro);

$sentencia->execute();

//Traemos la última inserción de la tabla persona y la almacenamos en la variable id_persona
$id_persona = $pdo->lastInsertId();

            /*INSERTAR A LA TABLA ADMINISTRATIVOS*/
$sentencia = $pdo->prepare('INSERT INTO administrativos
    (persona_id, fyh_creacion, estado)
VALUES (:persona_id, :fyh_creacion, :estado)');
        
        $sentencia->bindParam(':persona_id',$id_persona);
        $sentencia->bindParam(':fyh_creacion',$fecha_hora);
        $sentencia->bindParam(':estado',$estado_registro);


if($sentencia->execute()){
$pdo->commit();
session_start();
$_SESSION['mensaje'] = 'Se registró el personal administrativo de forma correcta';
$_SESSION['icono'] = 'success';
header('Location:'.APP_URL."/admin/administrativos");

}else{
$pdo->rollBack();
session_start();
    $_SESSION['mensaje'] = 'No se pudo registrar el personal administrativo';
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