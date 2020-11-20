<?php 
include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';
	$sql = mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES, us.APELLIDO_PATERNO, dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, codigo_barras, pi.turnado_etapa2, pi.fec_notificacion_procedencia FROM datos_generales dt INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura where pi.estado_etapa=3");

//$sql = mysqli_query($conection, "SELECT dt.id, dt.no_caja, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind FROM datos_generales dt ");
	
$tabla_usuarios_expediente = mysqli_query($conection, "SELECT us.NOMBRES, us.APELLIDO_PATERNO, dt.no_caja, dt.no_expediente, dt.nombre_propietario, dt.deno_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.domicilio_proyecto FROM datos_generales dt INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura ORDER BY dt.no_caja");

	$contar_acuerdo = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM datos_generales"));
	//$contar_acuerdo2 = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM procedencia_integracion"));
	
 ?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Vista General</title>
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
          <li class="active"><a href="../menu_tramitacion">Menu Principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">Reporte</a>
			</li>
			<!--
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#menu1">Lista de Capturados por caja</a>
			</li>
			-->
		</ul>

		<div class="tab-content container-fluid">
			<div id="home" class="tab-pane active container-fluid"><br>
				<table id="tabla_completa" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th></th>
						<th>Evaluaciones</th>
						<th>Ingreso</th>
						<th>No.Expediente</th>
						<th>No.Folio</th>
						<th>Nombre Propietario</th>		
						<th>Razón Social</th>
						<th>Giro</th>
						<th>Actividad</th>
						<th>Dirección del Proyecto</th>
						<th>Teléfono/CorreoPropietario</th>
						<th>Nombre del Representante Legal </th>
						<th>Teléfono/Correo Representante</th>
						<th>Monto y Tipo</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
						<th>Estado Procedencia</th>
						<th>Fecha Notificación Procedencia</th>
						<th>Código de Barras</th>
						<th>Turnado</th>
					
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sql as $fila): ?>
						<tr style="text-align:center">
							<td> </td>
							<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="generaBotones(<?php echo $fila['id_general'];?>, <?php echo $fila['id_procedencia'] ?>); cachaID(<?php echo $fila['id_general'] ?>, <?php echo $fila['id_procedencia'] ?>);"><i class="far fa-file-alt fa-lg" ></i>
								</button></td>
							<td> <?php echo $fila['origen_ingreso']; ?> </td>
							<td> <?php echo $fila['no_expediente']; ?> </td>
							<td> <?php echo $fila['folio_solicitud']; ?> </td>
							<td> <?php echo $fila['nombre_propietario']; ?> </td>
							<td> <?php echo $fila['deno_proyecto']; ?> </td>
							<td> <?php echo $fila['giro']; ?> </td>
							<td> <?php echo $fila['descripcion_general']; ?> </td>
							<td> <?php echo $fila['domicilio_proyecto']; ?> <?php echo $fila['municipio_proyecto']; ?> <?php echo $fila['cp_proyecto']; ?></td>
							<td> <?php echo $fila['tel_propietario']; ?> <?php echo $fila['correo_propietario']; ?></td>
							<td> <?php echo $fila['representante_legl']; ?> </td>
							<td> <?php echo $fila['tel_rep_legal']; ?> <?php echo $fila['correo_rep_legal']; ?></td>
							<td> <?php echo number_format($fila['monto_inversion']); ?> <?php echo $fila['tipo_nomeda']; ?></td>
							<td> <?php echo number_format($fila['no_emplos_dir']); ?> </td>
							<td> <?php echo number_format($fila['no_emplos_ind']); ?> </td>
							<td> <?php echo $fila['estado_procencia']; ?> </td>
							<td> <?php echo $fila['fec_notificacion_procedencia']; ?> </td>
							<td><?php echo $fila['codigo_barras']; ?></td>
							<td><?php echo $fila['turnado_etapa2']; ?></td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">¿Qué desea Ver?</h5>
				        <button type="button" onclick="limpiaModal()" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<div class="row" id="id_salubridad">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<div class="col-md-6">
									<div class="form-group col">
										<label class="">Estado de la Evaluación Técnica:</label>
										<br>
										<select class="form-control" name="tabla" id='tabla'>
												
							          	</select>
							          	<input type="number" id="id_general" name="id_general" style="display:none">
										<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
										<input type="number" id="editar" name="editar" value="0" style="display:none">
										<br>
										<center><input type="submit" class="btn btn-primary" value="Ver"></center>
									</div>
									<div class="col-md-6">
										<div class="form-group col">
											<label class="">Requiere Visita:</label>
											<br>
											<select class="js-example-basic-multiple col-md-12" name="id_select_requiere[]" id="id_select_requiere" multiple="multiple">
											</select>
										</div>
										<br>
										<div class="form-group col">
											<label class="">Con Prevención:</label>
											<br>
											<select class="js-example-basic-multiple col-md-12" name="id_select_prevencion[]" id="id_select_prevencion" multiple="multiple">

											</select>
										</div>
										<br>
										<div class="form-group col">
											<label class="">Improcedentes:</label>
											<br>
											<select class="js-example-basic-multiple col-md-12" name="id_select_improcedente[]" id="id_select_improcedente" multiple="multiple">

											</select>
										</div>
										<br>
										<div class="form-group col">
											<label class="">Procedentes:</label>
											<br>
											<select class="js-example-basic-multiple col-md-12" name="id_select_procedente[]" id="id_select_procedente" multiple="multiple">

											</select>
										</div>
									</div>
								</div>
							</form>
				      	</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" onclick="limpiaModal()" data-dismiss="modal">Cerrar</button>
				      </div>
				    </div>
				  </div>
				</div>

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
 	<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/processing().js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$(document).ready(function() {
    		$('#tabla_completa').DataTable({
    			responsive: true,
    			processing: true,
    			dom: 'Bfrtip',
    			lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "Mostrar Todo"]],
        		buttons: [
           			{ extend: 'pdfHtml5', 
           				footer: true,
           				orientation: 'landscape',
               			pageSize: 'LEGAL',
               			exportOptions: {
			   				columns: [0,1,2,3,4,12]
		    			}
               		},
               		{ extend: 'excelHtml5', footer: true,
               		 },
               		'pageLength'
        		]
    		});
		});  		
	</script>

	<script>
		function generaBotones(idGeneral, idEtapa1){
			$.ajax({
				url: 'buscar_evaluaciones.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					idEtapa1: idEtapa1,
					idGeneral: idGeneral
				},
			})
			.done(function(datos) {
				console.log("success");
				document.getElementById('tabla').innerHTML=datos.sele;
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}

		function limpiaModal(){
			
			var evaluaciones = document.getElementById("tabla");
  			evaluaciones.remove(evaluaciones.selectedIndex);
		}

		function cachaID(idGeneral, idEtapa1){
			document.getElementById('id_general').value=idGeneral;
			document.getElementById('id_etapa1').value=idEtapa1;
		}
	</script>
</html>