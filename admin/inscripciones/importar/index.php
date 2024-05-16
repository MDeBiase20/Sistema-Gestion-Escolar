<?php
include('../../../app/config.php');
include('../../../admin/layout/header.php');

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Importar estudiantes</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos de los estudiantes</h3>

                        <div class="card-tools">
                            <a href="IMPORTAR_ESTUDIANTES.xls" class = "btn btn-success"><i class="bi bi-cloud-download-fill"></i> Descargar plantilla</a>
                        </div><!-- /.card-tools -->
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <input type="file" accept=".xls, .xlsx" name="" id="excelFile" class="form-control">
                            <br><br>

                            <div class="table table-responsive">
                                <table id="excelTable" class="table table-bordered table-sm table-info"></table>
                            </div>

                            <br><br>

                            <button id="btn-lectura" class="btn btn-info">Registrar estudiantes</button>
                            <a href="" class="btn btn-default">Cancelar</a>
                            <p id="respuesta">

                            </p>

                            <p id="contador">

                            </p>
                        </div><!-- /.card-body -->
                
                </div>

            </div>
        </div><!-- /.row -->
        
    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
</div>
<!-- /.content-wrapper -->

<!-- Funcionalidad para que los datos que se encuentran en Excel se ingresen a la base de datos -->
<script>
    $('#btn-lectura').click(function (){
        valores = new Array()
        var contador = 0
        $('#excelTable tr').each(function (){
            var d1 = $(this).find('td').eq(0).html();
            var d2 = $(this).find('td').eq(1).html();
            var d3 = $(this).find('td').eq(2).html();
            var d4 = $(this).find('td').eq(3).html();
            var d5 = $(this).find('td').eq(4).html();
            var d6 = $(this).find('td').eq(5).html();
            var d7 = $(this).find('td').eq(6).html();
            var d8 = $(this).find('td').eq(7).html();
            var d9 = $(this).find('td').eq(8).html();
            var d10 = $(this).find('td').eq(9).html();
            var d11 = $(this).find('td').eq(10).html();
            var d12 = $(this).find('td').eq(11).html();
            var d13 = $(this).find('td').eq(12).html();
            var d14 = $(this).find('td').eq(13).html();
            var d15 = $(this).find('td').eq(14).html();
            var d16 = $(this).find('td').eq(15).html();
            var d17 = $(this).find('td').eq(16).html();
            var d18 = $(this).find('td').eq(17).html();

            valor = new Array(d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13, d14, d15, d16, d17, d18)
            valores.push(valor)
            //console.log(valor)
            //alert(valor)

            $.post('../../../admin/inscripciones/importar/insertar.php', {d1:d1, d2:d2, d3:d3, d4:d4, d5:d5, d6:d6, d7:d7, d8:d8, d9:d9, d10:d10, d11:d11, d12:d12, d13:d13, d14:d14, d15:d15, d16:d16, d17:d17, d18:d18}, function (datos){
                $('#respuesta').html(datos)
                    contador++
                $('#contador').html("Se registró "+contador+" registros correctamente.")
            })
            
        })
        //alert("Se tocó el botón")
    })
</script>

<?php
include('../../../admin/layout/footer.php');
include('../../../layout/mensaje.php');
?>
<!-- SCRIPT PARA MOSTRAR LO QUE SE ENCUENTRA DENTRO DEL EXCEL EN UNA TABLA HTML--->
<script>
        document.getElementById("excelFile").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: "array" });

                    const firstSheet = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[firstSheet];

                    const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
                    displayExcelData(jsonData);
                };
                reader.readAsArrayBuffer(file);
            }
        });

        function displayExcelData(data) {
            const table = document.getElementById("excelTable");
            table.innerHTML = ""; // Clear previous data

            data.forEach((row) => {
                const tr = document.createElement("tr");
                row.forEach((cell) => {
                    const td = document.createElement("td");
                    td.textContent = cell;
                    tr.appendChild(td);
                });
                table.appendChild(tr);
            });
        }
    </script>
