<?php 

include 'views/layout/header.php'; 
?>

<div class="row justify-content-center text-center py-5 bg-white rounded shadow-sm border mb-4">
    <div class="col-md-9 px-4">
        <span class="badge bg-dark text-warning mb-3 px-3 py-2 text-uppercase fw-bold及 tracking-wider">
            Turnos Online Sencillos
        </span>
        <h1 class="display-5 fw-bold text-dark mb-3">Tu estilo, en manos de profesionales</h1>
        <p class="lead text-muted mb-4">
            Reservá tu lugar de forma rápida, intuitiva y práctica. Elegí a tu peluquero favorito y asegurá tu turno en segundos sin necesidad de registrarte con contraseñas.
        </p>
        
        <div class="d-grid gap-2 col-md-6 mx-auto my-4">
            <a href="index.php?page=peluqueros" class="btn btn-warning btn-lg fw-bold shadow py-3 text-dark fs-5">
                ✂️ SACAR TURNO AHORA
            </a>
        </div>
        
        <small class="text-muted d-block mt-2">
            * Solo necesitás tu correo electrónico o número de teléfono.
        </small>
    </div>
</div>

<div class="row g-4 mt-2">
    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4">
                <h5 class="card-title fw-bold text-dark mb-3">🕒 Horarios de Atención</h5>
                <ul class="list-unstyled text-muted lh-lg mb-0">
                    <li class="border-bottom py-2 d-flex justify-content-between">
                        <span>Lunes a Viernes</span> 
                        <span class="badge bg-light text-dark fw-normal">09:00 - 20:00 hs</span>
                    </li>
                    <li class="border-bottom py-2 d-flex justify-content-between">
                        <span>Sábados</span> 
                        <span class="badge bg-light text-dark fw-normal">09:00 - 18:00 hs</span>
                    </li>
                    <li class="py-2 d-flex justify-content-between text-danger">
                        <strong>Domingos</strong> 
                        <strong>Cerrado</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4 d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title fw-bold text-dark mb-3">📍 Dónde Estamos</h5>
                    <p class="text-muted fs-5 mb-1">Belgrano 1234</p>
                    <p class="text-muted small">Viedma, Ciudad de Rio Negro</p>
                </div>
                <div class="alert alert-warning border-0 text-dark mb-0 mt-3 small" role="alert">
                    <strong>📌 Recordatorio:</strong> Los turnos se respetan con una tolerancia máxima de 10 minutos de demora.
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include 'views/layout/footer.php'; 
?>