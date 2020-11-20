<?php
include("../segurity_session.php");
include("../conection_bd.php");
$tablaDictamenesNormal = mysqli_query($conection,"SELECT * FROM dictamenes WHERE ESTADO_DUF != 'CAPTURADO' ORDER BY CONS_DUF");
$tablaDictamenesAcuerdo = mysqli_query($conection,"SELECT * FROM dictamenes WHERE ESTADO_DUF != 'CAPTURADO' AND TIPO_DUF='ACUERDO' ORDER BY CONS_DUF");
include '../menu.php';
?>

        <div class="container">
          <div class="panel panel-default">
            <div class="panel-heading"><p align="center">EMISIÓN DE DICTAMENES</p></div>

          </div>
         </div>
        <?php
        $contar_capturados = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'CAPTURADO'"));
        $contar_GENERADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'GENERADO'"));
        $contar_FIRMADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'FIRMADO'"));
        $contar_ENTREGADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'ENTREGADO'"));
        //------------------------------------------------------
        $queryid = "SELECT MAX(FECHA_MODIFICACION) AS FECHA_MODIFICACION FROM dictamenes";
        $res= mysqli_query($conection,$queryid);
        $datos = mysqli_fetch_assoc($res);
        $fecha_mayor= $datos['FECHA_MODIFICACION'];
        //------------------------------------------------------

        $sql = mysqli_query($conection,"SELECT * FROM dictamenes WHERE ESTADO_DUF != 'CAPTURADO' ORDER BY CONS_DUF");
        $contar = mysqli_num_rows($sql);
        ?>
        <ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">DUFS EMITIDOS</a>
			</li>

		</ul>

	<div class="tab-content container-fluid">
		<div id="home" class="tab-pane active container"><br>
			<!--<div id="menu1" class="container tab-pane fade"><br>-->

			<table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>No.Consecutivo</th>
						<th>Tipo DUF</th>
						<th>No. Expediente</th>
						<th>Propietario/Razón Social</th>
						<th>Domicilio</th>
						<th>Tipo/Giro/Actividad</th>
						<th>Evaluaciones Técnicas</th>
						<th>Municipio</th>
						<th>DUF</th>
						<th>Fecha de Expedición</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tablaDictamenesAcuerdo as $fila): ?>


						<tr align=center class='table' style="font-size: 13px;">
							<td> <?php echo $fila['CONS_DUF']; ?> </td>
							<td> <?php echo $fila['TIPO_DUF']; ?> </td>
							<td> <?php echo $fila['NO_EXPEDIENTE']; ?> </td>
							<td> <?php echo $fila['NOMBRE_PROPIETARIO'];?>/ <?php echo $fila['RAZON_SOCIAL']; ?></td>
							<td> <?php echo $fila['DOMICILIO_CNENICOL']; ?> </td>
							<td> <?php echo $fila['TIPO']; ?>/<?php echo $fila['GIRO']; ?>/<?php echo $fila['ACTIVIDAD']; ?></td>
							<td> <?php echo $fila['EVALUACIONES_TECNICAS']; ?> </td>
							<td> <?php echo $fila['MUNICIPIO']; ?> </td>
							<td> <?php echo $fila['FOLIO_DUF']; ?> </td>
							<td> <?php echo $fila['FECHA_EXPEDICION']; ?> </td>
						</tr>

					<?php endforeach?>

				</tbody>
			</table>
		</div>
		<div id="menu1" class="container tab-pane fade"><br>
			<div class="row">
				<div class="col-md-1">
					<p>de:</p>
				</div>
				<div class="col-md-3">
					<input type="date" class="form-control datepicker" id="id_fechaInicial" name="">
				</div>
				<div class="col-md-1">
					<p>a:</p>
				</div>
				<div class="col-md-3">
					<input type="date" class="form-control datepicker" id="id_fechaFinal" name="">
				</div>
				<div class="col-md-2">
					<button type="button" class="btn btn-info" onclick="consultarFechas()">Consultar</button>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-1">
				</div>

			</div>
			<table class="table table-striped" id="tabla2">
				<thead>
					<tr>
						<th>No.Consecutivo</th>
						<th>Tipo DUF</th>
						<th>Tipo Impacto</th>
						<th>Propietario/Razón Social</th>
						<th>Domicilio</th>
						<th>Tipo/Giro/Actividad</th>
						<th>Evaluaciones Técnicas</th>
						<th>Municipio</th>
						<th>DUF Anterior</th>
						<th>DUF</th>
						<th>Estado DUF</th>
						<th>Monto de Inversión</th>
						<th>Días y Horarios de Funcionamiento</th>
						<th>Empleos Directos</th>
						<th>Empleos Indirectos</th>
						<th>Superficie Total</th>
						<th>Superficie Contruida</th>
						<th>Superficie en Uso</th>
						<th>Número de Caja</th>
						<th>Fecha de Expedición</th>
						<th>Fecha de Entrega</th>
						<th>Fe de Erratas</th>
					</tr>
				</thead>
				<tbody id="id_contenido">

				</tbody>
			</table>

			<table class="table">
				<caption>ESTADÍSTICAS DUFS EMITIDOS POR LA COMISIÓN DE FACTIBILIDAD DEL ESTADO DE MÉXICO

				</caption>
				<thead>
					<tr>
						<th>TIPO DE DUF</th>
						<th> IMPACTO</th>
						<th> NO. DE DUFS EMITIDOS</th>
						<th>MONTO DE INVERSIÓN</th>
						<th>NO. DE EMPLEOS DIRECTOS</th>
						<th>NO. DE EMPLEOS INDIRECTOS</th>
					</tr>
				</thead>
				<tbody id="id_contenido2">

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
 	<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 	<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
 	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

