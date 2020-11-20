<?php
include("../segurity_session.php");
include '../conection_bd.php';
$usuario=$_SESSION["id_user"];
$jsondata=array();

$id_etapa1=$_POST['id_etapa1'];
$id_emision=$_POST['id_emision'];
$fecha_entrega=$_POST['fecha_entrega'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");

$resultado=mysqli_query($conection,"UPDATE  emision SET
	estado_duf='ENTREGADO',
	fecha_entrega='$fecha_entrega',
	usuario_modifica=$usuario,
	fecha_modifica='$FECHA_CAPTURA'
	where id=$id_emision");

$resultado=mysqli_query($conection,"UPDATE  procedencia_integracion SET estado_etapa=11
	where id=$id_etapa1");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

	 echo json_encode($jsondata);

 ?>

