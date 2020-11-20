<?php
include '../conection_bd.php';
include("../segurity_session.php");
$id_general=$_POST['id_general'];
$id_etapa1=$_POST['id_etapa1'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");
$usuario=$_SESSION["id_user"];
$jsondata=array();

	$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET estado_etapa=10, fecha_turna_para_entrega ='$FECHA_CAPTURA', usuario_turna_para_entrega=$usuario where id=$id_etapa1");
if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

echo json_encode($jsondata);
 ?>