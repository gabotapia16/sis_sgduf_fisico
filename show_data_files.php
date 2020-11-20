<?php
include("segurity_session.php");
include("conection_bd.php");
date_default_timezone_set('America/Mexico_City'); 
$ID_ENCRIPTADO = $_REQUEST['ID'];
$ID_DESENCRIPTADO = base64_decode($ID_ENCRIPTADO);
$resultado= mysqli_query($conection,"SELECT * FROM expedientes_recepcion where ID='$ID_DESENCRIPTADO'");
$numero_filas = mysqli_num_rows($resultado);
if ($numero_filas != 0) 
    {
      $datos = mysqli_fetch_assoc($resultado);
    }
?>
<html>
	<head>
		  <title>Modificar Expediente</title>
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
          <img alt="Brand" src="imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="menu_general">Sistema de Gestion del Dictamen Único de Factibilidad</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><p align="center">Modificar Usuario</p></div>
            <div class="panel-body">
                <p>Bienvenido: <?php echo $_SESSION["user_name"];?></p>
                
                                <form method="POST" action="update_data_files" enctype="multipart/form-data">

                    <table class="table table-striped table-dark" name="tabla_new_user" id="tabla_new_user"">
                      <input type="text" class="form-control" value="<?php echo $ID_DESENCRIPTADO;?>" name="Id" required style="display: none;">
                        <tr>
                          <td colspan="6" border="1" align="center"><p><strong>Datos Generales</strong></p></td>
                        </tr>
                        <tr>
                          <td><p>Fecha de ingreso:</p></td><td colspan="5"><p><input type="DATE" class="form-control" placeholder="FECHA DE INGRESO" name="FECHA_INGRESO" id="FECHA_INGRESO" required value="<?php echo $datos['FECHA_INGRESO'];?>"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6"><p><input type="text" class="form-control" placeholder="Numero de expediente" name="NO_EXPEDIENTE" id="NO_EXPEDIENTE" required onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NO_EXPEDIENTE'];?>" ></p></td>
                        </tr>
                        <tr>
                          <td colspan="6"><p><input type="text" class="form-control" placeholder="Numero de caja" name="NO_CAJA" id="NO_CAJA" value="<?php echo $datos['NO_CAJA'];?>" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6">
                              <p> 
                                <select class="form-control" name="ANIO_CAJA" id="ANIO_CAJA" required>
                                    <option value="" disabled selected>Seleccione el año de la caja</option>
                                    <option selected value="<?php echo $datos['ANIO_CAJA'];?>"><?php echo $datos['ANIO_CAJA'];?></option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                </select>
                              </p>
                            </td>
                        </tr>
                        <tr>
                          <td colspan="6"><p><input type="text" class="form-control" placeholder="Nombre del propietario" name="PROPIETARIO" id="PROPIETARIO" required onblur="javascript:this.value=this.value.toUpperCase();"value="<?php echo $datos['PROPIETARIO'];?>" ></p></td>
                        </tr>
                        <tr>
                          <td colspan="6"><h6>Se debe ingresar en el orden sigueinte: Nombre(s)  Apellido paterno  Apellido Materno</h6></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p><input type="text" placeholder="Correo electronico del propietario"name="CORREO_PROPIETARIO" id="CORREO_PROPIETARIO" class="form-control" required value="<?php echo $datos['CORREO_PROPIETARIO'];?>" ></p></td>
                            <td colspan="3"><p><input type="text" placeholder="Telefono del propietario"name="TELEFONO_PROPIETARIO" id="TELEFONO_PROPIETARIO" class="form-control" required value="<?php echo $datos['TELEFONO_PROPIETARIO'];?>"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6" border="1" align="center"><p><strong>¿Tiene representante legal?</strong></p></td>
                        </tr>
                        <tr>
                          <td colspan="6" align="center"><p><input type="text" class="form-control" placeholder="Nombre del representante legal" name="REP_LEGAL" id="REP_LEGAL" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['REP_LEGAL'];?>"></p></td>
                        </tr>
                        <tr id="REP_LEGAL_TEXTO">
                          <td colspan="6"><h6>Se debe ingresar en el orden siguiente: Nombre(s)  Apellido paterno  Apellido Materno</h6></td>
                        </tr>
                        <tr>
                          <td colspan="3"><p><input type="text" placeholder="Correo electronico del representante legal" name="CORREO_REP_LEGAL" id="CORREO_REP_LEGAL" class="form-control" value="<?php echo $datos['CORREO_REP_LEGAL'];?>"></p></td>
                          <td colspan="3"><p><input type="text" placeholder="Telefono del representante legal"name="TELEFONO_REP_LEGAL" id="TELEFONO_REP_LEGAL" class="form-control"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6"><p><input type="text" class="form-control" placeholder="Denominación o razon social" name="DENOMINACION_RAZON" id="DENOMINACION_RAZON" required onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['DENOMINACION_RAZON'];?>"></p></td>
                        </tr>
                        <tr>
                          <td colspan="6" align="center"><p><strong>Domicilio de la unidad Económica</strong></p></td>
                        </tr>
                        <tr>
                          <td colspan="4"><p><input type="text" class="form-control" placeholder="CALLE" name="DOMICILIO_CALLE" id="DOMICILIO_CALLE" required onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['DOMICILIO_CALLE'];?>"></p></td>
                          <td colspan="1"><p><input type="text" class="form-control" placeholder="NO. EXT" name="DOMICILIO_NO_EXT" id="DOMICILIO_NO_EXT" required onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['DOMICILIO_MUNICIPIO'];?>"></p></td>
                          <td colspan="1"><p><input type="text" class="form-control" placeholder="NO. INT" name="DOMICILIO_NO_INT" id="DOMICILIO_NO_INT" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['DOMICILIO_NO_INT'];?>"></p></td>
                          
                        </tr>
                        <tr>
                          <td><p><input type="text" class="form-control" placeholder="COLONIA" name="DOMICILIO_COLONIA" id="DOMICILIO_COLONIA" required onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['DOMICILIO_COLONIA'];?>"></p></td>
                          <td><p><input type="text" class="form-control" placeholder="C.P." value="<?php echo $datos['DOMICILIO_CP'];?>" name="DOMICILIO_CP" id="DOMICILIO_CP" required onblur="javascript:this.value=this.value.toUpperCase();"></p></td>
                          <td colspan="4">
                              <p> 
                                <select class="form-control" name="DOMICILIO_MUNICIPIO" id="DOMICILIO_MUNICIPIO" required>
                                    <option selected value="<?php echo $datos['DOMICILIO_MUNICIPIO'];?>"><?php echo $datos['DOMICILIO_MUNICIPIO'];?></option>
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
                                    <option selected value="<?php echo $datos['GIRO'];?>"><?php echo $datos['GIRO'];?></option>
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
                                    <option selected value="<?php echo $datos['ACTIVIDAD_COMERCIAL'];?>"><?php echo $datos['ACTIVIDAD_COMERCIAL'];?></option>
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
                                    <option selected value="<?php echo $datos['ETAPA_TRAMITE'];?>"><?php echo $datos['ETAPA_TRAMITE'];?></option>
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
                                          <option selected value="<?php echo $datos['ESTADO_ETAPA1'];?>"><?php echo $datos['ESTADO_ETAPA1'];?></option>
                                          <option value="1">SIN ANALISIS</option>
                                          <option value="2">PREVENCION</option>
                                          <option value="3">PROCEDENCIA JURIDICA</option>
                                          <option value="4">CRITERIO</option>


                                          <option value="1">SIN ANALISIS</option>
                                          <option value="2">CON PREVENCION SIN NOTIFICAR</option>
                                          <option value="3">CON PREVENCION NOTIFICADA</option>
                                          <option value="4">CON PROCEDENCIA SIN NOTIFICAR</option>
                                          <option value="5">CON PROCEDENCIA NOTIFICADA</option>
                                          <option value="6">CRITERIO</option>


                                      </select>
                                </p>
                              </td>
                            </tr>
                            
                        
                            <tr>
                              <td colspan="6"><p><input type="text" class="form-control" placeholder="NO. OFICIO DE PREVENCION" name="NO_OFICIO_PREVENCION" id="NO_OFICIO_PREVENCION" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NO_OFICIO_PREVENCION'];?>"></p></td>
                            </tr>
                            <tr>
                              <td colspan="3"><p id="FECHA_PREVENCION_TEXTO">Fecha de notificación de la prevención</p></td>
                              <td colspan="3"><p><input type="DATE" class="form-control" name="FECHA_PREVENCION" id="FECHA_PREVENCION" value="<?php echo $datos['FECHA_PREVENCION'];?>"></p></td>
                            </tr>
                            <tr id="NO_OFICIO_PROCEDENCIA">
                              <td colspan="6"><p><input type="text" class="form-control" placeholder="NO. OFICIO DE PROCEDENCIA" name="NO_OFICIO_PROCEDENCIA" id="NO_OFICIO_PROCEDENCIA" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NO_OFICIO_PROCEDENCIA'];?>"></p></td>
                            </tr>
                            <tr id="FECHA_PROCEDENCIA">
                              <td colspan="3"><p  id="FECHA_PROCEDENCIA_TEXTO">Fecha de notificación de la procedencia</p></td>
                              <td colspan="3"><p><input type="DATE" class="form-control" name="FECHA_PROCEDENCIA" id="FECHA_PROCEDENCIA" value="<?php echo $datos['FECHA_PROCEDENCIA'];?>"></p></td>
                            </tr>
                        </div>


                      <tr align= center><td colspan="6"><button id=Save_User type="submit" class="btn btn-primary btn-md"><h4><span class='glyphicon glyphicon-plus-sign'> Guardar</span></h4></button></td></tr>
                    </table>

                </form>      
        
</body>
</html>