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

// Comprobamos si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = clsData($_POST['titulo']);
    $extracto = clsData($_POST['extracto']);
    $texto = $_POST['texto'];
    $thumb = $_FILES['thumb']['tmp_name'];

    // Direccion final del archivo incluyendo el nombre
    # Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que
    # tenemos que concatenar al inicio '../' para bajar a la raiz de nuestro proyecto.
    $archivos = '../' . $blog_config['img'] . $_FILES['thumb']['name'];

    // Subimos el archivo
    move_uploaded_file($thumb, $archivos);

    $statement = $conect->prepare(
        'INSERT INTO articulos (id, titulo, extracto, texto, thumb) 
		VALUES (null, :titulo, :extracto, :texto, :thumb)'
    );

    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $_FILES['thumb']['name']
    ));

    header('Location: ' . url . '/Config');
}

require '../Views/nuevo.view.php';
