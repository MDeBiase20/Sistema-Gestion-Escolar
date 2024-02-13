<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/roles/listado_roles.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Listado de Roles</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Roles registrados</h3>

                        <div class="card-tools">
                            <a href="create.php" class = "btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo rol</a>
                        </div><!-- /.card-tools -->
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Nombre del Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $contador_rol = 0;
                                        foreach($roles as $rol){
                                            $id_rol = $rol['id_rol'];
                                            $contador_rol++; ?>
                                        <tr>
                                            <td style = "text-align:center"><?php echo $contador_rol;?></td>
                                            <td><?php echo $rol['nombre_rol'];?></td>
                                            <td style = "text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <button type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                                </div>
                                            </td>
                                        </tr>    
                                    <?php        
                                        }
                                    ?>
                                </tbody>

                            </table>
                        </div><!-- /.card-body -->
                
                </div><!-- /.card -->
            
        </div>
        </div><!-- /.row -->
        
    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
</div>
<!-- /.content-wrapper -->

<?php
include('../../admin/layout/footer.php');
include('../../layout/mensaje.php');
?>