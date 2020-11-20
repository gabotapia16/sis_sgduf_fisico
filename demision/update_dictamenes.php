<?php 
    include("../segurity_session.php");
    include("../conection_bd.php");
    date_default_timezone_set('America/Mexico_City');
    if(isset($_POST['enviar'])){
    if(!empty($_POST['MATERIAS'])) {
        $MATERIAS="";
        $MATERIAS = implode(",", $_POST['MATERIAS']);
    }

    $ID=mysqli_real_escape_string($conection,$_POST['Id']);
    $NO_EXPEDIENTE=mysqli_real_escape_string($conection,$_POST['NO_EXPEDIENTE']);
    $NOMBRE_PROPIETARIO=mysqli_real_escape_string($conection,$_POST['NOMBRE_PROPIETARIO']);
    $RAZON_SOCIAL=mysqli_real_escape_string($conection,$_POST['RAZON_SOCIAL']);
    $DOMICILIO_CNENICOL=mysqli_real_escape_string($conection,$_POST['DOMICILIO_CNENICOL']);
    $MUNICIPIO=mysqli_real_escape_string($conection,$_POST['MUNICIPIO']);
    $CP=mysqli_real_escape_string($conection,$_POST['CP']);
    $SUPERFICIE_TOTAL=mysqli_real_escape_string($conection,$_POST['SUPERFICIE_TOTAL']);
    $SUPERFICIE_CONS=mysqli_real_escape_string($conection,$_POST['SUPERFICIE_CONSTRUIDA']);
    $SUPERFICIE_USO=mysqli_real_escape_string($conection,$_POST['SUPERFICIE_USO']);
    $TIPO_DUF=mysqli_real_escape_string($conection,$_POST['TIPO_DUF']);
    $IMPACTO=mysqli_real_escape_string($conection,$_POST['IMPACTO']);
    $NO_DUF_ANTERIOR=mysqli_real_escape_string($conection,$_POST['NO_DUF_ANTERIOR']);
    $MONTO_INVERSION=mysqli_real_escape_string($conection,$_POST['MONTO_INVERSION']);
    $NO_EMPLEOS_DIRECTOS=mysqli_real_escape_string($conection,$_POST['NO_EMPLEOS_DIRECTOS']);
    $NO_EMPLEOS_IND=mysqli_real_escape_string($conection,$_POST['NO_EMPLEOS_IND']);
    $GIRO=mysqli_real_escape_string($conection,$_POST['GIRO']);
    $ACTIVIDAD=mysqli_real_escape_string($conection,$_POST['ACTIVIDAD']);
    $TIPO=mysqli_real_escape_string($conection,$_POST['TIPO']);
    $DIAS_HORARIOS=mysqli_real_escape_string($conection,$_POST['DIAS_HORARIOS']);
    $CORREO_ELECTRONICO=mysqli_real_escape_string($conection,$_POST['CORREO_ELECTRONICO']);
    $NO_TELEFONICO=mysqli_real_escape_string($conection,$_POST['NO_TELEFONICO']);
    $EVALUACIONES_TECNICAS= mysqli_real_escape_string($conection,$_POST['EVALUACIONES_TECNICAS']);
    $FECHA_ENTREGA=mysqli_real_escape_string($conection,$_POST['FECHA_ENTREGA']);
    $NO_HOJA_SEGURIDAD=mysqli_real_escape_string($conection,$_POST['NO_HOJA_SEGURIDAD']);
    $ESTADO_DUF=mysqli_real_escape_string($conection,$_POST['ESTADO_DUF']);
    $FEDEERATAS=mysqli_real_escape_string($conection,$_POST['FEDEERATAS']);
    $NO_CAJA=mysqli_real_escape_string($conection,$_POST['NO_CAJA']);
    $USUARIO_MODIFICACION=$_SESSION["user_name"];
    $FECHA_MODIFICACION=date("Y-m-d");
    $HORA_MODIFICACION=date("H:i:s");
    //---------------------------------------------------------
    $sql_insertar = "UPDATE dictamenes SET
    NO_EXPEDIENTE='".$NO_EXPEDIENTE."',
    NOMBRE_PROPIETARIO='".$NOMBRE_PROPIETARIO."',
    RAZON_SOCIAL='".$RAZON_SOCIAL."',
    DOMICILIO_CNENICOL='".$DOMICILIO_CNENICOL."',
    MUNICIPIO='".$MUNICIPIO."',
    CP='".$CP."',
    SUPERFICIE_TOTAL='".$SUPERFICIE_TOTAL."',
    SUPERFICIE_CONS='".$SUPERFICIE_CONS."',
    SUPERFICIE_USO='".$SUPERFICIE_USO."',
    TIPO_DUF='".$TIPO_DUF."',
    IMPACTO='".$IMPACTO."',
    NO_DUF_ANTERIOR='".$NO_DUF_ANTERIOR."',
    MONTO_INVERSION=$MONTO_INVERSION,
    NO_EMPLEOS_DIRECTOS=$NO_EMPLEOS_DIRECTOS,
    NO_EMPLEOS_IND=$NO_EMPLEOS_IND,
    GIRO='".$GIRO."',
    ACTIVIDAD='".$ACTIVIDAD."',
    TIPO='".$TIPO."',
    DIAS_HORARIOS='".$DIAS_HORARIOS."',
    CORREO_ELECTRONICO='".$CORREO_ELECTRONICO."',
    NO_TELEFONICO='".$NO_TELEFONICO."',
    EVALUACIONES_TECNICAS='".$EVALUACIONES_TECNICAS."',
    FECHA_ENTREGA='".$FECHA_ENTREGA."',
    NO_HOJA_SEGURIDAD='".$NO_HOJA_SEGURIDAD."',
    ESTADO_DUF='".$ESTADO_DUF."',
    FEDEERATAS='".$FEDEERATAS."',
    NO_CAJA='".$NO_CAJA."',
    USUARIO_MODIFICACION='".$USUARIO_MODIFICACION."',
    FECHA_MODIFICACION='".$FECHA_MODIFICACION."',
    HORA_MODIFICACION='".$HORA_MODIFICACION."' WHERE ID=$ID";

    echo "SQL: ".$sql_insertar;

   $resultado_insertar = mysqli_query($conection,$sql_insertar);
    if ($resultado_insertar === TRUE) {
        header ("Location: update_dictamen");
    }else {
        //header ("Location: Failure.php");
        printf("Errormessage: %s\n", mysqli_error($conection));
    }
}
    //---------------------------------------------------------
?>