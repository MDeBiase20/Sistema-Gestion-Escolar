<?php
include('../../../app/config.php');

$id_rol = $_GET['rol_id'];
$permiso_id = $_GET['permiso_id'];

$sentencia = $pdo->prepare("INSERT INTO roles_permisos
(rol_id, permiso_id, fyh_creacion, estado)
VALUES(:rol_id, :permiso_id, :fyh_creacion, :estado)");

$sentencia->bindParam(':rol_id', $id_rol);
$sentencia->bindParam(':permiso_id', $permiso_id);
$sentencia->bindParam(':fyh_creacion', $fecha_hora);
$sentencia->bindParam(':estado', $estado_registro);

$sentencia->execute();
?>

<table class="table table-bordered table-sm table-striped table-hover" id="tabla_res<?php echo $id_rol;?>">
<tr>
    <th style = "text-align: center">Nro</th>
    <th style = "text-align: center">Rol</th>
    <th style = "text-align: center">Permiso</th>
    <th style = "text-align: center">Acción</th>
</tr>
<?php
    $contador_rol_permiso = 0;
    $sql_roles_permisos = "SELECT * FROM roles_permisos AS rolper
    INNER JOIN permisos AS per ON per.id_permiso = rolper.permiso_id
    INNER JOIN roles AS rol ON rol.id_rol = rolper.rol_id
    WHERE rolper.estado = '1' ORDER BY per.nombre_url ASC";

$query_roles_permisos = $pdo->prepare($sql_roles_permisos);
$query_roles_permisos->execute();

$roles_permisos = $query_roles_permisos->fetchAll(PDO::FETCH_ASSOC);
    foreach($roles_permisos as $role_permiso){
        if($id_rol == $role_permiso['rol_id']){
            $contador_rol_permiso++;
            $id_rol_permiso = $role_permiso['id_roles_permiso'];?>

<tr>
    <td><?php echo $contador_rol_permiso; ?></td>
    <td><?php echo $role_permiso['nombre_rol']; ?></td>
    <td><?php echo $role_permiso['nombre_url']; ?></td>
    <td>
        <form action="<?php echo APP_URL;?>/app/controllers/roles/delete_rol_permiso.php" onclick="preguntar<?php echo $id_rol_permiso;?>(event)" method="post" id="miFormulario<?php echo $id_rol_permiso;?>">
            <input type="text" name="id_rol_permiso" value="<?php echo $id_rol_permiso;?>" hidden>
            <button type="submit" class="btn btn-danger btn-sm" ><i class="bi bi-trash3"></i></button>
        </form>
                    <script>
            function preguntar<?php echo $id_rol_permiso;?>(event){
                event.preventDefault()
                Swal.fire({
                    title: 'Eliminar Registro',
                    text:  '¿Desea eliminar este registro?',
                    icon:  'question',
                    showDenyButton: true,
                    confirmButtonText: 'Eliminar',
                    confirmButtonColor: '#a5161d',
                    denyButtonColor: '#270a0a',
                    denyButtonText: 'Cancelar',
                }).then ((result) =>{
                    if(result.isConfirmed){
                        var form = $('#miFormulario<?php echo $id_rol_permiso;?>')
                        form.submit()
                    }
                })
            }
        </script>
    </td>
</tr>
    <?php
    }
                    
    } 
    ?>
</table>
