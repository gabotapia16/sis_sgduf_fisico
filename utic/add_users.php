<?php 
    include("../segurity_session.php");
	include("../conection_bd.php");
	date_default_timezone_set('America/Mexico_City');
    $Nombres=mysqli_real_escape_string($conection,$_POST['Nombres']);
    $Apellido_p=mysqli_real_escape_string($conection,$_POST['Apellido_p']);
    $Apellido_m=mysqli_real_escape_string($conection,$_POST['Apellido_m']);
    $Dependencia=mysqli_real_escape_string($conection,$_POST['Dependencia']);
    $Organismo=mysqli_real_escape_string($conection,$_POST['Organismo']);
    $Unidad_adscripcion=mysqli_real_escape_string($conection,$_POST['Unidad_adscripcion']);
    $Usuario=mysqli_real_escape_string($conection,$_POST['Usuario']);
    $Password=mysqli_real_escape_string($conection,$_POST['Password']);
    $Perfil=mysqli_real_escape_string($conection,$_POST['Perfil']);
    $Estado=mysqli_real_escape_string($conection,$_POST['Estado']);
    //-------------------------------------------
    $Usuario_encrypted=base64_encode($Usuario);
    $Password_encrypted=base64_encode($Password);
    //-------------------------------------------
    $USUARIO_MOVIMIENTO=$_SESSION["user_name"];
    $FECHA_MOVIMIENTO=date("Y-m-d");
    $HORA_MOVIMIENTO=date("H:i:s");
    $sql_insertar = "INSERT INTO usuarios (APELLIDO_PATERNO,APELLIDO_MATERNO,NOMBRES,DEPENDENCIA,ORGANISMO,UNIDAD_ADSCRIPCION,USUARIO,PASSWORD,PERFIL,ESTADO,USUARIO_MOVIMIENTO,FECHA_MOVIMIENTO,HORA_MOVIMIENTO) values ('".$Apellido_p."','".$Apellido_m."','".$Nombres."','".$Dependencia."','".$Organismo."','".$Unidad_adscripcion."','".$Usuario_encrypted."','".$Password_encrypted."','".$Perfil."','".$Estado."','".$USUARIO_MOVIMIENTO."','".$FECHA_MOVIMIENTO."','".$HORA_MOVIMIENTO."')";
    $resultado_insertar = mysqli_query($conection,$sql_insertar);
    if ($resultado_insertar === TRUE) {
        header ("Location: users");
    }else {
    	//header ("Location: Failure.php");
    	printf("Errormessage: %s\n", mysqli_error($conection));
    }
?>
