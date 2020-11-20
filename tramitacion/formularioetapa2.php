<?php
include '../conection_bd.php';
include("../segurity_session.php");
$editar=$_GET['editar'];
$tabla=$_GET['tabla'];
$id_general=$_GET['id_general'];
$id_etapa1=$_GET['id_etapa1'];
$usuario=$_SESSION["id_user"];
$nombre='';
switch ($tabla) {
    case "ts_sld":
        $nombre="Impacto Sanitario";
        break;
    case "ts_vld":
        $nombre="Impacto Vial";
        break;
    case "ts_dum":
        $nombre="Desarrollo Urbano";
        break;
    case "ts_ftl":
        $nombre="Forestal";
        break;
    case "ts_mam":
        $nombre="Medio Ambiente";
        break;
    case "ts_mov":
        $nombre="Movilidad";
        break;
    case "ts_pcl":
        $nombre="Protección Civil";
        break;
    case "ts_dec":
        $nombre="Desarrollo Económico";
        break;
    case "ts_ada":
        $nombre="Agua, Drenage y Alcantarillado";
        break;
}
$resultado        = mysqli_query($conection, "SELECT id, id_datos_generales, id_procedencia, fec_ingreso_req_esp, fec_envio_dependencia, no_ofi_envio_remesa, fec_reception_remesa, fec_resp_dependencia, no_oficio_turno_resp, fec_reception_resp_dep, estado_respuesta_dep, fec_ofisol_invea, no_ofisol_invea, fec_ofiresp_invea, no_ofiresp_invea, fec_recepcion_ofiresp_invea, estado_invea, no_cons_prev, no_ofici_prev, fec_recepcion_prev, fec_notif_prev, fec_subsa_prev, no_ofici_subsa_prev, fec_recepcion_subsa_prev, estado_prev, fec_recepcion_evatec, no_ofici_evatec, fec_notif_evatec, estado_evatec, observaciones, bandera, num_oficio_respuesta, fecha_notificacion_evaluacion FROM $tabla WHERE id_datos_generales=$id_general AND id_procedencia=$id_etapa1");


      $datos = mysqli_fetch_assoc($resultado);
      foreach ($resultado as $fila) {
      	$fecha=$fila['fec_envio_dependencia'];
      }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tramitación y Seguimiento</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

		<!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!--Select2-->
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

		<!--Fontawsemo-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	 	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	 	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
	 	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><!--sweet alert-->
	 	<script src="sweetalert2.all.min.js"></script><!--sweet alert-->
		<!-- Optional: include a polyfill for ES6 Promises for IE11 --><!--sweet alert-->
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script><!--sweet alert-->
</head>
<body>
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <img alt="Brand" src="../imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="../inicio/inicio">Menu Principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

	<input type="text" id="id_tabla" value="<?php echo $tabla ?>" style="display:none">
	<input type="text" id="id_dg" value="<?php echo $id_general ?>" style="display:none">
	<input type="text" id="id_e1" value="<?php echo $id_etapa1 ?>" style="display:none">
	<input type="text" id="id_usuario" value="<?php echo $usuario ?>" style="display:none">
	<form class="was-validated" id="myForm">
		<div class="container p-3 mb-2 bg-light text-dark">
			<div class="p-3 mb-2 bg-info text-white">
				<center><h3>DATOS DE ENVÍO DE LA REMESA DE <?php echo $nombre ?></h3></center>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha en la que el usuario Ingresó Requisitos Específicos:</label>
						<br>
						<input type="date" value="<?php echo $datos['fec_ingreso_req_esp'] ?>" id="id_f_ingresoRequisitosEspecificos" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha en la que se Enviaron los requisitos específicos a la Dependencia:</label>
						<br>
						<input type="date" class="form-control" value="<?php echo $datos['fec_envio_dependencia'] ?>" id="id_f_envioDependencia">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">No. de Oficio con el que se enviaron los requisitos específicos a la dependencia: </label>
						<br>
						<input type="text" class="form-control" value="<?php echo $datos['no_ofi_envio_remesa'] ?>" id="id_num_OficioRemesaEnvio">
					</div>
				</div>
			</div><!--
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha de Recepción:</label>
						<br>
						<input type="date" class="form-control" value="<?php //echo $datos['fec_reception_remesa'] ?>" id="id_f_recepcionRemesa">
					</div>
				</div>
			</div>-->
			<div class="row">

			</div>
		</div>
		<div class="container p-3 mb-2 bg-light text-dark">
			<div class="p-3 mb-2 bg-info text-white">
				<center><h3>ESTADO GENERAL DE LA RESPUESTA</h3></center>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Estado de la Respuesta: </label>
						<br>
						<select class="custom-select" name=""id='id_select_estadoRespuesta' onclick="selectTipo()" required>
								<option selected value="<?php echo $datos['estado_respuesta_dep'] ?>"><?php echo $datos['estado_respuesta_dep'] ?></option>
								<option value="En Espera de Respuesta">En Espera de Respuesta</option>
								<option value="Requiere Visita">Requiere Visita INVEA</option>
								<option value="Prevención">Prevención</option>
								<option value="Evaluación Técnica Improcedente">Evaluación Técnica Improcedente</option>
								<option value="Evaluación Técnica Procedente">Evaluación Técnica Procedente</option>
								<option value="Ingresó DIR">Ingresó DIR</option>
								<option value="Ingresó Licencia">Ingresó Licencia</option>
			          	</select>
					</div>
				</div>
			</div>
		</div>
		<div class="container p-3 mb-2 bg-light text-dark">
			<div class="p-3 mb-2 bg-info text-white">
				<center><h3>DATOS DE LA EVALUACIÓN TÉCNICA</h3></center>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha del Oficio de Respuesta de la Evaluación Técnica: </label>
						<br>
						<input type="date" class="form-control" value="<?php echo $datos['fec_resp_dependencia'] ?>" id="id_f_respuestaArea">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">No. de Turno de la Evaluación Técnica (Oficialia de partes):</label>
						<br>
						<input type="text" class="form-control" value="<?php echo $datos['no_oficio_turno_resp'] ?>" id="id_num_oficioTurno">
					</div>
				</div><!--
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha de Recepción: </label>
						<br>
						<input type="date" class="form-control" value="<?php //echo $datos['fec_reception_resp_dep'] ?>" id="fechaRecepcionRespuesta">
					</div>
				</div>-->

				<div class="col-md-4">
					<div class="form-group col">
						<label class="">No. de Evaluación Técnica u Oficio:</label>
						<br>
						<input type="text" class="form-control" value="<?php echo $datos['no_ofici_evatec'] ?>" id="id_num_oficioEvaluacionTecnica">
					</div>
				</div>
				<div class="col-md-4" style="display:none">
					<div class="form-group col">
						<label class="">No. Oficio de Respuesta: </label>
						<br>
						<input type="text" class="form-control" value="<?php echo $datos['num_oficio_respuesta'] ?>" id="id_oficio_respuesta">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label for="">Fecha Notificación al Usuario</label>
						<input type="date" class="form-control" value="<?php echo $datos['fecha_notificacion_evaluacion'] ?>" id="id_fecha_notificacion_evaluacion">
					</div>
				</div>
			</div>
		</div>
		<div class="container p-3 mb-2 bg-light text-dark">
			<div class="p-3 mb-2 bg-info text-white">
				<center><h3>DATOS INVEAMEX</h3></center>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha de Recepción de la solicitud de visita: </label>
						<br>
						<input type="date" class="form-control"  value="<?php echo $datos['fec_ofiresp_invea'] ?>" id="id_f_respuestaOficioINVEA">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">No. de Oficio o Turno de la Solicitud para visita:</label>
						<br>
						<input type="text" class="form-control" value="<?php echo $datos['no_ofisol_invea'] ?>" id="id_num_oficioSolicitudVisitaINVEA">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha en la que se Solicitó la visíta al INVEAMEX:</label>
						<br>
						<input type="date" class="form-control" value="<?php echo $datos['fec_ofisol_invea'] ?>" id="id_f_solicitudOficioVisitaINVEA">
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Estado de la visita: </label>
						<br>
						<select class="custom-select" name=""id='id_select_estadoINVEA' >
								<option selected value="<?php echo $datos['estado_invea'] ?>"><?php echo $datos['estado_invea'] ?></option>
								<option value="NO EJECUTADA">No Ejecutada</option>
								<option value="EJECUTADA">Ejecutada</option>
			          	</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">No. Oficio de la Respuesta del INVEAMEX:</label>
						<br>
						<input type="text" class="form-control" value="<?php echo $datos['no_ofiresp_invea'] ?>" id="id_num_oficioRespuestaVisitaINVEA">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha de Recepción del Oficio de la Respuesta del INVEAMEX:</label>
						<br>
						<input type="date" class="form-control" value="<?php echo $datos['fec_recepcion_ofiresp_invea'] ?>" id="id_f_recepcionOficioRespuestaINVEA">
					</div>
				</div>

			</div>
		</div>
		<div class="container p-3 mb-2 bg-light text-dark">
			<div class="p-3 mb-2 bg-info text-white">
				<center><h3>DATOS PREVENCIÓN</h3></center>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha de la Recepción de la Prevención: </label>
						<br>
						<input type="date" class="form-control" value="<?php echo $datos['fec_recepcion_prev'] ?>" id="id_f_recepcionPrevencion">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group col">
						<label class="">No. de Oficio o Turno de la Prevención: </label>
						<br>
						<input type="text" class="form-control" value="<?php echo $datos['no_ofici_prev'] ?>" id="id_num_oficioPrevencion">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Número total de Prevenciones: </label>
						<br>
						<select class="custom-select" name=""id='id_select_numConsecutivo'>
								<option selected value="<?php echo $datos['no_cons_prev'] ?>"><?php echo $datos['no_cons_prev'] ?></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
			          	</select>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha Notificación de la Prevención al Usuario: </label>
						<br>
						<input type="date" class="form-control" value="<?php echo $datos['fec_notif_prev'] ?>" id="id_f_notificacionPrevencion">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha en la que Subsanó la Prevención el Usuario: </label>
						<br>
						<input type="date" class="form-control" value="<?php echo $datos['fec_subsa_prev'] ?>" id="id_f_subsanaPrevencion">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">No. de Oficio enviado a la Dependencia para Subsanar la Prevención: </label>
						<br>
						<input type="text" class="form-control" value="<?php echo $datos['no_ofici_subsa_prev'] ?>" id="id_num_oficioSubsanaPrevencion">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha Recepción del Oficio en la Dependencia con el que el Usuario Subsana la Prevención:</label>
						<br>
						<input type="date" class="form-control" value="<?php echo $datos['fec_recepcion_subsa_prev'] ?>" id="id_f_recepcionSubsanaPrevencion">
					</div>
				</div><!--
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Estado Prevención: </label>
						<br>
						<select class="custom-select" name=""id='id_select_estadoPrevencion' onclick="selectTipo()" >
								<option selected value="<?php //echo $datos['estado_prev'] ?>"><?php //echo $datos['estado_prev'] ?></option>
								<option value="Recibida">Recibida</option>
								<option value="Notificada">Notificada</option>
								<option value="Sin Notificar">Sin Notificar</option>
								<option value="Subsanada">Subsanada</option>
			          	</select>
					</div>
				</div>-->
			</div>
		</div>
		<!--<div class="container p-3 mb-2 bg-light text-dark">
			<div class="p-3 mb-2 bg-info text-white">
				<center><h3>DATOS EVALUACIÓN TÉCNICA</h3></center>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha Recepción de la Evaluación:</label>
						<br>
						<input type="date" class="form-control" value="<?php //echo $datos['fec_recepcion_evatec'] ?>" id="id_f_recepcionEvaluacion">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Fecha de Expedición :</label>
						<br>
						<input type="date" class="form-control" value="<?php //echo $datos['fec_notif_evatec'] ?>" id="id_f_notificaEvaluacionTecnica">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group col">
						<label class="">Estado de la Evaluación Técnica:</label>
						<br>
						<select class="custom-select" name=""id='id_select_estadoEvaluacionTecnica' >
								<option selected value="<?php //echo $datos['estado_evatec'] ?>"><?php //echo $datos['estado_evatec'] ?></option>
								<option value="Procedente">Procedente</option>
								<option value="No Procedente">No Procedente</option>
			          	</select>
					</div>
				</div>
			</div>
		</div>-->
		<div class="container p-3 mb-2 bg-light text-dark">
				<div class="p-3 mb-2 bg-info text-white">
					<center><h3>OBSERVACIONES GENERALES A LA MATERIA DE <?php echo $nombre ?></h3></center>
				</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group col">
						<label class="">Observaciones:</label>
						<br>
						<textarea  class="form-control" name="" id="id_observaciones" cols="30" rows="5">
							<?php echo $datos['observaciones'] ?>
						</textarea>
					</div>
				</div>
			</div>
		</div>
			<center><button type="submit" class="btn btn-primary">Guardar <i class="far fa-share-square"></i></button></center>
			<br>
			<br>
	</form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 	<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
 	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
 	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script>
 	//variables Globales
 	var tabla1='<?php echo $tabla; ?>';
	var idDatosGenerales1=<?php echo $id_general; ?>;
	var idEtapaUno=<?php echo $id_etapa1; ?>;
 </script>
