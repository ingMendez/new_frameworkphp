<?php

namespace App\Controllers;

use App\Models\EmpleadoModel;
use ErrorHandler;
use Exception;
use Validator;

class EmpleadoController
{

    public function store()
    {
        $data = [
            'nombre' => $_POST['nombre'],
            'correo' => $_POST['correo'],
            // ... Otros campos
        ];

        $rules = [
            'nombre' => 'required|min:3',
            'correo' => 'required|email',
            // ... Reglas para otros campos
        ];

        $errors = Validator::validate($data, $rules);

        if (!empty($errors)) {
            // Mostrar errores al usuario o redirigir al formulario con errores
        } else {
            // Procesar los datos
        }
    }

    // ...


    // /**
    //  * Summary of index
    //  * @return void
    //  */
    // public function index()
    // {
    //     // Obtener empleados desde el modelo
    //     $empleados = EmpleadoModel::obtenerEmpleados();

    //     // Cargar la vista 'empleados.php' y pasar los datos
    //     ob_start();
    //     include_once('../app/Views/empleados.php');
    //     $html = ob_get_clean();

    //     echo $html;
    // }
 // /**
    //  * Summary of index
    //  * @return void
    //  */
    // public function index()
    // {
       

    //     $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    //     $perPage = 10; // Número de registros por página

    //     // Obtener el total de empleados
    //     $totalEmpleados = EmpleadoModel::obtenerEmpleados();
    //     $empleados = EmpleadoModel::getAll();

    //     // Calcular el número total de páginas
    //     $totalPages = ceil($totalEmpleados / $perPage);

    //     // Obtener empleados para la página actual
    //     $empleados = EmpleadoModel::obtenerEmpleadosPaginados($page, $perPage);

    //     include_once('../app/Views/empleados.php');
    // }

// Para enviar un json
    public function index()
    {
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            header('Location: /login');
            return;
        }
        // // Obtener empleados desde el modelo
        // $empleados = EmpleadoModel::obtenerEmpleados();

        // // Devolver los datos como respuesta JSON
        // header('Content-Type: application/json');
        // echo json_encode($empleados);

        // $empleados = EmpleadoModel::obtenerEmpleadosConDepartamento();
        // include_once('../app/Views/empleados.php');
        try {
            // Tu código para obtener empleados
            $empleados = EmpleadoModel::obtenerEmpleadosConDepartamento();
            include_once('../app/Views/empleados.php');
        } catch (Exception $e) {
            ErrorHandler::showError('Hubo un problema al cargar los empleados.');
        }

    }
    public function show($id)
    {
        // Obtener el empleado desde el modelo por su ID
        $empleado = EmpleadoModel::obtenerEmpleadoPorId($id);

        // Cargar la vista 'empleado.php' y pasar los datos
        ob_start();
        include_once('../app/Views/empleado.php');
        $html = ob_get_clean();

        echo $html;
    }
    public function crear()
    {
        // Mostrar el formulario de creación de empleado
        include_once('../app/Views/crear_empleado.php');
    }
    public function guardar()
    {
        // Procesar el formulario y guardar el empleado en la base de datos
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        // Realizar la validación de datos aquí (por ejemplo, comprobar si los campos están vacíos)

        // Guardar el empleado en la base de datos (simulado)
        EmpleadoModel::guardarEmpleado($nombre, $apellido, $email);

        // Redireccionar a la página de empleados
        header('Location: /empleados');
    }

}
