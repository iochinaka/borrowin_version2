<?php

/**
 *
 */
class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $edad;
    private $pais;
    private $sessionId;
    private $profilePic;

    public function __construct($nombre, $email, $password, $userPic, $sessionId = null, $edad = null, $pais = null, $id = null)
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
        $this->sessionId = $sessionId;
        $this->id = $id;
        if (is_array($userPic)) {
          $this->processProfilePic($userPic);
        } else {
          $this->setProfilePic($userPic);
        }

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
    public function getSessionId()
    {
        return $this->sessionId;
    }
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }
    public function getProfilePic()
    {
        return $this->profilePic;
    }
    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
    }

    public function toArray()
    {
        $user = [
        "id" => $this->id,
        "nombre" => $this->nombre,
        "clave" =>  $this->password,
        "edad" => $this->edad,
        "pais" => $this->pais,
        "profilePic" => $this->profilePic,
        "sessionId" => $sessionId
    ];
        return $userDb[$this->email] = $user;
    }
    public function setNewPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function processProfilePic($photo)
    {
        $name = $photo["profile_pic"]["name"];
        $picture = $photo["profile_pic"]["tmp_name"];
        $ext = pathinfo($name, PATHINFO_EXTENSION);


        $today = new DateTime("now");
        $name_pic = date_format($today, "YmdHis")."_profile.";
        $path_and_name = "images/profile/" . $name_pic . $ext;
        move_uploaded_file($picture, $path_and_name);


        $this->profilePic = $name_pic . $ext;
    }
    public function getProfilePicture()
    {
        return $this->profilePic;
    }
}
