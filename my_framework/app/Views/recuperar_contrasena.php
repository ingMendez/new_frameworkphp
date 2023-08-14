<?php 
session_start();
$csrfToken = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrfToken;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<body>
    <h1>Recuperación de Contraseña</h1>
    <form action="/recuperar-contrasena" method="post">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required><br>
        <button type="submit">Solicitar Recuperación</button>
    </form>
    <a href="/">Volver al Inicio</a>
    <script src="../public/js/script.js"></script>
</body>
</html>
