<?php
// Habilita CORS para permitir el acceso desde cualquier origen (*)
header("Access-Control-Allow-Origin: *");

// Establece los métodos HTTP permitidos
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Establece los encabezados permitidos
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Habilita las credenciales (como cookies) si es necesario
header("Access-Control-Allow-Credentials: true");

// Configura el tiempo de almacenamiento en caché del resultado CORS (en segundos)
header("Access-Control-Max-Age: 3600");

// Importa los controladores
include '../Controller/IntegratorController.php';

class ApiRedit
{
    function __construct()
    {
        // Obtén el método de la solicitud actual
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Verifica si el método es GET
        if ($requestMethod === 'GET') {
            // Crea una instancia del controlador
            $integrator = new Integrator();

            // Llama al método correspondiente
            $result = $integrator->index();

            // Devuelve los datos como JSON
            header('Content-Type: application/json');
            header("HTTP/1.1 200 OK");
            echo json_encode(['status' => 200, 'data' => $result]);
        } else {
            // Método no permitido
            header("HTTP/1.0 405 Method Not Allowed");
            echo json_encode(['error' => 'Método no permitido']);
        }
    }
}
new ApiRedit();
