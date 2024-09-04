<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="./resources/static/css/styles.css">
    
</head>
<body onload="load()">
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
                            <a href="/CRUDUsers/resources/templates/users/create_user.php" class="btn btn-danger">Crear Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/CRUDUsers/index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/CRUDUsers/index.php">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Configuración</a>
                        </li>
                        <li class="nav-item">
                            <a href="/CRUDUsers/app/controllers/login/logout.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container">
                    <div class="row">
                        <div class="col">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 offset-3">
                            <h1>Lista de Usuarios</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 offset-3">
                            <table data-order='[[ 1, "asc" ]]' data-page-length='10' class="table table-striped" id="usersTable">
                                <thead>
                                    <tr>
                                        <th style="background-color: #E11F33;color: white;">ID</th>
                                        <th style="background-color: #E11F33;color: white;">Nombre de Usuario</th>
                                        <th style="background-color: #E11F33;color: white;">Email</th>
                                        <th style="background-color: #E11F33;color: white;">Teléfono</th>
                                        <th style="background-color: #E11F33;color: white;">Rol</th>
                                        <th style="background-color: #E11F33;color: white;">Fecha de Ingreso</th>
                                        <th style="background-color: #E11F33;color: white;">Salario</th>
                                        <th style="background-color: #E11F33;color: white;">Editar</th>
                                        <th style="background-color: #E11F33;color: white;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="userTableBody">
                                    <!-- Los datos se llenarán aquí mediante jQuery -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./resources/static/js/users.js"></script>
</body>
</html>
