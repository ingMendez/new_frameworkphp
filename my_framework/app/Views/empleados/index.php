<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$titulo = 'Listado de Empleados';
ob_start();
$csrfToken = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrfToken;
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($empleados as $empleado): ?>
        <tr>
            <td><?php echo $empleado['id']; ?></td>
            <td><?php echo $empleado['nombre']; ?></td>
            <td><?php echo $empleado['apellido']; ?></td>
            <td><?php echo $empleado['email']; ?></td>
             <td><?php echo $empleado['departamento_nombre']; ?></td>
            <td><a href="javascript:cargarEmpleado(<?php echo $empleado['id']; ?>);">Ver Detalles</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  

</table>
<div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="/empleados?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
    <a href="/my_framework/public/">Volver al Inicio</a>
    <script src="../public/js/script.js"></script>

<?php
$contenido = ob_get_clean();
include_once(__DIR__ . '/../layout.php');
?>
