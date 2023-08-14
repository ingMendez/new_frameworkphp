<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<body>
    <header>
        <h1><?php echo $titulo; ?></h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/empleados">Empleados</a></li>
        </ul>
    </nav>
    <main>
        <?php echo $contenido; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Mi Framework</p>
    </footer>
    <script src="../public/js/script.js"></script>
</body>
</html>
