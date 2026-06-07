<?php
class Peluquero {
    private PDO $conn;
    private $table_name = "peluqueros";

    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Método para traer todos los peluqueros de la DB
    public function listar() {
        $query = "SELECT id, nombre, correo FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}