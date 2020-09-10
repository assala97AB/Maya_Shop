<?php
$nom_du_serveur = 'localhost';
$nom_d_utilisateur = 'root';
$mot_de_passe = '';
$connexion = new PDO("mysql:dbname=maya_shop;host=$nom_du_serveur", $nom_d_utilisateur, $mot_de_passe);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);