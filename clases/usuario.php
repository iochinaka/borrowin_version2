<?php
/**
 *
 */
class Usuario{
  private $id;
  private $nombre;
  private $email;
  private $password;
  private $edad;
  private $pais;
  private $idPhotoProfile;
  private $sessionId;

  function __construct($nombre, $email, $password, $edad = null, $pais = null, $idPhotoProfile = null, $sessionId = null, $id = null)
  {
    if ($id == null) {
      $this->password = password_hash($password, PASSWORD_DEFAULT);
    } else {
      $this->password = $password;
    }
    $this->nombre = $nombre;
    $this->email = $email;
    $this->edad = $edad;
    $this->pais = $pais;
    $this->idPhotoProfile = $idPhotoProfile;
    $this->sessionId = $sessionId;
    $this->id = $id;

  }
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getNombre()
  {
    return $this->nombre;
  }
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getEdad()
  {
    return $this->edad;
  }
  public function setEdad($edad)
  {
    $this->edad = $edad;
  }
  public function getPais()
  {
    return $this->pais;
  }
  public function setPais($pais)
  {
    $this->pais = $pais;
  }
  public function getIdPhotoProfile()
  {
    return $this->idPhotoProfile;
  }
  public function setIdPhotoProfile($idPhotoProfile)
  {
    $this->idPhotoProfile = $idPhotoProfile;
  }
  public function getSessionId()
  {
    return $this->sessionId;
  }
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }

  public function toArray() {
    $user = [
        "id" => $this->id,
        "nombre" => $this->nombre,
        "clave" =>  $this->password,
        "edad" => $this->edad,
        "pais" => $this->pais,
        "idPhotoProfile" => $this->idPhotoProfile,
        "sessionId" => $sessionId
    ];
    return $userDb[$this->email] = $user;
  }
  public function setNewPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
}

?>
