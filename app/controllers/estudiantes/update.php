<?php

include('../../../app/config.php');

//datos del estudiante
$rol_id = $_POST['rol_id'];
$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_estudiante = $_POST['id_estudiante'];
$id_ppffs = $_POST['id_ppffs'];

$nombres = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$ci = $_POST['ci'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$nivel_id = $_POST['nivel_id'];
$grado_id = $_POST['grado_id'];
$rude = $_POST['rude'];
$profesion = "ESTUDIANTE";

//datos de la familia
$ci_ppff = $_POST['ci_ppff'];
$nombres_apellidos_ppff = $_POST['nombres_apellidos_ppff'];
$celular_ppff = $_POST['celular_ppff'];
$ocupacion_ppff = $_POST['ocupacion_ppff'];
$ref_nombre = $_POST['ref_nombre'];
$ref_parentezco = $_POST['ref_parentezco'];
$ref_celular = $_POST['ref_celular'];


$pdo->beginTransaction(); //se está creando la primera transacción a la base de datos

            /*CONSULTAS SQL PARA 3 TABLAS DIFERENTES*/

            /*ACTUALIZAR A LA TABLA USUARIOS*/
    $password =  password_hash($ci, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('UPDATE usuarios
    SET rol_id=:rol_id,
        email=:email,
        password=:password,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_usuario=:id_usuario ');

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
    profesion=:profesion,
    direccion=:direccion,
    celular=:celular,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_persona=:id_persona');

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellido);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
$sentencia->bindParam(':id_persona',$id_persona);

$sentencia->execute();


            /*ACTUALIZACION A LA TABLA ESTUDIANTES*/
$sentencia = $pdo->prepare('UPDATE estudiantes
SET nivel_id=:nivel_id,
    grado_id=:grado_id,
    rude=:rude,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_estudiante=:id_estudiante');
        
        $sentencia->bindParam(':nivel_id',$nivel_id);
        $sentencia->bindParam(':grado_id',$grado_id);
        $sentencia->bindParam(':rude',$rude);
        $sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
        $sentencia->bindParam(':id_estudiante',$id_estudiante);

        $sentencia->execute();


/*ACTUALIZAR A LA TABLA PADRES DE FAMILIA*/
$sentencia = $pdo->prepare('UPDATE ppffs
SET ci_ppff=:ci_ppff,
    nombres_apellidos_ppff=:nombres_apellidos_ppff,
    celular_ppff=:celular_ppff,
    ocupacion=:ocupacion,
    ref_nombre=:ref_nombre,
    ref_parentezco=:ref_parentezco,
    ref_celular=:ref_celular,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_ppffs=:id_ppffs');
        
        
        $sentencia->bindParam(':ci_ppff',$ci_ppff);
        $sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
        $sentencia->bindParam(':celular_ppff',$celular_ppff);
        $sentencia->bindParam(':ocupacion',$ocupacion_ppff);
        $sentencia->bindParam(':ref_nombre',$ref_nombre);
        $sentencia->bindParam(':ref_parentezco',$ref_parentezco);
        $sentencia->bindParam(':ref_celular',$ref_celular);
        $sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
        $sentencia->bindParam(':id_ppffs',$id_ppffs);

if($sentencia->execute()){
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = 'Se actualizó el estudiante de forma correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/estudiantes");

}else{
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'No se pudo actualizar al estudiante';
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