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
      <div class="backgroundContacto">
        <?php include('header.php') ?>
      </div>

      <div class="contactPage">
        <div class="contact_form">
          <div class="backgroundContactForm">
            <h2>Contactate con nosotros</h2>
            <form class="contact" action="index.html" method="post">
              <label for="name">Nombre</label><br>
              <input id="name" type="text" name="name" value="">
              <br>
              <label for="email">E-mail </label><br>
              <input id="email" type="text" name="email" value="">
              <br>
            </form>
            <label class="comment" for="comment">Mensaje</label>
            <textarea></textarea>
            <button type="submit" name="button">Enviar</button>
          </div>
        </div>
      </div>
    </div>

    <footer class="">
      <img src="images/logo.svg" alt="" width="70px">
      <p><a href="#">Condiciones de uso</a></p>
      <p class="footer">Borrowin 2017</p>
    </footer>
  </body>
</html>
