<?php
$titulo = 'Detalle del Empleado';
ob_start();
session_start();
$csrfToken = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrfToken;
?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Departamento</th>
    </tr>
    <tr>
        <td><?php echo $empleado['id']; ?></td>
        <td><?php echo $empleado['nombre']; ?></td>
        <td><?php echo $empleado['apellido']; ?></td>
        <td><?php echo $empleado['email']; ?></td>
        <td><?php echo $empleado['departamento_nombre']; ?></td>
        
    </tr>
</table>

<?php
$contenido = ob_get_clean();
include_once(__DIR__ . '/../layout.php');
?>
