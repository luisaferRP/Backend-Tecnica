<?php
include '../Database/Conexion.php';

class Redit
{
    private PDO_DB $db;

    public function __construct()
    {
        $this->db = new PDO_DB('localhost', 'root', '', 'apirest');
    }

    public function save($parametros)
    {
        $sql  = "INSERT INTO nava (id, name, display_name, header_title, title, description, public_description, header_img, icon_img, banner_img) VALUES 
        (:id, :name, :display_name, :header_title, :title, :description, :public_description, :header_img, :icon_img, :banner_img)";
        $stmt = $this->db->conn->prepare($sql);
        try {
            $stmt->execute($parametros);
            return true; // Éxito al insertar
        } catch (PDOException $e) {
            die("Error en la inserción: " . $e->getMessage()); //error al insertar
        }
    }

    public function find_by_id($id)
    {
        $query = "SELECT * FROM nava WHERE id = :id";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $redit_exist = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($redit_exist) {
            return true;
        }
        return false;
    }

    public function getAll()
    {
        $query = "SELECT * FROM nava";
        $stmt = $this->db->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
