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
      <li class="active"><a href="menu_general">Menu general</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>  Cerrar sesion</a></li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h5 align="center">Menu General</h5></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                <div class="panel panel-default">
                    <div class="table-responsive">
                                  <table class="table">

                                    <tr align="center">
                                      <td>
                                        <a href="users"><img alt="Brand" src="imagenes/add_user.png" width="50" height="50">
                                      </td>
                                      <td><a href="utic/vista_etapa2"><img alt="Brand" src="imagenes/view.png" width="50" height="50"></td>
                                    </tr>
                                    <tr align="center">
                                       <td><p>Administrar usuarios</p></td>
                                       <td>Seguimiento</td>
                                    </tr>
                                    <tr align="center">
                                      <td> <a href="utic/estadisticas.php"><i class="fas fa-chart-line fa-3x"></i></a></td>
                                    </tr>
                                    <tr align="center">
                                      <td><p>Estadísticas Generales</p></td>
                                    </tr>

                                    <tr align="center">
                                      <td><a href="demision/generar_dictamenes"><img alt="Brand" src="imagenes/document.png" width="50" height="50"></td>
                                    </tr>
                                    <tr align="center">
                                      <td><p>Emision de Dictamenes</p></td>
                                    </tr>
                                  </table>
                            </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>



