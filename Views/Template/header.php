<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo url; ?>/assets/css/style.css">

    <title>Blog</title>
</head>

<body>
    <header>
        <div class="conteiner">
            <div class="logo-left">
                <p><a href="<?php echo url; ?>">Blog Ecuador</a></p>
            </div>

            <div class="header-redes">
                <form name="busqueda" class="buscar" action="<?php echo url; ?>/buscar.php" method="GET">
                    <input type="text" name="busqueda" placeholder="Buscar...">
                    <button type="submit" class="icon fa fa-search"></button>
                </form>

                <nav class="menu">
                    <ul>
                        <li><a href="#">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                        <li><a href="#">
                                <i class="fa fa-instagram"></i>
                            </a></li>
                        <li><a href="#">Contacto <i class="icon fa fa-envelope"></i></a></li>
                        <li><a href="login.php"><i class="fa fa-user"></i></a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>