<?php

$id_estudiante = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/estudiantes/datos_estudiantes.php');
include('../../app/controllers/pagos/datos_pagos_estudiantes.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>PAGO DE CUOTAS</h1><br>
        </div>

        <div class="row">
            <h3>
                <b>Estudiante: </b><?php echo $nombres." ".$apellido;?><br>
                <b>Carnet de identidad: </b><?php echo $ci;?>
            </h3>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pagos registrados</h3>

                        <div style="text-align:right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="bi bi-cash"></i> Registrar pago
                            </button>
                        </div>

                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm table-hover table-info">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Nro</th>
                                        <th style="text-align:center">Mes cancelado</th>
                                        <th style="text-align:center">Monto</th>
                                        <th style="text-align:center">Fecha de pago</th>
                                        <th style="text-align:center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $contador_pagos = 0;
                                    foreach($pagos as $pago){
                                        $contador_pagos++;
                                         //esto va a servir para las ventanas modales de editar y eliminar
                                        $estudiante_id = $pago['estudiante_id'];
                                        $id_pago = $pago['id_pago'];?>
                                        
                                    <tr>
                                        <td style="text-align:center"><?php echo $contador_pagos;?></td>
                                        <td style="text-align:center"><?php echo $pago['mes_pagado'];?></td>
                                        <td style="text-align:center">$ <?php echo $pago['monto_pagado'];?></td>
                                        <td style="text-align:center"><?php echo $pago['fecha_pago'];?></td>
                                        <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a type="button" data-toggle="modal" data-target="#Modal_editar<?php echo $id_pago;?>" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="Modal_editar<?php echo $id_pago;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #68bb11 ">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar pago</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo APP_URL;?>/app/controllers/pagos/update.php" method = "POST">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Estudiante</label>
                                                                                        <input type="text" name="estudiante_id" value = "<?php echo $id_estudiante;?>" hidden>
                                                                                        <input type="text" name="id_pago" value = "<?php echo $id_pago;?>" hidden>
                                                                                        <input type="text" value ="<?php echo $nombres." ".$apellido;?>" class="form form-control" disabled>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="">Carnet de identidad</label>
                                                                                        <input type="text" value ="<?php echo $ci;?>" class="form form-control" disabled>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="">Mes pagado</label>
                                                                                        <select name="mes_pagado" id="" class="form-control">
                                                                                            <option value="ENERO" <?php echo $pago['mes_pagado']== "ENERO" ? 'selected' : '' ?>>ENERO</option>
                                                                                            <option value="FEBRERO" <?php echo $pago['mes_pagado']== "FEBRERO" ? 'selected' : '' ?>>FEBRERO</option>
                                                                                            <option value="MARZO" <?php echo $pago['mes_pagado'] == "MARZO" ? 'selected' : '' ?>>MARZO</option>
                                                                                            <option value="ABRIL" <?php echo $pago['mes_pagado']== "ABRIL" ? 'selected' : '' ?>>ABRIL</option>
                                                                                            <option value="MAYO" <?php echo $pago['mes_pagado']== "MAYO" ? 'selected' : '' ?>>MAYO</option>
                                                                                            <option value="JUNIO" <?php echo $pago['mes_pagado']== "JUNIO" ? 'selected' : '' ?>>JUNIO</option>
                                                                                            <option value="JULIO" <?php echo $pago['mes_pagado']== "JULIO" ? 'selected' : '' ?>>JULIO</option>
                                                                                            <option value="AGOSTO" <?php echo $pago['mes_pagado']== "AGOSTO" ? 'selected' : '' ?>>AGOSTO</option>
                                                                                            <option value="SEPTIEMBRE" <?php echo $pago['mes_pagado']== "SEPTIEMBRE" ? 'selected' : '' ?>>SEPTIEMBRE</option>
                                                                                            <option value="OCTUBRE" <?php echo $pago['mes_pagado']== "OCTUBRE" ? 'selected' : '' ?>>OCTUBRE</option>
                                                                                            <option value="NOVIEMBRE" <?php echo $pago['mes_pagado']== "NOVIEMBRE" ? 'selected' : '' ?>>NOVIEMBRE</option>
                                                                                            <option value="DICIEMBRE" <?php echo $pago['mes_pagado']== "DICIEMBRE" ? 'selected' : '' ?>>DICIEMBRE</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="">Monto a pagar</label>
                                                                                        <input type="number" name="monto_pagado" class="form-control" value = "<?php echo $pago['monto_pagado']; ?>">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="">Fecha de pago</label>
                                                                                        <input type="date" name="fecha_pago" class="form-control" value = "<?php echo $pago['fecha_pago']; ?>">
                                                                                    </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                                                                    </div>
                                                                        </form>  
    </div>
  </div>
</div>
                                                    
                                                    <a href="comprobante_pago.php?id=<?php echo $id_pago;?> && id_estudiante=<?php echo $estudiante_id;?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>
                                                    <form action="<?php echo APP_URL;?>/app/controllers/pagos/delete.php" onclick="preguntar<?php echo $id_pago;?>(event)" method="post" id="miFormulario<?php echo $id_pago;?>">
                                                        <input type="text" name="id_pago" value="<?php echo $id_pago;?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                                    
                                                    <script>
                                                        function preguntar<?php echo $id_pago;?>(event){
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
                                                                    var form = $('#miFormulario<?php echo $id_pago;?>')
                                                                    form.submit()
                                                                }
                                                            })
                                                        }
                                                    </script>

                                                </div>
                                            </td>
                                    </tr>

                                    <?php
                                    }?>
                                    
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #55a5bf ">
        <h5 class="modal-title" id="exampleModalLabel">Registrar pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <form action="<?php echo APP_URL;?>/app/controllers/pagos/create.php" method = "POST">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Estudiante</label>
                        <input type="text" name="estudiante_id" value = "<?php echo $id_estudiante;?>" hidden>
                        <input type="text" value ="<?php echo $nombres." ".$apellido;?>" class="form form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Carnet de identidad</label>
                        <input type="text" value ="<?php echo $ci;?>" class="form form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Mes pagado</label>
                        <select name="mes_pagado" id="" class="form-control">
                            <option value="ENERO">ENERO</option>
                            <option value="FEBRERO">FEBRERO</option>
                            <option value="MARZO">MARZO</option>
                            <option value="ABRIL">ABRIL</option>
                            <option value="MAYO">MAYO</option>
                            <option value="JUNIO">JUNIO</option>
                            <option value="JULIO">JULIO</option>
                            <option value="AGOSTO">AGOSTO</option>
                            <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                            <option value="OCTUBRE">OCTUBRE</option>
                            <option value="NOVIEMBRE">NOVIEMBRE</option>
                            <option value="DICIEMBRE">DICIEMBRE</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Monto a pagar</label>
                        <input type="number" name="monto_pagado" class="form-control" value = "0">
                    </div>

                    <div class="form-group">
                        <label for="">Fecha de pago</label>
                        <input type="date" name="fecha_pago" class="form-control">
                    </div>

                </div>
            </div>
    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>  
    </div>
  </div>
</div>
