<?php
require 'Config/Config.php';
require 'Config/funciones.php';

$conect = conect($bd_config);

if (!$conect) {
    header('Location: error.php');
    //echo "error";
}

$posts = getPost($blog_config['post_pag'], $conect);

if (!$posts) {
    header('Location: error.php');
}

require 'Views/index.view.php';
