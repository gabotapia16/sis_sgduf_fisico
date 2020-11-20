<?php
include("../segurity_session.php");
include("../conection_bd.php");
date_default_timezone_set('America/Mexico_City'); 
$ID_ENCRIPTADO = $_REQUEST['ID'];
$ID_DESENCRIPTADO = base64_decode($ID_ENCRIPTADO);
$resultado= mysqli_query($conection,"SELECT * FROM dictamenes where ID='$ID_DESENCRIPTADO'");
$numero_filas = mysqli_num_rows($resultado);
if ($numero_filas != 0) 
    {
      $datos = mysqli_fetch_assoc($resultado);
      //-----------------------------------------------

        $sql = mysqli_query($conection,"SELECT MAX(CONS_DUF) FROM dictamenes order by CONS_DUF desc");
    $contar = mysqli_num_rows($sql);
    if($contar == 0){echo "<p align=center>No hay datos</p>";}
    else{
        while($row=mysqli_fetch_array($sql))
        {$ID_DICTAMEN_SOLO=$row['MAX(CONS_DUF)']+1;}
        }
    $NO_CARACTERES= strlen($ID_DICTAMEN_SOLO);
    switch ($NO_CARACTERES) {
        case 1:
            $ID_DICTAMEN="0000".$ID_DICTAMEN_SOLO;
            break;
            case 2:
            $ID_DICTAMEN="000".$ID_DICTAMEN_SOLO;
            break;
            case 3:
            $ID_DICTAMEN="00".$ID_DICTAMEN_SOLO;
            break;
            case 4:
            $ID_DICTAMEN="0".$ID_DICTAMEN_SOLO;
            break;
            case 5:
            $ID_DICTAMEN="".$ID_DICTAMEN_SOLO;
            break;
    }

    $NUMERO_DUF = $datos['ID_MUNICIPIO']."-15-".$ID_DICTAMEN."-COFAEM-".$datos['ANIO_DICTAMEN'];
    $NUMERO_DUF_ENCRYPTED=base64_encode($NUMERO_DUF);
    $CONS_DUF=$ID_DICTAMEN;
    $FOLIO_DUF=$NUMERO_DUF;
    $FOLIO_DUF_ENCRYPTED=$NUMERO_DUF_ENCRYPTED;
    $FECHA_EXPEDICION=date("Y-m-d");

    $sql_modificar = "UPDATE dictamenes SET
    CONS_DUF=$ID_DICTAMEN_SOLO,
    FOLIO_DUF='".$FOLIO_DUF."',
    FOLIO_DUF_ENCRYPTED='".$FOLIO_DUF_ENCRYPTED."',
    ESTADO_DUF='GENERADO',
    FECHA_EXPEDICION='".$FECHA_EXPEDICION."',
    NO_HOJA_SEGURIDAD=$ID_DICTAMEN_SOLO
    WHERE ID=$ID_DESENCRIPTADO";

   $resultado_modificar = mysqli_query($conection,$sql_modificar);
    if ($resultado_modificar === TRUE) {
        header ("Location: generar_dictamenes");
    }else {
      printf("Errormessage: %s\n", mysqli_error($conection));
    }


      //-----------------------------------------------
    }
?>