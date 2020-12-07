<?php 
include '../conection_bd.php';
date_default_timezone_set('America/Mexico_City');
$dependencia=$_POST['dependencia'];
$folio=$_POST['folio'];
$fechaIngreso=$_POST['fechaIngreso'];
$expediente=$_POST['expediente'];
$nombrePropietario=$_POST['nombrePropietario'];
$telPropietario=$_POST['telPropietario'];
$banderaRepLegal=$_POST['banderaRepLegal'];
$correoPropietario=$_POST['correoPropietario'];
$documentoAcreditorio=$_POST['documentoAcreditorio'];
$nombreRepresentanteLegal=$_POST['nombreRepresentanteLegal'];
$telRepresentanteLegal=$_POST['telRepresentanteLegal'];
$correoRepresentanteLegal=$_POST['correoRepresentanteLegal'];
$nombreProyecto=$_POST['nombreProyecto'];
$materia=$_POST['materia'];
$giro=$_POST['giro'];
$actividadComercial=$_POST['actividadComercial'];
$descripcion=$_POST['descripcion'];
$domicilio=$_POST['domicilio'];
$codigoPostal=$_POST['codigoPostal'];
$municipio=$_POST['municipio'];
$sfcTotal=$_POST['sfcTotal'];
$sfcConstruida=$_POST['sfcConstruida'];
$sfcPrevia=$_POST['sfcPrevia'];
$monto=$_POST['monto'];
$moneda=$_POST['moneda'];
$empleosDirectos=$_POST['empleosDirectos'];
$empleosIndirectos=$_POST['empleosIndirectos'];
$anexo=$_POST['anexo'];
$observaciones=$_POST['observaciones'];
$usuario=$_POST['usuario'];
$caja=$_POST['caja'];
$nombrejuridicoCol=$_POST['nombrejuridicoCol'];
$codigoBarras=$_POST['codigoBarras'];
//fechaIngreso=date(m.)
$FECHA_CAPTURA=date("Y-m-d H:i:s");
//$hoy = getdate();
//$folio='33-a';
//$banderaRep=1;
//$materia='forestal';
//$identificacion=0;
$jsondata=array();

//echo "INSERT INTO datos_generales(id_procedencia, id_tramitacion, id_emision, prioridad, origen_ingreso, folio_solicitud, fecha_ingreso, no_expediente, nombre_propietario, tel_propietario, correo_propietario, bandera_rep_leg, representante_legl, doc_personalidad, tel_rep_legal, correo_rep_legal, deno_proyecto, domicilio_proyecto, municipio_proyecto, cp_proyecto, materia, giro, actividad_comercial, descripcion_general, monto_inversion, tipo_nomeda, no_emplos_dir, no_emplos_ind, sfc_total, sfc_construida, sfc_prevista_cosnt, identificacion, identificacion_NF, curp, curp_NF, personalidad_doc, personalidad_doc_NF, acta_constitutiva, acta_constitutiva_NF, posesion, posesion_NF, doc_posesion, rfc, rfc_NF, memoria_desc, memoria_desc_NF, croquis, croquis_NF, aerofoto, aerofoto_NF, otros, otros_NF, otros_descripcion, anexo_digital, observaciones_gen, usu_captura, fech_captura, usu_modificacion, fech_modificacion, no_caja_tramitacion, persona_juridicolectiva, codigo_barras) VALUES (0,0,0,3, '$dependencia','$folio', '$fechaIngreso', '$expediente', '$nombrePropietario', '$telPropietario', '$correoPropietario', $banderaRepLegal, '$nombreRepresentanteLegal', '$documentoAcreditorio', '$telRepresentanteLegal', '$correoRepresentanteLegal', '$nombreProyecto', '$domicilio', '$municipio', '$codigoPostal', '$materia', '$giro', '$actividadComercial', '$descripcion', $monto, '$moneda', $empleosDirectos, $empleosIndirectos, $sfcTotal, $sfcConstruida, $sfcPrevia, 0,0,0,0,0,0,0,0,0,0,'algo',0,0,0,0,0,0,0,0,0,0,'algo','$anexo','$observaciones',$usuario, '$FECHA_CAPTURA', 0, '0000-00-00', '$caja', '$nombrejuridicoCol', '$codigoBarras')";

$resultado = mysqli_query($conection, "INSERT INTO datos_generales(id_procedencia, id_emision, prioridad, origen_ingreso, folio_solicitud, fecha_ingreso, no_expediente, nombre_propietario, tel_propietario, correo_propietario, bandera_rep_leg, representante_legl, doc_personalidad, tel_rep_legal, correo_rep_legal, deno_proyecto, domicilio_proyecto, municipio_proyecto, cp_proyecto, materia, giro, actividad_comercial, descripcion_general, monto_inversion, tipo_nomeda, no_emplos_dir, no_emplos_ind, sfc_total, sfc_construida, sfc_prevista_cosnt, identificacion, identificacion_NF, curp, curp_NF, personalidad_doc, personalidad_doc_NF, acta_constitutiva, acta_constitutiva_NF, posesion, posesion_NF, doc_posesion, rfc, rfc_NF, memoria_desc, memoria_desc_NF, croquis, croquis_NF, aerofoto, aerofoto_NF, otros, otros_NF, otros_descripcion, anexo_digital, observaciones_gen, usu_captura, fech_captura, usu_modificacion, fech_modificacion, no_caja_tramitacion, persona_juridicolectiva, codigo_barras) VALUES (0,0,3, '$dependencia','$folio', '$fechaIngreso', '$expediente', '$nombrePropietario', '$telPropietario', '$correoPropietario', $banderaRepLegal, '$nombreRepresentanteLegal', '$documentoAcreditorio', '$telRepresentanteLegal', '$correoRepresentanteLegal', '$nombreProyecto', '$domicilio', '$municipio', '$codigoPostal', '$materia', '$giro', '$actividadComercial', '$descripcion', $monto, '$moneda', $empleosDirectos, $empleosIndirectos, $sfcTotal, $sfcConstruida, $sfcPrevia, 0,0,0,0,0,0,0,0,0,0,'algo',0,0,0,0,0,0,0,0,0,0,'algo','$anexo','$observaciones',$usuario, '$FECHA_CAPTURA', 0, '0000-00-00', '$caja', '$nombrejuridicoCol', '$codigoBarras')");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

	 echo json_encode($jsondata);
 ?>