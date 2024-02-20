<h1 class="nombre-pagina">Servicios</h1>
<p class="descripcion-pagina">Administracion de Servicios</p>

<?php 

    include __DIR__ . '/../templates/barra.php';

?>

<ul class="servicios">

    <?php foreach($servicios as $servicio) { ?>

        <li>
            <p>Nombre: <span><?php echo $servicio->nombre; ?></span></p>
            <p>Precio: <span>Q<?php echo $servicio->precio; ?></span></p>

            <div class="acciones">

                <a class="boton" href="/servicios/actualizar?id=<?php echo $servicio->id; ?>">Actualizar</a> <!-- Enviar a la pagina de actualizar con el id del servicio -->

                <form action="/servicios/eliminar" method="POST"> <!-- Enviar a la pagina de eliminar -->

                    <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">  <!-- Enviar el id del servicio a eliminar -->

                    <input type="submit" value="Borrar" class="boton-eliminar"> <!-- Boton para eliminar el servicio -->

                </form>

            </div>
        </li>


    <?php } ?>

</ul>