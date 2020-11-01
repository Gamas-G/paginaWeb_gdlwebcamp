<?php
    include_once('includes/funciones/funciones.php');
    session_start();
    usuario_autenticado();
    $result_img = "";

    if(isset($_POST['submit'])):
      $nombre      = $_POST['nombre'];
      $apellido    = $_POST['apellido'];
      $descripcion = $_POST['descripcion'];

      $directorio = "/img/invitados/";

      if(move_uploaded_file($_FILES['imagen']['tmp_name'], __DIR__ . $directorio . $_FILES['imagen']['name'])){
        $imagen_url = $_FILES['imagen']['name'];
        $result_img  = "Se subio correctamente";

        try {
          require_once('includes/funciones/db_conexion.php');
          $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?, ?, ?, ?)");
          $stmt->bind_param("ssss", $nombre, $apellido, $descripcion, $imagen_url);
          $stmt->execute();

          $stmt->close();
          $conn->close();
          header('Location:agregar_invitado.php?exitoso=1');
      } catch (Exception $e) {
          echo "Error: ". $e->getMessage();
      }
      }
    endif;

?>


<?php 
    include_once('includes/templates/header.php');
  ?>

  <section class="admin seccion contenedor">

    <h2>Panel de Administración</h2>
    <p>Bienvenido <?php echo($_SESSION['usuario']); ?></p>

    <?php require_once('includes/templates/admin_nav.php'); ?>

    <form class="invitado" action="agregar_invitado.php" method="POST" enctype="multipart/form-data"> <!--el enctype es para generar la variable $_FILE-->
          <div class="campo">
              <label for="nombre">Nombre:</label>
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
          </div>
          <div class="campo">
              <label for="apellido">Apellido:</label>
              <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
          </div>
          <div class="campo">
              <label for="descripcion">Descripción:</label>
              <textarea name="descripcion" id="descripcion" cols="30" rows="10" required placeholder="Descripción"></textarea>
          </div>
          <div class="campo">
              <label for="imagen">Imagen:</label>
              <input type="file" id="imagen" name="imagen" required>
          </div>
          <div class="campo">
              <input type="submit" name="submit" value="Agregar" class="button" require>
          </div>
    </form>
    <?php if(isset($_GET['exitoso'])): ?>
          <div class="mensaje">
            Se subio Correctamente
          </div>
    <?php endif; ?>
    <?php echo($result_img); ?>

  </section>

  <?php 
    require_once('includes/templates/footer.php');
  ?>