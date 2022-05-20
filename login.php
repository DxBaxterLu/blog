<?php session_start();

require 'Config/Config.php';
require 'Config/funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = clsData($_POST['user']);
    $pass = clsData($_POST['pass']);

    if ($user == $blog_admin['user'] && $pass == $blog_admin['pass']) {
        $_SESSION['admin'] = $blog_admin['user'];
        header('Location:' . url . '/Config');
    }
}

require 'Views/login.view.php';
