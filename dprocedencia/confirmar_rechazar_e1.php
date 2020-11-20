<?php
include '../conection_bd.php';
include("../segurity_session.php");
$idGeneral=$_POST['idGeneral'];
$idEtapa1=$_POST['idEtapa1'];
$estado=$_POST['estado'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");
$usuario=$_SESSION["id_user"];
$jsondata=array();
$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET estado_etapa='$estado', confirmado_etapa1='$FECHA_CAPTURA', usuario_confirma_etapa1=$usuario where id=$idEtapa1");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

echo json_encode($jsondata);

?>