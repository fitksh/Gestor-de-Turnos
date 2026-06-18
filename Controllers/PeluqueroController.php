<?php

require_once __DIR__ . '/../models/Peluquero.php';

class PeluqueroController
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function renderPeluqueros(): void
    {
        $peluqueroModel = new Peluquero($this->db);
        $resultado = $peluqueroModel->listar();

        include __DIR__ . '/../views/peluqueros.php';
    }
}
