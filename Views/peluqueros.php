<?php 

include 'views/layout/header.php'; 

// Instanciamos el modelo utilizando la conexión $db creada en index.php
/** @var PDO $db */
$peluqueroModel = new Peluquero($db);
$resultado = $peluqueroModel->listar();
?>

<div class="row justify-content-center text-center mb-4">
    <div class="col-md-8">
        <h2 class="text-dark fw-bold">Nuestros Profesionales</h2>
        <p class="text-muted">Seleccioná el peluquero con el que deseas agendar tu turno:</p>
    </div>
</div>

<div class="row g-4 justify-content-center">
    
    <?php if ($resultado->rowCount() > 0): ?>
        <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body text-center py-4">
                        <h5 class="card-title fw-bold text-dark"><?= htmlspecialchars($row['nombre']) ?></h5>
                        <p class="text-muted card-text small"><?= htmlspecialchars($row['correo']) ?></p>
                        <a href="index.php?page=calendario&id_peluquero=<?= $row['id'] ?>" class="btn btn-outline-dark fw-bold w-100 mt-2">
                            Ver Disponibilidad
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="col-md-6 text-center">
            <div class="alert alert-warning">No hay peluqueros disponibles en este momento.</div>
        </div>
    <?php endif; ?>

</div>

<?php include 'views/layout/footer.php'; ?>