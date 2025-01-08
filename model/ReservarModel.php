<?php
require_once 'core/Database.php';

class ReservarModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    // Reservar un libro
    public function reservarLibro($isbn, $fechaDesde, $fechaHasta)
    {
        $stmt = $this->db->prepare("INSERT INTO prestamos (isbn, fecha_desde, fecha_hasta) VALUES (:isbn, :fecha_desde, :fecha_hasta)");
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':fecha_desde', $fechaDesde);
        $stmt->bindParam(':fecha_hasta', $fechaHasta);
        $result = $stmt->execute();
        return $result;
    }

    // Contar todas las reservas
    public function contarReservas()
    {
        $stmt = $this->db->query("SELECT COUNT(*) AS total FROM prestamos");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }

    // Obtener todas las reservas
    public function obtenerReservas()
    {
        $stmt = $this->db->query("SELECT * FROM prestamos");
        return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }
    //Verificar disponibilidad del libro
    public function verificarDisponibilidad($isbn, $fechaDesde, $fechaHasta)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM prestamos WHERE isbn = :isbn AND (fecha_desde <= :fechaHasta AND fecha_hasta >= :fechaDesde)");
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':fechaDesde', $fechaDesde);
        $stmt->bindParam(':fechaHasta', $fechaHasta);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] == 0;
    }
}
