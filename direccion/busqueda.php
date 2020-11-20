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
							<th>No.</th>
							<th>INGRESO</th>
							<th>NÚMERO DE EXPEDIENTE</th>
							<th>PROYECTO</th>
							<th>NOMBRE COMERCIAL</th>
							<th>REPRESENTANTE LEGAL</th>
							<th>NÚMERO DE CONTACTO</th>
							<th>CÁMARA O ASOCIACIÓN</th>
							<th>FECHA DE INGRESO DE SOLICITUD</th>
							<th>FECHA DE INGRESO DE REQUISITOS ESPECÍFICOS</th>
							<th>IMPACTO</th>
							<th>GIRO</th>
							<th>ACTIVIDAD</th>
							<th>DESCRIPCIÓN</th>
							<th>MUNICIPIO</th>
							<th>ETAPA</th>
							<th>COMENTARIO ETAPA</th>
							<th>FECHA ÚLTIMO MOVIMIENTO</th>
							<th>IMPACTO SANITARIO</th>
							<th>COMERCIAL AUTOMOTRIZ</th>
							<th>IMPACTO URBANO</th>
							<th>IMPACTO VIAL</th>
							<th>IMPACTO AMBIENTAL</th>
							<th>PROTECCION CIVIL</th>
							<th>CAEM</th>
							<th>FORESTAL</th>
							<th>MOVILIDAD</th>
							<th>INVERSION</th>
							<th>EMPLEOS</th>
							<th>ANTECEDENTES/COMENTARIOS</th>
							<th>COMENTARIOS OPERACIÓN URBANA</th>
							<th>ESTADO ACTUAL</th>
							<th>FECHA ENTREGA</th>
							<th>NO. DE DUF</th>
							<th>TIEMPO TRANSCURRIDO PARA PROCEDENCIA</th>
							<th>TIEMPO TRANSCURRIDO DE PROCEDENCIA A INGRESO DE RE</th>
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
					url: 'tabla_busqueda.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "mas" },
				{ mData: "origen_ingreso" },
				{ mData: "no_expediente" },
				{ mData: "deno_proyecto" },
				{ mData: "nombre_propietario" },
				{ mData: "representante_legl" },
				{ mData: "tel_propietario" },
				{ mData: "camara_asociacion" },
				{ mData: "fecha_ingreso" },
				{ mData: "fecha_edito_requisitos" },
				{ mData: "impacto" },
				{ mData: "giro" },
				{ mData: "actividad" },
				{ mData: "descripcion" },
				{ mData: "municipio_proyecto" },
				{ mData: "estado_etapa" },
				{ mData: "comentario_etapa" },
				{ mData: "fecha_ultimo_movimiento" },
				{ mData: "estado_sld" },
				{ mData: "estado_dec" },
				{ mData: "estado_dum" },
				{ mData: "estado_vld" },
				{ mData: "estado_mam" },
				{ mData: "estado_pcl" },
				{ mData: "estado_ada" },
				{ mData: "estado_ftl" },
				{ mData: "estado_mov" },
				{ mData: "monto_inversion" },
				{ mData: "no_emplos_dir" },
				{ mData: "antecedentes" },
				{ mData: "comentarios" },
				{ mData: "estado_actual" },
				{ mData: "fecha_entrega" },
				{ mData: "no_duf" },
				{ mData: "diferencia_procedencia_1" },
				{ mData: "diferencia_requisitos_1" }
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