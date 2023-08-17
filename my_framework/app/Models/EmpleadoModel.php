<?php

namespace App\Models;
use App\Models\Database; 
class EmpleadoModel
{
    public static function obtenerEmpleados()
    {
        // Simulamos una consulta a la base de datos
        $empleados = [
            ['id' => 1, 'nombre' => 'John', 'apellido' => 'Doe', 'email' => 'john@example.com','departamento_nombre'=>'la perla'],
            ['id' => 2, 'nombre' => 'Jane', 'apellido' => 'Smith', 'email' => 'jane@example.com','departamento_nombre'=>'la crema'],
        ];

        return $empleados;
    }

    public static function obtenerEmpleadoPorId($id)
    {
        // Simulamos una consulta a la base de datos por ID
        $empleados = [
            ['id' => 1, 'nombre' => 'John', 'apellido' => 'Doe', 'email' => 'john@example.com','departamento_nombre'=>'la perla'],
            ['id' => 2, 'nombre' => 'Jane', 'apellido' => 'Smith', 'email' => 'jane@example.com','departamento_nombre'=>'la crema'],
        ];

        foreach ($empleados as $empleado) {
            if ($empleado['id'] == $id) {
                return $empleado;
            }
        }

        return null;
    }
    public static function obtenerEmpleadosConDepartamento()
    {
        $consulta = "SELECT e.*, d.nombre AS departamento_nombre FROM empleados e
                     LEFT JOIN departamentos d ON e.departamento_id = d.id";

        // Ejecutar la consulta y obtener los resultados
        $resultados = Database::query($consulta);

        return $resultados;
    }

}
