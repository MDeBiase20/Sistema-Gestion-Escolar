<?php
include('../../../app/config.php');
$id_docente = $_GET['id_docente'];
$id_estudiante = $_GET['id_estudiante'];
$id_materia = $_GET['id_materia'];
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$nota3 = $_GET['nota3'];

//echo "id_docente: ".$id_docente."-id_estudiante: ".$id_estudiante."-id_materia".$id_materia."-".$nota1."-".$nota2."-".$nota3;

//Ingreso de notas
$sql_nota_1 = "SELECT * FROM  calificaciones WHERE docente_id='$id_docente'AND estudiante_id='$id_estudiante'AND materia_id='$id_materia'";
$query = $pdo->prepare($sql_nota_1);
$query->execute();
$nota_1 = $query->fetchAll(PDO::FETCH_ASSOC); //Si la variable query tiene datos

foreach($nota_1 as $nota){
    $id_calificacion = $nota['id_calificacion'];
}

if($nota_1){
    echo "Existe la nota";

    $sentencia = $pdo->prepare('UPDATE calificaciones
        SET nota_1=:nota_1,
            nota_2=:nota_2,
            nota_3=:nota_3,
            fyh_actualizacion=:fyh_actualizacion
    WHERE   id_calificacion=:id_calificacion');

    $sentencia->bindParam(':nota_1',$nota1);
    $sentencia->bindParam(':nota_2',$nota2);
    $sentencia->bindParam(':nota_3',$nota3);
    $sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
    $sentencia->bindParam(':id_calificacion',$id_calificacion);

    $sentencia->execute();
    
}else{
    echo "La nota no existe";

    $sentencia = $pdo->prepare('INSERT INTO calificaciones
            (docente_id, estudiante_id, materia_id, nota_1, nota_2, nota_3, fyh_creacion, estado)
    VALUES (:docente_id, :estudiante_id, :materia_id, :nota_1, :nota_2, :nota_3, :fyh_creacion, :estado)');
     
    $sentencia->bindParam(':docente_id',$id_docente);
    $sentencia->bindParam(':estudiante_id',$id_estudiante);
    $sentencia->bindParam(':materia_id',$id_materia);
    $sentencia->bindParam(':nota_1',$nota1);
    $sentencia->bindParam(':nota_2',$nota2);
    $sentencia->bindParam(':nota_3',$nota3);
    $sentencia->bindParam(':fyh_creacion',$fecha_hora);
    $sentencia->bindParam(':estado',$estado_registro);

    $sentencia->execute();

}
?>