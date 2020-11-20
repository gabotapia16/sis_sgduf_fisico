<?php
include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';
$tabla_general                 = mysqli_query($conection, "SELECT COUNT(no_expediente) AS total, SUM(no_emplos_dir) AS empleos_directos, SUM(no_emplos_ind) AS empleos_indirectos ,  SUM(monto_inversion) as monto, tipo_nomeda FROM datos_generales WHERE tipo_DUF != 'ACUERDO' GROUP BY tipo_nomeda");



$pesoUSD=0;
$pesoEUR=0;
$pesoMXN=0;
$conteoUSD=0;
$empDUSD=0;
$empIUSD=0;
$conteoEUR=0;
$empDEUR=0;
$empIEUR=0;
$conteoMXN=0;
$empDMXN=0;
$empIMXN=0;

//PARA LA TABLA GENERAL CON TOTALES
foreach ($tabla_general as $fila) {
	if ($fila['tipo_nomeda']=='USD') {
		$pesoUSD=$fila['monto']*19.37;
		$conteoUSD=$fila['total'];
		$empDUSD=$fila['empleos_directos'];
		$empIUSD=$fila['empleos_indirectos'];
	}
	else if ($fila['tipo_nomeda']=='EUR') {
		$pesoEUR=$fila['monto']*21.34;
		$conteoEUR=$fila['total'];
		$empDEUR=$fila['empleos_directos'];
		$empIEUR=$fila['empleos_indirectos'];
	}
	else{
		$pesoMXN=$fila['monto'];
		$conteoMXN=$fila['total'];
		$empDMXN=$fila['empleos_directos'];
		$empIMXN=$fila['empleos_indirectos'];
	}

	$totalMXN=$pesoMXN+$pesoUSD+$pesoEUR;//TOTAL DE TODO CONVERTIDO A PESOS
	$conteo=$conteoUSD+$conteoEUR+$conteoMXN;
	$empleosDir=$empDMXN+$empDUSD+$empDEUR;
	$empleosInd=$empIEUR+$empIUSD+$empIMXN;
}

$impactoSanitario=0;
$comercialAutomotriz=0;
$hidrocarburos=0;
$mina=0;
$otros=0;

$graficaMateria                 = mysqli_query($conection, "SELECT COUNT(no_expediente) AS total, materia FROM datos_generales WHERE tipo_DUF != 'ACUERDO' GROUP BY materia");
foreach ($graficaMateria as $fila) {
	if ($fila['materia']=='IMPACTO SANITARIO') {
		$impactoSanitario= $fila['total'];
	}else if ($fila['materia']=='COMERCIAL AUTOMOTRIZ') {
		$comercialAutomotriz= $fila['total'];
	}else if ($fila['materia']=='HIDROCARBUROS') {
		$hidrocarburos= $fila['total'];
	}else if ($fila['materia']=='MINA') {
		$mina= $fila['total'];
	}else{
		$otros=$otros+$fila['total'];
	}
}
$totalG=$impactoSanitario+$comercialAutomotriz+$hidrocarburos+$mina+$otros;

$tablaMunicipio                 = mysqli_query($conection, "SELECT municipio_proyecto, COUNT(no_expediente) AS total, SUM(no_emplos_dir) as empleos_directos, SUM(no_emplos_ind) as empleos_indirectos, SUM(monto_inversion) AS monto, tipo_nomeda FROM datos_generales WHERE tipo_DUF != 'ACUERDO' GROUP BY municipio_proyecto, tipo_nomeda");

$graficaPrevencion                = mysqli_query($conection, "SELECT COUNT(id_datos_generales) as total, estado_prevencion FROM procedencia_integracion GROUP BY estado_prevencion");
foreach ($graficaPrevencion as $fila) {
	if ($fila['estado_prevencion']=='CON PREVENCION NOTIFICADA') {
		$conPrevencionNotificada= $fila['total'];
	}else if ($fila['estado_prevencion']=='CON PREVENCION SIN NOTIFICAR') {
		$conPrevencionSinNotificar= $fila['total'];
	}else if ($fila['estado_prevencion']=='CON PREVENCION SUBSANADA') {
		$conPrevencionSubsanada= $fila['total'];
	}else if ($fila['estado_prevencion']=='SIN PREVENCION') {
		$sinPrevencion= $fila['total'];
	}
}
$totalPrevencion=$conPrevencionNotificada+$conPrevencionSinNotificar+$conPrevencionSubsanada+$sinPrevencion;

