<?php

include 'views/layout/header.php';

require_once 'Models/Turno.php';

/** @var PDO $db */

$idPeluquero = (int) ($_GET['id_peluquero'] ?? 0);

$turnoModel = new Turno($db);
$ocupados = $turnoModel->obtenerOcupados($idPeluquero);

$turnosOcupados = [];

foreach ($ocupados as $turno) {

    $fechaHora = date(
        'Y-m-d H:i',
        strtotime($turno['fecha_inicio'])
    );

    $turnosOcupados[$fechaHora] = true;
}

$horarios = [
    '09:00',
    '10:00',
    '11:00',
    '12:00',
    '15:00',
    '16:00',
    '17:00'
];
?>

<div class="row justify-content-center text-center mb-4">
    <div class="col-md-8">
        <h2 class="text-dark fw-bold">Seleccioná Día y Horario</h2>
        <p class="text-muted">Turnos disponibles para atenderte con el profesional seleccionado.</p>
    </div>
</div>

<div class="row g-3 justify-content-center mb-5">

<?php for ($dia = 0; $dia < 7; $dia++): ?>

    <?php
        $fecha = date('Y-m-d', strtotime("+$dia days"));

        $titulo = strftime(
            '%A %d de %B',
            strtotime($fecha)
        );
    ?>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">

            <div class="card-header bg-dark text-warning text-center fw-bold">
                <?= ucfirst($titulo) ?>
            </div>

            <div class="card-body p-3">

                <div class="d-grid gap-2">

                    <?php foreach ($horarios as $hora): ?>

                        <?php
                            $clave = $fecha . ' ' . $hora;

                            $ocupado = isset(
                                $turnosOcupados[$clave]
                            );
                        ?>

                        <?php if ($ocupado): ?>

                            <button
                                class="btn btn-danger py-2 fw-bold"
                                disabled
                            >
                                <?= $hora ?> hs - Ocupado
                            </button>

                        <?php else: ?>

                            <a
                                href="index.php?page=reserva&id_peluquero=<?= $idPeluquero ?>&fecha=<?= $fecha ?>&hora=<?= $hora ?>"
                                class="btn btn-success py-2 fw-bold"
                            >
                                <?= $hora ?> hs - Disponible
                            </a>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>
    </div>

<?php endfor; ?>

</div>

<div class="text-center">
    <a href="index.php?page=peluqueros" class="btn btn-outline-secondary px-4">Volver a Peluqueros</a>
</div>

<?php include 'views/layout/footer.php'; ?>