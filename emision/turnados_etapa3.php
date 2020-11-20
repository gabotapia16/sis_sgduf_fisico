<?php
include '../conection_bd.php';
include("../segurity_session.php");
$usuario=$_SESSION["id_user"];
date_default_timezone_set('America/Mexico_City');
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
				<table id="id_tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Etapa en la que Inicio Trámite</th>
						<th>Editar</th>
						<th>Evaluaciones</th>
						<th>Dictaminar</th>
						<th>Carátula</th>
						<th>Turnar a Impresión</th>
						<th>Ingreso</th>
						<th>No.Expediente</th>
						<th>No.Folio</th>
						<th>Nombre Propietario</th>
						<th>Razón Social</th>
						<th>Dirección del Proyecto</th>
						<th>Giro/Actividad/Descripción</th>
						<th>Teléfono del Propietario</th>
						<th>Correo del Propietario</th>
						<th>Nombre del Representante Legal </th>
						<th>Teléfono del Representante </th>
						<th>Correo del Representante</th>
						<th>Monto y Tipo</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
						<th>Fecha que se Turnó</th>
						<th>Fecha que se Confirmó</th>
						<th>Usuario Confirmó</th>
						<th>Último Usuario que Editó</th>
					</tr>
				</thead>
				<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<!--aqui termina-->
        </main>
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
									<div class="col-md-6">
										<form action="editar_datosEtapa1" method="GET" accept-charset="utf-8">
											<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
											<input type="submit" class="btn btn-primary" value="Datos de Procedencia">
										</form>
									</div>
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
				      		<form action="formularioetapa2.php" method="GET" accept-charset="utf-8" target="_blank">
				      			<div class="row">
									<div class="col-md-6">
										<div class="form-group col">
											<label class="">Materias Aplicables:</label>
											<br>
											<select class="form-control" name="tabla" id='tabla'>

								          	</select>
								          	<input type="number" id="id_general" name="id_general" style="display:none">
											<input type="number" id="id_etapa1_materias" name="id_etapa1_materias" style="display:none">
											<input type="number" id="editar" name="editar" value="1" style="display:none">
											<br>
											<center><a href="formularioetapa2.php"><input type="submit" class="btn btn-primary" value="Editar"></a></center>
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
										<div class="form-group col">
											<label class="">Dir/Licencia:</label>
											<br>
											<select class="js-example-basic-multiple col-md-12" name="id_select_dir_licencia[]" id="id_select_dir_licencia" multiple="multiple">

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

				<div class="modal fade bd-example-modal-lg" id="modalDictamen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">DICTAMINAR</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<br>
								<form id="formulario_dictamen" method="POST" accept-charset="utf-8">
									<div class="container">
										<div class="row">
											<div class="col-md-4">
												<input type="number" id="id_general_dicatmen" name="id_general_dicatmen" style="display:none">
												<input type="number" id="id_etapa1_dictamen" name="id_etapa1_dictamen" style="display:none">
												<label><h6>Tipo de DUF:</h6></label>
												<select class="custom-select" name="tramite"id='tramite' required>
													<option value="" selected hidden>Seleccione una opción</option>
													<option value="ORDINARIO">ORDINARIO</option>
													<option value="ACUERDO_R">ACUERDO REACTIVACION ECONOMICA</option>
													<option value="ACUERDO_F">ACUERDO DE FORTALECIMIENTO</option>
												</select>
											</div>
											<div class="col-md-4">
												<label><h6>Tipo de Impacto:</h6></label>
												<select class="custom-select" name="impacto"id='impacto' required>
													<option value="" selected hidden>Seleccione una opción</option>
													<option value="BAJO IMPACTO">BAJO IMPACTO</option>
													<option value="ALTO IMPACTO">ALTO IMPACTO</option>
												</select>
											</div>
											<div class="col-md-4">
												<label><h6>Tipo de Dictamen:</h6></label>
												<select class="custom-select" name="tipo_duf"id='tipo_duf' required>
													<option value="" selected hidden>Seleccione una opción</option>
													<option value="FUNCIONAMIENTO">FUNCIONAMIENTO</option>
													<option value="CONSTRUCCIÓN">CONSTRUCCIÓN</option>
													<option value="AMPLIACIÓN">AMPLIACIÓN</option>
												</select>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group col">
													<label for=""><h6>Días y Horarios de Funcionamiento:</h6></label>
													<select class="form-control" name="dias" id="dias" required>
														<option value="" disabled selected>DIAS Y HORARIOS DE FUNCIONAMIENTO</p></option>
														<option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 02:00 HORAS DEL DIA SIGUIENTE." ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 02:00 HORAS DEL DIA SIGUIENTE.</p></option>
														<option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 15:00 A 22:00 HORAS" ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 15:00 A 22:00 HORAS</p></option>
														<option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 22:00 HORAS" ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 22:00 HORAS</p></option>
														<option value="DE DOMINGO A SABADO" ><p>DE DOMINGO A SABADO</p></option>
														<option value="DE DOMINGO A SABADO DE 08:00 A 20:00 HORAS" ><p>DE DOMINGO A SABADO DE 08:00 A 20:00 HORAS</p></option>
														<option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 20:00 HORAS." ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 20:00 HORAS.</p></option>
														<option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 17:00 A 02:00 HORAS DEL DIA SIGUIENTE." ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 17:00 A 02:00 HORAS DEL DIA SIGUIENTE.</p></option>
														<option value="N/A" ><p>N/A</p></option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4"></div>
											<div class="col-md-4">
												<div class="form-group col">
													<h6><label for="">Fecha de Expedición:</label></h6>
													<input type="date" class="form-control" id="fecha_expedicion" name="fecha_expedicion" value="<?php echo date("Y-m-d");?>" required>
												</div>
											</div>
										</div>
										<center><button type="submit" class="btn btn-primary">Guardar</button></center>
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
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$(document).ready(function() {
			$("#formulario_dictamen").on("submit", function(e)
			{
				event.preventDefault();
				guardaDictamen();
			});


    		$('#id_tabla').DataTable({
    			responsive: true,
    			dom: 'Bfrtip',
    			ajax: {
					url: 'tabla_turnados_etapa3.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "inicio_etapa" },
				{ mData: "botonEditar" },
				{ mData: "botonEvaluaciones" },
				{ mData: "botonDictamen" },
				{ mData: "botonCaratula" },
				{ mData: "botonTurnar" },
				{ mData: "origen_ingreso" },
				{ mData: "no_expediente" },
				{ mData: "folio_solicitud" },
				{ mData: "nombre_propietario" },
				{ mData: "deno_proyecto" },
				{ mData: "domicilio_proyecto" },
				{ mData: "actividad" },
				{ mData: "tel_propietario" },
				{ mData: "correo_propietario" },
				{ mData: "representante_legl" },
				{ mData: "tel_rep_legal" },
				{ mData: "correo_rep_legal" },
				{ mData: "monto_inversion" },
				{ mData: "no_emplos_dir" },
				{ mData: "no_emplos_ind" },
				{ mData: "turnado_etapa3" },
				{ mData: "fecha_confirma_rechaza" },
				{ mData: "nombresConfirmo" },
				{ mData: "nombreModifico" },
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
			document.getElementById('id_etapa1_materias').value=idEtapa1;
			document.getElementById('id_general_concluir').value=idGeneral;
			document.getElementById('id_etapa1_concluir').value=idEtapa1;
			document.getElementById('id_general_dicatmen').value=idGeneral;
			document.getElementById('id_etapa1_dictamen').value=idEtapa1;
		}
		function cargaDictamen(idGeneral, idEtapa1){

			$.ajax({
				url: 'carga_dictamen.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					idGeneral: idGeneral,
					idEtapa1: idEtapa1
				},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

		}

		function guardaDictamen(){
			$.ajax({
				url: 'guarda_dictamen.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					id_general_dicatmen: document.getElementById('id_general_dicatmen').value,
					id_etapa1_dictamen: document.getElementById('id_etapa1_dictamen').value,
					tramite: document.getElementById('tramite').value,
					impacto: document.getElementById('impacto').value,
					tipo_duf: document.getElementById('tipo_duf').value,
					dias: document.getElementById('dias').value,
					fecha_expedicion: document.getElementById('fecha_expedicion').value
				},
			})
			.done(function() {
				console.log("success");
				swal({
					title: "¡Se Guardó con Éxito!",
					icon: "success",
				})
				.then((willDelete) => {
					if (willDelete) {
						location.reload();
					}
				});
			})
			.fail(function() {
				console.log("error");
				alert('Surgió algún error. Recargue la página e intentelo de nuevo');
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
				document.getElementById('id_select_dir_licencia').innerHTML=datos.selectDirLic;
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

		function obtieneDictamen(id_general, id_etapa1){
			$.ajax({
				url: 'obtiene_dictamen.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					id_general: id_general,
					id_etapa1: id_etapa1
				},
			})
			.done(function(datos) {
				console.log("success");
				document.getElementById('tramite').value=datos.tipo_tramite;
				document.getElementById('impacto').value=datos.impacto_riesgo;
				document.getElementById('tipo_duf').value=datos.tipo_duf;
				document.getElementById('dias').value=datos.dias_horarios;
				document.getElementById('fecha_expedicion').value=datos.fecha_expedicion;
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}

		function obtenCaratula(url){
			//alert('Estamos Trabjando Para un Mejor servicio. Espera la nueva Versión ;)')
			window.open( url, '_blank' );
		}

		function turnarUTIC(id_general, id_etapa1){
			Swal.fire({
				title: '¿Está seguro(a)?',
				text: "¿Desea Turnar el Expediente Para Impresión?",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#899CAA',
				confirmButtonText: 'Aprobar'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: 'turnar_utic.php',
						type: 'POST',
						dataType: 'JSON',
						data: {
							id_general: id_general,
							id_etapa1: id_etapa1
						},
					})
					.done(function() {
						console.log("success");
						swal({
							title: "¡Se Turnó con Éxito!",
							icon: "success",
						})
						.then((willDelete) => {
							if (willDelete) {
								location.reload();
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