<?php
include("../segurity_session.php");
include("../conection_bd.php");
date_default_timezone_set('America/Mexico_City'); 
$ID_ENCRIPTADO = $_REQUEST['ID'];
$ID_DESENCRIPTADO = base64_decode($ID_ENCRIPTADO);
$resultado= mysqli_query($conection,"SELECT * FROM dictamenes where ID='$ID_DESENCRIPTADO'");
$numero_filas = mysqli_num_rows($resultado);
if ($numero_filas != 0) 
    {
      $datos = mysqli_fetch_assoc($resultado);
    }
?>
<html>
	<head>
		  <title>Usuarios</title>
          <link rel="shortcut icon" href="imagenes/sys.png" />
          <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
          <link rel="shortcut icon" href="imagenes/SYSTEM.png" />
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
	</head>
<body>
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <img alt="Brand" src="../imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="../menu_emision">Menu principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><p align="center">VISTA PREVIA DE LOS DATOS DEL REGISTRO</p></div>
            <div class="panel-body">
                <table class="table">
                  <tr>
                    <td colspan="2">NOMBRE COMPLETO DEL PROPIETARIO / DENOMINACIÓN O RAZÓN SOCIAL:</td>
                  </tr>
                  <tr>
                    <?php 
                      if ($datos['RAZON_SOCIAL']=="") {
                      ?>
                        <td colspan=2><strong><?php echo $datos['NOMBRE_PROPIETARIO'] ." ". $datos['RAZON_SOCIAL'];?></strong></td>
                      <?php
                    }else{
                      ?>
                        <td colspan=2><strong><?php echo $datos['NOMBRE_PROPIETARIO'] ." / ". $datos['RAZON_SOCIAL'];?></strong></td>
                      <?php
                      }
                     ?>
                  </tr>
                  <tr>
                    <td colspan="2">DOMICILIO DE LA OBRA, UNIDAD ECONÓMICA, INVERSIÓN O PROYECTO:</td>
                  </tr>
                  <tr>
                    <?php 
                      if ($datos['CP']=="") {
                      ?>
                        <td colspan="2"><strong><?php echo $datos['DOMICILIO_CNENICOL'] .", ". $datos['MUNICIPIO'].", ESTADO DE MEXICO";?></strong></td>
                      <?php
                    }else{
                      ?>
                        <td colspan="2"><strong><?php echo $datos['DOMICILIO_CNENICOL']. ", C.P. ". $datos['CP'] . ", ". $datos['MUNICIPIO'] .", ESTADO DE MEXICO ";?></strong></td>
                      <?php
                      }
                     ?>
                  </tr>
                  <tr>
                    <td colspan="2">NÚMERO DE DICTAMEN:</td>
                  </tr>
                  <tr align="center">
                    <td colspan="2"><strong><h1><?php if ($datos['FOLIO_DUF'] != "") {
                      echo $datos['FOLIO_DUF'];
                    }else{
                      echo "SIN ASIGNAR";
                    } ?></h1></strong></td>
                  </tr>
                  <tr>
                    <td>SUPERFICIE TOTAL:</td>
                    <td>SUPERFICIE CONSTRUIDA:</td>
                  </tr>
                  <tr>
                    <td><strong><?php echo $datos['SUPERFICIE_TOTAL'];?></strong></td>
                    <td><strong><?php echo $datos['SUPERFICIE_CONS'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">GIRO O ACTIVIDAD:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['TIPO'] ." / ". $datos['GIRO'] ." ". $datos['ACTIVIDAD'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">DÍAS Y HORARIOS DE FUNCIONAMIENTO:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['DIAS_HORARIOS'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">EVALUACIONES TECNICAS DE FACTIBILIDAD:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['EVALUACIONES_TECNICAS'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">CORREO ELECTRÓNICO:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['CORREO_ELECTRONICO'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">NO TELEFONICO:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['NO_TELEFONICO'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">MONTO DE LA INVERSIÓN</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['MONTO_INVERSION'];?></strong></td>
                  </tr>
                   <tr>
                    <td colspan="2">NÚMERO DE EMPLEOS DIRECTOS</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['NO_EMPLEOS_DIRECTOS'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">NÚMERO DE EMPLEOS INDIRECTOS</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['NO_EMPLEOS_IND'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php if ($datos['NO_DUF_ANTERIOR'] != ""){
                     echo "NÚMERO DE DUF ANTERIOR:";
                    } ?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php if ($datos['NO_DUF_ANTERIOR'] != ""){
                     echo $datos['NO_DUF_ANTERIOR'];
                    } ?></strong></td>
                  </tr>
                </table>
                
            </div>
        </div>
    </div>
        
        
</body>
</html>