<?php
// session_destroy();
$_SESSION = array();
  if (isset($_COOKIE["username"])){
        $hour = time() - 3600;
        setcookie('username'," ", $hour);
        session_unset();
        session_destroy();
        header('Location: index.php');


  } else {
        header('Location: index.php');
  }
 ?>
