<?php
include '../conection_bd.php';
include("../segurity_session.php");
$id_procedencia=$_POST['id_procedencia'];
$id_emision=$_POST['id_emision'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");
$usuario=$_SESSION["id_user"];
$jsondata=array();

	$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET estado_etapa=9, fecha_turna_firmado_utic ='$FECHA_CAPTURA', usuario_turna_firmado_utic=$usuario where id=$id_procedencia");

	$resultado = mysqli_query($conection, "UPDATE emision SET estado_duf='TURNADO A FIRMA OK' where id=$id_emision");
if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

echo json_encode($jsondata);
 ?>