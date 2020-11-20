<?php
include("../segurity_session.php");
include("../conection_bd.php");
date_default_timezone_set('America/Mexico_City'); 
$ID_ENCRIPTADO = $_REQUEST['ID'];
$ID_DESENCRIPTADO = base64_decode($ID_ENCRIPTADO);
$resultado= mysqli_query($conection,"SELECT * FROM usuarios where ID_USER='$ID_DESENCRIPTADO'");
$numero_filas = mysqli_num_rows($resultado);
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
		<script src="js/jquery.min.js"></script>
	</head>
<body>
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <img alt="Brand" src="imagenes/sys.png" width="40" height="40">
          <p class="navbar-brand">Sistema de archivo</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="menu_general">Menu principal</a></li>
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
                <form method="POST" action="update_users">
                    <table class="table">
                        <input type="text" class="form-control" value="<?php echo $ID_DESENCRIPTADO;?>" name="Id" required style="display: none;">
                         <tr align="left"><td><p>Nombre(s):</p></td><td><p><input type="text" class="form-control" placeholder="Nombre(s)" name="Nombres" value="<?php echo $datos['NOMBRES'];?>" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"><td><p>Apellido paterno:</p></td><td><p><input type="text" class="form-control" placeholder="Apellido paterno" name="Apellido_p" value="<?php echo $datos['APELLIDO_PATERNO'];?>" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"><td><p>Apellido materno:</p></td><td><p><input type="text" class="form-control" placeholder="Apellido materno" name="Apellido_m" value="<?php echo $datos['APELLIDO_MATERNO'];?>" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        
                        <tr align="left"><td><p>Dependencia:</p></td><td><p><input type="text" class="form-control" readonly placeholder="Dependencia" name="Dependencia" value="<?php echo $datos['DEPENDENCIA'];?>" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"><td><p>Organismo:</p></td><td><p><input type="text" class="form-control" readonly placeholder="Organismo" name="Organismo" value="<?php echo $datos['ORGANISMO'];?>" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"><td><p>Unidad de adscripcion:</p></td><td><p><input type="text" class="form-control" readonly placeholder="Unidad de Adcripcion" name="Unidad_adscripcion" value="<?php echo $datos['UNIDAD_ADSCRIPCION'];?>" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"><td><p>Usuario:</p></td><td><p><input type="text" class="form-control" placeholder="Usuario" name="Usuario" value="<?php echo base64_decode($datos['USUARIO']);?>" onkeypress="return Solo_Letras(event) " onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"> <td><p>Contraseña:</p></td><td><p><input type="password" class="form-control" placeholder="Contraseña" name="Password" value="<?php echo base64_decode($datos['PASSWORD']);?>" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"><td><p>Perfil del usuario:</p></td><td><p> 
                                        <select class="form-control" name="Perfil" id="Perfil" required>
                                        <option selected value="<?php echo $datos['PERFIL'];?>"><?php echo $datos['PERFIL'];?></option>
                                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                        <option value="ACCESO_TOTAL">ACCESO TOTAL</option>
                                        <option value="ACCESO_RESTRINGIDO">ACCESO RESTRINGIDO</option>
                        </select></p></td>
                        </tr>
                            <tr align="left"><td><p>Estado del usuario</p></td><td><p> 
                                        <select class="form-control" name="Estado" required>
                                        <option selected value="<?php echo $datos['ESTADO'];?>"><?php switch($datos['ESTADO']){
                                                        case 0:echo "INACTIVO";break;
                                                        case 1:echo "ACTIVO";break;    
                                                        }?></option>
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                        </select></p></td>
                        </tr>
                    </table>  
                         <table class="table">
                             <tr align="center">
                                <td><button id=Save_User type="submit" class="btn btn-primary"><h4><span class='glyphicon glyphicon-plus-sign'> Guardar</span></h4></button></td>
                        </form>
                        <form method="POST" action="users" >
                                <td><button id=Save_User type="submit" class="btn btn-danger"><h4><span class='glyphicon glyphicon-plus-sign'> Cancelar</span></h4></button></td>
                            </tr>
                         </table>  
                </form>
            </div>
        </div>
    </div>
        
        
</body>
</html>