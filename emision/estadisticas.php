<?php
include("../segurity_session.php");
include("../conection_bd.php");
date_default_timezone_set('America/Mexico_City');
//$sql = mysqli_query($conection, "SELECT alumno, promedio FROM prbgrafica");
$sql                 = mysqli_query($conection, "SELECT COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS FROM dictamenes  WHERE CONS_DUF > 0 AND ESTADO_DUF!='CANCELADO' GROUP BY TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS");
$altoRiesgo          = 0;
$impactoSanitario    = 0;
$desarrolloEconomico = 0;
$otros = 0;
$totalG              = 0;
$totalA              = 0;
$totalN              = 0;






foreach ($sql as $fila) {
    if ($fila['IMPACTO'] == 'ALTO IMPACTO') {
        $altoRiesgo = $fila['TOTAL_TIPO_DUF'] + $altoRiesgo;

    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'IMPACTO SANITARIO')) {
        //else if ($fila['EVALUACIONES_TECNICAS '] == 'IMPACTO SANITARIO') {
        $impactoSanitario = $fila['TOTAL_TIPO_DUF'] + $impactoSanitario;

    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'DESARROLLO ECONOMICO')){
    	$desarrolloEconomico = $desarrolloEconomico + $fila['TOTAL_TIPO_DUF'];
    } else  {

       $otros = $otros + $fila['TOTAL_TIPO_DUF'];
    }
}
$totalG               = $altoRiesgo + $impactoSanitario + $desarrolloEconomico + $otros;





/*$sqlacuerdo           = mysqli_query($conection, "SELECT COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS FROM dictamenes  WHERE TIPO_DUF='ACUERDO' AND CONS_DUF > 0 GROUP BY TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS");
$altoRiesgoA          = 0;
$impactoSanitarioA    = 0;
$desarrolloEconomicoA = 0;
foreach ($sqlacuerdo as $fila) {
    if ($fila['IMPACTO'] == 'ALTO IMPACTO') {
        $altoRiesgoA = $fila['TOTAL_TIPO_DUF'] + $altoRiesgoA;
    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'IMPACTO SANITARIO')) {
        //else if ($fila['EVALUACIONES_TECNICAS '] == 'IMPACTO SANITARIO') {
        $impactoSanitarioA = $fila['TOTAL_TIPO_DUF'] + $impactoSanitarioA;
    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'DESARROLLO ECONOMICO')) {
        $desarrolloEconomicoA = $desarrolloEconomicoA + $fila['TOTAL_TIPO_DUF'];
    }
}
$totalA               = $altoRiesgoA + $impactoSanitarioA + $desarrolloEconomicoA;
$sqlnormal            = mysqli_query($conection, "SELECT COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS FROM dictamenes  WHERE TIPO_DUF='NORMAL' AND CONS_DUF > 0 GROUP BY TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS");
$altoRiesgoN          = 0;
$impactoSanitarioN    = 0;
$desarrolloEconomicoN = 0;
foreach ($sqlnormal as $fila) {
    if ($fila['IMPACTO'] == 'ALTO IMPACTO') {
        $altoRiesgoN = $fila['TOTAL_TIPO_DUF'] + $altoRiesgoN;
    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'IMPACTO SANITARIO')) {
        //else if ($fila['EVALUACIONES_TECNICAS '] == 'IMPACTO SANITARIO') {
        $impactoSanitarioN = $fila['TOTAL_TIPO_DUF'] + $impactoSanitarioN;
    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'DESARROLLO ECONOMICO')) {
        $desarrolloEconomicoN = $desarrolloEconomicoN + $fila['TOTAL_TIPO_DUF'];
    }
}
$totalN     = $altoRiesgoN + $impactoSanitarioN + $desarrolloEconomicoN;
*/
$tabla      = mysqli_query($conection, "SELECT COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, SUM(MONTO_INVERSION) AS MONTO_INVERSION_TOTAL, SUM(NO_EMPLEOS_DIRECTOS) AS EMPLEOS_DIRECTOS, SUM(NO_EMPLEOS_IND) AS EMPLEOS_INDIRECTOS FROM dictamenes  WHERE CONS_DUF > 0 AND ESTADO_DUF!='CANCELADO'  GROUP BY TIPO_DUF, IMPACTO");
$totalDUFS  = 0;
$totalMONTO = 0;
$totalED    = 0;
$totalEI    = 0;
foreach ($tabla as $fila) {
    $totalDUFS  = $totalDUFS + $fila['TOTAL_TIPO_DUF'];
    $totalMONTO = $totalMONTO + $fila['MONTO_INVERSION_TOTAL'];
    $totalED    = $totalED + $fila['EMPLEOS_DIRECTOS'];
    $totalEI    = $totalEI + $fila['EMPLEOS_INDIRECTOS'];
}

