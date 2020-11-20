<?php
include("segurity_session.php");
include("conection_bd.php");
?>
<html>
	<head>
		<title>Alta expedientes</title>
		 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
         <link rel="shortcut icon" href="imagenes/sys.png" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script>
                function Solo_Letrasypunto(e){
                   key = e.keyCode || e.which;
                   tecla = String.fromCharCode(key).toLowerCase();
                   letras = " abcdefghijklmnñopqrstuvwxyz0123456789/-.";
                   especiales = "8-37-39-46";
                   tecla_especial = false
                   for(var i in especiales){
                        if(key == especiales[i]){
                            tecla_especial = true;
                            break;
                        }
                    }
                    if(letras.indexOf(tecla)==-1 && !tecla_especial){
                        return false;
                    }
                }
            </script>
         <script>
                function Solo_Letras(e){
                   key = e.keyCode || e.which;
                   tecla = String.fromCharCode(key).toLowerCase();
                   letras = " abcdefghijklmnñopqrstuvwxyz0123456789/-";
                   especiales = "8-37-39-46";
                   tecla_especial = false
                   for(var i in especiales){
                        if(key == especiales[i]){
                            tecla_especial = true;
                            break;
                        }
                    }
                    if(letras.indexOf(tecla)==-1 && !tecla_especial){
                        return false;
                    }
                }
            </script>
            <script>
                function Solo_numeros(e){
                   key = e.keyCode || e.which;
                   tecla = String.fromCharCode(key).toLowerCase();
                   letras = " 0123456789";
                   especiales = "8-37-39-46";
                   tecla_especial = false
                   for(var i in especiales){
                        if(key == especiales[i]){
                            tecla_especial = true;
                            break;
                        }
                    }
                    if(letras.indexOf(tecla)==-1 && !tecla_especial){
                        return false;
                    }
                }
            </script>

         <script>
           $(document).ready(function () { $("#boton").click(function () {if ($("#tabla_new_user").is(":visible")) {document.getElementById("tabla_new_user").style.display = 'none';}else {document.getElementById("tabla_new_user").style.display = '';}});});
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                    var dependencia;
                    $("#Dependencia").change(function(e){                  
                          dependencia = $("#Dependencia").val();                                                                         
                          $.ajax({
                                type: "POST",
                                url: "a_organismo_captura.php",
                                data: "dependencia="+dependencia,
                                dataType: "html",
                                beforeSend: function(){
                                $("#Organismo").html("");
                                },
                                error: function(){
                                alert("Error al consultar Dependencias");
                                },
                                success: function(data){                                                    
                                $("#Organismo").empty();
                                $("#Organismo").append(data);                                                             
                                }
                          });                                                                         
                    });                                                     
            });
      </script>

      <script type="text/javascript">
        $(document).ready(function()
            {
              $( '#CHECKBOX_MA_SLD' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_SLD' ).val("1");} else {$( '#MATERIA_MA_SLD' ).val("0");}});
              $( '#CHECKBOX_MA_DUM' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_DUM' ).val("1");} else {$( '#MATERIA_MA_DUM' ).val("0");}});
              $( '#CHECKBOX_MA_PCL' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_PCL' ).val("1");} else {$( '#MATERIA_MA_PCL' ).val("0");}});
              $( '#CHECKBOX_MA_MAM' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_MAM' ).val("1");} else {$( '#MATERIA_MA_MAM' ).val("0");}});
              $( '#CHECKBOX_MA_DEC' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_DEC' ).val("1");} else {$( '#MATERIA_MA_DEC' ).val("0");}});
              $( '#CHECKBOX_MA_COM' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_COM' ).val("1");} else {$( '#MATERIA_MA_COM' ).val("0");}});
              $( '#CHECKBOX_MA_MOV' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_MOV' ).val("1");} else {$( '#MATERIA_MA_MOV' ).val("0");}});
              $( '#CHECKBOX_MA_ADA' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_ADA' ).val("1");} else {$( '#MATERIA_MA_ADA' ).val("0");}});
        });
    </script>

    <!-- INICIO SCRIPT REPRESENTANTE LEGAL -->
<script type="text/javascript">
  $(document).ready(function(){
    //------------------------

      $("#RADIO_REP_S").attr('checked', false);
      $("#RADIO_REP_N").attr('checked', true);
      $('#REP_LEGAL').attr('readonly', true);
      $('#CORREO_REP_LEGAL').attr('readonly', true);
      $('#TELEFONO_REP_LEGAL').attr('readonly', true);


    //------------------------
    $("#RADIO_REP_S").on( "click", function() {
      $("#RADIO_REP_S").attr('checked', true);
      $("#RADIO_REP_N").attr('checked', false);
      $('#REP_LEGAL').attr('readonly', false);
      $('#CORREO_REP_LEGAL').attr('readonly', false);
      $('#TELEFONO_REP_LEGAL').attr('readonly', false);
      
     });
    $("#RADIO_REP_N").on( "click", function() {
      $("#RADIO_REP_S").attr('checked', false);
      $("#RADIO_REP_N").attr('checked', true);
      $('#REP_LEGAL').attr('readonly', true);
      $('#CORREO_REP_LEGAL').attr('readonly', true);
      $('#TELEFONO_REP_LEGAL').attr('readonly', true);

    });
  });
</script>
<!-- FIN SCRIPT REPRESENTANTE LEGAL -->

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
          <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
        
        <div class="container">
          <div class="panel panel-default">
            <div class="panel-heading"><p align="center">Captura Expedientes</p></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                <table class="table">
                    <tr align="right"><td><button type=button class='btn btn-info' id="boton"><h4><span class='glyphicon glyphicon-plus-sign'> Nuevo</span></h4></button></td></tr>
                </table>
                <form method="POST" action="add_files" enctype="multipart/form-data">

                    <table class="table table-striped table-dark" name="tabla_new_user" id="tabla_new_user" style="display: none;">
                        <tr>
                          <td colspan="6" border="1" align="center"><p><strong>Datos Generales</strong></p></td>
                        </tr>
                        <tr>
                          <td><p>Fecha de ingreso:</p></td><td colspan="5"><p><input type="DATE" class="form-control" placeholder="FECHA DE INGRESO" name="FECHA_INGRESO" id="FECHA_INGRESO" required></p></td>
                        </tr>
                        <tr>
                          <td colspan="6"><p><input type="text" class="form-control" placeholder="Numero de expediente" name="NO_EXPEDIENTE" id="NO_EXPEDIENTE" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6"><p><input type="text" class="form-control" placeholder="Numero de caja" name="NO_CAJA" id="NO_CAJA" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6">
                              <p> 
                                <select class="form-control" name="ANIO_CAJA" id="ANIO_CAJA" required>
                                    <option value="" disabled selected>Seleccione el año de la caja</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                </select>
                              </p>
                            </td>
                        </tr>
                        <tr>
                          <td colspan="6"><p><input type="text" class="form-control" placeholder="Nombre del propietario" name="PROPIETARIO" id="PROPIETARIO" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6"><h6>Se debe ingresar en el orden sigueinte: Nombre(s)  Apellido paterno  Apellido Materno</h6></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p><input type="text" placeholder="Correo electronico del propietario"name="CORREO_PROPIETARIO" id="CORREO_PROPIETARIO" class="form-control" required ></p></td>
                            <td colspan="3"><p><input type="text" placeholder="Telefono del propietario"name="TELEFONO_PROPIETARIO" id="TELEFONO_PROPIETARIO" class="form-control" required></p></td>
                        </tr>
                        <tr>
                          <td colspan="6" border="1" align="center"><p><strong>¿Tiene representante legal?</strong></p></td>
                        </tr>
                        <tr  align="center">
                          <td colspan="3"><p><input type="radio" id="RADIO_REP_S">Si</p></td>
                          <td colspan="3"><p><input type="radio" id="RADIO_REP_N" checked>No</p></td>
                        </tr>
                        <tr>
                          <td colspan="6" align="center"><p><input type="text" class="form-control" placeholder="Nombre del representante legal" name="REP_LEGAL" id="REP_LEGAL" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                        </tr>
                        <tr id="REP_LEGAL_TEXTO">
                          <td colspan="6"><h6>Se debe ingresar en el orden siguiente: Nombre(s)  Apellido paterno  Apellido Materno</h6></td>
                        </tr>
                        <tr>
                          <td colspan="3"><p><input type="text" placeholder="Correo electronico del representante legal"name="CORREO_REP_LEGAL" id="CORREO_REP_LEGAL" class="form-control"></p></td>
                          <td colspan="3"><p><input type="text" placeholder="Telefono del representante legal"name="TELEFONO_REP_LEGAL" id="TELEFONO_REP_LEGAL" class="form-control"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6"><p><input type="text" class="form-control" placeholder="Denominación o razon social" name="DENOMINACION_RAZON" id="DENOMINACION_RAZON" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6" align="center"><p><strong>Domicilio de la unidad Económica</strong></p></td>
                        </tr>
                        <tr>
                          <td colspan="4"><p><input type="text" class="form-control" placeholder="CALLE" name="DOMICILIO_CALLE" id="DOMICILIO_CALLE" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td colspan="1"><p><input type="text" class="form-control" placeholder="NO. EXT" name="DOMICILIO_NO_EXT" id="DOMICILIO_NO_EXT" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td colspan="1"><p><input type="text" class="form-control" placeholder="NO. INT" name="DOMICILIO_NO_INT" id="DOMICILIO_NO_INT" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          
                        </tr>
                        <tr>
                          <td><p><input type="text" class="form-control" placeholder="COLONIA" name="DOMICILIO_COLONIA" id="DOMICILIO_COLONIA" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td><p><input type="text" class="form-control" placeholder="C.P." name="DOMICILIO_CP" id="DOMICILIO_CP" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td colspan="4">
                              <p> 
                                <select class="form-control" name="DOMICILIO_MUNICIPIO" id="DOMICILIO_MUNICIPIO" required>
                                    <option value="" disabled selected>Seleccione el municipio</option>
                                    <?php
                                        include 'conection_bd.php';
                                        $resultado= mysqli_query($conection,"SELECT DISTINCT MUNICIPIO FROM municipios");
                                          while ($valores = mysqli_fetch_array($resultado)) {
                                            echo '<option value="'.$valores['MUNICIPIO'].'">'.$valores['MUNICIPIO'].'</option>';
                                          }
                                    ?>
                                </select>
                              </p>
                          </td>
                          

                        </tr>
                        <tr><td colspan="6" border="1" align="center"><p><strong>Giro y Actividad comercial de la unidad economica o proyecto</strong></p></td></tr>
                        <tr>
                          <td colspan="3">
                              <p> 
                                <select class="form-control" name="GIRO" id="GIRO" required>
                                    <option value="" disabled selected>Seleccione giro</option>
                                    <?php
                                        include 'conection_bd.php';
                                        $resultado= mysqli_query($conection,"SELECT DISTINCT GIRO FROM giros_actividades");
                                          while ($valores = mysqli_fetch_array($resultado)) {
                                            echo '<option value="'.$valores['GIRO'].'">'.$valores['GIRO'].'</option>';
                                          }
                                    ?>
                                </select>
                              </p>
                            </td>
                            <td colspan="3">
                              <p> 
                                <select class="form-control" name="ACTIVIDAD_COMERCIAL" id="ACTIVIDAD_COMERCIAL" required>
                                    <option value="" disabled selected>Seleccione la actividad comercial</option>
                                    <?php
                                        include 'conection_bd.php';
                                        $resultado= mysqli_query($conection,"SELECT DISTINCT ACTIVIDAD_COMERCIAL FROM giros_actividades");
                                          while ($valores = mysqli_fetch_array($resultado)) {
                                            echo '<option value="'.$valores['ACTIVIDAD_COMERCIAL'].'">'.$valores['ACTIVIDAD_COMERCIAL'].'</option>';
                                          }
                                    ?>
                                </select>
                              </p>
                            </td>
                        </tr>
                        <tr><td colspan="6" border="1" align="center"><p><strong>Etapa en la que se encuentra el trámite</strong></p></td></tr>
                        <tr>
                          <td colspan="6">
                              <p> 
                                <select class="form-control" name="ETAPA_TRAMITE" id="ETAPA_TRAMITE" required>
                                    <option value="" disabled selected>Seleccione la etapa en la que se encuentra el trámite</option>
                                    <option value="1">ETAPA 1</option>
                                    <option value="2">ETAPA 2</option>
                                    <option value="3">ETAPA 3</option>
                                </select>
                              </p>
                            </td>
                        </tr>

                        <div id="DIV_ETAPA_1">
                            <tr >
                              <td colspan="6">
                                <p> 
                                      <select class="form-control" name="ESTADO_ETAPA1" id="ESTADO_ETAPA1" required>
                                          <option value="" disabled selected>Seleccione el estado de la etapa 1</option>
                                          <option value="1">SIN ACCION</option>
                                          <option value="2">PREVENCION</option>
                                          <option value="3">PROCEDENCIA JURIDICA</option>
                                          <option value="4">CRITERIO</option>
                                      </select>
                                </p>
                              </td>
                            </tr>
                            
                        
                            <tr>
                              <td colspan="6"><p><input type="text" class="form-control" placeholder="NO. OFICIO DE PREVENCION" name="NO_OFICIO_PREVENCION" id="NO_OFICIO_PREVENCION" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            </tr>
                            <tr>
                              <td colspan="3"><p id="FECHA_PREVENCION_TEXTO">Fecha de notificación de la prevención</p></td>
                              <td colspan="3"><p><input type="DATE" class="form-control" name="FECHA_PREVENCION" id="FECHA_PREVENCION" ></p></td>
                            </tr>
                            <tr id="NO_OFICIO_PROCEDENCIA">
                              <td colspan="6"><p><input type="text" class="form-control" placeholder="NO. OFICIO DE PROCEDENCIA" name="NO_OFICIO_PROCEDENCIA" id="NO_OFICIO_PROCEDENCIA" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            </tr>
                            <tr id="FECHA_PROCEDENCIA">
                              <td colspan="3"><p  id="FECHA_PROCEDENCIA_TEXTO">Fecha de notificación de la procedencia</p></td>
                              <td colspan="3"><p><input type="DATE" class="form-control" name="FECHA_PROCEDENCIA" id="FECHA_PROCEDENCIA"></p></td>
                            </tr>
                        </div>

                        <tr><td colspan="6" border="1" align="center"><p><strong>Etapa 2</strong></p></td></tr>
                        <tr><td colspan="6" border="1" align="center"><p><strong>Marque las materias que aplican a la unidad economica o proyecto</strong></p></td></tr>
                        <tr><td>Materia aplicable</td><td colspan="2" align="center">¿Requiere visita colegiada?</td><td colspan="2" align="center">No. oficio al INVEA</td><td>Fecha de notificacion INVEA</td></tr>
                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="CHECKBOX_MA_SLD" id="CHECKBOX_MA_SLD"> SALUBRIDAD LOCAL</p></td>
                            <td align="center" style="display:none"><p><input type="text" name="MATERIA_MA_SLD" id="MATERIA_MA_SLD" value="0" class="form-control"></p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_SLD" id="RADIO_MA_SLD" value="1">SI</p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_SLD" id="RADIO_MA_SLD" value="0" checked>NO</p></td>
                            <td align="center" colspan="2"><p><input type="text" name="NO_OFICIO_MA_SLD" id="NO_OFICIO_MA_SLD" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_INVEA_MA_SLD" id="FECHA_NOTIFICACION_INVEA_MA_SLD" class="form-control"></p></td>
                        </tr>
                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="CHECKBOX_MA_DUM" id="CHECKBOX_MA_DUM"> DESARROLLO URBANO Y METROPOLITANO</p></td>
                            <td align="center" style="display:none"><p><input type="text" name="MATERIA_MA_DUM" id="MATERIA_MA_DUM" value="0" class="form-control"></p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_DUM" id="RADIO_MA_DUM" value="1">SI</p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_DUM" id="RADIO_MA_DUM" value="0" checked>NO</p></td>
                            <td align="center" colspan="2"><p><input type="text" name="NO_OFICIO_MA_DUM" id="NO_OFICIO_MA_DUM" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_INVEA_MA_DUM" id="FECHA_NOTIFICACION_INVEA_MA_DUM" class="form-control"></p></td>
                        </tr>

                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="CHECKBOX_MA_PCL" id="CHECKBOX_MA_PCL"> PROTECCION CIVIL</p></td>
                            <td align="center" style="display:none"><p><input type="text" name="MATERIA_MA_PCL" id="MATERIA_MA_PCL" value="0" class="form-control"></p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_PCL" id="RADIO_MA_PCL" value="1">SI</p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_PCL" id="RADIO_MA_PCL" value="0" checked>NO</p></td>
                            <td align="center" colspan="2"><p><input type="text" name="NO_OFICIO_MA_PCL" id="NO_OFICIO_MA_PCL" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_INVEA_MA_PCL" id="FECHA_NOTIFICACION_INVEA_MA_PCL" class="form-control"></p></td>
                        </tr>
                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="CHECKBOX_MA_MAM" id="CHECKBOX_MA_MAM"> MEDIO AMBIENTE</p></td>
                            <td align="center" style="display:none"><p><input type="text" name="MATERIA_MA_MAM" id="MATERIA_MA_MAM" value="0" class="form-control"></p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_MAM" id="RADIO_MA_MAM" value="1">SI</p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_MAM" id="RADIO_MA_MAM" value="0" checked>NO</p></td>
                            <td align="center" colspan="2"><p><input type="text" name="NO_OFICIO_MA_MAM" id="NO_OFICIO_MA_MAM" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_INVEA_MA_MAM" id="FECHA_NOTIFICACION_INVEA_MA_MAM" class="form-control"></p></td>
                        </tr>
                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="CHECKBOX_MA_DEC" id="CHECKBOX_MA_DEC">DESARROLLO ECONOMICO </p></td>
                            <td align="center" style="display:none"><p><input type="text" name="MATERIA_MA_DEC" id="MATERIA_MA_DEC" value="0" class="form-control"></p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_DEC" id="RADIO_MA_DEC" value="1">SI</p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_DEC" id="RADIO_MA_DEC" value="0" checked>NO</p></td>
                            <td align="center" colspan="2"><p><input type="text" name="NO_OFICIO_MA_DEC" id="NO_OFICIO_MA_DEC" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_INVEA_MA_DEC" id="FECHA_NOTIFICACION_INVEA_MA_DEC" class="form-control"></p></td>
                        </tr>
                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="CHECKBOX_MA_COM" id="CHECKBOX_MA_COM"> COMUNICACIONES </p></td>
                            <td align="center" style="display:none"><p><input type="text" name="MATERIA_MA_COM" id="MATERIA_MA_COM" value="0" class="form-control"></p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_COM" id="RADIO_MA_COM" value="1">SI</p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_COM" id="RADIO_MA_COM" value="0" checked>NO</p></td>
                            <td align="center" colspan="2"><p><input type="text" name="NO_OFICIO_MA_COM" id="NO_OFICIO_MA_COM" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_INVEA_MA_COM" id="FECHA_NOTIFICACION_INVEA_MA_COM" class="form-control"></p></td>
                        </tr>
                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="CHECKBOX_MA_MOV" id="CHECKBOX_MA_MOV"> MOVILIDAD</p></td>
                            <td align="center" style="display:none"><p><input type="text" name="MATERIA_MA_MOV" id="MATERIA_MA_MOV" value="0" class="form-control"></p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_MOV" id="RADIO_MA_MOV" value="1">SI</p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_MOV" id="RADIO_MA_MOV" value="0" checked>NO</p></td>
                            <td align="center" colspan="2"><p><input type="text" name="NO_OFICIO_MA_MOV" id="NO_OFICIO_MA_MOV" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_INVEA_MA_MOV" id="FECHA_NOTIFICACION_INVEA_MA_MOV" class="form-control"></p></td>
                        </tr>
                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="CHECKBOX_MA_ADA" id="CHECKBOX_MA_ADA"> AGUA, DRENAJE Y ALCANTARILLADO </p></td>
                            <td align="center" style="display:none"><p><input type="text" name="MATERIA_MA_ADA" id="MATERIA_MA_ADA" value="0" class="form-control"></p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_ADA" id="RADIO_MA_ADA" value="1">SI</p></td>
                            <td align="center"><p><input type="radio" name="RADIO_MA_ADA" id="RADIO_MA_ADA" value="0" checked>NO</p></td>
                            <td align="center" colspan="2"><p><input type="text" name="NO_OFICIO_MA_ADA" id="NO_OFICIO_MA_ADA" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                            <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_INVEA_MA_ADA" id="FECHA_NOTIFICACION_INVEA_MA_ADA" class="form-control"></p></td>
                        </tr>

                        <tr><td colspan="6" border="1" align="center"><p><strong>Etapa 3</strong></p></td></tr>
                        <tr><td colspan="6" border="1" align="center"><p><strong>Ingrese los datos de las evaluaciones tecnicas obtenidas</strong></p></td></tr>
                      <tr><td>EVALUACION TÉCNICA OBTENIDA</td><td colspan="2">NO. DE EVALUACIÓN</td><td>FECHA DE NOTIFICACIÓN</td><td colspan="2">ESTADO DE LA EVALUACIÓN</td></tr>
                      <tr>
                          <td align="LETF"><p>SALUBRIDAD LOCAL</p></td>
                          <td align="center" colspan="2"><p><input type="text" name="NO_EVALUACION_SLD" id="NO_EVALUACION_SLD" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_SLD" id="FECHA_NOTIFICACION_SLD" class="form-control"></p></td>
                          <td align="center" colspan="2"><p><select class="form-control" name="RESULTADO_EVALUACION_SLD" id="RESULTADO_EVALUACION_SLD">
                                                          <option value="" selected>Seleccione el resultado</option>
                                                          <option value="1">PROCEDENTE</option>
                                                          <option value="2">NO PROCEDENTE</option>
                                                          <option value="3">PROCENDENTE CON CONDICIONANTES</option>
                                                      </select>
                                            </p></td>
                      </tr>
                      <tr>
                          <td align="LETF"><p> DESARROLLO URBANO Y METROPOLITANO</p></td>
                          <td align="center" colspan="2"><p><input type="text" name="NO_EVALUACION_DUM" id="NO_EVALUACION_DUM" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_DUM" id="FECHA_NOTIFICACION_DUM" class="form-control"></p></td>
                          <td align="center" colspan="2"><p><select class="form-control" name="RESULTADO_EVALUACION_DUM" id="RESULTADO_EVALUACION_DUM">
                                                          <option value=""  selected>Seleccione el resultado</option>
                                                          <option value="1">PROCEDENTE</option>
                                                          <option value="2">NO PROCEDENTE</option>
                                                          <option value="3">PROCENDENTE CON CONDICIONANTES</option>
                                                      </select>
                                            </p></td>
                      </tr>

                      <tr>
                          <td align="LETF"><p> PROTECCION CIVIL</p></td>
                          <td align="center" colspan="2"><p><input type="text" name="NO_EVALUACION_PCL" id="NO_EVALUACION_PCL" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_PCL" id="FECHA_NOTIFICACION_PCL" class="form-control"></p></td>
                          <td align="center" colspan="2"><p><select class="form-control" name="RESULTADO_EVALUACION_PCL" id="RESULTADO_EVALUACION_PCL">
                                                          <option value=""  selected>Seleccione el resultado</option>
                                                          <option value="1">PROCEDENTE</option>
                                                          <option value="2">NO PROCEDENTE</option>
                                                          <option value="3">PROCENDENTE CON CONDICIONANTES</option>
                                                      </select>
                                            </p></td>
                      </tr>
                      <tr>
                          <td align="LETF"><p> MEDIO AMBIENTE</p></td>
                          <td align="center" colspan="2"><p><input type="text" name="NO_EVALUACION_MAM" id="NO_EVALUACION_MAM" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_MAM" id="FECHA_NOTIFICACION_MAM" class="form-control"></p></td>
                          <td align="center" colspan="2"><p><select class="form-control" name="RESULTADO_EVALUACION_MAM" id="RESULTADO_EVALUACION_MAM">
                                                          <option value=""  selected>Seleccione el resultado</option>
                                                          <option value="1">PROCEDENTE</option>
                                                          <option value="2">NO PROCEDENTE</option>
                                                          <option value="3">PROCENDENTE CON CONDICIONANTES</option>
                                                      </select>
                                            </p></td>
                      </tr>
                      <tr>
                          <td align="LETF"><p>DESARROLLO ECONOMICO </p></td>
                          <td align="center" colspan="2"><p><input type="text" name="NO_EVALUACION_DEC" id="NO_EVALUACION_DEC" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_DEC" id="FECHA_NOTIFICACION_DEC" class="form-control"></p></td>
                          <td align="center" colspan="2"><p><select class="form-control" name="RESULTADO_EVALUACION_DEC" id="RESULTADO_EVALUACION_DEC">
                                                          <option value=""  selected>Seleccione el resultado</option>
                                                          <option value="1">PROCEDENTE</option>
                                                          <option value="2">NO PROCEDENTE</option>
                                                          <option value="3">PROCENDENTE CON CONDICIONANTES</option>
                                                      </select>
                                            </p></td>
                      </tr>
                      <tr>
                          <td align="LETF"><p>COMUNICACIONES </p></td>
                          <td align="center" colspan="2"><p><input type="text" name="NO_EVALUACION_COM" id="NO_EVALUACION_COM" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_COM" id="FECHA_NOTIFICACION_COM" class="form-control"></p></td>
                          <td align="center" colspan="2"><p><select class="form-control" name="RESULTADO_EVALUACION_COM" id="RESULTADO_EVALUACION_COM">
                                                          <option value=""  selected>Seleccione el resultado</option>
                                                          <option value="1">PROCEDENTE</option>
                                                          <option value="2">NO PROCEDENTE</option>
                                                          <option value="3">PROCENDENTE CON CONDICIONANTES</option>
                                                      </select>
                                            </p></td>
                      </tr>
                      <tr>
                          <td align="LETF"><p>MOVILIDAD</p></td>
                          <td align="center" colspan="2"><p><input type="text" name="NO_EVALUACION_MOV" id="NO_EVALUACION_MOV" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_MOV" id="FECHA_NOTIFICACION_MOV" class="form-control"></p></td>
                          <td align="center" colspan="2"><p><select class="form-control" name="RESULTADO_EVALUACION_MOV" id="RESULTADO_EVALUACION_MOV">
                                                          <option value="" selected>Seleccione el resultado</option>
                                                          <option value="1">PROCEDENTE</option>
                                                          <option value="2">NO PROCEDENTE</option>
                                                          <option value="3">PROCENDENTE CON CONDICIONANTES</option>
                                                      </select>
                                            </p></p></td>
                      </tr>
                      <tr>
                          <td align="LETF"><p>AGUA, DRENAJE Y ALCANTARILLADO </p></td>
                          <td align="center" colspan="2"><p><input type="text" name="NO_EVALUACION_ADA" id="NO_EVALUACION_ADA" class="form-control" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td align="center"><p><input type="date" name="FECHA_NOTIFICACION_ADA" id="FECHA_NOTIFICACION_ADA" class="form-control"></p></td>
                          <td align="center" colspan="2"><p><select class="form-control" name="RESULTADO_EVALUACION_ADA" id="RESULTADO_EVALUACION_ADA">
                                                          <option value="" selected>Seleccione el resultado</option>
                                                          <option value="1">PROCEDENTE</option>
                                                          <option value="2">NO PROCEDENTE</option>
                                                          <option value="3">PROCENDENTE CON CONDICIONANTES</option>
                                                      </select>
                                            </p></td>
                      </tr>
                      <tr>
                          <td colspan="6" border="1" align="center"><p><strong>¿Cuenta con Dictamen Único de Factibilidad?</strong></p></td>
                        </tr>
                        <tr  align="center">
                          <td colspan="3"><p><input type="radio" name= "RADIO_CUENTA_DUF" id="RADIO_CUENTA_DUF" value="1">Si</p></td>
                          <td colspan="3"><p><input type="radio" name= "RADIO_CUENTA_DUF" id="RADIO_CUENTA_DUF" value="0" checked>No</p></td>
                        </tr>
                        <tr>
                         <td colspan="3" align="center"><p><input type="text" class="form-control" placeholder="Número de DUF" name="NO_DUF" id="NO_DUF" onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                         <td align="center" colspan="3"><p><select class="form-control" name="MOTIVO_FALTA_DUF" id="MOTIVO_FALTA_DUF">
                                                          <option value="" selected>Seleccione el motivo por el cual no cuenta con el DUF</option>
                                                          <option value="PENDIENTE DE ELABORACION">PENDIENTE DE ELABORACION</option>
                                                          <option value="FALTA DE INTERES">FALTA DE INTERES</option>
                                                          <option value="DESISTIMIENTO POR EL PROPIETARIO">DESISTIMIENTO POR EL PROPIETARIO</option>
                                                      </select>
                                            </p></td>
                        </tr>
                        <tr><td colspan="6" border="1" align="center"><p><strong>Observaciones</strong></p></td></tr>
                        <tr><td colspan="6"><textarea class="form-control rounded-0" name="OBSERVACIONES" id="OBSERVACIONES" rows="3" onblur="javascript:this.value=this.value.toUpperCase();"></textarea></td></tr>

                      <tr align= center><td colspan="6"><button id=Save_User type="submit" class="btn btn-primary btn-md"><h4><span class='glyphicon glyphicon-plus-sign'> Guardar</span></h4></button></td></tr>
                    </table>




                </form>   
            </div>
             
          </div>

        </div>
</head> 




    </body>
</html>

