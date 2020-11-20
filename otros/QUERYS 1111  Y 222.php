  //////////////////////////ETAPA 1 - 2019 ///////////////////////////////////
  <?php        
                             //---------------------------------------------------
                                $sql = mysqli_query($conection,"SELECT FECHA_INGRESO,NO_EXPEDIENTE,NO_CAJA,ANIO_CAJA,PROPIETARIO,DENOMINACION_RAZON,GIRO,ACTIVIDAD_COMERCIAL,ETAPA_TRAMITE,NO_OFICIO_PREVENCION,FECHA_PREVENCION,NO_OFICIO_PROCEDENCIA,FECHA_PROCEDENCIA FROM expedientes_recepcion where ETAPA_TRAMITE = 1 and FECHA_INGRESO  BETWEEN '2019-01-01' AND '2019-12-31' ORDER BY FECHA_INGRESO asc");
                                $contar = mysqli_num_rows($sql);
                                if($contar == 0){echo "<p align=center>No hay datos</p>";}
                                else{
                                   echo " 
                
                                          <table width=100% border=1>
                                            
                                            <tr>
                                                 <td align=CENTER><h2>ETAPA 1 - 2019</h2></td>
                                            </tr>
                                            <tr>
                                                 <td align=CENTER><h2> Total de registros en sistema: $contar </h2></td>
                                            </tr>
                                            
                                            </table>
                                            <div name=Resultado_SQL id=Resultado_SQL></div>
                                       "; 
                                    echo " 
                                      
                                          <table width=100% border=1>
                                            <tr>
                                                <th><h6 align=left>FECHA DE INGRESO</h6></th>
                                                <th><h6 align=left>NO. EXPEDIENTE</h6></th>
                                                <th><h6 align=left>NO. DE CAJA</h6></th>
                                                <th><h6 align=left>AÑO DE CAJA</h6></th>
                                                <th><h6 align=left>PROPIETARIO</h6></th>
                                                <th><h6 align=left>RAZON SOCIAL</h6></th>
                                                <th><h6 align=left>GIRO</h6></th>
                                                <th><h6 align=left>ACTIVIDAD COMERCIAL</h6></th>
                                                <th><h6 align=left>ETAPA</h6></th>
                                                <th><h6 align=left>PREVENCION</h6></th>
                                                <th><h6 align=left>PROCEDENCIA</h6></th>
                                            </tr>";
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                     
                                     echo "<tr align=left class='success'>
                                     <td><h6>".$row['FECHA_INGRESO']."</h6></td>
                                     <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>
                                     <td align=center><h6>".$row['NO_CAJA']."</h6></td>
                                     <td align=center><h6>".$row['ANIO_CAJA']."</h6></td>                 
                                     <td><h6>".$row['PROPIETARIO']."</h6></td>
                                     <td><h6>".$row['DENOMINACION_RAZON']."</h6></td>
                                     <td><h6>".$row['GIRO']."</h6></td>
                                     <td><h6>".$row['ACTIVIDAD_COMERCIAL']."</h6></td>
                                     <td align=center><h6>".$row['ETAPA_TRAMITE']."</h6></td>";

                                     if ($row['NO_OFICIO_PREVENCION'] == "" AND $row['FECHA_PREVENCION'] == "0000-00-00") {
                                         echo "<td align=center><h6>SIN PREVENCION</h6></td>";
                                     }else{
                                        if($row['NO_OFICIO_PREVENCION'] != "" AND $row['FECHA_PREVENCION'] == "0000-00-00"){
                                         echo "<td align=center><h6>CON PREVENCIÓN SIN NOTIFICAR</h6></td>";
                                        }else{
                                            if($row['NO_OFICIO_PREVENCION'] != "" AND $row['FECHA_PREVENCION'] != "0000-00-00"){
                                               echo "<td align=center><h6>CON PREVENCIÓN NOTIFICADA</h6></td>"; 
                                            }
                                        }
                                     }

                                     if ($row['NO_OFICIO_PROCEDENCIA'] == "" AND $row['FECHA_PROCEDENCIA'] == "0000-00-00") {
                                         echo "<td align=center><h6>SIN PROCEDENCIA</h6></td>";
                                     }else{
                                        if($row['NO_OFICIO_PROCEDENCIA'] != "" AND $row['FECHA_PROCEDENCIA'] == "0000-00-00"){
                                         echo "<td align=center><h6>CON PROCEDENCIA SIN NOTIFICAR</h6></td>";
                                        }else{
                                            if($row['NO_OFICIO_PROCEDENCIA'] != "" AND $row['FECHA_PROCEDENCIA'] != "0000-00-00"){
                                               echo "<td align=center><h6>CON PROCEDENCIA NOTIFICADA</h6></td>"; 
                                            }
                                        }
                                     }
                                     
                                     echo "</tr>";
                                     
 
                                }
                                echo "</table>";
                            }
                            //----------------------------------------------------
                        ?>

