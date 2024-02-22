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
            <h1>Institución: <?php echo $nombre_institucion;?></h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos registrados</h3>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nombre de la institución</label>
                                                    <p><?php echo $nombre_institucion;?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Correo de la institución</label>
                                                    <p><?php echo $correo;?></p>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Teléfono</label>
                                                    <p><?php echo $telefono;?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Celular</label>
                                                    <p><?php echo $celular;?></p>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Dirección</label>
                                                    <p><?php echo $direccion;?></p>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Logo de la institución</label>
                                                    <br>
                                                    <center>
                                                        <img src="<?php echo APP_URL."/public/images/configuracion/".$logo;?>" width="100px" alt="">
                                                    </center>
                                                        
                                                    
                                                </div> 
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?php echo APP_URL;?>/admin/configuraciones/institucion" class = "btn btn-secondary">Volver</a>
                                        </div>
                                    </div>
                                </div>

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