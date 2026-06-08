<?php

require_once __DIR__ . '/../models/Peluquero.php';

class PeluqueroController
{
    public function __construct(private PDO $db)
    {
    }

    public function index(): void
    {
        $peluqueroModel = new Peluquero($this->db);
        $resultado = $peluqueroModel->listar();

        include __DIR__ . '/../views/peluqueros.php';
    }
}
