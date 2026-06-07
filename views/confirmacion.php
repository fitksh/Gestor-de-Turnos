<?php

include 'views/layout/header.php';
require_once 'Models/Turno.php';

$idPeluquero = (int) $_POST['id_peluquero'];

$fecha = $_POST['fecha'];

$hora = $_POST['hora'];

$contacto = trim($_POST['contacto']);

$fechaInicio = $fecha . ' ' . $hora . ':00';

$fechaFin = date(
    'Y-m-d H:i:s',
    strtotime($fechaInicio . ' +1 hour')
);

/** @var PDO $db */
$turnoModel = new Turno($db);

$guardado = false;

if (!$turnoModel->existeTurno($idPeluquero, $fechaInicio)) {

    $guardado = $turnoModel->guardar(
        $idPeluquero,
        $fechaInicio,
        $fechaFin,
        $contacto
    );
}
?>

<?php if ($guardado): ?>

<div class="row justify-content-center text-center py-4">
    <div class="col-md-6">

        <div class="card shadow-sm border-0 p-5 bg-white rounded">

            <div class="text-success display-1 mb-3">✔️</div>

            <h2 class="text-success fw-bold mb-3">
                ¡Reserva Exitosa!
            </h2>

            <div class="alert alert-success border-0 fw-bold mb-4">
                SE HA AGREGADO EL REGISTRO DEL TURNO CORRECTAMENTE
            </div>

            <p class="text-muted mb-4">
                Te esperamos en la sucursal el día del turno.
                Recordá llegar con 10 minutos de anticipación.
            </p>

            <div class="d-grid gap-2 col-md-8 mx-auto">
                <a href="index.php?page=home"
                   class="btn btn-dark fw-bold py-2">
                    Volver al Inicio
                </a>
            </div>

        </div>

    </div>
</div>

<?php else: ?>

<div class="row justify-content-center text-center py-4">
    <div class="col-md-6">

        <div class="card shadow-sm border-0 p-5 bg-white rounded">

            <div class="text-danger display-1 mb-3">❌</div>

            <h2 class="text-danger fw-bold mb-3">
                Turno No Disponible
            </h2>

            <div class="alert alert-danger border-0 fw-bold mb-4">
                El horario seleccionado ya fue reservado por otra persona.
            </div>

            <p class="text-muted mb-4">
                Por favor seleccioná otro horario disponible.
            </p>

            <div class="d-grid gap-2 col-md-8 mx-auto">

                <a href="javascript:history.back()"
                   class="btn btn-warning fw-bold">
                    Elegir Otro Horario
                </a>

                <a href="index.php?page=home"
                   class="btn btn-outline-secondary">
                    Volver al Inicio
                </a>

            </div>

        </div>

    </div>
</div>

<?php endif; ?>

<?php include 'views/layout/footer.php'; ?>