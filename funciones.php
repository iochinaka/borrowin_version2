<?php
// session_start();
// funciones globales
$errors;
function existe ($archivo){
if (file_exists($archivo)){
  $data=fopen ($archivo,'a+');
  }
  else {
  $data=fopen ($archivo,'w+');
  }
  return $data;
}
// login
function buscar_usuario_login($buscar_usuario,$clave){
    $data = existe("users.json");
        while( $linea = fgets($data) ){
          $usuario = json_decode($linea, true);
            if ($usuario["usuario"]==$buscar_usuario && password_verify($clave , $usuario["clave"])) {
              return $usuario;
              }
            }
          return false;
}

// Registro
function registrar($datos, $db, $photo, $sessionId){
    $user = [
      $datos["email"] => [
        "nombre" => $datos["usuario"],
        "clave" =>  password_hash($datos['clave'],PASSWORD_DEFAULT),
        "clave2" =>  password_hash($datos['clave2'],PASSWORD_DEFAULT),
        "photo" => $photo,
        "sessionId" => $sessionId
      ]
    ];
    $json = json_encode($user);
    $json = $json . PHP_EOL;
    file_put_contents("users.json", $json, FILE_APPEND);


}
function buscar_usuario_registro($buscar_usuario, $db){
// $data = existe($db);
$arrayDb = file_get_contents($db);
$data = json_decode($arrayDb, true);
return array_key_exists($buscar_usuario, $data);

//  {
//    while( $linea = fgets($data) ){
//      $usuario = json_decode($linea, true);
//      if (array_key_exists($usuario["$buscar_usuario"])) {
//        return $usuario;
//      }
//    }
//    return false;
// }
}
/**
 * [savePhoto description]
 * @param  [type] $photo [description]
 * @return [type]        [description]
 */
  function savePhoto($photo){
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
        return [
          'error' => "El tipo de archivo no es valido (jpg, jpeg, png)"
        ];
      }



    } else {
      return [
        'error' => $errors_file[$photo["profile_pic"]["error"]]
      ];
    }


  }
  function buscar_pic($user){
  $data = existe("users.json");
      while( $linea = fgets($data) ){
        $usuario = json_decode($linea, true);
          if ($usuario["usuario"]==$user) {
            return $usuario['photo'];
            }
          }
        return false;
  }

  function buscar_session($user){
  $data = existe("users.json");
      while( $linea = fgets($data) ){
        $usuario = json_decode($linea, true);
          if ($usuario["usuario"] == $user) {
            return $usuario['sessionId'];
            }
          }
        return false;
  }
  function update_user_session($user, $db, $sessionId){
    $jsonDb = file_get_contents($db);
    $data = json_decode($jsonDb, true);
    // $data[$user]['sessionId'] = $sessionId;
    //
    $i = 0;
    $found = false;
    while ($i < count($data) && ($found == false)) {
      if ($data['usuario'] == $user ) {
        $data['sessionId'] = $sessionId;
        $newJsonString = json_encode($data);
        file_put_contents($db, $newJsonString);
        $found = true;
      }
      $i++;
    }

      while( $data['usuario'] != $user){
        $usuario = json_decode($linea, true);

              if ($usuario["usuario"] == $user) {
                  $datos['sessionId'] = $sessionId;
                  $guardar=json_encode ($datos);
                  $data= existe ($db);
                  $guardar = $guardar."\n";
                  fwrite ($data,$guardar);
              }
      }
  }
?>
