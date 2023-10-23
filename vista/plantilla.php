<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>

<div class="container-fluid">
  <h3 class="text-center title" >Control de Gastos</h3>
  <h3 class="text-center title" style="font-size: 24px" >Actividad UTN</h3>
</div>

    <!--===================================
    BOTONERA
    ====================================-->

    <div class="container-fluid bg-light">
        <div class="container">

            <ul class="nav nav-justified py nav-pills">

                <?php if (isset($_GET['pagina'])) : ?>

                    <?php if ($_GET['pagina'] == "registro") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=registro">Registro</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET['pagina'] == "ingreso") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET['pagina'] == "inicio") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=inicio">Inicio</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=inicio">Inicio</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET['pagina'] == "salir") : ?>
                        <li class="nav-item">
                            <a class="nav-link active " href="index.php?pagina=salir">Salir</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?pagina=salir">Salir</a>
                        </li>
                    <?php endif ?>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=registro">Registro</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pagina=ingreso">Ingreso</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="index.php?pagina=inicio">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="index.php?pagina=salir">Salir</a>
                    </li>
                <?php endif ?>
            </ul>

        </div>

    </div>

    <!--===================================
    CONTENIDO
    ====================================-->

    <div class="container-fluid bg-light">
        <div class="container py-5">
            <?php
            if (isset($_GET['pagina'])) {

                if (
                    $_GET['pagina'] == "registro" ||
                    $_GET['pagina'] == "ingreso"  ||
                    $_GET['pagina'] == "inicio"   ||
                    $_GET['pagina'] == "salir"    ||
                    $_GET['pagina'] == "editar"   ||
                    $_GET['pagina'] == "por_categoria" ||
                    $_GET['pagina'] == "por_fecha" ||  
                    $_GET['pagina'] == "categoria" ||
                    $_GET['pagina'] == "ver"       ||
                    $_GET['pagina'] == "editar_categoria"

                ) {

                    include "paginas/" . $_GET['pagina'] . ".php";
                } else {
                    include "paginas/error404.php";
                }
            } else {
                include "paginas/ingreso.php";
            }

            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="vista/js/script.js"></script>


</body>

    <!--===================================
    FOOTER
    ====================================-->

    <footer class="bg-dark text-white text-center py-2">
        <p>Sebastian Laguilón</p>
    </footer>

