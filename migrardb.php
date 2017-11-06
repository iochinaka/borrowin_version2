<?php
require_once("./clases/dbMySQL.php");
require_once("./clases/dbJSON.php");
require_once("./clases/session.php");
session_start();

        if (isset($_POST['createDB'])) {
            session_destroy();
            dbMySQL::crearDb();
        }
        if (isset($_POST['createTable'])) {
            session_destroy();
            dbMySQL::crearTablas();
        }
        if (isset($_POST['insertUser'])) {
            $dbJson = new dbJSON();
            $dbMysql = new dbMySQL();
            $arrayUser = $dbJson->traerTodosLosUsuarios();
            foreach ($arrayUser as $usuarios => $usuario) {
                $dbMysql->guardarUsuario($usuario);
            }
            $_SESSION['estado'] = "Migración finalizada!";
            header("refresh:3; url=index.php");
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

      <div class="backgroundIndex">
      </div>
      <div class="cabecera-index">
        <div>
          <h2>Prestalo con GANAS</h2>
        </div>
        <div class="formMigrar">
          <p>Restore Data Base</p>
          <br>
          <form action="#" method="post">
            <div class="migrarButtons">
              <button type="submit" name="createDB" value="">Crear base de datos</button>
              <br><br>
              <button type="submit" name="createTable" value="">Crear Tablas</button>
              <br><br>
              <button type="submit" name="insertUser" value="">Migrar Usuarios</button>
              <br>
            </div>
          </form>
          <br>
          <?php if (session_status() == 2): ?>
            <?php echo $var = (isset($_SESSION['estado'])) ? $_SESSION['estado'] : $_SESSION['errorDB']; ?>
            <?php session_destroy(); ?>
            <?php endif; ?>
        </div>
    </div>

      </div>

    <div class="container">
    <div class="cuerpo-index">

        <h2>¿Qué es Borrowin?</h2>
        <br>
        <p>Es una red social de prestamos entre amigos!<br>
        Imagina que necesitas algo, y no queres comprarlo, ¿Algún amigo tuyo podría tenerlo?<br>
        Es cuestión de pedirlo, buscarlo, usarlo y luego devolverlo.<br>
        Esa bicicleta que necesitas este fin de semana, o ese libro que queres leer,<br>
        estan al alcance de la mano. Y claro, vos también podes prestar</p>
    </div>
    </div>

    <footer class="">
      <img src="images/logo.svg" alt="" width="70px">
      <p><a href="#">Condiciones de uso</a></p>
      <p class="footer">Borrowin 2017</p>
    </footer>
  </body>
</html>
