<?php

include '../conection_bd.php';

 $resultado= mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES AS nombreModifico, us.APELLIDO_PATERNO AS apellidoModifico, users.NOMBRES AS nombresConfirmo, users.APELLIDO_PATERNO AS apellidoConfirmo,  dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, pi.fec_notificacion_procedencia, pi.confirmado_etapa2, pi.turnado_etapa2, pi.etapa_inicio, ingreso_requisitos, dt.materia, dt.giro , dt.descripcion_general, dt.fecha_ingreso, DATE_FORMAT(pi.fecha_edito_requisitos, '%Y-%m-%d') AS fecha_requisitos FROM datos_generales dt INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales INNER JOIN usuarios us ON us.ID_USER = pi.usu_modificacion INNER JOIN usuarios users ON users.ID_USER = pi.usu_confirmaE2 where pi.estado_etapa=3 AND pi.conclusion=''");

$c=0;
$inicio_etapa='';
$check="";
$botonEvaluaciones="";
$botonEditar="";
$id_general=0;
$id_e1=0;
 //$check="<input type='checkbox' id='id_checkValidar' onclick=checkb(".$fila['id_general'] .", ".$fila['id_procedencia'].", 'sin ingreso RE') >";
while($fila=$resultado->fetch_assoc()){
	if ($fila['etapa_inicio']==2) {
		$inicio_etapa='E2';
	}
	else{
		$inicio_etapa='E1';
	}
	$id_general=$fila['id_general'];
	$id_e1=$fila['id_procedencia'];



	if ($fila['ingreso_requisitos']=='ingresó RE') {
		$check="<input type='checkbox' id='id_checkValidar' onclick=\"checkb($id_general, $id_e1, 'sin ingreso RE')\" >";
		$botonEvaluaciones="<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick=\"generaBotones($id_general, $id_e1); cachaID($id_general, $id_e1)\"><i class='fas fa-clipboard-list fa-lg'></i></button>";
	}
	else{
		$check="<input type='checkbox' id='id_checkValidar' onclick=\"checkb($id_general, $id_e1, 'ingresó RE')\" checked>";
		$botonEvaluaciones="<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick=\"generaBotones($id_general, $id_e1); cachaID($id_general, $id_e1)\" disabled='true'><i class='fas fa-clipboard-list fa-lg'></i></button>";
	}

 	$data[$c]["inicio_etapa"] = $inicio_etapa;
 	$data[$c]["check"] = $check;
 	$data[$c]["botonEditar"] = $botonEditar="<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalEditar' onclick=\"generaBotones($id_general, $id_e1); cachaID($id_general, $id_e1);\"><i class='far fa-edit fa-lg' ></i></button>";
 	$data[$c]["botonConcluir"] = "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalConclusion' onclick='cachaID($id_general, $id_e1)'><i class='fas fa-folder fa-lg'></i></button>";
 	$data[$c]["botonEvaluaciones"] = $botonEvaluaciones;
    $data[$c]["botonTurnar"] = "<button type='button' class='btn btn-success' onclick=\"aprobar($id_general, $id_e1);\"><i class='fas fa-file-export fa-lg'></i></button>";
    $data[$c]["origen_ingreso"] = $fila["origen_ingreso"];
    $data[$c]["no_expediente"] = $fila["no_expediente"];
    $data[$c]["folio_solicitud"] = $fila["folio_solicitud"];
    $data[$c]["nombre_propietario"] = $fila["nombre_propietario"];
    $data[$c]["deno_proyecto"] = $fila["deno_proyecto"];
    $data[$c]["domicilio_proyecto"] = $fila["domicilio_proyecto"].', '.$fila['municipio_proyecto'].', C.P. '.$fila['cp_proyecto'].', ESTADO DE MEXICO';
    $data[$c]["municipio_proyecto"] = $fila["municipio_proyecto"];
    $data[$c]["tel_propietario"] = $fila["tel_propietario"];
    $data[$c]["correo_propietario"] = $fila["correo_propietario"];
    $data[$c]["representante_legl"] = $fila["representante_legl"];
    $data[$c]["tel_rep_legal"] = $fila["tel_rep_legal"];
    $data[$c]["correo_rep_legal"] = $fila["correo_rep_legal"];
    $data[$c]["monto_inversion"] = number_format($fila["monto_inversion"]);
    $data[$c]["tipoMoneda"] = $fila['tipo_nomeda'];
    $data[$c]["no_emplos_dir"] = $fila["no_emplos_dir"];
    $data[$c]["no_emplos_ind"] = $fila["no_emplos_ind"];
    $data[$c]["estado_procencia"] = $fila["estado_procencia"];
    $data[$c]["fec_notificacion_procedencia"] = $fila["fec_notificacion_procedencia"];
    $data[$c]["turnado_etapa2"] = $fila["turnado_etapa2"];
    $data[$c]["confirmado_etapa2"] = $fila["confirmado_etapa2"];
    $data[$c]["nombresConfirmo"] = $fila["nombresConfirmo"].' '.$fila['apellidoConfirmo'];
    $data[$c]["nombreModifico"] = $fila["nombreModifico"].' '.$fila['apellidoModifico'];
    $data[$c]["ingreso_requisitos"] = $fila["ingreso_requisitos"];
    $data[$c]["materia"] = $fila["materia"];
    $data[$c]["giro"] = $fila["giro"];
    $data[$c]["descripcion_general"] = $fila["descripcion_general"];
    $data[$c]["fecha_ingreso"] = $fila["fecha_ingreso"];
    $data[$c]["fecha_edito_requisitos"] = $fila["fecha_requisitos"];
    


    $c++;

}

$results = ["sEcho" => 1,
	"iTotalRecords" => count($data),
	"iTotalDisplayRecords" => count($data),
	"aaData" => $data
];

echo json_encode($results);

?>