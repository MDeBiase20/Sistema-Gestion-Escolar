<?php
//Consulta sql para mostrar registros de 3 tablas diferentes pero relacionadas
    $sql_kardex = " SELECT * FROM kardexs AS kar
    INNER JOIN docentes AS doc ON doc.id_docente = kar.docente_id
    INNER JOIN personas AS per ON per.id_persona = doc.persona_id
    INNER JOIN usuarios AS usu ON usu.id_usuario = per.usuario_id
    INNER JOIN materias AS mat ON mat.id_materia = kar.materia_id
    INNER JOIN estudiantes AS est ON est.id_estudiante = kar.estudiante_id";
    $query_kardex = $pdo->prepare($sql_kardex);
    $query_kardex->execute();

    $kardexs = $query_kardex->fetchAll(PDO::FETCH_ASSOC);
?>