<?php
//include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';

	$sql = mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES, us.APELLIDO_PATERNO, dt.no_caja, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, pi.fec_notificacion_procedencia, pi.fec_expedicion_prevencion, pi.fec_expedicion_procedencia FROM datos_generales dt INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura where pi.estado_etapa=1 OR pi.estado_etapa=2 OR pi.estado_etapa=3");

$tabla_usuarios_expediente = mysqli_query($conection, "SELECT us.NOMBRES, us.APELLIDO_PATERNO, dt.no_caja, dt.no_expediente, dt.nombre_propietario, dt.deno_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.domicilio_proyecto FROM datos_generales dt INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura ORDER BY dt.no_caja");

	$idGral=8;
	$idE1=0;
	$varSel=31;
	include '../menu.php';
 ?>

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
						<th>Estado General</th>
						<th>Volver a Turnar</th>
						<th>Caja</th>
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
						<th>Fecha expedicion prevención</th>
						<th>Fecha expedicion procedencia</th>
						<th>Fecha de Notificación de la Procedencia</th>
						<th>Capturó</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sql as $fila): ?>
						<tr style="text-align:center">
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
								default:
									echo "Sin Estado";
									break;
							} ?>

							 </td>
							 <td>
							 	<?php if ($fila['estado_etapa']==2): ?>
							 		<button class="btn btn-primary" onclick="aprobar(<?php echo $fila['id_general'];?>, <?php echo $fila['id_procedencia'] ?>);"><i class="fas fa-file-export"></i></button>
							 	<?php endif ?>
							 </td>
							<td> <?php echo $fila['no_caja']; ?> </td>
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
							<td> <?php echo $fila['fec_expedicion_prevencion']; ?> </td>
							<td> <?php echo $fila['fec_expedicion_procedencia']; ?> </td>
							<td> <?php echo $fila['fec_notificacion_procedencia']; ?> </td>
							<td> <?php echo $fila['NOMBRES']; ?> <?php echo $fila['APELLIDO_PATERNO']; ?> </td>
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
				      	<div class="row" style="display:none" id="id_salubridad">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Salubridad">
							</form>
				      	</div>
				      	<br>
				      	<div class="row" style="display:none" id="id_comercial">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Comercial Automotríz">
							</form>
				      	</div>
				      	<br>
				      	<div class="row" style="display:none" id="id_movilidad">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Movilidad">
							</form>
				      	</div>
				      	<br>
				      	<div class="row" style="display:none" id="id_desarrolloUrbano">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Desarrollo Urbano">
							</form>
				      	</div>
				      	<br>
				      	<div class="row" style="display:none" id="id_aguaDrenage">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Agua, Drenaje">
							</form>
				      	</div>
				      	<br>
				      	<div class="row" style="display:none" id="id_comunicaciones">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Vialidad">
							</form>
				      	</div>
				      	<br>
				      	<div class="row" style="display:none" id="id_forestal">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Forestal">
							</form>
				      	</div>
				      	<br>
				      	<div class="row" style="display:none" id="id_medioAmbiente">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Medio Ambiente">
							</form>
				      	</div>
				      	<br>
				      	<div class="row" style="display:none" id="id_proteccion">
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8">
								<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
								<input type="submit" class="btn btn-primary" value="Protección Civil">
							</form>
				      	</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" onclick="limpiaModal()" data-dismiss="modal">Cancelar</button>
				        <button type="button" class="btn btn-primary">Save changes</button>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
		<!--aqui termina-->
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

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
    		$('#tabla').DataTable({
    			responsive: true,
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
		function aprobar(idGeneral, idEtapa1){
			Swal.fire({
				title: '¿Está seguro(a)?',
				text: "¿Desea Volver a Turnar el Expediente?",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#899CAA',
				confirmButtonText: 'Turnar E2'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: 'cambia_estado_turno.php',
						type: 'POST',
						dataType: 'JSON',
						data: {
							idGeneral: idGeneral,
							idEtapa1: idEtapa1
						},
					})
					.done(function() {
						console.log("success");
						Swal.fire(
							'Turnado!',
							'El Expediente se Turnó a Etapa 2',
							'success'
						)
						.then((willDelete) => {
							if (willDelete) {
								 window.location.reload();
							}
						});
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
	</script>

</html>