<?php 
include '../conection_bd.php';

$id_general=$_POST['id_general'];
$id_emision=$_POST['id_emision'];

$jsondata=array();

$resultado1 = mysqli_query($conection,"SELECT municipio_proyecto FROM datos_generales  WHERE id=$id_general");
$datos = mysqli_fetch_assoc($resultado1);
$municipio=$datos['municipio_proyecto'];

$resultado2 = mysqli_query($conection,"SELECT NOMENCLATURA from municipios WHERE MUNICIPIO='$municipio'");
$datos = mysqli_fetch_assoc($resultado2);
$clave_municipio=$datos['NOMENCLATURA'];//obtengo la clave del municipio

$resultado3 = mysqli_query($conection,"SELECT MAX(consecutivo) as max_consecutivo FROM emision");
$datos = mysqli_fetch_assoc($resultado3);
$consecutivo=$datos['max_consecutivo']+1;//obtengo el consecutivo
$consecutivo_folio='';
$no_caracteres= strlen($consecutivo);
    switch ($no_caracteres) {
        case 1:
            $consecutivo_folio="0000".$consecutivo;
            break;
            case 2:
            $consecutivo_folio="000".$consecutivo;
            break;
            case 3:
            $consecutivo_folio="00".$consecutivo;
            break;
            case 4:
            $consecutivo_folio="0".$consecutivo;
            break;
            case 5:
            $consecutivo_folio="".$consecutivo;
            break;
    }

date_default_timezone_set('America/Mexico_City');
$anio_expedicion=date("Y");//obtengo el año de expedicion

$folio=$clave_municipio.'-15-'.$consecutivo_folio.'-COFAEM-'.$anio_expedicion;//folio del DUF
$folio_encriptado=base64_encode($folio);//Folio del DUF encriptado

$resultado4 = mysqli_query($conection,"UPDATE emision SET clave_municipio='$clave_municipio', consecutivo=$consecutivo, anio_expedicion='$anio_expedicion', folio_duf='$folio', folio_encrypted='$folio_encriptado', no_hoja_seguridad=$consecutivo, estado_duf='PENDIENTE DE IMPRESION' WHERE  id=$id_emision");

if($resultado4 != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado4;
	 }

	 echo json_encode($jsondata);
 ?>