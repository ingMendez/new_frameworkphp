<?php

class Router
{
    private static $instance = null;
   

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private $routes = [];
    private $middlewares = [];
    private $groupPrefix = '';
    public $rutaBase = "/my_framework/public";
    // public function addGroup($prefix, $callback)
    // {
    //     $previousPrefix = $this->groupPrefix;
    //     $this->groupPrefix .= $prefix;

    //     if (is_callable($callback)) {
    //         $callback($this);
    //     }

    //     $this->groupPrefix = $previousPrefix;
    // }

    public function addRoute($method, $route, $controller)
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method_url = $_SERVER['REQUEST_METHOD'];

        
        if($method_url == $method &&  $uri == ($this->rutaBase.$route)){
            // print_r('llego el lechero');
            $fullRoute = $this->groupPrefix . $route;
            $this->routes[$method][$fullRoute] = $controller;
        }
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
        // $rutaBase = "/my_framework/public";
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        //   var_dump($uri);
        //   var_dump( $method);
        foreach ($this->routes[$method] as $route => $controller) {
            // ... (resto del código)
            //    var_dump($uri);
            // print_r('<pre>');
            // // print_r($uri);
            // print_r($controller[$route]);
            // print_r($this->routes);
            // if($uri ==($rutaBase.=$this->routes[$method])){
            //     print_r($uri);
            // }
            //    print_r($controller);
            //  var_dump($this->middlewares);
            foreach ($this->middlewares as $middleware) {
                // var_dump($middleware);
                $middlewareInstance = new $middleware();
                // if()
                // print_r("=>".$uri);
                // print_r("=>".$method." ");
                // print_r("=>".$controller);
                // var_dump($middleware);
                $response = $middlewareInstance->handle(['ruta' => $uri, 'metodo' => $method], function ($request) use ($controller) {
                     return $this->callController($request, $controller);
                });
                // $response
                    // var_dump($response);
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
    
    // var_dump($controllerInstance->$methodName($request));
    // Llama al método del controlador con el objeto de solicitud
    return $controllerInstance->$methodName($request);
}
    public function url($routeName)
    {
        // Buscar la ruta con el nombre proporcionado
        foreach ($this->routes as $methodRoutes) {
            foreach ($methodRoutes as $route => $controller) {
                if ($controller === $routeName) {
                    // Devolver la URL basada en la ruta
                    return $route;
                }
            }
        }

        // Si no se encuentra la ruta, devolver una URL por defecto
        return '/';
    }

    // ...
}
