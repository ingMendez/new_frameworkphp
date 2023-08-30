$(document).ready(function () {
    cargarEmpleados();
});

function cargarEmpleados() {
    $.ajax({
        url: 'empleados', // Ruta a tu controlador EmpleadoController
        type: 'GET',
        // dataType: 'json',
        success: function (data) {
            console.log(data);
            mostrarEmpleados(data);
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
        }
    });
}

function mostrarEmpleados(empleados) {
    var empleadosHtml = '';
    for (var i = 0; i < empleados.length; i++) {
        empleadosHtml += '<tr>';
        empleadosHtml += '<td>' + empleados[i].id + '</td>';
        empleadosHtml += '<td>' + empleados[i].nombre + '</td>';
        empleadosHtml += '<td>' + empleados[i].apellido + '</td>';
        empleadosHtml += '<td>' + empleados[i].email + '</td>';
        empleadosHtml += '</tr>';
    }
    $('#empleados-container').html(empleadosHtml);
}

function cargarEmpleado(id) {
    $.ajax({
        url: '/empleados/' + id, // Ruta a tu controlador EmpleadoController
        type: 'GET',
       dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#employeeDetails').html(`
                <p>ID: ${data.id}</p>
                <p>Nombre: ${data.nombre}</p>
                <p>Apellido: ${data.apellido}</p>
                <p>Email: ${data.email}</p>
                <p>Departamento: ${data.departamento_nombre}</p>
                <!-- Agregar más detalles según tu estructura de datos -->
            `);
            $('#employeeModal').modal('show');
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
        }
    });
}
