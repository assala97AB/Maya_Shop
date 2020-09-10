<?php require 'base_de_donnes.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/s.css">
  <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">

  <title>Maya Shop</title>

</head>

<body>
  <div class="navbar">
    <div class="logo">
      <a href="index.php"><img src="logo/logo.png" width="172px"></a>
    </div>
    <nav>
      <ul>
        <li class="btn"><a href="produits.php">produits</a></li>
        <?php if (isset($_SESSION['auth'])) : ?>
        <li class="btn"><a href="">panier</a></li>
        <li class="btn"><a href="deconnexion.php">deconnexion</a></li>
        <li class="btn"><a href="compte.php">compte</a></li>
        <?php else : ?>
        <li class="btn"><a href="connexion.php">se connecter</a></li>
        <li class="btn"><a href="inscription.php">s'inscrire</a></li>
        <?php endif; ?>

      </ul>
    </nav>
  </div>
  <!--<div class="menu-container">
    <div class="search-container">
      <form action="/action_page.php">
        <input id="inp" type="text" placeholder="Search.." name="search">
        <button id="bt" type="submit">Submit</button>
      </form>
    </div>
  </div>-->
  <?php if (isset($_SESSION['flash'])) : ?>

  <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
  <?= $message; ?>
  <?php endforeach; ?>
  <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>