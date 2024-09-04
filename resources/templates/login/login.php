<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/CRUDUsers/resources/static/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div style="text-align:center;">
                    <img src="/CRUDUsers/resources/static/img/copia-logo-istrategy.svg" alt="Logo" width="40%">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Iniciar Sesión</h2>
                <h3 class="text-center mt-5">Ingresa tus datos a continuación</h3>
                <?php
                session_start();
                if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']); // Eliminar el mensaje de error después de mostrarlo
                        ?>
                    </div>
                <?php endif; ?>
                <form action="./../../../app/controllers/login/login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa tu nombre de usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div style="text-align:center;">
                        <button type="submit" class="btn btn-danger">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
