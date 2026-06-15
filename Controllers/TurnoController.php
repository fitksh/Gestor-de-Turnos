<?php

require_once __DIR__ . '/../models/Turno.php';

class TurnoController
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function renderCalendario(): void
    {
        $idPeluquero = (int) ($_GET['id_peluquero'] ?? 0);

        $turnoModel = new Turno($this->db);
        $ocupados = $turnoModel->obtenerOcupados($idPeluquero);

        $turnosOcupados = [];
        foreach ($ocupados as $turno) {
            $fechaHora = date('Y-m-d H:i', strtotime($turno['fecha_inicio']));
            $turnosOcupados[$fechaHora] = true;
        }

        // Datos en español para los títulos de las fechas
        $diasSemana = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
        $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

        // Generar títulos en español para los próximos 6 días
        $fechas = [];
        for ($dia = 0; $dia < 6; $dia++) {
            $fecha = date('Y-m-d', strtotime("+$dia days"));
            $timestamp = strtotime($fecha);
            $diaSemana = $diasSemana[date('w', $timestamp)];
            $diaNum = date('d', $timestamp);
            $mes = $meses[date('n', $timestamp) - 1];

            $fechas[$fecha] = [
                'titulo' => ucfirst($diaSemana) . ' ' . $diaNum . ' de ' . $mes
            ];
        }

        include __DIR__ . '/../views/calendario.php';
    }

    public function confirmarTurno(): void
    {
        $idPeluquero = (int) ($_POST['id_peluquero'] ?? 0);
        $fecha = trim($_POST['fecha'] ?? '');
        $hora = trim($_POST['hora'] ?? '');
        $contacto = trim($_POST['contacto'] ?? '');

        $guardado = false;

        if ($idPeluquero > 0 && $fecha !== '' && $hora !== '' && $contacto !== '') {
            $fechaInicio = sprintf('%s %s:00', $fecha, $hora);
            $fechaFin = date('Y-m-d H:i:s', strtotime($fechaInicio . ' +1 hour'));

            $turnoModel = new Turno($this->db);

            if (!$turnoModel->existeTurno($idPeluquero, $fechaInicio)) {
                $guardado = $turnoModel->guardarTurno(
                    $idPeluquero,
                    $fechaInicio,
                    $fechaFin,
                    $contacto
                );
            }
        }

        include __DIR__ . '/../views/confirmacion.php';
    }
}
