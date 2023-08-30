<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../Helpers/ViewHelper.php');
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Router.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/EmpleadoController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Models/EmpleadoModel.php';
require_once __DIR__ . '/../app/Models/UsuarioModel.php';
require_once __DIR__ . '/../Helpers/ErrorHandler.php';
require_once __DIR__ . '/../Middleware/RegistroActividadMiddleware.php';

session_start();

$router = new Router();

// Agregar rutas
// $router->addRoute('GET', '/', 'HomeController::index');
// $router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('GET', '/', 'HomeController::index');
// $router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('GET', '/empleados', 'EmpleadoController::index');
// $router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('GET', '/empleados/{id}', 'EmpleadoController::show');
// $router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('GET', '/auth/login', 'AuthController::mostrarFormularioLogin');
// $router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('POST', '/auth/login', 'AuthController::login');
// $router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('GET', '/auth/logout', 'AuthController::logout');
$router->addMiddleware(new RegistroActividadMiddleware());

try {
    $router->dispatch();
} catch (Exception $e) {
    ErrorHandler::showError($e->getMessage());
}
?>
