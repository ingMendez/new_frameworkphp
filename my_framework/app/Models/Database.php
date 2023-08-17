<?php
namespace App\Models;

class Database
{
    private static $connection;

    public static function connect()
    {
        if (!self::$connection) {
            $host = 'localhost'; // Cambia esto a la configuración de tu base de datos
            $dbname = 'data_economict';
            $username = 'root';
            $password = '';

            self::$connection = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }

    public static function query($sql, $params = [])
    {
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
