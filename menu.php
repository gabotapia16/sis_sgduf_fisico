<?php
//@session_start();
include "segurity_session.php";

//include 'conection_bd.php';
//$usuario=$_SESSION["id_user"];
?>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>SGDUF</title>

    <!--Mis links-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

    <!--Select2-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <!--Fontawsemo-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--Material.io-->
    <link rel="icon" sizes="192x192" href="https://material.io/static/images/simple-lp/favicons/components-192x192.png">
  <link rel="shortcut icon" href="../images/icono_cofaem.png">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/processing().js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--termina-->


    <!--ETAPA 1-->

    <!-- TERMINA ETAPA 1-->

    <!-- Add to homescreen for Chrome on Android
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="../images/android-desktop.png">
-->
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="../images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="../images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">


    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="../styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Sistema de Gestión de Dictamen Único de Factibilidad</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
            <li class="mdl-menu__item">Legal information</li>
          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="../images/usuario.png" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span><?php echo $_SESSION['user_name'];?></span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <a href="../close_session.php"><li class="mdl-menu__item">Cerrar Sesión</li></a>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">

          <?php if ($_SESSION["adscripcion_user"] == 'UNIDAD DE TECNOLOGIAS DE LA INFORMACION Y COMUNICACION' || $_SESSION["perfil_user"]=='ADMINISTRADOR'): ?>
            <H5>UTIC</H5>
           <a class="mdl-navigation__link" href="../utic/turnados_utic"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assignment</i>Pendientes de Firma</a>
            <a class="mdl-navigation__link" href="../utic/turnados_impresion"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">print</i>Pendientes de DUF</a>
            <a class="mdl-navigation__link" href="../utic/estadisticas"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">bar_chart</i>Estadísticas</a>
            <a class="mdl-navigation__link" href="../utic/users"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">group</i>Administrar Usuarios</a>
          <?php endif ?>

          <?php if ($_SESSION["adscripcion_user"] == 'DIRECCION GENERAL' || $_SESSION["perfil_user"]=='ADMINISTRADOR'): ?>
            <H5>DIRECCIÓN GENERAL</H5>
            <!--   <a class="mdl-navigation__link" href="../direccion/turnados_dg"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assignment</i>Pendientes de Firma</a> -->
            <a class="mdl-navigation__link" href="../tramitacion/vista_etapa2"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">list</i>Seguimiento</a>
            <a class="mdl-navigation__link" href="../utic/estadisticas"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">bar_chart</i>Estadísticas</a>
            <a class="mdl-navigation__link" href="../direccion/busqueda"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">find_in_page</i>Busqueda de Expedientes</a>
          <?php endif ?>

          <?php if ($_SESSION["adscripcion_user"] == 'DIRECCION DE PROCEDENCIA JURIDICA E INTEGRACION DE EXPEDIENTES'|| $_SESSION["perfil_user"]=='ADMINISTRADOR' ): ?>
            <H5>ETAPA 1</H5>
            <a class="mdl-navigation__link" href="../dprocedencia/add_solicitudes_ver2"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">note_add</i>Capturar Expedientes</a>
            <a class="mdl-navigation__link" href="../dprocedencia/aprobar_expedientes"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assignment_turned_in</i>Confirmar Expedientes</a>
            <a class="mdl-navigation__link" href="../dprocedencia/update_solicitudes"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">edit</i>Editar Expedientes</a>
            <a class="mdl-navigation__link" href="../dprocedencia/estadistica"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">bar_chart</i>Estadísticas</a>
             <a class="mdl-navigation__link" href="../dprocedencia/turnadosetapa2"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">arrow_forward</i>Turnados a Etapa 2</a>
             <a class="mdl-navigation__link" href="../dprocedencia/concluidos"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">folder</i>Concluidos</a>
             <a class="mdl-navigation__link" href="../dprocedencia/rechazados"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">thumb_down_alt</i>Rechazados</a>
          <?php endif ?>

          <?php if ($_SESSION["adscripcion_user"] == 'DEPARTAMENTO DE TRAMITACION Y SEGUIMIENTO DE EVALUACIONES TECNICAS' || $_SESSION["perfil_user"]=='ADMINISTRADOR'): ?>
            <H5>ETAPA 2</H5>
            <a class="mdl-navigation__link" href="../tramitacion/add_solicitudes"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">note_add</i>Capturar Expedientes</a>
            <a class="mdl-navigation__link" href="../tramitacion/show_solicitudes"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assignment_turned_in</i>Confirmar Expedientes</a>
            <a class="mdl-navigation__link" href="../tramitacion/turnadosetapa2"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">library_add</i>Agregar Evaluaciones Técnicas</a>
             <a class="mdl-navigation__link" href="../tramitacion/vista_etapa2"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">find_in_page</i>Seguimiento</a>
            <a class="mdl-navigation__link" href="../tramitacion/estadistica"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">bar_chart</i>Estadísticas</a>
            <a class="mdl-navigation__link" href="../tramitacion/turnados_etapa3"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">arrow_forward</i>Turnados Etapa 3</a>
             <a class="mdl-navigation__link" href="../tramitacion/vista_dictamenes"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">description</i>DUFS Emitidos</a>
             <a class="mdl-navigation__link" href="../tramitacion/concluidos"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">folder</i>Concluidos</a>
          <?php endif ?>

          <?php if ($_SESSION["adscripcion_user"] == 'DEPARTAMENTO DE EMISION DE DUF' || $_SESSION["perfil_user"]=='ADMINISTRADOR'): ?>
            <H5>ETAPA 3</H5>
            <a class="mdl-navigation__link" href="../emision/confirmar"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assignment_turned_in</i>Recibir Expedientes</a>
            <a class="mdl-navigation__link" href="../emision/turnados_etapa3"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assignment</i>Expedientes Confirmados</a>
            
            <!--<a class="mdl-navigation__link" href="../emision/turnados_entrega"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">account_box</i>DUFs para Entrega</a>
            <a class="mdl-navigation__link" href="../emision/emitidos"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">description</i>Dictámenes Emitidos</a>
            <a class="mdl-navigation__link" href="../emision/estadistica"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">bar_chart</i>Estadísticas</a>
            <a class="mdl-navigation__link" href="../emision/dictamenes"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">reply</i>Dictamenes Pasados</a>-->

          <?php endif ?>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">