<?php 

include '../conection_bd.php';
include("../segurity_session.php");
$usuario=$_SESSION["id_user"];

$idGeneral=$_POST['idGeneral'];
$idEtapa1=$_POST['idEtapa1'];
$valor=$_POST['valor'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");
$jsondata=array();

$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET ingreso_requisitos='$valor', usuario_edito_requisitos=$usuario, fecha_edito_requisitos='$FECHA_CAPTURA' WHERE id=$idEtapa1");


if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

	 echo json_encode($jsondata);

 ?>