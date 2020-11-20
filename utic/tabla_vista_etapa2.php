<?php

include '../conection_bd.php';

 $resultado= mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia,  pi.ma_SLD, pi.ma_DUM, pi.ma_PCL, pi.ma_MAM, pi.ma_FTL, pi.ma_DEC, pi.ma_VLD, pi.ma_MOV, pi.ma_ADA, SUM(pi.ma_SLD+pi.ma_DUM+ pi.ma_PCL+pi.ma_MAM+ pi.ma_FTL+ pi.ma_DEC+pi.ma_VLD+pi.ma_MOV+ pi.ma_ADA) AS TOTAL, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.materia, dt.giro, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, pi.fec_notificacion_procedencia, pi.confirmado_etapa2, pi.turnado_etapa2, pi.etapa_inicio, ingreso_requisitos
FROM datos_generales dt
INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales
where pi.estado_etapa=3 AND pi.conclusion='' AND pi.ingreso_requisitos='ingresó RE'
GROUP BY dt.id
ORDER BY `dt`.`actividad_comercial`  DESC");

$c=0;
$inicio_etapa='';
$id_general=0;
$id_e1=0;

while($fila=$resultado->fetch_assoc()){
	$id_general=$fila['id_general'];
	$id_e1=$fila['id_procedencia'];
	$estadoMateria_sld='X';
	$estadoMateria_dum='X';
	$estadoMateria_pcl='X';
	$estadoMateria_mam='X';
	$estadoMateria_ftl='X';
	$estadoMateria_dec='X';
	$estadoMateria_vld='X';
	$estadoMateria_mov='X';
	$estadoMateria_ada='X';
	$checkSLD='';
	$checkDUM='';
	$checkPCL='';
	$checkMAM='';
	$checkFTL='';
	$checkDEC='';
	$checkVLD='';
	$checkMOV='';
	$checkADA='';
	$total=$fila['TOTAL'];
	$faltantes=0;
	if ($fila['ma_SLD']==1) {
		$checkSLD="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_sld WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_sld='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_sld="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_sld="<strong>$estado</strong>";
			$faltantes++;
		}

	}
	if ($fila['ma_DUM']==1) {
		$checkDUM="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_dum WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_dum='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dum="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dum="<strong>$estado</strong>";
			$faltantes++;
		}

	}
	if ($fila['ma_PCL']==1) {
		$checkPCL="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_pcl WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_pcl='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_pcl="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_pcl="<strong>$estado</strong>";
			$faltantes++;
		}
	}
	if ($fila['ma_MAM']==1) {
		$checkMAM="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_mam WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_mam='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mam="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mam="<strong>$estado</strong>";
			$faltantes++;
		}
	}
	if ($fila['ma_FTL']==1) {
		$checkFTL="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_ftl WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_ftl='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ftl="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ftl="<strong>$estado</strong>";
			$faltantes++;
		}
	}
	if ($fila['ma_DEC']==1) {
		$checkDEC="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_dec WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_dec='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dec="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dec="<strong>$estado</strong>";
			$faltantes++;
		}
	}
	if ($fila['ma_VLD']==1) {
		$checkVLD="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_vld WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_vld='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_vld="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_vld="<strong>$estado</strong>";
			$faltantes++;
		}
	}
	if ($fila['ma_MOV']==1) {
		$checkMOV="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_mov WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_mov='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mov="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mov="<strong>$estado</strong>";
			$faltantes++;
		}
	}
	if ($fila['ma_ADA']==1) {
		$checkADA="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep FROM ts_ada WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_ada='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ada="<strong>$estado</strong>";
		}
		else{
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ada="<strong>$estado</strong>";
			$faltantes++;
		}
	}


	$data[$c]["mas"] = "Más";
	$data[$c]["estadoMateria_sld"] = $checkSLD.' '.$estadoMateria_sld;
	$data[$c]["estadoMateria_dum"] = $checkDUM.' '.$estadoMateria_dum;
	$data[$c]["estadoMateria_pcl"] = $checkPCL.' '.$estadoMateria_pcl;
	$data[$c]["estadoMateria_mam"] = $checkMAM.' '.$estadoMateria_mam;
	$data[$c]["estadoMateria_ftl"] = $checkFTL.' '.$estadoMateria_ftl;
	$data[$c]["estadoMateria_dec"] = $checkDEC.' '.$estadoMateria_dec;
	$data[$c]["estadoMateria_vld"] = $checkVLD.' '.$estadoMateria_vld;
	$data[$c]["estadoMateria_mov"] = $checkMOV.' '.$estadoMateria_mov;
	$data[$c]["estadoMateria_ada"] = $checkADA.' '.$estadoMateria_ada;
	$data[$c]["TOTAL"] = "<strong>$total</strong>";
	$data[$c]["faltantes"] = "<strong>$faltantes</strong>";
    $data[$c]["monto_inversion"] = number_format($fila["monto_inversion"]);
    $data[$c]["materia"] = $fila["materia"];
    $data[$c]["giro"] = $fila["giro"];
    $data[$c]["descripcion_general"] = $fila["descripcion_general"];
    $data[$c]["origen_ingreso"] = $fila["origen_ingreso"];
    $data[$c]["no_expediente"] = $fila["no_expediente"];
    $data[$c]["folio_solicitud"] = $fila["folio_solicitud"];
    $data[$c]["nombre_propietario"] = $fila["nombre_propietario"];
    $data[$c]["deno_proyecto"] = $fila["deno_proyecto"];
    $data[$c]["domicilio_proyecto"] = $fila["domicilio_proyecto"].', '.$fila['municipio_proyecto'].', C.P. '.$fila['cp_proyecto'].', ESTADO DE MEXICO';
    $data[$c]["tel_propietario"] = $fila["tel_propietario"];
    $data[$c]["correo_propietario"] = $fila["correo_propietario"];
    $data[$c]["representante_legl"] = $fila["representante_legl"];
    $data[$c]["tel_rep_legal"] = $fila["tel_rep_legal"];
    $data[$c]["correo_rep_legal"] = $fila["correo_rep_legal"];
    $data[$c]["no_emplos_dir"] = $fila["no_emplos_dir"];
    $data[$c]["no_emplos_ind"] = $fila["no_emplos_ind"];
    $c++;
}

$results = ["sEcho" => 1,
	"iTotalRecords" => count($data),
	"iTotalDisplayRecords" => count($data),
	"aaData" => $data
];

echo json_encode($results);

?>