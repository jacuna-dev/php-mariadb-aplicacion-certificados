<?php include_once('../templates/cabecera.php'); ?>
<?php include_once('../secciones/alumnos.php'); ?>

<div class="row">
    <div class="col-12">
        <br>
        <div class="row">
            <div class="col-md-5">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            Alumnos
                        </div>
                        <div class="card-body">
                            <div class="mb-3 d-none">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" aria-describedby="helpId" placeholder="ID">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" aria-describedby="helpId" placeholder="Nombre">
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $apellido; ?>" aria-describedby="helpId" placeholder="Apellido">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Cursos del alumno:</label>
                                <select multiple class="form-control" name="cursos[]" id="listaCursos">
                                <?php foreach ($cursos as $curso) { ?>
                                    <option
                                    <?php
                                        if (!empty($arregloCursos)):
                                            if (in_array($curso['id'], $arregloCursos)):
                                                echo 'selected';
                                            endif;
                                        endif;
                                    ?>
                                    value="<?php echo $curso['id'] ?>"><?php echo $curso['id'] ?> - <?php echo $curso['nombre'] ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="btn-group" role="group" aria-label="">
                                <button type="submit" class="btn btn-success" name="accion" value="agregar">Agregar</button>
                                <button type="submit" class="btn btn-warning" name="accion" value="editar">Editar</button>
                                <button type="submit" class="btn btn-danger" name="accion" value="borrar">Borrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($listaAlumnos as $alumno): ?>
                        <tr>
                            <td><?php echo $alumno['id']; ?></td>
                            <td>
                                <?php echo $alumno['nombre']; ?> <?php echo $alumno['apellido']; ?>
                                <br>
                                <?php foreach ($alumno['cursos'] as $curso) { ?>
                                    - <a href="certificado.php?curso=<?php echo $curso['id']; ?>&alumno=<?php echo $alumno['id']; ?>">
                                    <i class="bi bi-filetype-pdf text-danger"></i> <?php echo $curso['nombre'] ?></a><br>
                                <?php } ?>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $alumno['id']; ?>">
                                    <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect('#listaCursos');
</script>

<?php include_once('../templates/pie.php'); ?>
