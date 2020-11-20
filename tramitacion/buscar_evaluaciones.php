<?php
include '../conection_bd.php';
$idEtapa1=$_POST['idEtapa1'];
$idGeneral=$_POST['idGeneral'];
$jsondata=array();
$select='';
$selectVisita='';
$selectPrevencion='';
$selectProcedente='';
$selectImprocedente='';
$selectEspera='';
$selectDirLic='';
$resultado = mysqli_query($conection, "SELECT * FROM procedencia_integracion where id=$idEtapa1");
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
	$bandera=$fila['bandera_evaluaciones'];
} 


//crea el registro de las evaluaciones tecnicas
if ($bandera!=1) {
	$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET bandera_evaluaciones=1 where id=$idEtapa1");
	if ($jsondata["ma_SLD"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_sld(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
	if ($jsondata["ma_DUM"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_dum(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
	if ($jsondata["ma_PCL"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_pcl(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
	if ($jsondata["ma_MAM"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_mam(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
	if ($jsondata["ma_FTL"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_ftl(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
	if ($jsondata["ma_DEC"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_dec(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
	if ($jsondata["ma_VLD"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_vld(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
	if ($jsondata["ma_MOV"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_mov(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
	if ($jsondata["ma_ADA"]==1) {
		$resultado = mysqli_query($conection, "INSERT INTO ts_ada(id_datos_generales, id_procedencia) VALUES($idGeneral,$idEtapa1)");
	}
}

$resultado = mysqli_query($conection, "SELECT * FROM procedencia_integracion where id=$idEtapa1 an");

if ($jsondata["ma_SLD"]==1) {
		$select="$select.<option value=ts_sld>Salubridad</option>";
		$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_sld WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Salubridad</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Salubridad</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Salubridad</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Salubridad</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Salubridad</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Salubridad</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Salubridad</option>";
				break;
			default:
				$select;
				break;
		}
	}
if ($jsondata["ma_DUM"]==1) {
	$select="$select.<option value=ts_dum>Desarrollo Urbano y Metropolitano</option>";
	$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_dum WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Desarrollo Urbano</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Desarrollo Urbano</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Desarrollo Urbano</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Desarrollo Urbano</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Desarrollo Urbano</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Desarrollo Urbano</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Desarrollo Urbano</option>";
				break;
			default:
				$select;
				break;
		}
}
if ($jsondata["ma_PCL"]==1) {
	$select="$select.<option value=ts_pcl>Protección Civil</option>";
	$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_pcl WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Protección Civil</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Protección Civil</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Protección Civil</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Protección Civil</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Protección Civil</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Protección Civil</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Protección Civil</option>";
				break;
			default:
				$select;
				break;
		}
}
if ($jsondata["ma_MAM"]==1) {
	$select="$select.<option value=ts_mam>Medio Ambiente</option>";
	$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_mam WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Medio Ambiente</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Medio Ambiente</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Medio Ambiente</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Medio Ambiente</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Medio Ambiente</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Medio Ambiente</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Medio Ambiente</option>";
				break;
			default:
				$select;
				break;
		}
}
if ($jsondata["ma_FTL"]==1) {
	$select="$select.<option value=ts_ftl>Forestal</option>";
	$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_ftl WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Forestal</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Forestal</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Forestal</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Forestal</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Forestal</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Forestal</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Forestal</option>";
				break;
			default:
				$select;
				break;
		}
}
if ($jsondata["ma_DEC"]==1) {
	$select="$select.<option value=ts_dec>Comercial Automotríz</option>";
	$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_dec WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Comercial Automotríz</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Comercial Automotríz</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Comercial Automotríz</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Comercial Automotríz</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Comercial Automotríz</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Comercial Automotríz</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Comercial Automotríz</option>";
				break;
			default:
				$select;
				break;
		}
}
if ($jsondata["ma_VLD"]==1) {
	$select="$select.<option value=ts_vld>Vialidad</option>";
	$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_vld WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Vialidad</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Vialidad</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Vialidad</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Vialidad</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Vialidad</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Vialidad</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Vialidad</option>";
				break;
			default:
				$select;
				break;
		}
}
if ($jsondata["ma_MOV"]==1) {
	$select="$select.<option value=ts_mov>Movilidad</option>";
	$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_mov WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Movilidad</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Movilidad</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Movilidad</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Movilidad</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Movilidad</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Movilidad</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Movilidad</option>";
				break;
			default:
				$select;
				break;
		}
}
if ($jsondata["ma_ADA"]==1) {
	$select="$select.<option value=ts_ada>Agua, Drenage y Alcantarillado</option>";
	$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_ada WHERE id_datos_generales=$idGeneral AND id_procedencia=$idEtapa1");
		$datos = mysqli_fetch_assoc($resultado);
		switch ($datos['estado_respuesta_dep']) {
			case "Requiere Visita":
				$selectVisita="$selectVisita.<option selected>Agua, Drenage</option>";
				break;
			case 'Prevención':
				$selectPrevencion="$selectPrevencion.<option selected>Agua, Drenage</option>";
				break;
			case 'Evaluación Técnica Procedente':
				$selectProcedente="$selectProcedente.<option selected>Agua, Drenage</option>";
				break;
			case 'Evaluación Técnica Improcedente':
				$selectImprocedente="$selectImprocedente.<option selected>Agua, Drenage</option>";
				break;
			case 'En Espera de Respuesta':
				$selectEspera="$selectEspera.<option selected>Agua, Drenage</option>";
				break;
			case 'Ingresó DIR':
				$selectDirLic="$selectDirLic.<option selected>Agua, Drenage</option>";
				break;
			case 'Ingresó Licencia':
				$selectDirLic="$selectDirLic.<option selected>Agua, Drenage</option>";
				break;
			default:
				$select;
				break;
		}
}

$jsondata["sele"]=$select;
$jsondata["selectVisita"]=$selectVisita;
$jsondata["selectPrevencion"]=$selectPrevencion;
$jsondata["selectProcedente"]=$selectProcedente;
$jsondata["selectImprocedente"]=$selectImprocedente;
$jsondata["selectEspera"]=$selectEspera;
$jsondata["selectDirLic"]=$selectDirLic;

echo json_encode($jsondata);
 ?>