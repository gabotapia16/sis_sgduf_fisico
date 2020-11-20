<?php
include '../conection_bd.php';
include '../conection_bd_nueva.php';
include("../segurity_session.php");
$id_general=$_POST['id_general'];
$id_etapa1=$_POST['id_etapa1'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");
$usuario=$_SESSION["id_user"];
$jsondata=array();

	$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET estado_etapa=7, fecha_turnado_utic='$FECHA_CAPTURA', usuario_turna_utic=$usuario where id=$id_etapa1");

	$resultado = mysqli_query($conection,"SELECT  dt.persona_juridicolectiva, dt.nombre_propietario, dt.correo_propietario, em.tipo_tramite, dt.fecha_ingreso, dt.folio_solicitud, dt.no_expediente, em.impacto_riesgo,dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.doc_personalidad, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.doc_posesion,dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, dt.sfc_total, dt.sfc_construida, dt.sfc_prevista_cosnt,dt.sfc_prevista_uso,pi.ma_SLD, pi.ma_DEC, pi.ma_MAM, pi.ma_DUM, pi.ma_PCL, pi.ma_VLD, pi.ma_MOV, pi.ma_ADA, pi.ma_FTL, pi.no_ofi_procedencia,em.tipo_tramite, em.impacto_riesgo, em.tipo_duf, em.dias_horarios, em.vigencia_duf, mp.NOMENCLATURA as clave_municipio, em.consecutivo,em.anio_expedicion, em.folio_duf, em.folio_encrypted, em.no_hoja_seguridad, em.fecha_expedicion, em.fecha_entrega, em.fedeerratas, em.fecha_elaboracion_fedeerratas, em.no_duf_anterior,em.fecha_resolucion, em.no_oficio_resolucion, em.usuario_modifica, em.fecha_modifica, em.id_datos_generales, em.id_procedencia FROM emision em
		INNER JOIN datos_generales dt ON dt.id = em.id_datos_generales
		INNER JOIN procedencia_integracion pi ON pi.id = em.id_procedencia
        INNER JOIN municipios mp on mp.MUNICIPIO = dt.municipio_proyecto
		WHERE pi.id_datos_generales > 0 AND pi.estado_etapa =7 and pi.id=$id_etapa1");
	    $contar = mysqli_num_rows($resultado);
	    if($contar == 0){
	    	echo "<p align=center>No hay datos</p>";
	    }else{
	        while($row=mysqli_fetch_array($resultado))
	        {
	        	$persona_juridicolectiva=$row['persona_juridicolectiva'];
				$nombre_propietario=$row['nombre_propietario'];
				$correo_propietario=$row['correo_propietario'];
				$tipo_tramite=$row['tipo_tramite'];
				$fecha_ingreso=$row['fecha_ingreso'];
				$folio_solicitud=$row['folio_solicitud'];
				$no_expediente=$row['no_expediente'];
				$impacto_riesgo=$row['impacto_riesgo'];
				$giro=$row['giro'];
				$actividad_comercial=$row['actividad_comercial'];
				$descripcion_general=$row['descripcion_general'];
				$doc_personalidad=$row['doc_personalidad'];
				$representante_legl=$row['representante_legl'];
				$tel_rep_legal=$row['tel_rep_legal'];
				$correo_rep_legal=$row['correo_rep_legal'];
				$deno_proyecto=$row['deno_proyecto'];
				$doc_posesion=$row['doc_posesion'];
				$domicilio_proyecto=$row['domicilio_proyecto'];
				$municipio_proyecto=$row['municipio_proyecto'];
				$cp_proyecto=$row['cp_proyecto'];
				$monto_inversion=$row['monto_inversion'];
				$tipo_nomeda=$row['tipo_nomeda'];
				$no_emplos_dir=$row['no_emplos_dir'];
				$no_emplos_ind=$row['no_emplos_ind'];
				$sfc_total=$row['sfc_total'];
				$sfc_construida=$row['sfc_construida'];
				$sfc_prevista_cosnt=$row['sfc_prevista_cosnt'];
				$sfc_prevista_uso=$row['sfc_prevista_uso'];
				$ma_SLD=$row['ma_SLD'];
				$ma_DEC=$row['ma_DEC'];
				$ma_MAM=$row['ma_MAM'];
				$ma_DUM=$row['ma_DUM'];
				$ma_PCL=$row['ma_PCL'];
				$ma_VLD=$row['ma_VLD'];
				$ma_MOV=$row['ma_MOV'];
				$ma_ADA=$row['ma_ADA'];
				$ma_FTL=$row['ma_FTL'];
				$no_ofi_procedencia=$row['no_ofi_procedencia'];
				$tipo_tramite=$row['tipo_tramite'];
				$impacto_riesgo=$row['impacto_riesgo'];
				$tipo_duf=$row['tipo_duf'];
				$dias_horarios=$row['dias_horarios'];
				$vigencia_duf=$row['vigencia_duf'];
				$clave_municipio=$row['clave_municipio'];
				$consecutivo=$row['consecutivo'];
				$anio_expedicion=$row['anio_expedicion'];
				$folio_duf=$row['folio_duf'];
				$folio_encrypted=$row['folio_encrypted'];
				$no_hoja_seguridad=$row['no_hoja_seguridad'];
				$fecha_expedicion=$row['fecha_expedicion'];
				$fecha_entrega=$row['fecha_entrega'];
				$fedeerratas=$row['fedeerratas'];
				$fecha_elaboracion_fedeerratas=$row['fecha_elaboracion_fedeerratas'];
				$no_duf_anterior=$row['no_duf_anterior'];
				$fecha_resolucion=$row['fecha_resolucion'];
				$no_oficio_resolucion=$row['no_oficio_resolucion'];
				$usuario_modifica=$row['usuario_modifica'];
				$fecha_modifica=$row['fecha_modifica'];
				$id_datos_generales=$row['id_datos_generales'];
				$id_procedencia=$row['id_procedencia'];

	        }

	        $resultado = mysqli_query($conection_nueva,"INSERT INTO emision_full(tipo_duf_full, id_ciudadano, tipo_persona, usuario, contrasena, curp_rfc, nombre_empresa, nombres, apellido_paterno, apellido_materno, fecha_nacimiento, sexo, entidad_nacimiento, domicilio, cp, municipio, telefono_particular, correo_electronico, correo_confirmado, pregunta_secreta, respuesta_secreta, fecha_ultimo_ingreso, fecha_registro, tipo_solicitud, prioridad, fecha_ingreso, folio_presolicitud, fecha_ingreso_procedente, folio_solicitud_procedente, fol_solp_encrypted, no_expediente, impacto, giro, actividad, descripcion_general, bandera_rep_leg, doc_acredita_personalidad, representante_legal, tel_rep_legal, correo_rep_legal, deno_proyecto, doc_acredita_propiedad, domicilio_proyecto, municipio_proyecto, cp_proyecto, monto_inversion, tipo_nomeda, no_emplos_dir, no_emplos_ind, sfc_total, sfc_construida, sfc_prevista_cosnt, sfc_en_uso, identificacion, acta_constitutiva, r_uso_suelo, desc_usu_suelo, observaciones, tipo_documento, ma_SLD, ma_DEC, ma_MAM, ma_DUM, ma_PCL, ma_VLD, ma_MOV, ma_ADA, ma_FTL, no_prevencion, no_oficio_procedencia, tipo_resolucion, tipo_tramite, impacto_riesgo, tipo_duf, dias_horarios, vigencia_duf, clave_municipio, consecutivo, anio_expedicion, folio_duf, folio_encrypted, no_hoja_seguridad, fecha_expedicion, estado_duf, fecha_entrega, fedeerratas, fecha_elaboracion_fedeerratas, no_duf_anterior, fecha_resolucion, no_oficio_resolucion, usuario_modifica, fecha_modifica, id_dg, id_pi, id_titular) 
	        	values ('FISICO', 1, '-', '-', '-', '-', '$persona_juridicolectiva', '$nombre_propietario', '-', '-', '0000-00-00', '-', '-', '-', '-', '-', '-', '$correo_propietario', '0', '-', '-', '0000-00-00', '0000-00-00','$tipo_tramite', 3, '0000-00-00', '-', '$fecha_ingreso', '$folio_solicitud', 'encrypted fs', '$no_expediente', '$impacto_riesgo','$giro', '$actividad_comercial', '$descripcion_general', '0', '$doc_personalidad',' $representante_legl', '$tel_rep_legal', '$correo_rep_legal', '$deno_proyecto', '$doc_posesion','$domicilio_proyecto', '$municipio_proyecto', '$cp_proyecto', '$monto_inversion', '$tipo_nomeda', $no_emplos_dir, $no_emplos_ind, $sfc_total, $sfc_construida, $sfc_prevista_cosnt,'$sfc_prevista_uso', '-', '-', '-', '-', '-', '-', $ma_SLD, $ma_DEC, $ma_MAM, $ma_DUM, $ma_PCL, $ma_VLD, $ma_MOV, $ma_ADA, $ma_FTL, '0', '$no_ofi_procedencia','-', '$tipo_tramite', '$impacto_riesgo', '$tipo_duf', '$dias_horarios', '$vigencia_duf', '$clave_municipio', $consecutivo,'$anio_expedicion',' $folio_duf', '$folio_encrypted', '$no_hoja_seguridad',' $fecha_expedicion', 'TUTICGF', '$fecha_entrega', '$fedeerratas', '$fecha_elaboracion_fedeerratas', '$no_duf_anterior','$fecha_resolucion', '$no_oficio_resolucion', $usuario_modifica, '$fecha_modifica', $id_datos_generales, $id_procedencia, 5)");

	        

	    }

	if($resultado != true){
	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

echo json_encode($jsondata);
 ?>