<?php

class LibroController
{
    private $libroModel;
    public function __construct($libroModel)
    {
        $this->libroModel = $libroModel;
    }
    public function mostrarLibros()
    {
        $libros = $this->libroModel->obtenerTodosLosLibros();
        require 'view/Libros.php';
    }
    // Agregar un libro
    public function agregarLibro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo']);
            $autor = trim($_POST['autor']);
            $isbn = trim($_POST['isbn']);

            if (!empty($titulo) && !empty($autor) && !empty($isbn)) {
                $this->libroModel->agregarLibro($titulo, $autor, $isbn);
                header('Location: index.php?action=mostrarLibros');
                exit();
            } else {
                echo "Por favor, complete todos los campos.";
            }
        } else {
            require_once 'view/AgregarLibro.php';
        }
    }
    // Modificar un libro
    public function modificarLibro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titulo = trim($_POST['titulo']);
            $autor = trim($_POST['autor']);
            $isbn = trim($_POST['isbn']);

            if (!empty($titulo) && !empty($autor) && !empty($isbn)) {
                $this->libroModel->modificarLibro($id, $titulo, $autor, $isbn);
                header('Location: index.php?action=mostrarLibros');
                exit();
            } else {
                echo "Por favor, complete todos los campos.";
            }
        } else {
            $id = $_GET['id'];
            $libro = $this->libroModel->obtenerLibroPorId($id);
            require_once 'view/ModificarLibro.php';
        }
    }
    // Eliminar Libro
    public function eliminarLibro()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $this->libroModel->eliminarLibroPorId($id);
            header('Location: index.php?action=mostrarLibros');
            exit();
        } else {
            echo "ID del libro no proporcionado.";
        }
    }
}
