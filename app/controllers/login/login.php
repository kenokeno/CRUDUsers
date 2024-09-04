<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/../../app/db/MySQLDB.php');
require_once(__ROOT__.'/../../app/config/SecurityConfig.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $database = new MySQLDB();
    $sc = new SecurityConfig($database);
    $sc->validateSession($username,$password);
}
?>
