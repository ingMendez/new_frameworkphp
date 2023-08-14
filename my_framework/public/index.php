<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// require_once('../my_framework/Router.php');
require __DIR__ . '/../vendor/autoload.php';
require_once('../Router.php');
require_once('../app/Controllers/HomeController.php');
require_once('../app/Controllers/EmpleadoController.php');
require_once('../app/Controllers/AuthController.php');
require_once('../app/Models/EmpleadoModel.php');
require_once('../app/Models/UsuarioModel.php');
// require_once('../my_framework/Helpers/ErrorHandler.php');
require_once('../Helpers/ErrorHandler.php');
 require_once('../Middleware/RegistroActividadMiddleware.php');

// session_start();

$router = new Router();
// $router->addMiddleware('RegistroActividadMiddleware');

// Agregar rutas
$router->addRoute('GET', '/', 'HomeController::index');
$router->addRoute('GET', '/empleados', 'EmpleadoController::index');
$router->addRoute('GET', '/empleados/{id}', 'EmpleadoController::show');
$router->addRoute('GET', '/login', 'AuthController::mostrarFormularioLogin');
$router->addRoute('POST', '/login', 'AuthController::login');
$router->addRoute('GET', '/logout', 'AuthController::logout');
// print_r("llego aquiss");

try {
    $router->dispatch();
   
} catch (Exception $e) {
    ErrorHandler::showError($e->getMessage());
}
