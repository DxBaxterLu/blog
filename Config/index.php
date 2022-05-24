<?php session_start();

//Index del Admin

require 'Config.php';
require 'funciones.php';

$conect = conect($bd_config);

comprobarSession();

if (!$conect) {
    header('Location: ../error.php');
    //echo "error";
}

$posts = getPost($blog_config['post_pag'], $conect);


require '../Views/admin.view.php';
