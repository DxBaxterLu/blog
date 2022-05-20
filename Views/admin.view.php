<?php require '../Views/Template/header.php';
?>

<div class="container">
    <h2 class="panel">Panel de Control</h2>
    <?php foreach ($posts as $post) : ?>

        <div class="post">
            <article>
                <h2 class="post-title"><?php echo $post['id'] . '.-' . $post['titulo']; ?></h2>
                <a href="">Editar</a>
                <a href="">Ver</a>
                <a href="">Borrar</a>
            </article>
        </div>

    <?php endforeach; ?>

    <?php require '../Views/paginacion.php'; ?>

</div>

<?php
require '../Views/Template/footer.php'; ?>