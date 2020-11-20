<?php

$direccion="localhost";
$usuario="usuroot";
$contrasenia="Infbea57$";
$base_datos = "sg_duf";
$conection = mysqli_connect($direccion, $usuario, $contrasenia,$base_datos);
header("Content-Type: text/html;charset=uft-8");
$acentos = $conection->query("SET NAMES 'utf8'");



$resultado = mysqli_query($conection, "SELECT datos_generales.no_expediente, datos_generales.nombre_propietario, 
	datos_generales.persona_juridicolectiva,
	 datos_generales.deno_proyecto, 
	 datos_generales.municipio_proyecto, 
	 datos_generales.impacto, 
	 datos_generales.giro, 
	 datos_generales.actividad, datos_generales.monto_inversion, datos_generales.tipo_nomeda, datos_generales.no_emplos_dir, datos_generales.no_emplos_ind, pi.estado_etapa, wf.estado_etapa1, wf.estado_etapa2, wf.estado_duf, wf.estado_area FROM `datos_generales` INNER JOIN procedencia_integracion pi ON pi.id = datos_generales.id_procedencia
INNER JOIN workflow wf ON wf.id_datos_generales = datos_generales.id
WHERE datos_generales.folio_solicitud_procedente > 0  ORDER by datos_generales.monto_inversion desc
");

$c=0;

while($fila=$resultado->fetch_assoc()){


	$data[$c]["mas"] ="Más";
	$data[$c]["no_expediente"] = $fila["no_expediente"];
	$data[$c]["nombre_propietario"] = $fila["nombre_propietario"];
	$data[$c]["persona_juridicolectiva"] = $fila["persona_juridicolectiva"];
	$data[$c]["deno_proyecto"] = $fila["deno_proyecto"];
	$data[$c]["municipio_proyecto"] = $fila["municipio_proyecto"];
	$data[$c]["impacto"] =  $fila["impacto"];
	$data[$c]["giro"] =  $fila["giro"];
	$data[$c]["actividad"] =  $fila["actividad"];
	$data[$c]["monto_inversion"] =  $fila["monto_inversion"];
	$data[$c]["tipo_nomeda"] =  $fila["tipo_nomeda"];
	$data[$c]["no_emplos_dir"] =  $fila["no_emplos_dir"];
	$data[$c]["no_emplos_ind"] =  $fila["no_emplos_ind"];
	$data[$c]["estado_etapa"] =  $fila["estado_etapa"];
	$data[$c]["estado_etapa1"] =  $fila["estado_etapa1"];
	$data[$c]["estado_etapa2"] =  $fila["estado_etapa2"];
	$data[$c]["estado_duf"] =  $fila["estado_duf"];
	$data[$c]["estado_area"] =  $fila["estado_area"];


	
	$c++;
}
$results = ["sEcho" => 1,
	"iTotalRecords" => count($data),
	"iTotalDisplayRecords" => count($data),
	"aaData" => $data
];

echo json_encode($results);
 ?>