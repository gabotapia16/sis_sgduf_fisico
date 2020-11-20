<?php 
include '../conection_bd.php';
$fechaInicial=$_POST['fechaInicial'];
$fechaFinal=$_POST['fechaFinal'];
$jsondata=array();
$i=0;

$tablaPorFecha = mysqli_query($conection,"SELECT * FROM dictamenes WHERE ESTADO_DUF != 'CAPTURADO' and FECHA_EXPEDICION between '$fechaInicial' and '$fechaFinal' ORDER BY CONS_DUF");

foreach ($tablaPorFecha as $fila) {
	$jsondata['CONS_DUF'][$i]=$fila['CONS_DUF'];
	$jsondata['TIPO_DUF'][$i]=$fila['TIPO_DUF'];
	$jsondata['IMPACTO'][$i]=$fila['IMPACTO'];
	$jsondata['NOMBRE_PROPIETARIO'][$i]=$fila['NOMBRE_PROPIETARIO']." ".$fila['RAZON_SOCIAL'];
	$jsondata['DOMICILIO_CNENICOL'][$i]=$fila['DOMICILIO_CNENICOL'];
	$jsondata['TIPOS'][$i]=$fila['TIPO']." ".$fila['GIRO']." ".$fila['ACTIVIDAD'];
	$jsondata['EVALUACIONES_TECNICAS'][$i]=$fila['EVALUACIONES_TECNICAS'];
	$jsondata['MUNICIPIO'][$i]=$fila['MUNICIPIO'];
	$jsondata['NO_DUF_ANTERIOR'][$i]=$fila['NO_DUF_ANTERIOR'];
	$jsondata['FOLIO_DUF'][$i]=$fila['FOLIO_DUF'];
	$jsondata['ESTADO_DUF'][$i]=$fila['ESTADO_DUF'];
	$jsondata['MONTO_INVERSION'][$i]=$fila['MONTO_INVERSION'];
	$jsondata['DIAS_HORARIOS'][$i]=$fila['DIAS_HORARIOS'];
	$jsondata['NO_EMPLEOS_DIRECTOS'][$i]=$fila['NO_EMPLEOS_DIRECTOS'];
	$jsondata['NO_EMPLEOS_IND'][$i]=$fila['NO_EMPLEOS_IND'];
	$jsondata['SUPERFICIE_TOTAL'][$i]=$fila['SUPERFICIE_TOTAL'];
	$jsondata['SUPERFICIE_CONS'][$i]=$fila['SUPERFICIE_CONS'];
	$jsondata['SUPERFICIE_USO'][$i]=$fila['SUPERFICIE_USO'];
	$jsondata['NO_CAJA'][$i]=$fila['NO_CAJA'];
	$jsondata['FECHA_EXPEDICION'][$i]=$fila['FECHA_EXPEDICION'];
	$jsondata['FECHA_ENTREGA'][$i]=$fila['FECHA_ENTREGA'];
	$jsondata['FEDEERATAS'][$i]=$fila['FEDEERATAS'];
	$jsondata['fin'][0]=$i;
	$i++;
}

echo json_encode($jsondata);
 ?>