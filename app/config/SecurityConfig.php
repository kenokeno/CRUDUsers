<?php
class SecurityConfig {
    private $conn;

    public function __construct($db) {
        $this->conn = $db->getPDO();
    }

    public function validateSession($username, $password) {

        $query = "SELECT id, username, password FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Verificar si se encontró el usuario
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                // Iniciar sesión
                $_SESSION['user_id'] = $user['id'];
                header('Location: /CRUDUsers/index.php'); // Redirigir a la página principal
                exit();
            } else {
                $_SESSION['error'] = 'Contraseña incorrecta';
            }
        } else {
            $_SESSION['error'] = 'Nombre de usuario no encontrado';
        }
        header('Location: /CRUDUsers/resources/templates/login/login.php'); // Redirigir de vuelta a la página de inicio de sesión
        exit();
    }
}
?>
