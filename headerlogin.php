<?php
  // include_once "users.json";
    $db = "users.json";
    include_once "funciones.php";
    session_start();
    if (!buscar_session(session_id(), $_SESSION['email'], $db)) {
      if (isset($_COOKIE["username"])){
            $hour = time() - 3600;
            setcookie('username'," ", $hour);
            header('Location: index.php');
      } else {
            header('Location: index.php');
      }
    }
    $user = $_SESSION['email'];
    $pic = buscar_pic($user, $db);
?>
<!DOCTYPE html>
<div class="header">
  <header class="index">

    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <a class="logo" href=""><h1 class="title-nav">Borrowin!</h1></a>
      <img class="profile-img" src="images/profile/<?php echo $pic; ?>" alt="<?php echo $user; ?>">
      <!-- <a class="logo" href=""><h1 class="h1_nav">Borrowin!</h1></a> -->
    <nav class="menu">
      <ul>
        <li class="nav-bar"><a href="#">Perfil</a></li>
        <li class="nav-bar"><a href="#">Contacto</a></li>
        <!-- <li class="nav-bar"><a href="cerrar_sesion.php">Cerrar Sesión</a></li> -->
        <li id="closeSesion" class="nav-bar"><a href="cerrar_sesion.php">Cerrar Sesión</a></li>

      </ul>
    </nav>
  </header>
</div>
