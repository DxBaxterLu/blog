<?php require '../Views/Template/header.php';
?>

<div class="container">
    <h2 class="panel">Panel de Control</h2>
    <a href="../Config/nuevo.php" class="btn">Nuevo Post</a>
    <a href="../Config/cerrar.php" class="btn">Cerrar Sesion</a>

    <?php foreach ($posts as $post) : ?>

        <div class="post">
            <article>
                <h2 class="post-title"><?php echo $post['id'] . '.-' . $post['titulo']; ?></h2>
                <a href="../Config/editar.php?id=<?php echo $post['id'];  ?>">Editar</a>
                <a href="../single.php?id=<?php echo $post['id'];  ?>">Ver</a>
                <a href="../Config/borrar.php?id=<?php echo $post['id'];  ?>">Borrar</a>
            </article>
        </div>

    <?php endforeach; ?>

</div>

<?php require '../Views/paginacion.php'; ?>

<?php require '../Views/Template/footer.php'; ?>