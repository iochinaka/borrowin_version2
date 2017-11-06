
<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
	     $(document).ready(function(){
    	    $('.alternar-respuesta').on('click',function(e){
        	$('#test, #test1, #test2').hide(500);
        	$(this).parent().next().toggle();
        	e.preventDefault();
    	});
	   });
  </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Courgette|Anton|Baloo+Tamma|Marvel|Katibeh" rel="stylesheet">
    <title>Preguntas frecuentes</title>
  </head>
  <body>
<div class="container">
  <div class="backgroundAbout">
    <?php
        include('header.php');
    ?>
  </div>

  <div class="about">
    <article class="about_container">
      <h3>Preguntas Frecuentes</h3>
      <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">¿Qué es Borrowin?</a></p>
        <p id="test"class="respuesta" style="display:none">Es una red social que permite a sus miembros intercambiar productos en forma de préstamo temporal.</p>
      </div>
      <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">¿Cómo funciona si quiero pedir prestado?</a></p>
        <p id="test"class="respuesta" style="display:none"><strong>1-</strong> Teniendo ya agregados a tus contactos a tus amigos. <br>
        <strong>2-</strong> Buscas el producto que necesitas, la búsqueda se realiza entre tu lista de amigos. <br>
        <strong>3-</strong> Retiras el producto que solicitaste. <br>
        <strong>4-</strong> Después del tiempo pactado devuelves el producto.</p>
      </div>

      <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">¿Cómo funciona si quiero prestar algo?</a></p>
        <p id="test"class="respuesta" style="display:none">
            <strong>1-</strong> Teniendo ya agregados a tus contactos a tus amigos. <br>
            <strong>2-</strong> Realizas una publicación del producto que quisieras prestar. <br>
            <strong>3-</strong> Esperas a que se contacten contigo, y organizas la entrega. <br>
            <strong>4-</strong> Después del tiempo pactado te retornan el producto.
        </p>
      </div>

      <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">¿Y si se daña el producto?</a></p>
        <p id="test"class="respuesta" style="display:none">
          Cuando aceptas las condiciones estas aceptando el compromiso de cuidar los productos como si fueran propios.
          Por lo que, en caso de daños, deberás pagar los costos de las reparaciones. Es por esto que recomendamos
          probar el producto al momento de retirarlo. <br> Recorda también que son tus amigos, no van a romper tus cosas.
        </p>
      </div>

      <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">¿Tiene costos el servicio?</a></p>
        <p id="test"class="respuesta" style="display:none">
          Borrowin no tiene costos, los cargos por entregar o retirar un producto estan a cargo de los miembros de la comunidad que estan interesados en realizar una operación.
          Los medios por los cuales dispongan realizar la misma dependerá única y excusivamente de ellos.
        </p>
      </div>

      <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">¿Cómo publico algo que quiero prestar?</a></p>
        <p id="test"class="respuesta" style="display:none">
          Es totalmente intuitivo. Una vez logueado, podras acceder al menú de "mis artículos", donde podras publicar el producto que deseas prestar, indicando el período durante el cual estará disponible, la zona de entrega y las fotos del mismo, junto con una descripción del mismo.
        </p>
      </div>

      <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">¿Cómo hago un seguimiento de los artículos que preste?</a></p>
        <p id="test"class="respuesta" style="display:none">
          Borrowin mandará un mensaje a la cuenta del usuario que presto el artículo, como al usuario al cual se le realizo el préstamo, días antes del vencimiento del plazo. Sea dicho, los usuarios deben ponerse en contacto y coordinar la devolución del producto.
        </p>
      </div>

      <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">¿Cómo funciona y para que sirve la reputación del usuario?</a></p>
        <p id="test"class="respuesta" style="display:none">
          Es fácil, borrowin no se limita unicamente a tus amigos, podes incorporar a tus contactos a otros usuarios. Y para esto, que mejor que saber las experiencias anteriores de otros usuarios. Podes clasificar, opinar y recomendar a otros miembros de la comunidad para que otras personas sepan que sus artículos estan en buenas manos y van a ser cuidados.
        </p>
      </div>

      <!-- <div class="faqsContainer">
        <p class="question"><a href="#" class="alternar-respuesta">Terminos y condiciones generales</a></p>
        <p id="test"class="respuesta" style="display:none">
          <strong>1-</strong> Como miembro de la red social Borrowin aceptas preservar el estado con el cual fue entregado y recibido el artículo, como así también, al momento de prestar un producto, hacer una revision del mismo y no generar reclamos mal intencionados al momento de la devolución.<br>
          <strong>2-</strong> Los datos, direcciónes, teléfonos proporcionados a Borrowin solo podrán verse entre contactos que sean "amigos" entre sí, por lo cual te pedimos que respetes la confidencialidad de los usuarios y no brindes información de los mismos.<br>
          <strong>3-</strong> Al momento de contactarse con otro usuario, te comprometes a hacerlo de manera correcta, educada, y respetando las normas de la comunidad. Te pedimos que respetes horarios, etc. Recomendamos un contacto previo al mail, para coordinar entrega, o pautar horarios para llamar y contactarse.<br>
          <strong>4-</strong> El préstamo de un artículo, la entrega, conservación y devolución es responsabilidad de los usuarios. Recomendamos coordinar la entrega y devolución de los productos en lugares del agrado de ambos usuarios, no comprometas la integridad física de otra persona para tu beneficio, recorda que esta es una red social que busca el beneficio de ambas partes, y lo más importante, son tus amigos<br>
          <strong>5-</strong> En el caso de que el período del prestamo se prolongue, debes modificar el mismo dentro del item, recuerda que las notificaciones para devolverlo comenzarán a llegar a medida que el plazo se vaya acercando.<br>
          <strong>6-</strong> Como usuario de esta red, te comprometes a hacer una clasificación del otro usuario de forma responsable, realista, y sin malas intenciones. Recorda que el otro usuario también va a clasificarte.<br>
          <strong>7-</strong> Borrowin queda excento de todo reclamo, queja, referente a los miembros de la comunidad, para esto existe la clasificación de usuarios.<br>
          <strong>8-</strong> Borrowin suspenderá, en primera instancia durante 15 (quince) días, a aquellos usuarios que reciban 5 clasificaciones negativas consecutivas. De repetirse esta situación, y ya habiendo sido suspendido 1 (una) vez, el usuario será bloqueado.<br>
          <strong>9-</strong> Borrowin queda excento de perdidas, roturas, o daños de cualquier indole sobre los productos que los usuarios prestan. Por lo que se solicita, cuiden los artículos como propios.<br>
          <strong>10-</strong> En caso de que un usuario, decidiera iniciar acciones legales sobre otro usuario, Borrowin no proveerá información de las cuentas, salvo orden judicial mediante. Son libres de actuar como quieran en caso de que lo amerite, pero recorda que nosotros actuamos como red social, y no como intermediarios, es responsabilidad del usuario a que usuarios incluye en su red, y a quienes decide prestar sus productos.<br>
        </p>
      </div> -->
  </article>
  </div>
</div>

<?php include('footer.php');?>

  </body>
</html>
