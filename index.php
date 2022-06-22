<?php
session_start();

if ($_POST) {
    $mensaje = 'Usuario o contraseña incorrectos.';

    if ($_POST['usuario'] == 'develoteca' && $_POST['contrasenia'] == 'admin') {
        $_SESSION['usuario'] = $_POST['usuario'];
        header('Location: secciones/index.php');
    }
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
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <br>
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                Inicio de sesión
                            </div>
                            <div class="card-body">
                                <?php if (isset($mensaje)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $mensaje; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario">
                                    <small id="helpId" class="form-text text-muted">Escriba su usuario</small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Contraseña">
                                    <small id="helpId" class="form-text text-muted">Escriba su contraseña</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>
