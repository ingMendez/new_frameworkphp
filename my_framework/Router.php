<?php

class Router
{
    private $routes = [];
    private $middlewares = [];
    private $groupPrefix = '';

    public function addGroup($prefix, $callback)
    {
        $previousPrefix = $this->groupPrefix;
        $this->groupPrefix .= $prefix;

        if (is_callable($callback)) {
            $callback($this);
        }

        $this->groupPrefix = $previousPrefix;
    }

    public function addRoute($method, $route, $controller)
    {
        $fullRoute = $this->groupPrefix . $route;
        $this->routes[$method][$fullRoute] = $controller;
    }

    public function addMiddleware($middleware)
    {
        $this->middlewares[] = $middleware;
    }
    // $router->addRoute('GET', '/login', 'AuthController::mostrarFormularioLogin');
    // $router->addRoute('POST', '/login', 'AuthController::login');
    // $router->addRoute('GET', '/logout', 'AuthController::logout');
    public function dispatch()
    {
        // Obtener la ruta y el método de la solicitud
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        foreach ($this->routes[$method] as $route => $controller) {
            // ... (resto del código)
            var_dump( $uri);
            // var_dump($this->middlewares);
            foreach ($this->middlewares as $middleware) {
                $middlewareInstance = new $middleware();
                $response = $middlewareInstance->handle(['ruta' => $uri, 'metodo' => $method], function ($request) use ($controller) {
                    return $this->callController($request, $controller);
                });

                if ($response !== null) {
                    echo $response;
                    return;
                }
            }
        }
    }
    public function callController($request, $controller)
{
    // Separa el nombre del controlador y el método
    list($controllerName, $methodName) = explode('::', $controller);

    // Forma el namespace completo del controlador
    $controllerName = 'App\\Controllers\\' . $controllerName;

    // Crea una instancia del controlador
    $controllerInstance = new $controllerName();

    // Llama al método del controlador con el objeto de solicitud
    return $controllerInstance->$methodName($request);
}


    // ...
}
