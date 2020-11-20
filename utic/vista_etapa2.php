<?php
include '../conection_bd.php';
include("../segurity_session.php");
$usuario=$_SESSION["id_user"];
 ?>
 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Seguimiento Etapa 2</title>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

		 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
          <li class="active"><a href="../menu_general">Menu Principal</a></li>
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
				<table id="id_tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th></th>
						<th>Sanitario</th>
						<th>Desarrolo Económico</th>
						<th>Desarrollo Urbano</th>
						<th>Medio Ambiente</th>
						<th>Vialidad</th>
						<th>Agua y Drenage</th>
						<th>Protección Civil</th>
						<th>Forestal</th>
						<th>Movilidad</th>
						<th>Materias Aplicables</th>
						<th>Materias Faltantes</th>
						<th>Monto</th>
						<th>Giro</th>
						<th>Actividad</th>
						<th>Descripción</th>
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
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
					</tr>
				</thead>
				<tbody>
					</tbody>
				</table>
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
		$(document).ready(function() {
    		$('#id_tabla').DataTable({
    			responsive: true,
    			dom: 'Bfrtip',
    			ajax: {
					url: 'tabla_vista_etapa2.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "mas" },
				{ mData: "estadoMateria_sld" },
				{ mData: "estadoMateria_dec" },
				{ mData: "estadoMateria_dum" },
				{ mData: "estadoMateria_mam" },
				{ mData: "estadoMateria_vld" },
				{ mData: "estadoMateria_ada" },
				{ mData: "estadoMateria_pcl" },
				{ mData: "estadoMateria_ftl" },
				{ mData: "estadoMateria_mov" },
				{ mData: "TOTAL" },
				{ mData: "faltantes" },
				{ mData: "monto_inversion" },
				{ mData: "materia" },
				{ mData: "giro" },
				{ mData: "descripcion_general" },
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
				{ mData: "no_emplos_dir" },
				{ mData: "no_emplos_ind" }
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