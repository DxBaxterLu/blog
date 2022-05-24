<?php require '../Views/Template/header.php'; ?>

<div class="container">
    <div class="post">
        <article>
            <h2 class="post-title">Nuevo Articulo</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="form" method="post">
                <input type="text" name="titulo" placeholder="Titulo del Articulo">
                <input type="text" name="extracto" placeholder="Extracto del Articulo">
                <textarea name="texto" placeholder="Texto del Articulo"></textarea>
                <input type="file" name="thumb">

                <input type="submit" value="Crear Articulo">
            </form>
        </article>
    </div>
</div>

<?php require '../Views/Template/footer.php'; ?>