    <?php 
        require_once('includes/templates/header.php');
    ?>


    <section class="seccion contenedor">
        <h2>Calendario de Eventos</h2>

        <?php 
            try {
                require_once('includes/funciones/db_conexion.php');

                $sql  = "SELECT eventos.evento_id, eventos.nombre_evento, eventos.fecha_evento, eventos.hora_evento, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado, eventos.clave FROM `eventos` ";
                $sql .= "INNER JOIN categoria_evento ON categoria_evento.id_categoria = eventos.id_cat_evento ";
                $sql .= "INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id ";
                $sql .= "ORDER BY eventos.evento_id;";

                $resultado = $conn->query($sql);
                
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        ?>

        <div class="calendario">
        
        <?php while( $eventos = $resultado->fetch_all(MYSQLI_ASSOC) ){?>

            <?php $dias = array(); ?>
            <?php foreach($eventos as $evento){
                $dias[] = $evento['fecha_evento'];
            }?>

            <?php $dias = array_values(array_unique($dias)) ?>
            <?php $contador = 0; ?>

            <?php foreach($eventos as $evento): ?>

                <?php $dia_actual = $evento['fecha_evento']; ?>
                <?php if($contador < count($dias)):?>
                <?php if($dia_actual == $dias[$contador]): ?>
                    
                    <h3>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <?php echo($evento['fecha_evento']); ?>
                    </h3>
                    <?php $contador++; ?>
                <?php endif; ?>
                <?php endif; ?>

                
                
                <div class="dia">
                    <p class="titulo"><?php  echo($evento['nombre_evento']); ?></p>
                    <p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo($evento['fecha_evento'] . ' ' . $evento['hora_evento'] . ' hrs'); ?></p>
                    <p>
                        <?php $categoria_evento = $evento['cat_evento']; ?>
                        <?php 
                            switch ($categoria_evento) {
                                case 'Talleres':
                                    echo( '<i class="fa fa-code" aria-hidden="true"></i> Taller' );
                                    break;
                                case 'Conferencias':
                                    echo( '<i class="fa fa-comment" aria-hidden="true"></i> Conferencias' );
                                    break;
                                case 'Seminario':
                                    echo( '<i class="fa fa-university" aria-hidden="true"></i> Seminarios' );
                                    break;
                                
                                default:
                                    echo('');
                                    break;
                            }
                        ?>
                    </p>
                    <p><i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo($evento['nombre_invitado'] . ' ' . $evento['apellido_invitado']); ?>
                    </p>
                </div>

            <?php endforeach; ?>
        
        <?php } ?>

        </div><!-- .calendario -->

        <?php 
            $conn->close();
        ?>
    </section>



    <?php 
        require_once('includes/templates/footer.php');
    ?>