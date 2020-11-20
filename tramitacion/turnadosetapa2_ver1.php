<?php 
include '../conection_bd.php';
include("../segurity_session.php");
$usuario=$_SESSION["id_user"];

	$sql = mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES AS nombreModifico, us.APELLIDO_PATERNO AS apellidoModifico, users.NOMBRES AS nombresConfirmo, users.APELLIDO_PATERNO AS apellidoConfirmo,  dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, pi.fec_notificacion_procedencia, pi.confirmado_etapa2, pi.turnado_etapa2, pi.etapa_inicio, ingreso_requisitos FROM datos_generales dt INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales INNER JOIN usuarios us ON us.ID_USER = pi.usu_modificacion INNER JOIN usuarios users ON users.ID_USER = pi.usu_confirmaE2 where pi.estado_etapa=3 AND pi.conclusion=''");

 ?>
 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Vista General</title>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

		 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
		 <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
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
				<table id="id_tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th></th>
						<th>Etapa en la que Inicio Trámite</th>
						<th>No Ingresó Requisitos Específicos</th>
						<th>Editar Datos Generales</th>
						<th>Agregar Evaluaciones</th>
						<th>Turnar a Etapa 3</th>
						<th>Conluir</th>
						<th>Ingreso</th>
						<th>No.Expediente</th>
						<th>No.Folio</th>
						<th>Nombre Propietario</th>		
						<th>Razón Social</th>
						<th>Dirección del Proyecto</th>
						<th>Teléfono del Propietario</th>
						<th>Correo del Propietario</th>
						<th>Nombre del Representante Legal </th>
						<th>Teléfono del Representante </th>
						<th>Correo del Representante</th>
						<th>Monto y Tipo</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
						<th>Estado Procedencia</th>
						<th>Fecha Procedencia </th>
						<th>Fecha que se Turnó</th>
						<th>Fecha que se Confirmó</th>
						<th>Usuario Confirmó</th>
						<th>Último Usuario que Editó</th>
						<th>Requisitos Especificos</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sql as $fila): ?>
						<tr style="text-align:center">
							<td> </td>
							<td><?php if ($fila['etapa_inicio']==2) {
								echo "E2";
							}else {
								echo "E1";
							} ?></td>
							<td>
								<?php if ($fila['ingreso_requisitos']=='ingresó RE'){ ?>
									<input type="checkbox" id="id_checkValidar" onclick="checkb(<?php echo $fila['id_general'] ?>, <?php echo $fila['id_procedencia']?>,  'sin ingreso RE')" >
								<?php }else{ ?>
									<input type="checkbox" id="id_checkValidar" onclick="checkb(<?php echo $fila['id_general'] ?>, <?php echo $fila['id_procedencia'] ?>, 'ingresó RE')" checked>
								<?php } ?>
							</td>
							<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditar" onclick="generaBotones(<?php echo $fila['id_general'];?>, <?php echo $fila['id_procedencia'] ?>); cachaID(<?php echo $fila['id_general'] ?>, <?php echo $fila['id_procedencia'] ?>);"><i class="far fa-edit fa-lg" ></i>
								</button></td>
							<td>
								<?php if ($fila['ingreso_requisitos']=='ingresó RE'){ ?>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="generaBotones(<?php echo $fila['id_general'];?>, <?php echo $fila['id_procedencia'] ?>); cachaID(<?php echo $fila['id_general'] ?>, <?php echo $fila['id_procedencia'] ?>);" ><i class="fas fa-clipboard-list fa-lg"></i>
									</button>
								<?php }else{ ?>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="generaBotones(<?php echo $fila['id_general'];?>, <?php echo $fila['id_procedencia'] ?>); cachaID(<?php echo $fila['id_general'] ?>, <?php echo $fila['id_procedencia'] ?>);" disabled="true"><i class="fas fa-clipboard-list fa-lg"></i>
									</button>
								<?php } ?>
								</td>
								<td>
									<button type="button" class="btn btn-success" onclick="aprobar(<?php echo $fila['id_general'];?>, <?php echo $fila['id_procedencia'] ?>);"><i class="fas fa-file-export fa-lg"></i>
									</button>
								</td>
							<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConclusion" onclick="cachaID(<?php echo $fila['id_general'] ?>,<?php echo $fila['id_procedencia'] ?>)"><i class="fas fa-folder fa-lg"></i>
								</button>
							</td>
							<td> <?php echo $fila['origen_ingreso']; ?> </td>
							<td> <?php echo $fila['no_expediente']; ?> </td>
							<td> <?php echo $fila['folio_solicitud']; ?> </td>
							<td> <?php echo $fila['nombre_propietario']; ?> </td>
							<td> <?php echo $fila['deno_proyecto']; ?> </td>
							<td> <?php echo $fila['domicilio_proyecto']; ?> <?php echo $fila['municipio_proyecto']; ?> <?php echo $fila['cp_proyecto']; ?></td>
							<td> <?php echo $fila['tel_propietario']; ?></td>
							<td><?php echo $fila['correo_propietario']; ?></td>
							<td> <?php echo $fila['representante_legl']; ?> </td>
							<td> <?php echo $fila['tel_rep_legal']; ?></td>
							<td><?php echo $fila['correo_rep_legal']; ?></td>
							<td> <?php echo number_format($fila['monto_inversion']); ?> <?php echo $fila['tipo_nomeda']; ?></td>
							<td> <?php echo number_format($fila['no_emplos_dir']); ?> </td>
							<td> <?php echo number_format($fila['no_emplos_ind']); ?> </td>
							<td> <?php echo $fila['estado_procencia']; ?> </td>
							<td> <?php echo $fila['fec_notificacion_procedencia']; ?> </td>
							<td> <?php echo $fila['turnado_etapa2']; ?> </td>
							<td> <?php echo $fila['confirmado_etapa2']; ?> </td>
							<td> <?php echo $fila['nombresConfirmo']; ?> <?php echo $fila['apellidoConfirmo']; ?> </td>
							<td> <?php echo $fila['nombreModifico']; ?> <?php echo $fila['apellidoModifico']; ?> </td>
							<td> <?php echo $fila['ingreso_requisitos']; ?> </td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>
				

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">¿Qué desea Editar?</h5>
				        <button type="button" onclick="limpiaModal()" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<div class="row" id="id_salubridad">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
				      			<div class="row">
									<div class="col-md-6">
										<div class="form-group col">
											<label class="">Materias Aplicables:</label>
											<br>
											<select class="form-control" name="tabla" id='tabla'>
													
								          	</select>
								          	<input type="number" id="id_general" name="id_general" style="display:none">
											<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
											<input type="number" id="editar" name="editar" value="1" style="display:none">
											<br>
											<center><input type="submit" class="btn btn-primary" value="Editar"></center>
										</div>
									</div>
									<div class="col-md-6">

										<div class="form-group col">
											<label class="">En espera de Respuesta:</label>
											<br>
											<select class="js-example-basic-multiple col-md-12" name="id_select_espera[]" id="id_select_espera" multiple="multiple">

											</select>
										</div>
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
				        <button type="button" class="btn btn-secondary" onclick="limpiaModal()" data-dismiss="modal">Cancelar</button>
				        <!--<button type="button" class="btn btn-primary" onclick="//turnar()"></button>-->
				      </div>
				    </div>
				  </div>
				</div>


				<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
											<input type="number" id="id_general_datosG" name="id_general_datosG" style="display:none">
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


				<div class="modal fade" id="modalConclusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">CONCLUIR</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<h6>Motivo de la conclusión</h6>
								<br>
								<form action="concluir" method="POST" accept-charset="utf-8">
									<div class="container">
										<div class="row">
											<div class="col-md-7">
												<input type="number" id="id_general_concluir" name="id_general_concluir" style="display:none">
												<input type="number" id="id_etapa1_concluir" name="id_etapa1_concluir" style="display:none">
												<select class="custom-select" name="conclusion"id='conclusion' required>
													<option value="" selected hidden>Seleccione una opción</option>
													<option value="No Requiere DUF">No Requiere DUF</option>
													<option value="Criterio Juridico">Criterio Jurídico</option>
													<option value="Desistimiento">Desistimiento</option>
													<option value="Emitido por Acuerdo">Emitido por Acuerdo</option>
													<option value="Concluido por Falta de Interes">Concluido por Falta de Interés</option>
												</select>
											</div>
										</div>	
										<br>
										<div class="row">
											<div class="col-md-7">
												<div class="form-group col">
													<label for="">No. oficio:</label>
													<input type="text" name="no_oficio_conclusion" class="form-control">
												</div>
											</div>
										</div>
										<center><button type="submit" class="btn btn-danger">Conluir</button></center>
									</div>
								</form>		
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
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script>
		$(document).ready(function() {
    		$('#id_tabla').DataTable({
    			responsive: true,
    			lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "Mostrar Todo"]],
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
    		$('.js-example-basic-multiple').select2();
    		$('.js-example-basic-multiple').prop("disabled", true);

    		/*$('#id_checkValidar').change(function () {
			    
			 });*/
		});  		
	</script>

	<script>
		var usuario=<?php echo $usuario ?>;
	</script>

	<script>
		function aprobar(idGeneral, idEtapa1){
			Swal.fire({
				title: '¿Está seguro(a)?',
				text: "¿Desea Turnar a Etapa 3 el Expediente?",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#899CAA',
				confirmButtonText: 'Turnar'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: 'turnar_etapa3.php',
						type: 'POST',
						dataType: 'JSON',
						data: {
							idGeneral: idGeneral,
							idEtapa1: idEtapa1
						},
					})
					.done(function(datos) {
						if (datos.respuesta=='con procedencia') {
							console.log("success");
							Swal.fire(
								'¡Turnado!',
								'El Expediente se Turnó',
								'success'
							)
							.then((willDelete) => {
								if (willDelete) {
									 window.location.reload();
								} 
							});
						} else {
							Swal.fire(
								'¡No se pudo Turnar!',
								'El Expediente aún cuenta con Materias por Revisar',
								'error'
							)
							.then((willDelete) => {
								if (willDelete) {
									 window.location.reload();
								} 
							});
						}
						
					})
					.fail(function() {
						console.log("error");
						alert('Algo salió mal. Recargue la Página y vuelva a intentarlo');
					})
					.always(function() {
						console.log("complete");
					});
				}
			})
		}

		function checkb(idGeneral, idEtapa1, valor){
			//alert('hola');
			$.ajax({
				url: 'actualiza_validador.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					idGeneral: idGeneral,
					idEtapa1: idEtapa1,
					valor: valor
				},
			})
			.done(function() {
				console.log("success");
				location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
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
				document.getElementById('id_select_requiere').innerHTML=datos.selectVisita;
				document.getElementById('id_select_prevencion').innerHTML=datos.selectPrevencion;
				document.getElementById('id_select_procedente').innerHTML=datos.selectProcedente;
				document.getElementById('id_select_improcedente').innerHTML=datos.selectImprocedente;
				document.getElementById('id_select_espera').innerHTML=datos.selectEspera;
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
			var id_select_requiere = document.getElementById("id_select_requiere");
			var id_select_prevencion = document.getElementById("id_select_prevencion");
			var id_select_improcedente = document.getElementById("id_select_improcedente");
			var id_select_procedente = document.getElementById("id_select_procedente");
  			evaluaciones.remove(evaluaciones.selectedIndex);
  			id_select_requiere.remove(id_select_requiere.selectedIndex);
  			id_select_prevencion.remove(id_select_prevencion.selectedIndex);
  			id_select_improcedente.remove(id_select_improcedente.selectedIndex);
  			id_select_procedente.remove(id_select_procedente.selectedIndex);
		}

		function cachaID(idGeneral, idEtapa1){
			document.getElementById('id_general').value=idGeneral;
			document.getElementById('id_general_datosG').value=idGeneral;
			document.getElementById('id_etapa1').value=idEtapa1;
			document.getElementById('id_general_concluir').value=idGeneral;
			document.getElementById('id_etapa1_concluir').value=idEtapa1;
		}

		function turnar(){
			$.ajax({
				url: 'turnar_etapa3.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					idGeneral: document.getElementById('id_general').value, 
					idEtapa1: document.getElementById('id_etapa1').value, 
					usuario: usuario
				},
			})
			.done(function() {
				console.log("success");
				alert('El expediente se TURNO A ETAPA 3');
				window.location.reload();
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