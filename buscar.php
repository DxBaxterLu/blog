<?php
require 'Config/Config.php';
require 'Config/funciones.php';

$conect = conect($bd_config);

if (!$conect) {
    header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {
    $busqueda = clsData($_GET['busqueda']);

    $statement = $conect->prepare("SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto Like :busqueda");

    $statement->execute(array(':busqueda' => "%$busqueda%"));

    $resultados = $statement->fetchAll();

    if (empty($resultados)) {
        $titulo = 'No se encontraron articulos con el resultado: ' . $busqueda;
    } else {
        $titulo = 'Resultados de la busqueda: ' . $busqueda;
    }
} else {
    header('Location:' . url . '/index.php');
}

require 'Views/buscar.view.php';
