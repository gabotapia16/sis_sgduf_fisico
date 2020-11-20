<?php
date_default_timezone_set('America/Mexico_City');
include("conection_bd.php");
if (mysqli_connect_errno()){header ("Location: failure");}
else{
    $user =  mysqli_real_escape_string($conection,$_POST['username']);
    $password = mysqli_real_escape_string($conection,$_POST['password']);
    $USUARIO_ENCRYPED=base64_encode($user);
    $PASSWORD_ENCRYPED=base64_encode($password);
    $result=mysqli_query($conection,"SELECT ID_USER,APELLIDO_PATERNO,APELLIDO_MATERNO,NOMBRES,DEPENDENCIA,ORGANISMO,UNIDAD_ADSCRIPCION,USUARIO,PASSWORD,PERFIL,ESTADO FROM usuarios where USUARIO='$USUARIO_ENCRYPED' and PASSWORD='$PASSWORD_ENCRYPED'");
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0)
        {
            $dat_consult = mysqli_fetch_assoc($result);
            $ID_USER=$dat_consult['ID_USER'];
            $NOMBRE_COMPLETO_USER = $dat_consult['NOMBRES']." ".$dat_consult['APELLIDO_PATERNO']." ".$dat_consult['APELLIDO_MATERNO'];
            $DEPENDENCIA_USER=$dat_consult['DEPENDENCIA'];
            $ORGANISMO_USER=$dat_consult['ORGANISMO'];
            $UNIDAD_ADSCRIPCION_USER=$dat_consult['UNIDAD_ADSCRIPCION'];
            $PERFIL_USER=$dat_consult['PERFIL'];
            $ESTADO_USER=$dat_consult['ESTADO'];


            echo($DEPENDENCIA_USER);
            echo($ORGANISMO_USER);
            echo($UNIDAD_ADSCRIPCION_USER);

            if ($ESTADO_USER == 1){
                switch ($DEPENDENCIA_USER)
                 {
                    case 'SECRETARIA DE JUSTICIA Y DERECHOS HUMANOS':
                        switch ($ORGANISMO_USER)
                         {
                            case 'COMISION DE FACTIBILIDAD DEL ESTADO DE MEXICO':
                                switch ($UNIDAD_ADSCRIPCION_USER)
                                    {

                                        case 'UNIDAD DE TECNOLOGIAS DE LA INFORMACION Y COMUNICACION':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            $_SESSION["id_user"] = $ID_USER;
                                            header ("Location: inicio/inicio");
                                        break;
                                        case 'DIRECCION DE PROCEDENCIA JURIDICA E INTEGRACION DE EXPEDIENTES':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;
                                            $_SESSION["id_user"] = $ID_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            header ("Location: inicio/inicio");
                                        break;
                                        case 'DEPARTAMENTO DE ATENCION Y ASESORIA AL SOLICITANTE':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;
                                            $_SESSION["id_user"] = $ID_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            header ("Location: menu_demisiover2");
                                        break;
                                        case 'DEPARTAMENTO DE ANALISIS DE PROCEDENCIA JURIDICA VALLE DE TOLUCA':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            header ("Location: menu_general");
                                        break;
                                        case 'DIRECCION DE COORDINACION Y SEGUIMIENTO':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            header ("Location: menu_general");
                                        break;
                                        case 'DEPARTAMENTO DE TRAMITACION Y SEGUIMIENTO DE EVALUACIONES TECNICAS':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["id_user"] = $ID_USER;
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            header ("Location: inicio/inicio");
                                        break;
                                        case 'DEPARTAMENTO DE EMISION DE DUF':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            $_SESSION["id_user"] = $ID_USER;
                                            header ("Location: inicio/inicio");
                                        break;
                                        case 'DIRECCION GENERAL':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            $_SESSION["id_user"] = $ID_USER;
                                            header ("Location: inicio/inicio");
                                        break;
                                        case 'VALIDADOR':
                                            session_start();
                                            $_SESSION["user_autentication"] = "login_ok";         //------------VARIABLE DE SESSION------------
                                            $_SESSION["user_name"] = $NOMBRE_COMPLETO_USER;      //------------VARIABLE DE SESSION------------
                                            $_SESSION["perfil_user"] = $PERFIL_USER;            //------------VARIABLE DE SESSION------------
                                            $_SESSION["adscripcion_user"] = $UNIDAD_ADSCRIPCION_USER;
                                            header ("Location: validate_duf");
                                        break;
                                    default:
                                    mysqli_close($conection);
                                    header ("Location: index");
                                    break;
                                    }
                            break;
                                //-------------------------------
                                    //POSIBLES + ORGANISMOS
                                //-------------------------------
                            default:
                            mysqli_close($conection);
                            header ("Location: index");
                            break;
                         }
                    break;
                    //-------------------------------
                        //POSIBLES + DEPENDENCIAS
                    //-------------------------------
                    default:
                        mysqli_close($conection);
                        header ("Location: index");
                    break;

                 }

            }else{
                mysqli_close($conection);
                header ("Location: index");
            }
        }
    else{
         mysqli_close($conection);
        header ("Location: index");
        }
    }
?>