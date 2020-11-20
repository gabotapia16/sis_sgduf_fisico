<?php 
$direccion="localhost";
$usuario="usuroot";
$contrasenia="Infbea57$";
$base_datos = "bd_sgduf_14_05_2020";
$conection = mysqli_connect($direccion, $usuario, $contrasenia,$base_datos);
header("Content-Type: text/html;charset=uft-8");
$acentos = $conection->query("SET NAMES 'utf8'");
?>


