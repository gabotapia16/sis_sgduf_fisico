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
				<a class="nav-link active" data-toggle="tab" href="#home">Busqueda de Expedientes</a>
			</li>
		</ul>

		<div class="tab-content container-fluid">
			<div id="home" class="tab-pane active container-fluid"><br>
				<table id="tabla_completa" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>mas</th>
							<th>no_expediente</th>
							<th>nombre_propietario</th>
							<th>persona_juridicolectiva</th>
							<th>deno_proyecto</th>
							<th>municipio_proyecto</th>
							<th>impacto</th>
							<th>giro</th>
							<th>actividad</th>
							<th>monto_inversion</th>
							<th>moneda</th>
							<th>no_emplos_dir</th>
							<th>no_emplos_ind</th>
							<th>estado_etapa</th>
							<th>estado_etapa1</th>
							<th>estado_etapa2</th>
							<th>estado_duf</th>
							<th>estado_area</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<!--aqui termina-->
        </main>		
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
					url: 'tabla_busqueda_digital.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "mas" },
				{ mData: "no_expediente" },
				{ mData: "nombre_propietario" },
				{ mData: "persona_juridicolectiva" },
				{ mData: "deno_proyecto" },
				{ mData: "municipio_proyecto" },
				{ mData: "impacto" },
				{ mData: "giro" },
				{ mData: "actividad" },
				{ mData: "monto_inversion" },
				{ mData: "tipo_nomeda" },
				{ mData: "no_emplos_dir" },
				{ mData: "no_emplos_ind" },
				{ mData: "estado_etapa" },
				{ mData: "estado_etapa1" },
				{ mData: "estado_etapa2" },
				{ mData: "estado_duf" },
				{ mData: "estado_area" }

				

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
</html>