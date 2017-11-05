<?php
session_start();

$_SESSION = array();

  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
  }
  if (isset($_COOKIE["username"])){
        $hour = time() - 3600;
        setcookie('username'," ", $hour);
        header('Location: index.php');
  } else {
        header('Location: index.php');
  }
  session_destroy();
 ?>
