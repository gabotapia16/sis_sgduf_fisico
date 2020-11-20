<?php

	include '../conection_bd.php';
 $resultado= mysqli_query($conection, "SELECT ID, NO_EXPEDIENTE, SOLICITUD_INGRESO, NOMBRE_PROPIETARIO, RAZON_SOCIAL, DOMICILIO_CNENICOL, MUNICIPIO, CP, SUPERFICIE_TOTAL, SUPERFICIE_CONS, SUPERFICIE_USO, TIPO_DUF, NO_DUF_ANTERIOR, FECHA_RESOLUCION, NO_OFICIO_RESOLUCION, IMPACTO, MATERIA, GIRO, ACTIVIDAD, TIPO, EVALUACIONES_TECNICAS, DIAS_HORARIOS, CORREO_ELECTRONICO, NO_TELEFONICO, MONTO_INVERSION, NO_EMPLEOS_DIRECTOS, NO_EMPLEOS_IND, ID_MUNICIPIO, ENTIDAD, CONS_DUF, ANIO_DICTAMEN, FOLIO_DUF, FOLIO_DUF_ENCRYPTED, NO_HOJA_SEGURIDAD, FECHA_EXPEDICION, FECHA_ENTREGA, ESTADO_DUF, FEDEERATAS, NO_CAJA, USUARIO_CAPTURA, FECHA_CAPTURA, HORA_CAPTURA, USUARIO_MODIFICACION, FECHA_MODIFICACION, HORA_MODIFICACION, CODIGO_BARRAS FROM dictamenes WHERE ESTADO_DUF != 'CAPTURADO' ORDER BY CONS_DUF DESC");

$c=0;
$ESTADO='';
//$editar = "<a href="."show_data_dictamen_dictamenes?ID=".base64_encode($fila['ID'])."><button type='button' class='btn btn-warning'><i class='far fa-edit'></i></span></button></a>";

while($fila=$resultado->fetch_assoc()){
	switch ($fila['ESTADO_DUF']) {
		case 'GENERADO':
			$ESTADO='EN REVISIÓN DE CARÁTULA';
			break;
		case 'IMPRESO':
			$ESTADO='IMPRESO EN HOJA DE SEGURIDAD';
			break;
		case 'FIRMADO':
			$ESTADO='FIRMADO DG';
			break;
			case 'ENTREGADO':
			$ESTADO='ENTREGADO';
			break;
			case 'CANCELADO':
			$ESTADO='CANCELADO';
			break;
		default:
			$ESTADO='SIN ESTADO';
			break;
	}

    $data[$c]["CONS_DUF"] = $fila["CONS_DUF"];
    $data[$c]["editar"]="<a href="."show_data_dictamen_dictamenes?ID=".base64_encode($fila['ID'])."><button type='button' class='btn btn-warning'><i class='far fa-edit'></i></span></button></a>";
    $data[$c]["TIPO_DUF"] = $fila["TIPO_DUF"];
    $data[$c]["IMPACTO"] = $fila["IMPACTO"];
    $data[$c]["NO_EXPEDIENTE"] = $fila["NO_EXPEDIENTE"];
    $data[$c]["NOMBRE_PROPIETARIO"] = $fila["NOMBRE_PROPIETARIO"];
    $data[$c]["RAZON_SOCIAL"] = $fila["RAZON_SOCIAL"];
    $data[$c]["DOMICILIO_CNENICOL"] = $fila['DOMICILIO_CNENICOL'].', '.$fila['MUNICIPIO'].', C.P. '.$fila['CP'].', ESTADO DE MEXICO';
    $data[$c]["TIPO_GIRO_ACTIVIDAD"] = $fila['TIPO']." / ".$fila['GIRO']." ".$fila['ACTIVIDAD'];
    $data[$c]["EVALUACIONES_TECNICAS"] = $fila["EVALUACIONES_TECNICAS"];
    $data[$c]["MUNICIPIO"] = $fila["MUNICIPIO"];
    $data[$c]["NO_DUF_ANTERIOR"] = $fila["NO_DUF_ANTERIOR"];
    $data[$c]["FOLIO_DUF"] = $fila["FOLIO_DUF"];
    $data[$c]["MONTO_INVERSION"] = $fila["MONTO_INVERSION"];
    $data[$c]["DIAS_HORARIOS"] = $fila["DIAS_HORARIOS"];
    $data[$c]["NO_EMPLEOS_DIRECTOS"] = $fila["NO_EMPLEOS_DIRECTOS"];
    $data[$c]["NO_EMPLEOS_IND"] = $fila["NO_EMPLEOS_IND"];
    $data[$c]["SUPERFICIE_TOTAL"] = $fila["SUPERFICIE_TOTAL"];
    $data[$c]["SUPERFICIE_CONS"] = $fila["SUPERFICIE_CONS"];
    $data[$c]["SUPERFICIE_USO"] = $fila["SUPERFICIE_USO"];
    $data[$c]["NO_CAJA"] = $fila["NO_CAJA"];
    $data[$c]["FECHA_EXPEDICION"] = $fila["FECHA_EXPEDICION"];
    $data[$c]["FECHA_ENTREGA"] = $fila["FECHA_ENTREGA"];
    $data[$c]["FEDEERATAS"] = $fila["FEDEERATAS"];
    $data[$c]["CODIGO_BARRAS"] = $fila["CODIGO_BARRAS"];
    $data[$c]["ESTADO_DUF"] = $ESTADO;

    $c++;

}

$results = ["sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data ];

echo json_encode($results);

?>