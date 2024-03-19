<?php

    $sql_pagos = "SELECT * FROM pagos  WHERE estado = '1' AND estudiante_id = '$id_estudiante'";
    $query_pagos = $pdo->prepare($sql_pagos);
    $query_pagos->execute();

    $pagos = $query_pagos->fetchAll(PDO::FETCH_ASSOC);
?>