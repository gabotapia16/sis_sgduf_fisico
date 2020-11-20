<?php 
include("../segurity_session.php");
include '../conection_bd.php';
$usuario=$_SESSION["id_user"];
$jsondata=array();

$id_general=$_POST['id_general_dicatmen'];
$id_etapa1=$_POST['id_etapa1_dictamen'];
$tramite=$_POST['tramite'];
$impacto=$_POST['impacto'];
$tipo_duf=$_POST['tipo_duf'];
$dias=$_POST['dias'];
$fecha_expedicion=$_POST['fecha_expedicion'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");

$resultado=mysqli_query($conection,"UPDATE  emision SET 
	tipo_tramite='$tramite',
	impacto_riesgo='$impacto',
	tipo_duf='$tipo_duf',
	dias_horarios='$dias',
	estado_duf='GENERADO',
	fecha_expedicion='$fecha_expedicion',
	usuario_modifica=$usuario,
	fecha_modifica='$FECHA_CAPTURA'
	where id_procedencia=$id_etapa1 AND id_datos_generales=$id_general");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

	 echo json_encode($jsondata);

 ?>

