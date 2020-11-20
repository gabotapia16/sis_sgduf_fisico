<?php
include("segurity_session.php");
$direccion="localhost";
$usuario="usuroot";
$contrasenia="Infbea57$";
$base_datos = "bd_archivo";
$conection = mysqli_connect($direccion, $usuario, $contrasenia,$base_datos);
//header("Content-Type: text/html;charset=uft-8");
//$acentos = $conection->query("SET NAMES 'utf8'");
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
                                $sql = mysqli_query($conection,"SELECT * FROM expedientes_recepcion");

                                $contar = mysqli_num_rows($sql);

                                if($contar == 0){echo "<p align=center>No hay datos</p>";}
                                else{
                                   echo " 
                                          <table class=table>
                                            <tr>
                                                 <td align=CENTER><h3>EXPEDIENTES DOU</h3></td>
                                            </tr>
                                            </table>
                                            <div name=Resultado_SQL id=Resultado_SQL></div>"; 
                                    echo " 
                                          <table class=table  border=1>
                                            <tr>
                                                <td><h6 align=left>FECHA INGRESO</h6></td>
                                                <td><h6 align=left>NO EXPEDIENNTE</h6></td>
                                                <td><h6 align=left>CAJA / AÑO</h6></td>
                                                <td><h6 align=left>PROPIETARIO</h6></td>
                                                <td><h6 align=left>TELEFONO PROPIETARIO</h6></td>
                                                <td><h6 align=left>EMAIL PROPIETARIO</h6></td>
                                                <td><h6 align=left>REPRESENTANTE LEGAL</h6></td>
                                                <td><h6 align=left>TELEFONO REPRESENTANTE LEGAL </h6></td>
                                                <td><h6 align=left>EMAIL REPRESENTANTE LEGAL </h6></td>
                                                <td><h6 align=left>DENOMINACION</h6></td>
                                                <td><h6 align=left>DOMICILIO</h6></td>
                                                <td><h6 align=left>GIRO / ACTIVIDAD</h6></td>
                                                <td><h6 align=left>ETAPA</h6></td>                       
                                            </tr>";
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                     $ETAPA_TRAMITE=$row['ETAPA_TRAMITE'];
                                     switch ($ETAPA_TRAMITE) {
                                         case 1:
                                             echo "<tr align=left class='success'>
                                             <td><h6>".$row['FECHA_INGRESO']."</h6></td> 
                                             <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>
                                             <td><h6>".$row['NO_CAJA']." / ".$row['ANIO_CAJA']."</h6></td>
                                             <td><h6>".$row['PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['TELEFONO_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['CORREO_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['TELEFONO_REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['CORREO_REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['DENOMINACION_RAZON']."</h6></td>
                                             <td><h6>".$row['DOMICILIO_CALLE']." ".$row['DOMICILIO_NO_EXT']." ".$row['DOMICILIO_NO_INT']." ".$row['DOMICILIO_COLONIA']." ".$row['DOMICILIO_MUNICIPIO']."</h6></td>
                                             <td><h6>".$row['GIRO']." / ".$row['ACTIVIDAD_COMERCIAL']."</h6></td>
                                             <td align=center><h3>".$row['ETAPA_TRAMITE']."</h3></td>";
                                             break;
                                             case 2:
                                             echo "<tr align=left class='warning'>
                                             <td><h6>".$row['FECHA_INGRESO']."</h6></td> 
                                             <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>
                                             <td><h6>".$row['NO_CAJA']." / ".$row['ANIO_CAJA']."</h6></td>
                                             <td><h6>".$row['PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['TELEFONO_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['CORREO_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['TELEFONO_REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['CORREO_REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['DENOMINACION_RAZON']."</h6></td>
                                             <td><h6>".$row['DOMICILIO_CALLE']." ".$row['DOMICILIO_NO_EXT']." ".$row['DOMICILIO_NO_INT']." ".$row['DOMICILIO_COLONIA']." ".$row['DOMICILIO_MUNICIPIO']."</h6></td>
                                             <td><h6>".$row['GIRO']." / ".$row['ACTIVIDAD_COMERCIAL']."</h6></td>
                                             <td align=center><h3>".$row['ETAPA_TRAMITE']."</h3></td>";
                                             
                                             break;

                                             case 3:
                                             echo "<tr align=left class='info'>
                                             <td><h6>".$row['FECHA_INGRESO']."</h6></td> 
                                             <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>
                                             <td><h6>".$row['NO_CAJA']." / ".$row['ANIO_CAJA']."</h6></td>
                                             <td><h6>".$row['PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['TELEFONO_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['CORREO_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['TELEFONO_REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['CORREO_REP_LEGAL']."</h6></td>
                                             <td><h6>".$row['DENOMINACION_RAZON']."</h6></td>
                                             <td><h6>".$row['DOMICILIO_CALLE']." ".$row['DOMICILIO_NO_EXT']." ".$row['DOMICILIO_NO_INT']." ".$row['DOMICILIO_COLONIA']." ".$row['DOMICILIO_MUNICIPIO']."</h6></td>
                                             <td><h6>".$row['GIRO']." / ".$row['ACTIVIDAD_COMERCIAL']."</h6></td>
                                             <td align=center><h3>".$row['ETAPA_TRAMITE']."</h3></td>";

                                             break;
                                         
                                         default:
                                             # code...
                                             break;
                                     }

                                     

                                     echo "</tr>";
                                }
                                echo "</table>";
                            }
                            //----------------------------------------------------
                        ?>

 
</head> 
    </body>
</html>

    

