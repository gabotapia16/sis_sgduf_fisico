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
                        <td><h3 align="center"><strong>VALIDADOR DE DOCUMENTOS</h3></strong></td>
                    </tr>
                </table>


                <?php
                include("../conection_bd.php");
                date_default_timezone_set('America/Mexico_City');
                $NUMERO_GAFETE = $_SESSION["numero_duf"];
                if ($NUMERO_GAFETE != '') 
                {
                    $sql = mysqli_query($conection,"SELECT * FROM documentos WHERE clave_encrypted='$NUMERO_GAFETE'");
                    $num_rows = mysqli_num_rows($sql);
                    if($num_rows == 0)
                    {
                    ?>
                        <table class="table">
                            <tr bgcolor="red" align="center">
                                <td colspan=2>
                                    <table border="0">
                                        <tr>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                            <td><font color="white"><h4 align="center">DOCUMENTO NO REGISTRADO</h4></font></td>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                <?php  }
                    else{

                        while($row=mysqli_fetch_array($sql))
                        {
                            $fecha_emision=$row['fecha_emision'];
                            $date=date_create($fecha_emision);
                            $no_oficio=$row['no_oficio'];
                            $asunto=$row['asunto'];
                            $remitente=$row['remitente'];
                            $cargo=$row['cargo'];
                            $tipo_doc=$row['tipo_doc'];
                            $no_fojas=$row['no_fojas'];
                            $usuario_elaboro=$row['usuario_elaboro'];


                            
                        ?>
                             <table class="table" >
                                        <tr bgcolor="GREEN" align="center">
                                            <td>
                                                <table border="0">
                                                    <tr>
                                                        <td><img src="../imagenes/correcto.png" width="50" heigth="50"></td>
                                                        <td><font color="white"><h4 align="center">DOCUMENTO VÁLIDO</h4></font></td>
                                                        <td><img src="../imagenes/correcto.png" width="50" heigth="50"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </table>
                                        <table class="table table-striped"> 
                                        </tr>
                                        <tr>
                                            <td><p><strong>TIPO DE DOCUMENTO:</p></strong><h2 align="center"><?php echo $tipo_doc; ?></h2></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>FECHA DE EMISIÓN:</p></strong><h3 align="center"><?php echo  date_format($date,"d/m/Y");?></h3></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>NO. DE OFICIO:</p></strong><h3 align="center"><?php echo $no_oficio; ?></h3></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>ASUNTO:</p></strong><h3 align="center"><?php echo $asunto; ?></h3></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>REMITENTE:</p></strong><h3 align="center"><?php echo $remitente; ?></h3></td>
                                        </tr>
                                        <tr>
                                            <td><p><strong>CARGO:</p></strong><h3 align="center"><?php echo $cargo; ?></h3></td>
                                        </tr> 
                                        <tr>
                                            <td><p><strong>NÚMERO DE FOJAS QUE CONTIENE:</p></strong><h3 align="center"><?php echo $no_fojas; ?></h3></td>
                                        </tr> 
                                         <tr>
                                            <td><p><strong>PERSONAL QUE ELABORÓ:</p></strong><h3 align="center"><?php echo $usuario_elaboro; ?></h3></td>
                                        </tr>                                     
                                    </table>
                            <?php  

                        }

                    }
                }
                else{
                    $NUMERO_GAFETE="";
                    ?>
                    <table class="table">
                            <tr bgcolor="red" align="center">
                                <td colspan=2>
                                    <table border="0">
                                        <tr>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                            <td><font color="white"><h4 align="center">DOCUMENTO NO REGISTRADO</h4></font></td>
                                            <td><img src="../imagenes/error.gif" width="50" heigth="50"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                <?php }

                ?>

<?php
        ?>
</body>
</html>

