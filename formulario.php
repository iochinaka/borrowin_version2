<?php
require_once("./clases/dbMySQL.php");
require_once("./clases/validData.php");
require_once('funciones.php');


if (isset($_POST['registrar'])) {
    $db = new dbMySQL();
    $validar = new Validator();
    $errores = $validar->validarInformacion($db, $_POST, $_FILES);

    if (count($errores) == 0) {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $user = new Usuario($_POST['nombre'], $_POST['email'], $_POST['clave'], $_FILES, session_id());
        $us = $db->guardarUsuario($user);
        header('Location: perfil.php');
    }
}
?>


<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Courgette|Anton|Baloo+Tamma|Marvel|Katibeh" rel="stylesheet">
    <title>Registrate</title>
  </head>
  <body>
    <div class="container">
      <div class="backgroundRegistro">
      <?php include('header.php') ?>
      </div>

      <div class="formPage">
        <div class="formRegistro">
          <p>Registrate</p>
          <form class="" action="formulario.php" method="post" enctype="multipart/form-data">
            <div>
              <label for="nombre">Nombre de Usuario</label>
              <br>
              <input id="usuario" type="text" name="nombre" required value="">
              <br><br>
              <label for="email"> E-mail </label><br/>
              <input type="email" id="email" name="email" required value="">
              <br><br>
              <label for="clave" >Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" required value="" >
              <br><br>
              <label for="clave2">Repetir Contraseña</label>
              <br>
              <input id="clave2" type="password" name="clave2" required value="">
              <br><br>
              <input type="file" name="profile_pic" id="profile_pic" required >
              <br><br/>
            </div>
            <button type="submit" name="registrar" value="">Registrar</button>
            <br>
            <a href="index.php">¿Ya estás registrado?</a>
            <br>
              <?php if (isset($errores)) :?>
              <?php foreach ($errores as $key => $value): ?>
                <?php echo "| $value |" ?>
              <?php endforeach; ?>

            <?php endif; ?>
          </form>
        </div>
        <div class="texto-registro">
          <h3 class="stroke">Borrowin</h3>
          <p>Te ayuda a buscar lo que <br>necesitas <br>Pedí, busca, usa, y devolvé<br></p>
        </div>
      </div>
</div>

  <footer class="">
    <img src="images/logo.svg" alt="" width="70px">
    <p><a href="#">Condiciones de uso</a></p>
    <p class="footer">Borrowin 2017</p>
  </footer>
  </body>
</html>
