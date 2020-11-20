<?php
include '../conection_bd.php';
include("../segurity_session.php");
$usuario=$_SESSION["id_user"];
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
				<table cellpadding="3" cellspacing="2" border="0" >
			        <thead>
			            <tr>
			                <th>Columna</th>
			                <th>Buscar</th>
			            </tr>
			        </thead>
			        <tbody>
			            <tr id="filter_col2" data-column="1">
			                <td>Sanitario</td>
			                <td align="center"><input type="text" class="column_filter" id="col1_filter"></td>
			            </tr>
			            <tr id="filter_col3" data-column="2">
			                <td>Desarrollo Económico</td>
			                <td align="center"><input type="text" class="column_filter" id="col2_filter"></td>
			                </tr>
			            <tr id="filter_col4" data-column="3">
			                <td>Desarrollo Urbano</td>
			                <td align="center"><input type="text" class="column_filter" id="col3_filter"></td>
			                </tr>
			            <tr id="filter_col5" data-column="4">
			                <td>Medio Ambiente</td>
			                <td align="center"><input type="text" class="column_filter" id="col4_filter"></td>
			               </tr>
			            <tr id="filter_col6" data-column="5">
			                <td>Vialidad</td>
			                <td align="center"><input type="text" class="column_filter" id="col5_filter"></td>
			                </tr>
			            <tr id="filter_col7" data-column="6">
			                <td>Agua y Drenage</td>
			                <td align="center"><input type="text" class="column_filter" id="col6_filter"></td>
			                </tr>
			            <tr id="filter_col8" data-column="7">
			                <td>Protección Civil</td>
			                <td align="center"><input type="text" class="column_filter" id="col7_filter"></td>
			                </tr>
			            <tr id="filter_col9" data-column="8">
			                <td>Forestal</td>
			                <td align="center"><input type="text" class="column_filter" id="col8_filter"></td>
			                 </tr>
			            <tr id="filter_col10" data-column="9">
			                <td>Movilidad</td>
			                <td align="center"><input type="text" class="column_filter" id="col9_filter"></td>
			                 </tr>
			        </tbody>
		    	</table>
		    	<br>
		    	<table border="0" cellspacing="5" cellpadding="5">
					<tbody>
						<tr>
							<td>Monto Mínimo:</td>
							<td><input type="text" id="min" name="min"></td>
						</tr>
						<tr>
							<td>Monto Máximo:</td>
							<td><input type="text" id="max" name="max"></td>
						</tr>
					</tbody>
				</table>
				<table id="id_tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th></th>
						<th>Materias Aplicables</th>
						<th>Materias Faltantes</th>
						<th>Monto</th>
						<th>Nombre Propietario</th>
						<th>Razón Social</th>
						<th>Dirección del Proyecto</th>
						<th>Estado Sanitario</th>
						<th>Notificación Sanitario</th>
						<th>Estado Desarrolo Económico</th>
						<th>Notificación Desarrollo Económico</th>
						<th>Estado Desarrollo Urbano</th>
						<th>Notificación Desarrollo Urbano</th>
						<th>Estado Medio Ambiente</th>
						<th>Notificación Medio Ambiente</th>
						<th>Estado Vialidad</th>
						<th>Notificación Vialidad</th>
						<th>Estado Agua y Drenage</th>
						<th>Notificación Agua y Drenage</th>
						<th>Estado Protección Civil</th>
						<th>Notificación Protección Civil</th>
						<th>Estado Forestal</th>
						<th>Notificación Forestal</th>
						<th>Estado Movilidad</th>
						<th>Notificación Movilidad</th>
						
						<th>Giro</th>
						<th>Actividad</th>
						<th>Descripción</th>
						<th>Ingreso</th>
						<th>No.Expediente</th>
						<th>No.Folio</th>
						<th>Teléfono del Propietario</th>
						<th>Correo del Propietario</th>
						<th>Nombre del Representante Legal </th>
						<th>Teléfono del Representante </th>
						<th>Correo del Representante</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
						<th>Filtro de Monto</th>
						<th>fec_notif_prev_sld</th>
						<th>fec_recep_prev_sld</th>
						<th>fec_subsa_prev_sld</th>
						<th>fec_notif_prev_dum</th>
						<th>fec_recep_prev_dum</th>
						<th>fec_subsa_prev_dum</th>
						<th>fec_notif_prev_pcl</th>
						<th>fec_recep_prev_pcl</th>
						<th>fec_subsa_prev_pcl</th>
						<th>fec_notif_prev_mam</th>
						<th>fec_recep_prev_mam</th>
						<th>fec_subsa_prev_mam</th>
						<th>fec_notif_prev_ftl</th>
						<th>fec_recep_prev_ftl</th>
						<th>fec_subsa_prev_ftl</th>
						<th>fec_notif_prev_dec</th>
						<th>fec_recep_prev_dec</th>
						<th>fec_subsa_prev_dec</th>
						<th>fec_notif_prev_vld</th>
						<th>fec_recep_prev_vld</th>
						<th>fec_subsa_prev_vld</th>
						<th>fec_notif_prev_ada</th>
						<th>fec_recep_prev_ada</th>
						<th>fec_subsa_prev_ada</th>
						<th>fec_notif_prev_mov</th>
						<th>fec_recep_prev_mov</th>
						<th>fec_subsa_prev_mov</th>
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

	<script>
		///-----BUSQUEDA POR COLUMNAS
		function filterGlobal () {
    $('#id_tabla').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}

