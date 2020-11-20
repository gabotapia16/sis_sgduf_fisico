<?php 
include '../conection_bd.php';
$fechaInicial=$_POST['fechaInicial'];
$fechaFinal=$_POST['fechaFinal'];
$jsondata=array();
$sql = mysqli_query($conection, "SELECT us.NOMBRES AS nombre,  us.APELLIDO_PATERNO as apellido, COUNT(dt.id) as TOTAL, dt.fech_captura FROM datos_generales dt
INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura where dt.fech_captura BETWEEN '$fechaInicial' AND '$fechaFinal' GROUP by us.ID_USER ORDER BY us.NOMBRES, dt.fech_captura");
$i=0;
foreach ($sql as $fila) {
	$jsondata['nombre'][$i]=$fila['nombre']." ".$fila['apellido'];
	$jsondata['total'][$i]=$fila['TOTAL'];
	$jsondata['fin'][0]=$i;
	$i++;
}
echo json_encode($jsondata);
?>