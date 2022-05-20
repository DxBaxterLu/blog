<?php session_start();

require 'Config.php';
require 'funciones.php';

$conect = conect($bd_config);

if (!$conect) {
    header('Location: ../error.php');
    //echo "error";
}

$posts = getPost($blog_config['post_pag'], $conect);


require '../Views/admin.view.php';
