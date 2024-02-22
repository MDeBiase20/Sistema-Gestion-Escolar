<?php
    $sql_institucion = "SELECT * FROM configuracion_instituciones WHERE id_config_institucion= '$id_config_institucion' AND estado='1' ";
    $query_institucion = $pdo->prepare($sql_institucion);
    $query_institucion->execute();

    $instituciones = $query_institucion->fetchAll(PDO::FETCH_ASSOC);

    foreach ($instituciones as $institucione) {
        $nombre_institucion = $institucione['nombre_institucion'];
        $direccion = $institucione['direccion'];
        $telefono = $institucione['telefono'];
        $celular = $institucione['celular'];
        $correo = $institucione['correo'];
        $logo = $institucione['logo'];
    }
?>