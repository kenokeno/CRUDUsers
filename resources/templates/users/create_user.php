<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="/CRUDUsers/resources/static/css/styles.css">
    <style>
        .nav {
            display: flex;
            flex-direction: column;
            align-items: center;
          }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-11 offset-1">
                <nav class="navbar">
                    <a class="navbar-brand" href="#">
                        <img src="/CRUDUsers/resources/static/img/logo-istrategy.svg" alt="Logo">
                    </a>
                </nav>
            </div>
        </div>
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="/CRUDUsers/index.php"><img src="/CRUDUsers/resources/static/img/avion.png" width="60px" alt="Logo"/></a>
                        </li>
                        <li class="nav-item">
                            <img src="/CRUDUsers/resources/static/img/redes1.png" width="60px" alt="Logo">
                        </li>
                        <li class="nav-item">
                            <img src="/CRUDUsers/resources/static/img/redes2.png" width="60px" alt="Logo">
                        </li>
                        <li class="nav-item">
                            <img src="/CRUDUsers/resources/static/img/redes3.png" width="60px" alt="Logo">
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <?php            
                            session_start();
                            if (isset($_SESSION['message'])): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']); // Eliminar el mensaje de error después de mostrarlo
                                    ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <h2 class="text-center mt-5">Crear Nuevo Usuario</h2>
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
                            <form id="createUserForm">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirmar Contraseña:</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                    <br>
                                </div>
                                <p id="mensaje"></p>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cellphone" class="form-label">Teléfono Celular</label>
                                    <input type="text" class="form-control" id="cellphone" name="cellphone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="join_date" class="form-label">Fecha de Ingreso</label>
                                    <input type="date" class="form-control" id="join_date" name="join_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Género</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Rol</label>
                                    <input type="text" class="form-control" id="role" name="role" required>
                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label">Salario</label>
                                    <input type="number" class="form-control" id="salary" name="salary" required>
                                </div>
                                <div style="text-align:center;">
                                    <button type="submit" class="btn btn-danger">Crear Usuario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/CRUDUsers/resources/static/js/users.js"></script>
</body>
</html>
