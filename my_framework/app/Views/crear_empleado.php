<?php 
session_start();
$csrfToken = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrfToken;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Empleado</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<body>
    <h1>Crear Empleado</h1>
    <form action="/empleados/guardar" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="/empleados">Volver al Listado de Empleados</a>
    <script src="../public/js/script.js"></script>
</body>
</html>
