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
                                $sql = mysqli_query($conection,"SELECT * FROM atencion_asesoria");

                                $contar = mysqli_num_rows($sql);

                                if($contar == 0){echo "<p align=center>No hay datos</p>";}
                                else{
                                   echo " 
                                          <table class=table>
                                            <tr>
                                                 <td align=CENTER><h3>EXPEDIENTES COFAEM</h3></td>
                                            </tr>
                                            </table>
                                            <div name=Resultado_SQL id=Resultado_SQL></div>"; 
                                    echo " 
                                          <table class=table  border=1>
                                            <tr>
                                                <td><h6 align=left>FECHA_INGRESO</h6></td>
                                                <td><h6 align=left>NOMBRE_PROPIETARIO</h6></td>
                                                <td><h6 align=left>REPRESENTANTE_LEGAL</h6></td>
                                                <td><h6 align=left>GESTOR_CARTA_PODER</h6></td>
                                                <td><h6 align=left>TELEFONO_PROPIETARIO</h6></td>
                                                <td><h6 align=left>CORREO_PROPIETARIO</h6></td>
                                                <td><h6 align=left>DENOMINACION_PROYECTO</h6></td>
                                                <td><h6 align=left>GIRO</h6></td>
                                                <td><h6 align=left>ACTIVIDAD_COMERCIAL</h6></td>
                                                <td><h6 align=left>DOMICILIO_PROYECTO</h6></td>
                                                <td><h6 align=left>MUNICIPIO_PROYECTO</h6></td>
                                                <td><h6 align=left>CP_PROYECTO</h6></td>
                                                <td><h6 align=left>MONTO_INVERSION</h6></td>
                                                <td><h6 align=left>NO_EMPLEOS_DIR</h6></td>
                                                <td><h6 align=left>NO_EMPLEOS_IND</h6></td>
                                                <td><h6 align=left>ANEXO_DIGITAL</h6></td>
                                                <td><h6 align=left>ESTADO_SOLICITUD</h6></td>
                                                <td><h6 align=left>DOC_POSESION</h6></td>
                                                <td><h6 align=left>USUARIO_CAPTURA</h6></td>  

                                            </tr>";
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                     
                                             echo "<tr align=left class='success'>
                                             <td><h6>".$row['FECHA_INGRESO']."</h6></td> 
                                             <td><h6>".$row['NOMBRE_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['REPRESENTANTE_LEGAL']."</h6></td>
                                             <td><h6>".$row['GESTOR_CARTA_PODER']."</h6></td>
                                             <td><h6>".$row['TELEFONO_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['CORREO_PROPIETARIO']."</h6></td>
                                             <td><h6>".$row['DENOMINACION_PROYECTO']."</h6></td>
                                             <td><h6>".$row['GIRO']."</h6></td>
                                             <td><h6>".$row['ACTIVIDAD_COMERCIAL']."</h6></td>
                                             <td><h6>".$row['DOMICILIO_PROYECTO']."</h6></td>
                                             <td><h6>".$row['MUNICIPIO_PROYECTO']."</h6></td>
                                             <td><h6>".$row['CP_PROYECTO']."</h6></td>
                                             <td><h6>".$row['MONTO_INVERSION']."</h6></td>
                                             <td><h6>".$row['NO_EMPLEOS_DIR']."</h6></td>
                                             <td><h6>".$row['NO_EMPLEOS_IND']."</h6></td>
                                             <td><h6>".$row['ANEXO_DIGITAL']."</h6></td>
                                             <td><h6>".$row['ESTADO_SOLICITUD']."</h6></td>
                                             <td><h6>".$row['DOC_POSESION']."</h6></td>
                                             <td><h6>".$row['USUARIO_CAPTURA']."</h6></td>";

                                     echo "</tr>";
                                }
                                echo "</table>";
                            }
                            //----------------------------------------------------
                        ?>

 
</head> 
    </body>
</html>

    

