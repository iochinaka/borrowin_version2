<?php
require_once('funciones.php');
    $usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
    $email= isset ($_POST['email'])? $_POST['email'] : null;
    $clave= isset ($_POST['clave'])? $_POST['clave'] : null;
    $clave2= isset ($_POST['clave2'])? $_POST['clave2'] : null;
    $profile_pic = $_FILES;
    $errores= array();
    $pathPhoto = "";

    if (isset($_POST['registrar'])) {
        if ($clave !==$clave2) {
        $errores['claves_distintas']="Las contraseñas son distintas";
        }
        if (buscar_usuario_registro($usuario,"users.json")) {
          $errores['usuario_existe']="Usuario ya existente";
        }

        $pathPhoto = savePhoto($profile_pic);

        if (is_array($pathPhoto)) {
          $errores['error_photo'] = $pathPhoto['error'];
        }

        if (count($errores)==0){
            registrar($_POST,"users.json", $pathPhoto);
            session_start();
            $_SESSION['user'] = $usuario;
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
              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario" type="text" name="usuario" required value='<?php echo $usuario ?>'>
              <br><br>
              <label for="email"> E-mail </label><br/>
              <input type="email" id="email" name="email" required value="<?php echo $email ?>">
              <br><br>
              <label for="clave" >Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" required value="" >
              <br><br>
              <label for="clave2">Repetir Contraseña</label>
              <br>
              <input id="clave2" type="password" name="clave2" required value="">
              <br>
              <br><br>
              <input type="file" name="profile_pic" id="profile_pic">
              <br>
              <?php if (isset($errores['claves_distintas'])){echo $errores['claves_distintas'];}?><br/>
            </div>
            <button type="submit" name="registrar" value="">Registrar</button>
            <br>
            <?php if (isset($errores['usuario_existe'])){echo $errores['usuario_existe'];}?>
            <a href="index.php">¿Ya estás registrado?</a>
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
