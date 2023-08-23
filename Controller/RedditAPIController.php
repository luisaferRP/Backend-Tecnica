<?php
class RedditAPI
{
    private string $url;
    private string $userAgent;

    public function __construct(string $url, string $userAgent)
    {
        $this->url = $url;
        $this->userAgent = $userAgent;
    }

    public function getReddits(): array
    {
        // Inicializar cURL
        $ch = curl_init($this->url);

        // Configurar opciones de cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Configurar encabezados personalizados
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: ' . $this->userAgent,
            'Content-Type: application/json', // Especificar Content-Type como JSON
        ]);

        // Realizar la solicitud GET
        $response = curl_exec($ch);

        // Verificar si hubo errores
        if (curl_errno($ch)) {
            throw new Exception('Error en la solicitud cURL: ' . curl_error($ch));
        }

        // Cerrar la conexión cURL
        curl_close($ch);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        if ($data === null) {
            throw new Exception('Error al decodificar la respuesta JSON');
        }

        return $data;
    }
}