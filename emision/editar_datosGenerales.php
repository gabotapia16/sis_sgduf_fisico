<?php
include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';
$id=25;
$id=$_GET['id_general_datosG'];
$resultado = mysqli_query($conection, "SELECT * from datos_generales WHERE id=$id");
$numero_filas = mysqli_num_rows($resultado);
if ($numero_filas != 0)
    {
      $datos = mysqli_fetch_assoc($resultado);
    }
//$usuario=$_SESSION["id_user"];
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
              <select class="custom-select" name="id_dependencia"id='id_dependencia'  required>
                <option value="<?php echo $datos['origen_ingreso'] ?>" selected><?php echo $datos['origen_ingreso'] ?></option>
                <option value="DGOU">DIRECCIÓN GENERAL DE OPERACIÓN URBANA</option>
                <option value="COFAEM">COMISIÓN DE FACTIBILIDAD DEL ESTADO DE MEXICO</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row" id="id_divFolio" >
              <label class="col-form-label">FOLIO DE LA SOLICITUD DE COFAEM:</label>
                <input type="text" class="form-control" value="<?php echo $datos['folio_solicitud'] ?>" id="id_folio" pattern="[A-Za-z0-9/ñÑáéíóúÁÉÍÓÚ-]+">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row" id="id_divNoExp" >
              <label class="col-form-label">NUMERO DE EXPEDIENTE QUE SE LE ASIGNO A LA SOLICITUD:</label>
                <input type="text" class="form-control" value="<?php echo $datos['no_expediente'] ?>" id="id_numeroExpedinte" pattern="[A-Za-z0-9/ñÑáéíóúÁÉÍÓÚ-]+">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group col">
              <label>NÚMERO DE CAJA:</label>
              <br>
              <select class="js-example-basic-single" name="id_selectCaja" id='id_selectCaja' >
                <option value="<?php echo $datos['no_caja_tramitacion'] ?>" selected><?php echo $datos['no_caja_tramitacion'] ?></option>
                <?php foreach ($sqlcajas as $fila) {?>
                             <option value="<?php echo $fila['no_caja']; ?>"><?php echo $fila['no_caja']; ?></option>
                         <?php }?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group col">
                <label for="">Código de Barras para Expediente Digitalizado:</label>
                <input type="number" class="form-control" value="<?php echo $datos['codigo_barras'] ?>" id="id_codigoBarras" required>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label class="col-form-label">NOMBRE COMPLETO DEL PROPIETARIO (SE DEBERA INGRESAR EN EL SIGUIENTE ORDEN NOMBRES APELLIDO PATERNO APELLIDO MATERNO)</label>
                <input type="text" class="form-control" value="<?php echo $datos['nombre_propietario'] ?>" id="id_nombreCompleto" pattern="[A-Za-z0-9 ñÑáéíóúÁÉÍÓÚ,.´Ü()#ü/&-+]+" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group row">
              <label class="col-form-label">FECHA DE INGRESO DE LA SOLICITUD:</label>
                <input id="id_fechaIngreso" value="<?php echo $datos['fecha_ingreso'] ?>" class="form-control" type="date" required>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-form-label">TELEFONO DEL PROPIETARIO</label>
                <input type="number" class="form-control" value="<?php echo $datos['tel_propietario'] ?>" id="id_telPropietario" required>
            </div>
          </div>
          <div class="col-1"></div>
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-form-label">CORREO ELECTRONICO DEL PROPIETARIO</label>
                <input type="email" class="form-control" value="<?php echo $datos['correo_propietario'] ?>" id="id_correoPropietario" required>
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
                <option selected value="<?php echo $datos['doc_personalidad'] ?>"><?php echo $datos['doc_personalidad'] ?></option>
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
                <input type="text" class="form-control" id="id_nombrejuridicoCol" value="<?php echo $datos['persona_juridicolectiva'] ?>" pattern="[A-Za-z0-9 ñÑáéíóúÁÉÍÓÚ,.´Ü#ü&]+">
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label class="col-form-label">NOMBRE COMPLETO DEL REPRESENTANTE LEGAL (SE DEBERÁ INGRESAR EN EL SIGUIENTE ORDEN NOMBRES APELLIDO PATERNO APELLIDO MATERNO)</label>
                <input type="text" class="form-control" value="<?php echo $datos['representante_legl'] ?>" id="id_nombreCompletoRepresentante" pattern="[A-Za-z ñÑáéíóúÁÉÍÓÚ/.´Ü#ü]+">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-form-label">TELEFONO DEL REPRESENTANTE LEGAL</label>
                <input type="number" value="<?php echo $datos['tel_rep_legal'] ?>" class="form-control" id="id_telPropietarioRepresentante">
            </div>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-form-label">CORREO ELECTRONICO DEL REPRESENTANTE LEGAL</label>
                <input type="text" class="form-control" value="<?php echo $datos['correo_rep_legal'] ?>" id="id_correoPropietarioRepresentante">
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
            <input type="text" class="form-control" value="<?php echo $datos['deno_proyecto'] ?>" name="" id="id_nombreProyecto" pattern="[A-Za-z0-9 ,ñÑ.´áéíóúÁÉÍÓÚ/´Ü-()#ü&+]+" required>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group col">
              <label>Giro:</label>
              <br>
              <select class="js-example-basic-single" id='id_selectMateria' required>
                <option value="<?php echo $datos['materia'] ?>" selected ><?php echo $datos['materia'] ?></option>
                <?php foreach ($sqlmateria as $fila) {?>
                             <option value="<?php echo $fila['nombre_materia']; ?>" onclick="giroSeleccionado()"><?php echo $fila['nombre_materia']; ?></option>
                         <?php }?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group col">
              <label>Actividad:</label>
              <br>
              <select class="js-example-basic-single" id='id_selectGiro' required>
                <option value="<?php echo $datos['giro'] ?>" selected ><?php echo $datos['giro'] ?></option>
                <?php foreach ($sqlgiro as $fila) {?>
                             <option value="<?php echo $fila['nombre_giros']; ?>" onclick="giroSeleccionado()"><?php echo $fila['nombre_giros']; ?></option>
                         <?php }?>
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
              <textarea class="form-control" id="id_descripcion"  pattern="[A-Za-z0-9 ,ñÑ.'áéíóúÁÉÍÓÚ/-]+" required><?php echo $datos['descripcion_general'] ?></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col">
              <label>DOMICILIO DEL PROYECTO (CALLE, NO. EXT, NO. INT, COLONIA):</label>
              <br>
              <textarea class="form-control" id="id_domicilio"  pattern="[A-Za-z0-9 ,ñÑ.'áéíóúÁÉÍÓÚ/-´Ü#ü]+" required><?php echo $datos['domicilio_proyecto'] ?></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group col">
              <label>CÓDIGO POSTAL</label>
              <br>
              <input type="number" class="col-md-5 form-control" name="" value="<?php echo $datos['cp_proyecto'] ?>" pattern="^[0-9]+" id="id_codigoPostal" min="50000" max="57999" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col">
              <label>MUNICIPIO</label>
              <br>
              <select class="js-example-basic-single" name="id_selectMunicipio" id='id_selectMunicipio' required>
                <option value="<?php echo $datos['municipio_proyecto'] ?>" selected ><?php echo $datos['municipio_proyecto'] ?></option>
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
              <input type="number" class="form-control" value="<?php echo $datos['sfc_total'] ?>" name="" id="id_SFCTotal" step=".01" min="0" pattern="^[0-9]+" onkeypress="return filterFloat(event,this);" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>SUPERFICIE CONSTRUIDA O PREVISTA A CONSTRUIR (m²):</label></center>
              <br>
              <input type="number" class="form-control" name="" id="id_SFCConstruida" value="<?php echo $datos['sfc_construida'] ?>" min="0" pattern="^[0-9]+" step=".01" onkeypress="return filterFloat(event,this);" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>SUPERFICIE EN USO:</label></center>
              <br>
              <input type="number" class="form-control" name="" value="<?php echo $datos['sfc_prevista_cosnt'] ?>" id="id_SFCPrevia" min="0" pattern="^[0-9]+" step=".01" onkeypress="return filterFloat(event,this);" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>MONTO DE LA INVERSION DEL PROYECTO ($):</label></center>
              <br>
              <input type="number" value="<?php echo $datos['monto_inversion'] ?>" class="form-control" name="" id="id_monto" step=".01" min="0" pattern="^[0-9]+" onkeypress="return filterFloat(event,this);" required>
              <label for="">ESPECIFIQUE EL TIPO DE MONEDA DEL MONTO DE LA INVERSIÓN</label>
              <select class="col-10 form-control" id="id_selectMoneda" required>
                <option value="<?php echo $datos['tipo_nomeda'] ?>" selected ><?php echo $datos['tipo_nomeda'] ?></option>
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
              <input type="number" class="form-control" min="0" pattern="^[0-9]+" value="<?php echo $datos['no_emplos_dir'] ?>" name="" id="id_empleosDirectos" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group col">
              <center><label>NÚMERO DE EMPLEOS INDIRECTOS:</label></center>
              <br>
              <input type="number" class="form-control" name="" min="0" pattern="^[0-9]+" id="id_empleosIndirectos" value="<?php echo $datos['no_emplos_ind'] ?>" required>
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

                <option value="<?php echo $datos['anexo_digital'] ?>" selected ><?php echo $datos['anexo_digital'] ?></option>
                <option value="NINGUNO">NINGUNO</option>
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
              <textarea class="form-control" id="id_Observaciones" pattern="[A-Za-z0-9 ,ñÑ.'áéíóúÁÉÍÓÚ/-1234567890´Ü#ü]+"><?php echo $datos['observaciones_gen'] ?></textarea>
            </div>
          </div>
        </div>
      </div>

      <center><button type="submit" class="btn btn-primary">Actualizar Datos</button></center>
      <br>
      <br>
      <br>
      <br>
    </form>
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

    var id1=<?php echo $id; ?>;
  </script>
  <script>
    $(document).ready(function(){
      var chek=<?php echo $datos['bandera_rep_leg'];?>;

      if (chek==1) {
        document.getElementById("id_checkboxRepresentante").checked = true;
        document.getElementById('id_div_Representante').style.display = 'block';
      }
        $('.js-example-basic-single').select2();
          $('.js-modal').select2({
            dropdownParent: $('#exampleModal')
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
        url: 'actualiza_datos_Generales.php',
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
          id: id1,
          codigoBarras: document.getElementById('id_codigoBarras').value
        },
      })
      .done(function(datos) {
        console.log("success");
        console.log(datos.resultado);
        swal("Éxito!", "Los datos Generales del expediente se han ACTUALIZADO correctamente", "success");
          window.history.back();

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
</html>