<?php require 'Views/Template/header.php'; ?>

<div class="container">
    <div class="post">
        <article>
            <h2 class="post-title">Iniciar Sesion </h2>

            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="user" placeholder="Usuario">
                <input type="password" name="pass" placeholder="Contraseña">
                <input type="submit" value="Iniciar Sesion">
            </form>
        </article>
    </div>
</div>

<?php require 'Views/Template/footer.php'; ?>