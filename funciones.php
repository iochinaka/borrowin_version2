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
function registrar($datos,$db,$photo){
    if ($datos) {
        $datos['clave'] = password_hash($datos['clave'],PASSWORD_DEFAULT);
        $datos['clave2'] = password_hash($datos['clave2'],PASSWORD_DEFAULT);
        $datos['photo'] = $photo;
        $guardar=json_encode ($datos);
        $data= existe ($db);
        $guardar = $guardar."\n";
        fwrite ($data,$guardar);
  }
}
function buscar_usuario_registro($buscar_usuario,$db){
$data = existe($db);
    while( $linea = fgets($data) ){
      $usuario = json_decode($linea, true);
        if ($usuario["usuario"]==$buscar_usuario) {
          return $usuario;
          }
        }
      return false;
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
?>
