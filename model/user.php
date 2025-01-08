<?php
require_once 'core/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }
    public function getUserByUsernameAndPassword($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = :username AND clave = MD5(:password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function register($data)
    {
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, ape1, ape2, rol, clave) VALUES (:nombre, :ape1, :ape2, :rol, :clave)");
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':ape1', $data['ape1']);
        $stmt->bindParam(':ape2', $data['ape2']);
        $stmt->bindParam(':rol', $data['rol']);
        $stmt->bindParam(':clave', $data['clave']);
        $stmt->execute();
    }
    public function update($data)
    {
        $stmt = $this->db->prepare("UPDATE usuarios SET nombre = :nombre, ape1 = :ape1, ape2 = :ape2, rol = :rol WHERE id = :id");
        $stmt->execute($data);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