function filterColumn ( i ) {
    $('#id_tabla').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
}
///----- TERMINA BUSQUEDA POR COLUMNAS

//********BUSQUEDA POR MONTO
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[29] ) || 0; // use data for the age column

        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
//*******TERMINA BUSQUEDA POR MONTO


		$(document).ready(function() {
    		var table=$('#id_tabla').DataTable({
    			responsive: true,
    			dom: 'Bfrtip',
    			ajax: {
					url: 'tabla_vista_etapa2.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "mas" },
				{ mData: "TOTAL" },
				{ mData: "faltantes" },
				{ mData: "monto_inversion" },
				{ mData: "nombre_propietario" },
				{ mData: "deno_proyecto" },
				{ mData: "domicilio_proyecto" },
				{ mData: "estadoMateria_sld" },
				{ mData: "notificacion_sld" },
				{ mData: "estadoMateria_dec" },
				{ mData: "notificacion_dec" },
				{ mData: "estadoMateria_dum" },
				{ mData: "notificacion_dum" },
				{ mData: "estadoMateria_mam" },
				{ mData: "notificacion_mam" },
				{ mData: "estadoMateria_vld" },
				{ mData: "notificacion_vld" },
				{ mData: "estadoMateria_ada" },
				{ mData: "notificacion_ada" },
				{ mData: "estadoMateria_pcl" },
				{ mData: "notificacion_pcl" },
				{ mData: "estadoMateria_ftl" },
				{ mData: "notificacion_sld" },
				{ mData: "estadoMateria_mov" },
				{ mData: "notificacion_sld" },
				
				{ mData: "materia" },
				{ mData: "giro" },
				{ mData: "descripcion_general" },
				{ mData: "origen_ingreso" },
				{ mData: "no_expediente" },
				{ mData: "folio_solicitud" },
				{ mData: "tel_propietario" },
				{ mData: "correo_propietario" },
				{ mData: "representante_legl" },
				{ mData: "tel_rep_legal" },
				{ mData: "correo_rep_legal" },
				{ mData: "no_emplos_dir" },
				{ mData: "no_emplos_ind" },
				{ mData: "monto_inversion_busqueda" },
				{ mData: "fec_notif_prev_sld" },
				{ mData: "fec_recep_prev_sld" },
				{ mData: "fec_subsa_prev_sld" },
				{ mData: "fec_notif_prev_dum" },
				{ mData: "fec_recep_prev_dum" },
				{ mData: "fec_subsa_prev_dum" },
				{ mData: "fec_notif_prev_pcl" },
				{ mData: "fec_recep_prev_pcl" },
				{ mData: "fec_subsa_prev_pcl" },
				{ mData: "fec_notif_prev_mam" },
				{ mData: "fec_recep_prev_mam" },
				{ mData: "fec_subsa_prev_mam" },
				{ mData: "fec_notif_prev_ftl" },
				{ mData: "fec_recep_prev_ftl" },
				{ mData: "fec_subsa_prev_ftl" },
				{ mData: "fec_notif_prev_dec" },
				{ mData: "fec_recep_prev_dec" },
				{ mData: "fec_subsa_prev_dec" },
				{ mData: "fec_notif_prev_vld" },
				{ mData: "fec_recep_prev_vld" },
				{ mData: "fec_subsa_prev_vld" },
				{ mData: "fec_notif_prev_ada" },
				{ mData: "fec_recep_prev_ada" },
				{ mData: "fec_subsa_prev_ada" },
				{ mData: "fec_notif_prev_mov" },
				{ mData: "fec_recep_prev_mov" },
				{ mData: "fec_subsa_prev_mov" }
				
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
    		$('input.global_filter').on( 'keyup click', function () {
		        filterGlobal();
		    } );

		    $('input.column_filter').on( 'keyup click', function () {
		        filterColumn( $(this).parents('tr').attr('data-column') );
		    } );

		     $('#min, #max').keyup( function() {
      			  table.draw();
  			  } );
    		$('.js-example-basic-multiple').select2();
    		$('.js-example-basic-multiple').prop("disabled", true);

    		/*$('#id_checkValidar').change(function () {

			 });*/
		});
	</script>

</html>