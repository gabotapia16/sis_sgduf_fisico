<?php 
    include("../segurity_session.php");
    include("../conection_bd.php");
    date_default_timezone_set('America/Mexico_City');
if(isset($_POST['enviar'])){
    if(!empty($_POST['MATERIAS'])) {
        $MATERIAS="";
        $MATERIAS = implode(", ", $_POST['MATERIAS']);
    }
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
    $GIRO=$_POST["GIRO"];
    $MATERIA=mysqli_real_escape_string($conection,$_POST["id_selectMateria"]);
    $ACTIVIDAD=mysqli_real_escape_string($conection,$_POST['ACTIVIDAD']);

    $TIPO=mysqli_real_escape_string($conection,$_POST['TIPO']);
    $EVALUACIONES_TECNICAS= $MATERIAS;
    $DIAS_HORARIOS=mysqli_real_escape_string($conection,$_POST['DIAS_HORARIOS']);
    $CORREO_ELECTRONICO=mysqli_real_escape_string($conection,$_POST['CORREO_ELECTRONICO']);
    $NO_TELEFONICO=mysqli_real_escape_string($conection,$_POST['NO_TELEFONICO']);
    $MONTO_INVERSION=mysqli_real_escape_string($conection,$_POST['MONTO_INVERSION']);
    $NO_EMPLEOS_DIRECTOS=mysqli_real_escape_string($conection,$_POST['NO_EMPLEOS_DIRECTOS']);
    $NO_EMPLEOS_IND=mysqli_real_escape_string($conection,$_POST['NO_EMPLEOS_IND']);
    $fecha_resolucion=mysqli_real_escape_string($conection,$_POST['fecha_resolucion']);
    $no_oficio_resolucion=mysqli_real_escape_string($conection,$_POST['no_oficio_resolucion']);
    //---------------------------------------------------------
    $sql = mysqli_query($conection,"SELECT NOMENCLATURA, MUNICIPIO FROM municipios WHERE MUNICIPIO = '$MUNICIPIO'");
    $contar = mysqli_num_rows($sql);
    if($contar == 0){echo "<p align=center>No hay datos</p>";}
    else{
        while($row=mysqli_fetch_array($sql))
        {$ID_MUNICIPIO=$row['NOMENCLATURA'];}
        }
    $ANIO_ACTUAL=date("Y");
    //---------------------------------------------------------
    $ID_MUNICIPIO= $ID_MUNICIPIO;
    $ENTIDAD="15";
    $ANIO_DICTAMEN=$ANIO_ACTUAL;
    //$FECHA_EXPEDICION=mysqli_real_escape_string($conection,$_POST['FECHA_EXPEDICION']);
    $ESTADO_DUF="CAPTURADO";
    $USUARIO_CAPTURA=$_SESSION["user_name"];
    $FECHA_CAPTURA=date("Y-m-d");
    $HORA_CAPTURA=date("H:i:s");
    //---------------------------------------------------------
    if ($EVALUACIONES_TECNICAS == ""){
            $EVALUACIONES_TECNICAS = "NO SE SELECCIONARON MATERIAS EN LA CAPTURA DEL USUARIO: ". $USUARIO_CAPTURA;
    }

    $sql_insertar = "INSERT INTO dictamenes (NO_EXPEDIENTE,NOMBRE_PROPIETARIO,RAZON_SOCIAL,DOMICILIO_CNENICOL,MUNICIPIO,CP,SUPERFICIE_TOTAL,SUPERFICIE_CONS,TIPO_DUF,IMPACTO,NO_DUF_ANTERIOR,GIRO,ACTIVIDAD,TIPO,EVALUACIONES_TECNICAS,DIAS_HORARIOS,CORREO_ELECTRONICO,NO_TELEFONICO,MONTO_INVERSION,NO_EMPLEOS_DIRECTOS,NO_EMPLEOS_IND,ID_MUNICIPIO,ENTIDAD,ANIO_DICTAMEN,ESTADO_DUF,USUARIO_CAPTURA,FECHA_CAPTURA,HORA_CAPTURA,MATERIA, SUPERFICIE_USO, FECHA_RESOLUCION, NO_OFICIO_RESOLUCION) VALUES ('".$NO_EXPEDIENTE."','".$NOMBRE_PROPIETARIO."','".$RAZON_SOCIAL."','".$DOMICILIO_CNENICOL."','".$MUNICIPIO."','".$CP."','".$SUPERFICIE_TOTAL."','".$SUPERFICIE_CONS."','".$TIPO_DUF."','".$IMPACTO."','".$NO_DUF_ANTERIOR."','".$GIRO."','".$ACTIVIDAD."','".$TIPO."','".$EVALUACIONES_TECNICAS."','".$DIAS_HORARIOS."','".$CORREO_ELECTRONICO."','".$NO_TELEFONICO."','".$MONTO_INVERSION."','".$NO_EMPLEOS_DIRECTOS."','".$NO_EMPLEOS_IND."','".$ID_MUNICIPIO."','".$ENTIDAD."','".$ANIO_DICTAMEN."','".$ESTADO_DUF."','".$USUARIO_CAPTURA."','".$FECHA_CAPTURA."','".$HORA_CAPTURA."','".$MATERIA."','".$SUPERFICIE_USO."','".$fecha_resolucion."','".$no_oficio_resolucion."')";

    $resultado_insertar = mysqli_query($conection,$sql_insertar);
    if ($resultado_insertar === TRUE) {
        header ("Location: ../menu_emision");
    }else {
        //header ("Location: Failure.php");
        printf("Errormessage: %s\n", mysqli_error($conection));
    }
    //---------------------------------------------------------
}
    
?>






















