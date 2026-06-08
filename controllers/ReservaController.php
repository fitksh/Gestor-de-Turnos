<?php

class ReservaController
{
    public function __construct(private PDO $db)
    {
    }

    public function index(): void
    {
        $idPeluquero = (int) ($_GET['id_peluquero'] ?? 0);
        $fecha = trim($_GET['fecha'] ?? '');
        $hora = trim($_GET['hora'] ?? '');

        include __DIR__ . '/../views/reserva.php';
    }
}
