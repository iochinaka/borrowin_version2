<?php
  // include_once "users.json";
    require_once("./clases/dbMySQL.php");
    require_once("./clases/validData.php");
    require_once("./clases/session.php");

    session_start();
    $validar = new Validator();

    if (!$validar->estaLogueado() && !isset($_COOKIE["username"])) {
        header('Location: index.php');
        exit;
    }

    $db = new dbMySQL();
    $usr = ($validar->estaLogueado()) ? $db->traerPorEmail($_SESSION['email']) : $db->traerPorEmail($_COOKIE["username"]);

    if (is_null($usr)) {
        Session::borrarSesion();
        header('Location: index.php');
    }
    $pic = $usr->getProfilePic();
?>
<!DOCTYPE html>
<div class="header">
  <header class="index">

    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <a class="logo" href=""><h1 class="title-nav">Borrowin!</h1></a>
      <img class="profile-img" src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
      <!-- <a class="logo" href=""><h1 class="h1_nav">Borrowin!</h1></a> -->
    <nav class="menu">
      <ul>
        <li class="nav-bar"><a href="perfil.php">Mi Perfil</a></li>
        <li class="nav-bar"><a href="#">Contacto</a></li>
        <li class="nav-bar"><a href="#">Preguntas Frecuentes</a></li>
        <li class="little-nav-bar"><a href="#">Mis productos</a></li>
        <li class="little-nav-bar"><a href="#">Me prestaron</a></li>
        <li class="little-nav-bar"><a href="#">Novedades</a></li>
        <li class="little-nav-bar"><a href="#">Buscar</a></li>
        <li class="little-nav-bar"><a href="cerrar_sesion.php">Cerrar sesión</a></li>
      </ul>
    </nav>
  </header>
</div>
