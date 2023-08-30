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
            <td><a href="#" onclick="cargarEmpleado(<?php echo $empleado['id']; ?>);">Ver Detalles</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  

</table>
   <!-- /.row -->
   <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
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
                        <td><a href="#" onclick="cargarEmpleado(<?php echo $empleado['id']; ?>);">Ver Detalles</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
<div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="empleados?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
</div>
    <a href="/">Volver al Inicio</a>
    <div class="modal" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModalLabel">Detalles del Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="employeeDetails">
                <!-- Aquí se cargarán los detalles del empleado -->
            </div>
        </div>
    </div>
</div>
    
    <script src="js/script.js"></script>
<?php
$contenido = ob_get_clean();
include_once(__DIR__ . '/../adminLTE.php');
?>
