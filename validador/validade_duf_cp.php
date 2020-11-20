<?php
include("../segurity_session.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>VALIDADOR COFAEM</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="imagenes/sys.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <table class="table">
                    <tr align="center">
                        <td><img alt="Brand" src="../imagenes/logo_edomex2.png" width="300" height="100"></td> 
                    </tr>
                    <tr>
                        <td><h3 align="center"><strong>VALIDADOR DEL DICTAMEN ÚNICO DE FACTIBILIDAD</h3></strong></td>
                    </tr>
                </table>
                <?php //MDQwLTE1LTAwMDAxLUNPRkFFTS0yMDIw
                include("../conection_bd.php");
                date_default_timezone_set('America/Mexico_City');
                /*$j='040-15-02940-COFAEM-2020';
                $k= base64_encode($j);
                echo "k: ".$k;*/
                $NUMERO_DUF_ENCRYPTADO = $_SESSION["numero_duf"];
                //$NUMERO_DUF_ENCRYPTADO ="MDQwLTE1LTAyOTQwLUNPRkFFTS0yMDIw";
                if ($NUMERO_DUF_ENCRYPTADO!="") {
                    $NUMERO_DUF_DESENCRYPTADO =  base64_decode($NUMERO_DUF_ENCRYPTADO);
                    $NUMERO_DUF=substr("$NUMERO_DUF_DESENCRYPTADO", 7,5);
                    if ($NUMERO_DUF <= "02939") {
                        // CONSULTA TABLA DE DICTAMENES
                        $sql = mysqli_query($conection,"SELECT * FROM dictamenes WHERE FOLIO_DUF_ENCRYPTED='$NUMERO_DUF_ENCRYPTADO'");
                        $num_rows = mysqli_num_rows($sql);
                        if($num_rows == 0){
                        ?>
                            <table class="table">
                            <tr bgcolor="red" align="center">
                                <td colspan=2>
                                    <table border="0">
                                        <tr>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                            <td><font color="white"><h4 align="center">DICTAMEN NO ENCONTRADO</h4></font></td>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <?php
                        }else{
                            //*********************
                            while($row=mysqli_fetch_array($sql))
                        {
                           
                            $PROPIETARIO = $row['NOMBRE_PROPIETARIO'];
                            $DENOMINACION = $row['RAZON_SOCIAL'];
                            $SUPERFICIE_TOTAL = $row['SUPERFICIE_TOTAL'];
                            $SUPERFICIE_CONSTRUIDA = $row['SUPERFICIE_CONS'];
                            $SUPERFICIE_USO=$row['SUPERFICIE_USO'];
                            $DOMICILIO = $row['DOMICILIO_CNENICOL'];
                            $DOMICILIO_MUNICIPIO = $row['MUNICIPIO'];
                            $DOMICILIO_CP = $row['CP'];
                            $NUMERO_DUF = $row['FOLIO_DUF'];
                            $TIPO = $row['TIPO'];
                            $GIRO= $row['GIRO'];
                            $ACTIVIDAD= $row['ACTIVIDAD'];
                            $DIAS_HORARIOS= $row['DIAS_HORARIOS'];
                            $EVALUACIONES= $row['EVALUACIONES_TECNICAS'];
                            $FEDEERRATAS= $row['FEDEERATAS'];
                            $FECHA_EXPEDICION= $row['FECHA_EXPEDICION'];
                            $FECHA_ENTREGA= $row['FECHA_ENTREGA'];

                            ?>
                             <table class="table" >
                                        <tr bgcolor="GREEN" align="center">
                                            <td>
                                                <table border="0">
                                                    <tr>
                                                        <td><img src="../imagenes/correcto.png" width="50" heigth="50"></td>
                                                        <td><font color="white"><h4 align="center">DICTAMEN VÁLIDO</h4></font></td>
                                                        <td><img src="../imagenes/correcto.png" width="50" heigth="50"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </table>
                                        <table class="table table-striped"> 
                                        </tr>
                                        
                                        <tr>
                                            <td><p><strong>DENOMINACIÓN:</p></strong><h3 align="center"><?php echo $DENOMINACION; ?></h3></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>NÚMERO DE DUF:</p></strong><h4 align="center"><?php echo $NUMERO_DUF; ?></h4></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>TIPO:</p></strong><h4 align="center"><?php echo $TIPO; ?></h4></td>
                                        </tr>

                                        <tr>
                                            <td><p><strong>EVALUACIONES OBTENIDAS:</p></strong><h4 align="center"><?php echo $EVALUACIONES; ?></h4></td>
                                        </tr>
                                    </table>
                            <?php  

                        }
                            //*********************
                        }
                    }else{
                        // CONSULTA TABLA DE EMISION
                        $sql=mysqli_query($conection,"SELECT dt.id as id_general, pi.id as id_procedencia, em.id as id_emision, dt.nombre_propietario, dt.deno_proyecto, dt.sfc_total, dt.sfc_construida, dt.sfc_prevista_cosnt, dt.domicilio_proyecto, dt.cp_proyecto, dt.municipio_proyecto, em.folio_duf, em.tipo_duf, dt.materia, dt.giro, dt.descripcion_general, em.dias_horarios, pi.ma_SLD, pi.ma_DEC, pi.ma_MAM, pi.ma_DUM, pi.ma_PCL, pi.ma_VLD, pi.ma_MOV, pi.ma_ADA, pi.ma_FTL, em.fecha_expedicion, em.fecha_entrega, em.fedeerratas, em.fecha_elaboracion_fedeerratas FROM datos_generales dt
                            INNER JOIN procedencia_integracion pi ON dt.id = pi.id_datos_generales
                            INNER JOIN usuarios us ON us.ID_USER = pi.usuario_turna_utic
                            INNER JOIN emision em ON em.id_procedencia = pi.id
                            where em.folio_encrypted='$NUMERO_DUF_ENCRYPTADO'"); 
                        $num_rows = mysqli_num_rows($sql);
                        if($num_rows == 0){
                        ?>
                            <table class="table">
                            <tr bgcolor="red" align="center">
                                <td colspan=2>
                                    <table border="0">
                                        <tr>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                            <td><font color="white"><h4 align="center">DICTAMEN NO ENCONTRADO</h4></font></td>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <?php
                    }else{
                        //************************************************
                        while($row=mysqli_fetch_array($sql))
                        {
                           
                            $PROPIETARIO = $row['nombre_propietario'];
                            $DENOMINACION = $row['deno_proyecto'];
                            $SUPERFICIE_TOTAL = $row['sfc_total'];
                            $SUPERFICIE_CONSTRUIDA = $row['sfc_construida'];
                            $SUPERFICIE_USO=$row['sfc_prevista_cosnt'];
                            $DOMICILIO = $row['domicilio_proyecto'];
                            $DOMICILIO_MUNICIPIO = $row['municipio_proyecto'];
                            $DOMICILIO_CP = $row['cp_proyecto'];
                            $NUMERO_DUF = $row['folio_duf'];
                            $TIPO = $row['tipo_duf'];
                            $GIRO= $row['giro'];
                            $ACTIVIDAD= $row['descripcion_general'];
                            $DIAS_HORARIOS= $row['dias_horarios'];
                            //******************************************
                                $ma_SLD=$row['ma_SLD'];
                                $ma_DEC=$row['ma_DEC'];
                                $ma_MAM=$row['ma_MAM'];
                                $ma_DUM=$row['ma_DUM'];
                                $ma_PCL=$row['ma_PCL'];
                                $ma_VLD=$row['ma_VLD'];
                                $ma_MOV=$row['ma_MOV'];
                                $ma_ADA=$row['ma_ADA'];
                                $ma_FTL=$row['ma_FTL'];
                                $EVALUACIONES_TECNICAS="";
                                if ($ma_SLD==1){$EVALUACIONES_TECNICAS="IMPACTO SANITARIO, ";}
                                if ($ma_DEC==1){
                                    $EVALUACIONES_TECNICAS= $EVALUACIONES_TECNICAS ."". "DESARROLLO ECONÓMICO, ";}
                                if ($ma_MAM==1){$EVALUACIONES_TECNICAS=$EVALUACIONES_TECNICAS ."". "MEDIO AMBIENTE, ";}
                                if ($ma_DUM==1){$EVALUACIONES_TECNICAS=$EVALUACIONES_TECNICAS ."". "DESARROLLO URBANO Y METROPOLITANO, ";}
                                if ($ma_PCL==1){$EVALUACIONES_TECNICAS=$EVALUACIONES_TECNICAS ."". "PROTECCIÓN CIVIL, ";}
                                if ($ma_VLD==1){$EVALUACIONES_TECNICAS=$EVALUACIONES_TECNICAS ."". "COMUNICACIONES, ";}
                                if ($ma_MOV==1){$EVALUACIONES_TECNICAS=$EVALUACIONES_TECNICAS ."". "MOVILIDAD, ";}
                                if ($ma_ADA==1){$EVALUACIONES_TECNICAS=$EVALUACIONES_TECNICAS ."". "AGUA, DRENAJE, ALCANTARILLADO Y TRATAMIENTO DE AGUAS RESIDUALES, ";}
                                if ($ma_FTL==1){$EVALUACIONES_TECNICAS=$EVALUACIONES_TECNICAS ."". "TRASFORMACIÓN FORESTAL, ";}
                                $EVALUACIONES_TECNICAS_SIN_COMA = substr($EVALUACIONES_TECNICAS, 0,-2);
                            //******************************************
                            $FEDEERRATAS= $row['fedeerratas'];
                            $FECHA_FEDEERRATAS= $row['fecha_elaboracion_fedeerratas'];
                            $FECHA_EXPEDICION= $row['fecha_expedicion'];
                            $FECHA_ENTREGA= $row['fecha_entrega'];

                            ?>
                             <table class="table" >
                                        <tr bgcolor="GREEN" align="center">
                                            <td>
                                                <table border="0">
                                                    <tr>
                                                        <td><img src="../imagenes/correcto.png" width="50" heigth="50"></td>
                                                        <td><font color="white"><h4 align="center">DICTAMEN VÁLIDO</h4></font></td>
                                                        <td><img src="../imagenes/correcto.png" width="50" heigth="50"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </table>
                                        <table class="table table-striped"> 
                                        </tr>
                                       
                                        <tr>
                                            <td><p><strong>DENOMINACIÓN:</p></strong><h3 align="center"><?php echo $DENOMINACION; ?></h3></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>DOMICILIO:</p></strong><h4 align="center"><?php echo $DOMICILIO; ?></h4> <h4 align="center"><?php echo "C.P. ".$DOMICILIO_CP; ?></h4></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>MUNICIPIO:</p></strong><h4 align="center"><?php echo $DOMICILIO_MUNICIPIO; ?></h4></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>NÚMERO DE DUF:</p></strong><h4 align="center"><?php echo $NUMERO_DUF; ?></h4></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>TIPO:</p></strong><h4 align="center"><?php echo $TIPO; ?></h4></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>EVALUACIONES OBTENIDAS:</p></strong><h4 align="center"><?php echo $EVALUACIONES_TECNICAS_SIN_COMA; ?></h4></td>
                                        
                                    </table>
                            <?php  
                        }
                        //************************************************
                    }
                }
                }else{
                    ?>
                    <table class="table">
                            <tr bgcolor="red" align="center">
                                <td colspan=2>
                                    <table border="0">
                                        <tr>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                            <td><font color="white"><h4 align="center">DICTAMEN NO ENCONTRADO</h4></font></td>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                <?php
                }
                ?>
