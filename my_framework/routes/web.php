<?php
// use App\Controllers\HomeController;
// use App\Controllers\EmpleadoController;
// use App\Controllers\AuthController;

// $router->addRoute('GET', '/', [HomeController::class, 'index']);
// $router->addRoute('GET', '/empleados', [EmpleadoController::class, 'index']);
// $router->addRoute('GET', '/empleados/{id}', [EmpleadoController::class, 'show']);
// $router->addRoute('GET', '/login', [AuthController::class, 'mostrarFormularioLogin']);
// $router->addRoute('POST', '/login', [AuthController::class, 'login']);
// $router->addRoute('GET', '/logout', [AuthController::class, 'logout']);
// $router = new Router();

$router = new Router();

$router->addRoute('GET', 'http://localhost/my_framework/public/', [HomeController::class, 'index']);
$router->addRoute('GET', '/about', [AboutController::class, 'index']);
// ...

$router->addRoute('POST', '/empleados/guardar', [EmpleadoController::class, 'guardar']);

// ...
$router->addRoute('GET', '/login', [AuthController::class, 'mostrarFormularioLogin']);
$router->addRoute('POST', '/login', [AuthController::class, 'login']);
$router->addRoute('GET', '/logout', [AuthController::class, 'logout']);

// Agrega más rutas aquí si es necesario

// ¡No olvides cerrar PHP si lo abres para incluir otros archivos!
