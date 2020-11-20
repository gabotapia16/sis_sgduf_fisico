<?php
include '../conection_bd.php';
include("../segurity_session.php");
$usuario=$_SESSION["id_user"];
include '../menu.php';

 ?>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">Turnados E3</a>
			</li>
			<!--
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#menu1">Lista de Capturados por caja</a>
			</li>
			-->
		</ul>

		<div class="tab-content container-fluid">
			<div id="home" class="tab-pane active container-fluid"><br>
				<table id="id_tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Estado</th>
						<th>Motivo Rechazo</th>
						<th>Turnar / Modificar</th>
						<th>Evaluaciones</th>
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
						<th>Usuario Turnó a E3</th>
						<th>Fecha que se Turnó a E3</th>
					</tr>
				</thead>
				<tbody>
					</tbody>
				</table>


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
    		$('#id_tabla').DataTable({
    			responsive: true,
    			dom: 'Bfrtip',
    			ajax: {
					url: 'tabla_turnados_etapa3.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "estado_confirmacion" },
				{ mData: "motivo_rechazo" },
				{ mData: "botonTurnar" },
				{ mData: "evaluaciones" },
				{ mData: "origen_ingreso" },
				{ mData: "no_expediente" },
				{ mData: "folio_solicitud" },
				{ mData: "nombre_propietario" },
				{ mData: "deno_proyecto" },
				{ mData: "domicilio_proyecto" },
				{ mData: "tel_propietario" },
				{ mData: "correo_propietario" },
				{ mData: "representante_legl" },
				{ mData: "tel_rep_legal" },
				{ mData: "correo_rep_legal" },
				{ mData: "monto_inversion" },
				{ mData: "no_emplos_dir" },
				{ mData: "no_emplos_ind" },
				{ mData: "usuarioTurno" },
				{ mData: "turnado_etapa3" },
				],
    			language: {
				        "decimal": "",
				        "emptyTable": "No hay información",
				        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
				        "infoPostFix": "",
				        "thousands": ",",
				        "lengthMenu": "Mostrar _MENU_ Entradas",
				        "loadingRecords": "Cargando...",
				        "processing": "Procesando...",
				        "search": "Buscar:",
				        "zeroRecords": "Sin resultados encontrados",
				        "paginate": {
				            "first": "Primero",
				            "last": "Ultimo",
				            "next": "Siguiente",
				            "previous": "Anterior"
				        }
				    },
    			lengthMenu: [[10, 15, 25, 50, -1], [10, 15, 25, 50, "Mostrar Todo"]],
        		buttons: [
               		{ extend: 'excelHtml5',
               			footer: true
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
		function turnar(idGeneral, idEtapa1){
			Swal.fire({
				title: '¿Está seguro(a)?',
				text: "¿Desea Volver a Turnar el Expediente?",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#899CAA',
				confirmButtonText: 'Turnar E3'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: 'turnar.php',
						type: 'POST',
						dataType: 'JSON',
						data: {
							idGeneral: idGeneral,
							idEtapa1: idEtapa1,
							estado: 4
						},
					})
					.done(function() {
						console.log("success");
						Swal.fire(
							'Turnado!',
							'El Expediente se Turnó a Etapa 3',
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

		function modificar(idGeneral, idEtapa1){
			Swal.fire({
				title: '¿Está seguro(a)?',
				text: "¿Desea Modificar el Expediente en su Etapa?",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#899CAA',
				confirmButtonText: 'Turnar E2'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: 'turnar.php',
						type: 'POST',
						dataType: 'JSON',
						data: {
							idGeneral: idGeneral,
							idEtapa1: idEtapa1,
							estado: 3
						},
					})
					.done(function() {
						console.log("success");
						Swal.fire(
							'Turnado!',
							'El Expediente se Turnó a Etapa 2 para su Modificación',
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