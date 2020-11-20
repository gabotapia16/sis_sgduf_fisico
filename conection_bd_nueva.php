<?php 
$direccion="localhost";
$usuario="usuroot";
$contrasenia="Infbea57$";
$base_datos = "sg_duf";
$conection_nueva = mysqli_connect($direccion, $usuario, $contrasenia,$base_datos);
header("Content-Type: text/html;charset=uft-8");
$acentos = $conection_nueva->query("SET NAMES 'utf8'");
?>


