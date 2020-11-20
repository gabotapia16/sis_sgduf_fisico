<!DOCTYPE html>
<html>
<head>
  <title>Usuarios</title>
     <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
         <link rel="shortcut icon" href="imagenes/sys.png" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
      
      if(!empty($_POST['dependencia'])) {
            $dependencia = $_POST['dependencia'];
            buscar($dependencia);
      }else{
        echo "<p align=center>DEBE SELECCIONAR la dependencia</p>";
      }

function buscar($dependencia) {
            include("../conection_bd.php");  //Conexion a la base de datos
            echo "
            <tr align=left>
              <td><p>
                    <select class='form-control' name='Organismo' id='Organismo' required>
                    <option value='' disabled selected>Selecciona el Organismo</option>";
                    $resultado = mysqli_query($conection,"SELECT DISTINCT ORGANISMO FROM dependencias WHERE DEPENDENCIA='$dependencia'");
                    while ($valores = mysqli_fetch_array($resultado)) { echo "<option value='$valores[ORGANISMO]'>$valores[ORGANISMO]</option>";}
                echo "</select>
              </p></td>
            </tr>";
            echo "
            <tr align=left>
              <td><p>
                    <select class='form-control' name='Unidad_adscripcion' id='Unidad_adscripcion' required>
                    <option value='' disabled selected>Unidad Administrativa:</option>";
                    $resultado = mysqli_query($conection,"SELECT DISTINCT UNIDAD_ADSCRIPCION FROM dependencias WHERE DEPENDENCIA='$dependencia'");
                    while ($valores = mysqli_fetch_array($resultado)) { echo "<option value='$valores[UNIDAD_ADSCRIPCION]'>$valores[UNIDAD_ADSCRIPCION]</option>";}
                echo "</select>
              </p></td>
            </tr>";
  }   
?>
</body>
</html>






               