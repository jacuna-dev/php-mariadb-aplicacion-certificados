<?php include_once('../templates/cabecera.php'); ?>
<?php include_once('../secciones/cursos.php'); ?>

<div class="row">
    <div class="col-12">
        <br>
        <div class="row">
            <div class="col-md-5">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            Cursos
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
                    <?php foreach($listaCursos as $curso) { ?>
                        <tr>
                            <td><?php echo $curso['id']; ?></td>
                            <td><?php echo $curso['nombre']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $curso['id']; ?>">
                                    <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once('../templates/pie.php'); ?>
