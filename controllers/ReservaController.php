<?php

class ReservaController
{
    public function __construct()
    {
    }

    public function renderReserva(): void
    {
        $idPeluquero = (int) ($_GET['id_peluquero'] ?? 0);
        $fecha = trim($_GET['fecha'] ?? '');
        $hora = trim($_GET['hora'] ?? '');

        include __DIR__ . '/../views/reserva.php';
    }
}
