<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('__ROOT__', dirname(dirname(__FILE__)));

// Verificar si la sesión está activa
require_once(__ROOT__.'/../../app/config/LogicalException.php');
// Verificar si la sesión está activa
if (!isset($_SESSION['user_id'])) {
    throw new LogicalException('No ha iniciado sesión', 'error');
}

// Incluir las clases
require_once(__ROOT__.'/../../app/db/MySQLDB.php');
require_once(__ROOT__.'/../../app/models/User.php');
require_once(__ROOT__.'/../../app/models/UserRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Crear una instancia de la base de datos
    $database = new MySQLDB();

    // Crear una instancia del repositorio de usuarios
    $userRepository = new UserRepository($database);

    $id = $_GET['id'];
    $usuario = $userRepository->getById($id);

    echo json_encode($usuario);
}
?>
