<?php
require_once 'funciones.php';
$usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
$clave= isset ($_POST['clave'])? $_POST['clave'] : null;
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
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Courgette|Anton|Baloo+Tamma|Marvel|Katibeh" rel="stylesheet">
    <title>Borrowin</title>
  </head>
  <body>
    <div class="container">

      <div class="background">
      <?php include('header.php');?>
      </div>
      <div class="cabecera-index">
        <div>
          <h2>Prestalo con GANAS</h2>
          <h3>Lo queres, lo pedis, lo tenes!</h3>
        </div>
        <div class="formLogin">
          <p>Inicia Sesion</p>
          <form action="index.php" method="post">
            <div>
              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario" type="text" name="usuario" required value='<?php echo $usuario ?>'>
              <br>
              <?php if (isset($errores['usuario_error'])){echo $errores['usuario_error'];}?><br/>
              <label for="clave">Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" required value="">
              <br>
              <?php if (isset($errores['clave_error'])){echo $errores['clave_error'];}?><br/>
            </div>
            <input id="recordarme" type="checkbox" name="recordarme" value="yes">
            <label for="recordarme">Recordarme</label>
            <br><br>
            <button type="submit" name="enviar" value="">Iniciar</button>
            <br>
            <a href="#">¿Has olvidado tu contraseña?</a>
            <br>
            <a href="formulario.php">¿No estás registrado? Crea tu cuenta.</a>
          </form>
        </div>
      </div>
    </div>

    <div class="container">
    <div class="cuerpo-index">
      <div>
        <h2>¿Qué es Borrowin?</h2>
        <br>
        <p>Es una red social de prestamos entre amigos!<br>
        Imagina que necesitas algo, y no queres comprarlo, ¿Algún amigo tuyo podría tenerlo?<br>
        Es cuestión de pedirlo, buscarlo, usarlo y luego devolverlo.<br>
        Esa bicicleta que necesitas este fin de semana, o ese libro que queres leer,<br>
        estan al alcance de la mano. Y claro, vos también podes prestar</p>
      </div>
    </div>
    </div>

    <footer class="">
      <img class="margin-bottom" src="images/logo.svg" alt="" width="70px">
      <p class="margin-bottom"><a href="#">Condiciones de uso</a></p>
      <p class="footerlast">Borrowin 2017</p>
    </footer>
  </body>
</html>
