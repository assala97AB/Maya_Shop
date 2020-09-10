<?php
function debug($variable)
{
  echo '<pre>'.print_r($variable,true).'</pre>';
}
function str_random($length)
{
  $alphabet= "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
}

function logged_only()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if(isset($_SESSION['auth']))
  {
    
    header('Location: connexion.php');
    exit();
  }
}