<?php

    $sql_usuarios = "SELECT * FROM usuarios AS usu INNER JOIN roles AS rol ON 
    rol.id_rol = usu.rol_id WHERE usu.estado = '1' AND usu.id_usuario = '$id_usuario' ";
    $query_usuarios = $pdo->prepare($sql_usuarios);
    $query_usuarios->execute();

    $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

    foreach($usuarios as $usuario){
        $nombre_rol = $usuario['nombre_rol'];
        $email = $usuario['email'];
        $fyh_creacion = $usuario['fyh_creacion'];
        $estado = $usuario['estado'];
    }
?>