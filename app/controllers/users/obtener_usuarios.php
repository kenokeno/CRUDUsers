<?php
session_start();

// Incluir las clases
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__.'/../../app/config/LogicalException.php');
// Verificar si la sesión está activa
if (!isset($_SESSION['user_id'])) {
    throw new LogicalException('No ha iniciado sesión', 'error');
}

require_once(__ROOT__.'/../../app/db/MySQLDB.php');
require_once(__ROOT__.'/../../app/models/User.php');
require_once(__ROOT__.'/../../app/models/UserRepository.php');

// Crear una instancia de la base de datos
$database = new MySQLDB();

// Crear una instancia del repositorio de usuarios
$userRepository = new UserRepository($database);

// Obtener la lista de usuarios
$users = $userRepository->getUsers();

// Convertir la lista de usuarios a un array
$userArray = [];

foreach ($users as $user) {
    $userArray[] = [
        'id' => $user->getId(),
        'username' => $user->getUsername(),
        'password' => $user->getPassword(),
        'latest_access_date' => $user->getLatestAccessDate(),
        'cellphone' => $user->getCellphone(),
        'join_date' => $user->getJoinDate(),
        'email' => $user->getEmail(),
        'salary' => $user->getSalary(),
        'role' => $user->getRole()
    ];
}

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($userArray);
?>
