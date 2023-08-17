<?php
namespace App\Controllers;
use App\Models\UsuarioModel;
use Router;
use ViewHelper;

class AuthController
{
    private $router;
    
    // public function __construct($router)
    // {
    //     $this->router = $router;
    // }
    
    public static function isLoggedIn()
    {
        return isset($_SESSION['usuario']);
    }
    
    public function mostrarFormularioLogin($request)
    {
        return ViewHelper::view('auth/login');
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            ViewHelper::view('/');
            exit;
        } else {
            return ViewHelper::view('auth/login');
        }
    }

    public function login()
    {
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        $usuario = UsuarioModel::obtenerUsuarioPorNombre($nombre);

        if ($usuario && $usuario['password'] === $password) {
            $_SESSION['usuario'] = $usuario;
            header('Location: /my_framework/public/');
            exit;
        } else {
            echo "Credenciales inválidas.";
        }
    }

    public function logout()
    {
        // var_dump("esta llegando");
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: /my_framework/public/');
        //  return ViewHelper::view('auth/login');

        // exit;
    }

    public function mostrarFormularioRecuperacion()
    {
        include_once(__DIR__ . '/../Views/recuperar_contrasena.php');
    }
    
    public function solicitarRecuperacion()
    {
        // Lógica para solicitar recuperación
    }
}