$conProcedenciaSubsanada=0;
$graficaProcedencia                 = mysqli_query($conection, "SELECT COUNT(id_datos_generales) as total, estado_procencia FROM procedencia_integracion GROUP BY estado_procencia");
foreach ($graficaProcedencia as $fila) {
	if ($fila['estado_procencia']=='CON PROCEDENCIA NOTIFICADA') {
		$conProcedenciaNotificada= $fila['total'];
	}else if ($fila['estado_procencia']=='CON PROCEDENCIA SIN NOTIFICAR') {
		$conProcedenciaSinNotificar= $fila['total'];
	}else if ($fila['estado_procencia']=='CON PROCEDENCIA SUBSANADA') {
		$conProcedenciaSubsanada= $fila['total'];
	}else if ($fila['estado_procencia']=='SIN PROCEDENCIA') {
		$sinProcedencia= $fila['total'];
	}
}
$totalProcedencia=$conProcedenciaNotificada+$conProcedenciaSinNotificar+$conProcedenciaSubsanada+$sinProcedencia;
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Estadística Procedencia </title>
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

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <img alt="Brand" src="../imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="../menu_procedencia">Menu Principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#home">General</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#menu1">Municipios</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#menu2">Reporte de Capturados</a>
		</li>
	</ul>
	<div class="tab-content container-fluid">
		<div id="home" class="tab-pane active container-fluid"><br>
			<table class="table">
				<thead>
					<tr style="text-align:center">
						<th>Total de Trámites</th>
						<th>No. Empleos Directos</th>
						<th>No. Empleos Indirectos</th>
						<th>Monto de Inversión</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tabla_general as $fila): ?>
						<tr style="text-align:center">
							<td> <?php echo $fila['total']; ?> </td>
							<td> <?php echo $fila['empleos_directos']; ?> </td>
							<td> <?php echo $fila['empleos_indirectos']; ?> </td>
							<td> <?php echo number_format($fila['monto'], 2, '.', ','); ?> <?php echo $fila['tipo_nomeda']; ?></td>
						</tr>
					<?php endforeach?>
					<tr style="text-align:center">
						<td> <?php echo number_format($conteo) ?> </td>
						<td> <?php echo number_format($empleosDir )?> </td>
						<td> <?php echo number_format($empleosInd )?> </td>
					</tr>
				</tbody>
			</table>
			<br>
			<p id="id_total"></p>
			<br>
			<div class="row">
				<div class="col-md-5"></div>
				<div class=" col-md-4">
					<table class="table">
						<thead>
							<tr>
								<th style="color:#F1992D">Impacto Sanitario</th>
								<th style="color:#93C00D">Comercial Automotríz</th>
								<th style="color:#E65D77">Alto Hidrocarburos</th>
								<th style="color:#E65D77">Minas</th>
								<th style="color:#E65D77">Otros</th>
								<th><strong>TOTAL</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $impactoSanitario ?> </td>
								<td><?php echo $comercialAutomotriz ?> </td>
								<td><?php echo $hidrocarburos ?> </td>
								<td><?php echo $mina ?> </td>
								<td><?php echo $otros ?> </td>
								<td><strong><?php echo $totalG ?></strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div id="piechartGeneral" style="width: 1000px; height: 800px;"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<table class="table">
						<thead>
							<tr>
								<th style="color:#F1992D">Con Prevención Notificada</th>
								<th style="color:#93C00D">Con Prevención sin notificar</th>
								<th style="color:#E65D77">Con Prevención Subsanada</th>
								<th style="color:#E65D77">Sin Prevención</th>
								<th><strong>TOTAL</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $conPrevencionNotificada ?> </td>
								<td><?php echo $conPrevencionSinNotificar ?> </td>
								<td><?php echo $conPrevencionSubsanada ?> </td>
								<td><?php echo $sinPrevencion ?> </td>
								<td><strong><?php echo $totalPrevencion; ?></strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div id="piechartPrevencion" style="width: 1000px; height: 800px;"></div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<table class="table">
						<thead>
							<tr>
								<th style="color:#F1992D">Con Procedencia Notificada</th>
								<th style="color:#93C00D">Con Procedencia sin notificar</th>
								<th style="color:#E65D77">Con Procedencia Subsanada</th>
								<th style="color:#E65D77">Sin Procedencia</th>
								<th><strong>TOTAL</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $conProcedenciaNotificada ?> </td>
								<td><?php echo $conProcedenciaSinNotificar ?> </td>
								<td><?php echo $conProcedenciaSubsanada ?> </td>
								<td><?php echo $sinProcedencia ?> </td>
								<td><strong><?php echo $totalProcedencia; ?></strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div id="piechartProcedencia" style="width: 1000px; height: 800px;"></div>
			</div>
		</div>
		<!--/////////////////////menu2///////////////////////-->
		<div id="menu1" class="container tab-pane fade"><br>
			<h3>Estadística por Municipios</h3>
			<table id="id_municipios" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Municipio</th>
						<th>Trámites</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
						<th>Monto Inversión</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tablaMunicipio as $fila): ?>
						<tr style="text-align:center">
							<td> <?php echo $fila['municipio_proyecto']; ?> </td>
							<td> <?php echo $fila['total']; ?> </td>
							<td> <?php echo $fila['empleos_directos']; ?> </td>
							<td> <?php echo number_format($fila['empleos_indirectos']); ?> </td>
							<td> $<?php echo number_format($fila['monto']); ?> <?php echo $fila['tipo_nomeda']; ?></td>
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
 	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
 	<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	var pageTotal=0;
	$(document).ready(function() {
	   google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var dataGeneral = google.visualization.arrayToDataTable([
			  ['Impacto', 'cuantos'],
			  ['Impacto Sanitario', <?php echo $impactoSanitario; ?>],
			  ['Comercial Automotriz', <?php echo $comercialAutomotriz; ?>],
			  ['Hidrocarburos', <?php echo $hidrocarburos; ?>],
			  ['Minas', <?php echo $mina; ?>],
			  ['Otros', <?php echo $otros; ?>]
			]);

			var optionsG = {
			  title: 'Datos Estadísticos GENERALES',
			   colors: ['#F1992D', '#93C00D', '#E65D77', '#FACB13', '#04A7E0'],
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechartGeneral'));
			chart.draw(dataGeneral, optionsG);

			var dataPrevencion = google.visualization.arrayToDataTable([
			  ['Impacto', 'cuantos'],
			  ['Con Prevención Notificada', <?php echo $conPrevencionNotificada; ?>],
			  ['Con Prevención Sin Notificar', <?php echo $conPrevencionSinNotificar; ?>],
			  ['Con Prevención Subsanada', <?php echo $conPrevencionSubsanada; ?>],
			  ['Sin Prevención', <?php echo $sinPrevencion; ?>]
			]);

			var optionsPrevencion = {
			  title: 'Datos Estadísticos de PREVENCIÓN',
			   colors: ['#F1992D', '#93C00D', '#E65D77', '#FACB13'],
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechartPrevencion'));
			chart.draw(dataPrevencion, optionsPrevencion);

			var dataProcedencia = google.visualization.arrayToDataTable([
			  ['Impacto', 'cuantos'],
			  ['Con Procedencia Notificada', <?php echo $conProcedenciaNotificada; ?>],
			  ['Con Procedencia Sin Notificar', <?php echo $conProcedenciaSinNotificar; ?>],
			  ['Sin Procedencia', <?php echo $sinProcedencia; ?>],
			  ['Con Procedencia Subsanada', <?php echo $conProcedenciaSubsanada; ?>]
			]);

			var optionsProcedencia = {
			  title: 'Datos Estadísticos de PROCEDENCIA',
			   colors: ['#F1992D', '#93C00D', '#E65D77', '#FACB13'],
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechartProcedencia'));
			chart.draw(dataProcedencia, optionsProcedencia);
		}

		/////////////////////////////////////////////////////
		$('#id_municipios').DataTable({
	    	dom: 'Bfrtip',
    		buttons: [
       			{ extend: 'copyHtml5', footer: true },
				{ extend: 'excelHtml5', footer: true },
       			{ extend: 'pdfHtml5', footer: true }
    		]
	    });

	});
</script>

<script >
	function muestraUsuarios(){
		$.ajax({
			url: 'generaReporte.php',
			type: 'POST',
			dataType: 'JSON',
			data: {fechaInicial: document.getElementById('id_fechaInicial').value,
					fechaFinal: document.getElementById('id_fechaFinal').value
				},
		})
		.done(function(datos) {
			console.log("success");
			var tabla=document.getElementById("id_contenido");
			var totalG=0;
			tabla.innerHTML='';
			for (var i = 0; i <= datos.fin[0]; i++) {
				tabla.innerHTML+="<tr><td>"+datos.nombre[i]+"</td><td>"+datos.total[i]+"</td></tr>";
				totalG=totalG + parseInt(datos.total[i]);
			}
			tabla.innerHTML+="<tr><td>TOTAL</td><td>"+totalG+"</td></tr>";

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	}

</script>
</html>