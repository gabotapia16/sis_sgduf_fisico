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
      <li class="active"><a href="menu_tramitacion">Menu General</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>Cerrar sesion</a></li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4 align="center">MENU DIRECCION DE COORDINACIÓN Y SEGUIMIENTO DE EVALUACIONES TÉCNICAS</h4></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                <div class="panel panel-default">
                    <div class="table-responsive">
                                  <table class="table">
                                    <tr align="center">
                                      <td><a href="tramitacion/add_solicitudes"><img alt="Brand" src="imagenes/add.png" width="50" height="50"></td>
                                      <td><a href="tramitacion/show_solicitudes"><i class="fas fa-clipboard-check fa-4x text-warning"></i></td>
                                    </tr>
                                    <tr align="center">
                                      <td><p>Captura de expedientes</p></td>
                                      <td><p>Recibir expedientes</p></td>
                                    </tr>
                                   <!-- <tr align="center">
                                      <td><a href="tramitacion/vista_general"><i class="fas fa-clipboard-list fa-4x"></i></td>
                                    </tr>
-->
                                    <?php if ($_SESSION["perfil_user"] == "ACCESO_TOTAL" or $_SESSION["perfil_user"] == "ADMINISTRADOR") {
                                    ?>
                                    <tr align="center">
                                      <td><a href="tramitacion/turnadosetapa2"><i class="fas fa-edit fa-4x text-primary"></i></td>
                                      <td><a href="tramitacion/vista_dictamenes"><i class="fas fa-file-medical-alt fa-4x text-success"></i></td>
                                    </tr>
                                    <tr align="center">
                                      <td><p>Agregar Datos Evaluaciones Técnicas</p></td>
                                      <td><p>DUFS Emitidos</p></td>
                                    </tr>
                                    <tr align="center">
                                      <td><a href="tramitacion/concluidos"><i class="fas fa-folder fa-4x text-danger"></i></td>
                                        <td><a href="tramitacion/vista_etapa2"><img alt="Brand" src="imagenes/view.png" width="50" height="50"></td>
                                    </tr>
                                    <tr align="center">
                                      <td>Conluidos</td>
                                       <td>Seguimiento</td>
                                    </tr>
                                    <tr align="center">
                                      <td><a href="tramitacion/estadistica"><img alt="Brand" src="imagenes/estadistica.png" width="50" height="50"></td>
                                        <td><a href="tramitacion/turnados_etapa3"><i class="fas fa-angle-double-right fa-4x"></i></td>
                                    </tr>
                                    <tr align="center">
                                      <td>Estádistica</td>
                                      <td>Turnados a Etapa 3</td>
                                    </tr>
                                    <?php }?>
                                  </table>
                            </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>