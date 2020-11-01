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

    <h2>Registrados</h2>
    <p>Bienvenido <?php echo($_SESSION['usuario']); ?></p>

    <?php require_once('includes/templates/admin_nav.php'); ?>


    <table class="registrados">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha Registro</th>
                <th>Articulos Adquiridos</th>
                <th>Regalo</th>
                <th>Total Pagado</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            try {
                require_once('includes/funciones/db_conexion.php');

                $sql  = "SELECT * FROM registrados INNER JOIN regalos ";
                $sql .= "ON registrados.regalo = regalos.id_regalo";
                $resultado = $conn->query($sql);

                while($registrados = $resultado->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $registrados['ID_Registrado']; ?></td>
                        <td><?php echo $registrados['nombre_registrado'] . $registrados['apellido_registrado']; ?></td>
                        <td><?php echo $registrados['email_registrado']; ?></td>
                        <td><?php
                                 $fecha = $registrados['fecha_registro']; 
                                 echo( date('jS F, Y H:i', strtotime($fecha)));
                            ?>
                        </td>
                        <td><?php $articulos = $registrados['pases_articulos']; 
                                  $pedido    = formatear_pedido($articulos);
                                  echo $pedido;
                            ?>
                            
                        </td>
                        <td><?php echo $registrados['nombre_regalo']; ?></td>
                        <td>$ <?php echo $registrados['total_pagado']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            Eventos Registrados: <br>
                            <?php $eventos = $registrados['talleres_registrado']; 
                                  $sql     = formatear_eventos_a_sql($eventos);
                                  $eventos_registrados = $conn->query($sql);

                                  while($eventos = $eventos_registrados->fetch_assoc()){
                                        foreach($eventos as $evento):
                                            echo($evento . ", ");
                                        endforeach;
                                  }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php $conn->close();
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        ?>
        </tbody>
    </table>

  </section>

  <?php 
    require_once('includes/templates/footer.php');
  ?>