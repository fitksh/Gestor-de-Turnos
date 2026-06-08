<?php
class Database {
    private string $host;
    private string $db_name;
    private string $username;
    private string $password;
    private string $port;
    public ?PDO $conn;

    public function __construct()
    {
        // Leemos directamente del array superglobal $_ENV inyectado por Dotenv
        $this->host     = $_ENV['HOST'] ?? 'localhost';
        $this->db_name  = $_ENV['DB_NAME'] ?? null;
        $this->username = $_ENV['USERNAME'] ?? 'root';
        $this->password = $_ENV['PASSWORD'] ?? '';
        $this->port     = $_ENV['PORT'] ?? '3306';
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            die("<div style='padding:20px; background:#f8d7da; color:#721c24; font-family:sans-serif;'>
                    <strong>Error de conexión de la App:</strong> " . $exception->getMessage() . "
                 </div>");
        }
        return $this->conn;
    }
}