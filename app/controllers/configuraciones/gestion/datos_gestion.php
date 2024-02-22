<?php
   $sql_gestion = "SELECT * FROM  gestiones WHERE id_gestion = '$id_gestion'";
   $query_gestion = $pdo->prepare($sql_gestion);
   $query_gestion->execute();
   $gestiones = $query_gestion->fetchAll(PDO::FETCH_ASSOC);

   foreach($gestiones as $gestione){
    $gestion = $gestione['gestion'];
    $fyh_creacion = $gestione['fyh_creacion'];
    $estado = $gestione['estado'];
   }
   ?>