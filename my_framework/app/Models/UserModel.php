<?php

namespace App\Models;

class UserModel
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


}
