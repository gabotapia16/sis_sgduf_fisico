<?php
include("../segurity_session.php");
include("../conection_bd.php");
//$sql = mysqli_query($conection, "SELECT alumno, promedio FROM prbgrafica");
$sql                 = mysqli_query($conection, "SELECT COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS FROM dictamenes  WHERE CONS_DUF > 0 GROUP BY TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS");
$altoRiesgo          = 0;
$impactoSanitario    = 0;
$desarrolloEconomico = 0;
$totalG              = 0;
$totalA              = 0;
$totalN              = 0;
foreach ($sql as $fila) {
    if ($fila['IMPACTO'] == 'ALTO IMPACTO') {
        $altoRiesgo = $fila['TOTAL_TIPO_DUF'] + $altoRiesgo;

    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'IMPACTO SANITARIO')) {
        //else if ($fila['EVALUACIONES_TECNICAS '] == 'IMPACTO SANITARIO') {
        $impactoSanitario = $fila['TOTAL_TIPO_DUF'] + $impactoSanitario;

    } else  {
        $desarrolloEconomico = $desarrolloEconomico + $fila['TOTAL_TIPO_DUF'];
        //echo $fila['EVALUACIONES_TECNICAS'].' '.$fila['TOTAL_TIPO_DUF'].'<br>';
    }
}
$totalG               = $altoRiesgo + $impactoSanitario + $desarrolloEconomico;
$sqlacuerdo           = mysqli_query($conection, "SELECT COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS FROM dictamenes  WHERE TIPO_DUF='ACUERDO' AND CONS_DUF > 0 GROUP BY TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS");
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
$impactoSanitarioN    = 1;
$desarrolloEconomicoN = 0;
foreach ($sqlnormal as $fila) {
    if (stristr($fila['IMPACTO'], 'ALTO IMPACTO')) {
        $altoRiesgoN = $fila['TOTAL_TIPO_DUF'] + $altoRiesgoN;

    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'IMPACTO SANITARIO')) {
        //else if ($fila['EVALUACIONES_TECNICAS '] == 'IMPACTO SANITARIO') {
        $impactoSanitarioN = $fila['TOTAL_TIPO_DUF'] + $impactoSanitarioN;
        
    } else if (stristr($fila['EVALUACIONES_TECNICAS'], 'DESARROLLO ECONOMICO')) {
        $desarrolloEconomicoN = $desarrolloEconomicoN + $fila['TOTAL_TIPO_DUF'];
    }
}
$totalN     = $altoRiesgoN + $impactoSanitarioN + $desarrolloEconomicoN;
$tabla      = mysqli_query($conection, "SELECT COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, SUM(MONTO_INVERSION) AS MONTO_INVERSION_TOTAL, SUM(NO_EMPLEOS_DIRECTOS) AS EMPLEOS_DIRECTOS, SUM(NO_EMPLEOS_IND) AS EMPLEOS_INDIRECTOS FROM dictamenes  WHERE CONS_DUF > 0  GROUP BY TIPO_DUF, IMPACTO");
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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Estadísticas</title>
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

		 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
		 <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
		<!--Fontawsemo-->
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	</head>
	<body>
		<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <img alt="Brand" src="../imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="../menu_emision_admin">Menu principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">Estadística General</a>
			</li>
			
		</ul>

		<!-- Tab panes -->
		<div class="tab-content container-fluid">
			<div id="home" class="tab-pane active container-fluid"><br>
				<h3>Estadística General</h3>
				<div class="container" id="id_vistaGeneral">


					
					<br>
					<h6>Los datos mostrados a continuación se generan automáticamente en base a la captura realizada por el departamento de Emisión de la COFAEM.</h6>

					<table class="table">
						<caption>ESTADÍSTICAS DUFS EMITIDOS POR LA COMISIÓN DE FACTIBILIDAD DEL ESTADO DE MÉXICO

						</caption>
						<thead>
							<tr>
								<th>TIPO DE DUF</th>
								<th> IMPACTO</th>
								<th> NO. DE DUFS EMITIDOS</th>
								<th>MONTO DE INVERSIÓN</th>
								<th>NO. DE EMPLEOS DIRECTOS</th>
								<th>NO. DE EMPLEOS INDIRECTOS</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
