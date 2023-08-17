<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1><?php echo $titulo; ?></h1>
    </header>
    <!-- <nav> -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
              <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="/my_framework/public/" aria-current="page">Home<span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="empleados">Empleados</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Action 1</a>
                                <a class="dropdown-item" href="#">Action 2</a>
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                        <input class="form-control me-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
          </div>
        </nav>
        
        <!-- <ul>
            <li><a href="/my_framework/public/">Inicio</a></li>
            <li><a href="empleados">Empleados</a></li>
        </ul> -->
    <!-- </nav> -->
    <main>
        <?php echo $contenido; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Mi Framework</p>
    </footer>
    <script src="../public/js/script.js"></script>
    
</body>
</html>
