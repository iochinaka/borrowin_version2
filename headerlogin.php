<?php
  // include_once "users.json";
  include_once "funciones.php";
  session_start();
  $user = $_SESSION['user'];
  $pic = buscar_pic($user);
?>
<div class="header">
  <header class="index">

    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <a class="logo" href=""><h1 class="h1_nav"><img class="logo" src="images/logo.svg" alt="" width="50px">orrowin</h1></a>
    <img class="profile-img" src="images/profile/<?php echo $pic; ?>" alt="">
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
