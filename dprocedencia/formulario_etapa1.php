<?php 
include("../segurity_session.php");
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>ETAPA 1</title>
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
	 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<form id="myForm">
			<div class="container p-3 mb-2 bg-light text-dark">
				<div class="p-3 mb-2 bg-info text-white">
					<center><h3>DATOS DE PREVENCIÓN</h3></center>
				</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col">
								<label class="">Estado Prevención: </label>
								<br>
								<select class="js-example-basic-single custom-select" name="id_prevencion"id='id_prevencion' required>
									<option value="" selected hidden>Seleccione una opción</option>
									<option value="Sin Prevención" >Sin Prevención</option>
									<option value="Con Prevención sin notificar" >Con Prevención sin notificar</option>
									<option value="Con Prevención notificada" >Con Prevención notificada</option>
				               	</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group col">
								<label>No. de oficio Prevencion</label>
								<input type="text" class="form-control" id="id_oficio" pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ-]+">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group col">
								<label>Fecha Expedición de Prevención:</label>
								<input id="id_fechaExpedicion" class="form-control" type="date" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group col">
								<label>Fecha Notificación de Prevención:</label>
								<input id="id_fechaNotificacion" class="form-control" type="date" required>
							</div>
						</div>
					</div>
				</div>
				<div class="container p-3 mb-2 bg-light text-dark">
					<div class="p-3 mb-2 bg-info text-white">
						<center><h3>DATOS DE PROCEDENCIA JURÍDICA</h3></center>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col">
								<label class="">Estado Procedencia: </label>
								<br>
								<select class="js-example-basic-single custom-select" name="id_procedencia"id='id_procedencia' required>
									<option value="" selected hidden>Seleccione una opción</option>
									<option value="Sin Procedencia" >Sin Procedencia</option>
									<option value="Con Procedencia sin notificar" >Con Procedencia sin notificar</option>
									<option value="Con Procedencia notificada" >Con Procedencia notificada</option>
				               	</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group col">
								<label>No. de oficio Procedencia</label>
								<input type="text" class="form-control" id="id_oficioProcedencia" pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ-]+">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group col">
								<label>Fecha Expedición de Prevención:</label>
								<input id="id_fechaExpedicionProcendencia" class="form-control" type="date" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group col">
								<label>Fecha Notificación de Prevención:</label>
								<input id="id_fechaNotificacionProcedencia" class="form-control" type="date" required>
							</div>
						</div>
					</div>
					<div class="p-3 mb-2 bg-info text-white">
							<center><h3>MATERIAS APLICABLES SEGÚN LA PROCEDENCIA JURÍDICA</h3></center>
						</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>IMPACTO SANITARIO </label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkSanitario" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkSanitario">SÍ</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>IMPACTO URBANO</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkUrbano" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkUrbano">SÍ</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>PROTECCION CIVIL</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkProteccion" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkProteccion">SÍ</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>IMPACTO AMBIENTAL</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkAmbiental" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkAmbiental">SÍ</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>FORESTAL</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkForestal" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkForestal">SÍ</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>COMERCIAL AUTOMOTRÍZ</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkComercial" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkComercial">SÍ</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>IMPACTO VIAL</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkVial" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkVial">SÍ</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>MOVILIDAD</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkMovilidad" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkMovilidad">SÍ</label>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>AGUA, DRENAJE Y ALCANTARILLADO</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkAgua" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkAgua">SÍ</label>
								</div>
							</div>
						</div>
					</div>
					<div class="p-3 mb-2 bg-info text-white">
						<center><h3>ESTADO DE LA ETAPA</h3></center>
					</div>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<div class="form-group row">
								<br>
								<label>Enviar a Etapa 2</label>
								<div class="col-md-1">							
								</div>
								<div class="custom-control custom-checkbox mb-3">
									<input type="checkbox" class="custom-control-input" id="id_checkEtapa2" onclick="checkRepresentante()" >
									<label class="custom-control-label" for="id_checkEtapa2">SÍ</label>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>
			<center><button type="button" class="btn btn-primary" onclick="guardar()" id="">Finalizar Captura</button></center>
		</form>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	</body>

	<script>
		$("#myForm").on("submit", function(e)
			{
				guardar();
			});

		function guardar(){
			
			var sanitario = document.getElementById('id_checkSanitario').checked;
			var vial = document.getElementById('id_checkVial').checked;
			var urbano = document.getElementById('id_checkUrbano').checked;
			var comercial = document.getElementById('id_checkComercial').checked;
			var ambiental = document.getElementById('id_checkAmbiental').checked;
			var movilidad = document.getElementById('id_checkMovilidad').checked;
			var forestal = document.getElementById('id_checkForestal').checked;
			var agua = document.getElementById('id_checkAgua').checked;
			var proteccion = document.getElementById('id_checkProteccion').checked;
			var etapa = document.getElementById('id_checkEtapa2').checked;
			if(sanitario)
			{
				sanitario=1;
			}
			else {
				sanitario=0;
			}
			if (vial) {
				vial=1;
			}
			else{
				vial=0
			}
			if(urbano)
			{
				urbano=1;
			}
			else {
				urbano=0;
			}
			if(comercial)
			{
				comercial=1;
			}
			else {
				comercial=0;
			}
			if(comercial)
			{
				comercial=1;
			}
			else {
				comercial=0;
			}
			if(ambiental)
			{
				ambiental=1;
			}
			else {
				ambiental=0;
			}
			if(movilidad)
			{
				movilidad=1;
			}
			else {
				movilidad=0;
			}
			if(forestal)
			{
				forestal=1;
			}
			else {
				forestal=0;
			}
			if(agua)
			{
				agua=1;
			}
			else {
				agua=0;
			}
			if(proteccion)
			{
				proteccion=1;
			}
			else {
				proteccion=0;
			}
			if(etapa)
			{
				etapa=1;
			}
			else {
				etapa=0;
			}


			$.ajax({
				url: 'guardar_etapa1.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					prevencion: document.getElementById('id_prevencion').value,
					oficioPrevencion: document.getElementById('id_oficio').value,
					fechaExpPrev: document.getElementById('id_fechaExpedicion').value,
					fechaNotPrev: document.getElementById('id_fechaNotificacion').value,
					oficioProcedencia: document.getElementById('id_oficioProcedencia').value,
					procedencia: document.getElementById('id_procedencia').value,
					fechaExpPro: document.getElementById('id_fechaExpedicionProcendencia').value,
					fechaNotPro: document.getElementById('id_fechaNotificacionProcedencia').value,
					sanitario1: sanitario,
					vial1: vial,
					urbano1: urbano,
					comercial1: comercial,
					ambiental1: ambiental,
					movilidad1: movilidad,
					forestal1: forestal,
					agua1: agua,
					proteccion1: proteccion,
					etapa1: etapa
				},
			})
			.done(function() {
				console.log("success");
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