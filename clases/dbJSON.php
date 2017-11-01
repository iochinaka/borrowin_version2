<?php

require_once("db.php");
require_once("usuario.php");

class dbJSON extends db {
  private $arch;

  public function __construct() {
    $this->arch = "users.json";
  }

  public function traerPorEmail($email) {
		$archivo = fopen($this->arch, "r");

		$linea = fgets($archivo);

		while($linea != false) {

			$array = json_decode($linea, true);

			if ($array["email"] == $email) {
				return new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["id"]);
			}
			$linea = fgets($archivo);
		}

		return null;
	}

  public function traerTodosLosUsuarios() {
		$archivo = fopen($this->arch, "r");

		$linea = fgets($archivo);

		$usuarios = [];

		while($linea != false) {

			$array = json_decode($linea, true);
			$usuarios[] = new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["id"]);

			$linea = fgets($archivo);
		}

		return $usuarios;
	}

  function registrar(Usuario $usuario){

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

  public function guardarUsuario(Usuario $usuario) {
    if ($usuario->getId() == null) {
      $usuario->setId($this->traerNuevoId());
    }

		$json = json_encode($usuario->toArray());
		file_put_contents($this->arch, $json . PHP_EOL, FILE_APPEND);
	}

  public function traerNuevoId() {
    $usuarios = $this->traerTodosLosUsuarios();

    if (count($usuarios) == 0) {
      return 1;
    }

    $ultimo = array_pop($usuarios);

    return $ultimo->getId() + 1;
  }
}

?>
