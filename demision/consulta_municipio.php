<?php
include("../segurity_session.php");
include("../conection_bd.php");
$municipio = $_POST['municipio1'];
$sql       = mysqli_query($conection, "SELECT COUNT(TIPO_DUF) AS TOTAL_TIPO_DUF, TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS FROM dictamenes  WHERE MUNICIPIO='$municipio' AND CONS_DUF > 0 GROUP BY TIPO_DUF, IMPACTO, EVALUACIONES_TECNICAS");

$jsondata                        = array();
$jsondata["impactoSanitario"]    = 0;
$jsondata["altoRiesgo"]          = 0;
$jsondata["desarrolloEconomico"] = 0;
foreach ($sql as $fila) {
    if ($fila['IMPACTO'] === 'ALTO IMPACTO') {
        $jsondata["altoRiesgo"] = $fila['TOTAL_TIPO_DUF'] + $jsondata["altoRiesgo"];
    } else if ($fila['EVALUACIONES_TECNICAS'] === 'IMPACTO SANITARIO') {
        //else if ($fila['EVALUACIONES_TECNICAS '] == 'IMPACTO SANITARIO') {
        $jsondata["impactoSanitario"] = $fila['TOTAL_TIPO_DUF'] + $jsondata["impactoSanitario"];
    } else if ($fila['EVALUACIONES_TECNICAS'] === 'DESARROLLO ECONOMICO') {
        $jsondata["desarrolloEconomico"] = $jsondata["desarrolloEconomico"] + $fila['TOTAL_TIPO_DUF'];
    }
}

echo json_encode($jsondata);
