<?php

include '../conection_bd.php';

 $resultado= mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES AS nombreModifico, us.APELLIDO_PATERNO AS apellidoModifico, dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.fec_notificacion_procedencia, pi.confirmado_etapa2, pi.turnado_etapa2, pi.etapa_inicio, ingreso_requisitos, pi.estado_etapa, pi.motivo_rechazo, pi.turnado_etapa3, pi.ma_SLD,
    pi.ma_DEC,
    pi.ma_MAM,
    pi.ma_DUM,
    pi.ma_PCL,
    pi.ma_VLD,
    pi.ma_MOV,
    pi.ma_ADA,
    pi.ma_FTL,
    pi.usuario_turna_etapa3
    , dt.Respuesta AS Respuesta, dt.SeleccionRespuesta AS SeleccionR , dt.URLRespuesta AS URLR

  FROM datos_generales dt
  INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales
  INNER JOIN usuarios us ON us.ID_USER = pi.usu_modificacion
  INNER JOIN usuarios users ON users.ID_USER = pi.usuario_turna_etapa3
    where pi.estado_etapa=4 OR pi.estado_etapa=5 OR pi.estado_etapa=6 AND pi.conclusion=''");

$c=0;
$inicio_etapa='';
$check="";
$botonEvaluaciones="";
$botonEditar="";
$id_general=0;
$id_e1=0;
$estado_confirmacion='';
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
    $botonTurnar="";
    $botonEditar="";
    $evaluaciones="";
    switch ($fila['estado_etapa']) {
    case 4:
        $estado_confirmacion= "En Espera de Confirmación E3";
        break;
    case 5:
        $estado_confirmacion="No Confirmado por E3";
        $botonTurnar="<button type='button' class='btn btn-success' onclick='turnar($id_general, $id_e1)'><i class='fas fa-file-export fa-lg'></i></button>";
         $botonEditar="<button type='button' class='btn btn-warning' onclick=\"modificar($id_general, $id_e1);\"><i class='far fa-edit fa-lg' ></i></button>";
        break;
    case 6:
        $estado_confirmacion="Confirmado por E3";
        break;
    default:
        $estado_confirmacion= "Sin Estado";
        break;
    }

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

    $data[$c]["estado_confirmacion"] = $estado_confirmacion;
    $data[$c]["motivo_rechazo"] = $fila['motivo_rechazo'];
    $data[$c]["botonTurnar"] =$botonTurnar."<br><br> ".$botonEditar;
    $data[$c]["turnado_etapa3"] = $fila["turnado_etapa3"];
    $data[$c]["evaluaciones"] = $evaluaciones;
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
    $data[$c]["monto_inversion"] = number_format($fila["monto_inversion"]).' '.$fila['tipo_nomeda'];
    $data[$c]["no_emplos_dir"] = $fila["no_emplos_dir"];
    $data[$c]["no_emplos_ind"] = $fila["no_emplos_ind"];
    $data[$c]["estado_procencia"] = $fila["estado_procencia"];
    $data[$c]["fec_notificacion_procedencia"] = $fila["fec_notificacion_procedencia"];
    $data[$c]["turnado_etapa2"] = $fila["turnado_etapa2"];
    $data[$c]["confirmado_etapa2"] = $fila["confirmado_etapa2"];
    $data[$c]["usuarioTurno"] = $fila["nombreModifico"].' '.$fila['apellidoModifico'];
    $data[$c]["ingreso_requisitos"] = $fila["ingreso_requisitos"];


    $var_URL = "https://cofaem.edomex.gob.mx/sis/sgduf_portal/";

    if($fila["Respuesta"] == '1') {
        if($fila["SeleccionR"] == '1')
        {
            $data[$c]["Continua"] ="<button type='button' class='btn btn-success'><i class='fas fa-check-circle'></i></button>";
            $URL_VARs = substr($fila["URLR"], 4);
            $Armado_URL = "<a href='" . $var_URL. $URL_VARs . "' id='documento' target='_blank'><i class='far fa-file-pdf fa-2x text-info'></i></a>";
            $data[$c]["URL_Archivo"] = $Armado_URL;
        }
        else
        {
            $data[$c]["Continua"] ="<button type='button' class='btn btn-danger'><i class='fas fa-times-circle'></i></button>";
            $URL_VARs = substr($fila["URLR"], 4);
            $Armado_URL = "<a href='" . $var_URL. $URL_VARs . "' id='documento' target='_blank'><i class='far fa-file-pdf fa-2x text-info'></i></a>";
            $data[$c]["URL_Archivo"] = $Armado_URL;
        }
    }
    else
    {
        $data[$c]["Continua"] ="En espera";
        $data[$c]["URL_Archivo"] = "";
    }


    $c++;

}

$results = ["sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data
];

echo json_encode($results);

?>