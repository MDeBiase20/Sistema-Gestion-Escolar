<?php
$id_config_institucion = $_GET['id'];

include('../../../app/config.php');
include('../../../admin/layout/header.php');
include('../../../app/controllers/configuraciones/institucion/datos_institucion.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Modificar datos de la institución: <?php echo $nombre_institucion;?></h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                            <form action="<?php echo APP_URL;?>/app/controllers/configuraciones/institucion/update.php" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="id_config_institucion" value="<?php echo $id_config_institucion;?>" hidden>
                                                    <input type="text" name="logo" value="<?php echo $logo;?>" hidden>
                                                    <label for="">Nombre de la institución <b>*</b></label>
                                                    <input type="text" value="<?php echo $nombre_institucion;?>" name ="nombre_institucion" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Correo de la institución</label>
                                                    <input type="email" value="<?php echo $correo;?>" name="correo" class="form-control">
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Teléfono</label>
                                                    <input type="number" value="<?php echo $telefono;?>" name="telefono" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Celular <b>*</b></label>
                                                    <input type="number" value="<?php echo $celular;?>" name="celular" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Dirección <b>*</b></label>
                                                    <input type="text" value="<?php echo $direccion;?>" name="direccion" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Logo de la institución</label>
                                                    <input type="file" id="inputImagen" name="file" accept="image/*" class="form-control" >
                                                    <br>
                                                    <center>
                                                        <img src="" id="imagenPrevisualizada" alt="Previsualización de la imagen" style="max-width: 200px";>
                                                    </center>
                                                        
                                                    
                                                </div> 
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class = "btn btn-success">Actualizar</button>
                                            <a href="<?php echo APP_URL;?>/admin/configuraciones/institucion" class = "btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div><!-- /.card-body -->
                
                </div><!-- /.card -->
            
            </div>
        </div><!-- /.row -->
        
    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
</div>
<!-- /.content-wrapper -->

<?php
include('../../../admin/layout/footer.php');
include('../../../layout/mensaje.php');
?>
<!--Este script lo que hace es previsualizar la imagen que se va a cargar a la base de datos-->
<script>
        document.getElementById('inputImagen').addEventListener('change', function() {
            previsualizarImagen(this);
        });

        function previsualizarImagen(input) {
            var imagenPrevisualizada = document.getElementById('imagenPrevisualizada');
            
            var archivo = input.files[0];
            if (archivo) {
                var lector = new FileReader();

                lector.onload = function(e) {
                    imagenPrevisualizada.src = e.target.result;
                };

                lector.readAsDataURL(archivo);
            }
        }
    </script>