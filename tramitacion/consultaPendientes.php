<?php
	

	/*$consulta = "SELECT * FROM usuarios";
	$registro = mysql_query($consulta,$dbx);
*/
	include 'conection_bd.php';
	$sql = mysqli_query($conection, "SELECT dt.id as id_general, pi.id as id_procedencia, us.NOMBRES, us.APELLIDO_PATERNO, dt.no_caja_tramitacion, dt.id_procedencia, dt.cp_proyecto,  dt.origen_ingreso, dt.no_expediente, dt.folio_solicitud, dt.nombre_propietario, dt.tel_propietario, dt.correo_propietario, dt.representante_legl, dt.tel_rep_legal, dt.correo_rep_legal, dt.deno_proyecto, dt.domicilio_proyecto, dt.municipio_proyecto, dt.cp_proyecto, dt.giro, dt.actividad_comercial, dt.descripcion_general, dt.monto_inversion, dt.tipo_nomeda, dt.no_emplos_dir, dt.no_emplos_ind, pi.estado_prevencion, pi.estado_procencia, pi.estado_etapa, codigo_barras, pi.turnado_etapa2, pi.fec_notificacion_procedencia FROM datos_generales dt INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales INNER JOIN usuarios us ON us.ID_USER = dt.usu_captura where pi.estado_etapa=1");
	
	$tabla = "";
	
	while($row = mysqli_fetch_array($sql)){		

		/*$editar = '<a href=\"edicionUsuario.php?a='.$row['Login'].'&b='.$row['Password'].'&c='.$row['Nombre'].'&d='.$row['TipoLogin'].'&e='.$row['status'].'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
		$eliminar = '<a href=\"actionDelete.php?id='.$row['Login'].'\" onclick=\"return confirm(\'¿Seguro que desea eliminiar este usuario?\')\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';
		*/
		$tabla.='{
				  "expediente":"'.$row['no_expediente'].'"
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>