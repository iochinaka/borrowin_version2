<?php
require_once('funciones.php');
    $usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
    $clave= isset ($_POST['clave'])? $_POST['clave'] : null;
    $clave2= isset ($_POST['clave2'])? $_POST['clave2'] : null;
    $errores= array();

    if (isset($_POST['enviar'])) {
        if (!buscar_usuario_login($usuario,$clave)){
          $errores['usuario_error']="Usuario o clave incorrecta";
        }
        $linea=buscar_usuario_login($usuario,$clave);
        if (count($errores)==0){
          session_start();
          header('Location: perfil.php');
        }
        }
    if (isset($_POST['registrar'])) {
        if ($clave !==$clave2) {
        $errores['claves_distintas']="Las contraseñas son distintas";
        }
        if (buscar_usuario_registro($usuario,"users.json")) {
          $errores['usuario_existe']="Usuario ya existente";
        }
        if (count($errores)==0){
            registrar($_POST,"users.json");
            session_start();
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
      <div class="registro">
      <?php include('header.php') ?>
      </div>

      <section class="formPage">
        <div class="formularioRegistro">
          <p>Registrate</p>
          <form class="" action="formulario.php" method="post" enctype="multipart/form-data">
            <div>
              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario" type="text" name="usuario" required value='<?php echo $usuario ?>'>
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
              <br>
              <?php if (isset($errores['claves_distintas'])){echo $errores['claves_distintas'];}?><br/>
            </div><br>
            <button type="submit" name="registrar" value="">Registrar</button>
            <br>
            <?php if (isset($errores['usuario_existe'])){echo $errores['usuario_existe'];}?>
          </form>
        </div>
        <div class="formularioLogin registro_login">
          <p>Inicia Sesion</p>
          <form class="" action="formulario.php" method="post" enctype="multipart/form-data">
            <div>
              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario" type="text" name="usuario" required value='<?php echo $usuario ?>'>
              <br>
              <?php if (isset($errores['usuario_error'])){echo $errores['usuario_error'];}?><br/>
              <br>
              <label for="clave">Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" required value="">
              <br>
              <?php if (isset($errores['clave_error'])){echo $errores['clave_error'];}?><br/>
            </div>
            <input id="recordarme" type="checkbox" name="recordarme" value="yes">
            <label for="recordarme">Recordarme</label>
            <br><br>
            <button type="submit" name="enviar" value="">Enviar</button>
            <br>
            <a href="#">¿Has olvidado tu contraseña?</a>
          </form>
        </div>
      </section>


      <footer class="">
        <img class="margin-bottom" src="images/logo.svg" alt="" width="70px">
        <p class="margin-bottom"><a href="#">Terminos & Condiciones</a><a href="#">Copyrights</a></p>
        <p class="copyright">Borrowin 2017 All Rights Reserved.</p>
      </footer>
  </body>
</html>
