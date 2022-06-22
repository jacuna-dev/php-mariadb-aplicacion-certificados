<?php
include_once '../configuraciones/bd.php';

$conexion = BD::crearInstancia();

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

if (!empty($accion)) {
    switch ($accion) {
        case 'agregar':
            $sql = 'INSERT INTO cursos (nombre) VALUES (:nombre)';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->execute();
            break;
        case 'editar':
            $sql = 'UPDATE cursos SET nombre = :nombre WHERE id = :id';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;
        case 'borrar':
            $sql = 'DELETE FROM cursos WHERE id = :id';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;
        case 'Seleccionar':
            $sql = 'SELECT * FROM cursos WHERE id = :id';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $curso = $consulta->fetch(PDO::FETCH_ASSOC);
            $nombre = $curso['nombre'];
            break;
        }
}

$consulta = $conexion->prepare('SELECT * FROM cursos');
$consulta->execute();
$listaCursos = $consulta->fetchAll();
