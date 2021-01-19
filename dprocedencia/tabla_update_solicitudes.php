<?php
include '../conection_bd.php';

$resultado = mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES as nombre_capturo, us.APELLIDO_PATERNO as apellido_capturo, usus.NOMBRES as nombre_edito, usus.APELLIDO_PATERNO as apellido_edito, dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, codigo_barras, pi.turnado_etapa2, pi.fec_notificacion_procedencia, dt.fecha_ingreso, dt.materia, dt.giro, dt.descripcion_general, dt.no_caja, pi.fec_expedicion_prevencion, pi.fec_expedicion_procedencia, pi.fech_modificacion, pi.ma_SLD, pi.ma_DEC, pi.ma_MAM, pi.ma_DUM, pi.ma_PCL, pi.ma_VLD, pi.ma_MOV, pi.ma_ADA, pi.ma_FTL,
	 dt.Respuesta AS Respuesta, dt.SeleccionRespuesta AS SeleccionR , dt.URLRespuesta AS URLR FROM datos_generales dt
INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales
INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura
INNER JOIN usuarios usus ON usus.ID_USER = pi.usu_modificacion
where pi.estado_etapa='confirmado' and pi.conclusion=''");

$c=0;

while($fila=$resultado->fetch_assoc()){
	$id_general=$fila['id_general'];
	$id_e1=$fila['id_procedencia'];
	$data[$c]["mas"] ="Más";
$data[$c]["botonEditar"] = "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' onclick=\"cachaID($id_general, $id_e1)\"><i class='far fa-edit fa-lg' ></i></button>";
	$data[$c]["botonConcluir"] = "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#modalConclusion' onclick=\"cachaID($id_general, $id_e1)\"><i class='fas fa-folder fa-lg'></i></button>";
	$data[$c]["origen_ingreso"] = $fila["origen_ingreso"];
	$data[$c]["no_caja"] = $fila["no_caja"];
	$data[$c]["no_expediente"] = $fila["no_expediente"];
	$data[$c]["folio_solicitud"] = $fila["folio_solicitud"];
	$data[$c]["nombre_propietario"] = $fila["nombre_propietario"];
	$data[$c]["deno_proyecto"] = $fila["deno_proyecto"];
	$data[$c]["giro"] =  $fila["materia"];
	$data[$c]["actividad"] =  $fila['giro'];
	$data[$c]["descripcion"] =  $fila['descripcion_general'];
	$data[$c]["domicilio_proyecto"] = $fila["domicilio_proyecto"].", ".$fila["municipio_proyecto"].", C.P. ".$fila["cp_proyecto"].", ESTADO DE MÉXICO";
	$data[$c]["municipio_proyecto"] = $fila["municipio_proyecto"];
	$data[$c]["tel_propietario"] = $fila["tel_propietario"];
	$data[$c]["representante_legl"] = $fila["representante_legl"];
	$data[$c]["tel_rep_legal"] = $fila["tel_rep_legal"];
	$data[$c]["monto_inversion"] = $fila["monto_inversion"];
	$data[$c]["no_emplos_dir"] = $fila["no_emplos_dir"];
	$data[$c]["no_emplos_ind"] = $fila["no_emplos_ind"];
	$data[$c]["estado_prevencion"] = $fila["estado_prevencion"];
	$data[$c]["estado_procencia"] = $fila["estado_procencia"];
	$data[$c]["fec_expedicion_prevencion"] = $fila["fec_expedicion_prevencion"];
	$data[$c]["fec_expedicion_procedencia"] = $fila["fec_expedicion_procedencia"];
	$data[$c]["fec_notificacion_procedencia"] = $fila["fec_notificacion_procedencia"];
	$data[$c]["codigo_barras"] = $fila["codigo_barras"];
	$data[$c]["turnado_etapa2"] = $fila["turnado_etapa2"];
	$data[$c]["capturo"] = $fila["nombre_capturo"].' '.$fila['apellido_capturo'];
	$data[$c]["edito"] = $fila["nombre_edito"].' '.$fila['apellido_edito'];
	$data[$c]["fecha_ingreso"] = $fila["fecha_ingreso"];
	$data[$c]["fech_modificacion"] = $fila["fech_modificacion"];
	$data[$c]["ma_SLD"] = $fila["ma_SLD"];
	$data[$c]["ma_DEC"] = $fila["ma_DEC"];
	$data[$c]["ma_MAM"] = $fila["ma_MAM"];
	$data[$c]["ma_DUM"] = $fila["ma_DUM"];
	$data[$c]["ma_PCL"] = $fila["ma_PCL"];
	$data[$c]["ma_VLD"] = $fila["ma_VLD"];
	$data[$c]["ma_MOV"] = $fila["ma_MOV"];
	$data[$c]["ma_ADA"] = $fila["ma_ADA"];
	$data[$c]["ma_FTL"] = $fila["ma_FTL"];

    $var_URL = "https://cofaem.edomex.gob.mx/sis/sgduf_portal/";

    if($fila["Respuesta"] == '1') {
        if($fila["SeleccionR"] == '1')
        {
            $data[$c]["Continua"] ="<button type='button' class='btn btn-success'><i class='fas fa-check-circle'></i></button>";
            $URL_VARs = substr($fila["URLR"], 3);
            $Armado_URL = "<a href='" . $var_URL. $URL_VARs . "' id='documento' target='_blank'><i class='far fa-file-pdf fa-2x text-info'></i></a>";
            $data[$c]["URL_Archivo"] = $Armado_URL;
        }
        else
        {
            $data[$c]["Continua"] ="<button type='button' class='btn btn-danger'><i class='fas fa-times-circle'></i></button>";
            $URL_VARs = substr($fila["URLR"], 3);
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