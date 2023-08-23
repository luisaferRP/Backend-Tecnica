<?php
class PDO_DB
{
    private $host;
    private $username;
    private $password;
    private $database;
    public $conn;

    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        // Intentar establecer la conexión PDO
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    public function query($sql)
    {
        // Ejecutar una consulta SQL
        return $this->conn->query($sql);
    }

    public function close()
    {
        // Cerrar la conexión PDO
        $this->conn = null;
    }
}
