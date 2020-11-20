<?php 
include '../conection_bd.php';
$id=$_POST['id'];
$jsondata=array();
$select="<option selected hidden>Seleccione una opción</option>";


	$resultado = mysqli_query($conection, "SELECT * FROM giros WHERE id_materia =$id");
	foreach ($resultado as $fila) {
		$select="$select.<option value='".$fila['nombre_giros']."'>".$fila['nombre_giros']."</option>";
	}
	$jsondata["sele"]=$select;
//echo  $select;
echo json_encode($jsondata);
 ?>