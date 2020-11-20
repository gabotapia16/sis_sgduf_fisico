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
	$notificacion_sld='';
	$notificacion_dum='';
	$notificacion_pcl='';
	$notificacion_mam='';
	$notificacion_ftl='';
	$notificacion_dec='';
	$notificacion_vld='';
	$notificacion_mov='';
	$notificacion_ada='';

	$fec_notif_prev_sld='';
	$fec_recep_prev_sld='';
	$fec_subsa_prev_sld='';
	$fec_notif_prev_dum	='';
	$fec_recep_prev_dum	='';
	$fec_subsa_prev_dum	='';
	$fec_notif_prev_pcl='';
	$fec_recep_prev_pcl='';
	$fec_subsa_prev_pcl='';
	$fec_notif_prev_mam	='';
	$fec_recep_prev_mam	='';
	$fec_subsa_prev_mam	='';
	$fec_notif_prev_ftl='';
	$fec_recep_prev_ftl='';
	$fec_subsa_prev_ftl='';
	$fec_notif_prev_dec='';
	$fec_recep_prev_dec='';
	$fec_subsa_prev_dec='';
	$fec_notif_prev_vld='';
	$fec_recep_prev_vld='';
	$fec_subsa_prev_vld='';
	$fec_notif_prev_ada='';
	$fec_recep_prev_ada='';
	$fec_subsa_prev_ada='';
	$fec_notif_prev_mov='';
	$fec_recep_prev_mov='';
	$fec_subsa_prev_mov='';

	$total=$fila['TOTAL'];
	$faltantes=0;
	if ($fila['ma_SLD']==1) {
		$checkSLD="<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='id_checkValidar' checked><label class='custom-control-label'></label></div>";
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_sld WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_sld		=$datos['fec_notif_prev'];
		$fec_recep_prev_sld		=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_sld		=$datos['fec_subsa_prev'];
		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_sld='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_sld="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2015-01-01') {
				$notificacion_sld='NOTIFICADO';
			}else{
				$notificacion_sld='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_sld="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_sld='NOTIFICADO';
			}
			else{
				$notificacion_sld='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_sld="<strong>$estado</strong>";
			$notificacion_sld=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_dum WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_dum		=$datos['fec_notif_prev'];
		$fec_recep_prev_dum		=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_dum		=$datos['fec_subsa_prev'];
		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_dum='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dum="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2018-01-01') {
				$notificacion_dum='NOTIFICADO';
			}else{
				$notificacion_dum='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dum="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_dum='NOTIFICADO';
			}
			else{
				$notificacion_dum='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dum="<strong>$estado</strong>";
			$notificacion_dum=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_pcl WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_pcl	=$datos['fec_notif_prev'];
		$fec_recep_prev_pcl	=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_pcl	=$datos['fec_subsa_prev'];

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_pcl='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_pcl="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2018-01-01') {
				$notificacion_pcl='NOTIFICADO';
			}else{
				$notificacion_pcl='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_pcl="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_pcl='NOTIFICADO';
			}
			else{
				$notificacion_pcl='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_pcl="<strong>$estado</strong>";
			$notificacion_pcl=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_mam WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_mam		=$datos['fec_notif_prev'];
		$fec_recep_prev_mam		=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_mam		=$datos['fec_subsa_prev'];

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_mam='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mam="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2018-01-01') {
				$notificacion_mam='NOTIFICADO';
			}else{
				$notificacion_mam='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mam="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_mam='NOTIFICADO';
			}
			else{
				$notificacion_mam='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mam="<strong>$estado</strong>";
			$notificacion_mam=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_ftl WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_ftl		=$datos['fec_notif_prev'];
		$fec_recep_prev_ftl		=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_ftl		=$datos['fec_subsa_prev'];

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_ftl='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ftl="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2018-01-01') {
				$notificacion_ftl='NOTIFICADO';
			}else{
				$notificacion_ftl='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ftl="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_ftl='NOTIFICADO';
			}
			else{
				$notificacion_ftl='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ftl="<strong>$estado</strong>";
			$notificacion_ftl=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_dec WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_dec		=$datos['fec_notif_prev'];
		$fec_recep_prev_dec		=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_dec		=$datos['fec_subsa_prev'];

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_dec='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dec="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2018-01-01') {
				$notificacion_dec='NOTIFICADO';
			}else{
				$notificacion_dec='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dec="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_dec='NOTIFICADO';
			}
			else{
				$notificacion_dec='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_dec="<strong>$estado</strong>";
			$notificacion_dec=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_vld WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_vld		=$datos['fec_notif_prev'];
		$fec_recep_prev_vld		=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_vld		=$datos['fec_subsa_prev'];

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_vld='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_vld="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2018-01-01') {
				$notificacion_vld='NOTIFICADO';
			}else{
				$notificacion_vld='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_vld="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_vld='NOTIFICADO';
			}
			else{
				$notificacion_vld='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_vld="<strong>$estado</strong>";
			$notificacion_vld=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_mov WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_mov		=$datos['fec_notif_prev'];
		$fec_recep_prev_mov		=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_mov		=$datos['fec_subsa_prev'];

		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_mov='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mov="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2018-01-01') {
				$notificacion_mov='NOTIFICADO';
			}else{
				$notificacion_mov='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mov="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_mov='NOTIFICADO';
			}
			else{
				$notificacion_mov='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_mov="<strong>$estado</strong>";
			$notificacion_mov=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
		$sql=mysqli_query($conection,"SELECT estado_respuesta_dep, fecha_notificacion_evaluacion, fec_notif_prev ,estado_invea, fec_recepcion_prev, fec_subsa_prev FROM ts_ada WHERE id_procedencia=$id_e1");
		$datos = mysqli_fetch_assoc($sql);
		$fec_notif_prev_ada		=$datos['fec_notif_prev'];
		$fec_recep_prev_ada		=$datos['fec_recepcion_prev'];
		$fec_subsa_prev_ada		=$datos['fec_subsa_prev'];
		if ($datos['estado_respuesta_dep']=='') {
			$estadoMateria_ada='';
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Evaluación Técnica Procedente' || $datos['estado_respuesta_dep']=='Evaluación Técnica Improcedente') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ada="<strong>$estado</strong>";
			if ($datos['fecha_notificacion_evaluacion']>'2018-01-01') {
				$notificacion_ada='NOTIFICADO';
			}else{
				$notificacion_ada='SIN NOTIFICAR';
			}
		}
		else if ($datos['estado_respuesta_dep']=='Prevención') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ada="<strong>$estado</strong>";
			if ($datos['fec_notif_prev']>'2015-01-01') {
				$notificacion_ada='NOTIFICADO';
			}
			else{
				$notificacion_ada='SIN NOTIFICAR';
			}
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Requiere Visita') {
			$estado=$datos['estado_respuesta_dep'];
			$estadoMateria_ada="<strong>$estado</strong>";
			$notificacion_ada=$datos['estado_invea'];
			$faltantes++;
		}
		else if ($datos['estado_respuesta_dep']=='Ingresó DIR' || $datos['estado_respuesta_dep']=='Ingresó Licencia') {
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
	$data[$c]["fec_notif_prev_sld"] = $fec_notif_prev_sld;
	$data[$c]["fec_recep_prev_sld"] = $fec_recep_prev_sld;
	$data[$c]["fec_subsa_prev_sld"] = $fec_subsa_prev_sld;
	$data[$c]["fec_notif_prev_dum"] = $fec_notif_prev_dum;
	$data[$c]["fec_recep_prev_dum"] = $fec_recep_prev_dum;
	$data[$c]["fec_subsa_prev_dum"] = $fec_subsa_prev_dum;
	$data[$c]["fec_notif_prev_pcl"] = $fec_notif_prev_pcl;
	$data[$c]["fec_recep_prev_pcl"] = $fec_recep_prev_pcl;
	$data[$c]["fec_subsa_prev_pcl"] = $fec_subsa_prev_pcl;
	$data[$c]["fec_notif_prev_mam"] = $fec_notif_prev_mam;
	$data[$c]["fec_recep_prev_mam"] = $fec_recep_prev_mam;
	$data[$c]["fec_subsa_prev_mam"] = $fec_subsa_prev_mam;
	$data[$c]["fec_notif_prev_ftl"] = $fec_notif_prev_ftl;
	$data[$c]["fec_recep_prev_ftl"] = $fec_recep_prev_ftl;
	$data[$c]["fec_subsa_prev_ftl"] = $fec_subsa_prev_ftl;
	$data[$c]["fec_notif_prev_dec"] = $fec_notif_prev_dec;
	$data[$c]["fec_recep_prev_dec"] = $fec_recep_prev_dec;
	$data[$c]["fec_subsa_prev_dec"] = $fec_subsa_prev_dec;
	$data[$c]["fec_notif_prev_vld"] = $fec_notif_prev_vld;
	$data[$c]["fec_recep_prev_vld"] = $fec_recep_prev_vld;
	$data[$c]["fec_subsa_prev_vld"] = $fec_subsa_prev_vld;
	$data[$c]["fec_notif_prev_ada"] = $fec_notif_prev_ada;
	$data[$c]["fec_recep_prev_ada"] = $fec_recep_prev_ada;
	$data[$c]["fec_subsa_prev_ada"] = $fec_subsa_prev_ada;
	$data[$c]["fec_notif_prev_mov"] = $fec_notif_prev_mov;
	$data[$c]["fec_recep_prev_mov"] = $fec_recep_prev_mov;
	$data[$c]["fec_subsa_prev_mov"] = $fec_subsa_prev_mov;


	$data[$c]["estadoMateria_sld"] = $checkSLD.' '.$estadoMateria_sld;
	$data[$c]["notificacion_sld"] = $notificacion_sld;
	$data[$c]["estadoMateria_dum"] = $checkDUM.' '.$estadoMateria_dum;
	$data[$c]["notificacion_dum"] = $notificacion_dum;
	$data[$c]["estadoMateria_pcl"] = $checkPCL.' '.$estadoMateria_pcl;
	$data[$c]["notificacion_pcl"] = $notificacion_pcl;
	$data[$c]["estadoMateria_mam"] = $checkMAM.' '.$estadoMateria_mam;
	$data[$c]["notificacion_mam"] = $notificacion_mam;
	$data[$c]["estadoMateria_ftl"] = $checkFTL.' '.$estadoMateria_ftl;
	$data[$c]["notificacion_ftl"] = $notificacion_ftl;
	$data[$c]["estadoMateria_dec"] = $checkDEC.' '.$estadoMateria_dec;
	$data[$c]["notificacion_dec"] = $notificacion_dec;
	$data[$c]["estadoMateria_vld"] = $checkVLD.' '.$estadoMateria_vld;
	$data[$c]["notificacion_vld"] = $notificacion_vld;
	$data[$c]["estadoMateria_mov"] = $checkMOV.' '.$estadoMateria_mov;
	$data[$c]["notificacion_mov"] = $notificacion_mov;
	$data[$c]["estadoMateria_ada"] = $checkADA.' '.$estadoMateria_ada;
	$data[$c]["notificacion_ada"] = $notificacion_ada;
	$data[$c]["TOTAL"] = "<center><strong>$total</strong></center>";
	$data[$c]["faltantes"] = "<center><p class='text-danger'><strong>$faltantes</strong></p></center>";
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
    $data[$c]["monto_inversion_busqueda"] = $fila["monto_inversion"];
    $c++;
}

$results = ["sEcho" => 1,
	"iTotalRecords" => count($data),
	"iTotalDisplayRecords" => count($data),
	"aaData" => $data
];

echo json_encode($results);

?>