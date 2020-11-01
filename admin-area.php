<?php
    include_once('includes/funciones/funciones.php');
    session_start();
    usuario_autenticado();
?>


<?php 
    include_once('includes/templates/header.php');
  ?>

  <section class="admin seccion contenedor">

    <h2>Panel de Administración</h2>
    <p>Bienvenido <?php echo($_SESSION['usuario']); ?></p>

    <?php require_once('includes/templates/admin_nav.php'); ?>

  </section>

  <?php 
    require_once('includes/templates/footer.php');
  ?>