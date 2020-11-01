<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="css/lightbox.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@0;1&family=Oswald:wght@300;400&family=PT+Sans:ital@0;1&display=swap" rel="stylesheet">
  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
      echo('  <link rel="stylesheet" href="css/colorbox.css">');
    }else if($pagina == 'conferencia'){
      echo('<link rel="stylesheet" href="css/lightbox.css">');
    }
  ?>
  <link rel="stylesheet" href="css/main.css">
  <!-- <link rel="stylesheet" href="css/colorbox.css"> -->


  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo($pagina); ?>">

  <!-- Add your site or application content here -->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="clearfix">
            <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i>10-12 Dic </p>
            <p class="ciudad"><i class="fa fa-map-marker" aria-hidden="true"></i>Cancun, QROO</p>
          </div>
          <h1 class="nombre-sitio">GdlWebCamp</h1>
          <p class="slogan">la mejor conferencia de <span>diseño web</span></p>
        </div><!--Informacion-evento-->
      </div><!--Contenido Header-->
    </div><!--Hero-->
  </header>

 <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php">
        <img src="img/logo.svg" alt="logo gdlwebcamp">
        </a>
      </div>

      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal">
        <a href="conferencia.php">Conferencias</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav><!-- .navegacion-principal -->
    </div><!--contenedor-->
  </div><!--barra-->