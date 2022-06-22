<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}
?>

<!doctype html>
<html lang="es">
    <head>
        <title>Certificados</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS v5.2.0-beta1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Inicio<span class="visually-hidden">(current)</span></a>
                <a class="nav-item nav-link" href="vista_alumnos.php">Alumnos</a>
                <a class="nav-item nav-link" href="vista_cursos.php">Cursos</a>
                <a class="nav-item nav-link" href="cerrar.php">Cerrar sesión</a>
            </div>
        </nav>
        <div class="container">
