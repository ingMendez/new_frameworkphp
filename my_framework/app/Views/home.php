<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// $titulo = 'Listado de Empleados';
ob_start();
// $csrfToken = bin2hex(random_bytes(32));
// $_SESSION['csrf_token'] = $csrfToken;
?>
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head> -->
<body>
    <h1>Welcome to the Home Page</h1>
    <p>This is a simple example of a home page.</p>
    <!-- <a href="auth/logout">Cerrar Sesión</a> -->
    <!-- <li><a href="empleados">Empleados</a></li> -->
    <br/>

    <div id="carouselExampleInterval" class="carousel slide pointer-event" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="200" height="25" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#000"></rect><text x="50%" y="50%" fill="#999" dy=".3em">Estamos Programando</text></svg>

    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="100" height="25" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#666"></rect><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>

    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="100" height="25" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#555"></rect><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>

    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- <script src="../public/js/script.js"></script> -->
</body>
</html>
<?php
$contenido = ob_get_clean();
include_once(__DIR__ . '/adminLTE.php');
?>