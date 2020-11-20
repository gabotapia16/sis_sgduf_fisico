<?php

include '../conection_bd.php';

 $resultado= mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES AS nombreModifico, us.APELLIDO_PATERNO AS apellidoModifico, users.NOMBRES AS nombresConfirmo, users.APELLIDO_PATERNO AS apellidoConfirmo,  dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, pi.fec_notificacion_procedencia, pi.fecha_confirma_rechaza, pi.turnado_etapa3, pi.etapa_inicio, ingreso_requisitos, dt.materia, dt.giro, dt.descripcion_general
    FROM datos_generales dt
    INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales
    INNER JOIN usuarios us ON us.ID_USER = pi.usu_modificacion
    INNER JOIN usuarios users ON users.ID_USER = pi.usu_confirma_rechaza_e3
    where pi.estado_etapa=6 AND pi.conclusion=''");

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
    $botonCaratula='';
    $botonTurnar='';
	$id_general=$fila['id_general'];
	$id_e1=$fila['id_procedencia'];
    //$id_emision='';
    $busqueda = mysqli_query($conection, "SELECT id, estado_duf FROM emision where id_procedencia=$id_e1");
    $datos = mysqli_fetch_assoc($busqueda);
    $id_emision=$datos['id'];
    if ($datos['estado_duf']=='GENERADO') {

        $botonCaratula = "<button type='button' class='btn btn-secondary' onclick=\"obtenCaratula('http://cofaem.edomex.gob.mx/sis/scofaem/emision?ID=$id_emision')\"><i class='far fa-file-pdf fa-lg'></i></button>";
        $botonTurnar = "<button type='button' class='btn btn-success' onclick='cachaID($id_general, $id_e1); turnarUTIC($id_general, $id_e1)'><i class='fas fa-print fa-lg'></i></button>";
    }



 	$data[$c]["inicio_etapa"] = $inicio_etapa;
 	$data[$c]["check"] = $check;
 	$data[$c]["botonEditar"] = $botonEditar="<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalEditar' onclick=\" cachaID($id_general, $id_e1);\"><i class='far fa-edit fa-lg' ></i></button>";
    $data[$c]["botonEvaluaciones"] = "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick=\"generaBotones($id_general, $id_e1); cachaID($id_general, $id_e1)\"><i class='fas fa-clipboard-list fa-lg'></i></button>";
 	$data[$c]["botonConcluir"] = "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalConclusion' onclick='cachaID($id_general, $id_e1)'><i class='fas fa-folder fa-lg'></i></button>";
    $data[$c]["botonDictamen"] = "<button type='button' class='btn btn-danger'  data-toggle='modal' data-target='#modalDictamen' onclick='cachaID($id_general, $id_e1); obtieneDictamen($id_general, $id_e1)'><i class='fas fa-file-invoice fa-lg'></i></button>";
    $data[$c]["botonCaratula"] = $botonCaratula;
    $data[$c]["botonTurnar"] = $botonTurnar;
    $data[$c]["origen_ingreso"] = $fila["origen_ingreso"];
    $data[$c]["no_expediente"] = $fila["no_expediente"];
    $data[$c]["folio_solicitud"] = $fila["folio_solicitud"];
    $data[$c]["nombre_propietario"] = $fila["nombre_propietario"];
    $data[$c]["deno_proyecto"] = $fila["deno_proyecto"];
    $data[$c]["domicilio_proyecto"] = $fila["domicilio_proyecto"].', '.$fila['municipio_proyecto'].', C.P. '.$fila['cp_proyecto'].', ESTADO DE MEXICO';
    $data[$c]["actividad"] = $fila["materia"].' / '.$fila['giro'].' / '.$fila['descripcion_general'];
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
    $data[$c]["turnado_etapa3"] = $fila["turnado_etapa3"];
    $data[$c]["fecha_confirma_rechaza"] = $fila["fecha_confirma_rechaza"];
    $data[$c]["nombresConfirmo"] = $fila["nombresConfirmo"].' '.$fila['apellidoConfirmo'];
    $data[$c]["nombreModifico"] = $fila["nombreModifico"].' '.$fila['apellidoModifico'];
    $data[$c]["ingreso_requisitos"] = $fila["ingreso_requisitos"];


    $c++;

}

$results = ["sEcho" => 1,
	"iTotalRecords" => count($data),
	"iTotalDisplayRecords" => count($data),
	"aaData" => $data
];

echo json_encode($results);

?>