<?php session_start();
require 'Config.php';
require 'funciones.php';

$conect = conect($bd_config);
if (!$conect) {
    header('Location: ../error.php');
}

comprobarSession();

// Determinamos si se estan enviado datos por el metodo POST o GET
# Si se envian por POST significa que el usuario los ha enviado desde el formulario
# por lo que tomamos los datos y los cambiamos en la base de datos.

# De otra forma significa que hay datos enviados por el metodo GET
# es decir, el ID que pasamos por la URL, si es asi entonces traemos los 
# datos de la base de datos a pantalla para que el usuario los pueda modificar.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = clsData($_POST['titulo']);
    $extracto = clsData($_POST['extracto']);
    $texto = $_POST['texto'];
    $id = clsData($_POST['id']);
    $thumb_guardado = $_POST['thumb-guardado'];
    $thumb = $_FILES['thumb'];

    # Comprobamos que el nombre del thumb no este vacio, si lo esta
    # significa que el usuario no agrego una nueva thumb y entonces utilizamos la thumb anterior.
    if (empty($thumb['name'])) {
        $thumb = $thumb_guardado;
    } else {
        // De otra forma cargamos la nueva thumb
        // Direccion final del archivo incluyendo el nombre
        # Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que
        # tenemos que concatenar al inicio '../' para bajar a la raiz de nuestro proyecto.
        $archivos = '../' . $blog_config['img'] . $_FILES['thumb']['name'];

        // Subimos el archivo
        move_uploaded_file($_FILES['thumb']['name'], $archivos);
        $thumb = $_FILES['thumb']['name'];
    }
    $statement = $conect->prepare(
        'UPDATE articulos
		SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id'
    );

    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $thumb,
        ':id' => $id
    ));

    header('Location: ' . url . '/Config');
} else {
    $id_article = id_article($_GET['id']);

    if (empty($id_article)) {
        header('Location: ' . url . '/Config');
    }

    $post = getPostsId($conect, $id_article);

    if (!$post) {
        header('Location: ' . url . '/Config/index.php');
    }
    $post = $post[0];
}

require '../Views/editar.view.php';
