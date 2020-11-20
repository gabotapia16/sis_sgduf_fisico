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
$idModificar=$_POST['id'];
$usuario=$_POST['usuario'];
$caja=$_POST['caja'];
$codigoBarras=$_POST['codigoBarras'];
//fechaIngreso=date(m.)
$FECHA_CAPTURA=date("Y-m-d H:i:s");
//$hoy = getdate();
//$folio='33-a';
//$banderaRep=1;
//$materia='forestal';
//$identificacion=0;
$jsondata=array();
 

$resultado = mysqli_query($conection, "UPDATE datos_generales SET origen_ingreso='$dependencia', no_caja_tramitacion='$caja', folio_solicitud='$folio', fecha_ingreso='$fechaIngreso', no_expediente='$expediente', nombre_propietario='$nombrePropietario', tel_propietario='$telPropietario', correo_propietario='$correoPropietario', bandera_rep_leg='$banderaRepLegal', representante_legl='$nombreRepresentanteLegal', doc_personalidad='$documentoAcreditorio', tel_rep_legal='$telRepresentanteLegal', correo_rep_legal='$correoRepresentanteLegal', deno_proyecto='$nombreProyecto', domicilio_proyecto='$domicilio', municipio_proyecto='$municipio', cp_proyecto='$codigoPostal', materia='$materia', giro='$giro', actividad_comercial='$actividadComercial', descripcion_general='$descripcion', monto_inversion=$monto, tipo_nomeda='$moneda', no_emplos_dir=$empleosDirectos, no_emplos_ind=$empleosIndirectos, sfc_total=$sfcTotal, sfc_construida=$sfcConstruida, sfc_prevista_cosnt=$sfcPrevia, anexo_digital='$anexo', observaciones_gen='$observaciones', usu_modificacion=$usuario, fech_modificacion='$FECHA_CAPTURA', codigo_barras='$codigoBarras' WHERE id=$idModificar");

if($resultado != true){

	 	$jsondata["resultado"]=mysqli_errno($conection);
	 	//echo $jsondata["res"]
	 }else{
	 	$jsondata["resultado"]=$resultado;
	 }

	 echo json_encode($jsondata);
 ?>