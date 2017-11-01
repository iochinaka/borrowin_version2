<?php
  $dsn = 'mysql:host=127.0.0.1;dbname=borrowin_db;charset=utf8mb4,port:3306';
  $db_user = 'root';
  $db_pass = '';
  $db = new PDO($dsn, $db_user, $db_pass);
?>


select u.email, p.nombre, p.fechaCumpleano from borrowin_db.usuarioperfil as p inner join usuarios as u
on p.objectId = u.objectId;
