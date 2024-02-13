<?php
/*Acá se van a mostrar los mensajes
de cuando se pudo registrar, eliminar, modificiar un registro, se pudo iniciar sesión, etc.
*/

if( (isset($_SESSION['mensaje'])) && (isset($_SESSION['icono'])) ){
    $mensaje = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    ?>
        <script>
            Swal.fire({
                position: "top-end",
                icon: "<?php echo $icono;?>",
                title: "<?php echo $mensaje;?>",
                showConfirmButton: false,
                timer: 4000
            });
        </script>

        <?php
        //unset es una palabra reservada de php permite eliminar una sesión en específico  
        unset($_SESSION['mensaje']);   
        unset($_SESSION['icono']);   
            }
        ?>