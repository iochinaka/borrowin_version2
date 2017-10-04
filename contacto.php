<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Courgette|Anton|Baloo+Tamma|Marvel|Katibeh" rel="stylesheet">
    <title>Contacto</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <?php include('header.php') ?>
      </div>

      <div class="contacto">
        <div class="contact_form">
          <div class="contact_background">
            <h2>Contactate con nosotros</h2>
            <form class="contacto" action="index.html" method="post">
              <label for="name">Nombre</label>
              <input id="name" type="text" name="name" value="">
              <br>
              <label for="email">E-mail </label>
              <input id="email" type="text" name="email" value="">
              <br>
            </form>
            <label class="comment" for="comment">Mensaje</label>
            <textarea name="comment" rows="5" cols="40"></textarea>
            <button type="submit" name="button">Enviar</button>
          </div>
        </div>
      </div>
    </div>

      <footer class="">
        <img class="margin-bottom" src="images/logo.svg" alt="" width="70px">
        <p class="margin-bottom"><a href="#">Terminos & Condiciones</a><a href="#">Copyrights</a></p>
        <p class="copyright">Borrowin 2017 All Rights Reserved.</p>
      </footer>
  </body>
</html>
