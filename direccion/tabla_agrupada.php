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

$actividades = mysqli_query($conection, "SELECT COUNT(dt.giro) as conteo_giros, dt.giro as actividad
FROM datos_generales dt
INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id
WHERE fecha_ingreso<='2020-10-20' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3')
GROUP BY dt.giro");


$c=0;

while($fila=$actividades->fetch_assoc()){
	$conteo_giros=$fila['conteo_giros'];
	$actividad = mysqli_real_escape_string($conection,$fila['actividad']);
	//$actividad=$fila['actividad'];

	//echo "SELECT min(fecha_ingreso) as minima, max(fecha_ingreso) as maxima from datos_generales WHERE giro='$actividad' AND fecha_ingreso!='0000-00-00' AND fecha_ingreso<='2020-10-20'";
	$min_max = mysqli_query($conection, "SELECT min(fecha_ingreso) as minima, max(fecha_ingreso) as maxima 
		from datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id 
		WHERE giro='$actividad' AND fecha_ingreso!='0000-00-00' AND fecha_ingreso<='2020-10-20'  AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3')
	");
	$datos = mysqli_fetch_assoc($min_max);
	$minima=$datos['minima'];
	$maxima=$datos['maxima'];


	$materias = mysqli_query($conection, "SELECT SUM(pi.ma_SLD) as suma_sld, SUM(pi.ma_DEC) as suma_dec, SUM(pi.ma_MAM) as suma_mam, SUM(pi.ma_DUM) as suma_dum, SUM(pi.ma_PCL) as suma_pcl, SUM(pi.ma_VLD) as suma_vld, SUM(pi.ma_MOV) as suma_mov, SUM(pi.ma_ADA) as suma_ada, SUM(pi.ma_FTL) as suma_ftl
		FROM datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id
		WHERE dt.giro='$actividad' AND fecha_ingreso<='2020-10-20' AND pi.conclusion='' and (estado_etapa='confirmado' OR estado_etapa='1' OR estado_etapa='2' OR estado_etapa='3')
	");
	$datos = mysqli_fetch_assoc($materias);
	$suma_sld=$datos['suma_sld'];
	$suma_dec=$datos['suma_dec'];
	$suma_mam=$datos['suma_mam'];
	$suma_dum=$datos['suma_dum'];
	$suma_pcl=$datos['suma_pcl'];
	$suma_vld=$datos['suma_vld'];
	$suma_mov=$datos['suma_mov'];
	$suma_ada=$datos['suma_ada'];
	$suma_ftl=$datos['suma_ftl'];


	$data[$c]["mas"] ="Físico";
	$data[$c]["conteo_giros"] =$conteo_giros;
	$data[$c]["actividad"] =$actividad;
	$data[$c]["minima"] =$minima;
	$data[$c]["maxima"] =$maxima;

	$data[$c]["suma_sld"] =$suma_sld;
	$data[$c]["suma_dec"] =$suma_dec;
	$data[$c]["suma_mam"] =$suma_mam;
	$data[$c]["suma_dum"] =$suma_dum;
	$data[$c]["suma_pcl"] =$suma_pcl;
	$data[$c]["suma_vld"] =$suma_vld;
	$data[$c]["suma_mov"] =$suma_mov;
	$data[$c]["suma_ada"] =$suma_ada;
	$data[$c]["suma_ftl"] =$suma_ftl;
	$c++;
}

/*****************************************************************************************************/
/*****************************************************************************************************/
/*****************************************************************************************************/
/*****************************************************************************************************/

$actividadesDigitales = mysqli_query($conection2, "SELECT COUNT(dt.actividad) as conteo_giros, dt.actividad as actividad
FROM datos_generales dt
INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
WHERE fecha_ingreso_procedente<='2020-10-20' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO')
GROUP BY dt.actividad ");


while($row=$actividadesDigitales->fetch_assoc()){
	$conteo_giros=$row['conteo_giros'];
	$actividad = mysqli_real_escape_string($conection2,$row['actividad']);
	

	$min_max = mysqli_query($conection2, "SELECT min(fecha_ingreso_procedente) as minima, max(fecha_ingreso_procedente) as maxima 
		from datos_generales dt
		INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE actividad='$actividad' AND fecha_ingreso_procedente!='0000-00-00' AND fecha_ingreso_procedente<='2020-10-20' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO')
	");
	$datos = mysqli_fetch_assoc($min_max);
	$minima=$datos['minima'];
	$maxima=$datos['maxima'];

	$materias = mysqli_query($conection2, "SELECT SUM(pi.ma_SLD) as suma_sld, SUM(pi.ma_DEC) as suma_dec, SUM(pi.ma_MAM) as suma_mam, SUM(pi.ma_DUM) as suma_dum, SUM(pi.ma_PCL) as suma_pcl, SUM(pi.ma_VLD) as suma_vld, SUM(pi.ma_MOV) as suma_mov, SUM(pi.ma_ADA) as suma_ada, SUM(pi.ma_FTL) as suma_ftl
		FROM datos_generales dt
		INNER JOIN procedencia_integracion pi ON pi.id_datos_generales=dt.id
        INNER JOIN workflow wor ON wor.id_datos_generales=dt.id
		WHERE dt.actividad='$actividad' AND fecha_ingreso_procedente!='0000-00-00' AND fecha_ingreso_procedente<='2020-10-20' AND wor.estado_etapa1!='CONCLUIDO' AND folio_solicitud_procedente!='' AND (wor.estado_duf='' or wor.estado_duf='PFO')
	");
	$datos = mysqli_fetch_assoc($materias);
	$suma_sld=$datos['suma_sld'];
	$suma_dec=$datos['suma_dec'];
	$suma_mam=$datos['suma_mam'];
	$suma_dum=$datos['suma_dum'];
	$suma_pcl=$datos['suma_pcl'];
	$suma_vld=$datos['suma_vld'];
	$suma_mov=$datos['suma_mov'];
	$suma_ada=$datos['suma_ada'];
	$suma_ftl=$datos['suma_ftl'];


	$data[$c]["mas"] ="Digital";
	$data[$c]["conteo_giros"] =$conteo_giros;
	$data[$c]["actividad"] =$actividad;
	$data[$c]["minima"] =$minima;
	$data[$c]["maxima"] =$maxima;

	$data[$c]["suma_sld"] =$suma_sld;
	$data[$c]["suma_dec"] =$suma_dec;
	$data[$c]["suma_mam"] =$suma_mam;
	$data[$c]["suma_dum"] =$suma_dum;
	$data[$c]["suma_pcl"] =$suma_pcl;
	$data[$c]["suma_vld"] =$suma_vld;
	$data[$c]["suma_mov"] =$suma_mov;
	$data[$c]["suma_ada"] =$suma_ada;
	$data[$c]["suma_ftl"] =$suma_ftl;
	$c++;

}


$results = ["sEcho" => 1,
	"iTotalRecords" => count($data),
	"iTotalDisplayRecords" => count($data),
	"aaData" => $data
];


echo json_encode($results);
 ?>