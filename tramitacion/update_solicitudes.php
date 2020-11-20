<?php 
include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';
	$sql = mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES AS nombreModifico, us.APELLIDO_PATERNO AS apellidoModifico, users.NOMBRES AS nombresConfirmo, users.APELLIDO_PATERNO AS apellidoConfirmo,  dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, pi.fec_notificacion_procedencia, pi.confirmado_etapa2, pi.turnado_etapa2 FROM datos_generales dt INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales INNER JOIN usuarios us ON us.ID_USER = pi.usu_modificacion INNER JOIN usuarios users ON users.ID_USER = pi.usu_confirmaE2 where pi.estado_etapa=3");
	
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
				<a class="nav-link active" data-toggle="tab" href="#home">Editar Expedientes</a>
			</li>
		</ul>

		<div class="tab-content container-fluid">
			<div id="home" class="tab-pane active container-fluid"><br>
				<table id="id_tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th></th>
						<th>Editar</th>
						<th>Ingreso</th>
						<th>No.Expediente</th>
						<th>No.Folio</th>
						<th>Nombre Propietario</th>		
						<th>Razón Social</th>
						<th>Dirección del Proyecto</th>
						<th>Teléfono/CorreoPropietario</th>
						<th>Nombre del Representante Legal </th>
						<th>Teléfono/Correo Representante</th>
						<th>Monto y Tipo</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
						<th>Estado Procedencia</th>
						<th>Fecha Procedencia </th>
						<th>Fecha que se Turnó</th>
						<th>Fecha que se Confirmó</th>
						<th>Usuario Confirmó</th>
						<th>Último Usuario que Editó</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sql as $fila): ?>
						<tr style="text-align:center">
							<td> <?php echo $fila['no_caja_tramitacion']; ?> </td>
							<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="generaBotones(<?php echo $fila['id_general'];?>, <?php echo $fila['id_procedencia'] ?>); cachaID(<?php echo $fila['id_general'] ?>, <?php echo $fila['id_procedencia'] ?>);"><i class="far fa-edit fa-lg" ></i>
								</button></td>
							<td> <?php echo $fila['origen_ingreso']; ?> </td>
							<td> <?php echo $fila['no_expediente']; ?> </td>
							<td> <?php echo $fila['folio_solicitud']; ?> </td>
							<td> <?php echo $fila['nombre_propietario']; ?> </td>
							<td> <?php echo $fila['deno_proyecto']; ?> </td>
							<td> <?php echo $fila['domicilio_proyecto']; ?> <?php echo $fila['municipio_proyecto']; ?> <?php echo $fila['cp_proyecto']; ?></td>
							<td> <?php echo $fila['tel_propietario']; ?> <?php echo $fila['correo_propietario']; ?></td>
							<td> <?php echo $fila['representante_legl']; ?> </td>
							<td> <?php echo $fila['tel_rep_legal']; ?> <?php echo $fila['correo_rep_legal']; ?></td>
							<td> <?php echo number_format($fila['monto_inversion']); ?> <?php echo $fila['tipo_nomeda']; ?></td>
							<td> <?php echo number_format($fila['no_emplos_dir']); ?> </td>
							<td> <?php echo number_format($fila['no_emplos_ind']); ?> </td>
							<td> <?php echo $fila['estado_procencia']; ?> </td>
							<td> <?php echo $fila['fec_notificacion_procedencia']; ?> </td>
							<td> <?php echo $fila['turnado_etapa2']; ?> </td>
							<td> <?php echo $fila['confirmado_etapa2']; ?> </td>
							<td> <?php echo $fila['nombresConfirmo']; ?> <?php echo $fila['apellidoConfirmo']; ?> </td>
							<td> <?php echo $fila['nombreModifico']; ?> <?php echo $fila['apellidoModifico']; ?> </td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">EDITAR</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<h6>¿Qué desea Editar?</h6>
								<br>
								<div class="row">
									<div class="col-md-6">
										<form action="editar_datosGenerales" method="GET" accept-charset="utf-8">
											<input type="number" id="id_general" name="id_general" style="display:none">
											<input type="submit" class="btn btn-primary" value="Datos Generales">
										</form>
									</div>
									<!--<div class="col-md-6">
										<form action="editar_datosEtapa1" method="GET" accept-charset="utf-8">
											<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
											<input type="submit" class="btn btn-primary" value="Datos de Procedencia">
										</form>
									</div>-->
								</div>			
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
    		$('#tabla').DataTable({
    			responsive: true,
    			processing: true,
    			lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "Mostrar Todo"]]
    		});
		});  		
	</script>

	<script>
		var variable1=0;
	</script>
	<script>
		function cachaID(idGeneral, idEtapa1){
			document.getElementById('id_general').value=idGeneral;
			variable1=idGeneral;
			<?php $_SESSION['variable']="<script>document.writeln();</script>";?>
			document.getElementById('id_etapa1').value=idEtapa1;
		}
	</script>
</html>