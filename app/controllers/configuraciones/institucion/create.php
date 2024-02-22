<?php
include('../../../../app/config.php');

$nombre_institucion = $_POST['nombre_institucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];

if($_FILES['file']['name'] != null){
    //echo "Existe una imagen";
    //Le cambiamos el nombre de la imagen para que no pueda ser reemplazado
    $nombre_del_archivo = date('Y-m-d-H-i-s').$_FILES['file']['name'];

    //ubicación donde se va a guardar la imagen
    $location = "../../../../public/images/configuracion/".$nombre_del_archivo;

    //Instrucción que me permite subir el archivo
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $logo = $nombre_del_archivo;

}else{
    //echo "No existe imagen";
    $logo = "";
}

$sentencia = $pdo->prepare('INSERT INTO configuracion_instituciones
(nombre_institucion,logo,direccion,telefono,celular,correo, fyh_creacion, estado)
VALUES ( :nombre_institucion,:logo,:direccion,:telefono,:celular,:correo,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_institucion',$nombre_institucion);
$sentencia->bindParam(':logo',$logo);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam(':fyh_creacion',$fecha_hora);
$sentencia->bindParam(':estado',$estado_registro);

if($sentencia->execute()){
echo 'success';
            session_start();
            $_SESSION['mensaje'] = 'se registraron los datos de configuración correctamente a la base de datos';
            $_SESSION['icono'] = 'success';
            header('Location:'.APP_URL."/admin/configuraciones/institucion");
}else{
    session_start();
    $_SESSION['mensaje'] = 'No se pudo registrar en la base de datos';
    $_SESSION['icono'] = 'error';
    ?> <script>windows.history.back()</script>  <?php
}

?>