<script>
		$(document).ready(function() {
			$("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
              console.log( 'show tab' );
                $($.fn.dataTable.tables(true)).DataTable()
                  .columns.adjust()
                  .responsive.recalc();
            });
    		$('#tabla').DataTable({
    			responsive: true,
    			dom: 'Bfrtip',
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
        		buttons: [
               		{
               			footer: false,
               			/*exportOptions: {
			   				columns: [0,3,4,5,9,17,18,19,6,8,14,21,11,12,1,2,10,13,15,16,20,22,23]
		    			}*/
		    		},
               		'pageLength'
        		]
    		});

    	});
	</script>

	<script>
		function consultarFechas(){
		$.ajax({
			url: 'generaReporteDictamenes.php',
			type: 'POST',
			dataType: 'JSON',
			data: {fechaInicial: document.getElementById('id_fechaInicial').value,
					fechaFinal: document.getElementById('id_fechaFinal').value
				},
		})
		.done(function(datos) {
			console.log("success");
			var tabla=document.getElementById("id_contenido2");
			var totalG=0;
			tabla.innerHTML='';
			/*for (var i = 0; i <= datos.fin[0]; i++) {
				tabla.innerHTML+="<tr><td>"+datos.CONS_DUF[i]+"</td><td>"+datos.TIPO_DUF[i]+"</td><td>"+datos.IMPACTO[i]+"</td><td>"+datos.NOMBRE_PROPIETARIO[i]+"</td><td>"+datos.DOMICILIO_CNENICOL[i]+"</td><td>"+datos.TIPOS[i]+"</td><td>"+datos.EVALUACIONES_TECNICAS[i]+"</td><td>"+datos.MUNICIPIO[i]+"</td><td>"+datos.NO_DUF_ANTERIOR[i]+"</td><td>"+datos.FOLIO_DUF[i]+"</td><td>"+datos.ESTADO_DUF[i]+"</td><td>"+datos.MONTO_INVERSION[i]+"</td><td>"+datos.DIAS_HORARIOS[i]+"</td><td>"+datos.NO_EMPLEOS_DIRECTOS[i]+"</td><td>"+datos.NO_EMPLEOS_IND[i]+"</td><td>"+datos.SUPERFICIE_TOTAL[i]+"</td><td>"+datos.SUPERFICIE_CONS[i]+"</td><td>"+datos.SUPERFICIE_USO[i]+"</td><td>"+datos.NO_CAJA[i]+"</td><td>"+datos.FECHA_EXPEDICION[i]+"</td><td>"+datos.FECHA_ENTREGA[i]+"</td><td>"+datos.FEDEERATAS[i]+"</td></tr>";
			}
			*/
			for (var i = 0; i < datos.fin[0]; i++) {
				tabla.innerHTML="<tr><td>"+datos.TOTAL_TIPO_DUF[i]+"</td><td>"+datos.TIPO_DUF[i]+"</td><td>"+datos.IMPACTO[i]+"</td><td>"+datos.MONTO_INVERSION_TOTAL[i]+"</td><td>"+datos.EMPLEOS_DIRECTOS[i]+"</td><td>"+datos.EMPLEOS_INDIRECTOS[i]+"</td></tr>";
			}

			$('#tabla2').DataTable({
    			responsive: true,
    			dom: 'Bfrtip',
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

    		});
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