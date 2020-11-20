<?php
include("../segurity_session.php");
include("../conection_bd.php");
$tablaDictamenesNormal = mysqli_query($conection,"SELECT * FROM dictamenes WHERE ESTADO_DUF != 'CAPTURADO' ORDER BY CONS_DUF");
$tablaDictamenesAcuerdo = mysqli_query($conection,"SELECT * FROM dictamenes WHERE ESTADO_DUF != 'CAPTURADO' AND TIPO_DUF='ACUERDO' ORDER BY CONS_DUF");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>dictamenes</title>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


		 <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
		<!--Fontawsemo-->
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
          <li class="active"><a href="../menu_emision">Menu principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

        <div class="container">
          <div class="panel panel-default">
            <div class="panel-heading"><p align="center">EMISIÓN DE DICTAMENES</p></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
            </div>
          </div>
         </div>
        <?php
        $contar_capturados = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'CAPTURADO'"));
        $contar_GENERADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'GENERADO'"));
        $contar_FIRMADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'FIRMADO'"));
        $contar_ENTREGADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'ENTREGADO'"));
        $contar_IMPRESO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'IMPRESO'"));
        $contar_CANCELADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'CANCELADO'"));
        //------------------------------------------------------
        $queryid = "SELECT MAX(FECHA_MODIFICACION) AS FECHA_MODIFICACION FROM dictamenes";
        $res= mysqli_query($conection,$queryid);
        $datos = mysqli_fetch_assoc($res);
        $fecha_mayor= $datos['FECHA_MODIFICACION'];
        //------------------------------------------------------

        $sql = mysqli_query($conection,"SELECT * FROM dictamenes WHERE CONS_DUF>0 ");
        $contar = mysqli_num_rows($sql);
        ?>
        <ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">Datos Generales</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#menu1">Consultar por Fecha</a>
			</li>
		</ul>
        <div class="container">
                <div class=table-responsive>
                    <table class=table>
                      <tr>
                           <td align=left><p>Fecha de ultima modificacion: <?php echo $fecha_mayor; ?></h3></td>
                           <td align=right><h3> Total de registros en sistema: <?php echo $contar ?> </h3></td>
                           <td colspan=2><div name=Resultado_SQL id=Resultado_SQL></div></td>
                      </tr>
                      </table>
                 </div>
                  <div class=table-responsive>
                        <table class='table'>
                            <tr align=center>
                              <td colspan='4' align=center><h3>DICTAMENES EMITIDOS</h3></td>
                            </tr>
                            <tr align=center>
                              <td width='25%'><h4>En revisión de caratula: <?php echo $contar_GENERADO; ?></h3></td>
                              <td width='25%'><h4>Impresos en hoja de seguridad: <?php echo $contar_IMPRESO ?> </h3></td>
                              <td width='25%'><h4>Firmados (DG): <?php echo $contar_FIRMADO; ?></h3></td>
                              <td width='25%'><h4>Entregados: <?php echo $contar_ENTREGADO ?> </h3></td>
                              <td width='25%'><h4>Cancelados: <?php echo $contar_CANCELADO ?> </h3></td>
                          	</tr>
                            <tr align=center>
                              <td  width='25%' class='table-info'></td>
                              <td  width='25%' class='table-warning'></td>
                              <td  style="background-color:#FCAC42"></td>
                              <td  width='25%' class='table-success'></td>
                              <td  width='25%' class='table-danger'></td>
                          	</tr>
                       </table>
                    </div> <br>
                    <!--
                         <div class=table-responsive>
                        <table class='table'>
                            <tr align=center>
                              <td colspan='4' align=center><h3>DICTAMENES EMITIDOS</h3></td>
                            </tr>
                            <tr align=center>
                              <td width='25%'><h3>Generados: <?php /*echo $contar_GENERADO; ?></h3></td>
                              <td width='25%'><h3>Firmados: <?php echo $contar_FIRMADO; ?></h3></td>
                              <td width='25%'><h3>Entregados: <?php echo $contar_ENTREGADO */?> </h3></td></tr>
                            <tr align=center>
                              <td  width='25%' class='table-danger'></td>
                              <td  width='25%' class='table-warning'></td>
                              <td  width='25%' class='table-success'></td></tr>
                         </table>
         </div></div>-->

	<div class="tab-content container-fluid">
		<div id="home" class="tab-pane active container"><br>
			<!--<div id="menu1" class="container tab-pane fade"><br>-->

			<table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
	        <tr>
	            <th>No.Consecutivo</th>
	            <th>Editar</th>
				<th>Tipo DUF</th>
				<th>Tipo Impacto</th>
				<th>No. Expediente</th>
				<th>Propietario</th>
				<th>Razón Social</th>
				<th>Domicilio</th>
				<th>Tipo/Giro/Actividad</th>
				<th>Evaluaciones Técnicas</th>
				<th>Municipio</th>
				<th>DUF Anterior</th>
				<th>DUF</th>
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
				<th>Código de Digitalización</th>
				<th>Estado DUF</th>
			</tr>
        </thead>
        <tbody>
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
						<th>Propietario</th>
						<th>Razón Social</th>
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
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 	<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
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
    			ajax: {
					url: 'obtiene_dictamenes.php',
		        	type: 'POST'
				},
			columns: [
				{ mData: "CONS_DUF" },
				{ mData: "editar" },
				{ mData: "TIPO_DUF" },
				{ mData: "IMPACTO" },
				{ mData: "NO_EXPEDIENTE" },
				{ mData: "NOMBRE_PROPIETARIO" },
				{ mData: "RAZON_SOCIAL" },
				{ mData: "DOMICILIO_CNENICOL" },
				{ mData: "TIPO_GIRO_ACTIVIDAD" },
				{ mData: "EVALUACIONES_TECNICAS" },
				{ mData: "MUNICIPIO" },
				{ mData: "NO_DUF_ANTERIOR" },
				{ mData: "FOLIO_DUF" },
				{ mData: "MONTO_INVERSION" },
				{ mData: "DIAS_HORARIOS" },
				{ mData: "NO_EMPLEOS_DIRECTOS" },
				{ mData: "NO_EMPLEOS_IND" },
				{ mData: "SUPERFICIE_TOTAL" },
				{ mData: "SUPERFICIE_CONS" },
				{ mData: "SUPERFICIE_USO" },
				{ mData: "NO_CAJA" },
				{ mData: "FECHA_EXPEDICION" },
				{ mData: "FECHA_ENTREGA" },
				{ mData: "FEDEERATAS" },
				{ mData: "CODIGO_BARRAS" },
				{ mData: "ESTADO_DUF" }
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
               			footer: true,
		    		},
               		'pageLength'
        		]
    		});
    		/*exportOptions: {
			   				columns: [0,4,5,6,9,16,17,18,7,8,13,20,11,12,3,2,10,13,14,15,16,20,22,23,24]
			   			}
			   			*/
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
        		buttons: [
               		{ extend: 'excelHtml5',
               			footer: true
		    		},
               		'pageLength'
        		]
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