foreach ($tabla as $fila) {?>
										<?php if ($fila['TIPO_DUF'] == 'ACUERDO') {?>


										<tr class="table-success">
											<td><?php echo $fila['TIPO_DUF']; ?></td>
											<td><?php echo $fila['IMPACTO']; ?></td>
											<td><?php echo number_format($fila['TOTAL_TIPO_DUF']); ?></td>
											<td>$<?php echo number_format($fila['MONTO_INVERSION_TOTAL'], 2, '.', ','); ?></td>
											<td><?php echo number_format($fila['EMPLEOS_DIRECTOS']); ?></td>
											<td><?php echo number_format($fila['EMPLEOS_INDIRECTOS']); ?></td>
										</tr>
										<?php } else {?>

										<tr class="table-warning">
											<td><?php echo $fila['TIPO_DUF']; ?></td>
											<td><?php if ($fila['IMPACTO']=='ALTO IMPACTO') {
												echo "ALTO RIESGO";
											} else{echo $fila['IMPACTO'];} ?></td>
											<td><?php echo number_format($fila['TOTAL_TIPO_DUF']); ?></td>
											<td>$<?php echo number_format($fila['MONTO_INVERSION_TOTAL'], 2, '.', ','); ?></td>
											<td><?php echo number_format($fila['EMPLEOS_DIRECTOS']); ?></td>
											<td><?php echo number_format($fila['EMPLEOS_INDIRECTOS']); ?></td>
										</tr>
									<?php }?>
								<?php }?>
							</tr>
							<tr class="table-primary">
								<td colspan="2">TOTAL</td>
								<td> <?php echo number_format($totalDUFS); ?> </td>
								<td> $<?php echo number_format($totalMONTO, 2, '.', ','); ?> </td>
								<td> <?php echo number_format($totalED); ?> </td>
								<td> <?php echo number_format($totalEI); ?> </td>
							</tr>
						</tbody>
					</table>

					<div class="row">
						<div class="col-8">
							<div id="piechart" style="width: 1000px; height: 700px;"></div>
						</div>

						<div class="col-md-4">
							<table class="table">
								<thead>
									<tr>
										<th style="color:#F1992D">Impacto Sanitario</th>
										<th style="color:#93C00D">Comercial Automotríz</th>
										<th style="color:#E65D77">Alto riesgo</th>
										<th><strong>TOTAL</strong></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $impactoSanitario ?> </td>
										<td><?php echo $desarrolloEconomico ?> </td>
										<td><?php echo $altoRiesgo ?> </td>
										<td><strong><?php echo $totalG ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="row">
						<div class="col-8">
							<div id="piechartAcuerdo" style="width: 1000px; height: 700px;"></div>
						</div>

						<div class="col-md-4">
							<table class="table">
								<thead>
									<tr>
										<th style="color:#F1992D">Impacto Sanitario</th>
										<th style="color:#93C00D">Comercial Automotríz</th>
										<th style="color:#E65D77">Alto riesgo</th>
										<th><strong>TOTAL</strong></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $impactoSanitarioA ?> </td>
										<td><?php echo $desarrolloEconomicoA ?> </td>
										<td><?php echo $altoRiesgoA ?> </td>
										<td><strong><?php echo $totalA ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
					<div class="row">
						<div class="col-8">
							<div id="piechartNormal" style="width: 1000px; height: 700px;"></div>
						</div>

						<div class="col-md-4">
							<table class="table">
								<thead>
									<tr>
										<th style="color:#F1992D">Impacto Sanitario</th>
										<th style="color:#93C00D">Comercial Automotríz</th>
										<th style="color:#E65D77">Alto riesgo</th>
										<th><strong>TOTAL</strong></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $impactoSanitarioN ?> </td>
										<td><?php echo $desarrolloEconomicoN ?> </td>
										<td><?php echo $altoRiesgoN ?> </td>
										<td><strong><?php echo $totalN ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="menu1" class="container tab-pane fade"><br>
				<h3>Estadística por Municipios</h3>
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
			  ['Alto Riesgo', <?php echo $altoRiesgo; ?>]
			]);

			var dataAcuerdo = google.visualization.arrayToDataTable([
			  ['Alumno', 'Promedio'],
			  ['Impacto Sanitario', <?php echo $impactoSanitarioA; ?>],
			  ['Comercial Automotriz', <?php echo $desarrolloEconomicoA; ?>],
			  ['Alto Riesgo', <?php echo $altoRiesgoA; ?>]
			]);

			var dataNormal = google.visualization.arrayToDataTable([
			  ['Alumno', 'Promedio'],
			  ['Impacto Sanitario', <?php echo $impactoSanitarioN; ?>],
			  ['Comercial Automotriz', <?php echo $desarrolloEconomicoN; ?>],
			  ['Alto Riesgo', <?php echo $altoRiesgoN; ?>]
			]);

			var options = {
			  title: 'GRÁFICA GENERAL DE DUFS EMITIDOS POR \n LA COMISIÓN DE FACTIBILIDAD DEL ESTADO DE MÉXICO',
			   colors: ['#F1992D', '#93C00D', '#E65D77'],
			  is3D: true
			};
			var optionsA = {
			  title: 'GRÁFICA DE DUFS EMITIDOS POR ACUERDO',
			   colors: ['#F1992D', '#93C00D', '#E65D77'],
			  is3D: true
			};
			var optionsN = {
			  title: 'GRÁFICA DE DUFS EMITIDOS POR TRÁMITE ORDINARIO',
			   colors: ['#F1992D', '#93C00D', '#E65D77'],
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);
			var chart2 = new google.visualization.PieChart(document.getElementById('piechartAcuerdo'));
			chart2.draw(dataAcuerdo, optionsA);
			var chart3 = new google.visualization.PieChart(document.getElementById('piechartNormal'));
			chart3.draw(dataNormal, optionsN);
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
