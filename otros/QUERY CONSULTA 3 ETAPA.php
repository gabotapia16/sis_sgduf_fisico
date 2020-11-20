<?php
include("segurity_session.php");
include("conection_bd.php");
?>
<html>
	<head>
		<title>Usuarios</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="shortcut icon" href="imagenes/sys.png" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         
	</head>
	<body>
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <img alt="Brand" src="imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de archivo</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="menu_archivo">Menu principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
        
       
                <?php        
                             //---------------------------------------------------
                                $sql = mysqli_query($conection,"SELECT FECHA_INGRESO,NO_EXPEDIENTE,NO_CAJA,ANIO_CAJA,PROPIETARIO,DENOMINACION_RAZON,GIRO,ACTIVIDAD_COMERCIAL,ETAPA_TRAMITE,NO_OFICIO_PREVENCION,FECHA_PREVENCION,NO_OFICIO_PROCEDENCIA,FECHA_PROCEDENCIA, ESTADO_ETAPA1,NO_EVALUACION_SLD,MATERIA_MA_SLD,MATERIA_MA_DUM,MATERIA_MA_PCL,MATERIA_MA_MAM,MATERIA_MA_DEC,MATERIA_MA_DEC,MATERIA_MA_COM,MATERIA_MA_MOV,MATERIA_MA_ADA,FECHA_NOTIFICACION_SLD,RESULTADO_EVALUACION_SLD,NO_EVALUACION_DUM,FECHA_NOTIFICACION_DUM,RESULTADO_EVALUACION_DUM,NO_EVALUACION_PCL,FECHA_NOTIFICACION_PCL,RESULTADO_EVALUACION_PCL,NO_EVALUACION_MAM,FECHA_NOTIFICACION_MAM,RESULTADO_EVALUACION_MAM,NO_EVALUACION_DEC,FECHA_NOTIFICACION_DEC,RESULTADO_EVALUACION_DEC,NO_EVALUACION_COM,FECHA_NOTIFICACION_COM,RESULTADO_EVALUACION_COM,NO_EVALUACION_MOV,FECHA_NOTIFICACION_MOV,RESULTADO_EVALUACION_MOV,NO_EVALUACION_ADA,FECHA_NOTIFICACION_ADA,RESULTADO_EVALUACION_ADA  FROM expedientes_recepcion where GIRO = 'SALUBRIDAD LOCAL' AND ETAPA_TRAMITE = 1 and FECHA_INGRESO  BETWEEN '2019-01-01' AND '2019-12-31' ORDER BY FECHA_INGRESO asc ");

                                
                                $contar = mysqli_num_rows($sql);

                                if($contar == 0){echo "<p align=center>No hay datos</p>";}
                                else{
                                   echo " 
                
                                          <table width=100% border=1>
                                            
                                            <tr>
                                                 <td align=CENTER><h2>ETAPA 1 - 2019 (SALUBRIDAD LOCAL)</h2></td>
                                            </tr>
                                            <tr>
                                                 <td align=CENTER><h2> Total de registros en sistema: $contar </h2></td>
                                            </tr>
                                            
                                            </table>
                                            <div name=Resultado_SQL id=Resultado_SQL></div>
                                       "; 
                                    echo " 
                                      
                                          <table width=100% border=1>
                                            <tr>
                                                <th><h6 align=left>FECHA DE INGRESO</h6></th>
                                                <th><h6 align=left>NO. EXPEDIENTE</h6></th>
                                                <th><h6 align=left>NO. DE CAJA</h6></th>
                                                <th><h6 align=left>AÑO DE CAJA</h6></th>
                                                <th><h6 align=left>PROPIETARIO</h6></th>
                                                <th><h6 align=left>RAZON SOCIAL</h6></th>
                                                <th><h6 align=left>GIRO</h6></th>
                                                <th><h6 align=left>ACTIVIDAD COMERCIAL</h6></th>
                                                <th><h6 align=left>ETAPA</h6></th>
                                                <th><h6 align=left>PREVENCION</h6></th>
                                                <th><h6 align=left>PROCEDENCIA</h6></th>
                                                <th><h6 align=left>SLD</h6></th>
                                                <th><h6 align=left>DUM</h6></th>
                                                <th><h6 align=left>PCL</h6></th>
                                                <th><h6 align=left>MAM</h6></th>
                                                <th><h6 align=left>DEC</h6></th>
                                                <th><h6 align=left>COM</h6></th>
                                                <th><h6 align=left>MOV</h6></th>
                                                <th><h6 align=left>ADA</h6></th>
                                                <th><h6 align=left>SLD</h6></th>
                                                <th><h6 align=left>DUM</h6></th>
                                                <th><h6 align=left>PCL</h6></th>
                                                <th><h6 align=left>MAM</h6></th>
                                                <th><h6 align=left>DEC</h6></th>
                                                <th><h6 align=left>COM</h6></th>
                                                <th><h6 align=left>MOV</h6></th>
                                                <th><h6 align=left>ADA</h6></th>
                                                
                                            </tr>";
                                    $SINPREVENCIONNINOTIFICACION=0;
                                    $CONPREVENCIONSINNOTIFICAR=0;
                                    $CONPREVENCIONNOTIFICADA=0;
                                    $SINPROCEDENCIANINOTIFICACION=0;
                                    $CONPROCEDENCIASINNOTIFICAR=0;
                                    $CONPROCEDENCIANOTIFICADA=0;
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                     
                                     echo "<tr align=left class='success'>
                                     <td><h6>".$row['FECHA_INGRESO']."</h6></td>
                                     <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>
                                     <td align=center><h6>".$row['NO_CAJA']."</h6></td>
                                     <td align=center><h6>".$row['ANIO_CAJA']."</h6></td>                 
                                     <td><h6>".$row['PROPIETARIO']."</h6></td>
                                     <td><h6>".$row['DENOMINACION_RAZON']."</h6></td>
                                     <td><h6>".$row['GIRO']."</h6></td>
                                     <td><h6>".$row['ACTIVIDAD_COMERCIAL']."</h6></td>
                                     <td align=center><h6>".$row['ETAPA_TRAMITE']."</h6></td>";

                                     if ($row['NO_OFICIO_PREVENCION'] == "" AND $row['FECHA_PREVENCION'] == "0000-00-00") {
                                         echo "<td align=center><h6>SIN PREVENCION</h6></td>";
                                        
                                     }
                                     if($row['NO_OFICIO_PREVENCION'] != "" AND $row['FECHA_PREVENCION'] == "0000-00-00"){
                                         echo "<td align=center><h6>CON PREVENCIÓN SIN NOTIFICAR</h6></td>";
                                         
                                        }

                                     if($row['NO_OFICIO_PREVENCION'] != "" AND $row['FECHA_PREVENCION'] != "0000-00-00"){
                                               echo "<td align=center><h6>CON PREVENCIÓN NOTIFICADA</h6></td>";
                                               
                                            }

                                     if ($row['NO_OFICIO_PROCEDENCIA'] == "" AND $row['FECHA_PROCEDENCIA'] == "0000-00-00") {
                                         echo "<td align=center><h6>SIN PROCEDENCIA</h6></td>";
                                         
                                     }
                                     if($row['NO_OFICIO_PROCEDENCIA'] != "" AND $row['FECHA_PROCEDENCIA'] == "0000-00-00"){
                                         echo "<td align=center><h6>CON PROCEDENCIA SIN NOTIFICAR</h6></td>";
                                         
                                        }
                                     if($row['NO_OFICIO_PROCEDENCIA'] != "" AND $row['FECHA_PROCEDENCIA'] != "0000-00-00"){
                                               echo "<td align=center><h6>CON PROCEDENCIA NOTIFICADA</h6></td>"; 
                                              
                                            }
                                    
                                    if($row['MATERIA_MA_SLD'] == 1){
                                         echo "<td align=center><h6>A</h6></td>"; 
                                    }else{
                                         echo "<td align=center><h6>NA</h6></td>";
                                    }
                                    if($row['MATERIA_MA_DUM'] == 1){
                                         echo "<td align=center><h6>A</h6></td>"; 
                                    }else{
                                         echo "<td align=center><h6>NA</h6></td>";
                                    }
                                    if($row['MATERIA_MA_PCL'] == 1){
                                         echo "<td align=center><h6>A</h6></td>"; 
                                    }else{
                                         echo "<td align=center><h6>NA</h6></td>";
                                    }
                                    if($row['MATERIA_MA_MAM'] == 1){
                                         echo "<td align=center><h6>A</h6></td>"; 
                                    }else{
                                         echo "<td align=center><h6>NA</h6></td>";
                                    }
                                    if($row['MATERIA_MA_DEC'] == 1){
                                         echo "<td align=center><h6>A</h6></td>"; 
                                    }else{
                                         echo "<td align=center><h6>NA</h6></td>";
                                    }
                                    if($row['MATERIA_MA_COM'] == 1){
                                         echo "<td align=center><h6>A</h6></td>"; 
                                    }else{
                                         echo "<td align=center><h6>NA</h6></td>";
                                    }
                                    if($row['MATERIA_MA_MOV'] == 1){
                                         echo "<td align=center><h6>A</h6></td>"; 
                                    }else{
                                         echo "<td align=center><h6>NA</h6></td>";
                                    }
                                    if($row['MATERIA_MA_ADA'] == 1){
                                         echo "<td align=center><h6>A</h6></td>"; 
                                    }else{
                                         echo "<td align=center><h6>NA</h6></td>";
                                    }

                                    if($row['NO_EVALUACION_SLD'] == "" AND $row['FECHA_NOTIFICACION_SLD'] == "0000-00-00" and $row['RESULTADO_EVALUACION_SLD'] == ''){ echo "<td align=center><h6>SIN EVALUACION</h6></td>";}
                                    if($row['NO_EVALUACION_SLD'] != "" AND $row['FECHA_NOTIFICACION_SLD'] == "0000-00-00" and $row['RESULTADO_EVALUACION_SLD'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_SLD'] != "" AND $row['FECHA_NOTIFICACION_SLD'] == "0000-00-00" and $row['RESULTADO_EVALUACION_SLD'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_SLD'] != "" AND $row['FECHA_NOTIFICACION_SLD'] == "0000-00-00" and $row['RESULTADO_EVALUACION_SLD'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA SIN NOTIFICAR </h6></td>";}

                                     if($row['NO_EVALUACION_SLD'] != "" AND $row['FECHA_NOTIFICACION_SLD'] != "0000-00-00" and $row['RESULTADO_EVALUACION_SLD'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_SLD'] != "" AND $row['FECHA_NOTIFICACION_SLD'] != "0000-00-00" and $row['RESULTADO_EVALUACION_SLD'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_SLD'] != "" AND $row['FECHA_NOTIFICACION_SLD'] != "0000-00-00" and $row['RESULTADO_EVALUACION_SLD'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA NOTIFICADA</h6></td>";}


                                    if($row['NO_EVALUACION_DUM'] == "" AND $row['FECHA_NOTIFICACION_DUM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_DUM'] == ''){ echo "<td align=center><h6>SIN EVALUACION</h6></td>";}
                                    if($row['NO_EVALUACION_DUM'] != "" AND $row['FECHA_NOTIFICACION_DUM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_DUM'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_DUM'] != "" AND $row['FECHA_NOTIFICACION_DUM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_DUM'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_DUM'] != "" AND $row['FECHA_NOTIFICACION_DUM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_DUM'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA SIN NOTIFICAR </h6></td>";}

                                     if($row['NO_EVALUACION_DUM'] != "" AND $row['FECHA_NOTIFICACION_DUM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_DUM'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_DUM'] != "" AND $row['FECHA_NOTIFICACION_DUM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_DUM'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_DUM'] != "" AND $row['FECHA_NOTIFICACION_DUM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_DUM'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA NOTIFICADA</h6></td>";}

                                     if($row['NO_EVALUACION_PCL'] == "" AND $row['FECHA_NOTIFICACION_PCL'] == "0000-00-00" and $row['RESULTADO_EVALUACION_PCL'] == ''){ echo "<td align=center><h6>SIN EVALUACION</h6></td>";}
                                    if($row['NO_EVALUACION_PCL'] != "" AND $row['FECHA_NOTIFICACION_PCL'] == "0000-00-00" and $row['RESULTADO_EVALUACION_PCL'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_PCL'] != "" AND $row['FECHA_NOTIFICACION_PCL'] == "0000-00-00" and $row['RESULTADO_EVALUACION_PCL'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_PCL'] != "" AND $row['FECHA_NOTIFICACION_PCL'] == "0000-00-00" and $row['RESULTADO_EVALUACION_PCL'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA SIN NOTIFICAR </h6></td>";}

                                     if($row['NO_EVALUACION_PCL'] != "" AND $row['FECHA_NOTIFICACION_PCL'] != "0000-00-00" and $row['RESULTADO_EVALUACION_PCL'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_PCL'] != "" AND $row['FECHA_NOTIFICACION_PCL'] != "0000-00-00" and $row['RESULTADO_EVALUACION_PCL'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_PCL'] != "" AND $row['FECHA_NOTIFICACION_PCL'] != "0000-00-00" and $row['RESULTADO_EVALUACION_PCL'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA NOTIFICADA</h6></td>";}

                                     if($row['NO_EVALUACION_MAM'] == "" AND $row['FECHA_NOTIFICACION_MAM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_MAM'] == ''){ echo "<td align=center><h6>SIN EVALUACION</h6></td>";}
                                    if($row['NO_EVALUACION_MAM'] != "" AND $row['FECHA_NOTIFICACION_MAM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_MAM'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_MAM'] != "" AND $row['FECHA_NOTIFICACION_MAM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_MAM'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_MAM'] != "" AND $row['FECHA_NOTIFICACION_MAM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_MAM'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA SIN NOTIFICAR </h6></td>";}

                                     if($row['NO_EVALUACION_MAM'] != "" AND $row['FECHA_NOTIFICACION_MAM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_MAM'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_MAM'] != "" AND $row['FECHA_NOTIFICACION_MAM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_MAM'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_MAM'] != "" AND $row['FECHA_NOTIFICACION_MAM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_MAM'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA NOTIFICADA</h6></td>";}

                                      if($row['NO_EVALUACION_DEC'] == "" AND $row['FECHA_NOTIFICACION_DEC'] == "0000-00-00" and $row['RESULTADO_EVALUACION_DEC'] == ''){ echo "<td align=center><h6>SIN EVALUACION</h6></td>";}
                                    if($row['NO_EVALUACION_DEC'] != "" AND $row['FECHA_NOTIFICACION_DEC'] == "0000-00-00" and $row['RESULTADO_EVALUACION_DEC'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_DEC'] != "" AND $row['FECHA_NOTIFICACION_DEC'] == "0000-00-00" and $row['RESULTADO_EVALUACION_DEC'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_DEC'] != "" AND $row['FECHA_NOTIFICACION_DEC'] == "0000-00-00" and $row['RESULTADO_EVALUACION_DEC'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA SIN NOTIFICAR </h6></td>";}

                                     if($row['NO_EVALUACION_DEC'] != "" AND $row['FECHA_NOTIFICACION_DEC'] != "0000-00-00" and $row['RESULTADO_EVALUACION_DEC'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_DEC'] != "" AND $row['FECHA_NOTIFICACION_DEC'] != "0000-00-00" and $row['RESULTADO_EVALUACION_DEC'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_DEC'] != "" AND $row['FECHA_NOTIFICACION_DEC'] != "0000-00-00" and $row['RESULTADO_EVALUACION_DEC'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA NOTIFICADA</h6></td>";}


                                     if($row['NO_EVALUACION_COM'] == "" AND $row['FECHA_NOTIFICACION_COM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_COM'] == ''){ echo "<td align=center><h6>SIN EVALUACION</h6></td>";}
                                    if($row['NO_EVALUACION_COM'] != "" AND $row['FECHA_NOTIFICACION_COM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_COM'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_COM'] != "" AND $row['FECHA_NOTIFICACION_COM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_COM'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_COM'] != "" AND $row['FECHA_NOTIFICACION_COM'] == "0000-00-00" and $row['RESULTADO_EVALUACION_COM'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA SIN NOTIFICAR </h6></td>";}

                                     if($row['NO_EVALUACION_COM'] != "" AND $row['FECHA_NOTIFICACION_COM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_COM'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_COM'] != "" AND $row['FECHA_NOTIFICACION_COM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_COM'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_COM'] != "" AND $row['FECHA_NOTIFICACION_COM'] != "0000-00-00" and $row['RESULTADO_EVALUACION_COM'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA NOTIFICADA</h6></td>";}

                                     if($row['NO_EVALUACION_MOV'] == "" AND $row['FECHA_NOTIFICACION_MOV'] == "0000-00-00" and $row['RESULTADO_EVALUACION_MOV'] == ''){ echo "<td align=center><h6>SIN EVALUACION</h6></td>";}
                                    if($row['NO_EVALUACION_MOV'] != "" AND $row['FECHA_NOTIFICACION_MOV'] == "0000-00-00" and $row['RESULTADO_EVALUACION_MOV'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_MOV'] != "" AND $row['FECHA_NOTIFICACION_MOV'] == "0000-00-00" and $row['RESULTADO_EVALUACION_MOV'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_MOV'] != "" AND $row['FECHA_NOTIFICACION_MOV'] == "0000-00-00" and $row['RESULTADO_EVALUACION_MOV'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA SIN NOTIFICAR </h6></td>";}

                                     if($row['NO_EVALUACION_MOV'] != "" AND $row['FECHA_NOTIFICACION_MOV'] != "0000-00-00" and $row['RESULTADO_EVALUACION_MOV'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_MOV'] != "" AND $row['FECHA_NOTIFICACION_MOV'] != "0000-00-00" and $row['RESULTADO_EVALUACION_MOV'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_MOV'] != "" AND $row['FECHA_NOTIFICACION_MOV'] != "0000-00-00" and $row['RESULTADO_EVALUACION_MOV'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA NOTIFICADA</h6></td>";}

                                     if($row['NO_EVALUACION_ADA'] == "" AND $row['FECHA_NOTIFICACION_ADA'] == "0000-00-00" and $row['RESULTADO_EVALUACION_ADA'] == ''){ echo "<td align=center><h6>SIN EVALUACION</h6></td>";}
                                    if($row['NO_EVALUACION_ADA'] != "" AND $row['FECHA_NOTIFICACION_ADA'] == "0000-00-00" and $row['RESULTADO_EVALUACION_ADA'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_ADA'] != "" AND $row['FECHA_NOTIFICACION_ADA'] == "0000-00-00" and $row['RESULTADO_EVALUACION_ADA'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE SIN NOTIFICAR </h6></td>";}
                                     if($row['NO_EVALUACION_ADA'] != "" AND $row['FECHA_NOTIFICACION_ADA'] == "0000-00-00" and $row['RESULTADO_EVALUACION_ADA'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA SIN NOTIFICAR </h6></td>";}

                                     if($row['NO_EVALUACION_ADA'] != "" AND $row['FECHA_NOTIFICACION_ADA'] != "0000-00-00" and $row['RESULTADO_EVALUACION_ADA'] == '1'){ echo "<td align=center><h6>CON EVALUACION PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_ADA'] != "" AND $row['FECHA_NOTIFICACION_ADA'] != "0000-00-00" and $row['RESULTADO_EVALUACION_ADA'] == '2'){ echo "<td align=center><h6>CON EVALUACION NO PROCEDENTE NOTIFICADA</h6></td>";}
                                     if($row['NO_EVALUACION_ADA'] != "" AND $row['FECHA_NOTIFICACION_ADA'] != "0000-00-00" and $row['RESULTADO_EVALUACION_ADA'] == '3'){ echo "<td align=center><h6>CON EVALUACION CONDICIONADA NOTIFICADA</h6></td>";}

                                  
                                

                                    
                                    




                                    

                                     echo "</tr>";
                                }
                                echo "</table>";
                            }
                            //----------------------------------------------------
                        ?>
 
</head> 
    </body>
</html>