<?php 
require_once 'IConnectDB.php';

class MySQLDB implements IConnectDB{
	private $host = 'localhost';
    private $db = 'istrategy';
    private $user = 'root';
    private $pass = 'root2024';
    private $charset = 'utf8mb4';
    private $pdo;
    private $error;

    // Constructor
    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo "Connection failed: " . $this->error;
        }
    }

    // Método para obtener la instancia de PDO
    public function getPDO() {
        return $this->pdo;
    }
}
?>