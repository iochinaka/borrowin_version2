<?php

require_once("./clases/db.php");
require_once("usuario.php");

class Validator
{
    private $arrayDeErrores;
    private $nombreArchivo;
    private $extension;

    public function __construct()
    {
        $this->arrayDeErrores = [];

        $this->nombreArchivo = "";

        $this->extension = "";
    }

    public function validarInformacion(db $db, $post, $file)
    {
        $this->nombreArchivo = $file["profile_pic"]["name"];
        $this->extension = pathinfo($this->nombreArchivo, PATHINFO_EXTENSION);


        if ($file["profile_pic"]["error"] != UPLOAD_ERR_OK) {
            $this->arrayDeErrores["profile_pic"] = "La foto no se subio correctamente";
        } elseif ($this->extension != "jpg" && $this->extension != "jpeg" && $this->extension != "gif" && $this->extension != "png") {
            $this->arrayDeErrores["profile_pic"] = "Formato de foto invalido";
        }

        if ($post["nombre"] == "") {
            $this->arrayDeErrores["nombre"] = "Introducir un nombre";
        }

        if ($post["email"] == "") {
            $this->arrayDeErrores["email"] = "Introducir un mail";
        } elseif (filter_var($post["email"], FILTER_VALIDATE_EMAIL) == false) {
            $this->arrayDeErrores["email"] = "Introducir un mail valido";
        } elseif ($db->traerPorEmail($post["email"]) != null) {
            $this->arrayDeErrores["email"] = "El mail ya se encuentra registrado";
        }

        if (strlen($post["clave"]) < 6) {
            $this->arrayDeErrores["clave"] = "Intrucir una contraseña mayor a 6 caracteres";
        } elseif ($post["clave"] != $post["clave2"]) {
            $this->arrayDeErrores["password"] = "Las contraseñas no son iguales";
        }

        return $this->arrayDeErrores;
    }

    public function validarLogin(db $db)
    {
        $this->arrayDeErrores = [];


        if ($post["email"] == "") {
            $this->arrayDeErrores["email"] = "Che, el mail no esta";
        } elseif (filter_var($post["email"], FILTER_VALIDATE_EMAIL) == false) {
            $this->arrayDeErrores["email"] = "Che, el FORMATO del mail esta mal";
        } elseif ($db->traerPorEmail($post["email"]) == null) {
            $this->arrayDeErrores["email"] = "El mail no esta en la base";
        } else {
            //El mail existe!!
            $usuario = $db->traerPorEmail($post["email"]);
            var_dump(password_verify($post["password"], $usuario->getPassword()), $usuario->getPassword());

            if (password_verify($post["password"], $usuario->getPassword()) == false) {
                $this->arrayDeErrores["password"] = "La contraseña no verifica";
            }
        }

        return $this->arrayDeErrores;
    }

    public function validarEdicion(db $db, Usuario $usuario)
    {
        $this->arrayDeErrores = [];

        if ($post["nombre"] == "") {
            $this->arrayDeErrores["nombre"] = "Che, el nombre esta mal";
        }

        if ($post["email"] == "") {
            $this->arrayDeErrores["email"] = "Che, el mail no esta";
        } elseif (filter_var($post["email"], FILTER_VALIDATE_EMAIL) == false) {
            $this->arrayDeErrores["email"] = "Che, el FORMATO del mail esta mal";
        } elseif ($db->traerPorEmail($post["email"]) != null && $post["email"] != $usuario->getEmail()) {
            $this->arrayDeErrores["email"] = "El mail esta repetido";
        }

        if (is_numeric($post["edad"]) == false) {
            $this->arrayDeErrores["edad"] = "Che, pusiste cualquier cosa en la edad";
        }

        if (password_verify($post["oldpassword"], $usuario->getPassword()) == false) {
            $this->arrayDeErrores["oldpassword"] = "Che, tu contraseña anterior esta mal";
        }

        if (strlen($post["password"]) < 6) {
            $this->arrayDeErrores["password"] = "Che, pone al menos 6 caracters de pass";
        } elseif ($post["password"] != $post["cpassword"]) {
            $this->arrayDeErrores["password"] = "Las contraseñas no verifican";
        }

        return $this->arrayDeErrores;
    }
}
