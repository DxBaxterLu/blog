<section class="paginacion">
    <ul>
        <?php
        # Establecemos el numero de paginas
        $num_pag = num_pag($blog_config['post_pag'], $conect);
        ?>
        <!-- Mostramos el boton para retroceder una pagina -->
        <?php if (pag_actual() === 1) : ?>
            <li class="disabled">&laquo;</li>
        <?php else : ?>
            <li><a href="index.php?p=<?php echo pag_actual() - 1 ?>">&laquo;</a></li>
        <?php endif; ?>

        <!-- Creamos un elemento li por cada pagina que tengamos -->
        <?php for ($i = 1; $i <= $num_pag; $i++) : ?>
            <!-- Agregamos la clase active en la pagina actual -->
            <?php if (pag_actual() === $i) : ?>
                <li class="active">
                    <?php echo $i; ?>
                </li>
            <?php else : ?>
                <li>
                    <a href="index.php?p=<?php echo $i ?>"><?php echo $i; ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- Mostramos el boton para avanzar una pagina -->
        <?php if (pag_actual() == $num_pag) : ?>
            <li class="disabled">&raquo;</li>
        <?php else : ?>
            <li><a href="index.php?p=<?php echo pag_actual() + 1; ?>">&raquo;</a></li>
        <?php endif; ?>
    </ul>
</section>