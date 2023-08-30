<?php

class Router
{
    private static $instance = null;
   
    // public static function get($uri,$callback){
    //     $uri = trim($uri,'/');
    //     self::$routes['GET'][$uri] = $callback;
    // }

    // public static function post($uri,$callback){
    //     $uri = trim($uri,'/');
    //     self::$routes['POST'][$uri] = $callback;
    // }

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
    // public $rutaBase = "/my_framework/public";
    // public function addGroup($prefix, $callback)
    // {
    //     $previousPrefix = $this->groupPrefix;
    //     $this->groupPrefix .= $prefix;

    //     if (is_callable($callback)) {
    //         $callback($this);
    //     }

    //     $this->groupPrefix = $previousPrefix;
    // }
    // private function matchRoute($route)
    // {
    //     $pattern = str_replace(['/', '{id}'], ['\/', '(\d+)'], $route);
    //     $uri = $_SERVER['REQUEST_URI'];
    //     $method_url = $_SERVER['REQUEST_METHOD'];

    //     return $method_url == $method && preg_match('/^'.$pattern.'$/', $uri, $matches);
    // }

    private function matchRoute($pattern , $uri)
{
    $pattern = preg_quote($pattern, '/');

    // Reemplazar {variable} con una expresión regular que capture cualquier valor
    $pattern = preg_replace('/\\\{.*?\\\}/', '(.+)', $pattern);
    $matches = [];
    if (preg_match('/^' . $pattern . '$/', $uri, $matches)) {
        return $matches;
    }
    
    return null;
    // return preg_match('/^'.$pattern.'$/', $uri,$matches);
}

    public function addRoute($method, $route, $controller)
    {
        if (is_callable($route)) {
            $route($this);
        }
        $this->routes[$method][$route] = $controller;
    }
    // public function addRoute($method, $route, $controller)
    // {
    //     $uri = $_SERVER['REQUEST_URI'];
    //     $method_url = $_SERVER['REQUEST_METHOD'];

    //     //  print_r(        $uri);
    //     //  print_r('<pre>');
    //     //  print_r( $method." => ".  $this->rutaBase. $route);
    //     //  print_r('<pre>');
    //     // print_r(        $method_url);
    //     // print_r(        $$this->rutaBase.$route);
        
    //     // if($method_url == $method &&  $uri == ($this->rutaBase.$route)){
    //     //     // print_r('llego el lechero');
    //     //     $fullRoute = $this->groupPrefix . $route;
    //     //     $this->routes[$method][$fullRoute] = $controller;
    //     // }
    //     // var_dump($method);
    //     // var_dump($route);
    //     // var_dump($controller);

    //     //     $previousPrefix = $this->groupPrefix;
    //     // $this->groupPrefix .= $prefix;

    //     if (is_callable($route)) {
    //         $route($this);
    //     }

    //     $this->groupPrefix = $route;
    

    //     $pattern = str_replace(['/', '{id}'], ['\/', '(\d+)'], $route);
    //     // Verificar si la URI actual coincide con el patrón de la ruta
    //     // var_dump("esta llegando");
    //     // var_dump(preg_match('/^'.$pattern.'$/', $uri, $matches));
    //     // print_r($matches.'<pre>');
    //     if ($method_url == $method && preg_match('/^'.$pattern.'$/', $uri, $matches)) {
    //         var_dump("esta llegando");
            
    //         $fullRoute = $this->groupPrefix . $route;
    //         $this->routes[$method][$fullRoute] = $controller;
    
    //         // Si la ruta tiene un parámetro, el valor se encuentra en $matches[1]
    //         $routeParams = isset($matches[1]) ? $matches[1] : null;
    //     }

    //     // print_r(        $method_url);
    //     // print_r(        $method);
    // }

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
           
            $matches = $this->matchRoute($route, $uri);

        if ($matches !== null) {

            // if ($this->matchRoute($route, $uri)) {
        //   print_r('<pre>');
        //   print_r("esta llegando". $route);
            foreach ($this->middlewares as $middleware) {

                $middlewareInstance = new $middleware();

                $response = $middlewareInstance->handle(['ruta' => $uri, 'metodo' => $method], function ($request) use ($controller,$matches) {
                     return $this->callController($request, $controller,$matches);
                });
                
                if ($response !== null) {
                    echo $response;
                    return;
                }
            }
          }
        }
    }
    public function callController($request, $controller,$matches)
{
    // Separa el nombre del controlador y el método
    list($controllerName, $methodName) = explode('::', $controller);

    // Forma el namespace completo del controlador
    $controllerName = 'App\\Controllers\\' . $controllerName;
    // Crea una instancia del controlador
    $controllerInstance = new $controllerName();
    
    // var_dump($controllerInstance->$methodName($request));
    // Llama al método del controlador con el objeto de solicitud
    return $controllerInstance->$methodName($request,$matches);
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
/*class Router
{
    private static $instance = null;

    private $routes = [];
    private $middlewares = [];
    private $groupPrefix = '';

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addRoute($method, $route, $controller)
    {
        $this->routes[$method][$route] = $controller;
    }

    public function addMiddleware($middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] as $route => $controller) {
            $pattern = str_replace('/', '\/', $route);
            
            if (preg_match('/^'.$pattern.'$/', $uri, $matches)) {
                array_shift($matches); // Remove the full match

                $request = ['ruta' => $uri, 'metodo' => $method, 'params' => $matches];

                foreach ($this->middlewares as $middleware) {
                    $middlewareInstance = new $middleware();
                    $response = $middlewareInstance->handle($request, function ($request) use ($controller) {
                        return $this->callController($request, $controller);
                    });

                    if ($response !== null) {
                        echo $response;
                        return;
                    }
                }
            }
        }
    }

    public function callController($request, $controller)
    {
        list($controllerName, $methodName) = explode('::', $controller);
        $controllerName = 'App\\Controllers\\' . $controllerName;
        $controllerInstance = new $controllerName();
        return $controllerInstance->$methodName($request);
    }
}*/

