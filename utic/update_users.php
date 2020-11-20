<?php
    include("../segurity_session.php");
	include("../conection_bd.php");
	date_default_timezone_set('America/Mexico_City');
    $ID=mysqli_real_escape_string($conection,$_POST['Id']);
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
            $sql_modificar = "UPDATE usuarios SET 
            APELLIDO_PATERNO='".$Apellido_p."',
            APELLIDO_MATERNO='".$Apellido_m."',
            NOMBRES='".$Nombres."',
            DEPENDENCIA='".$Dependencia."',
            ORGANISMO='".$Organismo."',
            UNIDAD_ADSCRIPCION='".$Unidad_adscripcion."',
            USUARIO='".$Usuario_encrypted."',
            PASSWORD='".$Password_encrypted."',
            PERFIL='".$Perfil."',
            ESTADO='".$Estado."',
            USUARIO_MOVIMIENTO='".$USUARIO_MOVIMIENTO."',
            FECHA_MOVIMIENTO='".$FECHA_MOVIMIENTO."',
            HORA_MOVIMIENTO='".$HORA_MOVIMIENTO."' WHERE ID_USER=$ID";
			$resultado_modificar = mysqli_query($conection,$sql_modificar);
    if ($resultado_modificar === TRUE) {
        header ("Location: users");
    }else {
    	//header ("Location: Failure.php");
    	printf("Errormessage: %s\n", mysqli_error($conection));
    }
?>

