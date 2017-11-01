<?php

require_once("usuario.php");

abstract class db {
  public abstract function traerPorEmail($email);
  public abstract function traerTodosLosUsuarios();
  public abstract function guardarUsuario(Usuario $usuario);
  public abstract function buscar_session();
}

?>
