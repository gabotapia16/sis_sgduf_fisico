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
        {$ID_DICTAMEN_SOLO=$row['MAX(CONS_DUF)'];}
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

    $NUMERO_DUF = $datos['ID_MUNICIPIO'] ."-15-".$ID_DICTAMEN."-COFAEM-".$datos['ANIO_DICTAMEN'];
    $NUMERO_DUF_ENCRYPTED=base64_encode($NUMERO_DUF);
    $CONS_DUF=$ID_DICTAMEN;
    $FOLIO_DUF=$NUMERO_DUF;
    $FOLIO_DUF_ENCRYPTED=$NUMERO_DUF_ENCRYPTED;
    $FECHA_EXPEDICION=date("Y-m-d");

    /*$sql_modificar = "UPDATE dictamenes SET
    CONS_DUF=$ID_DICTAMEN_SOLO,
    FOLIO_DUF='".$FOLIO_DUF."',
    FOLIO_DUF_ENCRYPTED='".$FOLIO_DUF_ENCRYPTED."',
    ESTADO_DUF='GENERADO',
    FECHA_EXPEDICION='".$FECHA_EXPEDICION."',
    NO_HOJA_SEGURIDAD=$ID_DICTAMEN_SOLO
    WHERE ID=$ID_DESENCRIPTADO";*/

  /* $resultado_modificar = mysqli_query($conection,$sql_modificar);
    if ($resultado_modificar === TRUE) {
    }else {
      //header ("Location: Failure.php");
      printf("Errormessage: %s\n", mysqli_error($conection));
    }*/


      //-----------------------------------------------
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
          <p class="navbar-brand">Sistema de Gestion del Dictamen Único de Factibilidad</p>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="../menu_emision">Menu principal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../close_session.php"><span class="glyphicon glyphicon-log-in"></span>   Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><p align="center">VISTA PREVIA DEL DUF</p></div>
            <div class="panel-body">
                <table class="table">
                  <tr>
                    <td colspan="2">NOMBRE COMPLETO DEL PROPIETARIO / DENOMINACIÓN O RAZÓN SOCIAL:</td>
                  </tr>
                  <tr>
                    <?php 
                      if ($datos['RAZON_SOCIAL']=="") {
                      ?>
                        <td colspan=2><strong><?php echo $datos['NOMBRE_PROPIETARIO'] ." ". $datos['RAZON_SOCIAL'];?></strong></td>
                      <?php
                    }else{
                      ?>
                        <td colspan=2><strong><?php echo $datos['NOMBRE_PROPIETARIO'] ." / ". $datos['RAZON_SOCIAL'];?></strong></td>
                      <?php
                      }
                     ?>
                  </tr>
                  <tr>
                    <td colspan="2">DOMICILIO DE LA OBRA, UNIDAD ECONÓMICA, INVERSIÓN O PROYECTO:</td>
                  </tr>
                  <tr>
                    <?php 
                      if ($datos['CP']=="") {
                      ?>
                        <td colspan="2"><strong><?php echo $datos['DOMICILIO_CNENICOL'] .", ". $datos['MUNICIPIO'].", ESTADO DE MEXICO";?></strong></td>
                      <?php
                    }else{
                      ?>
                       <td colspan="2"><strong><?php echo $datos['DOMICILIO_CNENICOL'].", C.P. ". $datos['CP'] . ", ". $datos['MUNICIPIO'] .", ESTADO DE MEXICO ";?></strong></td>
                      <?php
                      }
                     ?>
                  </tr>
                  <tr>
                    <td>SUPERFICIE TOTAL:</td>
                    <td>SUPERFICIE CONSTRUIDA:</td>
                    
                  </tr>
                  <tr>
                    <td><strong><?php echo $datos['SUPERFICIE_TOTAL'];?></strong></td>
                    <td><strong><?php echo $datos['SUPERFICIE_CONS'];?></strong></td>
                    
                  </tr>
                  <tr>
                    <td>SUPERFICIE EN USO:</td>
                  </tr>
                  <tr>
                    <td><strong><?php echo $datos['SUPERFICIE_USO'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">NÚMERO DE DICTAMEN:</td>
                  </tr>
                  <tr align="center">
                    <td colspan="2"><strong><h1><?php echo $NUMERO_DUF;?></h1></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">GIRO O ACTIVIDAD:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['TIPO'] ." / ". $datos['GIRO'] ." ". $datos['ACTIVIDAD'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">DÍAS Y HORARIOS DE FUNCIONAMIENTO:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['DIAS_HORARIOS'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">EVALUACIONES TECNICAS DE FACTIBILIDAD:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $datos['EVALUACIONES_TECNICAS'];?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">FECHA DE EXPEDICIÓN:</td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong><?php echo $FECHA_EXPEDICION?></strong></td>
                  </tr>
                  <tr><td><br><br><br><br></td></tr>
                  <tr align="center">
                    <td>RESPONSABLE DE LA CAPTURA</td>
                    <td>RESPONSABLE LA AUTORIZACIÓN</td>
                  </tr>
                  <tr align="center">
                    <td><br>______________________</td>
                    <td><br>______________________</td>
                  </tr>
                  <tr align="center">
                    <td><strong><?php echo $datos['USUARIO_CAPTURA'];?></strong></td>
                    <?php if ($datos['TIPO_DUF'] == 'NORMAL'){
                    ?>  <td><strong>LIC. CLAUDIA BERENICE MILLÁN SILVA</strong></td>
                    <?php 
                      } else {
                    ?>  <td><strong>LIC. JESUS GUADALUPE BRAVO MARTINEZ</strong></td>
                    <?php
                      }
                    ?>
                  </tr>
                  <tr><td><br><br><br><br></td></tr>
                  <tr align="center">
                    <td><strong>FECHA:<?php echo(date("d-m-y") )?> </strong></td>
                  </tr>
                </table>
                
            </div>
        </div>
    </div>
        
        
</body>
</html>