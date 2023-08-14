<?php

namespace App\Models;
class UsuarioModel
{
    private static $users = [
        1 => ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
        2 => ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
        // Agrega más usuarios aquí si es necesario
    ];

    public static function getById($id)
    {
        return isset(self::$users[$id]) ? self::$users[$id] : null;
    }

    public static function getAll()
    {
        return self::$users;
    }
    // Simulación de la base de datos de usuarios
    private static $usuarios = [
        ['id' => 1, 'nombre' => 'admin', 'password' => 'admin', 'rol' => 'admin'],
        ['id' => 2, 'nombre' => 'usuario', 'password' => 'usuario', 'rol' => 'usuario'],
    ];

    public static function obtenerUsuarioPorNombre($nombre)
    {
        foreach (self::$usuarios as $usuario) {
            if ($usuario['nombre'] === $nombre) {
                return $usuario;
            }
        }
        return null;
    }
}
