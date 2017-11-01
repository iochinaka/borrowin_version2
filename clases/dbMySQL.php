<?php

require_once("db.php");
require_once("usuario.php");

class dbMySQL extends db
{
    private $conn;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=borrowin_db";
        $user = "root";
        $pass = "";

        $this->conn = new PDO($dsn, $user, $pass);
    }

    public function traerPorEmail($email)
    {
        $sql = "SELECT u.userid, u.email, u.password, p.nombre, p.edad, p.pais, p.userPic, p.sessionid
    FROM usuarioperfil as p
    inner join usuarios as u on p.perfilId = u.userId
    where u.email = :email";

        $query = $this->conn->prepare($sql);

        $query->bindValue(":email", $email);

        $query->execute();

        $array = $query->fetch(PDO::FETCH_ASSOC);

        if (!$array) {
            return null;
        }
        return new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["idPhotoProfile"], $array["sessionid"], $array["userid"]);
    }
    public function traerTodosLosUsuarios()
    {
        $sql = "SELECT u.userid, u.email, u.password, p.nombre, p.edad, p.pais, p.userPic, p.sessionid
    FROM usuarioperfil as p
    inner join usuarios as u on p.perfilId = u.userId";

        $query = $this->conn->prepare($sql);

        $query->execute();

        $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayDeObjetos = [];

        foreach ($arrayDeArrays as $array) {
            $arrayDeObjetos[] = new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["idPhotoProfile"], $array["sessionid"], $array["userid"]);
        }

        return $arrayDeObjetos;
    }
    public function guardarUsuario(Usuario $usuario)
    {
        $sql1 = "INSERT INTO usuarios (email, password) VALUES (:email, :password);";
        $query = $this->conn->prepare($sql1);
        $query->bindValue(":email", $usuario->getEmail());
        $query->bindValue(":password", $usuario->getPassword());
        $query->execute();


        $sql2 = "INSERT INTO usuarioperfil (nombre, userPic, user_perfilId)
        VALUES (:nombre, :profilePicture, :user_perfilId)";

        $query2 = $this->conn->prepare($sql2);

        $query2->bindValue(":nombre", $usuario->getNombre());
        $query2->bindValue(":profilePicture", $usuario->getProfilePicture());
        $query2->bindValue(":user_perfilId", $this->conn->lastInsertId());

        $query2->execute();

        $usuario->setId($this->conn->lastInsertId());

        return $usuario;
    }

    public function buscarUsuarios($dato)
    {
        $sql = "SELECT u.userid, u.email, u.password, p.nombre, p.edad, p.pais, p.userPic, p.sessionid
    FROM usuarioperfil as p
    inner join usuarios as u on p.perfilId = u.userId
    where u.email like :buscar or p.nombre like :buscar";

        $query = $this->conn->prepare($sql);

        $query->bindValue(":buscar", "%$dato%");

        $query->execute();

        $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

        $arrayDeObjetos = [];

        foreach ($arrayDeArrays as $array) {
            $arrayDeObjetos[] = new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["idPhotoProfile"], $array["sessionid"], $array["userid"]);
            ;
        }

        return $arrayDeObjetos;
    }

    public function editarUsuario(Usuario $usuario)
    {
        $sql = "UPDATE usuarios as u
    INNER JOIN usuarioperfil as p ON u.userId = p.perfilId
    SET u.email = :email,
        u.password = :password,
        p.nombre = :nombre,
        p.edad = :edad,
        p.pais = :pais,
        p.userPic = :pic,
        p.sessionId = :sessionid
    WHERE u.userId = :id";

        $query = $this->conn->prepare($sql);

        $query->bindValue(":nombre", $usuario->getNombre());
        $query->bindValue(":email", $usuario->getEmail());
        $query->bindValue(":password", $usuario->getPassword());
        $query->bindValue(":edad", $usuario->getEdad());
        $query->bindValue(":pais", $usuario->getPais());
        $query->bindValue(":pic", $usuario->getIdPhotoProfile());
        $query->bindValue(":id", $usuario->getId());

        $query->execute();
    }
    public function buscar_session()
    {
    }
}
