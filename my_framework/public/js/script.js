$(document).ready(function () {
    cargarEmpleados();
});

function cargarEmpleados() {
    $.ajax({
        url: '/empleados', // Ruta a tu controlador EmpleadoController
        type: 'GET',
        dataType: 'json',
        success: function (data) {
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
        dataType: 'html',
        success: function (data) {
            $('#empleados-container').html(data);
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
        }
    });
}
