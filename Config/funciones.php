<?php
//require 'Config.php';

# Funcion para conectarnos a la base de datos.
# Return: la conexion o false si hubo un problema.
function conect($bd_config)
{

    try {
        $con = new PDO('mysql:host=localhost;dbname=' . $bd_config['database'], $bd_config['user'], $bd_config['pass']);
        return $con;
    } catch (PDOException $e) {
        return false;
    }
}

# Funcion para limpiar y convertir datos como espacios en blanco, barras y caracteres especiales en entidades HTML.
# Return: los datos limpios y convertidos en entidades HTML.
function clsData($datos)
{
    // Eliminamos los espacios en blanco al inicio y final de la cadena
    $datos = trim($datos);

    // Quitamos las barras / escapandolas con comillas
    $datos = stripslashes($datos);

    // Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)   
    $datos = htmlspecialchars($datos);
    return $datos;
}

# Funcion para obtener los post determinando cuantos queremos traer por pagina.
# Return: Los post dependiendo de la pagina que estemos y cuantos post por pagina establecimos.
function getPost($post_pag, $conect)
{
    //1.- Obtenemos la pagina actual
    // $pagina_actual = isset($_GET['p']) ? (int)$_GET['p']: 1;
    // Para reutilizar el codigo creamos una funcion que nos dice la pagina actual.

    //2.- Determinamos desde que post se mostrara en pantalla
    $inicio = (pag_actual() > 1) ? pag_actual() * $post_pag - $post_pag : 0;
    //3.- Preparamos nuestra consulta trayendo la informacion e indicandole desde donde y cuantas filas.
    // Ademas le pedimos que nos cuente cuantas filas tenemos.
    $sentencia = $conect->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_pag");

    $sentencia->execute();
    return $sentencia->fetchAll();
}

function id_article($id)
{
    return (int)clsData($id);
}

# Funcion para obtener la pagina actual
# Return: El numero de la pagina si esta seteado, sino entonces retorna 1.
function pag_actual()
{
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

# Funcion para obtener un post por ID
# Return: El post, o false si no se encontro ningun post con ese ID.
function getPostsId($conect, $id)
{
    $result = $conect->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
    $result = $result->fetchAll();
    return ($result) ? $result : false;
}

# Funcion para calcular el numero de paginas que tendra la paginacion.
# Return: El numero de paginas
function num_pag($post_pag, $conect)
{
    //4.- Calculamos el numero de filas / articulos que nos devuelve nuestra consulta
    $total_post = $conect->prepare("SELECT FOUND_ROWS() AS total");
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];

    //5. Calculamos el numero de paginas que habra en la paginacion
    $num_pag = ceil($total_post / $post_pag);
    return $num_pag;
}

# Funcion para traducir la fecha de formato timestamp a español.
# Return: La fecha en español.
function fecha($fecha)
{
    $timestamp = strtotime($fecha);
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $dia = date('d', $timestamp);

    // -1 porque los meses en la funcion date empiezan desde el 1
    $mes = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $fecha = "$dia de " . $meses[$mes] . " del $year";
    return $fecha;
}
