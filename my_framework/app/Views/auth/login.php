<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <!-- <h1>Iniciar Sesión</h1> -->
    <!-- <form action="/my_framework/public/auth/login" method="post">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="nombre" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Iniciar Sesión</button>
    </form> -->
    <script src="../public/js/script.js"></script>
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body small">
            <div class="ms-5 m-lg-4 m-lx "></div>
            <h1>Iniciar Sesión</h1>
            <form action="/my_framework/public/auth/login" method="post" class="border p-3">
                <label for="nombre">Nombre de Usuario:</label>
                <input type="text" name="nombre" required><br>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required><br>
                <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>
            </form>
        </div>
        <!-- <div class="card-footer text-muted">
            Footer
        </div> -->
    </div>
</body>

</html>