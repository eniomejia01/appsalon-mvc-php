<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p> <!-- muestra el nombre del usuario que ha iniciado sesión -->

    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION['admin'])) { ?>

    <div class="barra-servicios">
        <a class="boton" href="/admin">Ver Citas</a>
        <a class="boton" href="/servicios">Ver Servicios</a>
        <a class="boton" href="/servicios/crear">Nuevo Servicios</a>
    </div>
    
<?php } ?>