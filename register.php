<?php
require_once ("db.php");
require_once ("validData.php");
require_once ('funciones.php');
$usuario = isset ($_POST['usuario']) ? $_POST['usuario'] : null;
$email = isset ($_POST['email']) ? $_POST['email'] : null;
$clave = isset ($_POST['clave']) ? $_POST['clave'] : null;
$clave2 = isset ($_POST['clave2']) ? $_POST['clave2'] : null;
$db = "users.json";
$profile_pic = $_FILES;
$errores = array();
$pathPhoto = "";

if (isset($_POST['registrar'])) {
    if ($clave !== $clave2) {
    $errores['claves_distintas'] = "Las contraseñas son distintas";
    }
    if (buscar_usuario_registro($email, $db)) {
      $errores['usuario_existe'] = "Usuario ya existente";
    }

    $pathPhoto = savePhoto($profile_pic);

    if (is_array($pathPhoto)) {
      $errores['error_photo'] = $pathPhoto['error'];
    }

    if (count($errores) == 0){
        session_start();
        $sessionId = session_id();
        $_SESSION['email'] = $email;
        registrar($_POST, $db, $pathPhoto, $sessionId);
        header('Location: perfil.php');
    }
}
?>
