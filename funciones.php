<?php
function buscar_usuario_login($buscar_usuario, $clave, $db){
      // $data = existe("users.json");
      $userDb = json_decode(file_get_contents($db), true);
        if (array_key_exists($buscar_usuario, $userDb)) {
          $pass = $userDb[$buscar_usuario]["clave"];
              if (password_verify($clave, $pass)) {
                  return TRUE;
              } else {
                  return FALSE;
              }
        } else {
          return FALSE;
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
function registrar($datos, $db, $photo, $sessionId){

  $userDb = json_decode(file_get_contents($db), true);

        $user = [
            "nombre" => $datos["usuario"],
            "clave" =>  password_hash($datos['clave'],PASSWORD_DEFAULT),
            "clave2" =>  password_hash($datos['clave2'],PASSWORD_DEFAULT),
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
  function buscar_usuario_registro($buscar_usuario, $db){

  $arrayDb = json_decode(file_get_contents($db), true);
  return array_key_exists($buscar_usuario, $arrayDb);

  }

/**
 * [savePhoto description]
 * @param  [type] $photo [description]
 * @return [type]        [description]
 */

  // function buscar_pic($user, $db){
  // $userDb = json_decode(file_get_contents($db), true);
  // return $userDb[$user]["photo"];
  // }
  //
  // function buscar_session($session, $user, $db){
  // $userDb = json_decode(file_get_contents($db), true);
  // $seId = $userDb[$user]["sessionId"];
  // return ($session == $seId) ? TRUE : FALSE;
  //
  // }
  // function update_user_session($user, $db, $sessionId){
  //   $userDb = json_decode(file_get_contents($db), true);
  //   $userDb[$user]['sessionId'] = $sessionId;
  //   file_put_contents($db, json_encode($userDb));
  //
  // }
?>
