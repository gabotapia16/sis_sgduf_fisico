<?php 
include '../conection_bd.php';
$prevencion=$_POST['prevencion'];
$oficioPrevencion=$_POST['oficioPrevencion'];
$fechaExpPrev=$_POST['fechaExpPrev'];
$fechaNotPrev=$_POST['fechaNotPrev'];
$oficioProcedencia=$_POST['oficioProcedencia'];
$procedencia=$_POST['procedencia'];
$fechaExpPro=$_POST['fechaExpPro'];
$fechaNotPro=$_POST['fechaNotPro'];
$sanitario1=$_POST['sanitario1'];
$vial1=$_POST['vial1'];
$urbano1=$_POST['urbano1'];
$comercial1=$_POST['comercial1'];
$ambiental1=$_POST['ambiental1'];
$movilidad1=$_POST['movilidad1'];
$forestal1=$_POST['forestal1'];
$agua1=$_POST['agua1'];
$proteccion1=$_POST['proteccion1'];
$expediente=$_POST['expediente'];
$nombrePropietario=$_POST['nombrePropietario'];
$nombreProyecto=$_POST['nombreProyecto'];
$etapa1=$_POST['etapa1'];
date_default_timezone_set('America/Mexico_City');
$usuario=$_POST['usuario'];
$FECHA_CAPTURA=date("Y-m-d");

$datosGENERALES=1;
//$estadoEtapa=1;
//$usuario=1;
$jsondata=array();
$idGeneral=0;
$idEtapa1=0;


$resultado1 = mysqli_query($conection, "SELECT id FROM datos_generales WHERE no_expediente ='$expediente' AND nombre_propietario = '$nombrePropietario' AND deno_proyecto = '$nombreProyecto' ORDER BY id DESC LIMIT 1 ");

foreach ($resultado1 as $fila ) {
	$idGeneral=$fila['id'];
}



if ($etapa1==1) {
	$resultado = mysqli_query($conection, "INSERT INTO procedencia_integracion(id_datos_generales, no_ofi_prevencion, estado_prevencion, fec_expedicion_prevencion, fec_notificacion_prevencion, no_ofi_procedencia, estado_procencia, fec_expedicion_procedencia, fec_notificacion_procedencia, ma_SLD, ma_DUM, ma_PCL, ma_MAM, ma_FTL, ma_DEC, ma_VLD, ma_MOV, ma_ADA, estado_etapa, usu_captura, fec_captura, usu_modificacion, fech_modificacion, turnado_etapa2) VALUES ($idGeneral, '$oficioPrevencion', '$prevencion', '$fechaExpPrev', '$fechaNotPrev', '$oficioProcedencia', '$procedencia', '$fechaExpPro', '$fechaNotPro', $sanitario1, $urbano1, $proteccion1, $ambiental1, $forestal1, $comercial1, $vial1, $movilidad1, $agua1, $etapa1, $usuario, '$FECHA_CAPTURA', 0, '0000-00-00', '$FECHA_CAPTURA')");
}
else{
	$resultado = mysqli_query($conection, "INSERT INTO procedencia_integracion(id_datos_generales, no_ofi_prevencion, estado_prevencion, fec_expedicion_prevencion, fec_notificacion_prevencion, no_ofi_procedencia, estado_procencia, fec_expedicion_procedencia, fec_notificacion_procedencia, ma_SLD, ma_DUM, ma_PCL, ma_MAM, ma_FTL, ma_DEC, ma_VLD, ma_MOV, ma_ADA, estado_etapa, usu_captura, fec_captura, usu_modificacion, fech_modificacion) VALUES ($idGeneral, '$oficioPrevencion', '$prevencion', '$fechaExpPrev', '$fechaNotPrev', '$oficioProcedencia', '$procedencia', '$fechaExpPro', '$fechaNotPro', $sanitario1, $urbano1, $proteccion1, $ambiental1, $forestal1, $comercial1, $vial1, $movilidad1, $agua1, $etapa1, $usuario, '$FECHA_CAPTURA', 0, '0000-00-00')");
}

$resultado2 = mysqli_query($conection, "SELECT id FROM procedencia_integracion WHERE id_datos_generales = $idGeneral ORDER BY id DESC LIMIT 1");
foreach ($resultado2 as $fila ) {
	$idEtapa1=$fila['id'];
}

$resultado3 = mysqli_query($conection, "UPDATE datos_generales SET id_procedencia = $idEtapa1 WHERE id = $idGeneral");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

	 echo json_encode($jsondata);
 ?>