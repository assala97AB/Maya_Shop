<?php
require_once 'fonctions.php';

session_start();
if (!empty($_POST)) {
  $errors = array();
  require 'base_de_donnes.php';

  if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
    $errors['username'] = "votre pseudo n'est pas valide (alphanumérique)";
  } else {
    $req = $connexion->prepare('SELECT id FROM utilisateurs WHERE username=?');
    $req->execute([$_POST['username']]);
    $user = $req->fetch();
    if ($user) {
      $errors['username'] = 'Ce pseudo est déjà pris';
    }
  }

  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "votre email n'est pas valide";
  } else {
    $req = $connexion->prepare('SELECT id FROM utilisateurs WHERE email=?');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if ($user) {
      $errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
    }
  }
  if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
    $errors['password'] = "vous devez rentrer un mot de passe valide";
  }
  if (empty($errors)) {

    $req = $connexion->prepare("INSERT INTO utilisateurs SET username=?,password=?,email=?");
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $req->execute([$_POST['username'], $password, $_POST['email']]);
    $user_id = $connexion->lastInsertId();
    header('Location: connexion.php');
    exit();
  }
}



?>
<?php require 'page_header.php' ?>


<?php if (!empty($errors)) : ?>
<p>Vous n'avez pas remplis le formulaire correctement</p>
<ul>
  <?php foreach ($errors as $error) : ?>
  <li><?= $error; ?></li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>

<div class="page">
  <div class="container">
    <div class="row">
      <div class="col-2">
        <img src="meliodas.png" height="700px" width="800px">
      </div>
      <div class="col-2">
        <div class="form-container">
          <div class="form-btn">
            <h3 class="title">S'inscrire</h3>

          </div>
          <form action="" method="POST">
            <label for="">Pseudo</label>
            <input type="text" name="username">

            <label for="">Email</label>
            <input type="text" name="email">

            <label for="">mot de passe</label>
            <input type="password" name="password">

            <label for="">confirmez votre mot de passe</label>
            <input type="password" name="password_confirm">

            <button type="submit" class="btn">M'inscrire</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>







<?php require 'page_footer.php' ?>
