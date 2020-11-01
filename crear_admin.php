<?php
    include_once('includes/funciones/funciones.php');
    session_start();
    usuario_autenticado();
?>
<?php include_once('includes/templates/header.php'); ?>

  <section class="admin seccion contenedor">

    <h2>Crear administrador</h2>

    <?php require_once('includes/templates/admin_nav.php'); ?>

    <form action="crear_admin.php" class="login" method="POST">
        <div class="campo">
            <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" placeholder="Tú usuario">
        </div>
        <div class="campo">
            <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Tú password">
        </div>
        <div class="campoo">
                <input type="submit" name="submit" class="button" value="Crear">
        </div>
    </form>

    <?php 
        if(isset($_POST['submit'])):
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            if(strlen($usuario) < 5):
                echo("El nombre de usuario debe ser más largo");
                return;
            endif;

            $hashed_passowrd = password_hash($password, PASSWORD_DEFAULT);

            try {
                require_once('includes/funciones/db_conexion.php');
                $stmt = $conn->prepare("INSERT INTO admins (usuario, hash_pass) VALUES (?,?)");
                $stmt->bind_param("ss", $usuario, $hashed_passowrd);
                $stmt->execute();

                    if($stmt->error):
                        echo("<div class='mensaje error'>");
                            echo("El usuario ya exitse");
                        echo("</div>");
                    else:
                        echo("<div class='mensaje'>");
                            echo("Se inserto correctamente el usuario");
                        echo("</div>");
                    endif;
                    


                $stmt->close();
                $conn->close();
            } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
            }
        endif;
    ?>


  </section>

  <?php 
    require_once('includes/templates/footer.php');
  ?>