<?php

include '../conection_bd.php';

 $resultado= mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, pi.fec_notificacion_procedencia, pi.fecha_confirma_rechaza, pi.turnado_etapa3, pi.etapa_inicio, ingreso_requisitos, dt.materia, dt.giro, dt.descripcion_general, em.id as id_emision, em.estado_duf, pi.fecha_turnado_utic, em.consecutivo, em.folio_duf, pi.ma_SLD,
    pi.ma_DEC,
    pi.ma_MAM,
    pi.ma_DUM,
    pi.ma_PCL,
    pi.ma_VLD,
    pi.ma_MOV,
    pi.ma_ADA,
    pi.ma_FTL,
    em.dias_horarios, em.fecha_expedicion, dt.sfc_total, dt.sfc_construida, dt.sfc_prevista_cosnt, em.fecha_entrega, em.fedeerratas, dt.codigo_barras, em.tipo_tramite, em.impacto_riesgo
    FROM datos_generales dt
    INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales
    INNER JOIN emision em ON em.id_procedencia = pi.id
    where em.consecutivo!=0 AND pi.conclusion='' ORDER BY em.consecutivo DESC ");

$c=0;
$inicio_etapa='';
$check="";
$botonEvaluaciones="";
$botonEditar="";

$id_general=0;
$id_e1=0;
 //$check="<input type='checkbox' id='id_checkValidar' onclick=checkb(".$fila['id_general'] .", ".$fila['id_procedencia'].", 'sin ingreso RE') >";
while($fila=$resultado->fetch_assoc()){

    $botonTurnar='';
    $botonFolio='';
    $id_general=$fila['id_general'];
    $id_e1=$fila['id_procedencia'];
    $id_emision=$fila['id_emision'];
    $evaluaciones="";
    $estado_duf="";
    //$id_emision='';

    if ($fila['ma_SLD']==1) {
    $evaluaciones="SANITARIO";
}
if ($fila['ma_DEC']==1) {
    $evaluaciones=$evaluaciones."- DESARROLLO ECONOMICO";
}
if ($fila['ma_MAM']==1) {
    $evaluaciones=$evaluaciones."- MEDIO AMBIENTE";
}
if ($fila['ma_DUM']==1) {
    $evaluaciones=$evaluaciones."- DESARROLLO URBANO";
}
if ($fila['ma_PCL']==1) {
    $evaluaciones=$evaluaciones."- PROTECCION CIVIL";
}
if ($fila['ma_VLD']==1) {
    $evaluaciones=$evaluaciones."- VIALIDAD";
}
if ($fila['ma_MOV']==1) {
    $evaluaciones=$evaluaciones."- MOVILIDAD";
}
if ($fila['ma_ADA']==1) {
    $evaluaciones=$evaluaciones."- AGUA, DRENAGE Y ALCANTARILLADO";
}
if ($fila['ma_FTL']==1) {
    $evaluaciones=$evaluaciones."- FORESTAL";
}
switch ($fila['estado_duf']) {
    case 'TURNADO A FIRMA OK':
        $estado_duf='FIRMADO';
        break;
    case 'ENTREGADO':
        $estado_duf='ENTREGADO';
        break;

    case 'PENDIENTE DE IMPRESION':
        $estado_duf='FOLIO ASIGNADO';
        break;

    case 'GENERADO':
        $estado_duf='PENDIENTE DE FOLIO';
        break;

    case 'TURNADO A FIRMA':
        $estado_duf='FIRMADO';
        break;

    default:
        $estado_duf='SIN ESTADO';
        break;
}



    $data[$c]["mas"] = "más";
    $data[$c]["botonCaratula"] = "<button type='button' class='btn btn-info'  data-toggle='modal' data-target='#modalEntrega' onclick='cachaID($id_e1, $id_emision)'><i class='far fa-clock fa-lg'></i></button>";
    $data[$c]["consecutivo"] = $fila["consecutivo"];
    $data[$c]["origen_ingreso"] = $fila["origen_ingreso"];
    $data[$c]["no_expediente"] = $fila["no_expediente"];
    $data[$c]["folio_duf"] = $fila["folio_duf"];
    $data[$c]["nombre_propietario"] = $fila["nombre_propietario"]." / ".$fila["deno_proyecto"];
    $data[$c]["domicilio_proyecto"] = $fila["domicilio_proyecto"].', '.$fila['municipio_proyecto'].', C.P. '.$fila['cp_proyecto'].', ESTADO DE MÉXICO';
    $data[$c]["municipio_proyecto"] = $fila["municipio_proyecto"];
    $data[$c]["evaluaciones"] = $evaluaciones;
    $data[$c]["estado_duf"] = $estado_duf;
    $data[$c]["codigo_barras"] = $fila["codigo_barras"];
    $data[$c]["fecha_entrega"] = $fila["fecha_entrega"];
    $data[$c]["fedeerratas"] = $fila["fedeerratas"];

    $data[$c]["dias_horarios"] = $fila["dias_horarios"];
    $data[$c]["sfc_total"] = $fila["sfc_total"];
    $data[$c]["sfc_construida"] = $fila["sfc_construida"];
    $data[$c]["sfc_uso"] = $fila["sfc_prevista_cosnt"];
    $data[$c]["fecha_expedicion"] = $fila["fecha_expedicion"];
    $data[$c]["actividad"] = $fila["materia"].' / '.$fila['giro'].' / '.$fila['descripcion_general'];
    $data[$c]["tel_propietario"] = $fila["tel_propietario"];
    $data[$c]["correo_propietario"] = $fila["correo_propietario"];
    $data[$c]["representante_legl"] = $fila["representante_legl"];
    $data[$c]["tel_rep_legal"] = $fila["tel_rep_legal"];
    $data[$c]["correo_rep_legal"] = $fila["correo_rep_legal"];
    $data[$c]["monto_inversion"] = number_format($fila["monto_inversion"]);
    $data[$c]["no_emplos_dir"] = $fila["no_emplos_dir"];
    $data[$c]["no_emplos_ind"] = $fila["no_emplos_ind"];
    $data[$c]["estado_procencia"] = $fila["estado_procencia"];
    $data[$c]["tipo_tramite"] = $fila["tipo_tramite"];
    $data[$c]["impacto_riesgo"] = $fila["impacto_riesgo"];
    $data[$c]["fec_notificacion_procedencia"] = $fila["fec_notificacion_procedencia"];

    $c++;

}

$results = ["sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data
];

echo json_encode($results);

?>