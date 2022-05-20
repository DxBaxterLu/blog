<?php require 'Views/Template/header.php'; ?>

<div class="container">
    <div class="post">
        <article>
            <h2 class="post-title"> <?php echo $post['titulo'] ?></h2>
            <p class="post-fecha"><?php echo fecha($post['fecha']); ?></p>
            <div class="post-thumb">
                <img src="assets/img/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo'] ?>">
            </div>
            <!-- Con la funcion nl2br insertamos un salto de linea antes de todas las lineas nuevas de un string. -->
            <p class="extracto"><?php echo nl2br($post['texto']); ?></p>
        </article>
    </div>

</div>

<?php

require 'Views/Template/footer.php'; ?>