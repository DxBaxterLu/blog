<?php
//require 'Config.php';

function conect($bd_config)
{

    try {
        $con = new PDO('mysql:host=localhost;dbname=' . $bd_config['database'], $bd_config['user'], $bd_config['pass']);
        return $con;
    } catch (PDOException $e) {
        return false;
    }
}

function clsData($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function getPost($post_pag, $conect)
{
    $inicio = (pag_actual() > 1) ? pag_actual() * $post_pag - $post_pag : 0;
    $sentencia = $conect->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_pag");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function pag_actual()
{
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}
