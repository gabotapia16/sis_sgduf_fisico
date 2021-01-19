<?php
include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';

	$idGral=8;
	$idE1=0;
	$varSel=31;
	include '../menu.php';
 ?>

		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">Editar Expedientes</a>
			</li>
		</ul>

		<div class="tab-content container-fluid">
			<div id="home" class="tab-pane active container-fluid"><br>
				<table id="tabla_completa" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<!--<th>Evaluaciones</th>-->
							<th></th>
							<th>Editar</th>
                            <th>Continua</th>
                            <th>Archivo</th>
							<th>Concluir</th>
							<th>Ingreso</th>
							<th>No.Expediente</th>
							<th>No.Folio</th>
							<th>No. Caja</th>
							<th>Nombre Propietario</th>
							<th>Razón Social</th>
							<th>Giro</th>
							<th>Actividad</th>
							<th>Descripción</th>
							<th>Dirección del Proyecto</th>
							<th>Municipio</th>
							<th>Teléfono/CorreoPropietario</th>
							<th>Nombre del Representante Legal </th>
							<th>Teléfono/Correo Representante</th>
							<th>Monto y Tipo</th>
							<th>Empleos Directos</th>
							<th>Empleos Indirectos</th>
							<th>Estado Prevención</th>
							<th>Estado Procedencia</th>
							<th>Fecha expedicion prevención</th>
							<th>Fecha expedicion procedencia</th>
							<th>Fecha Notificación Procedencia</th>
							<th>Código de Barras</th>
							<th>Usuario Capturó</th>
							<th>Usuario Editó</th>
							<th>fecha de ingreso</th>
							<th>fecha modificacion</th>
							<th>ma_SLD</th>
							<th>ma_DEC</th>
							<th>ma_MAM</th>
							<th>ma_DUM</th>
							<th>ma_PCL</th>
							<th>ma_VLD</th>
							<th>ma_MOV</th>
							<th>ma_ADA</th>
							<th>ma_FTL</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<!--aqui termina-->
        </main>
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
													<option value="Emitido por Ordinario">Emitido por Ordinario</option>
													<option value="Turnado a E3 para Acuerdo">Turnado a E3 para Acuerdo</option>
													<option value="Turnado a Jurídico">Turnado a Jurídico</option>
													<option value="En Espera de Desistimiento">En Espera de Desistimiento</option>
													<option value="Duplicados en Sistema">Duplicados en Sistema</option>
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
											<div class="col-md-4">
												<div class="form-group col">
													<label for="">No. Duf:</label>
													<input type="text" name="no_duf" class="form-control">
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
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

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
    			dom: 'Bfrtip',
    			ajax: {
					url: 'tabla_update_solicitudes.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "mas" },
				{ mData: "botonEditar" },
                { mData: "Continua" },
                { mData: "URL_Archivo" },
				{ mData: "botonConcluir" },
				{ mData: "origen_ingreso" },
				{ mData: "no_expediente" },
				{ mData: "folio_solicitud" },
				{ mData: "no_caja" },
				{ mData: "nombre_propietario" },
				{ mData: "deno_proyecto" },
				{ mData: "giro" },
				{ mData: "actividad" },
				{ mData: "descripcion" },
				{ mData: "domicilio_proyecto" },
				{ mData: "municipio_proyecto" },
				{ mData: "tel_propietario" },
				{ mData: "representante_legl" },
				{ mData: "tel_rep_legal" },
				{ mData: "monto_inversion" },
				{ mData: "no_emplos_dir" },
				{ mData: "no_emplos_ind" },
				{ mData: "estado_prevencion" },
				{ mData: "estado_procencia" },
				{ mData: "fec_expedicion_prevencion" },
				{ mData: "fec_expedicion_procedencia" },
				{ mData: "fec_notificacion_procedencia" },
				{ mData: "codigo_barras" },
				{ mData: "capturo" },
				{ mData: "edito" },
				{ mData: "fecha_ingreso" },
				{ mData: "fech_modificacion" },
				{ mData: "ma_SLD" },
				{ mData: "ma_DEC" },
				{ mData: "ma_MAM" },
				{ mData: "ma_DUM" },
				{ mData: "ma_PCL" },
				{ mData: "ma_VLD" },
				{ mData: "ma_MOV" },
				{ mData: "ma_ADA" },
				{ mData: "ma_FTL" }
				

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
		});
	</script>

	<script>
		var variable1=0;
	</script>
	<script>
		function cachaID(idGeneral, idEtapa1){
			document.getElementById('id_general').value=idGeneral;
			document.getElementById('id_general_concluir').value=idGeneral;
			document.getElementById('id_etapa1').value=idEtapa1;
			document.getElementById('id_etapa1_concluir').value=idEtapa1;
		}
	</script>
</html>