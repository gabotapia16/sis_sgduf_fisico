<?php
include("../segurity_session.php");
include("../conection_bd.php");
$sqlgiro= mysqli_query($conection, "SELECT * FROM giros");
$sqlmateria= mysqli_query($conection, "SELECT * FROM materias");
?>
<html>
  <head>
    <title>Dictamenes</title>
     <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
         <link rel="shortcut icon" href="imagenes/sys.png" />
         <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!--Select2-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <!--
    <script>
           $(document).ready(function () { $("#boton").click(function () {if ($("#tabla_new_user").is(":visible")) {document.getElementById("tabla_new_user").style.display = 'none';}else {document.getElementById("tabla_new_user").style.display = '';}});});
    </script>
  -->

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
          <img alt="Brand" src="../imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
          </div>
          <ul class="nav navbar-nav">
          <li class="active"><a href="../menu_emision">Menu principal</a></li>
        </ul>
        
        <ul class="nav navbar-nav">
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
        
        <div class="container">
          <div class="panel panel-default">
            <div class="panel-heading"><p align="center">Captura Dictamenes</p></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                <form method="POST" id="myForm" action="add_dictamenes" enctype="multipart/form-data">
                  <div style="display:none">
                  <input type="text">
                </div>
                    <table class="table" name="tabla_new_user" id="tabla_new_user" name="tabla_new_user" id="tabla_new_user" style="display: block;">
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
                                <select class="js-example-basic-single" name="MUNICIPIO" id="MUNICIPIO" required>
                                    <option value="" disabled selected>Seleccione el municipio</option>
                                    <?php
                                        include 'conection_bd.php';
                                        $resultado= mysqli_query($conection,"SELECT NOMENCLATURA,MUNICIPIO FROM municipios ORDER BY MUNICIPIO");
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
                            <td width="30%"><p><input type="text" class="form-control" placeholder="SUPERFICIE TOTAL" name="SUPERFICIE_TOTAL" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                            <td width="30%"><p><input type="text" class="form-control" placeholder="SUPERFICIE CONSTRUIDA" name="SUPERFICIE_CONSTRUIDA" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr>
                          <td width="30%"><p><input type="text" class="form-control" placeholder="SUPERFICIE EN USO" name="SUPERFICIE_USO" onblur="javascript:this.value=this.value.toUpperCase();" required></p>
                            </td>
                        </tr>
                        <tr>
                          <td width="50%"><p>
                              <select class="form-control" name="TIPO_DUF" id="TIPO_DUF" onclick="selectTipo()" required>
                                    <option value="" disabled selected><p>Seleccione el tipo de DUF</p></option>
                                    <option value="NORMAL"><p>NORMAL</p></option>
                                    <option value="ACUERDO"><p>ACUERDO</p></option>
                              </select>
                          </p></td>
                          <td width="50%"><p>
                              <select class="form-control" name="IMPACTO" id="IMPACTO" required>
                                    <option value="" disabled selected><p>Seleccione el impacto</p></option>
                                    <option value="BAJO IMPACTO" ><p>BAJO IMPACTO</p></option>
                                    <option value="ALTO IMPACTO" ><p>ALTO IMPACTO</p></option>
                              </select>
                          </p></td>
                        </tr>
                        <tr id="id_acuerdo3" style="display:none">
                          <td width="50%"><p>Número de Dictamen Anterior</p>
                            </td>
                            <td width="50%"><p>Fecha de resolución</p>
                            </td>
                        </tr>
                        <tr id="id_acuerdo" style="display:none">
                          <td width="50%"><p><input type="text" class="form-control" placeholder="NÚMERO DE DICTAMEN ANTERIOR" name="NO_DUF_ANTERIOR" id="no_anterior" onblur="javascript:this.value=this.value.toUpperCase();"></p>
                            </td>
                            <td width="50%"><p><input type="date" class="form-control" placeholder="FECHA DE RESOLUCIÓN" name="fecha_resolucion" id="fecha_resolucion" onblur="javascript:this.value=this.value.toUpperCase();"></p>
                            </td>
                          </tr>
                          <tr id="id_acuerdo4" style="display:none">
                            <td width="50%"><p>Número de Oficio Resolución</p>
                            </td>
                        </tr>
                          <tr id="id_acuerdo2" style="display:none">
                            <td width="50%"><p><input type="text" class="form-control" placeholder="NÚMERO DE OFICIO DE RESOLUCIÓN" name="no_oficio_resolucion" id="no_oficio_resolucion" onblur="javascript:this.value=this.value.toUpperCase();"></p>
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
                          <td>
                              <select class="form-control" name="id_selectMateria" id='id_selectMateria' required>
                                  <option value="" selected hidden>Seleccione una opción</option>
                                  <?php foreach ($sqlmateria as $fila) {?>
                                               <option value="<?php echo $fila['nombre_materia']; ?>" ><?php echo $fila['nombre_materia']; ?></option>
                                           <?php }?>
                              </select>
                            </td>
                            <td colspan="2">
                              <p> 
                              <select class="js-example-basic-single col-md-10" name="GIRO" id="GIRO" required>
                                    <option value="" selected hidden>Seleccione una opción</option>
                                  </select>
                              </p>

                            </td>
                            
                        </tr>
                        <tr>
                          <td colspan="2"><p><input type="text" class="form-control" placeholder="ACTIVIDAD" name="ACTIVIDAD" onblur="javascript:this.value=this.value.toUpperCase();"></p>
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
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="DESARROLLO ECONOMICO" >DESARROLLO ECONOMICO (COMERCIAL AUTOMOTRIZ) </p></td>
                        </tr>
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="COMUNICACIONES" >COMUNICACIONES (VIALIDAD)</p></td>
                        </tr>   
                        <tr>
                          <td align="LETF"><p><input type="checkbox" name="MATERIAS[]" value="AGUA, DRENAJE, ALCANTARILLADO Y TRATAMIENTO DE AGUAS RESIDUALES" >AGUA, DRENAJE, ALCANTARILLADO Y TRATAMIENTO DE AGUAS RESIDUALES</p></td>
                        </tr> 
                        <tr align= center><td colspan="2"><button id="enviar" name="enviar" type="submit" class="btn btn-primary btn-md"><h4><span class='glyphicon glyphicon-plus-sign'> Guardar</span></h4></button></td></tr>

                    </table>
                </form>   
            </div>
          </div>
         </div>
         </head> 
    </body>
