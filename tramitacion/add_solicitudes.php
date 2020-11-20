<?php
include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';
//$sql=SELECT GIRO FROM `giros_actividades` GROUP by GIRO
$sqlgiro        = mysqli_query($conection, "SELECT * FROM giros");
//$sqlgiro        = mysqli_query($conection, "SELECT * FROM giros GROUP BY nombre_giros ORDER BY nombre_giros");
$sqlmateria        = mysqli_query($conection, "SELECT * FROM materias");
$sqldependencia = mysqli_query($conection, "SELECT * FROM dependencia");
$sqlmunicipios  = mysqli_query($conection, "SELECT * FROM municipios");
$sqlcajas  = mysqli_query($conection, "SELECT * FROM cajas");
$usuario=$_SESSION["id_user"];
include '../menu.php';
?>
    <form class="was-validated" id="myForm">
      <div class="container p-3 mb-2 bg-light text-dark">
        <div class="p-3 mb-2 mdl-color--blue-grey-400 text-white">
          <center><h3>DATOS GENERALES DEL PROPIETARIO</h3></center>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group col">
              <label class="">SELECCIONE LA DEPENDENCIA O ORGANISMO POR LA QUE INGRESO LA SOLICITUD:</label>
              <br>
              <select class="custom-select" name="id_dependencia"id='id_dependencia' onclick="selectTipo()" required>
                <option value="" selected hidden>Seleccione una opción</option>
                <option value="DGOU">DIRECCIÓN GENERAL DE OPERACIÓN URBANA</option>
                <option value="COFAEM">COMISIÓN DE FACTIBILIDAD DEL ESTADO DE MEXICO</option>
                      </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row" id="id_divFolio" style="display:none">
              <label class="col-form-label">FOLIO DE LA SOLICITUD DE COFAEM:</label>
                <input type="text" class="form-control" id="id_folio" pattern="[A-Za-z0-9/ñÑáéíóúÁÉÍÓÚ-]+">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row" id="id_divNoExp" style="display:none">
              <label class="col-form-label">NUMERO DE EXPEDIENTE QUE SE LE ASIGNO A LA SOLICITUD:</label>
                <input type="text" class="form-control" id="id_numeroExpedinte" pattern="[A-Za-z0-9/ñÑáéíóúÁÉÍÓÚ-]+">
                <div id="result-numeroExpediente"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group col">
              <label>NÚMERO DE CAJA:</label>
              <br>
              <select class="js-example-basic-single" name="id_selectCaja" id='id_selectCaja' >
                <option value="" selected hidden>Seleccione una opción</option>
                <?php foreach ($sqlcajas as $fila) {?>
                             <option value="<?php echo $fila['no_caja']; ?>"><?php echo $fila['no_caja']; ?></option>
                         <?php }?>
              </select>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group col">
                <label for="">Código de Barras para Expediente Digitalizado:</label>
                <input type="number" class="form-control" id="id_codigoBarras" required>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label class="col-form-label">NOMBRE COMPLETO DEL PROPIETARIO (SE DEBERA INGRESAR EN EL SIGUIENTE ORDEN NOMBRES APELLIDO PATERNO APELLIDO MATERNO)</label>
                <input type="text" class="form-control" id="id_nombreCompleto" pattern="[A-Za-z0-9 ñÑáéíóúÁÉÍÓÚ,.´Ü#ü]+" required>
                <div id="result-nombreCompleto"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group row">
              <label class="col-form-label">FECHA DE INGRESO DE LA SOLICITUD:</label>
                <input id="id_fechaIngreso" class="form-control" type="date" required>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-form-label">TELEFONO DEL PROPIETARIO</label>
                <input type="number" class="form-control" id="id_telPropietario" required>
            </div>
          </div>
          <div class="col-1"></div>
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-form-label">CORREO ELECTRONICO DEL PROPIETARIO</label>
                <input type="email" class="form-control" id="id_correoPropietario" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group row">
              <br>
              <label>¿EL PROPIETARIO CUENTA CON REPRESENTANTE LEGAL?</label>
              <div class="col-md-1">
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="id_checkboxRepresentante" onclick="checkRepresentante()" >
                <label class="custom-control-label" for="id_checkboxRepresentante">SÍ</label>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container p-3 mb-2 bg-light text-dark" id="id_div_Representante" style="display:none">
        <div class="p-3 mb-2 bg-info text-white">
          <center><h3>DATOS GENERALES DEL REPRESENTANTE LEGAL</h3></center>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-form-label"> DOCUMENTO CON EL QUE SE ACREDITÓ EL REPRESENTANTE LEGAL</label>
                <select class="col-md-6 form-control" name="id_documentoAcreditorio" id='id_documentoAcreditorio' onclick="selectTipo2()">
                <option selected hidden>Seleccione una opción</option>
                <option value="CARTA PODER SIMPLE">CARTA PODER SIMPLE</option>
                <option value="PODER NOTARIAL">PODER NOTARIAL</option>
                <option value="ACTA CONSTITUTIVA">ACTA CONSTITUTIVA</option>
                <option value="PROTOCOLIZACION NOTARIAL">PROTOCOLIZACION NOTARIAL</option>
                      </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row" id="id_divJuridicoColec" style="display:none">
              <label class="col-form-label">NOMBRE DE LA PERSONA JURIDICO COLECTIVA</label>
                <input type="text" class="form-control" id="id_nombrejuridicoCol" pattern="[A-Za-z0-9 ñÑáéíóúÁÉÍÓÚ,.´Ü#ü]+">
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label class="col-form-label">NOMBRE COMPLETO DEL REPRESENTANTE LEGAL (SE DEBERÁ INGRESAR EN EL SIGUIENTE ORDEN NOMBRES APELLIDO PATERNO APELLIDO MATERNO)</label>
                <input type="text" class="form-control" id="id_nombreCompletoRepresentante" pattern="[A-Za-z ñÑáéíóúÁÉÍÓÚ.´Ü#ü]+">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-form-label">TELEFONO DEL REPRESENTANTE LEGAL</label>
                <input type="number" class="form-control" id="id_telPropietarioRepresentante">
            </div>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-form-label">CORREO ELECTRONICO DEL REPRESENTANTE LEGAL</label>
                <input type="text" class="form-control" id="id_correoPropietarioRepresentante">
            </div>
          </div>
        </div>
      </div>


      <div class="container p-3 mb-2 bg-light text-dark">
        <div class="p-3 mb-2 mdl-color--blue-grey-400 text-white">
          <center><h3>DATOS DE IDENTIFICACIÓN DEL PREDIO, PROYECTO O INMUEBLE</h3></center>
        </div>
        <div class="row">
          <div class="col-md-12" align="center">
            <div class="form-group"></div>
            <label>NOMBRE, DENOMINACIÓN O RAZON SOCIAL DEL PROYECTO</label>
            <br>
            <input type="text" class="form-control" name="" id="id_nombreProyecto" pattern="[A-Za-z0-9 ,&ñÑ.´áéíóúÁÉÍÓÚ/´Ü#ü-]+" required>
            <div id="result-nombreProyecto"></div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group col">
              <label>Giro:</label>
              <br>
              <select class="js-example-basic-single" id='id_selectMateria' required>
                <option value="" selected hidden>Seleccione una opción</option>
                <?php foreach ($sqlmateria as $fila) {?>
                             <option value="<?php echo $fila['nombre_materia']; ?>" onclick="giroSeleccionado()"><?php echo $fila['nombre_materia']; ?></option>
                         <?php }?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col">
              <label>Actividad:</label>
              <br>
              <select class="js-example-basic-single col-md-10" name="id_selectGiro" id="id_selectGiro" required>
                                    <option value="" selected hidden>Seleccione una opción</option>

                                  </select>
              <br>
              <label> En el caso de requerir agregar algún giro o actividad solicitarlo directamente con el personal de Informática</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" style="display:none">
            <div class="form-group col">
              <label>ACTIVIDAD PRINCIPAL</label>
              <br>
              <input type="text" class="form-control" id="id_selectActividadComercial" name="" pattern="[A-Za-z0-9 ,ñÑ.'áéíóúÁÉÍÓÚ/-´Ü#ü]+">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group col">
              <label>DESCRIPCIÓN DEL PROYECTO</label>
              <br>
              <textarea class="form-control" id="id_descripcion" pattern="[A-Za-z0-9 ,ñÑ.'áéíóúÁÉÍÓÚ/-]+" required></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col">
              <label>DOMICILIO DEL PROYECTO (CALLE, NO. EXT, NO. INT, COLONIA):</label>
              <br>
              <textarea class="form-control" id="id_domicilio" pattern="[A-Za-z0-9 ,ñÑ.'áéíóúÁÉÍÓÚ/-´Ü#ü]+" required></textarea>
              <div id="result-domicilio"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group col">
              <label>CÓDIGO POSTAL</label>
              <br>
              <input type="number" class="col-md-5 form-control" name="" pattern="^[0-9]+" id="id_codigoPostal" min="50000" max="57999" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col">
              <label>MUNICIPIO</label>
              <br>
              <select class="js-example-basic-single" name="id_selectMunicipio" id='id_selectMunicipio' required>
                <option value="" selected hidden>Seleccione una opción</option>
                <?php foreach ($sqlmunicipios as $fila) {?>
                             <option value="<?php echo $fila['MUNICIPIO']; ?>" onclick="giroSeleccionado()"><?php echo $fila['MUNICIPIO']; ?></option>
                         <?php }?>
              </select>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>SUPERFICIE TOTAL DEL PREDIO (m²):</label></center>
              <br>
              <input type="number" class="form-control" name="" id="id_SFCTotal" step=".01" min="0" pattern="^[0-9]+" onkeypress="return filterFloat(event,this);" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>SUPERFICIE CONSTRUIDA O PREVISTA A CONSTRUIR (m²):</label></center>
              <br>
              <input type="number" class="form-control" name="" id="id_SFCConstruida" min="0" pattern="^[0-9]+" step=".01" onkeypress="return filterFloat(event,this);" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>SUPERFICIE EN USO (m²):</label></center>
              <br>
              <input type="number" class="form-control" name="" id="id_SFCPrevia" min="0" pattern="^[0-9]+" step=".01" onkeypress="return filterFloat(event,this);" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>MONTO DE LA INVERSION DEL PROYECTO ($):</label></center>
              <br>
              <input type="number" class="form-control" name="" id="id_monto" step=".01" min="0" pattern="^[0-9]+" onkeypress="return filterFloat(event,this);" required>
              <label for="">ESPECIFIQUE EL TIPO DE MONEDA DEL MONTO DE LA INVERSIÓN</label>
              <select class="col-10 form-control" id="id_selectMoneda" required>
                <option value="MXN">MXN Pesos Mexicanos</option>
                <option value="USD">USD Dolares</option>
                <option value="EUR">EUR EUROS</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>NÚMERO DE EMPLEOS DIRECTOS:</label></center>
              <br>
              <input type="number" class="form-control" min="0" pattern="^[0-9]+" name="" id="id_empleosDirectos" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>NÚMERO DE EMPLEOS INDIRECTOS:</label></center>
              <br>
              <input type="number" class="form-control" name="" min="0" pattern="^[0-9]+" id="id_empleosIndirectos" required>
            </div>
          </div>
        </div>
      </div>

      <div class="container p-3 mb-2 bg-light text-dark">
        <div class="p-3 mb-2 mdl-color--blue-grey-400 text-white">
          <center><h3>OBSERVACIONES GENERALES</h3></center>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group col">
              <label>ANEXO DIGITAL (en el caso de que el expediente contenga alguno):</label>
              <br>
              <select class="form-control col-md-6" name="id_selectAnexo"id='id_selectAnexo' >
                <option value="NINGUNO" selected >NINGUNO</option>
                <option value="USB">USB</option>
                <option value="CD">CD</option>
                <option value="USB">USB/CD</option>
              </select>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group col">
              <label>OBSERVACIONES GENERALES:</label>
              <br>
              <textarea class="form-control" id="id_Observaciones" pattern="[A-Za-z0-9 ,ñÑ.'áéíóúÁÉÍÓÚ/-1234567890´Ü#ü]+"></textarea>
            </div>
          </div>
        </div>
      </div>

      <center><button type="submit" class="btn btn-primary">CONTINUAR CON LA CAPTURA --> </button></center>
      <br>
      <br>
      <br>
      <br>
    </form>

    <form id="myForm2">
      <div class="container p-3 mb-2 bg-light text-dark">
        <div class="p-3 mb-2 mdl-color--blue-grey-400 text-white">
          <center><h3>DATOS DE PREVENCIÓN</h3></center>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group col">
                <label class="">ESTADO ACTUAL DE LA PREVENCIÓN: (Si el expediente no cuenta con ninguna seleccionar 'SIN PREVENCIÓN')</label>
                <br>
                <select class="custom-select" name="id_prevencion"id='id_prevencion' required>
                  <option value="SIN PREVENCION" selected >SIN PREVENCION</option>
                  <option value="CON PREVENCION SIN NOTIFICAR" >CON PREVENCION SIN NOTIFICAR</option>
                  <option value="CON PREVENCION NOTIFICADA" >CON PREVENCION NOTIFICADA</option>
                  <option value="CON PREVENCION SUBSANADA" >CON PREVENCION SUBSANADA</option>
                        </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group col">
                <label>NÚMERO DE OFICIO DE LA PREVENCIÓN:</label>
                <input type="text" class="form-control" id="id_oficio" pattern="[A-Za-z0-9/ñÑáéíóúÁÉÍÓÚ-]+">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group col">
                <label>FECHA DE ELABORACION DEL OFICIO DE LA PREVENCIÓN:</label>
                <input id="id_fechaExpedicion" class="form-control" type="date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group col">
                <label>FECHA EN LA QUE SE NOTIFICÓ LA PREVENCIÓN:</label>
                <input id="id_fechaNotificacion" class="form-control" type="date">
              </div>
            </div>
          </div>
        </div>
        <div class="container p-3 mb-2 bg-light text-dark">
        <div class="p-3 mb-2 mdl-color--blue-grey-400 text-white">
            <center><h3>DATOS DE PROCEDENCIA JURÍDICA</h3></center>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group col">
                <label class="">ESTADO ACTUAL DE LA PROCEDENCIA: (Si el expediente no cuenta con ninguna seleccionar 'SIN PROCEDENCIA')</label>
                <br>
                <select class="custom-select" name="id_procedencia"id='id_procedencia' required>
                  <option value="SIN PROCEDENCIA" selected>SIN PROCEDENCIA</option>
                  <option value="CON PROCEDENCIA SIN NOTIFICAR" >CON PROCEDENCIA SIN NOTIFICAR</option>
                  <option value="CON PROCEDENCIA NOTIFICADA" >CON PROCEDENCIA NOTIFICADA</option>
                        </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group col">
                <label>NÚMERO DE OFICIO DE LA PROCEDENCIA:</label>
                <input type="text" class="form-control" id="id_oficioProcedencia" pattern="[A-Za-z0-9/ñÑáéíóúÁÉÍÓÚ-]+">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group col">
                <label>FECHA DE ELABORACIÓN DEL OFICIO DE PROCEDENCIA</label>
                <input id="id_fechaExpedicionProcendencia" class="form-control" type="date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group col">
                <label>FECHA DE NOTIFICACIÓN DE LA PROCEDENCIA:</label>
                <input id="id_fechaNotificacionProcedencia" class="form-control" type="date">
              </div>
            </div>
          </div>
          <div class="container p-3 mb-2 bg-light text-dark">
        <div class="p-3 mb-2 mdl-color--blue-grey-400 text-white">
              <center><h3>MATERIAS APLICABLES SEGÚN LA PROCEDENCIA JURÍDICA</h3></center>
            </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>IMPACTO SANITARIO </label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkSanitario" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkSanitario">SÍ</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>IMPACTO URBANO</label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkUrbano" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkUrbano">SÍ</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>PROTECCION CIVIL</label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkProteccion" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkProteccion">SÍ</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>IMPACTO AMBIENTAL</label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkAmbiental" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkAmbiental">SÍ</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>FORESTAL</label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkForestal" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkForestal">SÍ</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>COMERCIAL AUTOMOTRÍZ</label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkComercial" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkComercial">SÍ</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>IMPACTO VIAL</label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkVial" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkVial">SÍ</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>MOVILIDAD</label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkMovilidad" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkMovilidad">SÍ</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <br>
                <label>AGUA, DRENAJE Y ALCANTARILLADO</label>
                <div class="col-md-1">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="id_checkAgua" onclick="checkRepresentante()" >
                  <label class="custom-control-label" for="id_checkAgua">SÍ</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      <center><button type="submit"  class="btn btn-primary" id="">FINALIZAR LA CAPTURA</button></center>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<!--aqui termina-->
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>


  </body>

  <script>
    //variables globales
    var expediente1;
    var propietario1;
    var denoProyecto1;
    var user=<?php echo $usuario; ?>;
  </script>
  <script>
    $(document).ready(function(){
      $('#myForm2').hide(); //oculto mediante id
        $('.js-example-basic-single').select2();
          $('.js-modal').select2({
            dropdownParent: $('#exampleModal')
        });

      //seleccionar Giro
      $('#id_selectMateria').change(function(){
      var seleccionado = document.getElementById("id_selectMateria").selectedIndex;
      seleccionaGiro(seleccionado);
    });

      //validar si existen repetidos
      $('#id_numeroExpedinte').on('blur', function(){
        $('#result-numeroExpediente').html('<img src="../images/loader.gif" />').fadeOut(1000);
          var numeroExpediente = $(this).val();
          var dataString = 'numeroExpediente='+numeroExpediente;
          $.ajax({
            type: "POST",
            url: "validar_existencia.php",
            data: dataString,
            success: function(data) {
                $('#result-numeroExpediente').fadeIn(1000).html(data);
            }
        });
      });

      $('#id_nombreCompleto').on('blur', function(){
        $('#result-nombreCompleto').html('<img src="../images/loader.gif" />').fadeOut(1000);
          var nombreCompleto = $(this).val();
          var dataString = 'nombreCompleto='+nombreCompleto;
          $.ajax({
            type: "POST",
            url: "validar_existencia.php",
            data: dataString,
            success: function(data) {
                $('#result-nombreCompleto').fadeIn(1000).html(data);
            }
        });
      });

      $('#id_nombreProyecto').on('blur', function(){
        $('#result-nombreProyecto').html('<img src="../images/loader.gif" />').fadeOut(1000);
          var nombreProyecto = $(this).val();
          var dataString = 'nombreProyecto='+nombreProyecto;
          $.ajax({
            type: "POST",
            url: "validar_existencia.php",
            data: dataString,
            success: function(data) {
                $('#result-nombreProyecto').fadeIn(1000).html(data);
            }
        });
      });

      $('#id_domicilio').on('blur', function(){
        $('#result-domicilio').html('<img src="../images/loader.gif" />').fadeOut(1000);
          var domicilio = $(this).val();
          var dataString = 'domicilio='+domicilio;
          $.ajax({
            type: "POST",
            url: "validar_existencia.php",
            data: dataString,
            success: function(data) {
                $('#result-domicilio').fadeIn(1000).html(data);
            }
        });
      });
    });

    $("#myForm").on("submit", function(e)
      {
        guardar();
        $('#myForm2').show(); //muestro mediante id
        $('#myForm').hide(); //oculto mediante id
        event.preventDefault();
      });
  </script>

  <script>
    //-->validacion para 2 decimales
    function filterFloat(evt,input){
        var key = window.Event ? evt.which : evt.keyCode;
        var chark = String.fromCharCode(key);
        var tempValue = input.value+chark;
        if(key >= 48 && key <= 57){
            if(filter(tempValue)=== false){
                return false;
            }else{
                return true;
            }
        }else{
              if(key == 8 || key == 13 || key == 0) {
                  return true;
              }else if(key == 46){
                    if(filter(tempValue)=== false){
                        return false;
                    }else{
                        return true;
                    }
              }else{
                  return false;
              }
        }
    }
    function filter(__val__){
        var preg = /^([0-9]+\.?[0-9]{0,3})$/;
        if(preg.test(__val__) === true){
            return true;
        }else{
           return false;
        }
    }
    //-->termina validacion de 2 decimales

    //cambiar el giro
    function seleccionaGiro(seleccionado){
    $.ajax({
      url: 'busca_giro.php',
      type: 'POST',
      dataType: 'JSON',
      data: {
        id: seleccionado
      },
      success:function(datos){
        document.getElementById('id_selectGiro').innerHTML=datos.sele;
      }
    })
  }

    //activa el apartadro del representante legal
    function checkRepresentante(){
      var isChecked = document.getElementById('id_checkboxRepresentante').checked;
      if(isChecked){
        document.getElementById('id_div_Representante').style.display = 'block';

      }
      else{
        document.getElementById('id_div_Representante').style.display = 'none';
      }
    }

    //activa el nombre de la persona colectiva
    function selectPoder(){
      var valor = $("#id_documentoAcreditorio option:selected").val();
      if (valor=="Poder Notarial") {
        document.getElementById('id_div_personaColectiva').style.display = 'block';
      }
      else{
        document.getElementById('id_div_personaColectiva').style.display = 'none';
      }
    }
    function selectTipo(){
      var valor = $("#id_dependencia option:selected").val();
      if (valor=="DGOU") {
        document.getElementById('id_divNoExp').style.display = 'block';
        document.getElementById('id_divFolio').style.display = 'none';
      }
      else{
        document.getElementById('id_divNoExp').style.display = 'block';
        document.getElementById('id_divFolio').style.display = 'block';
      }
    }

    function selectTipo2(){
      var valor = $("#id_documentoAcreditorio option:selected").val();
      switch (valor){
        case 'PODER NOTARIAL' :
          document.getElementById('id_divJuridicoColec').style.display = 'block';
        break;
        case 'ACTA CONSTITUTIVA' :
          document.getElementById('id_divJuridicoColec').style.display = 'block';
        break;
        case 'PROTOCOLIZACION NOTARIAL' :
          document.getElementById('id_divJuridicoColec').style.display = 'block';
        break;
        default:
          document.getElementById('id_divJuridicoColec').style.display = 'none';
        break;
      }
    }






    function guardar(){
      //alert('entre');
      var banderaRepLegal1=0;
      var documentoAcreditorio1='N/A';
      var nombreRepresentanteLegal1='N/A';
      var telRepresentanteLegal1='N/A';
      var correoRepresentanteLegal1='N/A';
      var isChecked = document.getElementById('id_checkboxRepresentante').checked;
      expediente1= document.getElementById('id_numeroExpedinte').value;
      propietario1= document.getElementById('id_nombreCompleto').value;
      denoProyecto1=document.getElementById('id_nombreProyecto').value;

      if(isChecked){
        banderaRepLegal1=1;
        documentoAcreditorio1= document.getElementById('id_documentoAcreditorio').value;
        nombreRepresentanteLegal1= document.getElementById('id_nombreCompletoRepresentante').value;
        telRepresentanteLegal1= document.getElementById('id_telPropietarioRepresentante').value;
        correoRepresentanteLegal1= document.getElementById('id_correoPropietarioRepresentante').value;
      }
      else{
        banderaRepLegal1=0;
      }

      $.ajax({
        url: 'guarda_datos_Generales.php',
        type: 'POST',
        dataType: 'JSON',
        data: {dependencia: document.getElementById('id_dependencia').value,
          folio: document.getElementById('id_folio').value,
          fechaIngreso: document.getElementById('id_fechaIngreso').value,
          expediente: expediente1,
          nombrePropietario: propietario1,
          telPropietario: document.getElementById('id_telPropietario').value,
          correoPropietario: document.getElementById('id_correoPropietario').value,
          banderaRepLegal: banderaRepLegal1,
          documentoAcreditorio: documentoAcreditorio1,
          nombreRepresentanteLegal: nombreRepresentanteLegal1,
          telRepresentanteLegal: telRepresentanteLegal1,
          correoRepresentanteLegal: correoRepresentanteLegal1,
          nombreProyecto: denoProyecto1,
          materia: document.getElementById('id_selectMateria').value,
          giro: document.getElementById('id_selectGiro').value,
          actividadComercial: document.getElementById('id_selectActividadComercial').value,
          descripcion: document.getElementById('id_descripcion').value,
          domicilio: document.getElementById('id_domicilio').value,
          codigoPostal: document.getElementById('id_codigoPostal').value,
          municipio: document.getElementById('id_selectMunicipio').value,
          sfcTotal: document.getElementById('id_SFCTotal').value,
          sfcConstruida: document.getElementById('id_SFCConstruida').value,
          sfcPrevia: document.getElementById('id_SFCPrevia').value,
          monto: document.getElementById('id_monto').value,
          moneda: document.getElementById('id_selectMoneda').value,
          empleosDirectos: document.getElementById('id_empleosDirectos').value,
          empleosIndirectos: document.getElementById('id_empleosIndirectos').value,
          anexo: document.getElementById('id_selectAnexo').value,
          observaciones: document.getElementById('id_Observaciones').value,
          usuario: user,
          caja: document.getElementById('id_selectCaja').value,
          nombrejuridicoCol: document.getElementById('id_nombrejuridicoCol').value,
          codigoBarras: document.getElementById('id_codigoBarras').value
        },
      })
      .done(function(datos) {
        console.log("success");
        console.log(datos.resultado);
        swal("Éxito!", "Los datos Generales del expediente se han guardado correctamente, por favor ingrese los datos correspondientes a la Etapa 1 del mismo", "success");
      })
      .fail(function(XMLHttpRequest) {
        console.log("error");
        console.log(datos.resultado);
        console.log(XMLHttpRequest.responseText);
      })
      .always(function() {
        console.log("complete");
      });

    }
  </script>

  <script>
    //funciones de etapa1
    $("#myForm2").on("submit", function(e)
      {
        guardarEtapa1();
        event.preventDefault();
      });

    function guardarEtapa1(){

      var sanitario = document.getElementById('id_checkSanitario').checked;
      var vial = document.getElementById('id_checkVial').checked;
      var urbano = document.getElementById('id_checkUrbano').checked;
      var comercial = document.getElementById('id_checkComercial').checked;
      var ambiental = document.getElementById('id_checkAmbiental').checked;
      var movilidad = document.getElementById('id_checkMovilidad').checked;
      var forestal = document.getElementById('id_checkForestal').checked;
      var agua = document.getElementById('id_checkAgua').checked;
      var proteccion = document.getElementById('id_checkProteccion').checked;
      var etapa = 3;
      if(sanitario)
      {
        sanitario=1;
      }
      else {
        sanitario=0;
      }
      if (vial) {
        vial=1;
      }
      else{
        vial=0
      }
      if(urbano)
      {
        urbano=1;
      }
      else {
        urbano=0;
      }
      if(comercial)
      {
        comercial=1;
      }
      else {
        comercial=0;
      }
      if(comercial)
      {
        comercial=1;
      }
      else {
        comercial=0;
      }
      if(ambiental)
      {
        ambiental=1;
      }
      else {
        ambiental=0;
      }
      if(movilidad)
      {
        movilidad=1;
      }
      else {
        movilidad=0;
      }
      if(forestal)
      {
        forestal=1;
      }
      else {
        forestal=0;
      }
      if(agua)
      {
        agua=1;
      }
      else {
        agua=0;
      }
      if(proteccion)
      {
        proteccion=1;
      }
      else {
        proteccion=0;
      }


      $.ajax({
        url: 'guardar_etapa1.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          prevencion: document.getElementById('id_prevencion').value,
          oficioPrevencion: document.getElementById('id_oficio').value,
          fechaExpPrev: document.getElementById('id_fechaExpedicion').value,
          fechaNotPrev: document.getElementById('id_fechaNotificacion').value,
          oficioProcedencia: document.getElementById('id_oficioProcedencia').value,
          procedencia: document.getElementById('id_procedencia').value,
          fechaExpPro: document.getElementById('id_fechaExpedicionProcendencia').value,
          fechaNotPro: document.getElementById('id_fechaNotificacionProcedencia').value,
          sanitario1: sanitario,
          vial1: vial,
          urbano1: urbano,
          comercial1: comercial,
          ambiental1: ambiental,
          movilidad1: movilidad,
          forestal1: forestal,
          agua1: agua,
          proteccion1: proteccion,
          etapa1: etapa,
          expediente: expediente1,
          nombrePropietario: propietario1,
          nombreProyecto: denoProyecto1,
          usuario: user
        },
      })
      .done(function() {
        console.log("success");
        alert("Los datos de Etapa 1 del expediente se han guardado correctamente!");
        window.location.reload();
      })
      .fail(function(XMLHttpRequest) {
        console.log("ya valio");

        console.log(XMLHttpRequest.responseText);
      })
      .always(function() {
        console.log("complete");
      });

    }
  </script>
</html>