<?php

class RegistroActividadMiddleware
{
    public function handle($request, $next)
    {
        // Registro de actividad: Guardar información de la solicitud en un archivo de registro
        $fecha = date('Y-m-d H:i:s');
        $ruta = $request['ruta'];
        $metodo = $request['metodo'];

        $registro = "[$fecha] Ruta: $ruta, Método: $metodo\n";
        file_put_contents('../storage/actividad.log', $registro, FILE_APPEND);

        // Llamar al siguiente middleware o controlador
        return $next($request);
    }
}
