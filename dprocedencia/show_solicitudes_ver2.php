<?php 
include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';
	$sql = mysqli_query($conection, "SELECT pi.estado_etapa, dt.fecha_ingreso, dt.doc_personalidad, dt.persona_juridicolectiva, dt.descripcion_general, dt.anexo_digital, dt.observaciones_gen, dt.id, us.NOMBRES, us.APELLIDO_PATERNO, dt.no_caja, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, dt.codigo_barras FROM datos_generales dt INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura");

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
          <li class="active"><a href="../menu_procedencia">Menu Principal</a></li>
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
				<table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Caja</th>
						<th>Etapa</th>
						<th>Ingreso</th>
						<th>Fecha de Ingreso</th>
						<th>No.Expediente</th>
						<th>No.Folio</th>
						<th>Nombre Propietario</th>		
						<th>Razón Social</th>	
						<th>Giro</th>
						<th>Actividad</th>
						<th>Descripción</th>
						<th>Domicilio</th>
						<th>Municipio</th>
						<th>Código Postal</th>
						<th>Teléfono del Propietario</th>
						<th>Correo del Propietario</th>
						<th>Nombre del Representante Legal </th>
						<th>Teléfono del Representante</th>
						<th>Correo del Representante</th>
						<th>Documento con el que se Acreditó</th>
						<th>Persona Juridicolectivo</th>
						<th>Monto y Tipo</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
						<th>Estado Prevención</th>
						<th>Estado Procedencia</th>
						<th>Anexo Digital</th>
						<th>Observaciones</th>
						<th>Capturó</th>
						<th>Código de Barras</th>
					
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sql as $fila): ?>
						<tr style="text-align:center">
							<td> <?php echo $fila['no_caja']; ?> </td>
							<td>
							<?php switch ($fila['estado_etapa']) {
								case 1:
									echo "En Espera de Confirmación E2";
									break;
								case 2:
									echo "No Confirmado por E2";
									break;
								case 3:
									echo "Confirmado por E2";
									break;
								case 0:
									echo "Etapa 1";
									break;
								default:
									echo "Sin Estado";
									break;
							} ?>
								
							 </td>
							<td> <?php echo $fila['origen_ingreso']; ?> </td>
							<td> <?php echo $fila['fecha_ingreso']; ?> </td>
							<td> <?php echo $fila['no_expediente']; ?> </td>
							<td> <?php echo $fila['folio_solicitud']; ?> </td>
							<td> <?php echo $fila['nombre_propietario']; ?> </td>
							<td> <?php echo $fila['deno_proyecto']; ?> </td>
							<td> <?php echo $fila['giro']; ?> </td>
							<td> <?php echo $fila['actividad_comercial']; ?> </td>
							<td> <?php echo $fila['descripcion_general']; ?> </td>
							<td> <?php echo $fila['domicilio_proyecto']; ?> </td>
							<td><?php echo $fila['municipio_proyecto']; ?> </td>
							<td><?php echo $fila['cp_proyecto']; ?></td>
							<td> <?php echo $fila['tel_propietario']; ?></td>
							<td> <?php echo $fila['correo_propietario']; ?></td>
							<td> <?php echo $fila['representante_legl']; ?> </td>
							<td> <?php echo $fila['tel_rep_legal']; ?></td>
							<td><?php echo $fila['correo_rep_legal']; ?></td>
							<td><?php echo $fila['doc_personalidad']; ?></td>
							<td><?php echo $fila['persona_juridicolectiva']; ?></td>
							<td> <?php echo number_format($fila['monto_inversion']); ?> <?php echo $fila['tipo_nomeda']; ?></td>
							<td> <?php echo number_format($fila['no_emplos_dir']); ?> </td>
							<td> <?php echo number_format($fila['no_emplos_ind']); ?> </td>
							<td> <?php echo $fila['estado_prevencion']; ?> </td>
							<td> <?php echo $fila['estado_procencia']; ?> </td>
							<td><?php echo $fila['anexo_digital']; ?></td>
							<td><?php echo $fila['observaciones_gen']; ?></td>
							<td> <?php echo $fila['NOMBRES']; ?> <?php echo $fila['APELLIDO_PATERNO']; ?> </td>
							<td><?php echo $fila['codigo_barras']; ?></td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">COPIAR</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<h6>Contenido del Correo</h6>
								<br>
								<div class="row">
									<div class="col-md-11">
										<label>Propietario:</label>
										<input type="text" class="form-control" id="id_correoPropietario" name="">
									</div>
									<div class="col-md-1">
										<button type="button" id="copyClip" onclick="copiarCorreoPrpietario()"><i class="far fa-copy"></i></button>
									</div>
								</div>
								<div class="row">
									<div class="col-md-11">
										<label>Representante:</label>
										<input type="text" class="form-control" id="id_correoRepresentante" name="">
									</div>
									<div class="col-md-1">
										<button type="button" id="copyClip" onclick="copiarCorreoRepresentante()"><i class="far fa-copy"></i></button>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12">
										<label>Contenido:</label>
										<textarea class="form-control" id="id_textCuerpo">
										</textarea><br>
										<button type="button" id="copyClip" onclick="copiarTexto()"><i class="far fa-copy"></i></button>
									</div>
								</div>		
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="menu1" class="container tab-pane fade"><br>
				<table id="tabla2" class="table table-striped table-bordered" style="width:100%">
					<caption>table title and/or explanatory text</caption>
					<thead>
						<tr>
							<th>No.Caja</th>
							<th>No.Expediente</th>
							<th>Nombre del Propietario/DenoProyecto</th>
							<th>Domicilio</th>
							<th>Capturó</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tabla_usuarios_expediente as $fila): ?>
							<tr style="text-align:center">
								<td> <?php echo $fila['no_caja']; ?> </td>
								<td> <?php echo $fila['no_expediente']; ?> </td>
								<td> <?php echo $fila['nombre_propietario']; ?> / <?php echo $fila['deno_proyecto']; ?></td>
								<td> <?php echo $fila['domicilio_proyecto']; ?> <?php echo $fila['municipio_proyecto']; ?> <?php echo $fila['cp_proyecto']; ?></td>
								<td> <?php echo $fila['NOMBRES']; ?> <?php echo $fila['APELLIDO_PATERNO']; ?></td>
							</tr>
						<?php endforeach?>
					</tbody>
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
 	<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/processing().js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$(document).ready(function() {
    		$('#tabla').DataTable({
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
    		$('#tabla2').DataTable({
    			dom: 'Bfrtip',
        		buttons: [
           			{ extend: 'pdfHtml5', footer: true },
           			{ extend: 'excelHtml5', footer: true }
        		]
    		});
		});  		
	</script>

	<script>
		var variable1=0;
	</script>
	<script>
		function cachaCorreo(correoPropietario, correoRepresentante, proyecto, domicilio, municipio, cp){
			document.getElementById("id_correoPropietario").value = correoPropietario;
			document.getElementById("id_correoRepresentante").value = correoRepresentante;
			 var result = proyecto.bold();
			document.getElementById("id_textCuerpo").innerHTML = "POR MEDIO DEL PRESENTE CORREO ELECTRÓNICO, EN ARAS DE AGILIZAR LA GESTIÓN PÚBLICA, ATENDIENDO DE MANERA MÁS EFICAZ EL TRÁMITE DEL DICTAMEN ÚNICO DE FACTIBILIDAD, DE ACUERDO A LAS ATRIBUCIONES SEÑALADAS EN LA LEY QUE CREA LA COMISIÓN DE FACTIBILIDAD, ARTÍCULO 4 FRACCIÓN 1 Y DE CONFORMIDAD A LO ESTABLECIDO EN LOS ARTÍCULOS 26 Y 28 V DEL CÓDIGO DE PROCEDIMIENTOS ADMINISTRATIVOS DEL ESTADO DE MÉXICO. \n ME PERMITO INFORMARLE QUE SU EXPEDIENTE RELACIONADO AL PROYECTO"+" "+ proyecto +", UBICADO EN "+domicilio+" "+municipio+ " TIENE UN OFICIO POR NOTIFICAR POR LO CUAL SE SOLICITA SU PRESENCIA EN EL DOMICILIO DE LA COMISIÓN DE FACTIBILIDAD DEL ESTADO DE MÉXICO, SITIO EN CALLE DIEGO RIVERA 224, COL. INDUSTRIAL, DELEGACIÓN SANTIAGO MILTEPEC, TOLUCA, ESTADO DE MÉXICO, EN UN HORARIO DE 9:00 A 15:00 HORAS DE LUNES A VIERNES. \n FAVOR DE CONFIRMAR LA RECEPCIÓN DEL PRESENTE CORREO. \n DIRECCIÓN DE PROCEDENCIA JURÍDICA E INTEGRACIÓN DE EXPEDIENTES. \n COMISIÓN DE FACTIBILIDAD DEL ESTADO DE MÉXICO. \n TELÉFONOS: \n (01 722) 236 7096 \n 236 74 19 \n 236 64 58 \n 236 65 46 ";
		}
	</script>
	<script>
		function copiarCorreoPrpietario() {
  var copyText = document.getElementById("id_correoPropietario");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
}
function copiarCorreoRepresentante() {
  var copyText = document.getElementById("id_correoRepresentante");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
}
function copiarTexto() {
  var copyText = document.getElementById("id_textCuerpo");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
}
</script>
</html>