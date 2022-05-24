<?php session_start();

require 'Config.php';
require 'funciones.php';

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();

// Conectamos a la base de datos
$conect = conect($bd_config);
if (!$conect) {
    header('Location: ../error.php');
}

$id = clsData($_GET['id']);

// Comprobamos que exista un ID
if (!$id) {
    header('Location: ' . url . '/Config');
}

$statement = $conect->prepare('DELETE FROM articulos WHERE id = :id');
$statement->execute(array('id' => $id));

header('Location: ' . url . '/Config');
