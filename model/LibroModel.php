<?php
require_once 'core/Database.php';

class LibroModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    // Obtener todos los libros
    public function obtenerTodosLosLibros()
    {
        $query = $this->db->query("SELECT * FROM libros");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar un libro
    public function agregarLibro($titulo, $autor, $isbn)
    {
        $query = "INSERT INTO libros (titulo, autor, isbn) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$titulo, $autor, $isbn]);
    }

    // Modificar un libro
    public function modificarLibro($id, $titulo, $autor, $isbn)
    {
        $query = "UPDATE libros SET titulo = ?, autor = ?, isbn = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$titulo, $autor, $isbn, $id]);
    }

    // Obtener un libro por su ID
    public function obtenerLibroPorId($id)
    {
        $query = "SELECT * FROM libros WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Contar todos los libros
    public function contarLibros()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM libros");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }

    // Eliminar libro
    public function eliminarLibroPorId($id)
    {
        $query = "DELETE FROM libros WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
