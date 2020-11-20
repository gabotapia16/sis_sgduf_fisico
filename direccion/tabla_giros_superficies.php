<?php
include '../conection_bd.php';
$direccion="localhost";
$usuario="usuroot";
$contrasenia="Infbea57$";
$base_datos = "sg_duf";
$conection2 = mysqli_connect($direccion, $usuario, $contrasenia,$base_datos);
header("Content-Type: text/html;charset=uft-8");
$acentos = $conection2->query("SET NAMES 'utf8'");
date_default_timezone_set('America/Mexico_City');

$actividades = mysqli_query($conection, "SELECT dt.materia AS giro, dt.giro AS actividad, COUNT(1) as total_actividades
FROM datos_generales dt
INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id
WHERE pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3')
GROUP by dt.materia, dt.giro");


$c=0;

while($fila=$actividades->fetch_assoc()){
	$actividad = mysqli_real_escape_string($conection,$fila['actividad']);
	$giro = mysqli_real_escape_string($conection,$fila['giro']);


	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_total BETWEEN 1 AND 2999
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$total_menor3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_total=3000
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$total_igual3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_total>3000
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$total_mayor3000=$datos['conteo_giros'];

	//--------------------SUPERFICIE CONSTRUIDA----------------------

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_construida BETWEEN 1 AND 2999
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$construida_menor3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_construida=3000
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$construida_igual3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_construida>3000
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$construida_mayor3000=$datos['conteo_giros'];

	//--------------------SUPERFICIE EN USO----------------------
	//NOTA: EN LOS CAMPOS DE SUPERFICIE DE  USO ESTA INTERCAMBIADA POR LA PREVISTA A CONSTRUIR

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_prevista_cosnt BETWEEN 1 AND 2999
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$uso_menor3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_prevista_cosnt=3000
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$uso_igual3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_prevista_cosnt>3000
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$uso_mayor3000=$datos['conteo_giros'];

	//--------------------SUPERFICIE PREVISTA A CONSTRUIR----------------------
	//NOTA: EN LOS CAMPOS DE SUPERFICIE DE  PREVISTA A CONSTRUIR ESTA INTERCAMBIADA POR LA PREVISTA EN USO
	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_prevista_uso BETWEEN 1 AND 2999
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$prevista_construir_menor3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_prevista_uso=3000
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$prevista_construir_igual3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3') and dt.sfc_prevista_uso>3000
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$prevista_construir_mayor3000=$datos['conteo_giros'];

	///-----------------CONTEO DE ACTIVIDADES

	$min_max = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND dt.materia='$giro' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3')
		GROUP BY dt.giro
	");
	$datos = mysqli_fetch_assoc($min_max);
	$conteo_actividades=$datos['conteo_giros'];


	$data[$c]["mas"] ="Físicos";
	$data[$c]["giro"] =$fila['giro'];
	$data[$c]["actividad"] =$actividad;

	$data[$c]["total_menor3000"] =$total_menor3000;
	$data[$c]["total_igual3000"] =$total_igual3000;
	$data[$c]["total_mayor3000"] =$total_mayor3000;

	$data[$c]["construida_menor3000"] =$construida_menor3000;
	$data[$c]["construida_igual3000"] =$construida_igual3000;
	$data[$c]["construida_mayor3000"] =$construida_mayor3000;

	$data[$c]["uso_menor3000"] =$uso_menor3000;
	$data[$c]["uso_igual3000"] =$uso_igual3000;
	$data[$c]["uso_mayor3000"] =$uso_mayor3000;

	$data[$c]["prevista_construir_menor3000"] =$prevista_construir_menor3000;
	$data[$c]["prevista_construir_igual3000"] =$prevista_construir_igual3000;
	$data[$c]["prevista_construir_mayor3000"] =$prevista_construir_mayor3000;

	$data[$c]["conteo_actividades"] =$fila["total_actividades"];
	$c++;
}

/*****************************************************************************************************/
/*****************************************************************************************************/
/*****************************************************************************************************/
/*****************************************************************************************************/
//----------------------DIGITALES-----------------------------------

$actividadesDigitales = mysqli_query($conection2, "SELECT dt.giro, dt.actividad, COUNT(1) as total_actividades
FROM datos_generales dt
INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
WHERE  wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO')
GROUP by dt.giro, dt.actividad");


while($row=$actividadesDigitales->fetch_assoc()){
	$actividad = mysqli_real_escape_string($conection2,$row['actividad']);
	$giro = mysqli_real_escape_string($conection2,$row['giro']);


	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_total BETWEEN 1 AND 2999
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$total_menor3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO')  and dt.sfc_total=3000
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$total_igual3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_total>3000
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$total_mayor3000=$datos['conteo_giros'];

	//--------------------SUPERFICIE CONSTRUIDA----------------------

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_construida BETWEEN 1 AND 2999
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$construida_menor3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_construida=3000
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$construida_igual3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_construida>3000
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$construida_mayor3000=$datos['conteo_giros'];

	//--------------------SUPERFICIE EN USO----------------------

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_prevista_uso BETWEEN 1 AND 2999
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$uso_menor3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_prevista_uso=3000
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$uso_igual3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_prevista_uso>3000
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$uso_mayor3000=$datos['conteo_giros'];

	//--------------------SUPERFICIE PREVISTA A CONSTRUIR----------------------
	//NOTA: EN LOS CAMPOS DE SUPERFICIE DE  PREVISTA A CONSTRUIR ESTA INTERCAMBIADA POR LA PREVISTA EN USO
	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_prevista_cosnt BETWEEN 1 AND 2999
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$prevista_construir_menor3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_prevista_cosnt=3000
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$prevista_construir_igual3000=$datos['conteo_giros'];

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO') and dt.sfc_prevista_cosnt>3000
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$prevista_construir_mayor3000=$datos['conteo_giros'];

	///-----------------CONTEO DE ACTIVIDADES

	$min_max = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND dt.giro='$giro' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO')
		GROUP BY dt.actividad
	");
	$datos = mysqli_fetch_assoc($min_max);
	$conteo_actividades=$datos['conteo_giros'];


	$data[$c]["mas"] ="Digitales";
	$data[$c]["giro"] =$row['giro'];
	$data[$c]["actividad"] =$actividad;

	$data[$c]["total_menor3000"] =$total_menor3000;
	$data[$c]["total_igual3000"] =$total_igual3000;
	$data[$c]["total_mayor3000"] =$total_mayor3000;

	$data[$c]["construida_menor3000"] =$construida_menor3000;
	$data[$c]["construida_igual3000"] =$construida_igual3000;
	$data[$c]["construida_mayor3000"] =$construida_mayor3000;

	$data[$c]["uso_menor3000"] =$uso_menor3000;
	$data[$c]["uso_igual3000"] =$uso_igual3000;
	$data[$c]["uso_mayor3000"] =$uso_mayor3000;

	$data[$c]["prevista_construir_menor3000"] =$prevista_construir_menor3000;
	$data[$c]["prevista_construir_igual3000"] =$prevista_construir_igual3000;
	$data[$c]["prevista_construir_mayor3000"] =$prevista_construir_mayor3000;

	$data[$c]["conteo_actividades"] =$row["total_actividades"];
	$c++;
}


$results = ["sEcho" => 1,
	"iTotalRecords" => count($data),
	"iTotalDisplayRecords" => count($data),
	"aaData" => $data
];


echo json_encode($results);
 ?>