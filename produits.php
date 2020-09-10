<?php include 'page_header.php' ?>
<?php
require_once 'base_de_donnes.php';
$bd = $connexion;
global $bd;
$get_pro = $bd->prepare("SELECT * FROM articles");
$get_pro->execute();
$resultat = $get_pro->fetchAll(PDO::FETCH_ASSOC);

?>
<img src="pic.JPG" width="100%">
<div class="small-container">
  <h2 class="title">Mangas</h2>
  <div class="row">
    <?php
    for ($ro = 0; $ro < 4; $ro++) {
      $p_id = $resultat[$ro]['a_id'];
      $p_img = $resultat[$ro]['a_img'];
      $p_nom = $resultat[$ro]['a_nom'];
      $p_prix = $resultat[$ro]['a_prix'];
      $p_description=$resultat[$ro]['a_description'];
      ?>

    <div class="col-4">
      <img src="images/<?php echo $p_img; ?> ">
      <h4><?php echo $p_nom; ?></h4>
      <p><?php echo $p_prix; ?> DA</p>
      <p><?php echo $p_description; ?></p>
    </div>
    <?php
    }
    ?>
  </div>
</div>




<?php require 'page_footer.php' ?>
