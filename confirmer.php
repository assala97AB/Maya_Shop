<?php

$user_id=$_GET['id'];
$token=$_GET['token'];
require 'base_de_donnes.php';
$req=$connexion->prepare('SELECT * FROM utilisateurs WHERE id=?');
$req->execute($user_id);
$user=$req->fetch();
session_start();
if($user && $user['confirmation_token']==$token)
{
  
  $connexion->prepare('UPDATE utilisateurs SET confirmation_token=NULL,confirmed_at=NOW() WHERE id=? ')->execute([$user_id]);
  $_SESSION['flash']['success']='votre compte a bien étéb validé';
  $_SESSION['auth']=$user;
  header('Location:compte.php');
}
else
{
  $_SESSION['flash']['danger']="CE token n'est pas valide";
  header('Location: connexion.php ');
}