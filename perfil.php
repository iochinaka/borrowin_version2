
<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
  		$("#misProductos").on( "click", function() {
        $('.mePrestaron, .novedades, .buscar').hide();
  			$('.misProductos').show(); //muestro mediante clase
  		 });
      $("#mePrestaron").on( "click", function() {
        $('.misProductos, .novedades, .buscar').hide();
        $('.mePrestaron').show(); //muestro mediante clase
      });
      $("#novedades").on( "click", function() {
        $('.misProductos, .mePrestaron, .buscar').hide();
        $('.novedades').show(); //muestro mediante clase
      });
      $("#buscar").on( "click", function() {
        $('.misProductos, .mePrestaron, .novedades').hide();
        $('.buscar').show(); //muestro mediante clase
      });
  	});
  </script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Courgette|Anton|Baloo+Tamma|Marvel|Katibeh" rel="stylesheet">
    <title>Borrowin</title>
  </head>
  <body>
  <div class="container">
      <?php include('headerlogin.php');?>
      <div class="contenido">
      <div class="menuLateral">
        <ul>
          <li><a id="misProductos" href="#">Mis productos</a></li>
          <li><a id="mePrestaron" href="#">Me prestaron</a></li>
          <li><a id="novedades" href="#">Novedades</a></li>
          <li><a id="buscar" href="#">Buscar</a></li>
          <h3>PERFIL</h3>
          <li><a><?php echo $usr->getNombre(); ?></a></li>
          <li><a href="#">Ajustes</a></li>
          <li><a href="#">Contactos</a></li>
          <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
      </div>

      <section class="productContainer">
          <div class="misProductos" >
              <h1>Mis Productos</h1>
                <article class="product">
                  <img src="images/products/bicicleta01.jpg" alt="producto">
          				<h2>Bicicleta</h2>
          				<a href="#">VER MÁS</a>
                </article>
                <article class="product">
                  <img src="images/products/kayak.jpg" alt="producto">
                  <h2>Kayak</h2>
                  <a href="#">VER MÁS</a>
                </article>
                <article class="product">
                  <img src="images/products/libros.png" alt="producto">
                  <h2>Saga completa Harry Potter</h2>
                  <a href="#">VER MÁS</a>
                </article>
                <article class="product">
                  <img src="images/products/juego-got.jpg" alt="producto">
                  <h2>Juego Games of Thrones</h2>
                  <a href="#">VER MÁS</a>
                </article>
                <article class="product">
                  <img src="images/products/apuntes.jpg" alt="producto">
                  <h2>Apuntes Digital House</h2>
                  <a href="#">VER MÁS</a>
                </article>
                <article class="product">
                  <img src="images/products/dvd.jpg" alt="producto">
                  <h2>Dragon Ball Completo</h2>
                  <a href="#">VER MÁS</a>
                </article>
                <article class="product">
                  <img src="images/products/agregar.png" alt="producto">
                  <h2>Agregar Item</h2>
                  </article>
          </div>
          <div class="mePrestaron" style="display:none">
              <h1>Me prestaron</h1>
              <article class="product">
                <img src="images/products/mesa-jardin.jpg" alt="producto">
                <h2>Mesa de Jardín</h2>
                <a href="#">VER MÁS</a>
              </article>
              <article class="product">
                <img src="images/products/auto.jpg" alt="producto">
                <h2>Auto</h2>
                <a href="#">VER MÁS</a>
              </article>
          </div>
          <div class="novedades" style="display:none">
              <h1>Novedades</h1>
              <h3>No hay novedades para mostrar. Invita a mas amigos para agrandar la red</h3>
              <div class="product">

              </div>
          </div>
          <div class="buscar" style="display:none">
              <h1>Buscar</h1>
              <div class="product">
                <h3></h3>
              </div>
          </div>
      </section>

    </div>

  </div>
    <?php include('footer.php');?>
  </body>
</html>
