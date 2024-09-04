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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una instancia de la base de datos
    $database = new MySQLDB();

    // Crear una instancia del repositorio de usuarios
    $userRepository = new UserRepository($database);

    $user = new User($_POST['id'],"", $_POST['password'], null, $_POST['email'], $_POST['cellphone'], null,$_POST['gender'], $_POST['role'], $_POST['salary']);

    $isUpdate = $userRepository->update($user);

    if($isUpdate){
        $_SESSION['message'] = 'Registro actualizado exitosamente';
    }

    // Devolver los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($user);
}
?>
