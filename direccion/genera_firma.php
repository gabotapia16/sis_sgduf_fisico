<?php
include '../conection_bd.php';
include("../segurity_session.php");
$id_emision=$_POST['id_emision'];
$id_procedencia=$_POST['id_procedencia'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");
$usuario=$_SESSION["id_user"];
$jsondata=array();

	$resultado = mysqli_query($conection, "UPDATE emision SET estado_duf='TURNADO A FIRMA' where id=$id_emision");
	$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET usuario_firma_autografa=$usuario, fecha_firma_autografa='$FECHA_CAPTURA' where id=$id_procedencia");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

echo json_encode($jsondata);
 ?>