
<?php 

date_default_timezone_set('America/Mexico_City');
include("../conection_bd.php");
if (mysqli_connect_errno()){header ("Location: ../failure");}
else{
    
    $user =  mysqli_real_escape_string($conection,$_POST['username']);
    $password = mysqli_real_escape_string($conection,$_POST['password']);
    $CURP = mysqli_real_escape_string($conection,$_POST['CURP']);
    $NUMERO_DUF= mysqli_real_escape_string($conection,$_POST['ID_DUF']);
    
    if ($user != "" and $password != "") {
       $USUARIO_ENCRYPED=base64_encode($user);
       $PASSWORD_ENCRYPED=base64_encode($password);
       $result=mysqli_query($conection,"SELECT ID_USER,APELLIDO_PATERNO,APELLIDO_MATERNO,NOMBRES,DEPENDENCIA,ORGANISMO,UNIDAD_ADSCRIPCION,USUARIO,PASSWORD,PERFIL,ESTADO FROM usuarios where USUARIO='$USUARIO_ENCRYPED' and PASSWORD='$PASSWORD_ENCRYPED'");
       $num_rows = mysqli_num_rows($result);
       $TIPO_BUSQUEDA="PERSONAL AUTORIZADO";

    }else{
       $USUARIO_ENCRYPED="Q09OU1VMVEEgUFVCTElDQQ==";
       $PASSWORD_ENCRYPED="MTIzNDU2Nzg5";
       $result=mysqli_query($conection,"SELECT ID_USER,APELLIDO_PATERNO,APELLIDO_MATERNO,NOMBRES,DEPENDENCIA,ORGANISMO,UNIDAD_ADSCRIPCION,USUARIO,PASSWORD,PERFIL,ESTADO FROM usuarios where USUARIO='$USUARIO_ENCRYPED' and PASSWORD='$PASSWORD_ENCRYPED'");
       $num_rows = mysqli_num_rows($result);
       $TIPO_BUSQUEDA="CONSULTA PUBLICA";
    }
    
    if ($num_rows > 0) 
		{
            $FECHA_CONSULTA=date("Y-m-d");
            $HORA_CONSULTA=date("H:i:s");
            $sql_insertar = "INSERT INTO historial_consultas (TIPO_BUSQUEDA,USUARIO_ENCRYPTED,CURP,NO_DOCUMENTO,VALIDACION,FECHA_CONSULTA,HORA_CONSULTA) VALUES ('".$TIPO_BUSQUEDA."','".$USUARIO_ENCRYPED."','".$CURP."','".$NUMERO_DUF."',$num_rows,'".$FECHA_CONSULTA."','".$HORA_CONSULTA."')";
            $resultado_insertar = mysqli_query($conection,$sql_insertar);
            
            $dat_consult = mysqli_fetch_assoc($result);
            $ID_USER=$dat_consult['ID_USER'];
            $NOMBRE_COMPLETO_USER = $dat_consult['NOMBRES']." ".$dat_consult['APELLIDO_PATERNO']." ".$dat_consult['APELLIDO_MATERNO']; 
            $DEPENDENCIA_USER=$dat_consult['DEPENDENCIA'];
            $ORGANISMO_USER=$dat_consult['ORGANISMO'];
            $UNIDAD_ADSCRIPCION_USER=$dat_consult['UNIDAD_ADSCRIPCION'];
            $PERFIL_USER=$dat_consult['PERFIL'];
            $ESTADO_USER=$dat_consult['ESTADO'];
            //********************
            //********************
            if ($ESTADO_USER == 1){
                switch ($DEPENDENCIA_USER) 
			     {
                    case 'SECRETARIA DE JUSTICIA Y DERECHOS HUMANOS':
                        switch ($ORGANISMO_USER) 
                         {
                            case 'COMISION DE FACTIBILIDAD DEL ESTADO DE MEXICO':
                                switch ($UNIDAD_ADSCRIPCION_USER) 
                                    {
                                        case 'VALIDADOR':
                                        session_start();
                                        $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
										$_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
										$_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION--------
    									$_SESSION["numero_duf"] = $NUMERO_DUF; //------------VARIABLE DE SESSION------------
                                        header ("Location: validade_duf");    
                                        break;
                                        case 'CONSULTA PUBLICA':
                                        session_start();
                                        $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                        $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                        $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION--------
                                        $_SESSION["curp"] = $CURP; //------------VARIABLE DE SESSION------------
                                        $_SESSION["numero_duf"] = $NUMERO_DUF; //------------VARIABLE DE SESSION------------
                                        header ("Location: validade_duf_cp");    
                                        break;
                                        case 'VALIDADOR_DOCUMENTOS':
                                        session_start();
                                        $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                        $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                        $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION--------
                                        $_SESSION["numero_duf"] = $NUMERO_DUF; //------------VARIABLE DE SESSION------------
                                        header ("Location: validade_documentos");    
                                        break;
                                        
                                    default:
                                    mysqli_close($conection);
                                    header ("Location: ../inicio_duf?ID=".$NUMERO_DUF);
                                    break;
                                    }
                            break;
                                //-------------------------------
                                    //POSIBLES + ORGANISMOS
                                //-------------------------------
                            default:
                            mysqli_close($conection);
                            header ("Location: ../inicio_duf?ID=".$NUMERO_DUF);
                            break;
                         }
                    break;
                    //-------------------------------
                        //POSIBLES + DEPENDENCIAS 
                    //------------------------------- 
                    default:
                        mysqli_close($conection);
                       header ("Location: ../inicio_duf?ID=".$NUMERO_DUF);
                    break;
                        
                 }
                
            }else{
                mysqli_close($conection);
                header ("Location: ../inicio_duf?ID=".$NUMERO_DUF);
            }                  
        }
    else{
         mysqli_close($conection);
        header ("Location: ../inicio_duf?ID=".$NUMERO_DUF);
        }
    }
?>