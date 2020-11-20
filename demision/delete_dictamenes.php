<?php
    include("../segurity_session.php");
    include("../conection_bd.php");
	date_default_timezone_set('America/Mexico_City'); 
    $ID_ENCRIPTADO = $_REQUEST['ID'];
    $ID_DESENCRIPTADO = base64_decode($ID_ENCRIPTADO);
    $consulta = "DELETE FROM dictamenes WHERE ID=$ID_DESENCRIPTADO";
        if(mysqli_query($conection, $consulta)){
            header ("Location: update_dictamen");
        } else{
            printf("Errormessage: %s\n", mysqli_error($conection));
        }
?>