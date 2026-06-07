<?php include 'views/layout/header.php'; 
    
    
$idPeluquero = (int) ($_GET['id_peluquero'] ?? 0);
$fecha = $_GET['fecha'] ?? '';
$hora = $_GET['hora'] ?? '';

?>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-4 bg-white">
                
                <h3 class="fw-bold text-dark text-center mb-4">Completá tu Reserva</h3>
                
                <div class="alert alert-secondary border-0 mb-4 text-center">
                    <span class="d-block text-uppercase small text-muted fw-bold">
                        Turno Elegido
                    </span>

                    <strong>
                        <?= htmlspecialchars($fecha) ?>
                        -
                        <?= htmlspecialchars($hora) ?> hs
                    </strong>
                </div>

                <form action="index.php?page=confirmacion" method="POST">
                    
                    <div class="mb-3">
                        <label for="contacto" class="form-label fw-bold text-secondary">Correo Electrónico o Teléfono</label>
                        <input type="text" class="form-control form-control-lg" id="contacto" name="contacto" placeholder="ejemplo@correo.com o 1123456789" required>
                        <div class="form-text text-muted">Usaremos esto únicamente para validar y agendar tu turno.</div>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-warning btn-lg fw-bold text-dark py-3 shadow-sm">
                            CONFIRMAR RESERVA
                        </button>
                        <a href="index.php?page=calendario" class="btn btn-light py-2">Cancelar y volver</a>
                    </div>
                    <input type="hidden" name="id_peluquero" value="<?= $idPeluquero ?>">
                    <input type="hidden" name="fecha" value="<?= $fecha ?>">
                    <input type="hidden" name="hora" value="<?= $hora ?>">

                </form>

            </div>
        </div>
    </div>

    <?php include 'views/layout/footer.php'; ?>