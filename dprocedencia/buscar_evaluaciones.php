<?php
include '../conection_bd.php';
$id=$_POST['id'];
$jsondata=array();
$tabla_usuarios_expediente = mysqli_query($conection, "SELECT dt.no_caja, dt.no_expediente, dt.nombre_propietario, dt.deno_proyecto, dt.domicilio_proyecto, us.NOMBRES, us.APELLIDO_PATERNO FROM datos_generales dt INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura ORDER BY dt.no_caja");
$resultado = mysqli_query($conection, "SELECT * FROM procedencia_integracion where id=$id");
foreach ($resultado as $fila) {
	$jsondata["ma_SLD"]=$fila['ma_SLD'];
	$jsondata["ma_DUM"]=$fila['ma_DUM'];
	$jsondata["ma_PCL"]=$fila['ma_PCL'];
	$jsondata["ma_MAM"]=$fila['ma_MAM'];
	$jsondata["ma_FTL"]=$fila['ma_FTL'];
	$jsondata["ma_DEC"]=$fila['ma_DEC'];
	$jsondata["ma_VLD"]=$fila['ma_VLD'];
	$jsondata["ma_MOV"]=$fila['ma_MOV'];
	$jsondata["ma_ADA"]=$fila['ma_ADA'];
} 
echo json_encode($jsondata);
 ?>