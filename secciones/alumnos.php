<?php
include_once '../configuraciones/bd.php';

$conexion = BD::crearInstancia();

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$cursos = isset($_POST['cursos']) ? $_POST['cursos'] : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

if (!empty($accion)) {
    switch ($accion) {
        case 'agregar':
            $sql = 'INSERT INTO alumnos (nombre, apellido) VALUES (:nombre, :apellido)';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellido', $apellido);
            $consulta->execute();
            $id = $conexion->lastInsertId();

            foreach ($cursos as $curso) {
                $sql = 'INSERT INTO alumnos_cursos (alumno, curso) VALUES (:alumno, :curso)';
                $consulta = $conexion->prepare($sql);
                $consulta->bindParam(':alumno', $id);
                $consulta->bindParam(':curso', $curso);
                $consulta->execute();
            }

            break;
        case 'editar':
            $sql = 'UPDATE alumnos SET nombre = :nombre, apellido = :apellido WHERE id = :id';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellido', $apellido);
            $consulta->bindParam(':id', $id);
            $consulta->execute();

            if (isset($cursos)) {
                $sql = 'DELETE FROM alumnos_cursos WHERE alumno = :id';
                $consulta = $conexion->prepare($sql);
                $consulta->bindParam(':id', $id);
                $consulta->execute();

                foreach ($cursos as $curso) {
                    $sql = 'INSERT INTO alumnos_cursos (alumno, curso) VALUES (:alumno, :curso)';
                    $consulta = $conexion->prepare($sql);
                    $consulta->bindParam(':alumno', $id);
                    $consulta->bindParam(':curso', $curso);
                    $consulta->execute();
                }

                $arregloCursos = $cursos;
            }

            break;
        case 'borrar':
            $sql = 'DELETE FROM alumnos WHERE id = :id';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;
        case 'Seleccionar':
            $sql = 'SELECT * FROM alumnos WHERE id = :id';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $alumno = $consulta->fetch(PDO::FETCH_ASSOC);
            $nombre = $alumno['nombre'];
            $apellido = $alumno['apellido'];

            $sql = 'SELECT cursos.id FROM alumnos_cursos
                INNER JOIN cursos ON cursos.id = alumnos_cursos.curso
                WHERE alumnos_cursos.alumno = :id';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $cursosAlumno = $consulta->fetchAll(PDO::FETCH_ASSOC);

            foreach ($cursosAlumno as $curso) {
                $arregloCursos[] = $curso['id'];
            }

            break;
        }
}

$consulta = $conexion->prepare('SELECT * FROM alumnos');
$consulta->execute();
$listaAlumnos = $consulta->fetchAll();

foreach ($listaAlumnos as $clave => $alumno) {
    $sql = 'SELECT * FROM cursos
        WHERE id IN (SELECT curso FROM alumnos_cursos WHERE alumno = :id)';
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':id', $alumno['id']);
    $consulta->execute();
    $cursosAlumno = $consulta->fetchAll();
    $listaAlumnos[$clave]['cursos'] = $cursosAlumno;
}

$sql = 'SELECT * FROM cursos';
$listaCursos = $conexion->query($sql);
$cursos = $listaCursos->fetchAll();
