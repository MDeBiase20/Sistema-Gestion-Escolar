<?php

$id_estudiante = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');

include('../../app/controllers/roles/listado_roles.php');
include('../../app/controllers/niveles/listado_niveles.php');
include('../../app/controllers/grados/listado_de_grados.php');
include('../../app/controllers/estudiantes/datos_estudiantes.php');

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Modificación de datos del estudiante: <?php echo $nombres." ".$apellido; ?></h1>
            </div>
            <br>

            <form action="<?php echo APP_URL;?>/app/controllers/estudiantes/update.php" method="post">
                        <!-- DATOS PERSONALES-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-success">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Llene los datos del estudiante</b></h3>

                                    </div><!-- /.card-header -->
                            
                                        <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Nombre del Rol </label>
                                                    <input type="text" value = "<?php echo $id_usuario;?>" name = "id_usuario" hidden>
                                                    <input type="text" value = "<?php echo $id_persona;?>" name = "id_persona" hidden>
                                                    <input type="text" value = "<?php echo $id_estudiante;?>" name = "id_estudiante" hidden>
                                                    <input type="text" value = "<?php echo $id_ppffs;?>" name = "id_ppffs" hidden>
                                                    <a href="<?php echo APP_URL;?>/admin/roles/create.php" style = "margin-left:5px" class = "btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i></a>
                                                    <div class="form-inline">
                                                        
                                                        <select name="rol_id" id="" class = "form-control">
                                                        <?php
                                                            foreach($roles as $rol){ ?>
                                                            <option value="<?php echo $rol['id_rol'];?>" <?php echo $rol['nombre_rol'] == "ESTUDIANTES"  ? 'selected': '' ?> ><?php echo $rol['nombre_rol'];?></option>
                                                        <?php    
                                                        }
                                                        ?>
                                                        </select>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Nombres</label>

                                                    <input type="text" value = "<?php echo $nombres;?>" name = "nombres" class = "form-control"   required>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Apellido</label>

                                                    <input type="text" value = "<?php echo $apellido;?>" name = "apellidos" class = "form-control"   required>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Carnet de idéntidad </label>

                                                    <input type="number" value = "<?php echo $ci;?>" name = "ci" class = "form-control"   required>
                                                    
                                                </div>
                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Fecha de nacimiento </label>

                                                    <input type="date" value = "<?php echo $fecha_nacimiento;?>" name = "fecha_nacimiento" class = "form-control"   required>
                                                    
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Celular </label>

                                                    <input type="number" value = "<?php echo $celular;?>" name = "celular" class = "form-control"   required>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Correo electrónico </label>

                                                    <input type="email" value = "<?php echo $email;?>" name = "email" class = "form-control"   required>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Dirección </label>

                                                    <input type="address" value = "<?php echo $direccion;?>" name = "direccion" class = "form-control" required>
                                                    
                                                </div>
                                            </div>

                                        </div>

                                </div><!-- /.card-body -->
                        
                        </div><!-- /.card -->
                    
                        </div>
                        </div><!-- /.row -->

                    <!-- DATOS DE LOS ESTUDIANTES-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-success">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Llene los datos académicos</b></h3>

                                    </div><!-- /.card-header -->
                            
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                        <label for="">Nivel </label>
                                                
                                                        <select name="nivel_id" id="" class = "form-control">
                                                            <?php
                                                                foreach($niveles as $nivel){ ?>
                                                                <option value="<?php echo $nivel['id_nivel'];?>" <?php echo $nivel['id_nivel'] == $nivel_id  ? 'selected': '' ?> ><?php echo $nivel['nivel']." - ".$nivel['turno'];?></option>
                                                            <?php    
                                                                }
                                                                ?>
                                                        </select>
                                            
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Grado</label>

                                                        <select name="grado_id" id="" class = "form-control">
                                                            <?php
                                                                foreach($grados as $grado){ ?>
                                                                <option value="<?php echo $grado['id_grado'];?>" <?php echo $grado['id_grado'] == $grado_id  ? 'selected': '' ?> ><?php echo $grado['curso']." | paralelo ".$grado['paralelo'];?></option>
                                                            <?php    
                                                                }
                                                                ?>
                                                        </select>
                                            
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Rude</label>

                                                    <input type="text" value = "<?php echo $rude;?>" name = "rude" class = "form-control"   required>
                                            
                                                </div>
                                            </div>


                                        </div>

                                    </div><!-- /.card-body -->
                        
                                </div><!-- /.card -->
                    
                            </div>
                        </div>

                    <!-- DATOS DE LOS PADRES DE FAMILIA-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-success">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Llene los datos del padre familia</b></h3>

                                    </div><!-- /.card-header -->
                            
                                    <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Carnet de identidad</label>

                                                <input type="number" value = "<?php echo $ci_ppff;?>" name = "ci_ppff" class = "form-control"   required>
                                            
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellido y Nombre</label>

                                            <input type="text" value = "<?php echo $nombres_apellidos_ppff;?>" name = "nombres_apellidos_ppff" class = "form-control"   required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>

                                            <input type="number" value = "<?php echo $celular_ppff;?>"  name = "celular_ppff" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>

                                            <input type="text" value = "<?php echo $ocupacion_ppff;?>" name = "ocupacion_ppff" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos y nombres de referencia</label>

                                            <input type="text" value = "<?php echo $ref_nombre;?>" name = "ref_nombre" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Parentezco</label>

                                            <input type="text" value = "<?php echo $ref_parentezco;?>" name = "ref_parentezco" class = "form-control"   required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Celular de referencia</label>

                                            <input type="number" value = "<?php echo $ref_celular;?>" name = "ref_celular" class = "form-control"   required>
                                            
                                        </div>
                                    </div>


                                </div>

                                    </div><!-- /.card-body -->
                        
                                </div><!-- /.card -->
                    
                            </div>
                        </div>

                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class = "btn btn-success btn-lg">Actualizar</button>
                                            <a href="<?php echo APP_URL;?>/admin/estudiantes" class = "btn btn-secondary btn-lg">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
            </form>

        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
</div>
<!-- /.content-wrapper -->

<?php
include('../../admin/layout/footer.php');
include('../../layout/mensaje.php');
?>