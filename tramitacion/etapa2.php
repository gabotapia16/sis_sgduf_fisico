<?php 
include '../conection_bd.php';
$idEtapa1=$_GET['id_etapa1'];
$idDatosGenerales=$_GET['id_datosGenerales'];
$materias = mysqli_query($conection, "SELECT * FROM procedencia_integracion WHERE id=$idEtapa1");

foreach ($materias as $fila) {

	$impactoSanitario=$fila['ma_SLD'];
	$desarrolloEconomico=$fila['ma_DEC'];
	$ambiental=$fila['ma_MAM'];
	$vial=$fila['ma_VLD'];
	$urbano=$fila['ma_DUM'];
	$forestal=$fila['ma_FTL'];
	$movilidad=$fila['ma_MOV'];
	$proteccionCivil=$fila['ma_PCL'];
	$agua=$fila['ma_ADA'];
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Selección de Materias</title>
	.

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
	<div class="container">
		<div class="card">
			<h5 class="card-header text-white bg-info mb-3">Impactos</h5>
  			<div class="card-body">
				<form action="formularioetapa2.php"> 
					<div class="row" id="id_div_sanitario">
						<div class="col-md-3">
							<label for="">Impacto Sanitario</label>
						</div>
						<div class="col-md-8">
							<input type="text" value="ts_sld" name="tabla" style="display:none">
							<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
							<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
							<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form>
				<br>
				<form action="formularioetapa2.php">
					<div class="row" id="id_div_desarrollo" >
						<div class="col-3">
						<label for="">Desarrollo Económico</label>
						</div>
						<div class="col-8">
						<input type="text" value="ts_dec" name="tabla" style="display:none">
						<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
						<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
						<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form>
				<br>
				<form action="formularioetapa2.php">
					<div class="row" id="id_div_ambiental" >
						<div class="col-3">
						<label for="">Impacto Ambiental</label>
						</div>
						<div class="col-8">
						<input type="text" value="ts_mam" name="tabla" style="display:none">
						<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
						<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
						<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form>
				<br>
				<form action="formularioetapa2.php">
					<div class="row" id="id_div_vial" >
						<div class="col-3">
						<label for="">Impacto Vial</label>
						</div>
						<div class="col-8">
						<input type="text" value="ts_vld" name="tabla" style="display:none">
						<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
						<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
						<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form>
				<br>
				<form action="formularioetapa2.php">
					<div class="row" id="id_div_urbano" >
						<div class="col-3">
						<label for="">Impacto Urbano</label>
						</div>
						<div class="col-8">
						<input type="text" value="ts_dum" name="tabla" style="display:none">
						<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
						<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
						<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form>
				<br>
				<form action="formularioetapa2.php">
					<div class="row" id="id_div_forestal" >
						<div class="col-3">
						<label for="">Forestal</label>
						</div>
						<div class="col-8">
						<input type="text" value="ts_ftl" name="tabla" style="display:none">
						<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
						<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
						<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form>
				<br>
				<form action="formularioetapa2.php">
					<div class="row" id="id_div_movilidad" >
						<div class="col-3">
						<label for="">Movilidad</label>
						</div>
						<div class="col-8">
						<input type="text" value="ts_mov" name="tabla" style="display:none">
						<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
						<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
						<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form> 
				<br>
				<form action="formularioetapa2.php">
					<div class="row" id="id_div_civil" >
						<div class="col-3">
						<label for="">Protección Civil</label>
						</div>
						<div class="col-8">
						<input type="text" value="ts_pcl" name="tabla" style="display:none">
						<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
						<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
						<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form>
				<br>
				<form action="formularioetapa2.php">
					<div class="row" id="id_div_agua" >
						<div class="col-3">
						<label for="">Agua, Drenage y Alcantarillado</label>
						</div>
						<div class="col-8">
						<input type="text" value="ts_ada" name="tabla" style="display:none">
						<input type="text" value="<?php echo $idDatosGenerales ?>" name="idDatosGenerales" style="display:none">
						<input type="text" value="<?php echo $idEtapa1 ?>" name="idEtapa1" style="display:none">
						<button class="btn btn-outline-info">Capturar</button>
						</div>
					</div>
				</form>
				<center><button class="btn btn-primary">Finalizar <i class="fas fa-check-double"></i></button></center>
			</div>
		</div>
	</div>
</body>

<script>
	$(document).ready(function(){
		/*if (<?php echo $impactoSanitario?>==1) {}
		document.getElementById("id_div_sanitario").className = "p-3 mb-2 bg-success text-white";
		document.getElementById("id_icono_sanitario").className = "fas fa-check";
*/
		if (<?php echo $impactoSanitario;?> !=1) {
			document.getElementById('id_div_sanitario').style.display='hide';
		}
		if (<?php echo $desarrolloEconomico;?> !=1) {
			document.getElementById('id_div_desarrollo').style.display='hide';
		}
		if (<?php echo $ambiental;?> !=1) {
			document.getElementById('id_div_ambiental').style.display='hide';
		}
		if (<?php echo $vial;?> !=1) {
			document.getElementById('id_div_vial').style.display='hide';
		}
		if (<?php echo $urbano;?> !=1) {
			document.getElementById('id_div_urbano').style.display='hide';
		}
		if (<?php echo $forestal;?> !=1) {
			document.getElementById('id_div_forestal').style.display='hide';
		}
		if (<?php echo $movilidad;?> !=1) {
			document.getElementById('id_div_movilidad').style.display='hide';
		}
		if (<?php echo $proteccionCivil;?> !=1) {
			document.getElementById('id_div_civil').style.display='hide';
		}
		if (<?php echo $agua;?> !=1) {
			document.getElementById('id_div_agua').style.display='hide';
		}
	});

</script>
</html>