<?php
// session_start();
// funciones globales
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
function registrar($datos,$db){
if ($datos) {
        $datos['clave'] = password_hash($datos['clave'],PASSWORD_DEFAULT);
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

?>