<script>
	$("#myForm").on("submit", function(e){
		guardar();
		event.preventDefault();
	});

	$(document).ready(function() {
		if (<?php echo $editar ?>==0) {
			$('#myForm input').attr('disabled', 'disabled');
    		$('#myForm select').attr('disabled', 'disabled');
    		$('#myForm textarea').attr('disabled', 'disabled');
    		$('#myForm button').attr('disabled', 'disabled');
		}
	});
</script>

<script>
	function guardar(){
		$.ajax({
			url: 'guarda_etapa2.php',
			type: 'POST',
			dataType: 'JSON',
			data: {
				f_ingresoRequisitosEspecificos: document.getElementById('id_f_ingresoRequisitosEspecificos').value,
				f_envioDependencia: document.getElementById('id_f_envioDependencia').value,
				num_OficioRemesaEnvio: document.getElementById('id_num_OficioRemesaEnvio').value,
				//f_recepcionRemesa: document.getElementById('id_f_recepcionRemesa').value,
				f_respuestaArea: document.getElementById('id_f_respuestaArea').value,
				num_oficioTurno: document.getElementById('id_num_oficioTurno').value,
				//fechaRecepcionRespuesta: document.getElementById('fechaRecepcionRespuesta').value,
				select_estadoRespuesta: document.getElementById('id_select_estadoRespuesta').value,
				f_solicitudOficioVisitaINVEA: document.getElementById('id_f_solicitudOficioVisitaINVEA').value,
				num_oficioSolicitudVisitaINVEA: document.getElementById('id_num_oficioSolicitudVisitaINVEA').value,
				f_respuestaOficioINVEA: document.getElementById('id_f_respuestaOficioINVEA').value,
				num_oficioRespuestaVisitaINVEA: document.getElementById('id_num_oficioRespuestaVisitaINVEA').value,
				f_recepcionOficioRespuestaINVEA: document.getElementById('id_f_recepcionOficioRespuestaINVEA').value,
				select_estadoINVEA: document.getElementById('id_select_estadoINVEA').value,
				select_numConsecutivo: document.getElementById('id_select_numConsecutivo').value,
				num_oficioPrevencion: document.getElementById('id_num_oficioPrevencion').value,
				f_recepcionPrevencion: document.getElementById('id_f_recepcionPrevencion').value,
				f_notificacionPrevencion: document.getElementById('id_f_notificacionPrevencion').value,
				f_subsanaPrevencion: document.getElementById('id_f_subsanaPrevencion').value,
				num_oficioSubsanaPrevencion: document.getElementById('id_num_oficioSubsanaPrevencion').value,
				f_recepcionSubsanaPrevencion: document.getElementById('id_f_recepcionSubsanaPrevencion').value,
				//select_estadoPrevencion: document.getElementById('id_select_estadoPrevencion').value,
				//f_recepcionEvaluacion: document.getElementById('id_f_recepcionEvaluacion').value,
				num_oficioEvaluacionTecnica: document.getElementById('id_num_oficioEvaluacionTecnica').value,
				//f_notificaEvaluacionTecnica: document.getElementById('id_f_notificaEvaluacionTecnica').value,
				//select_estadoEvaluacionTecnica: document.getElementById('id_select_estadoEvaluacionTecnica').value,
				observaciones: document.getElementById('id_observaciones').value,
				tabla: document.getElementById('id_tabla').value,
				idDatosGenerales: document.getElementById('id_dg').value,
				idEtapa1: document.getElementById('id_e1').value,
				usuario: document.getElementById('id_usuario').value,
				oficio_respuesta: document.getElementById('id_oficio_respuesta').value,
				id_fecha_notificacion_evaluacion: document.getElementById('id_fecha_notificacion_evaluacion').value
			},
		})
		.done(function() {
			console.log("success");
			//alert(' ya chingamos');
			swal({
	          title: "¡Se Guardó con Éxito!",
	          icon: "success",
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	            regresar();
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

	function regresar(){
		window.close();
	}
</script>
</html>