<?PHP
//================================================//
//===========ADMINISTRADOR DE CONTENIDOS==========//
//================================================//

?>
<html>


<head>
    <meta charset="utf-8">
<title>CARRUCEL DE LA VIDA</title>
<link href="script/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">





</head>

	<body>

<audio controls autostart="true" >
  <source src="images/music.ogg" />
  <source src="images/music.mp3" />
  El navegador no puede reproducir el audio 
</audio>

		<center><h1>Bienvenidos al carrusel</h1>
		<a href="logout.php">Cerrar Sesión</a></center>


    <script>
$('.carousel').carousel({
  interval: 2000
})

</script>
		

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/gif4.gif" class="d-block w-100" alt="..." height="900">
      <div class="carousel-caption d-none d-md-block">
      <h3>PROGRAMACION</h3>
        <p>Si se puede imaginar, se puede programar </p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="images/gif2.gif" class="d-block w-100" alt="..." height="900">
      <div class="carousel-caption d-none d-md-block">
      <h3>BASE DE DATOS</h3>
        <p>Duda siempre, hasta que los datos no dejen lugara duda</p>
      </div>
    </div>
    <div class="carousel-item">
      
      <img src="images/gif3.gif" class="d-block w-100" alt="..." height="900">
      <div class="carousel-caption d-none d-md-block">
      <h3>SEGURIDAD INFORMATICA</h3>
        <p>Lo que hoy es seguro mañana puede no serlo</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 


	</body>
</html>