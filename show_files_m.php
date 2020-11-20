<?php
include("segurity_session.php");
include("conection_bd.php");
?>
<html>
	<head>
		<title>Consulta Expedientes</title>
		 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="menu_general">Menu principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
        
       
                 <?php        
                             //---------------------------------------------------
                                $sql = mysqli_query($conection,"SELECT ID,FECHA_INGRESO,NO_EXPEDIENTE,NO_CAJA,ANIO_CAJA,PROPIETARIO,DENOMINACION_RAZON,DOMICILIO_CALLE,DOMICILIO_NO_EXT,DOMICILIO_NO_INT,DOMICILIO_COLONIA,DOMICILIO_MUNICIPIO,GIRO,ACTIVIDAD_COMERCIAL,ETAPA_TRAMITE,NO_OFICIO_PREVENCION,FECHA_PREVENCION,NO_OFICIO_PROCEDENCIA,FECHA_PROCEDENCIA, ESTADO_ETAPA1,MATERIA_MA_SLD,MATERIA_MA_DUM,MATERIA_MA_PCL,MATERIA_MA_MAM,MATERIA_MA_DEC,MATERIA_MA_DEC,MATERIA_MA_COM,MATERIA_MA_MOV,MATERIA_MA_ADA,NO_EVALUACION_SLD,FECHA_NOTIFICACION_SLD,RESULTADO_EVALUACION_SLD,NO_EVALUACION_DUM,FECHA_NOTIFICACION_DUM,RESULTADO_EVALUACION_DUM,NO_EVALUACION_PCL,FECHA_NOTIFICACION_PCL,RESULTADO_EVALUACION_PCL,NO_EVALUACION_MAM,FECHA_NOTIFICACION_MAM,RESULTADO_EVALUACION_MAM,NO_EVALUACION_DEC,FECHA_NOTIFICACION_DEC,RESULTADO_EVALUACION_DEC,NO_EVALUACION_COM,FECHA_NOTIFICACION_COM,RESULTADO_EVALUACION_COM,NO_EVALUACION_MOV,FECHA_NOTIFICACION_MOV,RESULTADO_EVALUACION_MOV,NO_EVALUACION_ADA,FECHA_NOTIFICACION_ADA,RESULTADO_EVALUACION_ADA  FROM expedientes_recepcion");

                                
                                $contar = mysqli_num_rows($sql);

                                if($contar == 0){echo "<p align=center>No hay datos</p>";}
                                else{
                                   echo " 
                                          <table class=table>
                                            <tr>
                                                 <td align=CENTER><h2> Total de expedientes en sistema: $contar </h2></td>
                                            </tr>
                                            </table>
                                            <div name=Resultado_SQL id=Resultado_SQL></div>"; 
                                    echo " 
                                          <table class=table >
                                            <tr>
                                                <th><h6 align=left>FECHA DE INGRESO</h6></th>
                                                <th><h6 align=left>NO. EXPEDIENTE</h6></th>
                                                <th><h6 align=left>NO. DE CAJA</h6></th>
                                                <th><h6 align=left>AÑO DE CAJA</h6></th>
                                                <th><h6 align=left>PROPIETARIO</h6></th>
                                                <th><h6 align=left>RAZON SOCIAL</h6></th>
                                                <th><h6 align=left>GIRO</h6></th>
                                                <th><h6 align=left>ACTIVIDAD COMERCIAL</h6></th>
                                                <th><h6 align=left>DOMICILIO</h6></th>
                                                <th><h6 align=left>MUNICIPIO</h6></th>
                                                <th><h6 align=left>ETAPA</h6></th>
                                                <th><h6 align=left>MODIFICAR</h6></th>                                               
                                            </tr>";
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
                                     <td><h6>".$row['DOMICILIO_CALLE']." ".$row['DOMICILIO_NO_EXT']." ".$row['DOMICILIO_NO_INT']." ".$row['DOMICILIO_COLONIA']."</h6></td>
                                     <td><h6>".$row['DOMICILIO_MUNICIPIO']."</h6></td>
                                     <td align=center><h6>".$row['ETAPA_TRAMITE']."</h6></td>";
                                     echo "<td><a href="."show_data_files?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
                                     echo "</tr>";
                                }
                                echo "</table>";
                            }
                            //----------------------------------------------------
                        ?>

 
</head> 
    </body>
</html>

    

