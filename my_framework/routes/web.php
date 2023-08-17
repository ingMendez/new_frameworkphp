<?php
 use App\Controllers\HomeController;
 use App\Controllers\AuthController;
 

// $router->addRoute('GET', '/', [HomeController::class, 'index']);
// $router->addRoute('GET', '/empleados', [EmpleadoController::class, 'index']);
// $router->addRoute('GET', '/empleados/{id}', [EmpleadoController::class, 'show']);
// $router->addRoute('GET', '/login', [AuthController::class, 'mostrarFormularioLogin']);
// $router->addRoute('POST', '/login', [AuthController::class, 'login']);
// $router->addRoute('GET', '/logout', [AuthController::class, 'logout']);
// $router = new Router();

// $router = new Router();

// $router->addRoute('GET', '/', [HomeController::class, 'index']);
// $router->addMiddleware(new RegistroActividadMiddleware());
// //    ->addMiddleware(new RegistroActividadMiddleware());

// $router->addRoute('GET', '/about', [AboutController::class, 'index']);
// // ...

// $router->addRoute('POST', '/empleados/guardar', [EmpleadoController::class, 'guardar']);

// // ...
// $router->addRoute('GET', '/auth/login', 'AuthController::mostrarFormularioLogin');
// $router->addRoute('GET', '/auth/login', 'AuthController::index');
// $router->addRoute('POST', '/auth/login', 'AuthController::login');
// $router->addRoute('GET', '/auth/login', [AuthController::class, 'logout']);

// Agrega más rutas aquí si es necesario

$router = new Router();

// $router->addRoute('GET', '/', [HomeController::class, 'index']);
// // $router->addMiddleware(new RegistroActividadMiddleware());
// $router->addMiddleware(new RegistroActividadMiddleware());
// $router->addRoute('GET', '/auth/login', 'AuthController::mostrarFormularioLogin');
// // $router->addMiddleware(new RegistroActividadMiddleware());
// $router->addMiddleware(new RegistroActividadMiddleware());
// $router->addRoute('POST', '/auth/login', 'AuthController::login');
// $router->addMiddleware(new RegistroActividadMiddleware());
// $router->addRoute('GET', '/auth/logout', 'AuthController::logout');
// // $router->addRoute('GET', '/auth/login', [AuthController::class, 'logout']);
// $router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('GET', '/', [HomeController::class, 'index']);
$router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('GET', '/auth/login', [AuthController::class, 'mostrarFormularioLogin']);
$router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('POST', '/auth/login', [AuthController::class, 'login']);
$router->addMiddleware(new RegistroActividadMiddleware());
$router->addRoute('GET', '/my_framework/public/auth/logout', 'AuthController::logout');
$router->addMiddleware(new RegistroActividadMiddleware());

// ¡No olvides cerrar PHP si lo abres para incluir otros archivos!
