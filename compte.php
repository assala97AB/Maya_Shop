<?php require 'fonctions.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!empty($_POST)) {

  if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
    $_SESSION['flash']['error'] = "Les mots de passe ne correspondent pas";
  } else {
    $user_id = $_SESSION['auth']['id'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    require_once 'base_de_donnes.php';
    $connexion->prepare('UPDATE utilisateurs SET password=? WHERE id=? ')->execute([$password, $user_id]);
    $_SESSION['flash']['success'] = "Votre mot de passe à bien été mis à jour";
  }
}

?>



<?php require 'page_header.php' ?>



<div class="page">
  <h1 id="bnj" class="title">Bonjour <?= $_SESSION['auth']['username']  ?></h1>
  <div class="container">
    <div class="row">
      <div class="col-2">
        <img src="images/meliodas.png" height="700px" width="800px">
      </div>
      <div class="col-2">
        <div class="form-container">

          <h3 class="title">connexion</h3>

          <form action="" method="POST">

            <input type="password" name="password" placeholder="changer de mot de passe">

            <input type="password" name="password_confirm" placeholder="confirmation du mot de passe ">

            <button class="btn" type="submit">changer mon mot de passe</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php require 'page_footer.php' ?>