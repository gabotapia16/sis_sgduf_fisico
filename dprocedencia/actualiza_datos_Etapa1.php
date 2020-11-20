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
$etapa1=$_POST['etapa1'];
date_default_timezone_set('America/Mexico_City');
$usuario=$_POST['usuario'];
$FECHA_CAPTURA=date("Y-m-d H:i:s");
$FECHA_TURNADO=date("Y-m-d");
$idModificar=$_POST['id'];
//$usuario=80;

$datosGENERALES=1;
//$estadoEtapa=1;
//$usuario=1;
$jsondata=array();
$idGeneral=0;
$idEtapa1=0;

if ($etapa1==1) {
	$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET no_ofi_prevencion='$oficioPrevencion', estado_prevencion='$prevencion', fec_expedicion_prevencion='$fechaExpPrev', fec_notificacion_prevencion='$fechaNotPrev', no_ofi_procedencia='$oficioProcedencia', estado_procencia='$procedencia', fec_expedicion_procedencia='$fechaExpPro', fec_notificacion_procedencia='$fechaNotPro', ma_SLD='$sanitario1', ma_DUM='$urbano1', ma_PCL='$proteccion1', ma_MAM='$ambiental1', ma_FTL='$forestal1', ma_DEC='$comercial1', ma_VLD='$vial1', ma_MOV='$movilidad1', ma_ADA='$agua1', estado_etapa='$etapa1', usu_modificacion='$usuario', fech_modificacion='$FECHA_CAPTURA', turnado_etapa2='$FECHA_TURNADO' WHERE id=$idModificar");
}
else{
	$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET no_ofi_prevencion='$oficioPrevencion', estado_prevencion='$prevencion', fec_expedicion_prevencion='$fechaExpPrev', fec_notificacion_prevencion='$fechaNotPrev', no_ofi_procedencia='$oficioProcedencia', estado_procencia='$procedencia', fec_expedicion_procedencia='$fechaExpPro', fec_notificacion_procedencia='$fechaNotPro', ma_SLD='$sanitario1', ma_DUM='$urbano1', ma_PCL='$proteccion1', ma_MAM='$ambiental1', ma_FTL='$forestal1', ma_DEC='$comercial1', ma_VLD='$vial1', ma_MOV='$movilidad1', ma_ADA='$agua1', estado_etapa='$etapa1', usu_modificacion='$usuario', fech_modificacion='$FECHA_CAPTURA' WHERE id=$idModificar");
}


if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

	 echo json_encode($jsondata);
 ?>