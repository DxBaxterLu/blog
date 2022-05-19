<?php
require 'Config/Config.php';
require 'Config/funciones.php';

$conect = conect($bd_config);

if (!$conect) {
    header('Location: Views/Template/error.php');
    //echo "Error";
}

$posts = getPost($blog_config['post_pag'], $conect);

if (!$posts) {
    header('Location: Views/Template/error.php');
}

require 'Views/index.view.php';
