<?php
// 1. Cargar dependencias de Composer y Dotenv
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// 2. Inclusiones de la App
require_once 'config/database.php';
require_once 'Models/Peluquero.php';

// 3. Conexión
$database = new Database();
$db = $database->getConnection();

// 4. Enrutador
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include 'views/home.php';
        break;
    case 'peluqueros':
        include 'views/peluqueros.php';
        break;
    case 'calendario':
        include 'views/calendario.php';
        break;
    case 'reserva':
        include 'views/reserva.php';
        break;
    case 'confirmacion':
        include 'views/confirmacion.php';
        break;
    default:
        include 'views/home.php';
        break;
}