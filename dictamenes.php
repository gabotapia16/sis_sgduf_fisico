<?php
include("segurity_session.php");
include("conection_bd.php");
?>
<html>
	<head>
		<title>Dictamenes</title>
     <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
         <link rel="shortcut icon" href="imagenes/sys.png" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
           $(document).ready(function () { $("#boton").click(function () {if ($("#tabla_new_user").is(":visible")) {document.getElementById("tabla_new_user").style.display = 'none';}else {document.getElementById("tabla_new_user").style.display = '';}});});
        </script>

    <script>
            function confirmar1(){if(confirm('¿Estas seguro de generar el dictamen?')){return true;}else{return false;}}
    </script>

    <script>
            function confirmar2(){if(confirm('¿Estas seguro de eliminar el dictamen?')){return true;}else{return false;}}
    </script>

	</head>
	<body>
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <img alt="Brand" src="imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="menu_emision">Menu general</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
        
        <div class="container">
          <div class="panel panel-default">
            <div class="panel-heading"><p align="center">Captura Dictamenes</p></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                <table class="table">
                    <tr align="right"><td><button type=button class='btn btn-info' id="boton"><h4><span class='glyphicon glyphicon-plus-sign'> Nuevo</span></h4></button></td></tr>
                </table>
                <form method="POST" action="add_dictamenes" enctype="multipart/form-data">
                    <table class="table" name="tabla_new_user" id="tabla_new_user" name="tabla_new_user" id="tabla_new_user" style="display: none;">
                        <tr align="center">
                            <td colspan="2"><h5><strong>DATOS GENERALES</strong></h5></td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><input type="text" class="form-control" placeholder="NO. EXPEDIENTE" name="NO_EXPEDIENTE" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><input type="text" class="form-control" placeholder="NOMBRE COMPLETO DEL PROPIETARIO" name="NOMBRE_PROPIETARIO" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><input type="text" class="form-control" placeholder="DENOMINACIÓN O RAZÓN SOCIAL" name="RAZON_SOCIAL" onblur="javascript:this.value=this.value.toUpperCase();"></p>
                            </td>
                        </tr>
                        <tr>
                          <td><p><input type="text" placeholder="CORREO ELECTRONICO"name="CORREO_ELECTRONICO" id="CORREO_ELECTRONICO" class="form-control" required></p></td>
                          <td><p><input type="text" placeholder="NO. DE TELEFONO "name="NO_TELEFONICO" id="NO_TELEFONICO" class="form-control"></p></td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"><h5><strong>DATOS DEL ESTABLECIMIENTO O PROYECTO</strong></h5></td>
                        </tr>
                        <tr>
                            <td colspan="2"><p><input type="text" class="form-control" placeholder="DOMICILIO (CALLE, NO. EXTERIOR, NO. INTERIOR, COLONIA)" name="DOMICILIO_CNENICOL" onblur="javascript:this.value=this.value.toUpperCase();"></p>
                            </td>
                        </tr>
                        <tr>
                          <td width="50%">
                              <p> 
                                <select class="form-control" name="MUNICIPIO" id="MUNICIPIO" required>
                                    <option value="" disabled selected>Seleccione el municipio</option>
                                    <?php
                                        include 'conection_bd.php';
                                        $resultado= mysqli_query($conection,"SELECT NOMENCLATURA,MUNICIPIO FROM municipios");
                                          while ($valores = mysqli_fetch_array($resultado)) {
                                            echo '<option value="'.$valores['MUNICIPIO'].'">'.$valores['MUNICIPIO'].'</option>';
                                          }
                                    ?>
                                </select>
                              </p>
                          </td>
                          <td width="50%"><p><input type="text" class="form-control" placeholder="CÓDIGO POSTAL" name="CP" onblur="javascript:this.value=this.value.toUpperCase();"></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><p><input type="text" class="form-control" placeholder="SUPERFICIE TOTAL" name="SUPERFICIE_TOTAL" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                            <td width="50%"><p><input type="text" class="form-control" placeholder="SUPERFICIE CONSTRUIDA" name="SUPERFICIE_CONSTRUIDA" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%"><p><input type="text" class="form-control" placeholder="MONTO DE INVERSIÓN" name="MONTO_INVERSION" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                            <td width="50%"><p><input type="text" class="form-control" placeholder="NO. DE EMPLEOS DIRECTOS" name="NO_EMPLEOS_DIRECTOS" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr>
                          <td width="50%"><p><input type="text" class="form-control" placeholder="NO. DE EMPLEOS INDIRECTOS" name="NO_EMPLEOS_IND" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <p> 
                                <select class="form-control" name="GIRO" id="GIRO" required>
                                    <option value="" disabled selected><p>Seleccione giro</p></option>
                                    <option value="RESTAURANTE" ><p>RESTAURANTE</p></option>
                                    <option value="RESTAURANTE BAR" ><p>RESTAURANTE BAR</p></option>
                                    <option value="SALON DE FIESTAS" ><p>SALON DE FIESTAS</p></option>
                                    <option value="HOTEL" ><p>HOTEL</p></option>
                                    <option value="MOTEL" ><p>MOTEL</p></option>
                                    <option value="TEATRO" ><p>TEATRO</p></option>
                                    <option value="AUDITORIO" ><p>AUDITORIO</p></option>
                                    <option value="SALA DE CINE" ><p>SALA DE CINE</p></option>
                                    <option value="CLUB PRIVADO" ><p>CLUB PRIVADO</p></option>
                                    <option value="BAR" ><p>BAR</p></option>
                                    <option value="CANTINA" ><p>CANTINA</p></option>
                                    <option value="SALON DE BAILE" ><p>SALON DE BAILE</p></option>
                                    <option value="DISCOTECA" ><p>DISCOTECA</p></option>
                                    <option value="VIDEO BAR CON PISTA DE BAILE" ><p>VIDEO BAR CON PISTA DE BAILE</p></option>
                                    <option value="PULQUERIA" ><p>PULQUERIA</p></option>
                                    <option value="CENTRO NOCTURNO" ><p>CENTRO NOCTURNO</p></option>
                                    <option value="BAILE PUBLICO" ><p>BAILE PUBLICO</p></option>
                                    <option value="BALNEARIO" ><p>BALNEARIO</p></option>
                                    <option value="CENTRO BOTANERO Y CERVECERO" ><p>CENTRO BOTANERO Y CERVECERO</p></option>
                                    <option value="ESTACION DE CARBURACION" ><p>ESTACIÓN DE CARBURACION</p></option>
                                    <option value="ESTACION DE SERVICIO" ><p>ESTACIÓN DE SERVICIO</p></option>
                                    <option value="PLAZA COMERCIAL" ><p>PLAZA COMERCIAL</p></option>
                                    <option value="CONJUNTO HABITACIONAL" ><p>CONJUNTO HABITACIONAL</p></option>
                                    <option value="TALLER MECANICO" ><p>TALLER MECANICO</p></option>
                                    <option value="AGENCIA DE AUTOS" ><p>AGENCIA DE AUTOS</p></option>
                                </select>
                              </p>

                            </td>
                        </tr>
                        <tr>
                          <td colspan="2"><p><input type="text" class="form-control" placeholder="ACTIVIDAD" name="ACTIVIDAD" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <p> 
                                <select class="form-control" name="TIPO" id="TIPO" required>
                                    <option value="" disabled selected><p>TIPO DE DICTAMEN A EMITIR</p></option>
                                    <option value="FUNCIONAMIENTO" ><p>FUNCIONAMIENTO</p></option>
                                    <option value="CONSTRUCCION" ><p>CONSTRUCCIÓN</p></option>
                                    <option value="AMPLIACION" ><p>AMPLIACIÓN</p></option>
                                </select>
                              </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <p> 
                                <select class="form-control" name="DIAS_HORARIOS" id="DIAS_HORARIOS" required>
                                    <option value="" disabled selected>DIAS Y HORARIOS DE FUNCIONAMIENTO</p></option>
                                    <option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 02:00 HORAS DEL DIA SIGUIENTE." ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 02:00 HORAS DEL DIA SIGUIENTE.</p></option>
                                    <option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 15:00 A 22:00 HORAS" ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 15:00 A 22:00 HORAS</p></option>
                                    <option value="DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 22:00 HORAS" ><p>DE DOMINGO A SABADO PARA VENTA, CONSUMO O DISTRIBUCION DE BEBIDAS ALCOHOLICAS DE 11:00 A 22:00 HORAS</p></option>
                                    <option value="DE DOMINGO A SABADO" ><p>DE DOMINGO A SABADO</p></option>
                                    <option value="DE DOMINGO A SABADO DE 08:00 A 20:00 HORAS" ><p>DE DOMINGO A SABADO DE 08:00 A 20:00 HORAS</p></option>
                                </select>
                              </p>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"><h5><strong>SELECCIONE LAS EVALUACIONES TECNICAS CON LAS QUE CUENTA</strong></h5></td>
                        </tr>
                        <tr>
                            <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="IMPACTO SANITARIO" >SALUBRIDAD LOCAL</p></td>
                        </tr>
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="DESARROLLO URBANO Y METROPOLITANO" >DESARROLLO URBANO Y METROPOLITANO</p></td>
                        </tr>
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="PROTECCION CIVIL" >PROTECCION CIVIL</p></td>
                        </tr>
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="MEDIO AMBIENTE" >MEDIO AMBIENTE</p></td>
                        </tr>
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="DESARROLLO ECONOMICO" >DESARROLLO ECONOMICO </p></td>
                        </tr>
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="COMUNICACIONES" >COMUNICACIONES </p></td>
                        </tr>   
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="MOVILIDAD" >MOVILIDAD</p></td>
                        </tr> 
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="AGUA, DRENAJE, ALCANTARILLADO Y TRATAMIENTO DE AGUAS RESIDUALES" >AGUA, DRENAJE, ALCANTARILLADO Y TRATAMIENTO DE AGUAS RESIDUALES</p></td>
                        </tr> 

                        <tr>
                          <td><p>FECHA DE EXPEDICIÓN</p>
                            </td>
                          <td><p><input type="date" class="form-control" placeholder="FECHA EXPEDICION" name="FECHA_EXPEDICION" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr align= center><td colspan="2"><button id="enviar" name="enviar" type="submit" class="btn btn-primary btn-md"><h4><span class='glyphicon glyphicon-plus-sign'> Guardar</span></h4></button></td></tr>

                    </table>
                </form>   
            </div>
          </div>
         </div>
        <?php 
        $contar_capturados = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'CAPTURADO'"));
        $contar_GENERADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'GENERADO'"));
        $contar_FIRMADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'FIRMADO'"));
        //------------------------------------------------------
        $queryid = "SELECT MAX(FECHA_MODIFICACION) AS FECHA_MODIFICACION FROM dictamenes";
        $res= mysqli_query($conection,$queryid);
        $datos = mysqli_fetch_assoc($res);
        $fecha_mayor= $datos['FECHA_MODIFICACION'];
        //------------------------------------------------------
        $contar_ENTREGADO = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'ENTREGADO'"));     
        $sql = mysqli_query($conection,"SELECT * FROM dictamenes");
        $contar = mysqli_num_rows($sql);
        if($contar == 0){echo "<p align=center>No hay datos</p>";}
        else{
              echo "
                <div class=table-responsive>
                    <table class=table>
                      <tr>
                           <td align=left><p>Fecha de ultima modificacion:$fecha_mayor</h3></td>
                           <td align=right><h3> Total de registros en sistema: $contar </h3></td>
                           <td colspan=2><div name=Resultado_SQL id=Resultado_SQL></div></td>
                      </tr>
                      </table>
                 </div>";
                 echo " 
                  <div class=table-responsive>
                        <table class='table'>
                            <tr align=center>
                              <td colspan='3' align=center><h3>Estado del DUF</h3</td>
                            </tr>
                            <tr align=center>
                              <td  width='25%'><h3>Capturados: $contar_capturados</h3></td>
                              <td width='25%'><h3>Generados: $contar_GENERADO</h3></td>
                              <td width='25%'><h3>Firmados: $contar_FIRMADO</h3></td>
                              <td width='25%'><h3>Entregados: $contar_ENTREGADO</h3></td></tr>
                            <tr align=center>
                              <td  width='25%' class='info'></td>
                              <td  width='25%' class='danger'></td>  
                              <td  width='25%' class='warning'></td>
                              <td  width='25%' class='success'></td></tr>
                         </table></div>
                    <div class=table-responsive>     
                   <table class=table>
                     <tr>
                         <th><h6 align=center>NO. CONSECUTIVO</h6></th>
                         <th><h6 align=center>NO. EXPEDIENTE</h6></th>
                         <th><h6 align=center>PROPIETARIO / RAZÓN SOCIAL</h6></th>
                         <th><h6 align=center>DOMICILIO</h6></th>
                         <th><h6 align=center>SUPERFICIE TOTAL</h6></th>
                         <th><h6 align=center>SUPERFICIE CONSTRUIDA</h6></th>
                         <th><h6 align=center>TIPO/GIRO/ACTIVIDAD</h6></th>
                         <th><h6 align=center>EVALUACIONES TECNICAS</h6></th>
                         <th><h6 align=center>DIAS Y HORARIOS DE FUNCIONAMIENTO</h6></th>
                         <th><h6 align=center>DUF</h6></th>
                         <th><h6 align=center>NÚMERO DE CAJA</h6></th>
                         <th><h6 align=center>FECHA DE EXPEDICION</h6></th>
                         <th><h6 align=center>FECHA DE ENTREGA</h6></th>
                         <th><h6 align=center>FE DE ERRATAS</h6></th>
                         <th><h6 align=center>VISTA PREVIA</h6></th>
                         <th><h6 align=center>MODIFICAR</h6></th>
                         <th><h6 align=center>ELIMINAR</h6></th>
                         <th><h6 align=center>GENERAR DUF</h6></th>
                    </tr>";

              while($row=mysqli_fetch_array($sql))
              {
                if($row['FEDEERATAS'] != ""){
                  $FEDEERATAS = "CON FE DE ERRATAS";
                }else{
                  $FEDEERATAS = "N/A";
                }
                switch ($row['ESTADO_DUF']) {
                  case 'CAPTURADO':
                  echo "<tr align=center class='info'>
                          <td><h6>".$row['CONS_DUF']."</h6></td> 
                          <td><h6>".$row['NO_EXPEDIENTE']."</h6></td> 
                          <td><h6>".$row['NOMBRE_PROPIETARIO']." / ".$row['RAZON_SOCIAL']."</h6></td>
                          <td><h6>".$row['DOMICILIO_CNENICOL']." ".$row['MUNICIPIO'].", ESTADO DE MEXICO, C.P. ".$row['CP']."</h6></td>
                          <td><h6>".$row['SUPERFICIE_TOTAL']."</h6></td>
                          <td><h6>".$row['SUPERFICIE_CONS']."</h6></td>
                          <td><h6>".$row['TIPO']." / ".$row['GIRO']." ".$row['ACTIVIDAD']."</h6></td>
                          <td><h6>".$row['EVALUACIONES_TECNICAS']."</h6></td>
                          <td><h6>".$row['DIAS_HORARIOS']."</h6></td>
                          <td><h6>".$row['FOLIO_DUF']."</h6></td>
                          <td><h6>".$row['NO_CAJA']."</h6></td>
                          <td><h6>".$row['FECHA_EXPEDICION']."</h6></td>
                          <td><h6>".$row['FECHA_ENTREGA']."</h6></td>
                          <td><h6>".$FEDEERATAS."</h6></td>
                          ";
                  echo "<td><a href="."show_data_dictamenvp?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-eye-open'></span></button></a></td>";
                  echo "<td><a href="."show_data_dictamen?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
                  echo "<td><a href="."delete_dictamenes?ID=".base64_encode($row['ID'])."><button type='button' onclick='return confirmar2()'class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a></td>";
                  if ($_SESSION["perfil_user"] == 'ADMINISTRADOR'){echo "<td><a href="."update_gduf?ID=".base64_encode($row['ID'])."><button type='button' onclick='return confirmar1()' class='btn btn-dark'><span class='glyphicon glyphicon-file'></span></button></a></td>";}
                  echo "</tr>";
                  break;
                  case 'GENERADO':
                  echo "<tr align=center class='danger'>
                          <td><h6>".$row['CONS_DUF']."</h6></td>
                          <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>  
                          <td><h6>".$row['NOMBRE_PROPIETARIO']." / ".$row['RAZON_SOCIAL']."</h6></td>
                          <td><h6>".$row['DOMICILIO_CNENICOL']." ".$row['MUNICIPIO'].", ESTADO DE MEXICO, C.P. ".$row['CP']."</h6></td>
                          <td><h6>".$row['SUPERFICIE_TOTAL']."</h6></td>
                          <td><h6>".$row['SUPERFICIE_CONS']."</h6></td>
                          <td><h6>".$row['TIPO']." / ".$row['GIRO']." ".$row['ACTIVIDAD']."</h6></td>
                          <td><h6>".$row['EVALUACIONES_TECNICAS']."</h6></td>
                          <td><h6>".$row['DIAS_HORARIOS']."</h6></td>
                          <td><h6>".$row['FOLIO_DUF']."</h6></td>
                          <td><h6>".$row['FECHA_EXPEDICION']."</h6></td>
                          <td><h6>".$row['FECHA_ENTREGA']."</h6></td>
                          <td><h6>".$FEDEERATAS."</h6></td>
                          ";
                  echo "<td><a href="."show_data_dictamenvp?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-eye-open'></span></button></a></td>";
                  echo "<td><a href="."show_data_dictamen?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
                  echo "</tr>";
                  break;
                  case 'FIRMADO':
                  echo "<tr align=center class='warning'>
                          <td><h6>".$row['CONS_DUF']."</h6></td>
                          <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>  
                          <td><h6>".$row['NOMBRE_PROPIETARIO']." / ".$row['RAZON_SOCIAL']."</h6></td>
                          <td><h6>".$row['DOMICILIO_CNENICOL']." ".$row['MUNICIPIO'].", ESTADO DE MEXICO, C.P. ".$row['CP']."</h6></td>
                          <td><h6>".$row['SUPERFICIE_TOTAL']."</h6></td>
                          <td><h6>".$row['SUPERFICIE_CONS']."</h6></td>
                          <td><h6>".$row['TIPO']." / ".$row['GIRO']." ".$row['ACTIVIDAD']."</h6></td>
                          <td><h6>".$row['EVALUACIONES_TECNICAS']."</h6></td>
                          <td><h6>".$row['DIAS_HORARIOS']."</h6></td>
                          <td><h6>".$row['FOLIO_DUF']."</h6></td>
                          <td><h6>".$row['NO_CAJA']."</h6></td>
                          <td><h6>".$row['FECHA_EXPEDICION']."</h6></td>
                          <td><h6>".$row['FECHA_ENTREGA']."</h6></td>
                          <td><h6>".$FEDEERATAS."</h6></td>
                          ";
                  echo "<td><a href="."show_data_dictamenvp?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-eye-open'></span></button></a></td>";
                  echo "<td><a href="."show_data_dictamen?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
                  echo "</tr>";
                  break;
                   case 'ENTREGADO':
                  echo "<tr align=center class='success'>
                          <td><h6>".$row['CONS_DUF']."</h6></td>
                          <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>  
                          <td><h6>".$row['NOMBRE_PROPIETARIO']." / ".$row['RAZON_SOCIAL']."</h6></td>
                          <td><h6>".$row['DOMICILIO_CNENICOL']." ".$row['MUNICIPIO'].", ESTADO DE MEXICO, C.P. ".$row['CP']."</h6></td>
                          <td><h6>".$row['SUPERFICIE_TOTAL']."</h6></td>
                          <td><h6>".$row['SUPERFICIE_CONS']."</h6></td>
                          <td><h6>".$row['TIPO']." / ".$row['GIRO']." ".$row['ACTIVIDAD']."</h6></td>
                          <td><h6>".$row['EVALUACIONES_TECNICAS']."</h6></td>
                          <td><h6>".$row['DIAS_HORARIOS']."</h6></td>
                          <td><h6>".$row['FOLIO_DUF']."</h6></td>
                          <td><h6>".$row['NO_CAJA']."</h6></td>
                          <td><h6>".$row['FECHA_EXPEDICION']."</h6></td>
                          <td><h6>".$row['FECHA_ENTREGA']."</h6></td>
                          <td><h6>".$FEDEERATAS."</h6></td>
                          ";
                  echo "<td><a href="."show_data_dictamenvp?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-eye-open'></span></button></a></td>";
                  echo "<td><a href="."show_data_dictamen?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
                  echo "</tr>";
                  break;
                }

              }
              echo "</table></div>";
            } 
            ?>   

        
</head> 
    </body>
</html>

  