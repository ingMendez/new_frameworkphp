<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="/login" method="post">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="nombre" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <script src="../public/js/script.js"></script>
</body>
</html>