<script>
  $("#myForm").on("submit", function(e){
    /*var valor = $("#TIPO_DUF option:selected").val();
    if (valor=='ACUERDO') {
      var miCampoTexto = document.getElementById("no_anterior").value;
      var miCampoTexto2 = document.getElementById("fecha_resolucion").value;
      var miCampoTexto3 = document.getElementById("no_oficio_resolucion").value;
      if (miCampoTexto.length == 0) {
        alert('FALTA NO. ANTERIOR');
        return false;
      }
        else if (miCampoTexto2.length == 0) {
          alert('FALTA FECHA DE RESOLUCIÓN');
          return false;
        }
          else if (miCampoTexto3.length == 0) {
            alert('FALTA NO. DE OFICIO DE RESOLUCIÓN');
            return false;
          }
          else {
            return true;
          }
    }
    else{
      return true;
    }
    */
  });
</script>

<script>
  $(document).ready(function(){
    $('.js-example-basic-single').select2();
    $('.js-modal').select2({
      dropdownParent: $('#exampleModal')
    });
    $('#id_selectMateria').change(function(){
      var seleccionado = document.getElementById("id_selectMateria").selectedIndex;
      seleccionaGiro(seleccionado);
    });
  });
</script>

<script>
  function selectTipo(){
    var valor = $("#TIPO_DUF option:selected").val();
    if (valor=="ACUERDO") {
      document.getElementById('id_acuerdo').style.display = 'block';
      document.getElementById('id_acuerdo2').style.display = 'block';
      document.getElementById('id_acuerdo3').style.display = 'block';
      document.getElementById('id_acuerdo4').style.display = 'block';
    }
    else{
      document.getElementById('id_acuerdo').style.display = 'none';
      document.getElementById('id_acuerdo2').style.display = 'none';
      document.getElementById('id_acuerdo3').style.display = 'none';
      document.getElementById('id_acuerdo4').style.display = 'none';
    }
  }

  function seleccionaGiro(seleccionado){
    $.ajax({
      url: 'busca_giro.php',
      type: 'POST',
      dataType: 'JSON',
      data: {
        id: seleccionado
      },
      success:function(datos){
        document.getElementById('GIRO').innerHTML=datos.sele;        
      }
    })
  }
</script>
</html>