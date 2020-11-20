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
						<th>Impacto</th>
						<th>DUF</th>
						<th>Firmar</th>
						<th>Turnar a UTIC</th>
						<th>Consecutivo</th>
						<th>Ingreso</th>
						<th>No.Expediente</th>
						<th>Folio DUF</th>
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
						<th>Usuario que Turnó</th>
					</tr>
				</thead>
				<tbody>
					</tbody>
				</table>
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
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$(document).ready(function() {

    		$('#id_tabla').DataTable({
    			responsive: true,
    			dom: 'Bfrtip',
    			ajax: {
					url: 'tabla_turnados_dg.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "impacto_riesgo" },
				{ mData: "botonCaratula" },
				{ mData: "botonFirma" },
				{ mData: "botonTurnar" },
				{ mData: "consecutivo" },
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
				{ mData: "fecha_turnado_utic" },
				{ mData: "nombreTurno" },
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

		function obtenCaratula(url){
			//alert('Estamos Trabjando Para un Mejor servicio. Espera la nueva Versión ;)')
			window.open( url, '_blank' );
		}

		function generaFirma(id_procedencia, id_emision){
			Swal.fire({
				title: '¿Está seguro(a)?',
				text: "¿Firmar Expediente?",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#899CAA',
				confirmButtonText: 'Firmar'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: 'genera_firma.php',
						type: 'POST',
						dataType: 'JSON',
						data: {
							id_emision: id_emision,
							id_procedencia: id_procedencia
						},
					})
					.done(function() {
						console.log("success");
						Swal.fire({
							title: 'Firmando DUF',
							html: 'Espere un momento <b></b>',
							timer: 3000,
							timerProgressBar: true,
							onBeforeOpen: () => {
								Swal.showLoading()
									timerInterval = setInterval(() => {
										const content = Swal.getContent()
										if (content) {
											const b = content.querySelector('b')
											if (b) {
												//b.textContent = Swal.getTimerLeft()
											}
										}
									}, 100)
								},
  								onClose: () => {
    								clearInterval(timerInterval)
  								}
							}).then((result) => {
  							if (result.dismiss === Swal.DismissReason.timer) {
    							console.log('I was closed by the timer')
    							//location.reload();
  							}
						})
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

		function turnarUTIC(id_procedencia, id_emision){
			Swal.fire({
				title: '¿Está seguro(a)?',
				text: "¿Desea Turnar el Expediente a UTIC?",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#899CAA',
				confirmButtonText: 'Turnar'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: 'turnar.php',
						type: 'POST',
						dataType: 'JSON',
						data: {
							id_procedencia: id_procedencia,
							id_emision: id_emision
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
								//location.reload();
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