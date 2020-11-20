<?php 
include '../conection_bd.php';
sleep(1);
if (isset($_POST['numeroExpediente'])) {
    $numeroExpediente = (string)$_POST['numeroExpediente'];
    
    $result = $conection->query(
        "SELECT * FROM datos_generales WHERE no_expediente = '$numeroExpediente'"
    );
    
    if ($result->num_rows > 0) {
        $datos = mysqli_fetch_assoc($result);
        if ($datos['tipo_DUF']=='ACUERDO') {
            echo '<div class="alert alert-danger"><strong>!A T E N C I Ó N!</strong> El número de expediente podria ya existir en la base de datos por ACUERDO.</div>';
        }
        else{
            echo '<div class="alert alert-danger"><strong>!A T E N C I Ó N!</strong> El número de expediente podria ya existir en la base de datos en E1.</div>';
        }
        
    } else {
        echo '<div class="alert alert-success"><strong>!P E R F E C T O!</strong> El número de expediente no existe en la base de datos.</div>';
    }
}

if (isset($_POST['nombreCompleto'])) {
    $nombreCompleto = (string)$_POST['nombreCompleto'];
    
    $result = $conection->query(
        "SELECT * FROM datos_generales WHERE nombre_propietario = '$nombreCompleto'"
    );
    
    if ($result->num_rows > 0) {
        $datos = mysqli_fetch_assoc($result);
        if ($datos['tipo_DUF']=='ACUERDO') {
            echo '<div class="alert alert-danger"><strong>!A T E N C I Ó N!</strong> El nombre del propietario podria ya existir en la base de datos por ACUERDO.</div>';
        }
        else{
            echo '<div class="alert alert-danger"><strong>!A T E N C I Ó N!</strong> El nombre del propietario podria ya existir en la base de datos en E1 o E2.</div>';
        }
    } else {
        echo '<div class="alert alert-success"><strong>!P E R F E C T O!</strong> El nombre del propietario no existe en la base de datos.</div>';
    }
}

if (isset($_POST['nombreProyecto'])) {
    $nombreProyecto = (string)$_POST['nombreProyecto'];
    
    $result = $conection->query(
        "SELECT * FROM datos_generales WHERE deno_proyecto = '$nombreProyecto'"
    );
    
    if ($result->num_rows > 0) {
        $datos = mysqli_fetch_assoc($result);
        if ($datos['tipo_DUF']=='ACUERDO') {
            echo '<div class="alert alert-danger"><strong>!A T E N C I Ó N!</strong> El nombre del proyecto podria ya existir en la base de datos por ACUERDO.</div>';
        }
        else{
            echo '<div class="alert alert-danger"><strong>!A T E N C I Ó N!</strong> El nombre del proyecto podria ya existir en la base de datos en E1 o E2.</div>';
        }
    } else {
        echo '<div class="alert alert-success"><strong>!P E R F E C T O!</strong> El nombre del proyecto  no existe en la base de datos.</div>';
    }
}

if (isset($_POST['domicilio'])) {
    $domicilio = (string)$_POST['domicilio'];
    
    $result = $conection->query(
        "SELECT * FROM datos_generales WHERE domicilio_proyecto = '$domicilio'"
    );
    
    if ($result->num_rows > 0) {
        $datos = mysqli_fetch_assoc($result);
        if ($datos['tipo_DUF']=='ACUERDO') {
            echo '<div class="alert alert-danger"><strong>!A T E N C I Ó N!</strong> El domicilio podria ya existir en la base de datos por ACUERDO.</div>';
        }
        else{
            echo '<div class="alert alert-danger"><strong>!A T E N C I Ó N!</strong> El domicilio podria ya existir en la base de datos en E1 o E2.</div>';
        }
    } else {
        echo '<div class="alert alert-success"><strong>!P E R F E C T O!</strong> El domicilio  no existe en la base de datos.</div>';
    }
}
?>