$tablaMunicipio = mysqli_query($conection, "SELECT MUNICIPIO, COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, SUM(MONTO_INVERSION) AS MONTO_INVERSION_TOTAL, SUM(NO_EMPLEOS_DIRECTOS) AS EMPLEOS_DIRECTOS, SUM(NO_EMPLEOS_IND) AS EMPLEOS_INDIRECTOS
FROM dictamenes  WHERE CONS_DUF > 0  GROUP BY TIPO_DUF, IMPACTO, MUNICIPIO");

//echo "<p>" . $altoRiesgo . "</p>";
include '../menu.php';
?>

		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">POR DUFS EMITIDOS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#menu1">POR MUNICIPIOS</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content container">
			<div id="home" class="tab-pane active container"><br>
				<h5 align="center">DUFS EMITIDOS POR LA COMISIÓN DE FACTIBLIDAD DEL ESTADO DE MÉXICO</h5>
				<div class="container" id="id_vistaGeneral">
					<br>
						<table class="table">
						<thead>
							<tr class="table-default" align="center">
								<td><p>TIPO</p></td>
								<td><p>CLASIFICACIÓN</p></td>
								<td><p>TOTAL</p></td>
								<td><p>MONTO DE INVERSIÓN</p></td>
								<td><p>EMPLEOS DIRECTOS</p></td>
								<td><p>EMPLEOS INDIRECTOS</p></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
foreach ($tabla as $fila) {?>
										<?php if ($fila['TIPO_DUF'] == 'ACUERDO') {?>
										<tr class="table-info">
											<td><p><?php echo $fila['TIPO_DUF'];?></p></td>
											<td><p><?php echo $fila['IMPACTO'];?></p></td>
											<td><p align="center"><?php echo number_format($fila['TOTAL_TIPO_DUF']); ?></p></td>
											<td><p>$<?php echo number_format($fila['MONTO_INVERSION_TOTAL'], 2, '.', ','); ?></p></td>
											<td><p align="center"><?php echo number_format($fila['EMPLEOS_DIRECTOS']); ?></p></td>
											<td><p align="center"><?php echo number_format($fila['EMPLEOS_INDIRECTOS']); ?></p></td>
										</tr>
										<?php } else {?>

										<tr class="table-danger">
											<td><p><?php if($fila['TIPO_DUF']=='NORMAL'){echo "ORDINARIO";}else{echo"ACUERDO";}?></p></td>
											<td><p><?php if ($fila['IMPACTO']=='ALTO IMPACTO') {echo "ALTO IMPACTO";} else{echo $fila['IMPACTO'];} ?></p></td>
											<td><p align="center"><?php echo number_format($fila['TOTAL_TIPO_DUF']); ?></p></td>
											<td><p>$<?php echo number_format($fila['MONTO_INVERSION_TOTAL'], 2, '.', ','); ?></p></td>
											<td><p align="center"><?php echo number_format($fila['EMPLEOS_DIRECTOS']); ?></p></td>
											<td><p align="center"><?php echo number_format($fila['EMPLEOS_INDIRECTOS']); ?></p></td>
										</tr>
									<?php }?>
								<?php }?>
							</tr>
							<tr class="table-warning">
								<td colspan="2" align="center"><h5>T O T A L</h5></td>
								<td><h6 align="center"><?php echo number_format($totalDUFS); ?></h6></td>
								<td align="center"><h6>$<?php echo number_format($totalMONTO, 2, '.', ',');?></h6></td>
								<td align="center"><h6><?php echo number_format($totalED);?></h6></td>
								<td align="center"><h6><?php echo number_format($totalEI);?></h6></td>
							</tr>
							<tr align="right">
								<td colspan="6"><h6><?php echo "Fecha de actualización: ". strftime(" %d de %B del %Y");?></h6></td>

							</tr>
						</tbody>
					</table>
				</div>
				<!-- GRAFICA -->
				<div class="row">
					    <div >
							<table class="table">
								<thead>
									<tr align="center">
										<th style="color:#F4D03F">Impacto Sanitario</th>
										<th style="color:#48C9B0 ">Comercial Automotríz</th>
										<th style="color:#FD0404">Alto riesgo</th>
										<th style="color:#34495E">Otros</th>
										<th><strong>TOTAL</strong></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $impactoSanitario ?> </td>
										<td><?php echo $desarrolloEconomico ?> </td>
										<td><?php echo $altoRiesgo ?> </td>
										<td><?php echo $otros ?> </td>
										<td><strong><?php echo $totalG ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-4">
							<div id="piechart" style="width: 1000px; height: 1000px;"></div>
						</div>

				<!-- FIN GRAFICA -->
			</div>



			<div id="menu1" class="container tab-pane fade"><br>
				<h3 align="center">ESTADÍSTICA DUFS EMITIDOS POR MUNICIPIO</h3>
				<table id="id_municipios" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Municipio</th>
							<th>Tipo DUF</th>
							<th>Impacto</th>
							<th>Total de DUFS</th>
							<th>Monto Inversión</th>
							<th>Empleos Directos</th>
							<th>Empleos Indirectos</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tablaMunicipio as $fila): ?>
							<tr style="text-align:center">
								<td> <?php echo $fila['MUNICIPIO']; ?> </td>
								<td> <?php echo $fila['TIPO_DUF']; ?> </td>
								<td> <?php echo $fila['IMPACTO']; ?> </td>
								<td> <?php echo number_format($fila['TOTAL_TIPO_DUF']); ?> </td>
								<td> $<?php echo number_format($fila['MONTO_INVERSION_TOTAL']); ?> </td>
								<td> <?php echo number_format($fila['EMPLEOS_DIRECTOS']); ?> </td>
								<td> <?php echo number_format($fila['EMPLEOS_INDIRECTOS']); ?> </td>
								<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="generaGrafica('<?php echo $fila['MUNICIPIO'] ?>')"><i class="fas fa-chart-pie"></i></button></td>
							</tr>
						<?php endforeach?>
					</tbody>
					<tfoot>
						<tr style="text-align:right;">
							<th>TOTAL</th>
							<th> </th>
							<th> </th>
							<th> </th>
							<th> </th>
							<th> </th>
							<th> </th>
						</tr>
					</tfoot>
				</table>
				<!--
				<div id="piechartMunicipio" style="width: 1000px; height: 800px;"></div>
				<div class="row">
					<div class="col-9">
						<div id="piechartMunicipio" style="width: 1000px; height: 800px;"></div>
					</div>

					<div class="col-md-3">
						<div id="tablaMunicipio"></div>
					</div>
				</div>
			-->
				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">DUFS Emitidos</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body" id="id_imprimir">


									<div  id="piechartMunicipio"></div>

								<div class="col-4">
									<div id="tablaMunicipio"></div>
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								<button type="button" class="btn btn-info" onclick="imprimirMunicipio()" value="imprimir div" title="Imprimir"><i class="fas fa-print fa-lg"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="menu2" class="container tab-pane fade"><br>
				<div class="row">
					<div class="col-md-1">
						<p>de:</p>
					</div>
					<div class="col-md-3">
						<input type="date" class="form-control datepicker" id="id_fechaInicial" name="">
					</div>
					<div class="col-md-1">
						<p>a:</p>
					</div>
					<div class="col-md-3">
						<input type="date" class="form-control datepicker" id="id_fechaFinal" name="">
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-info" onclick="muestraUsuarios()">Consultar</button>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-1">
					</div>

				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody id="id_contenido">

					</tbody>
				</table>
			</div>
		</div>
		<!--aqui termina-->
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>


	</body>
 	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 	<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
 	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		var pageTotal=0;
		$(document).ready(function() {
		    $('#id_municipios').DataTable( {
		    	dom: 'Bfrtip',
        		buttons: [
	       			{ extend: 'copyHtml5', footer: true },
					{ extend: 'excelHtml5', footer: true },
           			{ extend: 'pdfHtml5', footer: true }
        		],
		        "footerCallback": function ( row, data, start, end, display ) {
            		var api = this.api(), data;

		            // Remove the formatting to get integer data for summation
		            var intVal = function ( i ) {
		                return typeof i === 'string' ?
		                    i.replace(/[\$,]/g, '')*1 :
		                    typeof i === 'number' ?
		                        i : 0;
		            };

		            // Total over this page
		            pageTotal = api
		                .column( 3, { page: 'current'} )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		            pageTotal2 = api
		                .column( 4, { page: 'current'} )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		            pageTotal3 = api
		                .column( 5, { page: 'current'} )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		                pageTotal4 = api
		                .column( 6, { page: 'current'} )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		            // Update footer
		            $( api.column( 3 ).footer() ).html(
		                pageTotal
		            );
		            $( api.column( 4 ).footer() ).html(
		                '$'+ new Intl.NumberFormat().format(pageTotal2)
		            );
		            $( api.column( 5 ).footer() ).html(
		                pageTotal3
		            );
		            $( api.column( 6 ).footer() ).html(
		                pageTotal4
		            );
		        }
		    } );
  		} );
	</script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Alumno', 'Promedio'],
			  ['Impacto Sanitario', <?php echo $impactoSanitario; ?>],
			  ['Comercial Automotriz', <?php echo $desarrolloEconomico; ?>],
			  ['Alto Riesgo', <?php echo $altoRiesgo; ?>],
			  ['Otros', <?php echo $otros; ?>]
			]);

			var options = {
			  title: '',
			   colors: ['#F4D03F', '#48C9B0', '#FD0404', '#34495E'],
			  is3D: true
			};


			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);

		}
	</script>

	<script>
		function generaGrafica(municipio){
			//alert(municipio);
			$.ajax({
				url: 'consulta_municipio.php',
				type: 'POST',
				dataType: 'JSON',
				data: {municipio1: municipio},
			})
			.done(function(datos) {
				console.log("success");
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
					var data = google.visualization.arrayToDataTable([
					  ['Alumno', 'Promedio'],
					  ['Impacto Sanitario', datos.impactoSanitario],
					  ['Comercial Automotriz', datos.desarrolloEconomico],
					  ['Alto Riesgo', datos.altoRiesgo]
					]);

					var options = {
					  title: 'Datos Estadísticos del Municipio de '+municipio,
					   colors: ['#F1992D', '#93C00D', '#E65D77'],
					  is3D: true,
					  'width':750,
					  'height':400
					};

					var chart = new google.visualization.PieChart(document.getElementById('piechartMunicipio'));
					chart.draw(data, options);
					if(datos.desarrolloEconomico===undefined)
					{
						datos.desarrolloEconomico="0";
					}
					if (datos.impactoSanitario===undefined)
					{
						datos.impactoSanitario="0";
					}
					if (datos.altoRiesgo===undefined) {
						datos.altoRiesgo="0";
					}

					var tabla=document.getElementById("tablaMunicipio");
					tabla.innerHTML='';
					tabla.innerHTML+="<table class='table'><thead><tr><th style='color:#F1992D'>Impacto Sanitario</th><th style='color:#93C00D'>Comercial Automotríz</th><th style='color:#E65D77'>Alto riesgo</th></tr></thead><tbody><tr><td>"+datos.impactoSanitario+"</td><td>"+datos.desarrolloEconomico+"</td><td>"+datos.altoRiesgo+"</td></tr></tbody></table>";
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	</script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Galaxy', 'Distance', 'Brightness'],
          ['Canis Major Dwarf', 8000, 23.3],
          ['Sagittarius Dwarf', 24000, 4.5],
          ['Ursa Major II Dwarf', 30000, 14.3],
          ['Lg. Magellanic Cloud', 50000, 0.9],
          ['Bootes I', 60000, 13.1]
        ]);

        var materialOptions = {
          width: 900,
          height: 500,
          : 900,
          chart: {
            title: 'Nearby galaxies',
            subtitle: 'distance on the left, brightness on the right'
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'parsecs'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
        }

        drawMaterialChart();
    };
    </script>

	<script>
		function imprimirMunicipio(){
			var contenido= document.getElementById('id_imprimir').innerHTML;
			var contenidoOriginal= document.body.innerHTML;
			document.body.innerHTML = contenido;
			window.print();
			document.body.innerHTML = contenidoOriginal;
			window.location.reload();
		}
	</script>
</html>
