<?php

include('../../../app/config.php');

//datos del estudiante
$rol_id = $_POST['d1'];
$nombres = $_POST['d2'];
$apellido = $_POST['d3'];
$ci = $_POST['d4'];
$fecha_nacimiento = $_POST['d5'];
$celular = $_POST['d6'];
$email = $_POST['d7'];
$direccion = $_POST['d8'];
$nivel_id = $_POST['d9'];
$grado_id = $_POST['d10'];
$rude = $_POST['d11'];
$profesion = "ESTUDIANTE";

//datos de la familia
$ci_ppff = $_POST['d12'];
$nombres_apellidos_ppff = $_POST['d13'];
$celular_ppff = $_POST['d14'];
$ocupacion_ppff = $_POST['d15'];
$ref_nombre = $_POST['d16'];
$ref_parentezco = $_POST['d17'];
$ref_celular = $_POST['d18'];


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

            /*INSERTAR A LA TABLA ESTUDIANTES*/
$sentencia = $pdo->prepare('INSERT INTO estudiantes
    (persona_id, nivel_id, grado_id, rude, fyh_creacion, estado)
VALUES (:persona_id, :nivel_id, :grado_id, :rude, :fyh_creacion, :estado)');
        
        $sentencia->bindParam(':persona_id',$id_persona);
        $sentencia->bindParam(':nivel_id',$nivel_id);
        $sentencia->bindParam(':grado_id',$grado_id);
        $sentencia->bindParam(':rude',$rude);
        $sentencia->bindParam(':fyh_creacion',$fecha_hora);
        $sentencia->bindParam(':estado',$estado_registro);

        $sentencia->execute();

//Traemos la última inserción de la tabla persona y la almacenamos en la variable id_persona
$id_estudiante = $pdo->lastInsertId();

/*INSERTAR A LA TABLA PADRES DE FAMILIA*/
$sentencia = $pdo->prepare('INSERT INTO ppffs
    (estudiante_id, ci_ppff, nombres_apellidos_ppff, celular_ppff, ocupacion, ref_nombre, ref_parentezco, ref_celular, fyh_creacion, estado)
VALUES (:estudiante_id, :ci_ppff, :nombres_apellidos_ppff, :celular_ppff, :ocupacion, :ref_nombre, :ref_parentezco, :ref_celular, :fyh_creacion, :estado)');
        
        $sentencia->bindParam(':estudiante_id',$id_estudiante);
        $sentencia->bindParam(':ci_ppff',$ci_ppff);
        $sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
        $sentencia->bindParam(':celular_ppff',$celular_ppff);
        $sentencia->bindParam(':ocupacion',$ocupacion_ppff);
        $sentencia->bindParam(':ref_nombre',$ref_nombre);
        $sentencia->bindParam(':ref_parentezco',$ref_parentezco);
        $sentencia->bindParam(':ref_celular',$ref_celular);
        $sentencia->bindParam(':fyh_creacion',$fecha_hora);
        $sentencia->bindParam(':estado',$estado_registro);


if($sentencia->execute()){
    echo "Exito";
    $pdo->commit();

}else{
    echo "Error al registrar a la base de datos";
    $pdo->rollBack();
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
