
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/newStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Courgette|Anton|Baloo+Tamma|Marvel|Katibeh" rel="stylesheet">
    <title>Borrowin</title>
  </head>


  <body>
    <div class="container">

      <div class="backgroundIndex">
      <?php include('headerlogin.php');?>
      </div class="cabecera-index">
      
      <div class="cuerpo-index">
        <h2>Login Exitoso</h2>
      </div>
      <div class="detalle-perfil">
        <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
        <h3>
          Nombre: <?php echo $usr->getNombre() ;?>
        <br>
          Email: <?php echo $usr->getEmail() ;?>
          <br>
          Edad: <?php echo $usr->getEdad() ;?>
          <br>
          País: <?php echo $usr->getPais() ;?>
        </h3>
        <h2>Estos con tus productos:</h2>
        <div class="producto">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
          <img src="images/profile/<?php echo $pic; ?>" alt="<?php echo $usr->getNombre(); ?>">
        </div producto>
      </div>
      
      <footer>
        
        <img src="images/logo.svg" alt="" width="70px">
        <p>
          <a href="#">Condiciones de uso</a>
        </p>
        <p class="footer">Borrowin 2017</p>
        
      </footer>
    
    </div>


  </body>
</html>
