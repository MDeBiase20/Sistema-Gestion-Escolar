<?php
//Consulta sql para mostrar registros de 3 tablas diferentes pero relacionadas
    $sql_docentes = " SELECT * FROM usuarios AS usu INNER JOIN roles AS rol ON rol.id_rol = usu.rol_id
    INNER JOIN personas AS per ON per.usuario_id = usu.id_usuario
    INNER JOIN docentes AS doc ON doc.persona_id = per.id_persona WHERE doc.estado = '1' AND doc.id_docente= '$id_docente' ";
    $query_docentes = $pdo->prepare($sql_docentes);
    $query_docentes->execute();

    $docentes = $query_docentes->fetchAll(PDO::FETCH_ASSOC);

    foreach($docentes as $docente){
        $id_usuario = $docente['id_usuario'];
        $id_persona = $docente['id_persona'];
        $id_docente = $docente['id_docente'];

        $nombres = $docente['nombres'];
        $apellido = $docente['apellidos'];
        $nombre_rol = $docente['nombre_rol'];
        $ci = $docente['ci'];
        $fecha_nacimiento = $docente['fecha_nacimiento'];
        $celular = $docente['celular'];
        $profesion = $docente['profesion'];
        $correo = $docente['email'];
        $especialidad = $docente['especialidad'];
        $antiguedad = $docente['antiguedad'];
        $direccion = $docente['direccion'];
        $fyh_creacion = $docente['fyh_creacion'];
        $estado = $docente['estado'];
    }
?>