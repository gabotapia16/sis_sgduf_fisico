<?php
include '../conection_bd.php';
include("../segurity_session.php");
$usuario=$_SESSION["id_user"];
date_default_timezone_set('America/Mexico_City');
include '../menu.php';
 ?>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">DUFs para Entregar</a>
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
						<th>Trámite</th>
						<th>Fecha de Entrega</th>
						<th>Consecutivo</th>
						<th>No.Expediente</th>
						<th>Nombre Propietario/Razón Social</th>
						<th>Dirección del Proyecto</th>
						<th>Municipio</th>
						<th>Superficie Total</th>
						<th>Superficie Construida</th>
						<th>Superficie en Uso</th>
						<th>Giro/Actividad/Descripción</th>
						<th>Evaluaciones Técnicas</th>
						<th>Días y Horarios de Funcionamiento</th>
						<th>Fecha de Expedición</th>
						<th>Folio DUF</th>
						<th>Ingreso</th>
						<th>Teléfono del Propietario</th>
						<th>Correo del Propietario</th>
						<th>Nombre del Representante Legal </th>
						<th>Teléfono del Representante </th>
						<th>Correo del Representante</th>
						<th>Monto</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>

					</tr>
				</thead>
				<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<!--aqui termina-->
        </main>
        <div class="modal fade" id="modalEntrega" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">FECHA EN LA QUE SE ENTREGA EL DUF</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<br>
						<form id="formulario_fecha_entrega" method="POST" accept-charset="utf-8">
							<div class="container">
								<div class="row">
									<input type="number" id="id_etapa1" name="id_etapa1" style="display:none">
									<input type="number" id="id_emision" name="id_emision" style="display:none">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<div class="form-group col">
											<label for="" class="col-form-label">Fecha de Entrega:</label>
											<input type="date" class="form-control" id="id_fecha_entrega">
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
			$("#formulario_fecha_entrega").on("submit", function(e)
			{
				event.preventDefault();
				guardaFecha();
			});


    		$('#id_tabla').DataTable({
    			responsive: true,
    			dom: 'Bfrtip',
    			ajax: {
					url: 'tabla_turnados_entrega.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "tipo_tramite" },
				{ mData: "botonCaratula" },
				{ mData: "consecutivo" },
				{ mData: "no_expediente" },
				{ mData: "nombre_propietario" },
				{ mData: "domicilio_proyecto" },
				{ mData: "municipio_proyecto" },
				{ mData: "sfc_total" },
				{ mData: "sfc_construida" },
				{ mData: "sfc_uso" },
				{ mData: "actividad" },
				{ mData: "evaluaciones" },
				{ mData: "dias_horarios" },
				{ mData: "fecha_expedicion" },
				{ mData: "folio_duf" },
				{ mData: "origen_ingreso" },
				{ mData: "tel_propietario" },
				{ mData: "correo_propietario" },
				{ mData: "representante_legl" },
				{ mData: "tel_rep_legal" },
				{ mData: "correo_rep_legal" },
				{ mData: "monto_inversion" },
				{ mData: "no_emplos_dir" },
				{ mData: "no_emplos_ind" },

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
		function guardaFecha(){
			$.ajax({
				url: 'guarda_fecha_entrega.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					id_etapa1: document.getElementById('id_etapa1').value,
					id_emision: document.getElementById('id_emision').value,
					fecha_entrega: document.getElementById('id_fecha_entrega').value
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
		function cachaID(idEtapa1, id_emision){
			document.getElementById('id_etapa1').value=idEtapa1;
			document.getElementById('id_emision').value=id_emision;
		}
	</script>

</html>