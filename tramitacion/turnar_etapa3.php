
<?php
include '../conection_bd.php';
include("../segurity_session.php");
$idGeneral=$_POST['idGeneral'];
$idEtapa1=$_POST['idEtapa1'];
$usuario=$_SESSION["id_user"];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d");
$jsondata=array();

$materia_sld='aprobada';
$materia_dum='aprobada';
$materia_pcl='aprobada';
$materia_mam='aprobada';
$materia_dec='aprobada';
$materia_mov='aprobada';
$materia_vld='aprobada';
$materia_ada='aprobada';
$materia_ftl='aprobada';

$resultado = mysqli_query($conection, "SELECT ma_SLD, ma_DUM, ma_PCL, ma_MAM, ma_FTL, ma_DEC, ma_VLD, ma_MOV, ma_ADA FROM procedencia_integracion WHERE id_datos_generales=$idGeneral AND id=$idEtapa1");

$fila = mysqli_fetch_assoc($resultado);

if ($fila['ma_SLD']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_sld WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_sld='aprobada';
	}
	else{
		$materia_sld='rechazada';
	}
}
if ($fila['ma_DUM']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_dum WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_dum='aprobada';
	}
	else{
		$materia_dum='rechazada';
	}
}
if ($fila['ma_PCL']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_pcl WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_pcl='aprobada';
	}
	else{
		$materia_pcl='rechazada';
	}
}
if ($fila['ma_MAM']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_mam WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_mam='aprobada';
	}
	else{
		$materia_mam='rechazada';
	}
}
if ($fila['ma_DEC']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_dec WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_dec='aprobada';
	}
	else{
		$materia_dec='rechazada';
	}
}
if ($fila['ma_MOV']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_mov WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_mov='aprobada';
	}
	else{
		$materia_mov='rechazada';
	}
}
if ($fila['ma_VLD']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_vld WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_vld='aprobada';
	}
	else{
		$materia_vld='rechazada';
	}
}
if ($fila['ma_ADA']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_ada WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_ada='aprobada';
	}
	else{
		$materia_ada='rechazada';
	}
}
if ($fila['ma_FTL']==1) {
	$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_ftl WHERE id_procedencia=$idEtapa1");
	$datos = mysqli_fetch_assoc($sql);
	if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
		$materia_ftl='aprobada';
	}
	else{
		$materia_ftl='rechazada';
	}
}

$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET usuario_turna_etapa3=$usuario, turnado_etapa3='$FECHA_CAPTURA', estado_etapa='4' WHERE id_datos_generales=$idGeneral AND id=$idEtapa1");
/*if (
	$materia_sld=='aprobada' && $materia_dum=='aprobada' && $materia_pcl=='aprobada' && $materia_mam=='aprobada' && $materia_dec=='aprobada' && $materia_mov=='aprobada' && $materia_vld=='aprobada' && $materia_ada=='aprobada' && $materia_ftl=='aprobada') {
	$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET usuario_turna_etapa3=$usuario, turnado_etapa3='$FECHA_CAPTURA', estado_etapa='4' WHERE id_datos_generales=$idGeneral AND id=$idEtapa1");

	$jsondata["estado"]='turnado';
}
else{
	$jsondata["estado"]='rechazado';
}
*/

if($sql != true){

	 	$jsondata["sql"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["sql"]=$sql;
	 }

	 echo json_encode($jsondata);
 ?>
