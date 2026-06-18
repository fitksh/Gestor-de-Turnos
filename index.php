<?php
// 1. Cargar dependencias de Composer y Dotenv
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// 2. Inclusiones de la App
require_once 'config/database.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/PeluqueroController.php';
require_once 'controllers/ReservaController.php';
require_once 'controllers/TurnoController.php';

// 3. Conexión
$database = new Database();
$db = $database->getConnection();

// 4. Enrutador
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->renderHome();
        break;
    case 'peluqueros':
        $controller = new PeluqueroController($db);
        $controller->renderPeluqueros();
        break;
    case 'calendario':
        $controller = new TurnoController($db);
        $controller->renderCalendario();
        break;
    case 'reserva':
        $controller = new ReservaController();
        $controller->renderReserva();
        break;
    case 'confirmacion':
        $controller = new TurnoController($db);
        $controller->confirmarTurno();
        break;
    default:
        $controller = new HomeController();
        $controller->renderHome();
        break;
}