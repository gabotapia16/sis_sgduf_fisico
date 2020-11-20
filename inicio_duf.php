<?php 
  $ID_DUF=$_REQUEST['ID'];
  $NUMERO_CARACTERES = strlen($ID_DUF);
  $URL_D = "https://cofaem.edomex.gob.mx/sis/sgduf_portal/validate_home?v=2&code=".$ID_DUF;
  
  if ($NUMERO_CARACTERES = 32)  {
  		header('Location: '.$URL_D);
  }
?>