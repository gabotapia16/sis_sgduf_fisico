<?php
include("../segurity_session.php");
//include 'conection_bd.php';
include '../conection_bd.php';
$id=25;
$id=$_GET['id_etapa1'];
$resultado = mysqli_query($conection, "SELECT * from procedencia_integracion WHERE id=$id");
$numero_filas = mysqli_num_rows($resultado);
if ($numero_filas != 0)
    {
      $datos = mysqli_fetch_assoc($resultado);
    }
    $usuario=$_SESSION["id_user"];
include '../menu.php';
 ?>
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
	                  <option value="<?php echo $datos['estado_prevencion'] ?>" selected ><?php echo $datos['estado_prevencion'] ?></option>
	                  <option value="SIN PREVENCION">SIN PREVENCION</option>
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
	                <input type="text" class="form-control" value="<?php echo $datos['no_ofi_prevencion'] ?>" id="id_oficio" pattern="[A-Za-z0-9/ñÑáéíóúÁÉÍÓÚ-]+">
	              </div>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-md-6">
	              <div class="form-group col">
	                <label>FECHA DE ELABORACION DEL OFICIO DE LA PREVENCIÓN:</label>
	                <input id="id_fechaExpedicion" value="<?php echo $datos['fec_expedicion_prevencion'] ?>" class="form-control" type="date">
	              </div>
	            </div>
	            <div class="col-md-6">
	              <div class="form-group col">
	                <label>FECHA EN LA QUE SE NOTIFICÓ LA PREVENCIÓN:</label>
	                <input id="id_fechaNotificacion" class="form-control" value="<?php echo $datos['fec_notificacion_prevencion'] ?>" type="date">
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
	                	<option value="<?php echo $datos['estado_procencia'] ?>" selected><?php echo $datos['estado_procencia'] ?></option>
	                  <option value="SIN PROCEDENCIA" >SIN PROCEDENCIA</option>
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
	                <input type="text" class="form-control" value="<?php echo $datos['no_ofi_procedencia'] ?>" id="id_oficioProcedencia" pattern="[A-Za-z0-9/ñÑáéíóúÁÉÍÓÚ-]+">
	              </div>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-md-6">
	              <div class="form-group col">
	                <label>FECHA DE ELABORACIÓN DEL OFICIO DE PROCEDENCIA</label>
	                <input id="id_fechaExpedicionProcendencia" value="<?php echo $datos['fec_expedicion_procedencia'] ?>" class="form-control" type="date">
	              </div>
	            </div>
	            <div class="col-md-6">
	              <div class="form-group col">
	                <label>FECHA DE NOTIFICACIÓN DE LA PROCEDENCIA:</label>
	                <input id="id_fechaNotificacionProcedencia" value="<?php echo $datos['fec_notificacion_procedencia'] ?>" class="form-control" type="date">
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
	                  <input type="checkbox" class="custom-control-input" id="id_checkUrbano" >
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
	    <!--aqui termina-->
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

	</body>
	<script>
		var user=<?php echo $usuario; ?>;
		var id1=<?php echo $id; ?>;
	</script>
	<script>
    $(document).ready(function(){

	  var sanitario = <?php echo $datos['ma_SLD']; ?>;
      var vial = <?php echo $datos['ma_VLD'] ;?>;
      var urbano = <?php echo $datos['ma_DUM']; ?>;
      var comercial = <?php echo $datos['ma_DEC'] ;?>;
      var ambiental = <?php echo $datos['ma_MAM'] ;?>;
      var movilidad = <?php echo $datos['ma_MOV'] ;?>;
      var forestal = <?php echo $datos['ma_FTL']; ?>;
      var agua = <?php echo $datos['ma_ADA']; ?>;
      var proteccion = <?php echo $datos['ma_PCL']; ?>;

      if (sanitario==1) {
      	document.getElementById("id_checkSanitario").checked = true;
      }else{
      }
      if (vial==1) {
      	document.getElementById("id_checkVial").checked = true;
      }
      if (urbano==1) {
      	document.getElementById("id_checkUrbano").checked = true;
      }
      if (comercial==1) {
      	document.getElementById("id_checkComercial").checked = true;
      }
      if (ambiental==1) {
      	document.getElementById("id_checkAmbiental").checked = true;
      }
      if (movilidad==1) {
      	document.getElementById("id_checkMovilidad").checked = true;
      }
      if (forestal==1) {
      	document.getElementById("id_checkForestal").checked = true;
      }
      if (agua==1) {
      	document.getElementById("id_checkAgua").checked = true;
      }
      if (proteccion==1) {
      	document.getElementById("id_checkProteccion").checked = true;
      }
      if (etapa==1) {
      	document.getElementById("id_checkEtapa2").checked = true;
      }
    });


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

      //alert('entre');
       $.ajax({
        url: 'actualiza_datos_Etapa1.php',
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
          usuario: user,
          id: id1
        },
      })
      .done(function() {
        console.log("success");
        alert("Los datos de Etapa 1 del expediente se han guardado correctamente!");
        window.history.back();
      })
      .fail(function(XMLHttpRequest) {
        console.log("ya valio");

        console.log(XMLHttpRequest.responseText);
      })
      .always(function() {
        console.log("complete");
      });
      //alert('por qué');
    }
  </script>
</html>