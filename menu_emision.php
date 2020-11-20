<?php
include "segurity_session.php";
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
      <li class="active"><a href="menu_emision">Menu principal</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>  Cerrar sesion</a></li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4 align="center">MENU GENERAL DE EMISIÓN DE DICTAMENES</h4></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"]; ?></p></td></tr></table>
                <div class="panel panel-default">
                    <div class="table-responsive">
                                  <table class="table">
                                    <tr align="center">
                                      <td><a href="emision/confirmar"><i class="fas fa-clipboard-check fa-4x text-primary"></i></td>
                                        <td><a href="emision/turnados_etapa3"><i class="fas fa-clipboard-list fa-4x text-danger"></i></td>
                                    </tr>
                                    <tr align="center">
                                      <td><p>Recibir Expedientes</p></td>
                                      <td><p>Expedientes Confirmados</p></td>

                                    </tr>
                                    <tr align="center">
                                      <td><a href="emision/estadisticas"><i class="fas fa-chart-area fa-4x text-warning"></i></td>
                                        <td><a href="emision/dictamenes"><i class="fas fa-file-medical-alt fa-4x text-success"></i></td>
                                    </tr>
                                    <tr align="center">
                                      <td><p>Estadísticas</p></td>
                                      <td><p>Dictámentes Emitidos</p></td>
                                    </tr>

                                    <!--<tr align="center">
                                      <td><a href="emision/estadisticas"><i class="fas fa-chart-area fa-4x text-warning"></i></td>
                                        <td><a href="emision/dictamenes"><i class="fas fa-file-medical-alt fa-4x text-success"></i></td>
                                    </tr>
                                    <tr align="center">
                                      <td><p>Turnados a Impresión</p></td>
                                      <td><p>Dictámentes Emitidos</p></td>
                                    </tr>-->
                                  </table>
                            </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>