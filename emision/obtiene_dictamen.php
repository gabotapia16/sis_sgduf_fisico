<?php 
include("../segurity_session.php");
include '../conection_bd.php';

$id_general=$_POST['id_general'];
$id_etapa1=$_POST['id_etapa1'];
$jsondata=array();

$resultado = mysqli_query($conection, "SELECT * FROM emision where id_procedencia=$id_etapa1");
$numero_filas = mysqli_num_rows($resultado);

if ($numero_filas==0) {

	$resultado=mysqli_query($conection,"INSERT INTO emision(id_datos_generales, id_procedencia) 
	VALUES 
	($id_general,$id_etapa1)");
}

$busqueda = mysqli_query($conection, "SELECT id, id_datos_generales, id_procedencia, tipo_tramite, impacto_riesgo, tipo_duf, dias_horarios, vigencia_duf, clave_municipio, consecutivo, anio_expedicion, folio_duf, folio_encrypted, no_hoja_seguridad, fecha_expedicion, estado_duf, fecha_entrega, fedeerratas, fecha_elaboracion_fedeerratas, no_duf_anterior, fecha_resolucion, no_oficio_resolucion, usuario_captura, fecha_captura, usuario_modifica, fecha_modifica FROM emision where id_procedencia=$id_etapa1");

$datos = mysqli_fetch_assoc($busqueda);

$jsondata["tipo_tramite"]=$datos['tipo_tramite'];
$jsondata["impacto_riesgo"]=$datos['impacto_riesgo'];
$jsondata["tipo_duf"]=$datos['tipo_duf'];
$jsondata["dias_horarios"]=$datos['dias_horarios'];
$jsondata["fecha_expedicion"]=$datos['fecha_expedicion'];

echo json_encode($jsondata);

 ?>