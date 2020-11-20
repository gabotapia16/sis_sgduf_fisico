<?php
include("segurity_session.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="imagenes/sys.png"/>
    <!--Fontawsemo-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
      <li class="active"><a href="menu_demisiover2">Menu General</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>Cerrar sesion</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4 align="center">MENU GENERAL DEPARTAMENTO DE ATENCION Y ASESORIA AL SOLICITANTE</h4></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                <div class="panel panel-default">
                    <div class="table-responsive">
                                  <table class="table">
                                    <tr align="center">
                                      <td><a href="demisionver2/add_solicitudes"><img alt="Brand" src="imagenes/add.png" width="50" height="50"></td>
                                      <td><a href="demisionver2/show_solicitudes"><img alt="Brand" src="imagenes/view.png" width="50" height="50"></td>
                                    </tr> 
                                    <tr align="center">
                                      <!--<td><p>Captura de expedientes</p></td>-->
                                      <td><p>Capturar Solicitud</p></td>
                                      <td><p>Ver Solicitudes Acuerdo</p></td>
                                    </tr> 
                                    <tr align="center">
                                      <td><a href="demisionver2/show_solicitudes_normal"><img alt="Brand" src="imagenes/view.png" width="50" height="50"></a></td>
                                    </tr>
                                    <tr align="center">
                                      <td><a href="demisionver2/show_solicitudes_normal">Ver Solicitudes Normal</a></td>
                                    </tr>
                                    <?php if ($_SESSION["perfil_user"] == "ACCESO_TOTAL" or $_SESSION["perfil_user"] == "ADMINISTRADOR") {
                                    ?> 
                                    <tr align="center">
                                      <td><a href="demisionver2/update_solicitudes"><img alt="Brand" src="imagenes/modify.png" width="50" height="50"></td>
                                      <!--<td><a href="demisionver2/estadistica"><img alt="Brand" src="imagenes/estadistica.png" width="50" height="50"></td>-->
                                    </tr>

                                    
                                    <tr align="center">
                                      <td><p>Editar Solicitudes</p></td>
                                      <!--<td><p>Estadistica de expedientes</p></td>-->
                                    </tr> 
<!--
                                    <tr align="center">
                                      <td><a href="demisionver2/turnadosetapa2"><i class="fas fa-angle-double-right fa-4x"></i></td>
                                    </tr>
                                    <tr align="center">
                                      <td>Turnados a Etapa 2</td>
                                    </tr>
                                  -->
                                    <?php }?>                                 
                                  </table>
                            </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>



