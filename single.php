<?php
require 'Config/Config.php';
require 'Config/funciones.php';

$conect = conect($bd_config);
$id_article = id_article($_GET['id']);

if (!$conect) {
    header('Location: error.php');
}

if (empty($id_article)) {
    header('Location: index.php');
}

$post = getPostsId($conect, $id_article);

if (!$post) {
    // Redirigimos al index si no hay post
    header('Location: index.php');
}

//print_r($post);
$post = $post[0];

require 'Views/single.view.php';
