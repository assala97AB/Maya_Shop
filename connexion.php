<?php
if (!empty($_POST) &&  !empty($_POST['username']) && !empty($_POST['password'])) {
  require_once 'base_de_donnes.php';
  require_once 'fonctions.php';

  $req = $connexion->prepare('SELECT * FROM utilisateurs WHERE username =:username');
  $req->execute(['username' => $_POST['username']]);
  $user = $req->fetch();
  if (password_verify($_POST['password'], $user['password'])) {
    session_start();
    $_SESSION['auth'] = $user;
    $_SESSION['flash']['success'] = 'vous etes maintenant connecté';
    header('Location:compte.php');
    exit();
  } else {
    $_SESSION['flash']['danger'] = 'pseudo où mot de passe incorrect';
  }
}
?>
<?php require 'page_header.php' ?>

<div class="page">
  <div class="container">
    <div class="row">
      <div class="col-2">
        <img src="images/meliodas.png" height="700px" width="800px">
      </div>
      <div class="col-2">
        <div class="form-container">

          <h3 class="title">connexion</h3>

          <form action="" method="POST">
            <label for="">Pseudo</label>
            <input type="text" name="username">


            <label for="">mot de passe</label>
            <input type="password" name="password">


            <button type="submit" class="btn">Me connecter</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require 'page_footer.php' ?>