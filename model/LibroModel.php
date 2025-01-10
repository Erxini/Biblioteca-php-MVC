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
    public function agregarLibro($titulo, $autor, $isbn, $portadaRuta)
    {
        $query = "INSERT INTO libros (titulo, autor, isbn, portada) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$titulo, $autor, $isbn, $portadaRuta]);
    }

    // Modificar un libro por ISBN
    public function modificarLibroPorISBN($isbn, $titulo, $autor, $nuevoISBN, $portadaRuta = null)
    {
        if ($portadaRuta) {
            // Actualizar libro con nueva portada
            $query = "UPDATE libros SET titulo = ?, autor = ?, isbn = ?, portada = ? WHERE isbn = ?";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$titulo, $autor, $nuevoISBN, $portadaRuta, $isbn]);
        } else {
            // Actualizar libro sin cambiar la portada
            $query = "UPDATE libros SET titulo = ?, autor = ?, isbn = ? WHERE isbn = ?";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$titulo, $autor, $nuevoISBN, $isbn]);
        }
    }

    // Obtener libro por ISBN
    public function obtenerLibroPorISBN($isbn)
    {
        try {
            // Verificar que el ISBN no esté vacío
            if (empty($isbn)) {
                throw new Exception("El ISBN no puede estar vacío.");
            }

            // Preparar la consulta
            $query = "SELECT * FROM libros WHERE isbn = :isbn";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el resultado
            $libro = $stmt->fetch(PDO::FETCH_ASSOC);

            // Prueba temporal para verificar los datos del libro
            if ($libro) {
                echo '<pre>';
                print_r($libro);
                echo '</pre>';
            } else {
                echo "No se encontró ningún libro con el ISBN: $isbn";
            }
            exit();

            return $libro;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            exit();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }

    // Contar todos los libros
    public function contarLibros()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM libros");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }

    // Eliminar libro por ID
    public function eliminarLibroPorId($id)
    {
        $query = "DELETE FROM libros WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
