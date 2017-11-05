<?php

require_once("db.php");
require_once("usuario.php");
require_once("./PDO/schema.php");

class dbMySQL extends db
{
    private $conn;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=borrowin_db";
        $user = "root";
        $pass = "";


        try {
          $this->conn = new PDO($dsn, $user, $pass);

        } catch (PDOException $e) {
          session_start();
          $_SESSION['errorDB'] = 'Falló la conexión: ' . $e->getMessage();
          header('Location: migrardb.php');

        }

    }

    public static function crearDB()
    {
      session_start();
      $sql = EsquemaBorrowin::getEsquema();
      $dsn = "mysql:host=localhost;port=3306";
      $user = "root";
      $pass = "";

            try {
                $dbh = new PDO($dsn, $user, $pass);

                $dbh->exec($sql);

            } catch (PDOException $e) {
              $_SESSION['errorDB'] = 'No se pudo crear la base de datos: ' . $e->getMessage();
            }
            $_SESSION['estado'] = "La base fue creada correctamente!";
    }
    public static function crearTablas()
    {
      session_start();
      $sql = EsquemaBorrowin::getTablas();
      $dsn = "mysql:host=localhost;port=3306;dbname=borrowin_db";
      $user = "root";
      $pass = "";

            try {
                $dbh = new PDO($dsn, $user, $pass);

                $dbh->exec($sql);

            } catch (PDOException $e) {
              $_SESSION['errorDB'] = 'Error al crear las tablas: ' . $e->getMessage();
            }
            $_SESSION['estado'] = "Las tablas se crearon correctamente!";

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
        return new Usuario($array["nombre"], $array["email"], $array["password"], $array["userPic"], $array["sessionid"], $array["edad"], $array["pais"], $array["userid"]);
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


        $sql2 = "INSERT INTO usuarioperfil (nombre, userPic, user_perfilId, sessionId)
        VALUES (:nombre, :profilePicture, :user_perfilId, :sessionId)";

        $query2 = $this->conn->prepare($sql2);

        $query2->bindValue(":nombre", $usuario->getNombre());
        $query2->bindValue(":profilePicture", $usuario->getProfilePicture());
        $query2->bindValue(":user_perfilId", $this->conn->lastInsertId());
        $query2->bindValue(":sessionId", $usuario->getSessionId());


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
    // public function buscar_session($session, $usuario, $db)
    // {
    //   $sql = "SELECT sessionid FROM usuarioperfil WHERE perfilId = (SELECT userid FROM usuarios WHERE email = :email);";
    //   $query = $this->conn->prepare($sql);
    //   $query->bindValue(":email", $usuario->getEmail());
    //   $query->execute();
    //   $array = $query->fetch(PDO::FETCH_ASSOC);
    //
    //
    //
    //   $userDb = json_decode(file_get_contents($db), true);
    //   $seId = $userDb[$user]["sessionId"];
    //   return ($session == $seId) ? TRUE : FALSE;
    //
    // }
    function buscar_pic($user, $db){
    $userDb = json_decode(file_get_contents($db), true);
    return $userDb[$user]["photo"];
    }

    // function update_user_session($user, $db, $sessionId){
    //   $userDb = json_decode(file_get_contents($db), true);
    //   $userDb[$user]['sessionId'] = $sessionId;
    //   file_put_contents($db, json_encode($userDb));
    //
    // }
}
