<?php
require_once ("db.php");
session_start(); 

if (!empty($_POST['login']) && !empty($_POST['password']))
{
  if ($_POST['login'] == USERNAME)
  {
      if (password_verify($_POST['password'],))
      {
          echo "Nastepuje logowanie";
      }
  }
}

?>