<?php
include("../segurity_session.php");
include("../conection_bd.php");
date_default_timezone_set('America/Mexico_City'); 
$ID_ENCRIPTADO = $_REQUEST['ID'];
$ID_DESENCRIPTADO = base64_decode($ID_ENCRIPTADO);
$resultado= mysqli_query($conection,"SELECT * FROM dictamenes where ID='$ID_DESENCRIPTADO'");
$numero_filas = mysqli_num_rows($resultado);
$sqlgiro        = mysqli_query($conection, "SELECT * FROM giros");
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
    <!--Select2-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
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
          <li class="active"><a href="../menu_emision">Menu Princial</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
    
        <div class="container">
          <div class="panel panel-default">
            <div class="panel-heading"><p align="center">MODIFICACIÓN DICTAMENES</p></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                <table class="table">
                    <tr align="right"><td><button type=button class='btn btn-info' id="boton"><h4><span class='glyphicon glyphicon-plus-sign'> Nuevo</span></h4></button></td></tr>
                </table>
                <form method="POST" action="update_dictamenes_dictamenes" enctype="multipart/form-data">
                    <table class="table">
                        <tr align="center">
                            <td colspan="2"><h5><strong>DATOS GENERALES</strong></h5></td>
                        </tr>
                        <tr>
                            <input type="text" class="form-control" value="<?php echo $ID_DESENCRIPTADO;?>" name="Id" required style="display: none;">
                            <td colspan="2"><p><input type="text" class="form-control" placeholder="NO. EXPEDIENTE" name="NO_EXPEDIENTE" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NO_EXPEDIENTE'];?>" readonly></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><input type="text" class="form-control" placeholder="NOMBRE COMPLETO DEL PROPIETARIO" name="NOMBRE_PROPIETARIO" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NOMBRE_PROPIETARIO'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><input type="text" class="form-control" placeholder="DENOMINACIÓN O RAZÓN SOCIAL" name="RAZON_SOCIAL" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['RAZON_SOCIAL'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                          <td><p><input type="text" placeholder="CORREO ELECTRONICO" name="CORREO_ELECTRONICO" id="CORREO_ELECTRONICO" class="form-control" value="<?php echo $datos['CORREO_ELECTRONICO'];?>" ></p></td>
                          <td><p><input type="text" placeholder="NO. DE TELEFONO "name="NO_TELEFONICO" id="NO_TELEFONICO" class="form-control" value="<?php echo $datos['NO_TELEFONICO'];?>"></p></td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"><h5><strong>DATOS DEL ESTABLECIMIENTO O PROYECTO</strong></h5></td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><input type="text" class="form-control" placeholder="DOMICILIO (CALLE, NO. EXTERIOR, NO. INTERIOR, COLONIA)" name="DOMICILIO_CNENICOL" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['DOMICILIO_CNENICOL'];?>" ></p>
                            </td>
                        </tr>
                        <tr>
                          <td width="50%">
                              <p> 
                                <select class="form-control" name="MUNICIPIO" id="MUNICIPIO" readonly>
                                    <option selected value="<?php echo $datos['MUNICIPIO'];?>"><?php echo $datos['MUNICIPIO'];?></option>
                                    
                                </select>
                              </p>
                          </td>
                          <td width="50%"><p><input type="text" class="form-control" placeholder="CÓDIGO POSTAL" name="CP" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['CP'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><p><input type="text" class="form-control" placeholder="SUPERFICIE TOTAL" name="SUPERFICIE_TOTAL" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['SUPERFICIE_TOTAL'];?>"></p>
                            </td>
                            <td width="50%"><p><input type="text" class="form-control" placeholder="SUPERFICIE CONSTRUIDA" name="SUPERFICIE_CONSTRUIDA" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['SUPERFICIE_CONS'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                          <td width="50%"><p><input type="text" class="form-control" placeholder="SUPERFICIE EN USO" name="SUPERFICIE_USO" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['SUPERFICIE_USO'];?>"></p>
                            </td>
                        </tr>

                        <tr>
                          <td width="50%"><p>
                              <select class="form-control" name="TIPO_DUF" id="TIPO_DUF" readonly required>
                                    <option selected value="<?php echo $datos['TIPO_DUF'];?>"><?php echo $datos['TIPO_DUF'];?></option>
                              </select>
                          </p></td>
                          <td width="50%"><p>
                              <select class="form-control" name="IMPACTO" id="IMPACTO" required readonly>
                                    <option selected value="<?php echo $datos['IMPACTO'];?>"><?php echo $datos['IMPACTO'];?></option>
                              </select>
                          </p></td>
                        </tr>
                          <?php if ($datos['TIPO_DUF']=='ACUERDO'): ?>
                           <tr id="id_acuerdo3" >
                          <td width="50%"><p>Número de Dictamen Anterior</p>
                            </td>
                            <td width="50%"><p>Fecha de resolución</p>
                            </td>
                        </tr>
                        <tr id="id_acuerdo" >
                          <td width="50%"><p><input type="text" class="form-control" placeholder="NÚMERO DE DICTAMEN ANTERIOR" name="NO_DUF_ANTERIOR" id="no_anterior" value="<?php echo $datos['NO_DUF_ANTERIOR'] ?>" onblur="javascript:this.value=this.value.toUpperCase();"></p>
                            </td>
                            <td width="50%"><p><input type="date" class="form-control" placeholder="FECHA DE RESOLUCIÓN" name="fecha_resolucion" id="fecha_resolucion" value="<?php echo $datos['FECHA_RESOLUCION'] ?>" onblur="javascript:this.value=this.value.toUpperCase();"></p>
                            </td>
                          </tr>
                          <tr id="id_acuerdo4">
                            <td width="50%"><p>Número de Oficio Resolución</p>
                            </td>
                        </tr>
                          <tr id="id_acuerdo2">
                            <td width="50%"><p><input type="text" class="form-control" placeholder="NÚMERO DE OFICIO DE RESOLUCIÓN" name="no_oficio_resolucion" id="no_oficio_resolucion" value="<?php echo $datos['NO_OFICIO_RESOLUCION'] ?>" onblur="javascript:this.value=this.value.toUpperCase();"></p>
                            </td>
                        </tr>
                        <?php endif ?>
                        <tr>
                            <td width="50%"><p><input type="text" class="form-control" placeholder="MONTO DE INVERSIÓN" name="MONTO_INVERSION" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['MONTO_INVERSION'];?>"></p>
                            </td>
                            <td width="50%"><p><input type="text" class="form-control" placeholder="NO. DE EMPLEOS DIRECTOS" name="NO_EMPLEOS_DIRECTOS" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NO_EMPLEOS_DIRECTOS'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                          <td width="50%"><p><input type="text" class="form-control" placeholder="NO. DE EMPLEOS INDIRECTOS" name="NO_EMPLEOS_IND" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NO_EMPLEOS_IND'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <p> 

                                    <select class="js-example-basic-single" name="GIRO" id="GIRO" required>
                                    <option selected value="<?php echo $datos['GIRO'];?>"><?php echo $datos['GIRO'];?></option>
                                    <?php foreach ($sqlgiro as $fila) {?>
                                                 <option value="<?php echo $fila['nombre_giros']; ?>"><?php echo $fila['nombre_giros']; ?></option>
                                             <?php }?>
                                  </select>
                                    
                              </p>

                            </td>
                        </tr>
                        <tr>
                          <td colspan="2"><p><input type="text" class="form-control" placeholder="ACTIVIDAD" name="ACTIVIDAD" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['ACTIVIDAD'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <p> 
                                <select class="form-control" name="TIPO" id="TIPO" readonly required>
                                    <option selected value="<?php echo $datos['TIPO'];?>"><?php echo $datos['TIPO'];?></option>
                                </select>
                              </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <p> 
                                <select class="form-control" name="DIAS_HORARIOS" id="DIAS_HORARIOS" required>
                                    <option selected value="<?php echo $datos['DIAS_HORARIOS'];?>"><?php echo $datos['DIAS_HORARIOS'];?></option>
                                    <option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 02:00 HORAS DEL DIA SIGUIENTE." ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 02:00 HORAS DEL DIA SIGUIENTE.</p></option>
                                    <option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 15:00 A 22:00 HORAS" ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 15:00 A 22:00 HORAS</p></option>
                                    <option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 22:00 HORAS" ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 22:00 HORAS</p></option>
                                    <option value="DE DOMINGO A SABADO" ><p>DE DOMINGO A SABADO</p></option>
                                    <option value="DE DOMINGO A SABADO DE 08:00 A 20:00 HORAS" ><p>DE DOMINGO A SABADO DE 08:00 A 20:00 HORAS</p></option>
                                    <option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 20:00 HORAS." ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 20:00 HORAS.</p></option>
                                    <option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 17:00 A 02:00 HORAS DEL DIA SIGUIENTE." ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 17:00 A 02:00 HORAS DEL DIA SIGUIENTE.</p></option>
                                </select>
                              </p>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"><h5><strong>SELECCIONE LAS EVALUACIONES TECNICAS CON LAS QUE CUENTA</strong></h5></td>
                        </tr>
                        <tr>
                          <td colspan="2"><p><input type="text" class="form-control" placeholder="EVALUACIONES_TECNICAS" name="EVALUACIONES_TECNICAS" onblur="javascript:this.value=this.value.toUpperCase();" readonly value="<?php echo $datos['EVALUACIONES_TECNICAS'];?>"></p>
                            </td>
                        </tr>
                         <tr> 
                          <td><p>FOLIO DUF:</p></td>
                          <td><p><input type="text" class="form-control" placeholder="FOLIO_DUF" name="FOLIO_DUF" onblur="javascript:this.value=this.value.toUpperCase();" readonly value="<?php echo $datos['FOLIO_DUF'];?>"></p>
                            </td>
                        </tr> 
                        <tr> 
                          <td><p>FOLIO DUF ENCRYPTED:</p></td>
                          <td><p><input type="text" class="form-control" placeholder="FOLIO_DUF_ENCRYPTED" name="FOLIO_DUF_ENCRYPTED" onblur="javascript:this.value=this.value.toUpperCase();" readonly value="<?php echo $datos['FOLIO_DUF_ENCRYPTED'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                          <td><p>FECHA DE EXPEDICIÓN</p>
                            </td>
                          <td><p><input type="date" class="form-control" placeholder="FECHA EXPEDICION" name="FECHA_EXPEDICION" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['FECHA_EXPEDICION'];?>" readonly ></p>
                            </td>
                        </tr>
                        <tr> 
                          <td><p>NO. HOJA SEGURIDAD:</p></td>
                          <td><p><input type="text" class="form-control" placeholder="NO_HOJA_SEGURIDAD" name="NO_HOJA_SEGURIDAD" readonly onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NO_HOJA_SEGURIDAD'];?>"></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <p> 
                                <select class="form-control" name="ESTADO_DUF" id="ESTADO_DUF" required>
                                    <option selected value="<?php echo $datos['ESTADO_DUF'];?>"><?php echo $datos['ESTADO_DUF'];?></option>
                                    <option value="ENTREGADO" ><p>ENTREGADO</p></option>
                                     <option value="CANCELADO" ><p>CANCELADO</p></option>
                                </select>
                              </p>
                            </td>
                        </tr>
                        <tr> 
                          <td><p>FECHA DE ENTREGA:</p></td>
                          <td><p><input type="date" class="form-control" placeholder="FECHA_ENTREGA" name="FECHA_ENTREGA" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['FECHA_ENTREGA'];?>"></p>
                            </td>
                        </tr>
                        <tr> 
                          <td><p>FE DE ERRATAS:</p></td>
                          <td><p><input type="text" class="form-control" placeholder="FEDEERATAS" name="FEDEERATAS" readonly onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['FEDEERATAS'];?>"></p>
                            </td>
                        </tr>
                        <tr> 
                          <td><p>NÚMERO DE CAJA</p></td>
                          <td><p><input type="text" class="form-control" placeholder="NO_CAJA" name="NO_CAJA" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['NO_CAJA'];?>"></p>
                            </td>
                        </tr>
                        <tr> 
                          <td><p>CÓDIGO DE BARRAS</p></td>
                          <td><p><input type="number" class="form-control" placeholder="CODIGO DE BARRAS" name="CODIGO_BARRAS" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos['CODIGO_BARRAS'];?>"></p>
                            </td>
                        </tr>
                        <tr align= center><td colspan="2"><button id="enviar" name="enviar" type="submit" class="btn btn-primary btn-md"><h4><span class='glyphicon glyphicon-plus-sign'> Guardar</span></h4></button></td></tr>

                    </table>
                </form>   
            </div>
          </div>
         </div>
</body>
<script>
 $(document).ready(function(){
        $('.js-example-basic-single').select2();
          $('.js-modal').select2({
            dropdownParent: $('#exampleModal')
        });
    });
</script>
</html>



    
