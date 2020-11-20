<?php 
include("../segurity_session.php");
include '../conection_bd.php';
$usuario=$_SESSION["id_user"];
$id_general_concluir=$_POST['id_general_concluir'];
$id_etapa1_concluir=$_POST['id_etapa1_concluir'];
$no_duf=$_POST['no_duf'];
$conclusion=$_POST['conclusion'];
$no_oficio_conclusion=$_POST['no_oficio_conclusion'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d");
$jsondata=array();

if ($no_duf=='') {
	$no_duf=0;
}

$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET conclusion='$conclusion', no_oficio_conclusion='$no_oficio_conclusion', consecutivo_duf=$no_duf,  usuario_conclusion='$usuario', fecha_conclusion='$FECHA_CAPTURA' WHERE id=$id_etapa1_concluir AND id_datos_generales=$id_general_concluir");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 	header("Location: turnadosetapa2.php");
	 }

	 echo json_encode($jsondata);
 ?>