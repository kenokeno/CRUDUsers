<?php
session_start();
session_unset();
session_destroy();
header('Location: /CRUDUsers/resources/templates/login/login.php');
exit();
?>
