<?php require 'Views/Template/header.php';
?>

<div class="container">

    <?php foreach ($posts as $post) : ?>

        <div class="post">
            <article>
                <h2 class="post-title"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'] ?></a></h2>
                <p class="post-fecha"><?php echo fecha($post['fecha']); ?></p>
                <div class="post-thumb">
                    <a href="single.php?id=<?php echo $post['id']; ?>">
                        <img src="<?php echo url; ?>/assets/img/<?php echo $post['thumb']; ?>" alt="">
                    </a>
                </div>
                <p class="extract"><?php echo $post['extracto']; ?></p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="continued">Ver Mas...</a>
            </article>
        </div>

    <?php endforeach; ?>

    <?php require 'Views/paginacion.php'; ?>

</div>

<?php
require 'Views/Template/footer.php'; ?>