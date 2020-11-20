<?php
include("../segurity_session.php");
include("../conection_bd.php");
include '../menu.php';
?>
		 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
         <link rel="shortcut icon" href="imagenes/sys.png" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script>
                function Solo_Letras(e){
                   key = e.keyCode || e.which;
                   tecla = String.fromCharCode(key).toLowerCase();
                   letras = " abcdefghijklmnñopqrstuvwxyz0123456789";
                   especiales = "8-37-39-46";
                   tecla_especial = false
                   for(var i in especiales){
                        if(key == especiales[i]){
                            tecla_especial = true;
                            break;
                        }
                    }
                    if(letras.indexOf(tecla)==-1 && !tecla_especial){
                        return false;
                    }
                }
            </script>
         <script>
           $(document).ready(function () { $("#boton").click(function () {if ($("#tabla_new_user").is(":visible")) {document.getElementById("tabla_new_user").style.display = 'none';}else {document.getElementById("tabla_new_user").style.display = '';}});});
        </script>
        <script>
            function confirmar(){if(confirm('¿Estas seguro de eliminar el usuario?')){return true;}else{return false;}}
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                    var dependencia;
                    $("#Dependencia").change(function(e){                  
                          dependencia = $("#Dependencia").val();                                                                         
                          $.ajax({
                                type: "POST",
                                url: "a_organismo_captura.php",
                                data: "dependencia="+dependencia,
                                dataType: "html",
                                beforeSend: function(){
                                $("#Organismo").html("");
                                },
                                error: function(){
                                alert("Error al consultar Dependencias");
                                },
                                success: function(data){                                                    
                                $("#Organismo").empty();
                                $("#Organismo").append(data);                                                             
                                }
                          });                                                                         
                    });                                                     
            });
      </script>

        <div class="container">
          <div class="panel panel-default">
            <div class="panel-heading"><p align="center">Usuarios</p></div>
            <div class="panel-body">
                <table><tr><td ><p><strong>USUARIO:</strong> <?php echo $_SESSION["user_name"];?></p></td></tr></table>
                <table class="table">
                    <tr align="right"><td><button type=button class='btn btn-info' id="boton"><h4><span class='glyphicon glyphicon-plus-sign'> Nuevo</span></h4></button></td></tr>
                </table>
                <form method="POST" action="add_users" enctype="multipart/form-data">
                        <table class="table" name="tabla_new_user" id="tabla_new_user" style="display: none;">
                        <tr>
                            <td><p><input type="text" class="form-control" placeholder="Nombres(s)" name="Nombres" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                         <tr><td><p><input type="text" class="form-control" placeholder="Apellido Paterno" name="Apellido_p" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                         <tr><td><p><input type="text" class="form-control" placeholder="Apellido Materno" name="Apellido_m" onkeypress="return Solo_Letras(event)" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td>
                        </tr>
                        <tr>
                          <td><p> 
                            <select class="form-control" name="Dependencia"  id="Dependencia"required>
                                <option value="" disabled selected>Selecciona la Dependencia</option>
                                <?php
                                $resultado= mysqli_query($conection,"SELECT DISTINCT DEPENDENCIA FROM dependencias");
                                  while ($valores = mysqli_fetch_array($resultado)) {
                                    echo '<option value="'.$valores['DEPENDENCIA'].'">'.$valores['DEPENDENCIA'].'</option>';
                                  }
                                ?>
                            </select>
                        </p></td>
                        </tr>
                        <tr id="Organismo"></tr>
                        <tr align="left"><td><p><input type="text" class="form-control" placeholder="Usuario" name="Usuario" onkeypress="return Solo_Letras(event) " onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"> <td><p><input type="password" class="form-control" placeholder="Contraseña" name="Password" onblur="javascript:this.value=this.value.toUpperCase();" onblur="javascript:this.value=this.value.toUpperCase();" required></p></td></tr>
                        <tr align="left"><td><p> 
                                        <select class="form-control" name="Perfil" id="Perfil" required>
                                        <option value="" disabled selected>Selecciona el perfil del usuario</option>
                                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                        <option value="ACCESO_TOTAL">ACCESO TOTAL</option>
                                        <option value="ACCESO_RESTRINGIDO">ACCESO RESTRINGIDO</option>
                        </select></p></td>
                        </tr>
                        <tr align="left"><td><p> 
                                        <select class="form-control" name="Estado" id="Estado" required>
                                        <option value="" disabled selected>Selecciona el estado del usuario</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                        </select></p></td>
                        </tr>
                        </tr>
                            <tr align= center><td colspan="2"><button id=Save_User type="submit" class="btn btn-primary btn-md"><h4><span class='glyphicon glyphicon-plus-sign'> Guardar</span></h4></button></td></tr>
                    </table>
                </form>   
            </div>
          </div>
         <div class="panel panel-default">
            <div class="panel-body">
                            <?php        
                             //---------------------------------------------------
                                $sql = mysqli_query($conection,"SELECT ID_USER,APELLIDO_PATERNO,APELLIDO_MATERNO,NOMBRES,DEPENDENCIA,ORGANISMO,UNIDAD_ADSCRIPCION,USUARIO,PERFIL,ESTADO FROM usuarios");
                                $contar = mysqli_num_rows($sql);
                                if($contar == 0){echo "<p align=center>No hay datos</p>";}
                                else{
                                   echo " 
                                      <div class=table-responsive>
                                          <table class=table>
                                            <tr>
                                                 <td align=left><p></p></td>
                                                 <td align=right><p> Total de usuarios en sistema: $contar </p></td>
                                                 <td colspan=2><div name=Resultado_SQL id=Resultado_SQL></div></td>
                                            </tr>
                                            </table>
                                       </div>"; 
                                    echo " 
                                      <div class=table-responsive>
                                        <table class='table'>
                                        <tr align=center><td colspan='2'><p>Estado del usuario</p></td></tr>
                                        <tr align=center><td  width='50%'><p>Activo</p></td><td width='50%'><p>Inactivo</p></td></tr>
                                        <tr align=center><td  width='50%' class='success'></td width='50%'><td class='danger'></td></tr>
                                        </table>
                                          <table class='table'>
                                            <tr>
                                                <th><p align=center>Nombre completo</p></th>
                                                <th><p align=center>Dependencia</p></th>
                                                <th><p align=center>Organismo</p></th>
                                                <th><p align=center>Unidad administrativa</p></th>
                                                <th><p align=center>Perfil</p></th>
                                                <th><p align=center>Modificar</p></th>
                                                <th><p align=center>Eliminar</p></th>
                                            </tr>";
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                     
                                    if($row['ESTADO'] == 1){
                                     echo "<tr align=center class='success'>
                                     <td><p>".$row['NOMBRES']." ".$row['APELLIDO_PATERNO']." ".$row['APELLIDO_MATERNO']."</p></td>
                                     <td><p>".$row['DEPENDENCIA']."</p></td>                 
                                     <td><p>".$row['ORGANISMO']."</p></td>
                                     <td><p>".$row['UNIDAD_ADSCRIPCION']."</p></td>
                                     <td><p>".$row['PERFIL']."</p></td>";
                                     echo "<td><a href="."show_data_user?ID=".base64_encode($row['ID_USER'])."><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
                                     echo "<td><a href="."delete_users?ID=".base64_encode($row['ID_USER'])." onclick='return confirmar()'><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a></td>";
                                     echo "</tr>";
                                    }else{
                                     echo "<tr align=center class='danger'>
                                     <td><p>".$row['NOMBRES']." ".$row['APELLIDO_PATERNO']." ".$row['APELLIDO_MATERNO']."</p></td>
                                     <td><p>".$row['DEPENDENCIA']."</p></td>                 
                                     <td><p>".$row['ORGANISMO']."</p></td>
                                     <td><p>".$row['UNIDAD_ADSCRIPCION']."</p></td>
                                     <td><p>".$row['PERFIL']."</p></td>";
                                     echo "<td><a href="."show_data_user?ID=".base64_encode($row['ID_USER'])."><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
                                     echo "<td><a href="."delete_users?ID=".base64_encode($row['ID_USER'])." onclick='return confirmar()'><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a></td>";
                                     echo "</tr>";
                                    }
                                         
                                   }
                                    echo "</table></div>";
                                }
                            //----------------------------------------------------
                        ?>
            </div>    
         </div>
        </div>
</head> 
<!--aqui termina-->
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </body>
</html>

    