<?php
@session_start();
if($_SESSION["user_autentication"] != "login_ok")
{
  header("Location: ../index");
  exit();
}
?>