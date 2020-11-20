<?php 
  $ID_DUF=$_REQUEST['ID'];
  $NUMERO_CARACTERES = strlen($ID_DUF);
  if ($NUMERO_CARACTERES < 32 AND $NUMERO_CARACTERES >=28){$TIPO_DOCUMENTO="OFICIO";}else{$TIPO_DOCUMENTO="DUF";}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Inicio</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="imagenes/sys.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    function Solo_Letras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " abcdefghijklmnñopqrstuvwxyz0123456789";
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
    <style type="text/css">
        .login-form {
            width: 340px;
            margin: 50px auto;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
    </style>

    <script>
    $(document).ready(function(){
      $("#login_Busqueda_pa").hide();
        $("#login_Busqueda_CP").hide();
      $("#Busqueda_pa").click(function(){
        $("#login_Busqueda_pa").show();
        $("#login_Busqueda_CP").hide();
      });
      $("#Busqueda_cp").click(function(){
        $("#login_Busqueda_CP").show();
        $("#login_Busqueda_pa").hide();
      });
    });
    </script>

    <script>
function validar(){
  //Almacenamos los valores
  CURP=$('#CURP').val();
  //Comprobamos la longitud de caracteres
  if (CURP.length >= "18" || CURP.length >= "19"){
    return true;
  }
  else {
    alert('El CURP debe de ser minimo de 18 caracteres');
    return false;  
  }
}
</script>

</head>
<body>


<table class="table" >

        <tr align="center">
          <td>
              <table border="0">
                  <tr align="center">
                        <td><img alt="Brand" src="imagenes/logo_edomex2.png" width="360" height="100"></td> 
                    </tr>
                  <tr bgcolor="F2F2F2">
                      <td><h1 align="center">C O F A E M</h1></td>
                  </tr>
                  <tr>
                    <td><h4 align="center">VALIDADOR DE DOCUMENTOS</h4></td>
                  </tr>
                  <tr align="center">
                    <td><img src="imagenes/duf2.jpg" width="350" height="300" alt=""></td>
                  </tr>
                  <tr>
                    <td><h4 align="justify">Para validar la autenticidad del documento debe elegir el tipo de busqueda.</h4></td>
                  </tr>
              </table>
          </td>
      </table>


    <div class="login-form">
              
            <div class="form-group" <?php  if ($TIPO_DOCUMENTO == "DUF") { echo "style='display: block;'";}else{echo "style='display: none;'"; }?>>
                <button class="btn btn-success btn-block" id="Busqueda_cp"><h3>CONSULTA PÚBLICA</h3></button>
            </div> 
            <div class="form-group">
                <button class="btn btn-success btn-block" id="Busqueda_pa"><h3>PERSONAL AUTORIZADO</h3></button>
            </div>     
     </div>

     <div class="login-form" id="login_Busqueda_pa" <?php  if ($TIPO_DOCUMENTO == "DUF" OR $TIPO_DOCUMENTO == "OFICIO") { echo "style='display: block;'";}else{echo "style='display: none;'"; }?>>
            <form action="validador/validate_user_duf" method="post">      
            <div class="form-group">
                <input type="text" class="form-control" name="ID_DUF" value="<?php echo $ID_DUF?>" style="display: none;" >
                <input type="text" class="form-control" placeholder="Ingresar Usuario" name="username" required onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Ingresar Contraseña" name="password" required onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Ingresar</button>
            </div>       
        </form>
     </div>

     <div class="login-form" id="login_Busqueda_CP">
            <form action="validador/validate_user_duf" method="post" onSubmit="return validar();">     
            <div class="form-group">

                <input type="text" class="form-control" name="ID_DUF" value="<?php echo $ID_DUF?>" style="display: none;" >
                <input type="text" class="form-control" placeholder="Ingresar CURP" name="CURP" id="CURP" required onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();">
                <a href="https://www.gob.mx/curp/" target="_blank" align="rigth"><h6>Consultar CURP</h6></a>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Ingresar</button>
            </div>     
     </div>

  
  
</body>
</html>




















