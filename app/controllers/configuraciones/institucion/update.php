<?php
include('../../../../app/config.php');

$logo = $_POST['logo'];
$nombre_institucion = $_POST['nombre_institucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$id_config_institucion = $_POST['id_config_institucion'];

if($_FILES['file']['name'] != null){
    //echo "Existe una imagen";
    //Le cambiamos el nombre de la imagen para que no pueda ser reemplazado
    $nombre_del_archivo = date('Y-m-d-H-i-s').$_FILES['file']['name'];

    //ubicación donde se va a guardar la imagen
    $location = "../../../../public/images/configuracion".$nombre_del_archivo;

    //Instrucción que me permite subir el archivo
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $logo = $nombre_del_archivo;

}else{
    //echo "No existe imagen";
    if($logo == ""){
        $logo = "";
    }else{
        $logo = $_POST['logo'];
    }
}

$sentencia = $pdo->prepare('UPDATE configuracion_instituciones
                    SET nombre_institucion=:nombre_institucion,
                        logo=:logo,
                        direccion=:direccion,
                        telefono=:telefono,
                        celular=:celular,
                        correo=:correo,
                        fyh_actualizacion=:fyh_actualizacion
                        
                    WHERE id_config_institucion=:id_config_institucion');

$sentencia->bindParam(':nombre_institucion',$nombre_institucion);
$sentencia->bindParam(':logo',$logo);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam(':fyh_actualizacion',$fecha_hora);
$sentencia->bindParam(':id_config_institucion',$id_config_institucion);

if($sentencia->execute()){
echo 'success';
            session_start();
            $_SESSION['mensaje'] = 'se actualizó los datos de configuración correctamente a la base de datos';
            $_SESSION['icono'] = 'success';
            header('Location:'.APP_URL."/admin/configuraciones/institucion");
}else{
    session_start();
    $_SESSION['mensaje'] = 'No se pudo actualizar en la base de datos';
    $_SESSION['icono'] = 'error';
    ?> <script>windows.history.back()</script>  <?php
}

?>