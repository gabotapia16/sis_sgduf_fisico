<?php
include("../segurity_session.php");
include("../conection_bd.php");
?>
<html>
	<head>
		<title>Dictamenes</title>
     <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
         <link rel="shortcut icon" href="imagenes/sys.png" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
           $(document).ready(function () { $("#boton").click(function () {if ($("#tabla_new_user").is(":visible")) {document.getElementById("tabla_new_user").style.display = 'none';}else {document.getElementById("tabla_new_user").style.display = '';}});});
        </script>

    <script>
            function confirmar1(){if(confirm('¿Estas seguro de generar el dictamen?')){return true;}else{return false;}}
    </script>

    <script>
            function confirmar2(){if(confirm('¿Estas seguro de eliminar el dictamen?')){return true;}else{return false;}}
    </script>

	</head>
	<body>
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <img alt="Brand" src="../imagenes/sys.png" width="40" height="40">
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
            <div class="panel-heading"><p align="center">Captura Dictamenes</p></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                
                  
            </div>
          </div>
         </div>
        <?php 
        $contar_acuerdo = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'CAPTURADO' and TIPO_DUF='ACUERDO'"));
        $contar_normal = mysqli_num_rows (mysqli_query($conection,"SELECT * FROM dictamenes where ESTADO_DUF = 'CAPTURADO' and TIPO_DUF='NORMAL'"));
        //------------------------------------------------------
        $queryid = "SELECT MAX(FECHA_MODIFICACION) AS FECHA_MODIFICACION FROM dictamenes";
        $res= mysqli_query($conection,$queryid);
        $datos = mysqli_fetch_assoc($res);
        $fecha_mayor= $datos['FECHA_MODIFICACION'];
        //------------------------------------------------------
             
        $sql = mysqli_query($conection,"SELECT * FROM dictamenes ORDER BY TIPO_DUF");
        $contar = mysqli_num_rows($sql);
        if($contar == 0){echo "<p align=center>No hay datos</p>";}
        else{
              echo "
                <div class=table-responsive>
                    <table class=table>
                      <tr>
                           <td align=left><p>Fecha de ultima modificacion:$fecha_mayor</h3></td>
                           <td colspan=2><div name=Resultado_SQL id=Resultado_SQL></div></td>
                      </tr>
                      </table>
                 </div>";
                 echo " 
                  <div class=table-responsive>
                        <table class='table'>
                            <tr align=center>
                              <td colspan='3' align=center><h3>REGISTROS EN PROCESO PARA EMISIÓN DE DUF</h3</td>
                            </tr>
                            <tr align=center>
                              <td  width='25%'><h3>Dictamenes *Acuerdo*: $contar_acuerdo</h3></td>
                              <td  width='25%'><h3>Dictamenes *Normal*: $contar_normal</h3></td>
                            </tr>
                            <tr align=center>
                              <td  width='25%' class='info'></td>
                              <td  width='25%' class='success'></td>
                            </tr>
                         </table></div>
                    <div class=table-responsive>     
                   <table class=table>
                     <tr>
                         <th><h6 align=center>NO. CONSECUTIVO</h6></th>
                         <th><h6 align=center>TIPO DE DUF</h6></th>
                         <th><h6 align=center>TIPO DE IMPACTO</h6></th>
                         <th><h6 align=center>NO. EXPEDIENTE</h6></th>
                         <th><h6 align=center>PROPIETARIO / RAZÓN SOCIAL</h6></th>
                         <th><h6 align=center>DOMICILIO</h6></th>
                         <th><h6 align=center>SUPERFICIE TOTAL</h6></th>
                         <th><h6 align=center>SUPERFICIE CONSTRUIDA</h6></th>
                         <th><h6 align=center>TIPO/GIRO/ACTIVIDAD</h6></th>
                         <th><h6 align=center>EVALUACIONES TECNICAS</h6></th>
                         <th><h6 align=center>DIAS Y HORARIOS DE FUNCIONAMIENTO</h6></th>
                         <th><h6 align=center>MONTO DE INVERSION</h6></th>
                         <th><h6 align=center>EMPLEOS DIRECTOS</h6></th>
                         <th><h6 align=center>EMPLEOS INDIRECTOS</h6></th>
                         <th><h6 align=center>VISTA PREVIA</h6></th>
                    </tr>";
           

            
              while($row=mysqli_fetch_array($sql))
              {
                switch ($row['ESTADO_DUF']) {
                  case 'CAPTURADO':
                      switch ($row['TIPO_DUF']) {
                                case 'NORMAL':
                                  echo "<tr align=center class='success'>
                                  <td><h6>".$row['CONS_DUF']."</h6></td>
                                  <td><h6>".$row['TIPO_DUF']."</h6></td>";
                                  if ($row["IMPACTO"] == 'ALTO IMPACTO'){echo "<td class='danger'><h6>".$row['IMPACTO']."</h6></td>";}else{echo "<td class='warning'><h6>".$row['IMPACTO']."</h6></td>";}
                                  echo "<td><h6>".$row['NO_EXPEDIENTE']."</h6></td> 
                                  <td><h6>".$row['NOMBRE_PROPIETARIO']." / ".$row['RAZON_SOCIAL']."</h6></td>
                                  <td><h6>".$row['DOMICILIO_CNENICOL']." ".$row['MUNICIPIO'].", ESTADO DE MEXICO, C.P. ".$row['CP']."</h6></td>
                                  <td><h6>".$row['SUPERFICIE_TOTAL']."</h6></td>
                                  <td><h6>".$row['SUPERFICIE_CONS']."</h6></td>
                                  <td><h6>".$row['TIPO']." / ".$row['GIRO']." ".$row['ACTIVIDAD']."</h6></td>
                                  <td><h6>".$row['EVALUACIONES_TECNICAS']."</h6></td>
                                  <td><h6>".$row['DIAS_HORARIOS']."</h6></td>
                                  <td><h6>".$row['MONTO_INVERSION']."</h6></td>
                                  <td><h6>".$row['NO_EMPLEOS_DIRECTOS']."</h6></td>
                                  <td><h6>".$row['NO_EMPLEOS_IND']."</h6></td>";
                                  echo "<td><a href="."show_data_dictamenvp?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-eye-open'></span></button></a></td>";
                                  
                          echo "</tr>";
                          break;
                        
                       case 'ACUERDO':
                                  echo "<tr align=center class='info'>
                                  <td><h6>".$row['CONS_DUF']."</h6></td>
                                  <td><h6>".$row['TIPO_DUF']."</h6></td>";
                                  if ($row["IMPACTO"] == 'ALTO IMPACTO'){echo "<td class='danger'><h6>".$row['IMPACTO']."</h6></td>";}else{echo "<td class='warning'><h6>".$row['IMPACTO']."</h6></td>";}
                                  echo "<td><h6>".$row['NO_EXPEDIENTE']."</h6></td> 
                                  <td><h6>".$row['NOMBRE_PROPIETARIO']." / ".$row['RAZON_SOCIAL']."</h6></td>
                                  <td><h6>".$row['DOMICILIO_CNENICOL']." ".$row['MUNICIPIO'].", ESTADO DE MEXICO, C.P. ".$row['CP']."</h6></td>
                                  <td><h6>".$row['SUPERFICIE_TOTAL']."</h6></td>
                                  <td><h6>".$row['SUPERFICIE_CONS']."</h6></td>
                                  <td><h6>".$row['TIPO']." / ".$row['GIRO']." ".$row['ACTIVIDAD']."</h6></td>
                                  <td><h6>".$row['EVALUACIONES_TECNICAS']."</h6></td>
                                  <td><h6>".$row['DIAS_HORARIOS']."</h6></td>
                                  <td><h6>".$row['MONTO_INVERSION']."</h6></td>
                                  <td><h6>".$row['NO_EMPLEOS_DIRECTOS']."</h6></td>
                                  <td><h6>".$row['NO_EMPLEOS_IND']."</h6></td>";
                                  echo "<td><a href="."show_data_dictamenvp?ID=".base64_encode($row['ID'])."><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-eye-open'></span></button></a></td>";
                                  
                          echo "</tr>";
                          break;
                      }
                  break;
                  
                }

              }

             
              }
            ?>   

        
</head> 
    </body>
</html>

  