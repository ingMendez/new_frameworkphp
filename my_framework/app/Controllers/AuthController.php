<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class AuthController
{
    public function mostrarFormularioLogin($request)
    {
        include_once('../app/Views/login.php');
    }

    public function login()
    {
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        // Obtener el usuario por nombre
        $usuario = UsuarioModel::obtenerUsuarioPorNombre($nombre);

        if ($usuario && $usuario['password'] === $password) {
            // Iniciar sesión y redirigir al inicio
            $_SESSION['usuario'] = $usuario;
            header('Location: /');
        } else {
            // Mostrar mensaje de error
            echo "Credenciales inválidas.";
        }
    }

    public function logout()
    {
        // Cerrar sesión y redirigir al inicio
        unset($_SESSION['usuario']);
        // header('Location: /');

         // Lógica para cerrar sesión
        // Por ejemplo, destruir la sesión y redirigir al usuario a otra página
        session_destroy();
        // Redirigir a la página de inicio o donde desees
        header('Location: /');
        exit;

    }

    public function mostrarFormularioRecuperacion()
    {
        include_once('../app/Views/recuperar_contrasena.php');
    }
    public function solicitarRecuperacion()
    {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Token CSRF inválido.");
        }
        $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');

        if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
            die("El formato de correo electrónico es inválido.");
        }
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        // Aquí puedes implementar la lógica para enviar el correo de recuperación
        // Este es solo un ejemplo básico
        $correo = $_POST['correo'];
        $token = md5(uniqid());

        // Envía el correo con el enlace de recuperación
        // ...

        echo "Correo de recuperación enviado.";
    }
}


