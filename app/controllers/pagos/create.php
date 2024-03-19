<?php
include('../../../app/config.php');

    $estudiante_id = $_POST['estudiante_id'];
    $mes_pagado = $_POST['mes_pagado'];
    $monto_pagado = $_POST['monto_pagado'];
    $fecha_pago = $_POST['fecha_pago'];
     
    $sentencia = $pdo->prepare('INSERT INTO pagos
            (estudiante_id, mes_pagado, monto_pagado, fecha_pago, fyh_creacion, estado)
    VALUES (:estudiante_id, :mes_pagado, :monto_pagado, :fecha_pago, :fyh_creacion, :estado)');
     
    $sentencia->bindParam(':estudiante_id',$estudiante_id);
    $sentencia->bindParam(':mes_pagado',$mes_pagado);
    $sentencia->bindParam(':monto_pagado',$monto_pagado);
    $sentencia->bindParam(':fecha_pago',$fecha_pago);
    $sentencia->bindParam(':fyh_creacion',$fecha_hora);
    $sentencia->bindParam(':estado',$estado_registro);
     
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se registró el pago correctamente a la base de datos';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/pagos/create.php");
        ?> <script>window.history.back();</script>  <?php
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al registrar el pago a la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/pagos/create.php");
        ?> <script>window.history.back();</script>  <?php
    }
?>