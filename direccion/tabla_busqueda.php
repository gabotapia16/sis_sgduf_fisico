<?php
include '../conection_bd.php';
$direccion="localhost";
$usuario="usuroot";
$contrasenia="Infbea57$";
$base_datos = "sg_duf";
$conection2 = mysqli_connect($direccion, $usuario, $contrasenia,$base_datos);
header("Content-Type: text/html;charset=uft-8");
$acentos = $conection->query("SET NAMES 'utf8'");
date_default_timezone_set('America/Mexico_City');

$busqueda = mysqli_query($conection, "SELECT pi.estado_etapa, dt.id as id_general, pi.id as id_procedencia, dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, codigo_barras, pi.turnado_etapa2, pi.fec_notificacion_procedencia, dt.fecha_ingreso, dt.materia, dt.giro, dt.descripcion_general, pi.ma_SLD, pi.ma_DEC, pi.ma_MAM, pi.ma_DUM, pi.ma_PCL, pi.ma_VLD, pi.ma_MOV, pi.ma_ADA, pi.ma_FTL, pi.bandera_evaluaciones, pi.fecha_edito_requisitos, pi.fech_modificacion, pi.fecha_confirma_rechaza,  pi.turnado_etapa2,
	DATE_FORMAT(pi.fecha_edito_requisitos, '%Y-%m-%d') AS fecha_requisitos, pi.fec_expedicion_procedencia
FROM datos_generales dt
INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales
where pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3')");


$c=0;

while($fila=$busqueda->fetch_assoc()){
	$id_general=$fila['id_general'];
	$id_e1=$fila['id_procedencia'];
	$estado_etapa='-';
	$estado=$fila['estado_etapa'];
	$evaluacion=$fila['bandera_evaluaciones'];
	$estado_sld='N/A';
	$estado_dec='N/A';
	$estado_mam='N/A';
	$estado_dum='N/A';
	$estado_pcl='N/A';
	$estado_vld='N/A';
	$estado_mov='N/A';
	$estado_ada='N/A';
	$estado_ftl='N/A';

	switch ($estado) {
		case 'confirmado':
			$estado_etapa='ETAPA-1';
			break;
		case '1':
			$estado_etapa='EN ESPERA DE CONFIRMACION POR ETAPA-2';
			break;
		case '2':
			$estado_etapa='RECHAZADO POR ETAPA 2';
			break;
		case '3':
			$estado_etapa='ETAPA-2';
			break;
		case '4':
			$estado_etapa='EN ESPERA DE CONFIRMACION POR ETAPA-3';
			break;
		case '5':
			$estado_etapa='RECHAZADO POR ETAPA 3';
			break;
		case '6':
			$estado_etapa='ETAPA-3';
			break;
		case '7':
			$estado_etapa='UTIC PENDIENTE DE GENERAR FOLIO';
			break;
		case '8':
			$estado_etapa='DG PENDIENTE DE FIRMA';
			break;
		case '9':
			$estado_etapa='UTIC PENDIENTE DE IMPRESIÓN';
			break;
		case '10':
			$estado_etapa='ETAPA-3 PENDIENTE DE ENTREGA';
			break;
		case '11':
			$estado_etapa='DUF ENTREGADO';
			break;
		
		default:
			$estado_etapa='SIN ESTADO';
			break;
	}
	if ($evaluacion==1) {
		if ( $fila["ma_SLD"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_sld WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_sld=$datos['estado_respuesta_dep'];
			if ($estado_sld=='') {
				$estado_sld='SIN MOVIMIENTO';
			}
		}
		if ( $fila["ma_DEC"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_dec WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_dec=$datos['estado_respuesta_dep'];
			if ($estado_dec=='') {
				$estado_dec='SIN MOVIMIENTO';
			}
		}
		if ( $fila["ma_MAM"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_mam WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_mam=$datos['estado_respuesta_dep'];
			if ($estado_mam=='') {
				$estado_mam='SIN MOVIMIENTO';
			}
		}
		if ( $fila["ma_DUM"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_dum WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_dum=$datos['estado_respuesta_dep'];
			if ($estado_dum=='') {
				$estado_dum='SIN MOVIMIENTO';
			}
		}
		if ( $fila["ma_PCL"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_pcl WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_pcl=$datos['estado_respuesta_dep'];
			if ($estado_pcl=='') {
				$estado_pcl='SIN MOVIMIENTO';
			}
		}
		if ( $fila["ma_VLD"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_vld WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_vld=$datos['estado_respuesta_dep'];
			if ($estado_vld=='') {
				$estado_vld='SIN MOVIMIENTO';
			}
		}
		if ( $fila["ma_MOV"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_mov WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_mov=$datos['estado_respuesta_dep'];
			if ($estado_mov=='') {
				$estado_mov='SIN MOVIMIENTO';
			}
		}
		if ( $fila["ma_ADA"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_ada WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_ada=$datos['estado_respuesta_dep'];
			if ($estado_ada=='') {
				$estado_ada='SIN MOVIMIENTO';
			}
		}
		if ( $fila["ma_FTL"]==1) {
			$resultado = mysqli_query($conection, "SELECT estado_respuesta_dep FROM ts_ftl WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_ftl=$datos['estado_respuesta_dep'];
			if ($estado_ftl=='') {
				$estado_ftl='SIN MOVIMIENTO';
			}
		}
	}

	if ($fila["fecha_edito_requisitos"]!='0000-00-00 00:00:00') {
		$fecha_edito_requisitos=$fila["fecha_edito_requisitos"];
	}else{
		$fecha_edito_requisitos='SIN INGRESO DE RE';
	}
	

	$data[$c]["mas"] ="Más";
	$data[$c]["estado_etapa"] = $estado_etapa;
	$data[$c]["estado_etapa1"] = '-';
	$data[$c]["estado_etapa2"] = '-';
	$data[$c]["estado_area"] = '-';
	$data[$c]["origen_ingreso"] = 'FISICO';
	$data[$c]["no_expediente"] = $fila["no_expediente"];
	$data[$c]["folio_solicitud"] = $fila["folio_solicitud"];
	$data[$c]["nombre_propietario"] = $fila["nombre_propietario"];
	$data[$c]["deno_proyecto"] = $fila["deno_proyecto"];
	$data[$c]["giro"] =  $fila["materia"];
	$data[$c]["actividad"] =  $fila['giro'];
	$data[$c]["descripcion"] =  $fila['descripcion_general'];
	$data[$c]["municipio_proyecto"] = $fila["municipio_proyecto"];
	$data[$c]["domicilio_proyecto"] = $fila["domicilio_proyecto"].", ".$fila["municipio_proyecto"].", C.P. ".$fila["cp_proyecto"].", ESTADO DE MÉXICO";
	$data[$c]["tel_propietario"] = $fila["tel_propietario"];
	$data[$c]["representante_legl"] = $fila["representante_legl"];
	$data[$c]["tel_rep_legal"] = $fila["tel_rep_legal"];
	$data[$c]["monto_inversion"] = $fila["monto_inversion"];
	$data[$c]["no_emplos_dir"] = $fila["no_emplos_dir"];
	$data[$c]["no_emplos_ind"] = $fila["no_emplos_ind"];
	$data[$c]["estado_prevencion"] = $fila["estado_prevencion"];
	$data[$c]["estado_procencia"] = $fila["estado_procencia"];
	$data[$c]["fec_notificacion_procedencia"] = $fila["fec_notificacion_procedencia"];
	$data[$c]["codigo_barras"] = $fila["codigo_barras"];
	$data[$c]["turnado_etapa2"] = $fila["turnado_etapa2"];
	$data[$c]["fecha_ingreso"] = $fila["fecha_ingreso"];
	$data[$c]["ma_SLD"] = $fila["ma_SLD"];
	$data[$c]["ma_DEC"] = $fila["ma_DEC"];
	$data[$c]["ma_MAM"] = $fila["ma_MAM"];
	$data[$c]["ma_DUM"] = $fila["ma_DUM"];
	$data[$c]["ma_PCL"] = $fila["ma_PCL"];
	$data[$c]["ma_VLD"] = $fila["ma_VLD"];
	$data[$c]["ma_MOV"] = $fila["ma_MOV"];
	$data[$c]["ma_ADA"] = $fila["ma_ADA"];
	$data[$c]["ma_FTL"] = $fila["ma_FTL"];
	$data[$c]["estado_sld"] = $estado_sld;
	$data[$c]["estado_dec"] = $estado_dec;
	$data[$c]["estado_mam"] = $estado_mam;
	$data[$c]["estado_dum"] = $estado_dum;
	$data[$c]["estado_pcl"] = $estado_pcl;
	$data[$c]["estado_vld"] = $estado_vld;
	$data[$c]["estado_mov"] = $estado_mov;
	$data[$c]["estado_ada"] = $estado_ada;
	$data[$c]["estado_ftl"] = $estado_ftl;
	$data[$c]["fecha_edito_requisitos"] = $fecha_edito_requisitos;
	$data[$c]["camara_asociacion"] = '-';
	$data[$c]["comentario_etapa"] = '-';
	$data[$c]["caem"] = '-';
	$data[$c]["fecha_ultimo_movimiento"] = '-';
	$data[$c]["antecedentes"] = '-';
	$data[$c]["comentarios"] = '-';
	$data[$c]["estado_actual"] = '-';
	$data[$c]["fecha_entrega"] = '-';
	$data[$c]["no_duf"] = '-';

	$impacto='';
	if ($fila["materia"]=='COMERCIAL AUTOMOTRIZ' ||$fila["materia"]=='IMPACTO SANITARIO') {
		$impacto='BAJO IMPACTO';
	}else{
		$impacto='ALTO IMPACTO';
	}
	$data[$c]["impacto"] = $impacto;



	$fecha_ingreso = new DateTime($fila["fecha_ingreso"]);
	$fecha_procedencia = new DateTime($fila["fec_expedicion_procedencia"]);
	$diferencia_procedencia = $fecha_ingreso->diff($fecha_procedencia);

	$fecha_requisitos = new DateTime($fila["fecha_requisitos"]);
	$diferencia_requisitos = $fecha_procedencia->diff($fecha_requisitos);
	
	$diferencia_procedencia_1= get_format($diferencia_procedencia);
	$diferencia_requisitos_1= get_format($diferencia_requisitos);
	
	if ($fila["fec_expedicion_procedencia"]=='0000-00-00') {
		$data[$c]["diferencia_procedencia_1"] = 'SIN PROCEDENCIA';
	}else if ($fila["fecha_ingreso"]<'2000-01-01') {
		$data[$c]["diferencia_procedencia_1"] = 'DATO ERRONEO';
	}else if ($fila["fec_expedicion_procedencia"]<'2000-01-01') {
		$data[$c]["diferencia_procedencia_1"] = 'DATO ERRONEO';
	}
	else{
		$data[$c]["diferencia_procedencia_1"] = $diferencia_procedencia_1;
	}

	if ($fila["fecha_requisitos"]=='0000-00-00') {
		$data[$c]["diferencia_requisitos_1"] ='SIN INGRESO RE';
	}
	else if ($fila["fec_expedicion_procedencia"]=='0000-00-00') {
		$data[$c]["diferencia_requisitos_1"] = 'SIN DATO DE PROCEDENCIA';
	}else{
		$data[$c]["diferencia_requisitos_1"] = $diferencia_requisitos_1;
	}
	
	$c++;
}

//-------------------------------------------------------------------------

$busqueda_digital = mysqli_query($conection2, "SELECT datos_generales.id as id_general, datos_generales.no_expediente, datos_generales.nombre_propietario, 
	datos_generales.persona_juridicolectiva,
	 datos_generales.deno_proyecto, 
	 datos_generales.municipio_proyecto, 
	 datos_generales.impacto, 
	 datos_generales.giro, 
	 datos_generales.tel_propietario,
	 datos_generales.representante_legal,
datos_generales.tel_rep_legal,
datos_generales.descripcion_general,
datos_generales.folio_solicitud_procedente,
datos_generales.domicilio_proyecto,
datos_generales.cp_proyecto,
datos_generales.fecha_ingreso,
	 datos_generales.actividad, datos_generales.monto_inversion, datos_generales.tipo_nomeda, datos_generales.no_emplos_dir, datos_generales.no_emplos_ind, pi.estado_etapa, wf.estado_etapa1, wf.estado_etapa2, wf.estado_duf, wf.estado_area, datos_generales.folio_solicitud, wf.fecha_notificacion_proc, datos_generales.fecha_ingreso_procedente, pi.ma_SLD, pi.ma_DEC, pi.ma_MAM, pi.ma_DUM, pi.ma_PCL, pi.ma_VLD, pi.ma_MOV, pi.ma_ADA, pi.ma_FTL, DATE_FORMAT(.pi.fec_expedicion_procedencia, '%Y-%m-%d') AS fecha_procedencia
	 FROM datos_generales INNER JOIN procedencia_integracion pi ON pi.id = datos_generales.id_procedencia
INNER JOIN workflow wf ON wf.id_datos_generales = datos_generales.id
WHERE (wf.estado_duf='' or wf.estado_duf='PFO') AND datos_generales.id>1 ");


while($row=$busqueda_digital->fetch_assoc()){

	$id_general=$row['id_general'];

	switch ($row['estado_etapa1']) {
  		case "CONCLUIDO":
  		$estado_etapa1='CONCLUIDO';
			break;

  		case "PCC":
    		$estado_etapa1 = "ETAPA-1";
			break;

  		case "PSA":
    		$estado_etapa1 = "ETAPA-1";
			break;

		case "AS":
    		$estado_etapa1 = "ETAPA-1";
			break;

		case "PVRG":
    		$estado_etapa1 = "ETAPA-1";
			break;
		case "PR-E1":
    		$estado_etapa1 = "ETAPA-1";
			break;
		case "PFR":
    		$estado_etapa1 = "ETAPA-1";
			break;
		case "PFS":
    		$estado_etapa1 = "ETAPA-1";
			break;
		case "S":
    		$estado_etapa1 = "ETAPA-1";
    		break;
		case "PNC":
    		$estado_etapa1 = "ETAPA-1";

		break;
		case "PS":
    		$estado_etapa1 = "ETAPA-1";
		break;
		case "RG_OK":
        	$estado_etapa1= "ETAPA-2";
    	break;
		default:
		$estado_etapa1='-';
			break;
	}
	switch ($row['estado_etapa2']) {
		case "PVRE":
    		$estado_etapa2 = "Pendiente de validación de requisitos específicos.";
			break;
		case "RCO":
    		$estado_etapa2 = "Pendiente de validación de requisitos específicos.";
			break;
		case "RSC":
    		$estado_etapa2  = "Pendiente de validación de requisitos específicos.";
			break;
		case "PS":
    		$estado_etapa2  = "Pendiente de validación de requisitos específicos.";
			break;
		case "PNC":
    		$estado_etapa2  = "Requiere subsanar prevención.";
    		break;
    	case "RE_OK":
        	$estado_etapa2 = "Con requisitos específicos correctos.";
    	break;
		default:
			$estado_etapa2 = "N/A";
			break;
	}

	switch ($row['estado_area']){
		case "SOLCON":
          	$estado_area_salud  = "En espera de evaluación técnica de factibilidad.";
		break;
		case "ETCD":
          	$estado_area  = "En espera de evaluación técnica de factibilidad.";
    	break;
        case "ETPF":
          	$estado_area  = "En espera de evaluación técnica de factibilidad.";
        break;
        case "ETF":
          	$estado_area  = "En espera de evaluación técnica de factibilidad.";
        break;
        case "ETTC":
            $resultado = mysqli_query($conection2, "SELECT resultado as resultado_coprisem FROM evaluacion_coprisem WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_area=$datos["resultado_coprisem"];
        break;
        case "ETTS":
            $resultado = mysqli_query($conection2, "SELECT resultado as resultado_sedeco FROM evaluacion_sedeco WHERE id_datos_generales=$id_general");
			$datos = mysqli_fetch_assoc($resultado);
			$estado_area=$datos["resultado_sedeco"];
        break;
        default:
			$estado_area='-';
		break;
	}


	if ($row["nombre_propietario"]!='') {
		$propietario=$row["nombre_propietario"];
	}else{
		$propietario=$row["persona_juridicolectiva"];
	}

	if ($row["estado_etapa"]=='PROCEDENCIA') {
		$prevencion='-';
		$procedencia='PROCEDENCIA';
	}else if ($row["estado_etapa"]=='PREVENCION') {
		$prevencion='PREVENCION';
		$procedencia='-';
	}else{
		$prevencion='-';
		$procedencia='-';
	}

	$sld='-';
	$dec='-';
	$fecha_ingreso_requisitos_especificos='SIN INGRESO DE RE';

	if ($row['giro']=='IMPACTO SANITARIO') {
		$sld=$estado_area;
		$dec='-';
		$fecha_ingreso_requisitos_especificos=$row['fecha_ingreso'];
	}else if ($row['giro']=='COMERCIAL AUTOMOTRIZ') {
		$sld='-';
		$dec=$estado_area;
		$fecha_ingreso_requisitos_especificos=$row['fecha_ingreso'];
	}

	$data[$c]["mas"] ="Más";
	$data[$c]["estado_etapa"]= $estado_etapa1; 
	$data[$c]["estado_etapa1"] = $estado_etapa1;
	$data[$c]["estado_etapa2"] = $estado_etapa2;
	$data[$c]["estado_area"] = $estado_area;
	$data[$c]["origen_ingreso"] = 'DIGITAL';
	$data[$c]["no_expediente"] = $row["no_expediente"];
	$data[$c]["folio_solicitud"] = $row["folio_solicitud_procedente"];
	$data[$c]["nombre_propietario"] = $propietario;
	$data[$c]["deno_proyecto"] = $row["deno_proyecto"];
	$data[$c]["giro"] =  $row["giro"];
	$data[$c]["actividad"] =  $row['actividad'];
	$data[$c]["descripcion"] =  $row['descripcion_general'];
	$data[$c]["municipio_proyecto"] = $row["municipio_proyecto"];
	$data[$c]["domicilio_proyecto"] = $row["domicilio_proyecto"].", ".$row["municipio_proyecto"].", C.P. ".$row["cp_proyecto"].", ESTADO DE MÉXICO";
	$data[$c]["tel_propietario"] = $row["tel_propietario"];
	$data[$c]["representante_legl"] = $row["representante_legal"];
	$data[$c]["tel_rep_legal"] = $row["tel_rep_legal"];
	$data[$c]["monto_inversion"] = $row["monto_inversion"];
	$data[$c]["no_emplos_dir"] = $row["no_emplos_dir"];
	$data[$c]["no_emplos_ind"] = $row["no_emplos_ind"];
	$data[$c]["estado_prevencion"] = $prevencion;
	$data[$c]["estado_procencia"] = $procedencia;
	$data[$c]["fec_notificacion_procedencia"] = $row["fecha_notificacion_proc"];
	$data[$c]["codigo_barras"] = '-';
	//$data[$c]["turnado_etapa2"] = '-';
	$data[$c]["fecha_ingreso"] = $row["fecha_ingreso_procedente"];
	$data[$c]["ma_SLD"] = $row["ma_SLD"];
	$data[$c]["ma_DEC"] = $row["ma_DEC"];
	$data[$c]["ma_MAM"] = $row["ma_MAM"];
	$data[$c]["ma_DUM"] = $row["ma_DUM"];
	$data[$c]["ma_PCL"] = $row["ma_PCL"];
	$data[$c]["ma_VLD"] = $row["ma_VLD"];
	$data[$c]["ma_MOV"] = $row["ma_MOV"];
	$data[$c]["ma_ADA"] = $row["ma_ADA"];
	$data[$c]["ma_FTL"] = $row["ma_FTL"];
	$data[$c]["estado_sld"] = $sld;
	$data[$c]["estado_dec"] = $dec;
	$data[$c]["estado_mam"] = $row["ma_MAM"];
	$data[$c]["estado_dum"] = $row["ma_DUM"];
	$data[$c]["estado_pcl"] = $row["ma_PCL"];
	$data[$c]["estado_vld"] = $row["ma_VLD"];
	$data[$c]["estado_mov"] = $row["ma_MOV"];
	$data[$c]["estado_ada"] = $row["ma_ADA"];
	$data[$c]["estado_ftl"] = $row["ma_FTL"];
	$data[$c]["fecha_edito_requisitos"] = $fecha_ingreso_requisitos_especificos;
	$data[$c]["camara_asociacion"] = '-';
	$data[$c]["comentario_etapa"] = '-';
	$data[$c]["caem"] = '-';
	$data[$c]["fecha_ultimo_movimiento"] = '-';
	$data[$c]["antecedentes"] = '-';
	$data[$c]["comentarios"] = '-';
	$data[$c]["estado_actual"] = '-';
	$data[$c]["fecha_entrega"] = '-';
	$data[$c]["no_duf"] = '-';

	$data[$c]["impacto"] = $row["impacto"];;

	$fecha_ingreso= new DateTime($row["fecha_ingreso"]);
	$fecha_ingreso_procedente= new DateTime($row["fecha_ingreso_procedente"]);
	$diferencia_requisitos = $fecha_ingreso->diff($fecha_ingreso_procedente);

	$fecha_procedencia = new DateTime($row["fecha_procedencia"]);
	$diferencia_procedencia = $fecha_ingreso_procedente->diff($fecha_procedencia);
	
	$diferencia_procedencia_1= get_format($diferencia_procedencia);
	$diferencia_requisitos_1= get_format($diferencia_requisitos);
	
	if($row["impacto"]=='BAJO IMPACTO' && $row["fecha_ingreso_procedente"]!='0000-00-00'){
		$data[$c]["diferencia_requisitos_1"] = $diferencia_requisitos_1;
	}else {
		$data[$c]["diferencia_requisitos_1"] = 'SIN INGRESO RE';
	}

	if ($row["fecha_procedencia"]=='0000-00-00') {
		$data[$c]["diferencia_procedencia_1"] ='SIN PROCEDENCIA';
	}
	else{
		$data[$c]["diferencia_procedencia_1"] = $diferencia_procedencia_1;
	}

	$c++;
}
$results = ["sEcho" => 1,
	"iTotalRecords" => count($data),
	"iTotalDisplayRecords" => count($data),
	"aaData" => $data
];

function get_format($df) {

    $str = '';
    $str .= ($df->invert == 1) ? ' - ' : '';
    if ($df->y > 0) {
        // years
        $str .= ($df->y > 1) ? $df->y . ' Años ' : $df->y . ' Año ';
    } if ($df->m > 0) {
        // month
        $str .= ($df->m > 1) ? $df->m . ' Meses ' : $df->m . ' Mes ';
    } if ($df->d > 0) {
        // days
        $str .= ($df->d > 1) ? $df->d . ' Días ' : $df->d . ' Día ';
    } if ($df->h > 0) {
        // hours
        $str .= ($df->h > 1) ? $df->h . ' Hours ' : $df->h . ' Hour ';
    } if ($df->i > 0) {
        // minutes
        $str .= ($df->i > 1) ? $df->i . ' Minutes ' : $df->i . ' Minute ';
    } if ($df->s > 0) {
        // seconds
        $str .= ($df->s > 1) ? $df->s . ' Seconds ' : $df->s . ' Second ';
    }

    return $str;
}

echo json_encode($results);
 ?>