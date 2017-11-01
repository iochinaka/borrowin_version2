<?php
// session_start();
// funciones globales
$errors;
  function existe($archivo)
  {
      if (file_exists($archivo)) {
          $data=fopen($archivo, 'a+');
      } else {
          $data=fopen($archivo, 'w+');
      }
      return $data;
  }

function buscar_usuario_login($buscar_usuario, $clave, $db)
{
    // $data = existe("users.json");
    $userDb = json_decode(file_get_contents($db), true);
    if (array_key_exists($buscar_usuario, $userDb)) {
        $pass = $userDb[$buscar_usuario]["clave"];
        if (password_verify($clave, $pass)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
/**
 * [Registra los usuarios en la BD]
 * @param  [type] $datos     [description]
 * @param  [type] $db        [description]
 * @param  [type] $photo     [description]
 * @param  [type] $sessionId [description]
 * @return [type]            [description]
 */
function registrar($datos, $db, $photo, $sessionId)
{
    $userDb = json_decode(file_get_contents($db), true);

    $user = [
            "nombre" => $datos["usuario"],
            "clave" =>  password_hash($datos['clave'], PASSWORD_DEFAULT),
            "clave2" =>  password_hash($datos['clave2'], PASSWORD_DEFAULT),
            "photo" => $photo,
            "sessionId" => $sessionId
        ];
    $userDb[$datos["email"]] = $user;
    file_put_contents($db, json_encode($userDb));
}
/**
 * [Busca los usuarios que se encuentren registrados en el sistema]
 * @param  [string] $buscar_usuario [Usuario a buscar]
 * @param  [json] $db             [Archivo que contiene los usuarios resgistrados]
 * @return [boolval]                 [Devuelve si TRUE si el usuario a buscar se encuentra registrado o FALSE si no.]
 */
  function buscar_usuario_registro($buscar_usuario, $db)
  {
      $arrayDb = json_decode(file_get_contents($db), true);
      return array_key_exists($buscar_usuario, $arrayDb);
  }

/**
 * [savePhoto description]
 * @param  [type] $photo [description]
 * @return [type]        [description]
 */
  function savePhoto($photo)
  {
      global $errors_file;

      if ($photo["profile_pic"]["error"] == UPLOAD_ERR_OK) {
          $name = $photo["profile_pic"]["name"];
          $picture = $photo["profile_pic"]["tmp_name"];
          $ext = pathinfo($name, PATHINFO_EXTENSION);

          if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
              $today = new DateTime("now");
              $name_pic = date_format($today, "YmdHis")."_profile.";
              $path_and_name = dirname(__FILE__)."/images/profile/".$name_pic.$ext;
              move_uploaded_file($picture, $path_and_name);

              return $name_pic . $ext;
          } else {
              return ['error' => "El tipo de archivo no es valido (jpg, jpeg, png)"];
          }
      } else {
          return ['error' => $errors_file[$photo["profile_pic"]["error"]]];
      }
  }

  function buscar_pic($user, $db)
  {
      $userDb = json_decode(file_get_contents($db), true);
      return $userDb[$user]["photo"];
  }

  function buscar_session($session, $user, $db)
  {
      $userDb = json_decode(file_get_contents($db), true);
      $seId = $userDb[$user]["sessionId"];
      return ($session == $seId) ? true : false;
  }
  function update_user_session($user, $db, $sessionId)
  {
      $userDb = json_decode(file_get_contents($db), true);
      $userDb[$user]['sessionId'] = $sessionId;
      file_put_contents($db, json_encode($userDb));
  }