//////////////////////////ETAPA 1 - 2018 ///////////////////////////////////

 <?php        
                             //---------------------------------------------------
                                $sql = mysqli_query($conection,"SELECT FECHA_INGRESO,NO_EXPEDIENTE,NO_CAJA,ANIO_CAJA,PROPIETARIO,DENOMINACION_RAZON,GIRO,ACTIVIDAD_COMERCIAL,ETAPA_TRAMITE,NO_OFICIO_PREVENCION,FECHA_PREVENCION,NO_OFICIO_PROCEDENCIA,FECHA_PROCEDENCIA FROM expedientes_recepcion where ETAPA_TRAMITE = 1 and FECHA_INGRESO  BETWEEN '2018-01-01' AND '2018-12-31' ORDER BY FECHA_INGRESO asc");
                                $contar = mysqli_num_rows($sql);
                                if($contar == 0){echo "<p align=center>No hay datos</p>";}
                                else{
                                   echo " 
                
                                          <table width=100% border=1>
                                            
                                            <tr>
                                                 <td align=CENTER><h2>ETAPA 1 - 2019</h2></td>
                                            </tr>
                                            <tr>
                                                 <td align=CENTER><h2> Total de registros en sistema: $contar </h2></td>
                                            </tr>
                                            
                                            </table>
                                            <div name=Resultado_SQL id=Resultado_SQL></div>
                                       "; 
                                    echo " 
                                      
                                          <table width=100% border=1>
                                            <tr>
                                                <th><h6 align=left>FECHA DE INGRESO</h6></th>
                                                <th><h6 align=left>NO. EXPEDIENTE</h6></th>
                                                <th><h6 align=left>NO. DE CAJA</h6></th>
                                                <th><h6 align=left>AÑO DE CAJA</h6></th>
                                                <th><h6 align=left>PROPIETARIO</h6></th>
                                                <th><h6 align=left>RAZON SOCIAL</h6></th>
                                                <th><h6 align=left>GIRO</h6></th>
                                                <th><h6 align=left>ACTIVIDAD COMERCIAL</h6></th>
                                                <th><h6 align=left>ETAPA</h6></th>
                                                <th><h6 align=left>PREVENCION</h6></th>
                                                <th><h6 align=left>PROCEDENCIA</h6></th>
                                            </tr>";
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                     
                                     echo "<tr align=left class='success'>
                                     <td><h6>".$row['FECHA_INGRESO']."</h6></td>
                                     <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>
                                     <td align=center><h6>".$row['NO_CAJA']."</h6></td>
                                     <td align=center><h6>".$row['ANIO_CAJA']."</h6></td>                 
                                     <td><h6>".$row['PROPIETARIO']."</h6></td>
                                     <td><h6>".$row['DENOMINACION_RAZON']."</h6></td>
                                     <td><h6>".$row['GIRO']."</h6></td>
                                     <td><h6>".$row['ACTIVIDAD_COMERCIAL']."</h6></td>
                                     <td align=center><h6>".$row['ETAPA_TRAMITE']."</h6></td>";

                                     if ($row['NO_OFICIO_PREVENCION'] == "" AND $row['FECHA_PREVENCION'] == "0000-00-00") {
                                         echo "<td align=center><h6>SIN PREVENCION</h6></td>";
                                     }else{
                                        if($row['NO_OFICIO_PREVENCION'] != "" AND $row['FECHA_PREVENCION'] == "0000-00-00"){
                                         echo "<td align=center><h6>CON PREVENCIÓN SIN NOTIFICAR</h6></td>";
                                        }else{
                                            if($row['NO_OFICIO_PREVENCION'] != "" AND $row['FECHA_PREVENCION'] != "0000-00-00"){
                                               echo "<td align=center><h6>CON PREVENCIÓN NOTIFICADA</h6></td>"; 
                                            }
                                        }
                                     }

                                     if ($row['NO_OFICIO_PROCEDENCIA'] == "" AND $row['FECHA_PROCEDENCIA'] == "0000-00-00") {
                                         echo "<td align=center><h6>SIN PROCEDENCIA</h6></td>";
                                     }else{
                                        if($row['NO_OFICIO_PROCEDENCIA'] != "" AND $row['FECHA_PROCEDENCIA'] == "0000-00-00"){
                                         echo "<td align=center><h6>CON PROCEDENCIA SIN NOTIFICAR</h6></td>";
                                        }else{
                                            if($row['NO_OFICIO_PROCEDENCIA'] != "" AND $row['FECHA_PROCEDENCIA'] != "0000-00-00"){
                                               echo "<td align=center><h6>CON PROCEDENCIA NOTIFICADA</h6></td>"; 
                                            }
                                        }
                                     }
                                     
                                     echo "</tr>";
                                     
 
                                }
                                echo "</table>";
                            }
                            //----------------------------------------------------
                        ?>




                        $sql2 = mysqli_query($conection,"SELECT ESTADO_ETAPA1 FROM expedientes_recepcion where ESTADO_ETAPA1 = 1");
                                
                                $CONTAR2= mysqli_num_rows($sql2);
                                echo "CRITERIO: ".$CONTAR2;







 <?php        
                             //---------------------------------------------------
                                $sql = mysqli_query($conection,"SELECT FECHA_INGRESO,NO_EXPEDIENTE,NO_CAJA,ANIO_CAJA,PROPIETARIO,DENOMINACION_RAZON,GIRO,ACTIVIDAD_COMERCIAL,ETAPA_TRAMITE,NO_OFICIO_PREVENCION,FECHA_PREVENCION,NO_OFICIO_PROCEDENCIA,FECHA_PROCEDENCIA, ESTADO_ETAPA1 FROM expedientes_recepcion where ETAPA_TRAMITE = 1 and FECHA_INGRESO  BETWEEN '2018-01-01' AND '2018-12-31' ORDER BY FECHA_INGRESO asc");
                                $contar = mysqli_num_rows($sql);

                                if($contar == 0){echo "<p align=center>No hay datos</p>";}
                                else{
                                   echo " 
                
                                          <table width=100% border=1>
                                            
                                            <tr>
                                                 <td align=CENTER><h2>ETAPA 1 - 2018</h2></td>
                                            </tr>
                                            <tr>
                                                 <td align=CENTER><h2> Total de registros en sistema: $contar </h2></td>
                                            </tr>
                                            
                                            </table>
                                            <div name=Resultado_SQL id=Resultado_SQL></div>
                                       "; 
                                    echo " 
                                      
                                          <table width=100% border=1>
                                            <tr>
                                                <th><h6 align=left>FECHA DE INGRESO</h6></th>
                                                <th><h6 align=left>NO. EXPEDIENTE</h6></th>
                                                <th><h6 align=left>NO. DE CAJA</h6></th>
                                                <th><h6 align=left>AÑO DE CAJA</h6></th>
                                                <th><h6 align=left>PROPIETARIO</h6></th>
                                                <th><h6 align=left>RAZON SOCIAL</h6></th>
                                                <th><h6 align=left>GIRO</h6></th>
                                                <th><h6 align=left>ACTIVIDAD COMERCIAL</h6></th>
                                                <th><h6 align=left>ETAPA</h6></th>
                                                <th><h6 align=left>PREVENCION</h6></th>
                                                <th><h6 align=left>PROCEDENCIA</h6></th>
                                            </tr>";
                                    $SINPREVENCIONNINOTIFICACION=0;
                                    $CONPREVENCIONSINNOTIFICAR=0;
                                    $CONPREVENCIONNOTIFICADA=0;
                                    $SINPROCEDENCIANINOTIFICACION=0;
                                    $CONPROCEDENCIASINNOTIFICAR=0;
                                    $CONPROCEDENCIANOTIFICADA=0;
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                     
                                     echo "<tr align=left class='success'>
                                     <td><h6>".$row['FECHA_INGRESO']."</h6></td>
                                     <td><h6>".$row['NO_EXPEDIENTE']."</h6></td>
                                     <td align=center><h6>".$row['NO_CAJA']."</h6></td>
                                     <td align=center><h6>".$row['ANIO_CAJA']."</h6></td>                 
                                     <td><h6>".$row['PROPIETARIO']."</h6></td>
                                     <td><h6>".$row['DENOMINACION_RAZON']."</h6></td>
                                     <td><h6>".$row['GIRO']."</h6></td>
                                     <td><h6>".$row['ACTIVIDAD_COMERCIAL']."</h6></td>
                                     <td align=center><h6>".$row['ETAPA_TRAMITE']."</h6></td>";

                                     if ($row['NO_OFICIO_PREVENCION'] == "" AND $row['FECHA_PREVENCION'] == "0000-00-00") {
                                         echo "<td align=center><h6>SIN PREVENCION</h6></td>";
                                         $SINPREVENCIONNINOTIFICACION=$SINPREVENCIONNINOTIFICACION+1;
                                     }
                                     if($row['NO_OFICIO_PREVENCION'] != "" AND $row['FECHA_PREVENCION'] == "0000-00-00"){
                                         echo "<td align=center><h6>CON PREVENCIÓN SIN NOTIFICAR</h6></td>";
                                         $CONPREVENCIONSINNOTIFICAR= $CONPREVENCIONSINNOTIFICAR+1;
                                        }

                                     if($row['NO_OFICIO_PREVENCION'] != "" AND $row['FECHA_PREVENCION'] != "0000-00-00"){
                                               echo "<td align=center><h6>CON PREVENCIÓN NOTIFICADA</h6></td>";
                                               $CONPREVENCIONNOTIFICADA= $CONPREVENCIONNOTIFICADA+1; 
                                            }

                                     if ($row['NO_OFICIO_PROCEDENCIA'] == "" AND $row['FECHA_PROCEDENCIA'] == "0000-00-00") {
                                         echo "<td align=center><h6>SIN PROCEDENCIA</h6></td>";
                                         $SINPROCEDENCIANINOTIFICACION=$SINPROCEDENCIANINOTIFICACION+1;
                                     }
                                     if($row['NO_OFICIO_PROCEDENCIA'] != "" AND $row['FECHA_PROCEDENCIA'] == "0000-00-00"){
                                         echo "<td align=center><h6>CON PROCEDENCIA SIN NOTIFICAR</h6></td>";
                                         $CONPROCEDENCIASINNOTIFICAR= $CONPROCEDENCIASINNOTIFICAR+1;
                                        }
                                     if($row['NO_OFICIO_PROCEDENCIA'] != "" AND $row['FECHA_PROCEDENCIA'] != "0000-00-00"){
                                               echo "<td align=center><h6>CON PROCEDENCIA NOTIFICADA</h6></td>"; 
                                               $CONPROCEDENCIANOTIFICADA= $CONPROCEDENCIANOTIFICADA+1; 
                                            }





                                                                          
                                     echo "</tr>";
                                     
                                     

 
                                }

                                echo "</table>";
                                //echo "expedientes sin prevencion: ".$SINPREVENCIONNINOTIFICACION;
                                     echo "expedientes sin prevencion ni notificacion ".$SINPREVENCIONNINOTIFICACION ."<br>". "";
                                     echo "expedientes con prevencion sin notificar: ".$CONPREVENCIONSINNOTIFICAR ."<br>". "";
                                     echo "expedientes con prevencion notificada: ".$CONPREVENCIONNOTIFICADA ."<br>". "";
                                     echo "expedientes sin procedencia ni notificacion ".$SINPROCEDENCIANINOTIFICACION ."<br>". "";
                                     echo "expedientes con procedencia sin notificar: ".$CONPROCEDENCIASINNOTIFICAR ."<br>". "";
                                     echo "expedientes con procedencia notificada: ".$CONPROCEDENCIANOTIFICADA ."<br>". "";
                            }
                            //----------------------------------------------------
                        ?>