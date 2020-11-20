
<?php 
include '../conection_bd.php';
$f_ingresoRequisitosEspecificos=$_POST['f_ingresoRequisitosEspecificos'];
$f_envioDependencia=$_POST['f_envioDependencia'];
$num_OficioRemesaEnvio=$_POST['num_OficioRemesaEnvio'];
//$f_recepcionRemesa=$_POST['f_recepcionRemesa'];
$f_respuestaArea=$_POST['f_respuestaArea'];
$num_oficioTurno=$_POST['num_oficioTurno'];
//$fechaRecepcionRespuesta=$_POST['fechaRecepcionRespuesta'];
$select_estadoRespuesta=$_POST['select_estadoRespuesta'];
$f_solicitudOficioVisitaINVEA=$_POST['f_solicitudOficioVisitaINVEA'];
$num_oficioSolicitudVisitaINVEA=$_POST['num_oficioSolicitudVisitaINVEA'];
$f_respuestaOficioINVEA=$_POST['f_respuestaOficioINVEA'];
$num_oficioRespuestaVisitaINVEA=$_POST['num_oficioRespuestaVisitaINVEA'];
$f_recepcionOficioRespuestaINVEA=$_POST['f_recepcionOficioRespuestaINVEA'];
$select_estadoINVEA=$_POST['select_estadoINVEA'];
$select_numConsecutivo=$_POST['select_numConsecutivo'];
$num_oficioPrevencion=$_POST['num_oficioPrevencion'];
$f_recepcionPrevencion=$_POST['f_recepcionPrevencion'];
$f_notificacionPrevencion=$_POST['f_notificacionPrevencion'];
$f_subsanaPrevencion=$_POST['f_subsanaPrevencion'];
$num_oficioSubsanaPrevencion=$_POST['num_oficioSubsanaPrevencion'];
$f_recepcionSubsanaPrevencion=$_POST['f_recepcionSubsanaPrevencion'];
//$select_estadoPrevencion=$_POST['select_estadoPrevencion'];
//$f_recepcionEvaluacion=$_POST['f_recepcionEvaluacion'];
$num_oficioEvaluacionTecnica=$_POST['num_oficioEvaluacionTecnica'];
//$f_notificaEvaluacionTecnica=$_POST['f_notificaEvaluacionTecnica'];
//$select_estadoEvaluacionTecnica=$_POST['select_estadoEvaluacionTecnica'];
$observaciones=$_POST['observaciones'];
$oficio_respuesta=$_POST['oficio_respuesta'];
$tabla=$_POST['tabla'];
$idDatosGenerales=$_POST['idDatosGenerales'];
$idEtapa1=$_POST['idEtapa1'];
$fecha_notificacion_evaluacion=$_POST['id_fecha_notificacion_evaluacion'];
$usuario=$_POST['usuario'];
date_default_timezone_set('America/Mexico_City');
$FECHA_CAPTURA=date("Y-m-d H:i:s");
$jsondata=array();



$resultado = mysqli_query($conection, "UPDATE $tabla SET fec_ingreso_req_esp='$f_ingresoRequisitosEspecificos', fec_envio_dependencia='$f_envioDependencia', no_ofi_envio_remesa='$num_OficioRemesaEnvio',  fec_resp_dependencia='$f_respuestaArea', no_oficio_turno_resp='$num_oficioTurno', estado_respuesta_dep='$select_estadoRespuesta', fec_ofisol_invea='$f_solicitudOficioVisitaINVEA', no_ofisol_invea='$num_oficioSolicitudVisitaINVEA', no_ofiresp_invea='$num_oficioRespuestaVisitaINVEA', fec_recepcion_ofiresp_invea='$f_recepcionOficioRespuestaINVEA',  estado_invea='$select_estadoINVEA', no_cons_prev='$select_numConsecutivo', no_ofici_prev='$num_oficioPrevencion', fec_recepcion_prev='$f_recepcionPrevencion', fec_notif_prev='$f_notificacionPrevencion', fec_subsa_prev='$f_subsanaPrevencion', no_ofici_subsa_prev='$num_oficioSubsanaPrevencion', fec_recepcion_subsa_prev='$f_recepcionSubsanaPrevencion',  no_ofici_evatec='$num_oficioEvaluacionTecnica', observaciones='$observaciones', usuario_modifica=$usuario, fecha_modifica='$FECHA_CAPTURA', num_oficio_respuesta='$oficio_respuesta', fecha_notificacion_evaluacion='$fecha_notificacion_evaluacion', fec_ofiresp_invea='$f_respuestaOficioINVEA' WHERE id_datos_generales=$idDatosGenerales AND id_procedencia=$idEtapa1");

$resultado = mysqli_query($conection, "UPDATE procedencia_integracion SET usu_modificacion=$usuario, fech_modificacion='$FECHA_CAPTURA' WHERE id=$idEtapa1");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

	 echo json_encode($jsondata);
/*------------ELMINADAS POR PETICION DE LORENA--------------------
fec_reception_remesa='$f_recepcionRemesa',
fec_reception_resp_dep='$fechaRecepcionRespuesta',
fec_ofiresp_invea='$f_respuestaOficioINVEA', 
 estado_prev='$select_estadoPrevencion',

 fec_notif_evatec='$f_notificaEvaluacionTecnica', 
 estado_evatec='$select_estadoEvaluacionTecnica', 
 fec_recepcion_evatec='$f_recepcionEvaluacion',
*/
 ?>
